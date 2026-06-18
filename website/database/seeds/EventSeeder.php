<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run()
    {
        $firstUserId = DB::table('users')->orderBy('id')->value('id');

        $courses = DB::table('courses')
            ->join('venues', 'courses.venue_id', '=', 'venues.id')
            ->select('courses.id as course_id', 'venues.name as venue_name', 'courses.name as course_name')
            ->orderBy('courses.id')
            ->get()
            ->keyBy('course_name');

        $events = [
            [
                'course'     => 'Championship Links',
                'sss'        => 74,
                'css'        => 74,
                'played_at'  => '2024-05-11',
            ],
            [
                'course'     => 'West Course',
                'sss'        => 74,
                'css'        => 75,
                'played_at'  => '2024-07-20',
            ],
            [
                'course'     => 'Brabazon Course',
                'sss'        => 73,
                'css'        => 73,
                'played_at'  => '2024-09-07',
            ],
            [
                'course'     => 'Moortown',
                'sss'        => 71,
                'css'        => 70,
                'played_at'  => '2025-04-26',
            ],
            [
                'course'     => 'Formby Links',
                'sss'        => 72,
                'css'        => 72,
                'played_at'  => '2025-06-14',
            ],
            [
                'course'     => 'Championship Links',
                'sss'        => 74,
                'css'        => 73,
                'played_at'  => '2025-09-06',
            ],
        ];

        foreach ($events as $event) {
            DB::table('events')->insert([
                'creator_id' => $firstUserId,
                'sss'        => $event['sss'],
                'css'        => $event['css'],
                'calculated' => 0,
                'dummy'      => 0,
                'winner'     => 0,
                'second'     => 0,
                'third'      => 0,
                'front9'     => 0,
                'back9'      => 0,
                'created_at' => $event['played_at'],
                'updated_at' => $event['played_at'],
            ]);
        }

        // Store played_at and course_id as metadata on the event via a temporary lookup structure.
        // The events table has no course_id or played_at column — that lives on rounds.
        // We store them in a static map in RoundSeeder so both seeders share the same source of truth.
    }
}
