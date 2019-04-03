<?php

namespace alexmg86\ShowStorage;

use Illuminate\Support\ServiceProvider;

class ShowStorageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'alexmg86');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'showstorage');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/showstorage.php', 'showstorage');

        // Register the service the package provides.
        $this->app->singleton('showstorage', function ($app) {
            return new ShowStorage;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['showstorage'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/showstorage.php' => config_path('showstorage.php'),
        ], 'showstorage.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/alexmg86'),
        ], 'showstorage.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/alexmg86'),
        ], 'showstorage.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/alexmg86'),
        ], 'showstorage.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
