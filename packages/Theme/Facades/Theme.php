<?php
/**
 * Created by PhpStorm.
 * User: ttungbmt
 * Date: 17-Feb-16
 * Time: 12:25 AM
 */

namespace Lara\Theme\Facades;

use Illuminate\Support\Facades\Facade;

class Theme extends Facade
{
    /**
     * Get Facade Accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'theme';
    }
}