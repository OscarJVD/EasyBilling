<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // name con lognitud
            $table->string('surname'); // name con lognitud
            $table->string('email'); // name con lognitud
            $table->string('address'); // name con lognitud
            $table->string('phone'); // name con lognitud
            $table->string('identification_type'); // precio de proveedor
            $table->integer('identification_number'); // precio de proveedor
            $table->integer('status_id')->unsigned();
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
        Schema::dropIfExists('clients');
    }
}
