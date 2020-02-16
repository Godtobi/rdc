<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Biodata;
use Faker\Generator as Faker;

$factory->define(Biodata::class, function (Faker $faker) {

    return [
        'data_id' => $faker->randomDigitNotNull,
        'model' => $faker->word,
        'unique_code' => $faker->word,
        'tally_number' => $faker->randomDigitNotNull,
        'email' => $faker->word,
        'account_number' => $faker->word,
        'medical_condition' => $faker->text,
        'guarantor_name' => $faker->word,
        'contact' => $faker->word,
        'guarantor_address' => $faker->word,
        'emergency_contact_name_1' => $faker->word,
        'phone_no_1' => $faker->word,
        'emergency_contact_name_2' => $faker->word,
        'phone_no_2' => $faker->word,
        'next_of_kin' => $faker->word,
        'next_of_kin_address' => $faker->word,
        'next_of_kin_phone' => $faker->word,
        'pfa' => $faker->word,
        'rsa_number' => $faker->word,
        'job_title' => $faker->word,
        'driver_lic_issuance_date' => $faker->word,
        'driver_lic_expiry_date' => $faker->word,
        'driver_lic_date' => $faker->word,
        'dob' => $faker->word,
        'sex' => $faker->word,
        'bank' => $faker->word,
        'spouse_name' => $faker->word,
        'spouse_address' => $faker->word,
        'spouse_phone' => $faker->word,
        'employment_date' => $faker->word,
        'lga_id' => $faker->randomDigitNotNull,
        'bank_code' => $faker->word,
        'bank_pfa_code' => $faker->word,
        'driver_license_number' => $faker->word,
        'pre_employment_test_result_date' => $faker->word,
        'pre_employment_test_date' => $faker->word,
        'salary' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
