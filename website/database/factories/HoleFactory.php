<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Hole::class, function (Faker $faker) {
    static $course_id;
    static $hole_number;
    static $stroke_index;
    static $slope;
    static $tee;

    return [
        'name'         => $faker->randomNumber(5),
        'course_id'    => $course_id,
        'hole_number'  => $hole_number,
        'dummy'        => 1,
        'tee'          => $tee,
        'distance'     => $faker->numberBetween($min = 120, $max = 520),
        'stroke_index' => $stroke_index,
        'slope'        => $slope,
        'par'          => $faker->randomElement([3, 4, 5]),
    ];
});
