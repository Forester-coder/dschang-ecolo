<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Depotoir
 * @author Tsafack Forester <tsafackforester@gmail.com>
 * @package App\Models
 *
 * @property int $id L'identifiant unique du depotoir
 * @property float $latitude La latitude du depotoir
 * @property float $longitude La longitude du depotoir
 * @property int $quartier_id L'identifiant du quartier liee au depotoir
 *
 * @property-read \App\Models\Quartier $quartier le quartier liee au depotoir
 */
class Depotoir extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'latitude',
        'longitude',
        'quartier_id'
    ];

    /**
     * quartier liee au depotoir.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function quartier(): BelongsTo
    {
        return $this->belongsTo(Quartier::class);
    }
}
