<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;
    protected $fillable = [
        'auteur_id',
        'validateur_id',
        'covoiturage_id',
        'concerne_id',
        'note',
        'commentaire',
        'statut_vide',
        'date_creation',
        'date_validation'
    ];
}
