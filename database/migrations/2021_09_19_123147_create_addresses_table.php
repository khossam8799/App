<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {

            $table->id();
            $table->string('street');
            $table->string('building');
            $table->unsignedBigInteger('floor');
            $table->unsignedBigInteger('apartment');
            $table->string('landmark');
            $table->timestamps();
            $table->unsignedBigInteger('areaId');

            $table->foreign('areaId')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
