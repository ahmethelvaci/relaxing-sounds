<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Library;
use Faker\Generator as Faker;

$factory->define(Library::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3, false),
        'image' => $faker->imageUrl()
    ];
});
