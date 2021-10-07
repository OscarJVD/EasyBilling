<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('identification_type')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->dateTime('date_birth')->nullable();
            $table->string('password');
            $table->string('identification_number')->nullable();
            $table->integer('status_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('shop_id')->unsigned()->nullable();
            $table->integer('provider_id')->unsigned()->nullable();
            $table->dateTime('last_login')->nullable();
            $table->string('token_login')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
