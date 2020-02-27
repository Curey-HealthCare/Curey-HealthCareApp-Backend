<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'full_name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->freeEmail,
        'email_verified_at' => now(),
        'phone' => $faker->randomElement($array = array ('010','011','012','015')) . $faker->numerify($string = '########'),
        'password' => $faker->password,
        'api_token' => $faker->regexify('[A-Za-z0-9]{80}'),
        // 'image_id' => NULL,
        'role_id' => $faker->numberBetween($min = 1, $max = 4),
        'gender_id' => $faker->numberBetween($min = 1, $max = 3),
        'city_id' => $faker->numberBetween($min = 1, $max = 3),
        'address' => $faker->address,
        'first_login' => $faker->numberBetween($min = 0, $max = 1),
        'remember_token' => '1',
        'created_at' => now(),
        'updated_at' => now(),
        'is_confirmed' => '1'
        // randomElement($array = array ('a','b','c'))
    ];
});
