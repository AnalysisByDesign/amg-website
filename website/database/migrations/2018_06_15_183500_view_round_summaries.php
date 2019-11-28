<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ViewRoundSummaries extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        
        // This view pair will eventually be replaced with one that does
        // actually calculate the adjusted and nett strokes based on
        // the handicaps for that round
        DB::statement('
        CREATE SQL SECURITY INVOKER VIEW vw_stroke_pre_calcs AS
        SELECT  rh.id as round_hole_id,
        rh.round_id,
        rh.hole_id,
        rh.calculated,
        rh.num_strokes,
        r.tee,
        r.handicap_round,
        h.par,
        h.stroke_index,
        h.slope,
        st.adjustment,
        h.par + 2 AS capped_strokes,
        IF(rh.num_strokes = 0, 0, rh.num_strokes - st.adjustment) AS nett_strokes
        FROM rounds AS r
        INNER JOIN round_holes AS rh
        ON  r.id       = rh.round_id
        INNER JOIN holes AS h
        ON  rh.hole_id = h.id
        AND r.tee      = h.tee
        INNER JOIN dim_score_calc AS st
        ON  h.stroke_index   = st.stroke_index
        AND r.handicap_round = st.handicap
        WHERE rh.calculated = 0;
        ');
        
        DB::statement('
        CREATE SQL SECURITY INVOKER VIEW vw_stroke_calculations AS
        SELECT  vw_stroke_pre_calcs.*,
        IF( capped_strokes > num_strokes, capped_strokes, num_strokes ) as adjusted_strokes,
        IF( par - nett_strokes < -2, 0, par - nett_strokes + 2 ) AS score
        FROM vw_stroke_pre_calcs;
        ');
        
        // This view calculates summaries for the rounds
        DB::statement('
        CREATE SQL SECURITY INVOKER VIEW vw_round_summaries AS
        SELECT round_id,
        count(1)                    AS holes_played,
        sum(rh.num_strokes)         AS num_strokes,
        sum(rh.adjusted_strokes)    AS adjusted_strokes,
        sum(rh.nett_strokes)        AS nett_strokes,
        sum(rh.num_fairways)        AS num_fairways,
        sum(rh.num_girs)            AS num_girs,
        sum(rh.num_sand_saves)      AS num_sand_saves,
        sum(rh.num_putts)           AS num_putts,
        sum(rh.score)               AS total_score
        FROM round_holes AS rh
        WHERE rh.calculated = 1
        GROUP BY round_id;
        ');
        
        // This view calculates summaries for the holes
        DB::statement('
        CREATE SQL SECURITY INVOKER VIEW vw_hole_summaries AS
        SELECT hole_id,
        count(1)                    AS num_played,
        sum(rh.num_strokes)         AS num_strokes,
        sum(rh.adjusted_strokes)    AS adjusted_strokes,
        sum(rh.nett_strokes)        AS nett_strokes,
        sum(rh.num_fairways)        AS num_fairways,
        sum(rh.num_girs)            AS num_girs,
        sum(rh.num_sand_saves)      AS num_sand_saves,
        sum(rh.num_putts)           AS num_putts,
        sum(rh.score)               AS total_score
        FROM round_holes AS rh
        WHERE rh.calculated = 1
        GROUP BY hole_id;
        ');
        
        // This view takes the rounds, and summarises them by course
        DB::statement('
        CREATE SQL SECURITY INVOKER VIEW vw_course_summaries AS
        SELECT course_id, tee, r.calculated,
        max(r.played_at)       AS last_played_at,
        count(distinct r.user_id)   AS num_players,
        count(r.user_id)            AS num_rounds,
        sum(r.complete)             AS num_complete,
        sum(r.total_score)          AS total_score,
        sum(r.num_strokes)          AS num_strokes,
        sum(r.adjusted_strokes)     AS adjusted_strokes,
        sum(r.nett_strokes)         AS nett_strokes,
        sum(r.num_fairways)         AS num_fairways,
        sum(r.num_girs)             AS num_girs,
        sum(r.num_sand_saves)       AS num_sand_saves,
        sum(r.num_putts)            AS num_putts
        FROM rounds AS r
        GROUP BY course_id, tee, r.calculated;
        ');
        
        // This view takes the courses, and summarises them by venue
        DB::statement('
        CREATE SQL SECURITY INVOKER VIEW vw_venue_summaries AS
        SELECT venue_id,
        max(c.last_played_at)       AS last_played_at,
        sum(c.num_rounds)           AS num_rounds,
        sum(c.num_complete)         AS num_complete,
        sum(c.total_score)          AS total_score,
        sum(c.num_strokes)          AS num_strokes,
        sum(c.adjusted_strokes)     AS adjusted_strokes,
        sum(c.nett_strokes)         AS nett_strokes,
        sum(c.num_fairways)         AS num_fairways,
        sum(c.num_girs)             AS num_girs,
        sum(c.num_sand_saves)       AS num_sand_saves,
        sum(c.num_putts)            AS num_putts
        FROM courses AS c
        GROUP BY venue_id;
        ');
        
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vw_venue_summaries');
        DB::statement('DROP VIEW IF EXISTS vw_course_summaries');
        DB::statement('DROP VIEW IF EXISTS vw_hole_summaries');
        DB::statement('DROP VIEW IF EXISTS vw_round_summaries');
        DB::statement('DROP VIEW IF EXISTS vw_stroke_calculations');
        DB::statement('DROP VIEW IF EXISTS vw_stroke_pre_calcs');
        
    }
}