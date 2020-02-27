<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->medicine,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 5.0, $max = 200.0),
        'description' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        // 'image_id' => NULL,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
