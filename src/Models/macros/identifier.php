<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('uuid', function ($uuid) {
    return $this->where('uuid', $uuid);
});

Builder::macro('findByUuid', function ($uuid) {
    return $this->uuid($uuid)->firstOrFail();
});

Builder::macro('hashslug', function ($hashslug) {
    return $this->where('hashslug', $hashslug);
});

Builder::macro('findByHashSlug', function ($hashslug) {
    return $this->hashslug($hashslug)->firstOrFail();
});

Builder::macro('hashslugOrId', function ($identifier) {
    return $this->hashslug($identifier)->orWhere('id', $identifier);
});

Builder::macro('findByHashSlugOrId', function ($identifier) {
    return $this->hashslugOrId($identifier)->firstOrFail();
});

Builder::macro('slug', function ($slug) {
    return $this->where('slug', $slug);
});

Builder::macro('findBySlug', function ($slug) {
    return $this->slug($slug)->firstOrFail();
});
