<?php

namespace CleaniqueCoders\Blueprint\Macro;

use Illuminate\Support\ServiceProvider;

class BlueprintMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        collect(glob(__DIR__ . '/Database/Schema/macros/*.php'))
            ->each(function($path) {
                require $path;
            });

        collect(glob(__DIR__ . '/Models/macros/*.php'))
            ->each(function($path) {
                require $path;
            });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
