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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id('add_id');
            $table->string('nom_client')->unique();
            $table->string('nom_voiture');
            $table->string('marque_voiture'); 
            $table->string('panne_declare');
            $table->timestamps();
        
            $table->foreign('marque_voiture')->references('marque_voiture')->on('marques'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
};
