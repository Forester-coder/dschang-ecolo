<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Class PostDechet
 *
 * @package App\Models
 *
 * @property int $id L'identifiant unique du post
 * @property string $contenu Le contenu du post
 * @property int $user_id L'identifiant de l'utilisateur qui a créé le Post
 *
 * @property-read \App\Models\User $user L'utilisateur associé à ce Post
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images Les images associés à ce Post
 */
class PostDechet extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contenu',
        'user_id',
    ];


    /**
     * Les images associés au Post de dechet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

     /**
     * L'utilisateur associés à ce post de dechet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
