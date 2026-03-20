<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use CleaniqueCoders\Blueprint\Macro\Tests\Traits\TableTrait;
use PHPUnit\Framework\Attributes\Test;

class StringTest extends TestCase
{
    use TableTrait;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fetchTables();
    }

    #[Test]
    public function it_has_strings_table()
    {
        $this->assertHasTable('strings');
    }

    #[Test]
    public function it_has_strings_columns()
    {
        $this->assertHasColumn('strings', 'label');
        $this->assertHasColumn('strings', 'name');
        $this->assertHasColumn('strings', 'code');
        $this->assertHasColumn('strings', 'reference');
    }

    #[Test]
    public function it_has_correct_columns_setup()
    {
        $columns = $this->getTableColumns('strings');

        foreach ($columns as $name => $column) {
            $criteria = $this->getCriteria($name);

            $this->assertColumnType($column, $criteria['type']);
            $this->assertColumnNullable($column, $criteria['nullable']);
            $this->assertColumnLength($column, $criteria['length']);
        }
    }

    private function getCriteria($column)
    {
        switch ($column) {
            case 'label':
                $criteria = [
                    'type' => 'varchar',
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'label',
                ];

                break;
            case 'name':
                $criteria = [
                    'type' => 'varchar',
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'name',
                ];

                break;
            case 'code':
                $criteria = [
                    'type' => 'varchar',
                    'length' => 20,
                    'nullable' => true,
                    'comment' => 'Code',
                ];

                break;
            case 'reference':
                $criteria = [
                    'type' => 'varchar',
                    'length' => 64,
                    'nullable' => true,
                    'comment' => 'Reference',
                ];

                break;
            default:
                $criteria = [
                    'type' => 'varchar',
                    'length' => 255,
                    'nullable' => true,
                    'comment' => '',
                ];

                break;
        }

        return $criteria;
    }
}
