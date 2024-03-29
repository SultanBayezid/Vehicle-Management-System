<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Driver;
use Auth;
use App\Models\Trip;
use App\Models\Transaction;
use Validator;
use Session;
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

    public function bookingStep1($vehicle_id, $user_id)
    {
        // Here you can perform any necessary logic, such as fetching data from the database,
        // validating input, etc.
        if (!Auth::check()) {
            // If the user is not authenticated, redirect to login
            return redirect()->route('login');
        }
        $data['vehicle'] = Vehicle::findOrfail($vehicle_id);
        $data['user'] = User::findOrfail($user_id);
        // For demonstration purposes, let's just return a view with the parameters passed to it.
        return view('frontend.vehicles.booking.step1', $data);
    }

 

    public function bookingStep2(Request $request)
{

    
    if (!Auth::check()) {
        // If the user is not authenticated, redirect to login
        return redirect()->route('login');
    }
    $validatedData = $request->validate([
        'customer_id' => 'required',
        'driver_id' => 'required',
        'vehicle_id' => 'required',
        'pickup_location' => 'required',
        'dropoff_location' => 'required',
        'fare_amount' => 'required',
        'trip_date' => 'required',
        'departure_time' => 'required',
        'arrival_time' => 'required',
        'distance_km' => 'required',
        'trip_notes' => 'nullable',
    
    ]);
    $validatedData['customer'] = User::find($request->customer_id);
    $validatedData['driver'] = Driver::find($request->driver_id);
    $validatedData['vehicle'] = Vehicle::find($request->vehicle_id);
    // Store the validated form data in the session
    Session::put('trip', $validatedData);
     

    // return $validatedData;
    // Redirect to the next step or a confirmation page
    return view('frontend.vehicles.booking.step2');

}

public function bookingStep3()
{
    // Retrieve the trip details from the session
    $tripDetails = Session::get('trip');
    return $tripDetails;

    // Pass the trip details to the confirmed page view
    return view('confirmed', ['tripDetails' => $tripDetails]);
}
    
}
