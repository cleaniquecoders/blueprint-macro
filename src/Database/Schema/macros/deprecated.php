<?php


use Illuminate\Database\Schema\Blueprint as DefaultBlueprint;

// will be deprecated
DefaultBlueprint::macro('actedStatus', function($value = 'is_acted') {
    return $this->boolean($value)->default(false)->comment('Action statys in Boolean');
});

// will be deprecated
DefaultBlueprint::macro('actedAt', function($value = 'acted_at') {
    return $this->datetime($value)->nullable()->comment('Acted at Date & Time');
});

// will be deprecated
DefaultBlueprint::macro('actedBy', function($value = 'acted_by') {
    return $this->unsignedInteger($value)->nullable()->comment('Done / Acted by an actor');
});
