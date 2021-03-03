<?php

namespace App\Http\Middleware;

use Closure;

class authLogin
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
        if (\Illuminate\Support\Facades\Session::get('login')) {
            return $next($request);
        } else {
            return abort(404);
        }
    }
}
