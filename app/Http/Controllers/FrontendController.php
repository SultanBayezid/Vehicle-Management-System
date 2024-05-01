<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Enquiry;
use App\Models\CarBrand;
use App\Models\User;
use App\Models\Driver;
use App\Models\Blog;
use Auth;
use App\Models\Contact;
use App\Models\CarBodyType;
use App\Models\Trip;
use App\Models\Transaction;
use App\Models\Transmission;
use App\Models\FuelType;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
class FrontendController extends Controller
{
    public function index()
    {


        $data['vehicles'] = Vehicle::latest()->take(9)->get();

        $data['blogs'] = Blog::latest()->take(10)->get();
        return view('frontend.home', $data);
    }


    public function rent()
    {
        $data['vehicles'] = Vehicle::where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        $data['transmissions'] = Transmission::All();
        $data['fuelTypes'] = FuelType::All();
        return view('frontend.vehicles.list', $data);
    }
    public function singleCar($encryptedId){
       
        $id = Crypt::decrypt($encryptedId);
        $data['vehicle'] = Vehicle::findOrfail($id);
        $data['vehicles'] = Vehicle::where('status', 1)->whereNotIn('id', [$id])
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();

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


public function enquiry($encryptedId) {
    if ($encryptedId == 'basic') {
        $subject = _('Inquiry About Basic Plan');
        $message = "I'm interested in your Basic plan and would like to learn more about its features." . PHP_EOL .
                   "Could you please provide me with information on the features included in the Basic plan and how they can benefit my business?" . PHP_EOL . PHP_EOL .
                   "Thank you for your assistance.";
    } elseif ($encryptedId == 'regular') {
        $subject = _('Inquiry About Regular Plan');
        $message = "I'm interested in your Regular plan and would like to learn more about its features." . PHP_EOL .
                   "Could you please provide me with information on the features included in the Regular plan and how they can benefit my business?" . PHP_EOL . PHP_EOL .
                   "Thank you for your assistance.";
    } elseif ($encryptedId == 'premium') {
        $subject = _('Inquiry About Premium Plan');
        $message = "I'm interested in your Premium plan and would like to learn more about its features." . PHP_EOL .
                   "Could you please provide me with information on the features included in the Premium plan and how they can benefit my business?" . PHP_EOL . PHP_EOL .
                   "Thank you for your assistance.";
    } else {
        $id = Crypt::decrypt($encryptedId);
        $vehicle = Vehicle::findOrFail($id);

        $subject = "Vehicle Inquiry - {$vehicle->brand->name}, {$vehicle->model->name}, {$vehicle->myear->year}";
        $message = "I am writing to inquire about the availability and details of the following vehicle:" . PHP_EOL .
                   "- Make: {$vehicle->brand->name}" . PHP_EOL .
                   "- Model: {$vehicle->model->name}" . PHP_EOL .
                   "- Year: {$vehicle->myear->year}" . PHP_EOL . PHP_EOL .
                   "Thanks," . PHP_EOL .
                   Auth::user()->name;
    }
    
    $data = [
        'subject' => $subject,
        'message' => $message
    ];
    
    return view('frontend.contact-us', $data);
}




public function enquirySend(Request $request) {


    $validatedData = $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'subject' => 'required',
        'message' => 'required',
        
        // Add other validation rules for service fields as needed
    ]);

     $enq = new Enquiry();
     $enq->name = $request->name;
     $enq->phone = $request->phone;
     $enq->subject = $request->subject;
     $enq->message = $request->message;
     $enq->user_id = Auth::user()->id ?? 0;
     $enq->save();

    return redirect()->route('home')->with('success', _lang('Your request has been sent, we will contact you soon'));
}


public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $brandId = $request->input('brand_id');

        // Query car_brands table for keyword search
        $brandQuery = CarBrand::query();
        if ($keyword) {
            $brandQuery->where('name', 'like', "%$keyword%");
        }
        $brandIds = $brandQuery->pluck('id');

        // Query vehicles table with brand filter
        $vehicleQuery = Vehicle::query();
        if ($brandId && $brandId !== 'All categories') {
            $vehicleQuery->where('brand_id', $brandId);
        }
        if ($brandIds->isNotEmpty()) {
            $vehicleQuery->whereIn('brand_id', $brandIds);
        }

        // Get the results
        $results = $vehicleQuery->where('status', 1)->paginate(10);
        $data['transmissions'] = Transmission::All();
        $data['fuelTypes'] = FuelType::All();
        $data['vehicles'] = $results;
    

        // You can return the results to a view for display
        return view('frontend.vehicles.search-results', $data);
    }

    
}
