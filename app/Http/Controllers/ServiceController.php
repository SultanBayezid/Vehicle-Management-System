<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Issue;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Crypt;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $services =  Service::where('company_id', company_id())
        ->latest() // Order by the latest date
        ->paginate(10); // Paginate with 10 items per page
        return view('backend.services.list', compact('services'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $issues = Issue::where('company_id', company_id())->get();
        $vehicles = Vehicle::where('company_id', company_id())->get();
        return view('backend.services.create',compact('issues', 'vehicles')); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        // dd($request->all());
        // Validate the input for the service
        $validatedData = $request->validate([
            'vehicle_id' => 'required',
            // Add other validation rules for service fields as needed
        ]);

        $attachment = "";
        if ($request->hasfile('document')) {
            $file       = $request->file('document');
            $attachment = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/service/", $attachment);
        }
        $service = new Service();
        $service->vehicle_id   = $request->vehicle_id;
        $service->completed_date = $request->completed_date;
        $service->note = $request->note;
        $service->odometer = $request->odometer;
        $service->document = $attachment;
        $service->company_id = company_id();
        $service->save();
        // Associate issues with the service (if checkboxes were used)
        $selectedIssues = $request->input('issues', []);
        $service->issues()->sync($selectedIssues);
        
        Issue::whereIn('id', $selectedIssues)->update(['status' => 2]);

        // Redirect to the service details page or the index page
        return redirect()->back()->with('success', 'Service Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id) {
        $id = Crypt::decrypt($id);
        $service = Service::find($id);
        return view('backend.services.view', compact('service', 'id'));
 

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $id = Crypt::decrypt($id);
        $service = Service::findOrfail($id);
        $vehicleIssues = Issue::where('vehicle_id', $service->vehicle_id)->where('status', 1)->get();
        $issues = $vehicleIssues->merge($service->issues);
        $vehicles = Vehicle::where('company_id', company_id())->get();
        return view('backend.services.edit', compact('service', 'id', 'vehicles', 'issues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {  
        $id = Crypt::decrypt($id);
        $validatedData = $request->validate([
            'vehicle_id' => 'required',
            // Add other validation rules for service fields as needed
        ]);
    
      
    
        $service = Service::findOrFail($id);
        if ($request->hasFile('document')) {
            $oldImagePath = public_path("uploads/service/{$service->document}");
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
    
            $file = $request->file('document');
            $attachment = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/service/", $attachment);
            $service->document = $attachment;
        }
        $service->vehicle_id = $request->vehicle_id;
        $service->completed_date = $request->completed_date;
        $service->note = $request->note;
        $service->odometer = $request->odometer;
        $service->company_id = company_id();
        $service->save();
    
        // Delete existing associations with issues and update their status
        $detachedIssues = $service->issues()->pluck('issue_id')->toArray();
        $service->issues()->detach();
        Issue::whereIn('id', $detachedIssues)->update(['status' => 1]);

        // Associate issues with the service (if checkboxes were used)
        $selectedIssues = $request->input('issues', []);
        $service->issues()->sync($selectedIssues);

        // Update the status of newly associated issues to indicate they are associated with a service
        Issue::whereIn('id', $selectedIssues)->update(['status' => 2]);

    
        // Redirect to the service details page or the index page
        return redirect()->back()->with('success', 'Service Updated Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $id = Crypt::decrypt($id);
        $service = Service::findOrfail($id);
        $service->delete();
        return redirect()->route('services.index')->with('success', _lang('Service Removed'));
    }

    public function getVehicleIssues($id)
    {
        // Find the vehicle by its ID
        
        $vehicle = Vehicle::findOrFail($id);

        // Get the issues associated with the vehicle
        $issues = $vehicle->issues()->where('status', 1)->get();

        // Return the issues as JSON response
        return response()->json($issues);
    }

}
