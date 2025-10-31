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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->id ('auteur_id');
            $table->id ('validateur_id');
            $table->id ('covoiturage_id');
            $table->id ('concerne_id');
            $table->integer ('note')->default(0);
            $table->text('commentaire')->nullable();
            $table->boolean('statut_vide')->default(false);
            $table->date ('date_creation');
            $table->date ('date_validation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
