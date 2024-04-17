<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Driver
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            // If user is not authenticated, redirect them to the login page
            return redirect()->route('login');
        }

        // Check if the user is a driver
        if ($request->user()->user_type !== 'driver') {
            // If user is not a driver, deny access
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
