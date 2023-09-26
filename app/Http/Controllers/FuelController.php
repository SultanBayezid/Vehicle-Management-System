<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use Illuminate\Http\Request;
use Validator;
class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
               // dd($request->all());
               $validator = Validator::make($request->all(), [
                'vehicle_id' => 'required|max:50',

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
            if ($request->hasfile('attachment')) {
                $file       = $request->file('attachment');
                $attachment = time() . $file->getClientOriginalName();
                $file->move(public_path() . "/uploads/fuel/", $attachment);
            }
             
            $issue = New Fuel();
            $issue->vehicle_id = $request->vehicle_id;
            $issue->date = $request->date;
            $issue->odometer = $request->odometer;
            $issue->qty = $request->qty;
            $issue->reference = $request->reference;
            $issue->note = $request->note;
            $issue->attachment  = $attachment;
            $issue->save();
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Fuel $fuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fuel $fuel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fuel $fuel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fuel $fuel)
    {
        //
    }
}
