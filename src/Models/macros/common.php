<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('user', function ($value) {
    return $this->where('user_id', $value);
});
