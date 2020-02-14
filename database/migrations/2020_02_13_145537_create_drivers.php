<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('phone');
            $table->string('plate_no');
            $table->integer('vehicle_type_id');
            $table->string('mother_maiden_name');
            $table->string('vehicle_owner_name');
            $table->string('vehicle_owner_phone');
            $table->integer('lga');
            $table->string('passport');
            $table->string('driver_id');
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
        Schema::dropIfExists('drivers');
    }
}
