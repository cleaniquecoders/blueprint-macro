<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests\Traits;

use Doctrine\DBAL\Schema\Column;
use Illuminate\Support\Facades\Schema;

trait ColumnTrait
{
    public function assertHasColumn(string $table, string $column)
    {
        $this->assertTrue(Schema::hasColumn($table, $column));
    }

    public function assertColumnType(Column $column, string $type)
    {
        $this->assertEquals($column->getType()->getName(), $type);
    }

    public function assertColumnNullable(Column $column, bool $is_null)
    {
        $this->assertEquals(! $column->getNotNull(), $is_null);
    }

    public function assertColumnLength(Column $column, int $length)
    {
        $actual_length = $column->getLength() ?? $length;
        $this->assertEquals($actual_length, $length);
    }

    public function assertColumnComment(Column $column, $comment)
    {
        $this->assertEquals($column->getComment(), $comment);
    }
}
