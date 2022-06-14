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
        Schema::create('cars', function (Blueprint $table){
            $table->id();
            $table->string('brand');
            $table->string('kind');
            $table->string('license');
            $table->unsignedBigInteger('mileage')->nullable();
            $table->unsignedBigInteger('total')->nullable();
            $table->unsignedBigInteger('totalthisyear')->nullable();
            $table->unsignedBigInteger('firstmaintenance')->default(0);
            $table->unsignedBigInteger('totalmaintenance')->default(0);
            $table->unsignedBigInteger('maintenancekilometer')->nullable();
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
        Schema::dropIfExists('cars');
    }

    public function car(){
        return view('car');
    }
};
