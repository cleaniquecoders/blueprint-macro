<?php

use Illuminate\Database\Query\Builder;

Builder::macro('status', function($status, $key = 'status') {
    return $this->where($key, $status);
});

Builder::macro('is', function($key, $value = true, $prefix = 'is_') {
    return $this->where($prefix . $key, $value);
});

Builder::macro('at', function($key, $value, $suffix = '_at') {
    return $this->where($key . $suffix, $value);
});

Builder::macro('by', function($key, $value, $suffix = '_by') {
    return $this->where($key . $suffix, $value);
});
