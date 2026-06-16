<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoundSeeder extends Seeder
{
    // Maps event index (0-based, insertion order) to course name and played_at.
    // Must match the order EventSeeder inserts events.
    private $eventMeta = [
        0 => ['course' => 'Championship Links', 'played_at' => '2024-05-11', 'sss' => 74],
        1 => ['course' => 'West Course',        'played_at' => '2024-07-20', 'sss' => 74],
        2 => ['course' => 'Brabazon Course',    'played_at' => '2024-09-07', 'sss' => 73],
        3 => ['course' => 'Moortown',           'played_at' => '2025-04-26', 'sss' => 71],
        4 => ['course' => 'Formby Links',       'played_at' => '2025-06-14', 'sss' => 72],
        5 => ['course' => 'Championship Links', 'played_at' => '2025-09-06', 'sss' => 74],
    ];

    public function run()
    {
        $events = DB::table('events')->orderBy('id')->get();
        $users  = DB::table('users')->orderBy('id')->get();

        $courses = DB::table('courses')->orderBy('id')->get()->keyBy('name');

        foreach ($events as $idx => $event) {
            $meta     = $this->eventMeta[$idx];
            $course   = $courses[$meta['course']];
            $playedAt = $meta['played_at'];
            $sss      = $meta['sss'];

            $holes = DB::table('holes')
                ->where('course_id', $course->id)
                ->where('tee', 1)
                ->orderBy('hole_number')
                ->get();

            $coursePar = $holes->sum('par');

            $eventScores = [];

            foreach ($users as $user) {
                $handicap      = (float) $user->amg_handicap;
                // Playing handicap = full handicap for casual society golf (no allowance reduction)
                $handicapRound = (int) round($handicap);

                $roundData = $this->generateRound(
                    $user->id,
                    $event->id,
                    $course->id,
                    $playedAt,
                    $sss,
                    $coursePar,
                    $handicap,
                    $handicapRound,
                    $holes
                );

                $roundId = DB::table('rounds')->insertGetId($roundData['round']);

                foreach ($roundData['round_holes'] as $rh) {
                    DB::table('round_holes')->insert(array_merge($rh, [
                        'round_id'   => $roundId,
                        'created_at' => $playedAt,
                        'updated_at' => $playedAt,
                    ]));
                }

                $eventScores[] = [
                    'user_id'    => $user->id,
                    'round_id'   => $roundId,
                    'total_score' => $roundData['round']['total_score'],
                ];
            }

            // Rank players by Stableford total (higher is better) and update the event podium.
            usort($eventScores, function ($a, $b) {
                return $b['total_score'] <=> $a['total_score'];
            });

            DB::table('events')->where('id', $event->id)->update([
                'winner' => $eventScores[0]['user_id'] ?? 0,
                'second' => $eventScores[1]['user_id'] ?? 0,
                'third'  => $eventScores[2]['user_id'] ?? 0,
            ]);
        }
    }

    private function generateRound(
        int $userId,
        int $eventId,
        int $courseId,
        string $playedAt,
        int $sss,
        int $coursePar,
        float $handicap,
        int $handicapRound,
        $holes
    ): array {
        // Skill factor: lower handicap → strokes closer to par; higher → more over par.
        // Base tendency in strokes above/below par per hole (aggregate across 18).
        $overParTendency = ($handicap / 18);

        $roundHoles      = [];
        $totalStrokes    = 0;
        $totalAdjusted   = 0;
        $totalNett       = 0;
        $totalScore      = 0;
        $totalFairways   = 0;
        $totalGirs       = 0;
        $totalSandSaves  = 0;
        $totalPutts      = 0;

        // How many strokes a player receives on a given hole.
        // With handicap 18 they get 1 shot on every hole.
        // With handicap 20 they get 2 shots on SI 1 and SI 2.
        // The shot count on a hole = floor(handicap/18) + (1 if SI <= handicap % 18 else 0).
        $shotsOnHole = function (int $si) use ($handicapRound): int {
            return (int) floor($handicapRound / 18) + ($si <= ($handicapRound % 18) ? 1 : 0);
        };

        foreach ($holes as $hole) {
            $par         = (int) $hole->par;
            $si          = (int) $hole->stroke_index;
            $shotsHere   = $shotsOnHole($si);

            // Gross strokes: par + natural tendency + random variance.
            // Variance is tighter for scratch players, looser for high handicappers.
            $variance   = mt_rand(-1, 3);
            $gross      = max(1, (int) round($par + $overParTendency + $variance));

            // Max score for handicap purposes: net double bogey = par + 2 + shots received.
            $maxScore   = $par + 2 + $shotsHere;
            $adjusted   = min($gross, $maxScore);

            // Nett clamped to 1: unsigned column cannot store negative values, and nett = adjusted - shots
            // could theoretically go below 1 for high-handicappers receiving multiple shots on short holes.
            $nett        = max(1, $adjusted - $shotsHere);
            // Stableford: 2 points for par nett, 1 more for each stroke under, -1 for each over, min 0.
            $stableford  = max(0, 2 + ($par - $nett));

            $putts      = $this->realisticPutts($par, $gross);
            $fairway    = ($par >= 4 && mt_rand(1, 100) <= $this->fairwayHitPct($handicap)) ? 1 : 0;
            // GIR: reached the green in par - 2 strokes or fewer (gross)
            $gir        = ($gross - $putts <= $par - 2) ? 1 : 0;
            $sandSave   = 0;

            $roundHoles[] = [
                'hole_id'         => $hole->id,
                'calculated'      => 1,
                'dummy'           => 0,
                'num_strokes'     => $gross,
                'adjusted_strokes'=> $adjusted,
                'nett_strokes'    => $nett,
                'score'           => $stableford,
                'num_fairways'    => $fairway,
                'num_girs'        => $gir,
                'num_sand_saves'  => $sandSave,
                'num_putts'       => $putts,
            ];

            $totalStrokes   += $gross;
            $totalAdjusted  += $adjusted;
            $totalNett      += $nett;
            $totalScore     += $stableford;
            $totalFairways  += $fairway;
            $totalGirs      += $gir;
            $totalSandSaves += $sandSave;
            $totalPutts     += $putts;
        }

        $round = [
            'user_id'                  => $userId,
            'event_id'                 => $eventId,
            'course_id'                => $courseId,
            'tee'                      => 1,
            'played_at'                => $playedAt,
            'round_holes'              => 18,
            'holes_played'             => 18,
            'complete'                 => 1,
            'sss'                      => $sss,
            'par'                      => $coursePar,
            'handicap_exact'           => (int) $handicap,
            'handicap_adjustment'      => 0,
            'handicap_round_adjustment'=> 0,
            'handicap_round'           => $handicapRound,
            'total_score'              => $totalScore,
            'calculated'               => 1,
            'dummy'                    => 0,
            'num_strokes'              => $totalStrokes,
            'adjusted_strokes'         => $totalAdjusted,
            'nett_strokes'             => $totalNett,
            'num_fairways'             => $totalFairways,
            'num_girs'                 => $totalGirs,
            'num_sand_saves'           => $totalSandSaves,
            'num_putts'                => $totalPutts,
            'created_at'               => $playedAt,
            'updated_at'               => $playedAt,
        ];

        return ['round' => $round, 'round_holes' => $roundHoles];
    }

    private function realisticPutts(int $par, int $gross): int
    {
        // Missed green likely = chip + 2 putts. On green in regulation or better = 1 or 2 putts.
        if ($gross <= $par - 1) {
            // Birdie or eagle attempt: more likely to one-putt
            return mt_rand(1, 100) <= 40 ? 1 : 2;
        }
        if ($gross === $par) {
            return mt_rand(1, 100) <= 25 ? 1 : 2;
        }
        // Bogey or worse: often 2 putts after a chip; occasionally 3
        return mt_rand(1, 100) <= 15 ? 3 : 2;
    }

    private function fairwayHitPct(float $handicap): int
    {
        // Scratch player hits ~65% of fairways; 28-hcapper hits ~35%
        return max(35, 65 - (int) round($handicap * 1.07));
    }
}
