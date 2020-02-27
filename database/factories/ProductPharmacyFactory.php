<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductPharmacy;
use Faker\Generator as Faker;

$factory->define(ProductPharmacy::class, function (Faker $faker) {
    return [
        'count' => $faker->numberBetween($min = 1, $max = 999),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
