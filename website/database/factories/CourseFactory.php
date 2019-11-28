<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Course::class, function (Faker $faker) {
    static $venue_id;

    return [
        'name'         => $faker->randomNumber(5),
        'venue_id'     => $venue_id,
        'dummy'        => 1,

    ];
});
