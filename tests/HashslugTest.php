<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use Illuminate\Support\Facades\Schema;

class HashslugTest extends TestCase
{
    /** @test */
    public function it_has_hashslug_table()
    {
        $this->assertTrue(Schema::hasTable('hashslug'));
    }

    /** @test */
    public function it_has_hashslug_column()
    {
        $this->assertTrue(Schema::hasColumn('hashslug', 'hashslug'));
    }
}
