<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Role
 *
 * @package App\Models
 *
 * @property int $id L'identifiant unique du role
 * @property string $nom Le nom du role
 * @property string $description la description du role
 *

 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users Les utilisateurs associés à ce role
 */
class Role extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'description',
    ];

    /**
     * Les utilisateurs associés à ce role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
