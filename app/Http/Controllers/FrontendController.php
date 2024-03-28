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


    public function rent()
    {
        $data['vehicles'] = Vehicle::All();
        return view('frontend.vehicles.list', $data);
    }
    public function singleCar($id){

        $data['vehicle'] = Vehicle::findOrfail($id);
        return view('frontend.vehicles.show', $data);


    }
}
