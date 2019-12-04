<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Address
 *
 * @property int $id
 * @property int $version
 * @property string $street1
 * @property string $street2
 * @property string $street3
 * @property string $city
 * @property string $county
 * @property string $postcode
 * @property string $latitude
 * @property string $longitude
 * @property string $whatthreewords
 * @property string $urlGoogleMap
 * @property int $dummy
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereDummy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUrlGoogleMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereWhatthreewords($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    //
}
