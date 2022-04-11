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
        Schema::create('plannings', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('user_id')->default(0);         
            $table->double('uren');
            $table->longText('omschrijving');
            $table->timestamps();
            $table->date('datum');
            $table->boolean('voltooid')->default(0);   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planning');
    }
};
