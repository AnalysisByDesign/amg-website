<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Round
 *
 * @property int $id
 * @property int $version
 * @property int $user_id
 * @property int $event_id
 * @property int $course_id
 * @property int $tee
 * @property string|null $played_at
 * @property int $round_holes
 * @property int $holes_played
 * @property int $complete
 * @property int $sss
 * @property int $par
 * @property int $handicap_exact
 * @property int $handicap_adjustment
 * @property int $handicap_round_adjustment
 * @property int $handicap_round
 * @property int $total_score
 * @property int $calculated
 * @property int $dummy
 * @property int $num_strokes
 * @property int $adjusted_strokes
 * @property int $nett_strokes
 * @property int $num_fairways
 * @property int $num_girs
 * @property int $num_sand_saves
 * @property int $num_putts
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereAdjustedStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereCalculated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereDummy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereHandicapAdjustment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereHandicapExact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereHandicapRound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereHandicapRoundAdjustment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereHolesPlayed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereNettStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereNumFairways($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereNumGirs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereNumPutts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereNumSandSaves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereNumStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round wherePar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round wherePlayedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereRoundHoles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereSss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereTee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereTotalScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereVersion($value)
 * @mixin \Eloquent
 */
class Round extends Model
{
    //
}
