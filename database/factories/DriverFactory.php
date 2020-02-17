<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Driver;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {

    return [
        'first_name' => $faker->word,
        'middle_name' => $faker->word,
        'last_name' => $faker->word,
        'address' => $faker->text,
        'phone' => $faker->word,
        'plate_no' => $faker->word,
        'vehicle_type_id' => $faker->randomDigitNotNull,
        'mother_maiden_name' => $faker->word,
        'vehicle_owner_name' => $faker->word,
        'vehicle_owner_phone' => $faker->word,
        'lga' => $faker->randomDigitNotNull,
        'passport' => $faker->word,
        'driver_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'marital_status' => $faker->word,
        'state_id' => $faker->randomDigitNotNull
    ];
});
