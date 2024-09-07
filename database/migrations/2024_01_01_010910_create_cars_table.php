<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{

    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('car_id');
            $table->string('type');
            $table->dateTime('registered');
            $table->string('ownbrand');
            $table->unsignedBigInteger('accident');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
