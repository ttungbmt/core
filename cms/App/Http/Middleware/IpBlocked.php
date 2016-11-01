<?php
namespace CMS\App\Http\Middleware;

use Closure;

class IpBlocked
{
    /**
     * @param \CMS\App\Http\Middleware\Request $request
     * @param \Closure                         $next
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}