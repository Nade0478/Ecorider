<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    protected $fillable = [
        'credits_total',
        'credits-inscription',
        'date_derniere_maj',
        'commission_trajet'
    ];
}
