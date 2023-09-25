<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Issue;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::All();
        return view('backend.services.list', compact('services'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $issues = Issue::All();
        return view('backend.services.create',compact('issues')); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $service->save();
        // Associate issues with the service (if checkboxes were used)
        $selectedIssues = $request->input('issues', []);
        $service->issues()->sync($selectedIssues);

        // Redirect to the service details page or the index page
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id) {

        $service = Service::find($id);
        return view('backend.services.view', compact('service', 'id'));
 

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }

}
