<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'is_callup' => $faker->numberBetween($min = 0, $max = 1),
        'diagnosis' => $faker->catchPhrase,
        'duration' => 1,
        'last_checkup' => now(),
        're_examination' => $faker->numberBetween($min = 0, $max = 1),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
