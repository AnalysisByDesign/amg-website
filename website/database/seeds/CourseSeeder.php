<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = $this->courseDefinitions();

        foreach ($courses as $courseData) {
            $holes = $courseData['holes'];
            unset($courseData['holes']);

            $venueId = DB::table('venues')->where('name', $courseData['venue_name'])->value('id');
            unset($courseData['venue_name']);

            $courseId = DB::table('courses')->insertGetId(array_merge($courseData, [
                'venue_id'   => $venueId,
                'measure'    => 'Yards',
                'dummy'      => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]));

            foreach ($holes as $hole) {
                DB::table('holes')->insert(array_merge($hole, [
                    'course_id'  => $courseId,
                    'current'    => 1,
                    'tee'        => 1,
                    'dummy'      => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
        }
    }

    private function courseDefinitions(): array
    {
        return [
            // Royal Lytham — par 71, SSS 74. Front 9 = 35, back 9 = 36.
            [
                'venue_name' => 'Royal Lytham & St Annes Golf Club',
                'name'       => 'Championship Links',
                'holes'      => [
                    ['name' => 'Hole 1',  'hole_number' =>  1, 'par' => 3, 'distance' => 206, 'stroke_index' => 15],
                    ['name' => 'Hole 2',  'hole_number' =>  2, 'par' => 4, 'distance' => 436, 'stroke_index' =>  5],
                    ['name' => 'Hole 3',  'hole_number' =>  3, 'par' => 4, 'distance' => 457, 'stroke_index' =>  1],
                    ['name' => 'Hole 4',  'hole_number' =>  4, 'par' => 4, 'distance' => 393, 'stroke_index' =>  9],
                    ['name' => 'Hole 5',  'hole_number' =>  5, 'par' => 3, 'distance' => 188, 'stroke_index' => 17],
                    ['name' => 'Hole 6',  'hole_number' =>  6, 'par' => 4, 'distance' => 486, 'stroke_index' =>  3],
                    ['name' => 'Hole 7',  'hole_number' =>  7, 'par' => 5, 'distance' => 551, 'stroke_index' =>  7],
                    ['name' => 'Hole 8',  'hole_number' =>  8, 'par' => 4, 'distance' => 394, 'stroke_index' => 11],
                    ['name' => 'Hole 9',  'hole_number' =>  9, 'par' => 4, 'distance' => 355, 'stroke_index' => 13],
                    // Back 9: 4+5+3+4+4+4+4+4+4 = 36. Total: 35+36 = 71 ✓
                    ['name' => 'Hole 10', 'hole_number' => 10, 'par' => 4, 'distance' => 334, 'stroke_index' => 18],
                    ['name' => 'Hole 11', 'hole_number' => 11, 'par' => 5, 'distance' => 485, 'stroke_index' =>  2],
                    ['name' => 'Hole 12', 'hole_number' => 12, 'par' => 3, 'distance' => 198, 'stroke_index' => 16],
                    ['name' => 'Hole 13', 'hole_number' => 13, 'par' => 4, 'distance' => 339, 'stroke_index' => 12],
                    ['name' => 'Hole 14', 'hole_number' => 14, 'par' => 4, 'distance' => 445, 'stroke_index' =>  4],
                    ['name' => 'Hole 15', 'hole_number' => 15, 'par' => 4, 'distance' => 462, 'stroke_index' =>  6],
                    ['name' => 'Hole 16', 'hole_number' => 16, 'par' => 4, 'distance' => 356, 'stroke_index' => 14],
                    ['name' => 'Hole 17', 'hole_number' => 17, 'par' => 4, 'distance' => 467, 'stroke_index' => 10],
                    ['name' => 'Hole 18', 'hole_number' => 18, 'par' => 4, 'distance' => 413, 'stroke_index' =>  8],
                ],
            ],

            // Wentworth West — par 72, SSS 74. Front 9 = 35, back 9 = 37.
            [
                'venue_name' => 'Wentworth Club',
                'name'       => 'West Course',
                'holes'      => [
                    ['name' => 'Hole 1',  'hole_number' =>  1, 'par' => 4, 'distance' => 471, 'stroke_index' =>  3],
                    ['name' => 'Hole 2',  'hole_number' =>  2, 'par' => 3, 'distance' => 155, 'stroke_index' => 15],
                    ['name' => 'Hole 3',  'hole_number' =>  3, 'par' => 4, 'distance' => 452, 'stroke_index' =>  5],
                    ['name' => 'Hole 4',  'hole_number' =>  4, 'par' => 4, 'distance' => 501, 'stroke_index' =>  1],
                    ['name' => 'Hole 5',  'hole_number' =>  5, 'par' => 5, 'distance' => 536, 'stroke_index' => 11],
                    ['name' => 'Hole 6',  'hole_number' =>  6, 'par' => 4, 'distance' => 366, 'stroke_index' => 13],
                    ['name' => 'Hole 7',  'hole_number' =>  7, 'par' => 4, 'distance' => 399, 'stroke_index' =>  9],
                    ['name' => 'Hole 8',  'hole_number' =>  8, 'par' => 3, 'distance' => 172, 'stroke_index' => 17],
                    ['name' => 'Hole 9',  'hole_number' =>  9, 'par' => 4, 'distance' => 450, 'stroke_index' =>  7],
                    // Back 9: 5+3+4+5+3+4+5+4+4 = 37. Total 72 ✓
                    ['name' => 'Hole 10', 'hole_number' => 10, 'par' => 5, 'distance' => 490, 'stroke_index' => 18],
                    ['name' => 'Hole 11', 'hole_number' => 11, 'par' => 3, 'distance' => 148, 'stroke_index' => 16],
                    ['name' => 'Hole 12', 'hole_number' => 12, 'par' => 4, 'distance' => 483, 'stroke_index' =>  2],
                    ['name' => 'Hole 13', 'hole_number' => 13, 'par' => 5, 'distance' => 491, 'stroke_index' => 10],
                    ['name' => 'Hole 14', 'hole_number' => 14, 'par' => 3, 'distance' => 179, 'stroke_index' => 12],
                    ['name' => 'Hole 15', 'hole_number' => 15, 'par' => 4, 'distance' => 385, 'stroke_index' => 14],
                    ['name' => 'Hole 16', 'hole_number' => 16, 'par' => 5, 'distance' => 544, 'stroke_index' =>  8],
                    ['name' => 'Hole 17', 'hole_number' => 17, 'par' => 4, 'distance' => 428, 'stroke_index' =>  4],
                    ['name' => 'Hole 18', 'hole_number' => 18, 'par' => 4, 'distance' => 502, 'stroke_index' =>  6],
                ],
            ],

            // Belfry Brabazon — par 72, SSS 73. Front 9 = 35, back 9 = 37.
            [
                'venue_name' => 'The Belfry',
                'name'       => 'Brabazon Course',
                'holes'      => [
                    ['name' => 'Hole 1',  'hole_number' =>  1, 'par' => 4, 'distance' => 411, 'stroke_index' =>  7],
                    ['name' => 'Hole 2',  'hole_number' =>  2, 'par' => 4, 'distance' => 379, 'stroke_index' => 11],
                    ['name' => 'Hole 3',  'hole_number' =>  3, 'par' => 4, 'distance' => 408, 'stroke_index' =>  5],
                    ['name' => 'Hole 4',  'hole_number' =>  4, 'par' => 3, 'distance' => 179, 'stroke_index' => 13],
                    ['name' => 'Hole 5',  'hole_number' =>  5, 'par' => 5, 'distance' => 408, 'stroke_index' => 15],
                    // Hole 5 is short and driveable — famous Brabazon risk/reward
                    ['name' => 'Hole 6',  'hole_number' =>  6, 'par' => 4, 'distance' => 395, 'stroke_index' =>  3],
                    ['name' => 'Hole 7',  'hole_number' =>  7, 'par' => 3, 'distance' => 177, 'stroke_index' => 17],
                    ['name' => 'Hole 8',  'hole_number' =>  8, 'par' => 4, 'distance' => 428, 'stroke_index' =>  1],
                    ['name' => 'Hole 9',  'hole_number' =>  9, 'par' => 4, 'distance' => 433, 'stroke_index' =>  9],
                    // Back 9: 4+3+5+4+4+4+5+4+4 = 37. Total 72 ✓
                    ['name' => 'Hole 10', 'hole_number' => 10, 'par' => 4, 'distance' => 311, 'stroke_index' => 16],
                    ['name' => 'Hole 11', 'hole_number' => 11, 'par' => 3, 'distance' => 170, 'stroke_index' => 14],
                    ['name' => 'Hole 12', 'hole_number' => 12, 'par' => 5, 'distance' => 555, 'stroke_index' =>  6],
                    ['name' => 'Hole 13', 'hole_number' => 13, 'par' => 4, 'distance' => 384, 'stroke_index' =>  8],
                    ['name' => 'Hole 14', 'hole_number' => 14, 'par' => 4, 'distance' => 390, 'stroke_index' => 18],
                    ['name' => 'Hole 15', 'hole_number' => 15, 'par' => 4, 'distance' => 545, 'stroke_index' =>  2],
                    ['name' => 'Hole 16', 'hole_number' => 16, 'par' => 5, 'distance' => 542, 'stroke_index' => 10],
                    ['name' => 'Hole 17', 'hole_number' => 17, 'par' => 4, 'distance' => 564, 'stroke_index' =>  4],
                    // 15, 17 and 18 are famously long par 4s at the Brabazon
                    ['name' => 'Hole 18', 'hole_number' => 18, 'par' => 4, 'distance' => 473, 'stroke_index' => 12],
                ],
            ],

            // Moortown — par 71, SSS 71. Front 9 = 35, back 9 = 36.
            [
                'venue_name' => 'Moortown Golf Club',
                'name'       => 'Moortown',
                'holes'      => [
                    ['name' => 'Hole 1',  'hole_number' =>  1, 'par' => 4, 'distance' => 405, 'stroke_index' =>  7],
                    ['name' => 'Hole 2',  'hole_number' =>  2, 'par' => 4, 'distance' => 393, 'stroke_index' =>  3],
                    ['name' => 'Hole 3',  'hole_number' =>  3, 'par' => 5, 'distance' => 515, 'stroke_index' => 11],
                    ['name' => 'Hole 4',  'hole_number' =>  4, 'par' => 3, 'distance' => 181, 'stroke_index' => 15],
                    ['name' => 'Hole 5',  'hole_number' =>  5, 'par' => 4, 'distance' => 421, 'stroke_index' =>  1],
                    ['name' => 'Hole 6',  'hole_number' =>  6, 'par' => 4, 'distance' => 362, 'stroke_index' => 13],
                    ['name' => 'Hole 7',  'hole_number' =>  7, 'par' => 4, 'distance' => 354, 'stroke_index' => 17],
                    ['name' => 'Hole 8',  'hole_number' =>  8, 'par' => 4, 'distance' => 437, 'stroke_index' =>  5],
                    ['name' => 'Hole 9',  'hole_number' =>  9, 'par' => 3, 'distance' => 154, 'stroke_index' => 18],
                    // Back 9: 4+4+3+4+5+4+4+4+4 = 36. Total 71 ✓
                    ['name' => 'Hole 10', 'hole_number' => 10, 'par' => 4, 'distance' => 333, 'stroke_index' => 16],
                    ['name' => 'Hole 11', 'hole_number' => 11, 'par' => 4, 'distance' => 448, 'stroke_index' =>  2],
                    ['name' => 'Hole 12', 'hole_number' => 12, 'par' => 3, 'distance' => 192, 'stroke_index' => 14],
                    ['name' => 'Hole 13', 'hole_number' => 13, 'par' => 4, 'distance' => 374, 'stroke_index' =>  8],
                    ['name' => 'Hole 14', 'hole_number' => 14, 'par' => 5, 'distance' => 499, 'stroke_index' => 10],
                    ['name' => 'Hole 15', 'hole_number' => 15, 'par' => 4, 'distance' => 419, 'stroke_index' =>  4],
                    ['name' => 'Hole 16', 'hole_number' => 16, 'par' => 4, 'distance' => 389, 'stroke_index' =>  6],
                    ['name' => 'Hole 17', 'hole_number' => 17, 'par' => 4, 'distance' => 345, 'stroke_index' => 12],
                    ['name' => 'Hole 18', 'hole_number' => 18, 'par' => 4, 'distance' => 432, 'stroke_index' =>  9],
                ],
            ],

            // Formby Links — par 72, SSS 72. Front 9 = 35, back 9 = 37.
            [
                'venue_name' => 'Formby Golf Club',
                'name'       => 'Formby Links',
                'holes'      => [
                    ['name' => 'Hole 1',  'hole_number' =>  1, 'par' => 4, 'distance' => 393, 'stroke_index' =>  9],
                    ['name' => 'Hole 2',  'hole_number' =>  2, 'par' => 4, 'distance' => 441, 'stroke_index' =>  3],
                    ['name' => 'Hole 3',  'hole_number' =>  3, 'par' => 4, 'distance' => 386, 'stroke_index' => 11],
                    ['name' => 'Hole 4',  'hole_number' =>  4, 'par' => 5, 'distance' => 503, 'stroke_index' =>  7],
                    ['name' => 'Hole 5',  'hole_number' =>  5, 'par' => 3, 'distance' => 149, 'stroke_index' => 17],
                    ['name' => 'Hole 6',  'hole_number' =>  6, 'par' => 4, 'distance' => 414, 'stroke_index' =>  5],
                    ['name' => 'Hole 7',  'hole_number' =>  7, 'par' => 4, 'distance' => 464, 'stroke_index' =>  1],
                    ['name' => 'Hole 8',  'hole_number' =>  8, 'par' => 3, 'distance' => 166, 'stroke_index' => 15],
                    ['name' => 'Hole 9',  'hole_number' =>  9, 'par' => 4, 'distance' => 425, 'stroke_index' => 13],
                    // Back 9: 5+5+4+3+4+4+5+3+4 = 37. Total 72 ✓
                    ['name' => 'Hole 10', 'hole_number' => 10, 'par' => 5, 'distance' => 517, 'stroke_index' => 10],
                    ['name' => 'Hole 11', 'hole_number' => 11, 'par' => 5, 'distance' => 531, 'stroke_index' =>  6],
                    ['name' => 'Hole 12', 'hole_number' => 12, 'par' => 4, 'distance' => 401, 'stroke_index' =>  4],
                    ['name' => 'Hole 13', 'hole_number' => 13, 'par' => 3, 'distance' => 157, 'stroke_index' => 16],
                    ['name' => 'Hole 14', 'hole_number' => 14, 'par' => 4, 'distance' => 432, 'stroke_index' =>  2],
                    ['name' => 'Hole 15', 'hole_number' => 15, 'par' => 4, 'distance' => 377, 'stroke_index' => 12],
                    ['name' => 'Hole 16', 'hole_number' => 16, 'par' => 5, 'distance' => 518, 'stroke_index' =>  8],
                    ['name' => 'Hole 17', 'hole_number' => 17, 'par' => 3, 'distance' => 196, 'stroke_index' => 18],
                    ['name' => 'Hole 18', 'hole_number' => 18, 'par' => 4, 'distance' => 448, 'stroke_index' => 14],
                ],
            ],
        ];
    }
}
