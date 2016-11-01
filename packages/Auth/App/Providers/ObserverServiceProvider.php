<?php
namespace Lara\Auth\App\Providers;

use Illuminate\Support\ServiceProvider;
use Lara\Auth\App\Models\User;
use Lara\Auth\App\Observers\UserObserver;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot()
    {
//        User::observe( new UserObserver );
    }
    public function register()
    {
    }
}