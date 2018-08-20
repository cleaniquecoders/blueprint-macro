<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('label', function($label, $key = 'label') {
    return $this->where($key, $label);
});

Builder::macro('name', function($name, $key = 'name') {
    return $this->where($key, $name);
});

Builder::macro('code', function($code, $key = 'code') {
    return $this->where($code, $code);
});

Builder::macro('reference', function($reference, $key = 'reference') {
    return $this->where($key, $reference);
});
