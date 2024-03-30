<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\User;
use Auth;

class ClientController extends Controller
{
    //
    public function triplist(){

      

        $trips = Trip::where('customer_id', auth()->user()->id)->get();
        return view('frontend.clients.list', compact('trips'));
      
    }

    public function profile(){
        $user = User::find(Auth()->user()->id);
        return view('frontend.clients.profile', compact('user'));
    }

    public function upload(Request $request){
   
   
           // Return the file path or any response
           return response()->json(['message' => 'Files uploaded successfully!']);
    }
}
