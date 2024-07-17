<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * Class Article
 *
 * @package App\Models
 *
 * @property int $id L'identifiant unique de l'utilisateur
 * @property string $nom Le nom de l'utilisateur
 * @property string $email L'email de l'utilisateur
 * @property string $password Le mot de passe de l'utilisateur
 * @property int $quartier_id L'identifiant du quartier de l'utilisateur
 * @property int $role_id L'identifiant du role de l'utilisateur
 *
 * @property-read \App\Models\User $user L'utilisateur associé à cet article
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments Les commentaires associés à cet article
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'quartier_id',
        'role_id',
        'tel'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    /**
     * Le role associés à cet Utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Le quartier associés à cet Utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function quartier(): BelongsTo
    {
        return $this->belongsTo(Quartier::class);
    }

    /**
     * Les notifications associés à cet Utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function notifications(): BelongsToMany
    {
        return $this->belongsToMany(Notification::class);
    }

    /**
     * Les posts de dechets associés à cet utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function postDechets(): HasMany
    {
        return $this->hasMany(PostDechet::class);
    }

    /**
     * Les abonnements associés à cet utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function abonnements(): HasMany
    {
        return $this->hasMany(Abonnement::class);
    }
}
