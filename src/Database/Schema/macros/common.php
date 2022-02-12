<?php

use Illuminate\Database\Schema\Blueprint;

/*
 * Common Setup
 */
Blueprint::macro('user', function ($nullable = false) {
    return $this->addForeign('users', ['nullable' => $nullable])->comment('Owner of the record.');
});

Blueprint::macro('standardTime', function () {
    $this->softDeletes();
    $this->timestamps();
});
