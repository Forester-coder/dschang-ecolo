<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Abonnement
 * @author Tsafack Forester <tsafackforester@gmail.com>
 * @package App\Models
 *
 * @property int $id L'identifiant unique de l'abonnement
 * @property date $date_debut date de debut de l'abonnement
 * @property date $date_fin date de fin de l'abonnement
 * @property int $user_id L'identifiant de l'utilisateur qui s'est abonner
 * @property int $type_abonnement_id L'identifiant du type d'abonnement
 * @property int $moyen_paiement_id L'identifiant du moyen de paiement
 *
 * @property-read \App\Models\User $user L'utilisateur associé à cet abonnement
 * @property-read \App\Models\TypeAbonnement $typeAbonnement le type d'abonnement associé à cet abonnement
 * @property-read \App\Models\MoyenPaiement $moyenPaiement le moyen de paiement associé à cet abonnement
 */

class Abonnement extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_debut',
        'date_fin',
        'user_id',
        'type_abonnement_id',
        'moyen_paiement_id'
    ];

    /**
     * L'utilisateur qui a effectuer l'abonnement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * type d'abonnement de l'abonnement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function typeAbonnement(): BelongsTo
    {
        return $this->belongsTo(TypeAbonnement::class);
    }

    /**
     * moyen de paiement utiliser pour effectuer l'abonnement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function moyenPaiement(): BelongsTo
    {
        return $this->belongsTo(MoyenPaiement::class);
    }
}
