<?php
namespace Lara\Auth\App\Observers;

use Lara\Auth\App\Models\User;
use Log;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        Log::info("[UserObserver] User created!");
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function saved(User $user)
    {
        Log::info("[UserObserver] User saved!");
    }

    public function deleted(User $user)
    {
        if(!$user->trashed()){
            $user->info()->delete();
        }
    }
}