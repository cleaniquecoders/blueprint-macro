<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Attributes\Test;

class HashslugTest extends TestCase
{
    #[Test]
    public function it_has_hashslug_table()
    {
        $this->assertTrue(Schema::hasTable('hashslug'));
    }

    #[Test]
    public function it_has_hashslug_column()
    {
        $this->assertTrue(Schema::hasColumn('hashslug', 'hashslug'));
    }
}
