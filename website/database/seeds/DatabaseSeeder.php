<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $numUsers = 500;    // Change the test volume
        $numVenues = 25;    // Change the test volume

        $numCourses = 0;     // This is a counter

        $this->command->info('Seeding the countries...');
        $this->call('CountriesSeeder');

        $this->command->info('Seeding the primary test users...');
        $this->call('UsersTableSeeder');

        $this->command->info('Seeding the users...');
        factory(App\User::class, $numUsers)->create();

        $this->command->info('Seeding the venues...');
        factory(App\Venue::class, $numVenues)->create();

        $this->command->info('Seeding the courses...');
        $venues = App\Venue::all();
        foreach ($venues as $venue) {
            $venueCourses = random_int(1, 3);
            $numCourses += $venueCourses;
            factory(App\Course::class, $venueCourses)->create(['venue_id' => $venue->id]);
        }

        $this->command->info('Seeding the holes...');
        $courses = App\Course::all();
        foreach ($courses as $course) {
            $max_holes = random_int(1, 10);
            $max_holes = $max_holes > 8 ? 9 : 18;
            for ($i = 1; $i <= $max_holes; $i++) {
                $stroke_index = $max_holes - $i + 1;
                for ($tee = 1; $tee <= 4; $tee++) {
                    factory(App\Hole::class)->create([
                        'course_id' => $course->id,
                        'hole_number' => $i,
                        'stroke_index' => $stroke_index,
                        'slope' => $stroke_index,
                        'tee' => $tee,
                    ]);
                }
            }
        }

        $this->command->info('Seeding the rounds...');
        $users = App\User::all();
        foreach ($users as $user) {
            $coursesPlayed = random_int(10, 20);
            for ($i = 1; $i <= $coursesPlayed; $i++) {
                $courseNum = random_int(1, $numCourses);
                factory(App\Round::class)->create([
                    'user_id' => $user->id,
                    'course_id' => $courseNum,
                ]);
            }
        }

        $this->command->info('Seeding the strokes...');
        $rounds = DB::table('rounds')
            ->select(DB::raw('rounds.id as round_id, holes.id as hole_id, holes.par as par'))
            ->join('users', 'rounds.user_id', '=', 'users.id')
            ->join('courses', 'rounds.course_id', '=', 'courses.id')
            ->join('holes', 'courses.id', '=', 'holes.course_id')
            ->whereColumn('rounds.tee', '=', 'holes.tee')
            ->get();
        foreach ($rounds as $round) {
            // Set the num strokes to zero (blob) every now and again
            if (random_int(1, 20) <= 1) {
                $strokes = 0;
            } else {
                $strokes = ($round->par + random_int(-2, 4));
            }

            factory(App\RoundHole::class)->create([
                'round_id' => $round->round_id,
                'hole_id' => $round->hole_id,
                'num_strokes' => $strokes,
            ]);
        }

        $this->command->info('Summarising the data...');
    }
}
