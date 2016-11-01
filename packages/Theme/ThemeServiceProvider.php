<?php

namespace Lara\Theme;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAsset();
        $this->registerTheme();
        $this->registerWidget();
        $this->registerBreadcrumb();
    }

    /**
     * Register asset provider.
     *
     * @return void
     */
    public function registerAsset()
    {
        $this->app->singleton('asset', function($app) {
            return new Asset();
        });
    }

    /**
     * Register theme provider.
     *
     * @return void
     */
    public function registerTheme()
    {
        $this->app->singleton('theme', function($app) {
            return new Theme($app['config'], $app['events'], $app['view'], $app['asset'], $app['files'], $app['breadcrumb']);
        });

        $this->app->booting(function($app) {
            // Register custom namespaces for all themes.
            $app['theme']->register();
        });
    }

    /**
     * Register widget provider.
     *
     * @return void
     */
     public function registerWidget()
     {
         $this->app->singleton('widget', function($app) {
             return new Widget($app['view']);
         });
     }

    /**
     * Register breadcrumb provider.
     *
     * @return void
     */
    public function registerBreadcrumb()
    {
        $this->app->singleton('breadcrumb', function($app) {
            return new Breadcrumb($app['files']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['theme', 'asset', 'widget', 'breadcrumb'];
    }
}
