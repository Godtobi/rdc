<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ParkManager;
use Faker\Generator as Faker;

$factory->define(ParkManager::class, function (Faker $faker) {

    return [
        'firstname' => $faker->word,
        'middlename' => $faker->word,
        'lastname' => $faker->word,
        'address' => $faker->word,
        'phone' => $faker->word,
        'maiden_name' => $faker->word,
        'origin' => $faker->word,
        'vehicle_type' => $faker->word,
        'local_govt' => $faker->word,
        'Parkmanager_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
