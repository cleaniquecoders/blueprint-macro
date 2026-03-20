<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Schema\Blueprint;
use PHPUnit\Framework\Attributes\Test;

class AvailableMacroTest extends TestCase
{
    #[Test]
    public function it_has_blueprint_macros()
    {
        $macros = [
            'addAcceptance', 'status', 'is', 'at', 'by',
            'user', 'standardTime',
            'actedStatus', 'actedAt', 'actedBy',
            'addForeign', 'addNullableForeign', 'referenceOn', 'belongsTo', 'nullableBelongsTo',
            'uuid', 'hashslug', 'slug',
            'ordering', 'percent', 'expired',
            'money', 'amount', 'smallAmount',
            'label', 'name', 'code', 'reference', 'remarks', 'description',
        ];

        foreach ($macros as $macro) {
            $this->assertTrue(Blueprint::hasMacro($macro));
        }
    }

    #[Test]
    public function it_has_eloquent_builder_macros()
    {
        $macros = [
            'status', 'is', 'at', 'by',
            'user',
            'uuid', 'hashslug', 'slug', 'findByUuid', 'findByHashSlug', 'hashslugOrId', 'findByHashSlugOrId', 'findBySlug',
            'label', 'name', 'code', 'reference',
        ];

        foreach ($macros as $macro) {
            $this->assertTrue(Builder::hasGlobalMacro($macro));
        }
    }
}
