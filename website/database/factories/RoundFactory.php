<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Round::class, function (Faker $faker) {
    static $user_id;
    static $course_id;

    return [
        'user_id'         => $user_id,
        'course_id'     => $course_id,
        'played_at'     => $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now', $timezone = date_default_timezone_get()),
        'dummy'         => 1,
        'tee'           => random_int(1, 4),
    ];
});
