<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TimeTable;
use Faker\Generator as Faker;

$factory->define(TimeTable::class, function (Faker $faker) {
    return [
        'created_at' => now(),
        'updated_at' => now()
    ];
});
