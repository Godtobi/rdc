<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lga;
use Faker\Generator as Faker;

$factory->define(Lga::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'state_id' => $faker->randomDigitNotNull,
        'lgaId' => $faker->word
    ];
});
