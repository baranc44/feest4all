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
        Schema::create('project', function(Blueprint $table){
            $table->increments('id');
            $table->string('naam');
            $table->double('uurprijs');
            $table->tinyInteger('verschotten');
            $table->double('opdrachtbedrag');
            $table->string('factuurtype');
            $table->longText('factuuradres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
