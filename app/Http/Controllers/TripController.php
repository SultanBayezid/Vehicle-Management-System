<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Validator;

class TripController extends Controller
{
    public function index(){

        $trips = Trip::All();
        return view('backend.trips.list',compact('trips'));
    }

    public function create(){
        return view('backend.trips.create');
        
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'customer_id'      => 'required',
            'driver_id'        => 'required',
            'pickup_location'  => 'required',
            'dropoff_location' => 'nullable',
            'fare_amount'      => 'nullable|numeric',
            'trip_date'        => 'nullable|date',
            'departure_time'   => 'nullable|date_format:H:i',
            'arrival_time'     => 'nullable|date_format:H:i',
            'distance_km'      => 'nullable|numeric',
            'trip_notes'       => 'nullable|max:255',
            // Add any other validation rules you need here
        ]);
        
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return redirect()->route('trips.create')
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        $trip = new Trip();
        $trip->customer_id = $request->input('customer_id');
        $trip->driver_id = $request->input('driver_id');
        $trip->vehicle_id = $request->input('vehicle_id');
        $trip->pickup_location = $request->input('pickup_location');
        $trip->dropoff_location = $request->input('dropoff_location');
        $trip->fare_amount = $request->input('fare_amount');
        $trip->trip_date = $request->input('trip_date');
        $trip->departure_time = $request->input('departure_time');
        $trip->arrival_time = $request->input('arrival_time');
        $trip->distance_km = $request->input('distance_km');
        $trip->trip_notes = $request->input('trip_notes');
    
        // Save the trip to the database
        $trip->save();
    
        // Redirect to a success page or return a response as needed
        return redirect()->route('trips.index')->with('success', 'Trip created successfully');
    }

    public function show($id){

        $trip = Trip::find($id);
        return view('backend.trips.view', compact('trip'));

    }
}
