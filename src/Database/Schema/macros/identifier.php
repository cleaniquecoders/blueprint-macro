<?php


use Illuminate\Database\Schema\Blueprint;

/*
 * Identifier Replacement
 */
Blueprint::macro('uuid', function($length = 64) {
    return $this->string('uuid', $length)->comment('UUID');
});

Blueprint::macro('hashslug', function($length = 64) {
    return $this->string('hashslug')
        ->length($length)
        ->nullable()
        ->unique()
        ->index()
        ->comment('Hashed Slug');
});

Blueprint::macro('slug', function() {
    return $this->string('slug')
        ->nullable()
        ->unique()
        ->index()
        ->comment('Slug');
});
