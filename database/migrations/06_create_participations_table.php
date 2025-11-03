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
        Schema::create('participations', function (Blueprint $table) {
            $table->id();

            // Relations obligatoires
            $table->foreignId('covoiturage_id')->constrained('covoiturages')->onDelete('cascade');
            $table->foreignId('passager_id')->constrained('users')->onDelete('cascade');

            // Données de participation
            $table->date('date_reservation');
            $table->integer('credits_utilises')->default(0);
            $table->string('statut');
            $table->boolean('validation_trajet')->default(false);
            $table->text('commentaires')->nullable();
            $table->timestamps();

            // Index pour les recherches
            $table->index(['covoiturage_id', 'passager_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
