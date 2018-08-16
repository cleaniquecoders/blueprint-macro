<?php


use Illuminate\Database\Schema\Blueprint as DefaultBlueprint;

/*
 * Foreign Key
 */
DefaultBlueprint::macro('addForeign', function($table, $options = []) {
    $fk = (isset($options['fk']) && ! empty($options['fk'])) ?
        $options['fk'] : strtolower(str_singular($table)) . '_id';

    $reference = (isset($options['reference']) && ! empty($options['reference'])) ?
        $options['reference'] : 'id';

    if (isset($options['bigInteger']) && true == $options['bigInteger']) {
        $schema = $this->unsignedBigInteger($fk)->index();
    } else {
        $schema = $this->unsignedInteger($fk)->index();
    }

    if (isset($options['nullable']) && true == $options['nullable']) {
        $schema->nullable();
    }

    if (! isset($options['no_reference'])) {
        $this->referenceOn($fk, $table, $reference);
    }

    return $schema;
});

 DefaultBlueprint::macro('addNullableForeign', function($table, $fk, $bigInteger = false) {
     return $this->addForeign($table, ['nullable' => true, 'fk' => $fk, 'bigInteger' => $bigInteger])->comment('Nullable FK for ' . $table);
 });

DefaultBlueprint::macro('referenceOn', function($key, $table, $reference = 'id') {
    return $this->foreign($key)
        ->references($reference)
        ->on($table);
});

DefaultBlueprint::macro('belongsTo', function($table, $key = null, $bigInteger = false, $reference = 'id') {
    if (is_null($key)) {
        $key = strtolower(str_singular($table)) . '_id';
    }

    return $this->addForeign($table, ['fk' => $key, 'reference' => $reference, 'bigInteger' => $bigInteger])->comment('FK for ' . $table);
});

DefaultBlueprint::macro('nullableBelongsTo', function($table, $key = null, $bigInteger = false, $reference = 'id') {
    if (is_null($key)) {
        $key = strtolower(str_singular($table)) . '_id';
    }

    return $this->addNullableForeign($table, $key, $bigInteger);
});
