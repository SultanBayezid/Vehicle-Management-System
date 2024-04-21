<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Fuel;
use App\Models\Issue;
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
    $driver->company_id = company_id(); 
    if ($request->client_login == 1) {
        $driver->user_id = $user->id;
    }
    $driver->save();

        return redirect()->route('drivers.index')
            ->with('success', 'Driver created successfully');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'license_expiry_date' => 'required|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'date_of_birth' => 'nullable|date',
            'nationality' => 'nullable|string|max:255',
            'emergency_contact' => 'nullable|string|max:255',
            'emergency_phone' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:255',
            'nid' => 'nullable|string|max:255',
            'passport' => 'nullable|string|max:255',
            // Add photo validation rules here if needed
        ]);

        // Handle photo update if necessary

        $driver->update($validatedData);

        return redirect()->route('drivers.index')
            ->with('success', 'Driver updated successfully');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')
            ->with('success', 'Driver deleted successfully');
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
        
    
}
