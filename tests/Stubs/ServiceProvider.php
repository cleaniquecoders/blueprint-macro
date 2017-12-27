<?php

namespace CLNQCDRS\Blueprint\Macro\Tests\Stubs;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(realpath(__DIR__ . '/../database/migrations'));
    }
}
