<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\VwTimelineRounds
 *
 * @property string $type
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $theTime
 * @property int $user_id
 * @property string $user_email
 * @property string|null $photo_url
 * @property string $user_name
 * @property int $venue_id
 * @property string $venue_name
 * @property int $course_id
 * @property string $course_name
 * @property int $round_id
 * @property int $arg1
 * @property int $arg2
 * @property int $arg3
 * @property string $arg4
 * @property string $arg5
 * @property string $arg6
 * @property string $arg7
 * @property string $arg8
 * @property string $arg9
 * @property string $arg10
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereArg9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereCourseName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereRoundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereTheTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereUserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereVenueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VwTimelineRounds whereVenueName($value)
 * @mixin \Eloquent
 */
class VwTimelineRounds extends Model
{
    /**
    * The attributes that should be cast as dates
    *
    * @var array
    */
    protected $dates = [
    'theTime'
    ];
}