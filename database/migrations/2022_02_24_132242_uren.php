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
        Schema::create('uren', function(Blueprint $table){
            $table->increments('id');
            $table->double('uren');
            $table->longText('omschrijving');
            $table->date('datum');
            $table->tinyInteger('gefactureerd');
            $table->integer('factuur_nummer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uren');
    }
};
