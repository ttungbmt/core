<?php

namespace CMS\App\Providers;

use App\Providers\AppServiceProvider as BaseAppServiceProvider;
use Blade;
use Illuminate\Foundation\AliasLoader;
use Lara\Auth\App\Providers\AuthServiceProvider;

class AppServiceProvider extends BaseAppServiceProvider
{
    protected $cms_folder = __DIR__.'/../../';

    protected $providers = [
        // CORE
        RouteServiceProvider::class,
        EventServiceProvider::class,
        ComposerServiceProvider::class,
        ValidationServiceProvider::class,

        // PACAKGES
        \Lara\Auth\App\Providers\AuthServiceProvider::class,
        // MODULES
    ];

    protected $aliases = [

    ];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootResources();
        $this->bootLang();

        $this->bootBladeDirective();


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerProviders();
        $this->registerIncludes();

        $this->setConfig();
    }

    protected function registerProviders()
    {

        # Add providers & alias
        $package = require $this->cms_folder.'config/providers.php';
        $this->providers = array_merge($package['providers'], $this->providers);
        $this->aliases = array_merge($package['aliases'], $this->aliases);

        // K load Service Provider không cần thiết production
        if ($this->app->environment() == 'local') {

        } else {

        }

        foreach($this->providers as $provider){
            $this->app->register($provider);
        }
        $this->registerAliases();
    }

    protected function registerIncludes()
    {
        $includeUrl = __DIR__.'/../Includes';
        $files = \Storage::createLocalDriver(['root' => $includeUrl])->allFiles();

        foreach ($files as $filename){
            require_once(realpath($includeUrl.'/'.$filename));
        }
    }

    protected function setConfig()
    {
        # Overwrite thuộc tính config
        foreach(require $this->cms_folder.'config/app.php' as $name => $app){
            $config = $this->app['config']->get($name, []);
            $this->app['config']->set($name, array_replace_recursive ($config, $app));
        }
    }

    protected function bootResources()
    {
        $this->loadViewsFrom($this->cms_folder.'resources/views', 'cms');
    }

    protected function bootLang()
    {
        $langPath = $this->cms_folder.'resources/lang';

        $this->loadTranslationsFrom($langPath, 'cms');
        $this->publishes([$langPath => resource_path('lang'),]);
    }

    protected function bootBladeDirective()
    {
        Blade::directive('datetime', function($expression) {
            return "<?= $expression->format('m/d/Y H:i'); ?>";
        });
    }

    protected function registerAliases()
    {
        AliasLoader::getInstance($this->aliases);
    }

}
