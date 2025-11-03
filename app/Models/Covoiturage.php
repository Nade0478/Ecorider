<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covoiturage extends Model
{
    use HasFactory;
    protected $fillable = [
        'ville_depart',
        'ville_arrivee',
        'date_depart',
        'date_arrivee',
        'places_disponibles',
        'places_restantes',
        'prix',
        'statut',
        'statut_ecologique',
        'chauffeur_id',
        'vehicule_id'
    ];
}
