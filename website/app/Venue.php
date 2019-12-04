<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Venue
 *
 * @property int $id
 * @property int $version
 * @property string $name
 * @property string|null $phone
 * @property string|null $venue_url
 * @property string|null $golf_guide_url
 * @property string|null $last_played_at
 * @property int $dummy
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
 * @property string|null $postcode
 * @property string|null $location
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereAdjustedStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereDummy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereGolfGuideUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereLastPlayedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereNettStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereNumComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereNumFairways($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereNumGirs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereNumPutts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereNumRounds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereNumSandSaves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereNumStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereTotalScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereVenueUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Venue whereVersion($value)
 * @mixin \Eloquent
 */
class Venue extends Model
{
    //
}
