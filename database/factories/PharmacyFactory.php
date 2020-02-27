<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pharmacy;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Pharmacy::class, function (Faker $faker) {
    return [
        'benefit_delivery' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.1, $max = 0.25),
        'benefit_pharmacy' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.1, $max = 0.25),
        'address' => $faker->address,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
