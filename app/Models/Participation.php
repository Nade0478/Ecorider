<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;
    protected $fillable = ['covoiturage_id', 'passager_id', 'date_reservation', 'credits_utilises', 'statut', 'validation_trajet', 'commentaires'];
}
