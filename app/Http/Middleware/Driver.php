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
    public function handle($request, Closure $next)
    {
		
		if(Auth::User()->user_type != 'driver'){
            return redirect()->route('home')->with('error',_lang('Permission denied !'));		
		}
		
        return $next($request);
    }
}
