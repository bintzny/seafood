<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title', 50)->nullable();
            $table->string('Firstname', 50)->nullable();
            $table->string('Lastname', 50)->nullable();
            $table->string('FullName', 50)->nullable();
            $table->string('Gender', 50)->nullable();
            $table->text('Address')->nullable();
            $table->string('Phone', 50)->nullable();
            $table->string('Email', 50)->nullable();
            $table->string('Username', 50)->nullable();
            $table->string('Password', 50)->nullable();
            $table->string('Image', 50)->default('nopic.jpg');

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
        Schema::dropIfExists('customers');
    }
}
