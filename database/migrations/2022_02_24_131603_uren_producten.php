<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uren_producten', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedBigInteger('uren_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('hoeveelheid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uren_producten');
    }
};
