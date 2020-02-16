<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToVehicleType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_type', function (Blueprint $table) {
            $table->string('vehicleId')->nullable();
        });

        Schema::table('lga', function (Blueprint $table) {
            $table->string('lgaId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_type', function (Blueprint $table) {
            $table->dropColumn('vehicleId');
        });
        Schema::table('lga', function (Blueprint $table) {
            $table->dropColumn('lgaId');
        });
    }
}
