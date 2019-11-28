<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('version')->default(1)->unsigned();
            $table->integer('user_id')->default(0)->unsigned();
            $table->integer('event_id')->default(0)->unsigned();
            $table->integer('course_id')->default(0)->unsigned();

            $table->tinyInteger('tee')->default(1)->unsigned();
            $table->dateTime('played_at')->nullable();
            $table->tinyInteger('round_holes')->default(0)->unsigned();
            $table->tinyInteger('holes_played')->default(0)->unsigned();
            $table->tinyInteger('complete')->default(0)->unsigned();
            $table->tinyInteger('sss')->default(0)->unsigned();
            $table->tinyInteger('par')->default(0)->unsigned();

            $table->tinyInteger('handicap_exact')->default(0)->unsigned();
            $table->tinyInteger('handicap_adjustment')->default(0)->unsigned();
            $table->tinyInteger('handicap_round_adjustment')->default(0)->unsigned();
            $table->tinyInteger('handicap_round')->default(0)->unsigned();
            $table->tinyInteger('total_score')->default(0)->unsigned();

            $table->tinyInteger('calculated')->default(0)->unsigned();
            $table->tinyInteger('dummy')->default(0)->unsigned();
            $table->tinyInteger('num_strokes')->default(0)->unsigned();
            $table->tinyInteger('adjusted_strokes')->default(0)->unsigned();
            $table->tinyInteger('nett_strokes')->default(0)->unsigned();
            $table->tinyInteger('num_fairways')->default(0)->unsigned();
            $table->tinyInteger('num_girs')->default(0)->unsigned();
            $table->tinyInteger('num_sand_saves')->default(0)->unsigned();
            $table->tinyInteger('num_putts')->default(0)->unsigned();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rounds');
    }
}
