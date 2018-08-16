<?php


use Illuminate\Database\Schema\Blueprint as DefaultBlueprint;

/*
 * Identifier Replacement
 */
DefaultBlueprint::macro('uuid', function($length = 64) {
    return $this->string('uuid', $length)->comment('UUID');
});

DefaultBlueprint::macro('hashslug', function($length = 64) {
    return $this->string('hashslug')
        ->length($length)
        ->nullable()
        ->unique()
        ->index()
        ->comment('Hashed Slug');
});

DefaultBlueprint::macro('slug', function() {
    return $this->string('slug')
        ->nullable()
        ->unique()
        ->index()
        ->comment('Slug');
});
