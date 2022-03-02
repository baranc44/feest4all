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
            $table->integer('hoeveelheid')->default(0);
            $table->tinyInteger('afgeleverd')->default(0);
            $table->integer('opgehaald')->default(0);
            $table->tinyInteger('gefactureerd')->default(0);
            $table->longText('opmerkingen');
            $table->timeStamps();
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
