<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;
use GuzzleHttp\Psr7\FnStream;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
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

    public function create(User $user)
    {
        if ($user->isBanned())
            return false;

        return true;
    }

    public function delete(User $user, Topic $topic)
    {
        if ($user->isBanned())
            return false;

        if(!$user->isAdmin())
        return $user->id === $topic->user_id;

        return true;
    }
}
