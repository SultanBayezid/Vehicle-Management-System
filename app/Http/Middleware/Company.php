<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;
use Closure;
use Auth;

class Company
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
    	  // Check if the user is authenticated
		  if (!Auth::check()) {
            // If not authenticated, redirect to the login page
            return redirect('/')->with('error', _lang('You need to login first !'));
        }
		$user = Auth::user();
		$user_type = $user->user_type;

		if($user_type == 'user' || $user_type == 'staff'){
			$route_name = \Request::route()->getName();

			/** If User Type = Staff **/
			if( $route_name != '' && $user_type != 'user'){
				
				if(explode(".",$route_name)[1] == "update"){
					$route_name = explode(".",$route_name)[0].".edit";
				}else if(explode(".",$route_name)[1] == "store"){
					$route_name = explode(".",$route_name)[0].".create";
				}
				if( ! has_permission($route_name)){
					return redirect('/')->with('error', _lang('Permission denied !'));
				}
			}

		}else{
			return redirect('/');
		}

		// if(has_membership_system() == 'enabled'){
		// 	if( membership_validity() < date('Y-m-d')){
		// 		return redirect('membership/extend')->with('message',_lang('Please make your membership payment for further process !'));
		// 	}
		// }
			
        return $next($request);
    }
}
