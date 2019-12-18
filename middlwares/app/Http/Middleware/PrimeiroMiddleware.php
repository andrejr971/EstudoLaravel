<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class PrimeiroMiddleware
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
        Log::debug('Passou pelo primeiross Middleware 2');
        $response = $next($request);
        Log::debug('Passou pelo primeiro sssMiddleware 2/2');
        return response('Alterei', 201);
    }
}
