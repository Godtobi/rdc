<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToEnforcerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enforcer', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('lga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enforcer', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('address');
            $table->dropColumn('state_id');
            $table->dropColumn('marital_status');
            $table->dropColumn('lga');
        });
    }
}
