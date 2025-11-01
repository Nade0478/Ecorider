<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modele');
            $table->string('couleur');
            $table->string('type_carburant');
            $table->string('immatriculation')->unique();
            $table->date('date_premiere_immatriculation');
            $table->unsignedTinyInteger('nombre_places')->default(4);
            $table->string('statut_ecologique');
            $table->unsignedBigInteger('proprietaire_id');
            $table->timestamps();

            $table->foreign('proprietaire_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
