<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use CleaniqueCoders\Blueprint\Macro\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;

/**
 *
 */
class AvailableMacroTest extends TestCase
{
    /** @test */
    public function it_has_add_foreign()
    {
        $this->assertTrue(Blueprint::hasMacro('addForeign'));
    }

    /** @test */
    public function it_has_add_nullable_foreign()
    {
        $this->assertTrue(Blueprint::hasMacro('addNullableForeign'));
    }

    /** @test */
    public function it_has_reference_on()
    {
        $this->assertTrue(Blueprint::hasMacro('referenceOn'));
    }

    /** @test */
    public function it_has_uuid()
    {
        $this->assertTrue(Blueprint::hasMacro('uuid'));
    }

    /** @test */
    public function it_has_add_acceptance()
    {
        $this->assertTrue(Blueprint::hasMacro('addAcceptance'));
    }

    /** @test */
    public function it_has_acted_status()
    {
        $this->assertTrue(Blueprint::hasMacro('actedStatus'));
    }

    /** @test */
    public function it_has_acted_at()
    {
        $this->assertTrue(Blueprint::hasMacro('actedAt'));
    }

    /** @test */
    public function it_has_acted_by()
    {
        $this->assertTrue(Blueprint::hasMacro('actedBy'));
    }

    /** @test */
    public function it_has_remarks()
    {
        $this->assertTrue(Blueprint::hasMacro('remarks'));
    }

    /** @test */
    public function it_has_hashslug()
    {
        $this->assertTrue(Blueprint::hasMacro('hashslug'));
    }

    /** @test */
    public function it_has_slug()
    {
        $this->assertTrue(Blueprint::hasMacro('slug'));
    }

    /** @test */
    public function it_has_label()
    {
        $this->assertTrue(Blueprint::hasMacro('label'));
    }

    /** @test */
    public function it_has_name()
    {
        $this->assertTrue(Blueprint::hasMacro('name'));
    }

    /** @test */
    public function it_has_description()
    {
        $this->assertTrue(Blueprint::hasMacro('description'));
    }

    /** @test */
    public function it_has_expired()
    {
        $this->assertTrue(Blueprint::hasMacro('expired'));
    }

    /** @test */
    public function it_has_user()
    {
        $this->assertTrue(Blueprint::hasMacro('user'));
    }

    /** @test */
    public function it_has_amount()
    {
        $this->assertTrue(Blueprint::hasMacro('amount'));
    }

    /** @test */
    public function it_has_small_amount()
    {
        $this->assertTrue(Blueprint::hasMacro('smallAmount'));
    }

    /** @test */
    public function it_has_reference()
    {
        $this->assertTrue(Blueprint::hasMacro('reference'));
    }

    /** @test */
    public function it_has_standard_time()
    {
        $this->assertTrue(Blueprint::hasMacro('standardTime'));
    }
}
