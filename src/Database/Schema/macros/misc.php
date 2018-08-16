<?php


use Illuminate\Database\Schema\Blueprint;

/*
 * Misc.
 */
Blueprint::macro('ordering', function($key = 'ordering', $length = 10) {
    return $this->string($key, $length)
        ->nullable()
        ->comment('Ordering');
});

Blueprint::macro('percent', function($key = 'percent') {
    return $this->decimal($key, 5, 2)->default(0)->comment('Percentage');
});

Blueprint::macro('expired', function() {
    $this->boolean('is_expired')->default(false)->comment('Is Expired in Boolean');
    $this->datetime('expired_at')->nullable()->comment('Expired Date Time');

    return $this;
});
