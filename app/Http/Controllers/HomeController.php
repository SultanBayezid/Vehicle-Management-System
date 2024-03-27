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
            if (auth()->user()->user_type == 'client') {
                return redirect('/');
            } else {
                return view('backend.dashboard');
            }
        }
        // Redirect to login page if user not authenticated
        return redirect()->route('login');
    }
}
