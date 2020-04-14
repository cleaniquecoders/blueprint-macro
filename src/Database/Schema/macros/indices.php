<?php

use Doctrine\DBAL\Schema\Index;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
 * Create an index if it doesn't exist yet
 */
Blueprint::macro('createIndexIfNotExists', function ($columns, $name = null, $connection = null) {
    return $this->hasIndex($columns, $connection)
        ? $this
        : $this->index($columns, $name ?: $this->createIndexNameByColumns($columns));
});

/*
 * Check if an index exists
 */
Blueprint::macro('hasIndex', function ($columns) {
    return $this->getIndexNameByColumns($columns) !== null;
});

/*
 * Get an index name by columns
 */
Blueprint::macro('getIndexNameByColumns', function ($columns) {
    if (is_string($columns)) {
        $columns = [$columns];
    }

    $schemaManager = Schema::getConnection()->getDoctrineSchemaManager();
    $indices = $schemaManager->listTableIndexes($this->getTable());
    $filteredIndices = collect($indices)->filter(function (Index $index) use ($columns) {
        return compare_array($index->getColumns(), $columns);
    });

    if ($filteredIndices->isNotEmpty()) {
        return $filteredIndices->keys()->first();
    }

    return null;
});

/*
 * Create an index name based on columns
 */
Blueprint::macro('createIndexNameByColumns', function ($columns) {
    if (is_string($columns)) {
        $columns = [$columns];
    }

    $index = $this->createIndexName('index', $columns);

    if (strlen($index) > 64) {
        $index = implode('_', $columns);
    }

    return $index;
});

/*
 * Drop an index if it exists
 */
Blueprint::macro('dropIndexIfExists', function ($columns) {
    if ($this->hasIndex($columns)) {
        return $this->dropIndex($this->getIndexNameByColumns($columns));
    }

    return $this;
});

if (!function_exists('compare_array')) {
    /**
     * @param $a
     * @param $b
     * @return bool
     */
    function compare_array($a, $b): bool
    {
        return (
            is_array($a)
            && is_array($b)
            && count($a) == count($b)
            && array_diff($a, $b) === array_diff($b, $a)
        );
    }
}