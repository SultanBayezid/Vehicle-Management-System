<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Service;
use App\Models\Issue;
use App\Models\Fuel;
use App\Models\VehicleImage;
use Image;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\FuelType;
use App\Models\Trip;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {

   
        $vehicles = Vehicle::where('company_id', company_id())
        ->orderBy('created_at', 'desc') // Sort by the latest date
        ->paginate(10); // Paginate with 10 items per page
      
        // Return the view with the list of vehicles
        return view('backend.vehicles.list', compact('vehicles'));
    }

    public function create()
    {
        $fuelTypes = FuelType::all();
        return view('backend.vehicles.create' ,compact('fuelTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_id' => 'required|exists:car_brands,id',
            'model_id' => 'required|exists:car_models,id',
            'seating_capacity' => 'nullable|integer|max:50', 
            'engine_capacity' => 'nullable|integer|max:5000', 
            'weight' => 'nullable|numeric|max:9999',
         
        ]);
    
        $vehicle = new Vehicle();
        $vehicle->brand_id = $validatedData['brand_id'];
        $vehicle->model_id = $validatedData['model_id'];
        $vehicle->manufacture_year = $request->manufacture_year;
        $vehicle->register_year = $request->register_year;
        $vehicle->transmission_id = $request->transmission_id;
        $vehicle->body_type_id = $request->body_type_id;
        $vehicle->mileage = $request->mileage;
        $vehicle->in_color = $request->in_color;
        $vehicle->ex_color = $request->ex_color;
        $vehicle->drive_type_id = $request->drive_type_id;
        $vehicle->license_plate = $request->license_plate;
        $vehicle->engine_number = $request->engine_number;
        $vehicle->chassis_number = $request->chassis_number;
        $vehicle->seating_capacity = $request->seating_capacity;
        $vehicle->weight = $request->weight;
        $vehicle->engine_capacity = $request->engine_capacity;
        $vehicle->purchase_date = $request->purchase_date;
        $vehicle->purchase_price = $request->purchase_price;
        $vehicle->supplier_name = $request->supplier_name;
        $vehicle->supplier_phone = $request->supplier_phone;
        $vehicle->purchase_note = $request->purchase_note;
        $vehicle->price_per_km = $request->price_per_km;
        $vehicle->price_per_day = $request->price_per_day;
        $vehicle->driver_id = $request->driver_id;
        $vehicle->description = $request->description;
        $vehicle->company_id = company_id();
        $vehicle->status = $request->status ?? 0;
        $vehicle->save();

         // Attach fuel types
    if ($request->filled('fuel_types')) {
        $vehicle->fuelTypes()->attach($request->input('fuel_types'));
    }
    
    if ($request->hasFile('files')) {
        $files = $request->file('files');
        foreach ($files as $file) {
            // Generate a unique file name to prevent conflicts
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
    
            // Determine the vehicle's folder path
            $vehicleFolderPath = public_path('uploads/vehicle/') . $vehicle->id;
            $thumbnailFolderPath = $vehicleFolderPath . '/thumbnails';
    
            // Create the vehicle's folder if it doesn't exist
            if (!file_exists($vehicleFolderPath)) {
                mkdir($vehicleFolderPath, 0777, true);
                mkdir($thumbnailFolderPath, 0777, true);
            }
    
            // Store the original file in the vehicle's folder
            $file->move($vehicleFolderPath, $fileName);
    
            // Create a copy of the image with fixed height for thumbnail
            $thumbnailFileName = 'thumb_' . $fileName;
            $thumbnailPath = $thumbnailFolderPath . '/' . $thumbnailFileName;
    
            // Resize the image to have a fixed height of 220px while maintaining the aspect ratio
            Image::make($vehicleFolderPath . '/' . $fileName)
                ->resize(null, 220, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save($thumbnailPath);
    
            // Create a new image record and associate it with the vehicle
            $image = new VehicleImage();
            $image->path = 'uploads/vehicle/' . $vehicle->id . '/' . $fileName; // Original image path
            $image->thumbnail_path = 'uploads/vehicle/' . $vehicle->id . '/thumbnails/' . $thumbnailFileName; // Thumbnail path
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
        $id = Crypt::decrypt($id);
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
        $id = Crypt::decrypt($id);
        $vehicle = Vehicle::findOrFail($id);
        $fuelTypes = FuelType::all();
        // Show the form to edit the vehicle
        return view('backend.vehicles.edit', compact('vehicle', 'fuelTypes'));
      
        
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $validatedData = $request->validate([
            'brand_id' => 'required|exists:car_brands,id',
            'model_id' => 'required|exists:car_models,id',
            'seating_capacity' => 'nullable|integer|max:50', 
            'engine_capacity' => 'nullable|integer|max:5000', 
            'weight' => 'nullable|numeric|max:9999',
        ]);
    
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->brand_id = $validatedData['brand_id'];
        $vehicle->model_id = $validatedData['model_id'];
        $vehicle->manufacture_year = $request->manufacture_year;
        $vehicle->register_year = $request->register_year;
        $vehicle->transmission_id = $request->transmission_id;
        $vehicle->body_type_id = $request->body_type_id;
        $vehicle->mileage = $request->mileage;
        $vehicle->in_color = $request->in_color;
        $vehicle->ex_color = $request->ex_color;
        $vehicle->drive_type_id = $request->drive_type_id;
        $vehicle->license_plate = $request->license_plate;
        $vehicle->engine_number = $request->engine_number;
        $vehicle->chassis_number = $request->chassis_number;
        $vehicle->seating_capacity = $request->seating_capacity;
        $vehicle->weight = $request->weight;
        $vehicle->engine_capacity = $request->engine_capacity;
        $vehicle->purchase_date = $request->purchase_date;
        $vehicle->purchase_price = $request->purchase_price;
        $vehicle->supplier_name = $request->supplier_name;
        $vehicle->supplier_phone = $request->supplier_phone;
        $vehicle->purchase_note = $request->purchase_note;
        $vehicle->price_per_km = $request->price_per_km;
        $vehicle->price_per_day = $request->price_per_day;
        $vehicle->driver_id = $request->driver_id;
        $vehicle->description = $request->description;
        $vehicle->status = $request->status ?? 0;
        $vehicle->company_id = company_id();

        $vehicle->save();
    
        // Sync fuel types
        if ($request->filled('fuel_types')) {
            $vehicle->fuelTypes()->sync($request->input('fuel_types'));
        } else {
            $vehicle->fuelTypes()->detach(); // Remove all fuel types if none are selected
        }
    
     
    
        // Upload and attach new images
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                // Generate a unique file name to prevent conflicts
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
        
                // Determine the vehicle's folder path
                $vehicleFolderPath = public_path('uploads/vehicle/') . $vehicle->id;
                $thumbnailFolderPath = $vehicleFolderPath . '/thumbnails';
        
                // Create the vehicle's folder if it doesn't exist
                if (!file_exists($vehicleFolderPath)) {
                    mkdir($vehicleFolderPath, 0777, true);
                    mkdir($thumbnailFolderPath, 0777, true);
                }
        
                // Store the original file in the vehicle's folder
                $file->move($vehicleFolderPath, $fileName);
        
                // Create a copy of the image with fixed height for thumbnail
                $thumbnailFileName = 'thumb_' . $fileName;
                $thumbnailPath = $thumbnailFolderPath . '/' . $thumbnailFileName;
        
                // Resize the image to have a fixed height of 220px while maintaining the aspect ratio
                Image::make($vehicleFolderPath . '/' . $fileName)
                    ->resize(null, 220, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save($thumbnailPath);
        
                // Create a new image record and associate it with the vehicle
                $image = new VehicleImage();
                $image->path = 'uploads/vehicle/' . $vehicle->id . '/' . $fileName; // Original image path
                $image->thumbnail_path = 'uploads/vehicle/' . $vehicle->id . '/thumbnails/' . $thumbnailFileName; // Thumbnail path
                $image->vehicle_id = $vehicle->id; // Assuming 'vehicle_id' is passed in the request
                $image->save();
            }
        }
    
        // Redirect to the index page with a success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
    }
    
    public function destroy($id)
    {
        // Find the vehicle by its ID and delete it
        $id = Crypt::decrypt($id);

        if (Service::where('vehicle_id', $id)->exists() ||
        Issue::where('vehicle_id', $id)->exists() ||
        Fuel::where('vehicle_id', $id)->exists() ||
        Trip::where('vehicle_id', $id)->exists()) {
        // If related records exist, redirect back with an error message
        return redirect()->route('vehicles.index')->with('error', _lang('Cannot delete Vehicle. Related records exist.'));
    }

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        // Redirect to the index page with a success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully');
    }

    public function VehicleService($id){
        $id = Crypt::decrypt($id);
        $data['services'] = Service::where('vehicle_id', $id)->paginate(10);
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['issues'] = Issue::where('vehicle_id', $id)->get();
        $data['fuels'] = Fuel::where('vehicle_id', $id)->get();

        return view('backend.vehicles.services.list', $data);
    }
    public function VehicleIssue($id){
        $id = Crypt::decrypt($id);
        $data['services'] = Service::where('vehicle_id', $id)->get();
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['issues'] = Issue::where('vehicle_id', $id)->paginate(10);

        $data['fuels'] = Fuel::where('vehicle_id', $id)->get();

        return view('backend.vehicles.issues.list', $data);
    }
    
    public function VehicleFuels($id){
        $id = Crypt::decrypt($id);
        $data['services'] = Service::where('vehicle_id', $id)->get();
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['issues'] = Issue::where('vehicle_id', $id)->get();
        $data['fuels'] = Fuel::where('vehicle_id', $id)->paginate(10);
        return view('backend.vehicles.fuels.list', $data);
    }

    public function VehicleTrip($id){
        $id = Crypt::decrypt($id);
        $data['services'] = Service::where('vehicle_id', $id)->get();
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['issues'] = Issue::where('vehicle_id', $id)->get();
        $data['fuels'] = Fuel::where('vehicle_id', $id)->get();
        $data['trips'] = Trip::where('vehicle_id', $id)->paginate(10);
        return view('backend.vehicles.trips.list', $data);
    }


    public function fetchModels($brand_id)
{
    // Fetch models based on the provided brand_id
    $models = CarModel::where('brand_id', $brand_id)->get();

    return response()->json($models);
}
    

  
public function imageDelete($id){
    $id = Crypt::decrypt($id);
    $image = VehicleImage::findOrFail($id);

    // Get the image path and thumbnail path before deleting the record
    $imagePath = $image->path;
    $thumbnailPath = $image->thumbnail_path;

    // Delete the image from the database
    $image->delete();

    // Remove the image file from the storage
    if ($imagePath) {
        $filePath = public_path($imagePath); // Assuming the path is relative to the public directory
        if(file_exists($filePath)) {
            unlink($filePath); // Delete the file from the filesystem
        }
    }

    // Remove the thumbnail file from the storage
    if ($thumbnailPath) {
        $thumbnailFilePath = public_path($thumbnailPath); // Assuming the path is relative to the public directory
        if(file_exists($thumbnailFilePath)) {
            unlink($thumbnailFilePath); // Delete the file from the filesystem
        }
    }

    return redirect()->back();
}

    
}
