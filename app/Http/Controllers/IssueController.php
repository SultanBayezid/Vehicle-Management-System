<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use Validator;


class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::all();
        return view('backend.issues.list', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.issues.create');
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
        $issue->image        = $attachment;
        $issue->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id) {

        $issue = Issue::find($id);
        return view('backend.issues.view', compact('issue', 'id'));
 

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $issue = Issue::where("id",$id)->first();
		return view('backend.issues.edit',compact('issue','id'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
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

        $issue = Issue::where("id", $id)->first();
        $issue->vehicle_id = $request->vehicle_id;
        $issue->driver_id = $request->driver_id;
        $issue->summary = $request->summary;
        $issue->description = $request->description;
        $issue->priority = $request->priority;
        $issue->due_date = $request->due_date;
        $issue->report_date = now();
        $issue->status = 1;
        $issue->image = $attachment;
        $issue->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $issue = Issue::find($id);
        $issue->delete();
        return back()->with('success', _lang('Removed Sucessfully'));
    }
}
