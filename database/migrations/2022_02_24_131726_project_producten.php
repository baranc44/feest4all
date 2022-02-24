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
        Schema::create('project_producten', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('hoeveelheid');
            $table->tinyInteger('afgeleverd');
            $table->integer('opgehaald');
            $table->tinyInteger('gefactureerd');
            $table->longText('opmerkingen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_producten');
    }
};
