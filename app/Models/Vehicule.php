<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $filiable = [
        'marque',
        'modele',
        'couleur',
        'type_carburant',
        'immatriculation',
        'date_premiere_immatriculation',
        'nombre_places',
        'statut_ecologique',
        'chauffeur_id',
    ];

    public function chauffeur()
    {
        return $this->belongsTo(User::class, 'chauffeur_id');
    }
}
