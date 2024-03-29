<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Auth;

class ClientController extends Controller
{
    //
    public function triplist(){

      

        $trips = Trip::where('customer_id', auth()->user()->id)->get();
        return view('frontend.clients.list', compact('trips'));
      
    }
}
