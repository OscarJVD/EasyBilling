<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 35); // name con lognitud
            $table->string('description');
            $table->double('purchase_price')->nullable(); // precio de proveedor
            $table->double('sale_price')->nullable(); // precio de venta
            $table->integer('stock');
            $table->integer('iva')->default(19);
            $table->integer('category_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('products');
    }
}
