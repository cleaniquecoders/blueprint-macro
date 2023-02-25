<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate', [
            '--database' => 'testbench',
        ]);
    }

    /**
     * Get Package Providers.
     *
     * @param  app  $app App
     * @return array List of service providers
     */
    protected function getPackageProviders($app)
    {
        return [
            \CleaniqueCoders\Blueprint\Macro\BlueprintMacroServiceProvider::class,
            \CleaniqueCoders\Blueprint\Macro\Tests\Stubs\ServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}
