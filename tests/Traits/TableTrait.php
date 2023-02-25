<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests\Traits;

use DB;

trait TableTrait
{
    use ColumnTrait;

    public $database_connection;

    public $connection;

    public $schema;

    public $tables;

    public function fetchTables()
    {
        $this->database_connection = config('database.default');
        $this->connection = DB::connection($this->database_connection)->getDoctrineConnection();
        $this->schema = $this->connection->getSchemaManager();
        $this->tables = $this->schema->listTableNames();
    }

    public function assertHasTable($table)
    {
        $this->assertTrue($this->schema->tablesExist($table));
    }
}
