<?php

namespace CLNQCDRS\Blueprint\Macro\Tests;

use CLNQCDRS\Blueprint\Macro\Tests\TestCase;
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
    public function it_has_add_acceptance()
    {
        $this->assertTrue(Blueprint::hasMacro('addAcceptance'));
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
    public function it_has_standard_time()
    {
        $this->assertTrue(Blueprint::hasMacro('standardTime'));
    }
}
