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
            $table->unsignedBigInteger('auteur_id');
            $table->unsignedBigInteger('validateur_id');
            $table->unsignedBigInteger('covoiturage_id');
            $table->unsignedBigInteger('concerne_id');
            $table->integer('note')->default(0);
            $table->text('commentaire')->nullable();
            $table->boolean('statut_valide')->default(false);
            $table->date('date_validation');
            $table->timestamps();

            $table->foreign('auteur_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('validateur_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('covoiturage_id')->references('id')->on('covoiturages')->onDelete('cascade');
            $table->foreign('concerne_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
