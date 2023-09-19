<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
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
        $vehicle = Vehicle::findOrFail($id);

        // Return the view with the vehicle details
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit($id)
    {
        // Find the vehicle by its ID
        $vehicle = Vehicle::findOrFail($id);

        // Show the form to edit the vehicle
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
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
}
