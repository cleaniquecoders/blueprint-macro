<?php

use Illuminate\Database\Schema\Blueprint;

/*
 * Acceptance
 */
Blueprint::macro('addAcceptance', function($value, $table_by = 'users', $is_default = true) {
    $this->is($value, $is_default);
    $this->at($value);
    $this->by($table_by, $value);
    $this->remarks($value . '_remarks');

    return $this;
});

Blueprint::macro('status', function($key = 'status', $default = true) {
    return $this->boolean($key)->default($default)->comment('Status');
});

Blueprint::macro('is', function($key = 'activated', $default = true, $prefix = 'is_') {
    return $this->status($prefix . $key, $default)->comment('Is it ' . $key . '?');
});

Blueprint::macro('at', function($key = 'activated', $suffix = '_at') {
    return $this->datetime($key . $suffix)->nullable()->comment('Event occured at Date & Time');
});

Blueprint::macro('by', function($table, $key = null, $nullable = true, $bigInteger = false, $suffix = '_by') {
    return $this->addForeign($table, [
        'fk'         => (! is_null($key) ? $key . $suffix : null),
        'nullable'   => $nullable,
        'bigInteger' => $bigInteger,
    ]);
});
