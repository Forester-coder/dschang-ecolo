<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Notification
 *
 * @package App\Models
 *
 * @property int $id L'identifiant unique de l'article
 * @property string $message Le message de la notification
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users Les utilisateurs associés a cette notification
 */
class Notification extends Model
{
    use HasFactory;
    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message'
    ];


     /**
     * Les utilisateurs associés à  cette notification.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
