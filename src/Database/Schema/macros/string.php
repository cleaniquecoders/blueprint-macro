<?php


use Illuminate\Database\Schema\Blueprint as DefaultBlueprint;

/*
 * Short String
 */
DefaultBlueprint::macro('label', function($value = 'label', $length = 255) {
    return $this->string($value, $length)->nullable()->comment($value);
});

DefaultBlueprint::macro('name', function($value = 'name', $length = 255) {
    return $this->string($value, $length)->nullable()->comment($value);
});

DefaultBlueprint::macro('code', function($key = 'code', $length = 20) {
    return $this->string($key, $length)
        ->nullable()
        ->index()
        ->comment('Code');
});

DefaultBlueprint::macro('reference', function($label = 'reference', $length = 64) {
    return $this->string('reference', $length)
        ->nullable()
        ->unique()
        ->index()
        ->comment('Reference');
});

/*
 * Long String
 */
DefaultBlueprint::macro('remarks', function($value = 'remarks') {
    return $this->text($value)->nullable()->comment('Remarks');
});

DefaultBlueprint::macro('description', function($label = 'description') {
    return $this->text($label)->nullable()->comment('Description');
});
