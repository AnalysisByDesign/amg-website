<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundHolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('round_holes', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('version')->default(1)->unsigned();
            $table->integer('round_id')->default(0)->unsigned();
            $table->integer('hole_id')->default(0)->unsigned();

            $table->tinyInteger('calculated')->default(0)->unsigned();

            $table->tinyInteger('dummy')->default(0)->unsigned();
            $table->tinyInteger('num_strokes')->default(0)->unsigned();
            $table->tinyInteger('adjusted_strokes')->default(0)->unsigned();
            $table->tinyInteger('nett_strokes')->default(0)->unsigned();

            // Calculated based against the nett_strokes
            $table->tinyInteger('score')->default(0)->unsigned();

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
        Schema::drop('round_holes');
    }
}
