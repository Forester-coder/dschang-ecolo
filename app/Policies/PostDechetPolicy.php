<?php

namespace App\Policies;

use App\Models\PostDechet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostDechetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role_id == 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PostDechet $postDechet): bool
    {
        return $user->id === $postDechet->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PostDechet $postDechet): bool
    {
        return $user->id === $postDechet->user_id;
    }

}
