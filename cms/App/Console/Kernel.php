<?php

namespace CMS\App\Console;

use CMS\App\Console\Commands\SetupApp;
use Illuminate\Console\Scheduling\Schedule;

class Kernel extends \App\Console\Kernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SetupApp::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        parent::schedule($schedule);

//        $schedule->call(function () {
//            \DB::table('notifications')->delete();
//        })->everyFiveMinutes();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        parent::commands();
        require (__DIR__.'/../../routes/console.php');
    }
}
