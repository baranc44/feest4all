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
        Schema::create('customers', function (Blueprint $table){
            $table->id();
            $table->string('company_name');
            $table->string('address');
            $table->unsignedBigInteger('housenumber');
            $table->string('postcode');
            $table->string('city');
            $table->unsignedBigInteger('phonenumber');
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
        Schema::dropIfExits('customers');
    }

    public function customer(){
        return view('customer');
    }
};
