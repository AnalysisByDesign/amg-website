<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimScoreCalcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_score_calc', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('version')->default(1)->unsigned();
            $table->tinyInteger('handicap')->default(0);
            $table->tinyInteger('stroke_index')->default(0)->unsigned();
            $table->tinyInteger('adjustment')->default(0);
        });

        // Loop round for all the handicaps we will cater for
        for ( $i = -18; $i <= 54; $i++ ) {

            // And another loop for all the stroke indexes
            for ( $j = 1; $j <= 18; $j++ ) {

                // Set a default first
                $adjustment = 0;

                if ( $i < 0 ) {

                    // Negative handicaps are for professionals, e.g. +2
                    // A +2 handicap has par _reduced_ on the two easiest holes
                    if ( (19 - $j) <= abs($i) ) {
                        $adjustment = -1;
                    }


                } elseif ( $i <= 18 ) {

                    // A handicap of less than or equal to 18 is easy
                    if ( $j <= $i ) {
                        // The stroke index is less than or equal to the handicap
                        $adjustment = 1;
                    }

                } elseif ( $i <= 36 ) {

                    // A handicap of less than or equal to 18 is easy
                    if ( $j <= ( $i - 18 ) ) {
                        $adjustment = 2;
                    } else {
                        $adjustment = 1;
                    }

                } elseif ( $i <= 54 ) {

                    // A handicap of less than or equal to 18 is easy
                    if ( $j <= ( $i - 36 ) ) {
                        $adjustment = 3;
                    } else {
                        $adjustment = 2;
                    }

                }

                DB::table('dim_score_calc')->insert(
                    ['handicap' => $i , 'stroke_index' => $j, 'adjustment' => $adjustment]
                    );
            }
        }



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dim_score_calc');
    }
}
