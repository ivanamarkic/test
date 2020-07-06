<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Predmet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predmet', function (Blueprint $table) {
            $table->bigIncrements('id_predmet');
            $table->string('ime_predmeta',50);
            $table->unsignedBigInteger('fk_user')->nullable();
            $table->unsignedBigInteger('fk_godina')->nullable();
            $table->unsignedBigInteger('fk_raspored')->nullable();
            $table->foreign('fk_user')->references('id_user')->on('user');
            $table->foreign('fk_godina')->references('id_godina')->on('godina');
            $table->foreign('fk_raspored')->references('id_raspored')->on('raspored');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predmet');
    }
}
