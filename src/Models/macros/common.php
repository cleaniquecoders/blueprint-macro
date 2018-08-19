<?php

use Illuminate\Database\Query\Builder;

Builder::macro('user', function($value) {
    return $this->where('user_id', $value);
});
