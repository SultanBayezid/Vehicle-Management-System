<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Validator;
use File;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::where('company_id', company_id())
        ->orderBy('created_at', 'desc') // Sort by the latest date
        ->paginate(10);
        return view('backend.issues.list', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles  = Vehicle::where('company_id', company_id())->get();
        return view('backend.issues.create', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        return redirect()->back()->with('success','Issue Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id) {

        $issue = Issue::find($id);
        $vehicles  = Vehicle::where('company_id', company_id())->get();
        return view('backend.issues.view', compact('issue', 'id', 'vehicles'));
 

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $issue = Issue::where("id",$id)->first();
        $vehicles  = Vehicle::where('company_id', company_id())->get();
		return view('backend.issues.edit',compact('issue','id', 'vehicles'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
        return redirect()->back()->with('success', 'Issue Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $issue = Issue::find($id);
        $issue->delete();
        return redirect()->route('issues.index')->with('success', _lang('Issue Removed Sucessfully'));
    }
}
