<?php

namespace App\Http\Controllers;
use App\Rules\UniquePhoneExceptSelf;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Fuel;
use App\Models\Issue;
use App\Models\Trip;
use App\Models\Contact;
Use File;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Validator;
class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::where('company_id', company_id())->get();
        return view('backend.drivers.list', compact('drivers'));
    }

    public function create()
    {
        return view('backend.drivers.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'driver_name' => 'required',
            // Add other validation rules for service fields as needed
        ]);

        if ($request->client_login == 1) {
            $validatedLoginData = $request->validate([
                'name' => 'required',
                'phone' => 'required|unique:users',
                'password' => 'required',
                // Add other validation rules for service fields as needed
            ]);
        
            $user = new User();
            $user->name = $validatedLoginData['name'];
            $user->phone = $validatedLoginData['phone'];
            $user->password = Hash::make($validatedLoginData['password']);
            $user->user_type = 'driver';
            $user->status = $request->input('status'); // Assuming status is present in the request
            $user->company_id = company_id(); // Assuming company_id() function exists and returns the company ID
            $user->save();
        }

        $profile_picture = "";
        if ($request->hasfile('photo')) {
            $file            = $request->file('photo');
            $profile_picture = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/driver/", $profile_picture);
        }
    
    $driver = new Driver();
    $driver->driver_name = $request->input('driver_name');
    $driver->license_number = $request->input('license_number');
    $driver->license_expiry_date = $request->input('license_expiry_date');
    $driver->address = $request->input('address');
    $driver->city = $request->input('city');
    $driver->state = $request->input('state');
    $driver->postal_code = $request->input('postal_code');
    $driver->driver_phone_number = $request->input('driver_phone_number');
    $driver->driver_email = $request->input('driver_email');
    $driver->date_of_birth = $request->input('date_of_birth');
    $driver->nationality = $request->input('nationality');
    $driver->emergency_contact = $request->input('emergency_contact');
    $driver->emergency_phone = $request->input('emergency_phone');
    $driver->blood_group = $request->input('blood_group');
    $driver->nid = $request->input('nid');
    $driver->passport = $request->input('passport');
    $driver->photo = $profile_picture;
    $driver->company_id = company_id(); 
    if ($request->client_login == 1) {
        $driver->user_id = $user->id;
    }
    $driver->save();

        return redirect()->route('drivers.index')
            ->with('success', 'Driver created successfully');
    }

    public function show($id)
    {
        $driver = Driver::findOrfail($id);
        return view('backend.drivers.view', compact('driver'));
    }

    public function edit($id)
    {
       $driver = Driver::findOrfail($id);
        return view('backend.drivers.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
    
        $validatedData = $request->validate([
            'driver_name' => 'required',
            // Add other validation rules for service fields as needed
        ]);


    
    $driver = Driver::findOrfail($id);

    if ($request->hasfile('photo')) {
        $profile_picture = "";
        $file            = $request->file('photo');
        $profile_picture = time() . $file->getClientOriginalName();
        $file->move(public_path() . "/uploads/driver/", $profile_picture);
        $driver->photo = $profile_picture;
    }
    $driver->driver_name = $request->input('driver_name');
    $driver->license_number = $request->input('license_number');
    $driver->license_expiry_date = $request->input('license_expiry_date');
    $driver->address = $request->input('address');
    $driver->city = $request->input('city');
    $driver->state = $request->input('state');
    $driver->postal_code = $request->input('postal_code');
    $driver->driver_phone_number = $request->input('driver_phone_number');
    $driver->driver_email = $request->input('driver_email');
    $driver->date_of_birth = $request->input('date_of_birth');
    $driver->nationality = $request->input('nationality');
    $driver->emergency_contact = $request->input('emergency_contact');
    $driver->emergency_phone = $request->input('emergency_phone');
    $driver->blood_group = $request->input('blood_group');
    $driver->nid = $request->input('nid');
    $driver->passport = $request->input('passport');
   
    $driver->company_id = company_id(); 
    if ($request->client_login == 1) {
        $driver->user_id = $user->id;
    }
    $driver->save();

        return redirect()->route('drivers.index')
            ->with('success', 'Driver created successfully');
    }

    public function destroy($id)
    {
        if (Vehicle::where('driver_id', $id)->exists() ||
            Issue::where('driver_id', $id)->exists() ||
            Trip::where('driver_id', $id)->exists()) {
            // If related records exist, redirect back with an error message
            return redirect()->route('drivers.index')->with('error',  _lang('Cannot delete driver. Related records exist.'));
          
        }
    
        $driver = Driver::findOrFail($id);
        $user = User::find($driver->user_id);
        
        if($user) {
            $user->delete();
        }
        
        $driver->delete();
        
        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully');
    }
    

    public function dVehicle($id){
    
    $driver = Driver::where('user_id', $id)->first();

    $vehicles = Vehicle::where("driver_id", $driver->id)->get();
    return view('backend.drivers.vehicles.list', compact('vehicles'));
    }

    public function dIssue ($id){
        $driver = Driver::where('user_id', $id)->first();
        $issues = Issue::where("driver_id", $driver->id)
        ->orderBy('created_at', 'desc') // Sort by the latest date
        ->paginate(5);
        $vehicles = Vehicle::where("driver_id", $driver->id)->get();
        return view('backend.drivers.issues.list', compact('issues', 'vehicles'));

    }


    public function dIssueStore(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
			'vehicle_id' => 'required|max:50',
			'driver_id' => 'required',
		]);
        if ($validator->fails()) {
			if($request->ajax()){ 
			    return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
			}else{
				return redirect('chart_of_accounts/create')
							->withErrors($validator)
							->withInput();
			}			
		}

        $attachment = "";
        if ($request->hasfile('image')) {
            $file       = $request->file('image');
            $attachment = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/issue/", $attachment);
        }
         
        $issue = New Issue();
        $issue->vehicle_id = $request->vehicle_id;
        $issue->driver_id = $request->driver_id;
        $issue->summary = $request->summary;
        $issue->description = $request->description;
        $issue->priority = $request->priority;
        $issue->due_date = $request->due_date;
        $issue->report_date = now();
        $issue->status = 1;
        $issue->company_id = company_id();
        $issue->image        = $attachment;
        $issue->save();
        return redirect()->back()->with('success', _lang('Issue Created Successfully'));

    }

    public function dIssueUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
         
        ]);
    
  

        $issue = Issue::findOrfail($id);
        if ($request->hasFile('image')) {
            $oldImagePath = public_path("uploads/issue/{$issue->image}");
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
    
            $file = $request->file('image');
            $attachment = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/issue/", $attachment);
            $issue->image = $attachment;
        }
        $issue->vehicle_id = $request->vehicle_id;
        $issue->driver_id = $request->driver_id;
        $issue->summary = $request->summary;
        $issue->description = $request->description;
        $issue->priority = $request->priority;
        $issue->due_date = $request->due_date;
        $issue->report_date = now();
        $issue->status = 1;
        $issue->save();
        return redirect()->back()->with('success', _lang('Issue Updated Successfully'));
    }

    public function dIssueDelete($id){
        $issue = Issue::find($id);
        $issue->delete();
        return back()->with('success', _lang('Removed Sucessfully'));
    }


    public function dFuelHistory($id) {
        // Find the driver based on the user_id
        $driver = Driver::where('user_id', $id)->first();
    
        // Find all vehicles associated with the driver
        $vehicle = Vehicle::where('driver_id', $driver->id)->pluck('id');
        $vehicles = Vehicle::where("driver_id", $driver->id)->get();

    
        // Find all fuel entries where the vehicle_id is in the list of vehicles
        $fuels = Fuel::whereIn('vehicle_id', $vehicle)
            ->orderBy('created_at', 'desc') // Sort by the latest date
            ->paginate(5);
    
        return view('backend.drivers.fuel_history.list', compact('fuels', 'vehicles'));
    }

    public function dFuelHoistoryStore(Request $request){
       //    dd($request->all());
                
            $validator = $request->validate([
                'vehicle_id' => 'required|exists:car_brands,id',
                'date' => 'required',
        
            
            ]);
        


            $attachment = "";
            if ($request->hasfile('attachment')) {
                $file       = $request->file('attachment');
                $attachment = time() . $file->getClientOriginalName();
                $file->move(public_path() . "/uploads/fuel/", $attachment);
            }
            
            $issue = New Fuel();
            $issue->vehicle_id = $request->vehicle_id;
            $issue->date = $request->date;
            $issue->odometer = $request->odometer;
            $issue->qty = $request->qty;
            $issue->reference = $request->reference;
            $issue->note = $request->note;
            $issue->attachment  = $attachment;
            $issue->company_id  = company_id();
            $issue->save();
            return redirect()->back()->with('success', 'Fuel History Recorded');
    }

    public function dFuelUpdate(Request $request, $id)
    {
        $validator = $request->validate([
            'vehicle_id' => 'required|exists:car_brands,id',
            'date' => 'required',
     
         
        ]);
       

         
        $issue = Fuel::findOrfail($id);
        if ($request->hasFile('attachment')) {
            $oldImagePath = public_path("uploads/fuel/{$issue->attachment}");
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
    
            $file = $request->file('attachment');
            $attachment = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/fuel/", $attachment);
            $issue->attachment = $attachment;
        }
        $issue->vehicle_id = $request->vehicle_id;
        $issue->date = $request->date;
        $issue->odometer = $request->odometer;
        $issue->qty = $request->qty;
        $issue->reference = $request->reference;
        $issue->note = $request->note;
        $issue->company_id  = company_id();
        $issue->save();
        return redirect()->back()->with('success', 'Fuel History Recorded');
    }

    public function dFuelDelete($id){
        $issue = Fuel::find($id);
        $oldImagePath = public_path("uploads/fuel/{$issue->attachment}");
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
        $issue->delete();
        return back()->with('success', _lang('Removed Sucessfully'));
    }

    
    
    public function dCustomer($id){
        $contacts = Contact::where('ref_user_id', $id)->get();
        return view('backend.drivers.contacts.list', compact('contacts'));
        }


        public function dCustomerStore(Request $request) {

        
            $validator = $request->validate([
                'contact_name'  => 'required|max:50',
                'contact_phone' => 'required|max:20',
         
             
            ]);
           
        
            $contact_image = "avatar.png";
     
            $contact = new Contact();
        
            $contact->contact_name  = $request->input('contact_name');
            $contact->contact_phone = $request->input('contact_phone');
            $contact->city          = $request->input('city');
            $contact->address       = $request->input('address');
            $contact->company_id    = company_id();
            $contact->ref_user_id   = Auth::user()->id;
            $contact_image = "avatar.png";

        
            $contact->save();
        return back()->with('success', _lang('Removed Sucessfully'));

        }


        public function dCutomerUpdate(Request $request, $id) {

            $contact = Contact::findOrfail($id);
            $contact->contact_name  = $request->input('contact_name');
            $contact->contact_phone = $request->input('contact_phone');
            $contact->city          = $request->input('city');
            $contact->address       = $request->input('address');
            $contact->company_id    = company_id();
            $contact->ref_user_id   = Auth::user()->id;
            $contact_image = "avatar.png";
            $contact->save();

        return back()->with('success', _lang('Removed Sucessfully'));

    
        }
        
        public function dCutomerDelete($id){
            $contact = Contact::findOrfail($id);
            $contact->ref_user_id   = NULL;

            $contact->save();
            return back()->with('success', _lang('Removed Sucessfully'));

            }
        
        
    public function dTrip($id){

        $driver = Driver::where('user_id', $id)->first();
        $data['vehicles'] = Vehicle::where("driver_id", $driver->id)->get();
        $data['contacts'] = Contact::where('ref_user_id', $id)->get();
        $data['trips'] = Trip::where('driver_id', $driver->id)->get();
        return view('backend.drivers.trips.list', $data);
        }


        public function dTripStore(Request $request) {
    
            $vid = $request->vehicle_id;            
            $vehicle = Vehicle::findorFail($vid);

            // dd($request->all());
                $validator = Validator::make($request->all(), [
                    'customer_id'      => 'required',
                    'pickup_location'  => 'required',
                    'dropoff_location' => 'nullable',
                    'fare_amount'      => 'nullable|numeric',
                    'trip_date'        => 'nullable|date',
                    'departure_time'   => 'nullable|date_format:H:i',
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
                $trip->driver_id =  $vehicle->driver_id;
                $trip->vehicle_id = $request->input('vehicle_id');
                $trip->pickup_location = $request->input('pickup_location');
                $trip->dropoff_location = $request->input('dropoff_location');
                $trip->fare_amount = $request->input('fare_amount');
                $trip->trip_date = $request->input('trip_date');
                $trip->departure_time = $request->input('departure_time');
                $trip->distance_km = $request->input('distance_km');
                $trip->trip_notes = $request->input('trip_notes');
                $trip->status = 1;
                $trip->company_id = company_id();
            
                // Save the trip to the database
                $trip->save();
            
                // Redirect to a success page or return a response as needed
                return redirect()->back()->with('success', 'Trip created successfully');
            }

        public function dTripUpdate(Request $request, $id) {
    


            $vid = $request->vehicle_id;            
            $vehicle = Vehicle::findorFail($vid);
            $trip = Trip::findOrfail($id);
            $trip->customer_id = $request->input('customer_id');
            $trip->driver_id =  $vehicle->driver_id;
            $trip->vehicle_id = $request->input('vehicle_id');
            $trip->pickup_location = $request->input('pickup_location');
            $trip->dropoff_location = $request->input('dropoff_location');
            $trip->fare_amount = $request->input('fare_amount');
            $trip->trip_date = $request->input('trip_date');
            $trip->departure_time = $request->input('departure_time');
            $trip->distance_km = $request->input('distance_km');
            $trip->trip_notes = $request->input('trip_notes');
            $trip->status = 1;
            $trip->company_id = company_id();
            $trip->save();

            return redirect()->back()->with('success', 'Trip Updated successfully');

    
        }
        
        public function dTripDelete($id){
            $contact = Trip::findOrfail($id);
            $contact->driver_id   = NULL;

            $contact->save();
            return back()->with('success', _lang('Removed Sucessfully'));

        }

        public function DriverUserUpdate(Request $request, $id)
    {
                $validatedUpdateData = $request->validate([
                    'name' => 'required',
                    'phone' => ['required', new UniquePhoneExceptSelf($id)],
                    // Add other validation rules for fields to be updated as needed
                ]);

                $user = User::findOrFail($id);
                $user->name = $validatedUpdateData['name'];
                $user->phone = $validatedUpdateData['phone'];
                // Assuming you also want to update the password
                if ($request->has('password')) {
                    $user->password = Hash::make($request->input('password'));
                }
                // Assuming you want to update the status if it's present in the request
                if ($request->has('status')) {
                    $user->status = $request->input('status');
                }
                // Assuming you want to update other fields as needed
                // $user->other_field = $request->input('other_field');

                $user->save();
                return redirect()->back()->with('success', 'User Information Updated');
        }


        public function DriverUserId($id){

            $driver = Driver::findOrfail($id);
             return view('backend.drivers.user', compact('driver'));

        }
        public function DriverUserCreate(Request $request, $id)
        {
                    $validatedLoginData = $request->validate([
                        'name' => 'required',
                        'phone' => 'required|unique:users',
                        'password' => 'required',
                        // Add other validation rules for fields to be updated as needed
                    ]);
    
                    $user = new User();
                    $user->name = $validatedLoginData['name'];
                    $user->phone = $validatedLoginData['phone'];
                    $user->password = Hash::make($validatedLoginData['password']);
                    $user->user_type = 'driver';
                    $user->status = $request->input('status'); // Assuming status is present in the request
                    $user->company_id = company_id(); // Assuming company_id() function exists and returns the company ID
                    $user->save();
                    $driver = Driver::findOrfail($id);
                    $driver->user_id = $user->id;
                    $driver->save();
                    return redirect()->back()->with('success', 'User Information Updated');
            }
        
}
