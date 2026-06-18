<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holes', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('version')->default(1)->unsigned();
            $table->string('name');
            $table->integer('course_id')->default(0)->unsigned();
            $table->tinyInteger('hole_number')->unsigned();
            $table->tinyInteger('current')->default(1)->unsigned();
            $table->dateTime('last_played_at')->nullable();
            
            $table->tinyInteger('dummy')->default(0)->unsigned();
            $table->mediumInteger('num_played')->default(0)->unsigned();
            $table->mediumInteger('num_strokes')->default(0)->unsigned();
            $table->mediumInteger('adjusted_strokes')->default(0)->unsigned();
            $table->mediumInteger('nett_strokes')->default(0)->unsigned();
            $table->mediumInteger('num_fairways')->default(0)->unsigned();
            $table->mediumInteger('num_girs')->default(0)->unsigned();
            $table->mediumInteger('num_sand_saves')->default(0)->unsigned();
            $table->mediumInteger('num_putts')->default(0)->unsigned();
            $table->mediumInteger('total_score')->default(0)->unsigned();

            $table->tinyInteger('tee')->default(1)->unsigned();
            $table->smallInteger('distance')->unsigned()->nullable();
            $table->tinyInteger('stroke_index')->unsigned()->nullable();
            $table->tinyInteger('slope')->unsigned()->nullable();
            $table->tinyInteger('par')->unsigned()->nullable();

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
        Schema::drop('holes');
    }
}
