<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RemitPayments;
use Faker\Generator as Faker;

$factory->define(RemitPayments::class, function (Faker $faker) {

    return [
        'agent_id' => $faker->word,
        'collector_id' => $faker->word,
        'date' => $faker->word,
        'amount' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
