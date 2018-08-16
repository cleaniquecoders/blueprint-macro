<?php

namespace CleaniqueCoders\Blueprint\Macro\Database\Schema;

use CleaniqueCoders\Blueprint\Macro\Contracts\MacroContract;

/**
 * Extended Blueprint by using Macro.
 */
class Blueprint implements MacroContract
{
    /**
     * Register Macros.
     *
     * @void
     */
    public static function registerMacros()
    {
        collect(glob(__DIR__ . '/macros/*.php'))
            ->each(function($path) {
                require $path;
            });
    }
}
