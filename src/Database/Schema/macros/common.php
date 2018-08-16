<?php


use Illuminate\Database\Schema\Blueprint as DefaultBlueprint;

/*
 * Common Setup
 */
DefaultBlueprint::macro('user', function($nullable = false) {
    return $this->addForeign('users', ['nullable' => $nullable])->comment('Owner of the record.');
});

DefaultBlueprint::macro('standardTime', function() {
    $this->softDeletes();
    $this->timestamps();
});
