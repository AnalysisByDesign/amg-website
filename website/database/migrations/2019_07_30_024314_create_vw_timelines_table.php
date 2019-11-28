<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVwTimelinesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        DB::statement('DROP VIEW IF EXISTS vw_timelines');
        
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
    }
}