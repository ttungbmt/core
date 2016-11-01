<?php

namespace CMS\App\Console\Commands;

use Illuminate\Console\Command;

class SetupApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->call('migrate');

        if ($this->confirm('Do you wish to create notification table? [Y|N]')) {
            $this->info('Neu loi chay commands - composer dumpautoload');
            $this->call('notifications:table');
            $this->call('vendor:publish', ['--tag' => 'laravel-notifications']);
            $this->call('migrate');
        }
//        php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
        $this->call('passport:install');

        # IDE Helper Generator
        $this->call('ide-helper:generate');
        $this->call('ide-helper:meta');

        # Baum
//        $this->call('baum:install MODEL', ['MODEL']);

        $this->call('vendor:publish');

        $this->call('migrate:install');
        $this->call('make:auth');
    }
}
