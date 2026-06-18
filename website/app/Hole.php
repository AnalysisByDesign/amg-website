<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Hole
 *
 * @property int $id
 * @property int $version
 * @property string $name
 * @property int $course_id
 * @property int $hole_number
 * @property int $current
 * @property string|null $last_played_at
 * @property int $dummy
 * @property int $num_played
 * @property int $num_strokes
 * @property int $adjusted_strokes
 * @property int $nett_strokes
 * @property int $num_fairways
 * @property int $num_girs
 * @property int $num_sand_saves
 * @property int $num_putts
 * @property int $total_score
 * @property int $tee
 * @property int|null $distance
 * @property int|null $stroke_index
 * @property int|null $slope
 * @property int|null $par
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereAdjustedStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereDummy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereHoleNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereLastPlayedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereNettStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereNumFairways($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereNumGirs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereNumPlayed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereNumPutts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereNumSandSaves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereNumStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole wherePar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereSlope($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereStrokeIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereTee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereTotalScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hole whereVersion($value)
 * @mixin \Eloquent
 */
class Hole extends Model
{
    //
}
