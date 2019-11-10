<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Favorite;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        'device_id' => 1,
        'sound_id' => $faker->unique()->numberBetween(1,200),
    ];
});
