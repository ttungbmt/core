<?php

namespace CMS\App\Models;

use CMS\App\Scopes\StatusScope;

class Page extends MyModel
{
    protected $table = 'pages';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new StatusScope);
    }
}
