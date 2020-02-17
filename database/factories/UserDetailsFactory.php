<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserDetails;
use Faker\Generator as Faker;

$factory->define(UserDetails::class, function (Faker $faker) {

    return [
        'first_name' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'last_name' => $faker->word,
        'phone' => $faker->word,
        'picture' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
