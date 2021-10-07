<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade');
        });

        Schema::table('providers', function ($table) {
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
        });

        Schema::table('companies', function ($table) {
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
        });

        Schema::table('clients', function ($table) {
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
        });

        Schema::table('shops', function ($table) {
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
        });

        Schema::table('products', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
        });

        Schema::table('bills', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade');
        });

        Schema::table('categories', function ($table) {
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
        });

        Schema::table('statuses', function ($table) {
            $table->foreign('type_status_id')->references('id')->on('type_statuses')->onUpdate('cascade');
        });

        Schema::table('roles', function ($table) {
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
        });

        Schema::table('product_bill', function ($table) {
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade');
        });

        Schema::table('product_provider', function ($table) {
            $table->foreign('provider_id')->references('id')->on('providers')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
