<?php

namespace SAJDEV\belara;

use Illuminate\Support\ServiceProvider;

class belaraProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        #rotues 
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        #migrations
        $this->loadMigrationsFrom(__DIR__.'/migration');

        #views
        $this->loadViewsFrom(__DIR__.'/views', 'belara');
        $this->publishes([
            __DIR__.'/view' => resource_path('views/vendor/belara'),
        ]);


        #configs
        $this->mergeConfigFrom(
            __DIR__.'/config/belara.php', 'belara'
        );
        $this->publishes([
            __DIR__.'/config/belara.php' => config_path('berala.php'),
        ]);
    }
}
