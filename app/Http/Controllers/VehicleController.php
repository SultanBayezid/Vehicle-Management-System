<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Service;
use App\Models\Issue;
use App\Models\Fuel;
use App\Models\Trip;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {


        // Retrieve all vehicles from the database
        $vehicles = Vehicle::where('company_id', company_id())->get();

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
    //    dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'nullable|integer',
            
        ]);
    $vehicle = new Vehicle();
    $vehicle->name = $request->name;
    $vehicle->make = $request->make;
    $vehicle->model = $request->model;
    $vehicle->year = $request->year;
    $vehicle->vin = $request->vin;
    $vehicle->color = $request->color;
    $vehicle->mileage = $request->mileage;
    $vehicle->license_plate = $request->license_plate;
    $vehicle->engine_number = $request->engine_number;
    $vehicle->chassis_number = $request->chassis_number;
    $vehicle->seating_capacity = $request->seating_capacity;
    $vehicle->weight = $request->weight;
    $vehicle->horsepower = $request->horsepower;
    $vehicle->purchase_date = $request->purchase_date;
    $vehicle->purchase_price = $request->purchase_price;
    $vehicle->last_service_date = $request->last_service_date;
    $vehicle->odometer_reading = $request->odometer_reading;
    $vehicle->company_id = company_id();
    $vehicle->save();

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

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'nullable|integer',
            // Add validation rules for other fields if needed
        ]);
    
 
        $vehicle = Vehicle::findOrFail($vehicle->id);
        $vehicle->name = $request->name;
        $vehicle->make = $request->make;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->vin = $request->vin;
        $vehicle->color = $request->color;
        $vehicle->mileage = $request->mileage;
        $vehicle->license_plate = $request->license_plate;
        $vehicle->engine_number = $request->engine_number;
        $vehicle->chassis_number = $request->chassis_number;
        $vehicle->seating_capacity = $request->seating_capacity;
        $vehicle->weight = $request->weight;
        $vehicle->horsepower = $request->horsepower;
        $vehicle->purchase_date = $request->purchase_date;
        $vehicle->purchase_price = $request->purchase_price;
        $vehicle->last_service_date = $request->last_service_date;
        $vehicle->odometer_reading = $request->odometer_reading;
        $vehicle->company_id = company_id();
        $vehicle->save();

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

    public function VehicleTrip($id){
        $data['services'] = Service::where('vehicle_id', $id)->get();
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['issues'] = Issue::where('vehicle_id', $id)->get();
        $data['fuels'] = Fuel::where('vehicle_id', $id)->get();
        $data['trips'] = Trip::where('vehicle_id', $id)->get();
        return view('backend.vehicles.trips.list', $data);
    }
    
    
}
