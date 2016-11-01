<?php

namespace CMS\App\Http\Middleware;

class VerifyCsrfToken extends \App\Http\Middleware\VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
