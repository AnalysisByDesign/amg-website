<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('VenueSeeder');
        $this->call('CourseSeeder');
        $this->call('UserSeeder');
        $this->call('EventSeeder');
        $this->call('RoundSeeder');
    }
}
