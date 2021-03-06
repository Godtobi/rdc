<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Agency;
use Faker\Generator as Faker;

$factory->define(Agency::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'address' => $faker->text,
        'contact_name' => $faker->word,
        'contact_phone' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
