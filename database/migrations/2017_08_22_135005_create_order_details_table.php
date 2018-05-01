<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detailName',50);
            $table->double('detailPrice');
            $table->integer('detailQuantity');
            $table->integer('detailTotal');
            $table->integer('detailStatus');
            $table->integer('detailCustomersId');
            $table->integer('detailOrderId');
            $table->integer('detailProductId')->unsigned();
            $table->foreign('detailProductId')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('order_details');
    }
}
