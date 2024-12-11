<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
//check voor als de user is ingelogd en de rol 'admin' heeft
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // toestemming geven als dit als true word teruggegeven
        }

        //anders redirecten naar home
        return redirect('/');
    }
}
