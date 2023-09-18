<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use Illuminate\Support\Facades\Auth;

public function index()
{
    // Retrieve user-specific data or perform any necessary actions here
    $userData = Auth::user();

    return view('dashboard.dashboard', compact('userData'));
}

}
