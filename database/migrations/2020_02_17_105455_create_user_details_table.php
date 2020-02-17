<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->integer('user_id');
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('enforcer', function (Blueprint $table) {
            $table->string('unique_code')->nullable();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->string('title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
//        Schema::table('enforcer', function (Blueprint $table) {
//            $table->dropColumn('unique_code');
//        });
//        Schema::table('roles', function (Blueprint $table) {
//            $table->dropColumn('title');
//        });
    }
}
