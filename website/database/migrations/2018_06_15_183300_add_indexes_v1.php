<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexesV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add index(s) to the venues table
        Schema::table('venues', function ($table) {
            $table->index(['name']);
        });

        // Add index(s) to the courses table
        Schema::table('courses', function ($table) {
            $table->unique(['venue_id', 'name']);
        });

        // Add index(s) to the holes table
        Schema::table('holes', function ($table) {
            $table->unique(['course_id', 'hole_number', 'tee']);
        });

        // Add index(s) to the rounds table
        Schema::table('rounds', function ($table) {
            $table->unique(['user_id', 'course_id', 'played_at']);
            $table->unique(['played_at', 'course_id', 'user_id']);
            $table->index(['calculated']);
        });

        // Add index(s) to the round_holes table
        Schema::table('round_holes', function ($table) {
            $table->unique(['round_id', 'hole_id']);
            $table->index(['calculated', 'round_id']);
            $table->index(['calculated', 'hole_id']);
        });

        // Add index(s) to the dim_score_calc table
        Schema::table('dim_score_calc', function ($table) {
            $table->unique(['handicap', 'stroke_index']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop index(s) from the venues table
        Schema::table('venues', function ($table) {
            $table->dropIndex(['name']);
        });

        // Drop index(s) from the courses table
        Schema::table('courses', function ($table) {
            $table->dropUnique(['venue_id', 'name']);
        });

        // Drop index(s) from the holes table
        Schema::table('holes', function ($table) {
            $table->dropUnique(['course_id', 'hole_number', 'tee']);
        });

        // Drop index(s) from the rounds table
        Schema::table('rounds', function ($table) {
            $table->dropUnique(['user_id', 'course_id', 'played_at']);
            $table->dropUnique(['played_at', 'course_id', 'user_id']);
            $table->dropIndex(['calculated']);
        });

        // Drop index(s) from the round_holes table
        Schema::table('round_holes', function ($table) {
            $table->dropUnique(['round_id', 'hole_id']);
            $table->dropIndex(['calculated', 'round_id']);
            $table->dropIndex(['calculated', 'hole_id']);
        });

        // Drop index(s) from the round_holes table
        Schema::table('dim_score_calc', function ($table) {
            $table->dropUnique(['handicap', 'stroke_index']);
        });
    }
}
