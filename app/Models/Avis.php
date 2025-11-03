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
        'statut_valide',
        'date_validation'
    ];

    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }

    public function validateur()
    {
        return $this->belongsTo(User::class, 'validateur_id');
    }

    public function concerne()
    {
        return $this->belongsTo(User::class, 'concerne_id');
    }

    public function covoiturage()
    {
        return $this->belongsTo(Covoiturage::class, 'covoiturage_id');
    }
}