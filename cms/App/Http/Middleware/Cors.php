<?php

namespace CMS\App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $domains = ['http://localhost:8000'];
        $origin = collect($request->server())->get('HTTP_ORIGIN');

        if($origin && in_array($origin, $domains)){
            return $next($request)->header('Access-Control-Allow-Origin' , '*')
                ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
        }

        return $next($request);
    }
}
