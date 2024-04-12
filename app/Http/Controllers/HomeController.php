<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $type = Auth::user()->user_type;
            if( $type  == 'admin' ){
                return view('backend.dashboard-admin'); 
            }
        }else if( $type  == 'user' ){
            return view('backend.dashboard');
        	}

        else if($type  == 'staff' ){

            return view('backend.dashboard-user');
        }
        // Redirect to login page if user not authenticated
        return redirect()->route('login');
    }
}
