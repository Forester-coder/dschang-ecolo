<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'datedebut',
        'dateFin',
        'user_id',
        'statut_abonnement_id',
        'type_abonnement_id',
        'moyen_paiement_id'
    ];

    
}
