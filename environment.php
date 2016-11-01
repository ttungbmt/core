<?php

/*
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Laravel takes a dead simple approach to your application environments
| so you can just specify a machine name for the host that matches a
| given environment, then we will automatically detect it for you.
|
*/


$env = $app->detectEnvironment(function(){
//    $env = !isset($_SERVER['SERVER_NAME']) ?: $_SERVER['SERVER_NAME'];
    $acceptUrl = 'localhost 192.168.2.110 lara.dev';

    $console = array_get($_SERVER, 'SESSIONNAME') == 'Console' ? true: false;
    $server = str_contains($acceptUrl, array_get($_SERVER, 'SERVER_NAME'));

    if($console || $server){
        putenv('APP_ENV=local');
    } else {
        putenv('APP_ENV=production');
    }

    $dotenv = new Dotenv\Dotenv(__DIR__, '.' . getenv('APP_ENV') . '.env'); // Laravel 5.2
    $dotenv->overload(); //this is important
});

//$app->singleton(
//    \Illuminate\Contracts\Debug\ExceptionHandler::class,
//    \CMS\App\Exceptions\CoreHandler::class
//);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    CMS\App\Console\Kernel::class
);