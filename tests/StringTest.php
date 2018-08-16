<?php

namespace CleaniqueCoders\Blueprint\Macro\Tests;

use CleaniqueCoders\Blueprint\Macro\Tests\Traits\TableTrait;

class StringTest extends TestCase
{
    use TableTrait;

    public function setUp()
    {
        parent::setUp();
        $this->fetchTables();
    }

    /** @test */
    public function it_has_strings_table()
    {
        $this->assertHasTable('strings');
    }

    /** @test */
    public function it_has_strings_columns()
    {
        $this->assertHasColumn('strings', 'label');
        $this->assertHasColumn('strings', 'name');
        $this->assertHasColumn('strings', 'code');
        $this->assertHasColumn('strings', 'reference');
    }

    /** @test */
    public function it_has_correct_columns_setup()
    {
        $columns = $this->schema->listTableColumns('strings');

        foreach ($columns as $column) {
            $criteria = $this->getCriteria($column->getName());

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
                    'type'     => 'string',
                    'length'   => 255,
                    'nullable' => true,
                    'comment'  => 'label',
                ];
                break;
            case 'name':
                $criteria = [
                    'type'     => 'string',
                    'length'   => 255,
                    'nullable' => true,
                    'comment'  => 'name',
                ];
                break;
            case 'code':
                $criteria = [
                    'type'     => 'string',
                    'length'   => 20,
                    'nullable' => true,
                    'comment'  => 'Code',
                ];
                break;
            case 'reference':
                $criteria = [
                    'type'     => 'string',
                    'length'   => 64,
                    'nullable' => true,
                    'comment'  => 'Reference',
                ];
                break;
            default:
                $criteria = [
                    'type'     => 'string',
                    'length'   => 255,
                    'nullable' => true,
                    'comment'  => '',
                ];
                break;
        }

        return $criteria;
    }
}
