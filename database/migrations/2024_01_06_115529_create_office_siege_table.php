<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeSiegeTable extends Migration
{
    public function up()
    {
        Schema::create('office_siege', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('siege_id');
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('siege_id')->references('id')->on('sieges')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('office_siege');
    }
}
