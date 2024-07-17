<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Image
 *
 * @package App\Models
 *
 * @property int $id L'identifiant unique de l'image
 * @property string $url l'url de l'image
 * @property string $type Le type de l'image
 * @property int $post_dechet_id L'identifiant du post de dechet associee a l'image
 *
 * @property-read \App\Models\PostDechet $user Le post de dechet associer a cet image
 */
class Image extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = ['path', 'post_dechet_id'];

    /**
     * Le post de dechet associer a cet image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function postDechet(): BelongsTo
    {
        return $this->belongsTo(PostDechet::class);
    }
}
