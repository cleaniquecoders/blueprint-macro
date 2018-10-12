<?php

use Illuminate\Database\Schema\Blueprint;

/*
 * Short String
 */
Blueprint::macro('label', function($value = 'label', $length = 255) {
    return $this->string($value, $length)->nullable()->comment($value);
});

Blueprint::macro('name', function($value = 'name', $length = 255) {
    return $this->string($value, $length)->nullable()->comment($value);
});

Blueprint::macro('code', function($key = 'code', $length = 20) {
    return $this->string($key, $length)
        ->nullable()
        ->index()
        ->comment('Code');
});

Blueprint::macro('reference', function($label = 'reference', $length = 64) {
    return $this->string('reference', $length)
        ->nullable()
        ->unique()
        ->index()
        ->comment('Reference');
});

/*
 * Long String
 */
Blueprint::macro('remarks', function($value = 'remarks') {
    return $this->text($value)->nullable()->comment('Remarks');
});

Blueprint::macro('description', function($label = 'description') {
    return $this->text($label)->nullable()->comment('Description');
});
