<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('company');
            $table->string('website');//url of company website
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('createdBy');
            $table->foreign('createdBy')->references('id')->on('users');//user name who create this customer
            $table->foreign('user_id')->references('id')->on('users');//assigned to 
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
