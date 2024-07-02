<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class TypeAbonnement
 *
 * @package App\Models
 *
 * @property int $id L'identifiant unique du type de l'abonnement
 * @property string $nom Le nom du type de l'abonnement
 * @property float $montant Le montant du type d'abonnement
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Abonnement[] $abonnements Les abonnements associés à ce type d'abonnement
 */
class TypeAbonnement extends Model
{
    use HasFactory;
    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'montant'
    ];


      /**
     * Les abonnements associés à ce type d'abonnement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function abonnements(): HasMany
    {
        return $this->hasMany(Abonnement::class);
    }
}
