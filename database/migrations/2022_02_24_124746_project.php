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
            $table->integer('project_nummer');
            $table->string('naam');
            $table->double('uurprijs')->default(0);
            $table->tinyInteger('verschotten')->default(0);
            $table->double('opdrachtbedrag')->default(0);
            $table->string('factuurtype')->default("0");
            $table->longText('factuuradres')->default("0");
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
        Schema::dropIfExists('project');
    }
};
