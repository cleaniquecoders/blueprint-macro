<?php


use Illuminate\Database\Schema\Blueprint as DefaultBlueprint;

/*
 * Acceptance
 */
DefaultBlueprint::macro('addAcceptance', function($value, $table_by = 'users') {
    $this->is($value);
    $this->at($value);
    $this->by($table_by, $value);
    $this->remarks($value . '_remarks');

    return $this;
});

DefaultBlueprint::macro('status', function($key = 'status', $default = true) {
    return $this->boolean($key)->default($default)->comment('Status');
});

DefaultBlueprint::macro('is', function($key = 'activated', $default = true, $prefix = 'is_') {
    return $this->status($prefix . $key, $default)->comment('Is it ' . $key . '?');
});

DefaultBlueprint::macro('at', function($key = 'activated', $suffix = '_at') {
    return $this->datetime($key . $suffix)->nullable()->comment('Event occured at Date & Time');
});

DefaultBlueprint::macro('by', function($table, $key = null, $nullable = true, $bigInteger = false, $suffix = '_by') {
    return $this->addForeign($table, [
        'fk'         => (! is_null($key) ? $key . $suffix : null),
        'nullable'   => $nullable,
        'bigInteger' => $bigInteger,
    ]);
});
