<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use Illuminate\Support\Facades\Schema;

/**
 * @todo test default & custom reference
 * @todo test bigInteger & integer
 * @todo test nullable
 */
class ForeignTest extends TestCase
{
    /** @test */
    public function it_has_foreign_table()
    {
        $this->assertTrue(Schema::hasTable('foreign'));
    }

    /** @test */
    public function it_has_default_foreign_key_name()
    {
        $this->assertTrue(Schema::hasColumn('foreign', 'user_id'));
    }

    /** @test */
    public function it_has_custom_foreign_key_name()
    {
        $this->assertTrue(Schema::hasColumn('foreign', 'customer_id'));
    }

    /** @test */
    public function it_has_foreign_key_unsignedInteger()
    {
        $this->assertEquals(Schema::getColumnType('foreign', 'user_id'), 'integer');
    }

    /** @test */
    public function it_has_foreign_key_unsignedBigInteger()
    {
        $this->assertEquals(Schema::getColumnType('foreign', 'big_id'), 'integer');
    }
}
