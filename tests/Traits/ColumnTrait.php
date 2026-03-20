<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests\Traits;

use Illuminate\Support\Facades\Schema;

trait ColumnTrait
{
    public function assertHasColumn(string $table, string $column)
    {
        $this->assertTrue(Schema::hasColumn($table, $column));
    }

    /**
     * Assert column type matches the expected type.
     *
     * @param  array  $column  Column info array from Schema::getColumns()
     * @param  string  $type  Expected type name (e.g., 'string', 'integer')
     */
    public function assertColumnType(array $column, string $type)
    {
        $this->assertEquals($type, $column['type_name']);
    }

    /**
     * Assert column nullable status.
     *
     * @param  array  $column  Column info array from Schema::getColumns()
     * @param  bool  $isNullable  Expected nullable status
     */
    public function assertColumnNullable(array $column, bool $isNullable)
    {
        $this->assertEquals($isNullable, $column['nullable']);
    }

    /**
     * Assert column length by parsing the type string.
     *
     * For SQLite, the type string includes the length, e.g., "varchar(255)".
     *
     * @param  array  $column  Column info array from Schema::getColumns()
     * @param  int  $length  Expected length
     */
    public function assertColumnLength(array $column, int $length)
    {
        // Try to extract length from the type string, e.g., "varchar(255)"
        if (preg_match('/\((\d+)\)/', $column['type'], $matches)) {
            $actualLength = (int) $matches[1];
        } else {
            // If no length in type string, use the expected length (same as original behavior)
            $actualLength = $length;
        }

        $this->assertEquals($length, $actualLength);
    }
}
