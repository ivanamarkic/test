<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Raspored extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raspored', function (Blueprint $table) {
            $table->bigIncrements('id_raspored');
            $table->datetime('vrijemeod');
            $table->datetime('vrijemedo');
            $table->string('mjesto',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raspored');
    }
}
