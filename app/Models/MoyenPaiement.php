<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class MoyenPaiement
 *
 * @package App\Models
 *
 * @property int $id L'identifiant unique du moyen de paiement
 * @property string $nom le nom du moyen de paiement
 * @property string $description La description du moyen de paiement
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Abonnement[] $abonnements les abonnement liee au moyen de paiement
 */
class MoyenPaiement extends Model
{
    use HasFactory;


    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'description'
    ];


    /**
     * Les abonnements associés à ce moyen de paiement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function abonnements(): HasMany
    {
        return $this->hasMany(Abonnement::class);
    }
}
