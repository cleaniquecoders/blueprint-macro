<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests\Traits;

use Illuminate\Support\Facades\Schema;

trait TableTrait
{
    use ColumnTrait;

    public $tables;

    public $columnsCache = [];

    public function fetchTables()
    {
        $this->tables = array_map(
            fn ($table) => $table['name'],
            Schema::getTables()
        );
    }

    public function assertHasTable($table)
    {
        $this->assertTrue(Schema::hasTable($table));
    }

    /**
     * Get columns for a table as an associative array keyed by column name.
     */
    public function getTableColumns(string $table): array
    {
        if (! isset($this->columnsCache[$table])) {
            $columns = Schema::getColumns($table);
            $this->columnsCache[$table] = [];

            foreach ($columns as $column) {
                $this->columnsCache[$table][$column['name']] = $column;
            }
        }

        return $this->columnsCache[$table];
    }
}
