<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ViewTimelines extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        DB::statement('
        CREATE SQL SECURITY INVOKER VIEW vw_timeline_rounds AS
        SELECT "round" as type, played_at as theTime, user_id, users.email as user_email,
        users.photo_url as photo_url,
        users.name as user_name, course_id, courses.name as course_name,
        venue_id, venues.name as venue_name,
        rounds.holes_played as arg1,
        rounds.num_strokes as arg2,
        rounds.total_score as arg3,
        "" as arg4, "" as arg5, "" as arg6, "" as arg7,
        "" as arg8, "" as arg9, "" as arg10
        FROM rounds
        INNER JOIN users
        ON rounds.user_id = users.id
        INNER JOIN courses
        ON rounds.course_id = courses.id
        INNER JOIN venues
        ON courses.venue_id = venues.id
        ORDER BY rounds.played_at DESC;
        ');
        
        DB::statement('
        CREATE SQL SECURITY INVOKER VIEW vw_timelines AS
        SELECT vw_timeline_rounds.*
        FROM vw_timeline_rounds
        ORDER BY theTime DESC;
        ');
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vw_timelines');
        DB::statement('DROP VIEW IF EXISTS vw_timeline_rounds');
    }
}