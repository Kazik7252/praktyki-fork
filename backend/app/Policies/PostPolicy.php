<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user, Post $post)
    {
        if ($user->isBanned())
            return false;

        return true;
    }

    public function delete(User $user, Post $post)
    {
        if($user->isBanned())
            return false;

        if(!$user->isAdmin())
        return $user->id === $post->user_id;

        return true;
    }
}
