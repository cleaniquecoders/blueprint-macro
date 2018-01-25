<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use CleaniqueCoders\Blueprint\Macro\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class ForeignTest extends TestCase
{
    /** @test */
    public function it_has_foreign_table()
    {
        $this->assertTrue(Schema::hasTable('foreign'));
    }

    /** @test */
    public function it_has_foreign_columns()
    {
        $this->assertTrue(Schema::hasColumn('foreign', 'user_id'));
        $this->assertTrue(Schema::hasColumn('foreign', 'supervisor_id'));
    }
}
