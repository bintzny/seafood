<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('productStatus')->nullable();
            $table->string('productCode', 50)->nullable();
            $table->string('productName', 50)->nullable();
            $table->string('productImages', 50)->nullable();
            $table->string('productNumber', 50)->nullable();
            $table->string('productPrice', 50)->nullable();
            $table->text('productDescription')->nullable();

            $table->integer('productGroupId')->unsigned();
            $table->foreign('productGroupId')->references('id')->on('product_groups');

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
