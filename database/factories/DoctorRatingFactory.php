<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DoctorRating;
use Faker\Generator as Faker;

$factory->define(DoctorRating::class, function (Faker $faker) {
    return [
        'review' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'behavior' => $faker->numberBetween($min = 1, $max = 5),
        'price' => $faker->numberBetween($min = 1, $max = 5),
        'efficiency' => $faker->numberBetween($min = 1, $max = 5),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
