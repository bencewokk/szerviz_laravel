<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{

    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('lognumber');
            $table->string('event');
            $table->dateTime('eventtime')->nullable();
            $table->unsignedBigInteger('document_id');
            $table->timestamps();


            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('car_id')->references('id')->on('cars');

            $table->index('lognumber');
            $table->index('document_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}