<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Attributes\Test;

/**
 * @todo test default & custom reference
 * @todo test bigInteger & integer
 * @todo test nullable
 */
class ForeignTest extends TestCase
{
    #[Test]
    public function it_has_foreign_table()
    {
        $this->assertTrue(Schema::hasTable('foreign'));
    }

    #[Test]
    public function it_has_default_foreign_key_name()
    {
        $this->assertTrue(Schema::hasColumn('foreign', 'user_id'));
    }

    #[Test]
    public function it_has_custom_foreign_key_name()
    {
        $this->assertTrue(Schema::hasColumn('foreign', 'customer_id'));
    }

    #[Test]
    public function it_has_foreign_key_unsigned_integer()
    {
        $this->assertEquals(Schema::getColumnType('foreign', 'user_id'), 'integer');
    }

    #[Test]
    public function it_has_foreign_key_unsigned_big_integer()
    {
        $this->assertEquals(Schema::getColumnType('foreign', 'big_id'), 'integer');
    }
}
