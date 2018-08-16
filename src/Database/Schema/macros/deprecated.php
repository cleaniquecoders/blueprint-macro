<?php


use Illuminate\Database\Schema\Blueprint;

// will be deprecated
Blueprint::macro('actedStatus', function($value = 'is_acted') {
    return $this->boolean($value)->default(false)->comment('Action statys in Boolean');
});

// will be deprecated
Blueprint::macro('actedAt', function($value = 'acted_at') {
    return $this->datetime($value)->nullable()->comment('Acted at Date & Time');
});

// will be deprecated
Blueprint::macro('actedBy', function($value = 'acted_by') {
    return $this->unsignedInteger($value)->nullable()->comment('Done / Acted by an actor');
});
