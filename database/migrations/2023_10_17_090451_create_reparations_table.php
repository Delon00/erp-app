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
        Schema::create('reparations', function (Blueprint $table) {
            $table->id('repair_id');
            $table->string('nom_client');
            $table->string('nom_voiture');
            $table->string('nom_traitant');
            $table->integer('nbre_panne');
            $table->integer('nbre_panne_traite');
            $table->integer('nbre_panne_restant');
            $table->float('montant_total');
            $table->float('montant_paye');
            $table->float('montant_due');
            $table->timestamp('date_ajout')->useCurrent();
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
        Schema::dropIfExists('reparations');
    }
};
