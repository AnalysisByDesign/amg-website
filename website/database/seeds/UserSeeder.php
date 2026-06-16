<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'James Hartley',    'email' => 'james.hartley@gmail.com',    'gender' => 'Male',   'dob' => '1975-03-14', 'amg_handicap' => 12.4, 'official_handicap' => 11.2],
            ['name' => 'Robert Caldwell',  'email' => 'robert.caldwell@gmail.com',  'gender' => 'Male',   'dob' => '1968-09-22', 'amg_handicap' => 18.6, 'official_handicap' => 17.8],
            ['name' => 'Andrew Fletcher',  'email' => 'andrew.fletcher@gmail.com',  'gender' => 'Male',   'dob' => '1982-07-05', 'amg_handicap' =>  8.2, 'official_handicap' =>  9.0],
            ['name' => 'Susan Dempsey',    'email' => 'susan.dempsey@gmail.com',    'gender' => 'Female', 'dob' => '1979-11-30', 'amg_handicap' => 22.0, 'official_handicap' => 23.4],
            ['name' => 'David Morrison',   'email' => 'david.morrison@gmail.com',   'gender' => 'Male',   'dob' => '1971-05-18', 'amg_handicap' => 14.8, 'official_handicap' => 14.0],
            ['name' => 'Karen Whitfield',  'email' => 'karen.whitfield@gmail.com',  'gender' => 'Female', 'dob' => '1985-02-09', 'amg_handicap' => 28.0, 'official_handicap' => 26.6],
            ['name' => 'Thomas Sutherland','email' => 'thomas.sutherland@gmail.com','gender' => 'Male',   'dob' => '1977-08-27', 'amg_handicap' => 10.6, 'official_handicap' => 12.2],
            ['name' => 'Ian Macgregor',    'email' => 'ian.macgregor@gmail.com',    'gender' => 'Male',   'dob' => '1965-12-03', 'amg_handicap' => 24.2, 'official_handicap' => 24.8],
            ['name' => 'Patricia Nolan',   'email' => 'patricia.nolan@gmail.com',   'gender' => 'Female', 'dob' => '1988-04-16', 'amg_handicap' => 16.4, 'official_handicap' => 15.6],
            ['name' => 'Stephen Barker',   'email' => 'stephen.barker@gmail.com',   'gender' => 'Male',   'dob' => '1980-10-11', 'amg_handicap' => 20.8, 'official_handicap' => 22.0],
            ['name' => 'Michael Jennings', 'email' => 'michael.jennings@gmail.com', 'gender' => 'Male',   'dob' => '1973-06-25', 'amg_handicap' =>  9.4, 'official_handicap' =>  8.8],
            ['name' => 'Caroline Forsyth', 'email' => 'caroline.forsyth@gmail.com', 'gender' => 'Female', 'dob' => '1983-01-07', 'amg_handicap' => 19.0, 'official_handicap' => 20.2],
        ];

        $password = bcrypt('password');

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name'              => $user['name'],
                'email'             => $user['email'],
                'password'          => $password,
                'gender'            => $user['gender'],
                'dob'               => $user['dob'],
                'amg_handicap'      => $user['amg_handicap'],
                'official_handicap' => $user['official_handicap'],
                'dummy'             => 0,
                'num_rounds'        => 0,
                'num_complete'      => 0,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }
}
