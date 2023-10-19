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
        Schema::create('pieces', function (Blueprint $table) {
            $table->id('piece_id');
            $table->string('piece_nom');
            $table->float('piece_prix');
            $table->string('piece_categorie');
            $table->string('piece_fabricant');
            $table->float('longueur_1');
            $table->float('longueur_2');
            $table->float('largeur_1');
            $table->float('largeur_2');
            $table->float('diametre_1');
            $table->float('diametre_2');
            $table->float('hauteur');
            $table->float('epaisseur');
            $table->float('poids');
            $table->binary('image');
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
        Schema::dropIfExists('pieces');
    }
};
