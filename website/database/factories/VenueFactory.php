<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Venue::class, function (Faker $faker) {
    return [
        'name'                 => $faker->company,
        'phone'             => $faker->optional()->e164PhoneNumber,
        'venue_url'         => $faker->optional($weight = 0.9)->url,
        'golf_guide_url'     => $faker->optional($weight = 0.9)->url,
        'dummy'             => 1,

    ];
});
