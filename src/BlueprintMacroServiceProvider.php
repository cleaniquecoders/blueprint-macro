<?php

namespace CLNQCDRS\Blueprint\Macro;

use Illuminate\Support\ServiceProvider;

class BlueprintMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \CLNQCDRS\Blueprint\Macro\Database\Schema\Blueprint::registerMacros();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
