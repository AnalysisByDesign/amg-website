<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the user table seeds for defined test users.
     *
     * @return void
     */
    public function run()
    {
        $primaryUsers = DB::table('users')-> where('email', '=', 'dave@analysisbydesign.co.uk')->get();
        if ( $primaryUsers->count() == 0 ) {
            DB::table('users')->insert([
                'name' => 'Dave Rix',
                'email' => 'dave@analysisbydesign.co.uk',
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
