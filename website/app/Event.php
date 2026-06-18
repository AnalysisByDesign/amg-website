<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Event
 *
 * @property int $id
 * @property int $version
 * @property int $creator_id
 * @property int $sss
 * @property int $css
 * @property int $calculated
 * @property int $dummy
 * @property int $winner
 * @property int $second
 * @property int $third
 * @property int $front9
 * @property int $back9
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereBack9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCalculated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDummy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereFront9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereSecond($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereSss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereThird($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereWinner($value)
 * @mixin \Eloquent
 */
class Event extends Model
{
    //
}
