<?php


namespace Lara\Auth\App\Listeners;

use Illuminate\Support\Facades\Auth;
use Lara\Auth\App\Mail\ActivationMail;
use Lara\Auth\App\Models\User;
use Lara\Auth\App\Notifications\UserLogin;
use Lara\Auth\App\Notifications\UserLogout;
use Mail;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     *
     * @param $event
     */
    public function onUserLogin($event) {
        Auth::user()->notify(new UserLogin());
    }

    /**
     * Handle user logout events.
     *
     * @param $event
     */
    public function onUserLogout($event) {
        Auth::user()->notify(new UserLogout());
    }

    public function onUserRegistered($event) {
        // Gửi mail thông báo tạo tài khoản thành công
        $email = new ActivationMail(new User(['name' => 'Truong Thanh Tung']));
        Mail::to('superadmin@mail.com')->send($email);
        // Gửi mail xác thực tài khoản

        // Ghi notification

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \Illuminate\Auth\Events\Login::class,
            'Lara\Auth\App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            \Illuminate\Auth\Events\Logout::class,
            'Lara\Auth\App\Listeners\UserEventSubscriber@onUserLogout'
        );

        $events->listen(
            \Illuminate\Auth\Events\Registered::class,
            'Lara\Auth\App\Listeners\UserEventSubscriber@onUserRegistered'
        );


    }

}