<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sound;
use Faker\Generator as Faker;

$factory->define(Sound::class, function (Faker $faker) {
    return [
        'library_id' => $faker->numberBetween(1,10),
        'name' => $faker->sentence(3, false),
        'src' => $faker->url,
    ];
});
