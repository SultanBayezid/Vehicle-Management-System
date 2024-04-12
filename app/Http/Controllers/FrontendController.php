<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Driver;
use App\Models\Blog;
use Auth;
use App\Models\Contact;
use App\Models\Trip;
use App\Models\Transaction;
use Validator;
use Session;
class FrontendController extends Controller
{
    public function index()
    {
        $data['vehicles'] = Vehicle::All();
        $data['blogs'] = Blog::All();
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
    $tripData = Session::get('trip');

    // Find the user and vehicle
    $user = User::find($tripData['customer_id']);
    $vehicle = Vehicle::find($tripData['vehicle_id']);

    // Check if a contact exists for the user
    $contact = Contact::where('user_id', $tripData['customer_id'])->first();
    if (!$contact) {
        // If contact does not exist, create a new one
        $contact = new Contact();
        $contact->profile_type = 'Individual';
        $contact->contact_name = $user->name;
        $contact->contact_email = $user->email;
        $contact->user_id = $user->id;
        $contact->group_id = 1;
        $contact->company_id = $vehicle->company_id;
        $contact->save();
    }

    // Create a new trip instance
    $trip = new Trip();

    // Set trip data
    $trip->customer_id = $contact->id; // Use contact ID as customer ID
    $trip->driver_id = $tripData['driver_id'];
    $trip->vehicle_id = $tripData['vehicle_id'];
    $trip->pickup_location = $tripData['pickup_location'];
    $trip->dropoff_location = $tripData['dropoff_location'];
    $trip->fare_amount = $tripData['fare_amount'];
    $trip->trip_date = $tripData['trip_date'];
    $trip->departure_time = $tripData['departure_time'];
    $trip->arrival_time = $tripData['arrival_time'];
    $trip->distance_km = $tripData['distance_km'];
    $trip->trip_notes = $tripData['trip_notes'];
    $trip->company_id = $vehicle->company_id;
    $trip->status = 0; // Set status to pending

    // Save the trip to the database
    $trip->save();

    return redirect()->route('trip.list')->with('success', 'Your booking has been submitted and is waiting for approval.');
}

    
}
