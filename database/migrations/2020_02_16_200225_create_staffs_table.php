<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('data_id')->unsigned();
            $table->string('model');
            $table->string('unique_code');
            $table->integer('tally_number')->unsigned()->nullable();
            $table->string('email', 191)->nullable();
            $table->string('account_number', 191)->nullable();
            $table->text('medical_condition')->nullable();
            $table->string('guarantor_name', 191)->nullable();
            $table->string('contact', 191)->nullable();
            $table->string('guarantor_address', 191)->nullable();
            $table->string('emergency_contact_name_1', 191)->nullable();
            $table->string('phone_no_1', 191)->nullable();
            $table->string('emergency_contact_name_2', 191)->nullable();
            $table->string('phone_no_2', 191)->nullable();
            $table->string('next_of_kin', 191)->nullable();
            $table->string('next_of_kin_address', 191)->nullable();
            $table->string('next_of_kin_phone', 191)->nullable();
            $table->string('pfa', 191)->nullable();
            $table->string('rsa_number', 191)->nullable();
            $table->string('job_title', 191)->nullable();
            $table->date('driver_lic_issuance_date')->nullable();
            $table->date('driver_lic_expiry_date')->nullable();
            $table->date('driver_lic_date')->nullable();
            $table->date('dob')->nullable();
            $table->string('sex', 191)->nullable();
            $table->string('bank', 191)->nullable();
            $table->string('spouse_name', 191)->nullable();
            $table->string('spouse_address', 191)->nullable();
            $table->string('spouse_phone', 191)->nullable();
            $table->date('employment_date')->nullable();
            $table->integer('lga_id');
            $table->string('bank_code', 191)->nullable();
            $table->string('bank_pfa_code', 191)->nullable();
            $table->string('driver_license_number', 191)->nullable();
            $table->date('pre_employment_test_result_date')->nullable();
            $table->date('pre_employment_test_date')->nullable();
            $table->string('salary', 191)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('biodata');
    }

}
