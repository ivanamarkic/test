<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class godina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('godina', function (Blueprint $table) {
            $table->bigIncrements('id_godina');
            $table->integer('brojsemestra');
            $table->unsignedBigInteger('fk_smijer');
            $table->foreign('fk_smijer')->references('id_smijer')->on('smijer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('godina');
    }
}
