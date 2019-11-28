<?php

namespace App;

use Laravel\Spark\CanJoinTeams;
use Laravel\Spark\User as SparkUser;

/**
 * App\User
 *
 * @property int $id
 * @property int $version
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $photo_url
 * @property bool $uses_two_factor_auth
 * @property string|null $authy_id
 * @property string|null $country_code
 * @property string|null $phone
 * @property string|null $two_factor_reset_code
 * @property int|null $current_team_id
 * @property string|null $braintree_id
 * @property string|null $current_billing_plan
 * @property string|null $paypal_email
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $extra_billing_information
 * @property \Illuminate\Support\Carbon|null $trial_ends_at
 * @property string|null $last_read_announcements_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $gender
 * @property string|null $web_url
 * @property string|null $dob
 * @property string|null $last_login_at
 * @property string|null $last_played_at
 * @property float $amg_handicap
 * @property float|null $official_handicap
 * @property int $dummy
 * @property int $num_rounds
 * @property int $num_complete
 * @property int $num_fairways
 * @property int $num_girs
 * @property int $num_sand_saves
 * @property int $num_putts
 * @property int $num_strokes
 * @property int $num_logins
 * @property string|null $last_login_fail_at
 * @property int $num_login_fails
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|null $current_team
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\Invitation[] $invitations
 * @property-read int|null $invitations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\LocalInvoice[] $localInvoices
 * @property-read int|null $local_invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Team[] $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\Subscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Team[] $teams
 * @property-read int|null $teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAmgHandicap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAuthyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBraintreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCurrentBillingPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDummy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereExtraBillingInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLoginFailAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastPlayedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastReadAnnouncementsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumFairways($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumGirs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumLoginFails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumLogins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumPutts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumRounds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumSandSaves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumStrokes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOfficialHandicap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePaypalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTwoFactorResetCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsesTwoFactorAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWebUrl($value)
 * @mixin \Eloquent
 */
class User extends SparkUser
{
    use CanJoinTeams;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
        'uses_two_factor_auth' => 'boolean',
    ];
}
