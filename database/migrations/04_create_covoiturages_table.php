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
        Schema::create('covoiturages', function (Blueprint $table) {
            $table->id();
            $table->string('ville_depart');
            $table->string('ville_arrivee');
            $table->dateTime('date_depart');
            $table->dateTime('date_arrivee');
            $table->integer('places_disponibles');
            $table->integer('places_restantes');
            $table->decimal('prix', 8, 2);
            $table->string('statut');
            $table->string('statut_ecologique');
            $table->foreignId('chauffeur_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('covoiturages');
    }
};
