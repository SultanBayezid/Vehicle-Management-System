<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
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

    $vehicles = Vehicle::where("driver_id", $id)->get();
    return view('backend.drivers.vehicles.list', compact('id', 'vehicles'));
    }
}
