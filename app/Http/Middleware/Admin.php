<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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

    if (Auth::user() &&  Auth::user()->type == 0) {

        return $next($request);
     }
     Auth::logout();
     return redirect('/');
    }
}
