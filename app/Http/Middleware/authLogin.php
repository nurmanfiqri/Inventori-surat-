<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
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
    // public function handle($request, Closure $next)
    // {
    //     if (\Illuminate\Support\Facades\Session::get('login')) {
    //         return $next($request);
    //     } else {
    //         return abort(404);
    //     }
    // }

    public function handle($request, Closure $next)
    {
        if(Session::get('login')){
            return $next($request);
        }else{
            // toastr()->error('Silahkan login dahulu');

            Session::put('previousUrl', URL::full());
            return redirect('/');
        }
    }
}
