<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Service;
use App\Models\Issue;
use App\Models\Fuel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        // Retrieve all vehicles from the database
        $vehicles = Vehicle::all();

        // Return the view with the list of vehicles
        return view('backend.vehicles.list', compact('vehicles'));
    }

    public function create()
    {
        // Show the form to create a new vehicle
        return view('backend.vehicles.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'vin' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'mileage' => 'required|integer',
            'license_plate' => 'required|string|max:255',
            'engine_number' => 'required|string|max:255',
            'chassis_number' => 'required|string|max:255',
            'seating_capacity' => 'required|integer',
            'weight' => 'required|numeric',
            'horsepower' => 'required|integer',
            'purchase_date' => 'required|date',
            'purchase_price' => 'required|numeric',
            'last_service_date' => 'nullable|date',
            'odometer_reading' => 'nullable|integer',
        ]);

        // Create a new Vehicle instance and save it
        Vehicle::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully');
    }

    public function show($id)
    {
        // Find the vehicle by its ID
        $data['services'] = Service::where('vehicle_id', $id)->get();
        $data['issues'] = Issue::where('vehicle_id', $id)->get();
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['fuels'] = Fuel::where('vehicle_id', $id)->get();


        // Return the view with the vehicle details
        return view('backend.vehicles.view', $data);
    }

    public function edit($id)
    {
        // Find the vehicle by its ID
        $vehicle = Vehicle::findOrFail($id);

        // Show the form to edit the vehicle
        return view('backend.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'vin' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'mileage' => 'required|integer',
            'license_plate' => 'required|string|max:255',
            'engine_number' => 'required|string|max:255',
            'chassis_number' => 'required|string|max:255',
            'seating_capacity' => 'required|integer',
            'weight' => 'required|numeric',
            'horsepower' => 'required|integer',
            'purchase_date' => 'required|date',
            'purchase_price' => 'required|numeric',
            'last_service_date' => 'nullable|date',
            'odometer_reading' => 'nullable|integer',
        ]);

        // Find the vehicle by its ID and update its attributes
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
    }

    public function destroy($id)
    {
        // Find the vehicle by its ID and delete it
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        // Redirect to the index page with a success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully');
    }

    public function VehicleService($id){
        $data['services'] = Service::where('vehicle_id', $id)->get();
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['issues'] = Issue::where('vehicle_id', $id)->get();
        $data['fuels'] = Fuel::where('vehicle_id', $id)->get();

        return view('backend.vehicles.services.list', $data);
    }
    public function VehicleIssue($id){
        $data['services'] = Service::where('vehicle_id', $id)->get();
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['issues'] = Issue::where('vehicle_id', $id)->get();
        $data['fuels'] = Fuel::where('vehicle_id', $id)->get();

        return view('backend.vehicles.issues.list', $data);
    }
    
    public function VehicleFuels($id){
        $data['services'] = Service::where('vehicle_id', $id)->get();
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['issues'] = Issue::where('vehicle_id', $id)->get();
        $data['fuels'] = Fuel::where('vehicle_id', $id)->get();
        return view('backend.vehicles.fuels.list', $data);
    }
    
    
}
