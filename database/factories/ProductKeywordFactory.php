<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductKeyword;
use Faker\Generator as Faker;

$factory->define(ProductKeyword::class, function (Faker $faker) {
    return [
        'created_at' => now(),
        'updated_at' => now()
    ];
});