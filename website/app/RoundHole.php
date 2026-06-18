<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RoundHole
 *
 * @property int $id
 * @property int $version
 * @property int $round_id
 * @property int $hole_id
 * @property int $calculated
 * @property int $dummy
 * @property int $num_strokes
 * @property int $adjusted_strokes
 * @property int $nett_strokes
 * @property int $score
 * @property int $num_fairways
 * @property int $num_girs
 * @property int $num_sand_saves
 * @property int $num_putts
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereAdjustedStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereCalculated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereDummy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereHoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereNettStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereNumFairways($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereNumGirs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereNumPutts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereNumSandSaves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereNumStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereRoundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoundHole whereVersion($value)
 * @mixin \Eloquent
 */
class RoundHole extends Model
{
    //
}
