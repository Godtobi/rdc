<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Enforcer;
use Faker\Generator as Faker;

$factory->define(Enforcer::class, function (Faker $faker) {

    return [
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'phone' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'email' => $faker->word,
        'address' => $faker->text,
        'state_id' => $faker->randomDigitNotNull,
        'marital_status' => $faker->word,
        'lga' => $faker->randomDigitNotNull
    ];
});
