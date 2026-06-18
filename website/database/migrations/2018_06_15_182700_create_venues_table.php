<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('version')->default(1)->unsigned();
            $table->string('name');
            $table->string('phone', 25)->nullable();
            $table->text('venue_url')->nullable();
            $table->text('golf_guide_url')->nullable();
            $table->dateTime('last_played_at')->nullable();

            $table->tinyInteger('dummy')->default(0)->unsigned();
            $table->mediumInteger('num_rounds')->default(0)->unsigned();
            $table->mediumInteger('num_complete')->default(0)->unsigned();
            $table->mediumInteger('total_score')->default(0)->unsigned();
            $table->mediumInteger('num_strokes')->default(0)->unsigned();
            $table->mediumInteger('adjusted_strokes')->default(0)->unsigned();
            $table->mediumInteger('nett_strokes')->default(0)->unsigned();
            $table->mediumInteger('num_fairways')->default(0)->unsigned();
            $table->mediumInteger('num_girs')->default(0)->unsigned();
            $table->mediumInteger('num_sand_saves')->default(0)->unsigned();
            $table->mediumInteger('num_putts')->default(0)->unsigned();

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
        Schema::drop('venues');
    }
}
