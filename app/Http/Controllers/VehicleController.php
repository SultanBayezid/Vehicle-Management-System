<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Service;
use App\Models\Issue;
use App\Models\Fuel;
use App\Models\Image;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\Trip;
use DB;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {

   
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

        $validatedData =   $request->validate([
            'brand_id' => 'required|exists:car_brands,id',
            'model_id' => 'required|exists:car_models,id',
            'year' => 'nullable|integer|min:1900|max:'.(date('Y')+1), // Assuming vehicles cannot be from the future
            'vin' => 'nullable|unique:vehicles',
            'color' => 'nullable',
            'body_type_id' => 'nullable|exists:car_body_types,id',
            'license_plate' => 'nullable|unique:vehicles',
            'seating_capacity' => 'nullable|integer|min:1',
            'weight' => 'nullable|integer|min:1',
            'horsepower' => 'nullable|integer|min:1',
            'purchase_date' => 'nullable|date',
            'purchase_price' => 'nullable|numeric|min:0',
            'odometer_reading' => 'nullable|integer|min:0',
            'supplier_name' => 'nullable',
            'supplier_phone' => 'nullable',
            'price_per_km' => 'nullable|numeric|min:0',
            'price_per_day' => 'nullable|numeric|min:0',
            'driver_id' => 'nullable|exists:drivers,id',
            'status' => 'nullable|integer|in:0,1',
            
        ]);

        
        $vehicle = new Vehicle();
        $vehicle->brand_id = $validatedData['brand_id'];
        $vehicle->model_id = $validatedData['model_id'];
        $vehicle->year = $validatedData['year'];
        $vehicle->vin = $validatedData['vin'];
        $vehicle->color = $validatedData['color'];
        $vehicle->body_type_id = $validatedData['body_type_id'];
        $vehicle->license_plate = $validatedData['license_plate'];
        $vehicle->engine_number = $request->input('engine_number');
        $vehicle->chassis_number = $request->input('chassis_number');
        $vehicle->seating_capacity = $validatedData['seating_capacity'];
        $vehicle->weight = $validatedData['weight'];
        $vehicle->horsepower = $validatedData['horsepower'];
        $vehicle->purchase_date = $validatedData['purchase_date'];
        $vehicle->purchase_price = $validatedData['purchase_price'];
        $vehicle->odometer_reading = $validatedData['odometer_reading'];
        $vehicle->supplier_name = $validatedData['supplier_name'];
        $vehicle->supplier_phone = $validatedData['supplier_phone'];
        $vehicle->purchase_note = $request->input('purchase_note');
        $vehicle->price_per_km = $validatedData['price_per_km'];
        $vehicle->price_per_day = $validatedData['price_per_day'];
        $vehicle->driver_id = $validatedData['driver_id'];
        $vehicle->company_id = company_id();
        $vehicle->status = $validatedData['status'] ?? 0;
        $vehicle->save();
    if ($request->hasFile('files')) {
        $files = $request->file('files');
        foreach ($files as $file) {
            // Generate a unique file name to prevent conflicts
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            
            // Store each file in the public/uploads/vehicle folder
            $file->move(public_path('uploads/vehicle'), $fileName);
            
            // Create a new image record and associate it with the vehicle
            $image = new Image();
            $image->path = 'uploads/vehicle/' . $fileName;
            $image->vehicle_id = $vehicle->id; // Assuming 'vehicle_id' is passed in the request
            $image->save();
            
          
        }
    }

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


    public function fetchModels($brand_id)
{
    // Fetch models based on the provided brand_id
    $models = CarModel::where('brand_id', $brand_id)->get();

    return response()->json($models);
}
    
    
}
