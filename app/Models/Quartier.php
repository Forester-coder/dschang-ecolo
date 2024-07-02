<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Class Quartier
 *
 * @package App\Models
 *
 * @property int $id L'identifiant unique du quartier
 * @property string $nom Le nom du quartier
 * @property string $description la description du quartier
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Depotoir[] $depotoirs Les depotoirs associés à cet au quartier
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users Les users associés au quartier
 */
class Quartier extends Model
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
     * Les depotoirs associés à ce quartier.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function depotoirs(): HasMany
    {
        return $this->hasMany(Depotoir::class);
    }

    /**
     * Les utilisateurs associés à ce quartier.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
