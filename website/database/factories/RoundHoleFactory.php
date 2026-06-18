<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\RoundHole::class, function (Faker $faker) {
    static $round_id;
    static $hole_id;
    static $num_strokes;

    return [
        'round_id'          => $round_id,
        'hole_id'           => $hole_id,
        'dummy'             => 1,
        'num_strokes'       => $num_strokes,
        'num_fairways'      => $faker->randomElement([0, 1]),
        'num_girs'          => $faker->randomElement([0, 1]),
        'num_sand_saves'    => $faker->randomElement([0, 1]),
        'num_putts'         => random_int(1, 3),
    ];
});
