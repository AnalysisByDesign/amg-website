<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Course
 *
 * @property int $id
 * @property int $version
 * @property string $name
 * @property int $venue_id
 * @property string $measure
 * @property string|null $last_played_at
 * @property int $dummy
 * @property int $num_players
 * @property int $num_rounds
 * @property int $num_complete
 * @property int $total_score
 * @property int $num_strokes
 * @property int $adjusted_strokes
 * @property int $nett_strokes
 * @property int $num_fairways
 * @property int $num_girs
 * @property int $num_sand_saves
 * @property int $num_putts
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereAdjustedStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereDummy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereLastPlayedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereMeasure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNettStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNumComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNumFairways($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNumGirs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNumPlayers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNumPutts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNumRounds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNumSandSaves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNumStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereTotalScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereVenueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereVersion($value)
 * @mixin \Eloquent
 */
class Course extends Model
{
    //
}
