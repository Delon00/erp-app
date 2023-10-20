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
        Schema::create('admissions_clients', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('add_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

            $table->foreign('add_id')->references('add_id')->on('admissions');
            $table->foreign('client_id')->references('client_id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions_clients');
    }
};
