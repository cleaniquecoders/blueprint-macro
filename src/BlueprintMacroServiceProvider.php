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

        /* A little hack to have Builder::hasMacro */
        \Illuminate\Database\Eloquent\Builder::macro('hasMacro', function($name) {
            return isset(static::$macros[$name]);
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
