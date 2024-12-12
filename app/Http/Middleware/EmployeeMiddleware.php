<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Controleer of de gebruiker is ingelogd en de rol 'werknemer' heeft
        if (Auth::check() && Auth::user()->role === 'werknemer') {
            return $next($request);
        }

        // Redirect naar de homepagina als de gebruiker geen werknemer is
        return redirect('/')->with('error', 'Toegang geweigerd.');
    }
}
