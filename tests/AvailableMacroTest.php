<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use Illuminate\Database\Schema\Blueprint;

class AvailableMacroTest extends TestCase
{
    /** @test */
    public function it_has_extended_blueprint()
    {
        $macros = [
            'addForeign', 'addNullableForeign',
            'referenceOn', 'belongsTo', 'nullableBelongsTo',
            'uuid', 'addAcceptance', 'actedStatus',
            'actedAt', 'actedBy', 'remarks', 'hashslug',
            'slug', 'label', 'name', 'description', 'expired',
            'user', 'amount', 'smallAmount', 'reference', 'standardTime',
            'code', 'status', 'is', 'ordering', 'percent',
        ];

        foreach ($macros as $macro) {
            $this->assertTrue(Blueprint::hasMacro($macro));
        }
    }
}
