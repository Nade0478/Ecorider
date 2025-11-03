<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;
    protected $fillable = [
        'covoiturage_id',
        'passager_id',
        'date_reservation',
        'credits_utilises',
        'statut',
        'validation_trajet',
        'commentaires'
    ];

    public function covoiturage()
    {
        return $this->belongsTo(Covoiturage::class, 'covoiturage_id');
    }
    public function passager()
    {
        return $this->belongsTo(User::class, 'passager_id');
    }
}
