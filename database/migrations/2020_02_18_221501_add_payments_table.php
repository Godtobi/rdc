<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('payments');
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_plate_number');
            $table->string('driver_code');
            $table->string('vehicle_type_id');
            $table->decimal('amount', 15, 2);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('remit_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_id');
            $table->string('collector_id');
            $table->date('date');
            $table->decimal('amount', 15, 2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('remit_payments');
    }
}
