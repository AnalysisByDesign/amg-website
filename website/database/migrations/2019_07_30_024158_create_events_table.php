<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('version')->default(1)->unsigned();
            $table->integer('creator_id')->default(0)->unsigned();

            $table->tinyInteger('sss')->default(0)->unsigned();
            $table->tinyInteger('css')->default(0)->unsigned();

            $table->tinyInteger('calculated')->default(0)->unsigned();
            $table->tinyInteger('dummy')->default(0)->unsigned();

            $table->tinyInteger('winner')->default(0)->unsigned();
            $table->tinyInteger('second')->default(0)->unsigned();
            $table->tinyInteger('third')->default(0)->unsigned();
            $table->tinyInteger('front9')->default(0)->unsigned();
            $table->tinyInteger('back9')->default(0)->unsigned();

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
        Schema::dropIfExists('events');
    }
}
