<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class FrontendController extends Controller
{
    public function index()
    {
        $data['vehicles'] = Vehicle::All();
        return view('frontend.home', $data);
    }
}
