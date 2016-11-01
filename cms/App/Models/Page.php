<?php

namespace CMS\App\Models;

use Carbon\Carbon;
use CMS\App\Scopes\StatusScope;
//use Respect\Validation;


/**
 * @property mixed  updated_at
 * @property string published_at
 */
class Page extends MyModel
{
    protected $table = 'pages';

    protected $dates = ['published_at', 'created_at', 'updated_at'];
    protected $dateFormat = 'M d, Y';





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
