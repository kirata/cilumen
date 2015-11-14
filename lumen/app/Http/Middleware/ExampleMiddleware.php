<?php

namespace App\Http\Middleware;

use Closure;

class ExampleMiddleware
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
        // header('Access-Control-Allow-Origin: http://belajar.dev');
        // header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');

        return $next($request);
    }
}
