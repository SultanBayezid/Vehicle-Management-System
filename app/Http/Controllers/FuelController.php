<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Validator;
Use File;
class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
       $fuels = Fuel::where('company_id', company_id()) ->latest() // Order by the latest date
       ->paginate(10);
       return view('backend.fuels.list', compact('fuels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::where('company_id', company_id())->get();
        $fuels = Fuel::where('company_id', company_id())->get();
        return view('backend.fuels.create', compact('fuels', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            //    dd($request->all());
        
            $validator = $request->validate([
                'vehicle_id' => 'required|exists:car_brands,id',
                'date' => 'required',
         
             
            ]);
           


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
            $issue->company_id  = company_id();
            $issue->save();
            return redirect()->back()->with('success', 'Fuel History Recorded');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
        $fuel = Fuel::findOrfail($id);
        return view('backend.fuels.view', compact('fuel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicles = Vehicle::where('company_id', company_id())->get();
        $fuel = Fuel::findOrfail($id);
        return view('backend.fuels.edit', compact('fuel', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'vehicle_id' => 'required|exists:car_brands,id',
            'date' => 'required',
     
         
        ]);
       

         
        $issue = Fuel::findOrfail($id);
        if ($request->hasFile('attachment')) {
            $oldImagePath = public_path("uploads/fuel/{$issue->attachment}");
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
    
            $file = $request->file('attachment');
            $attachment = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/fuel/", $attachment);
            $issue->attachment = $attachment;
        }
        $issue->vehicle_id = $request->vehicle_id;
        $issue->date = $request->date;
        $issue->odometer = $request->odometer;
        $issue->qty = $request->qty;
        $issue->reference = $request->reference;
        $issue->note = $request->note;
        $issue->company_id  = company_id();
        $issue->save();
        return redirect()->back()->with('success', 'Fuel History Recorded');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fuel = Fuel::findOrfail($id);
        $fuel->delete();
        return redirect()->route('fuels.index')->with('success', _lang('Fuel History Removed !'));
    }
}
