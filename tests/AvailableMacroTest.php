<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use Illuminate\Database\Schema\Blueprint;

class AvailableMacroTest extends TestCase
{
    /** @test */
    public function it_has_blueprint_macros()
    {
        $macros = [
            'addAcceptance', 'status', 'is', 'at', 'by',
            'user', 'standardTime',
            'actedStatus', 'actedAt', 'actedBy',
            'addForeign', 'addNullableForeign', 'referenceOn', 'belongsTo', 'nullableBelongsTo',
            'uuid', 'hashslug', 'slug',
            'ordering', 'percent', 'expired',
            'amount', 'smallAmount',
            'label', 'name', 'code', 'reference', 'remarks', 'description',
        ];

        foreach ($macros as $macro) {
            $this->assertTrue(Blueprint::hasMacro($macro));
        }
    }
}
