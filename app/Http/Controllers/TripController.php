<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Validator;

class TripController extends Controller
{
    public function index(){

        $trips = Trip::All();
        return view('backend.trips.list',compact('trips'));
    }

    public function create(){
        return view('backend.trips.create');
        
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'customer_id'      => 'required',
            'driver_id'        => 'required',
            'pickup_location'  => 'required',
            'dropoff_location' => 'nullable',
            'fare_amount'      => 'nullable|numeric',
            'trip_date'        => 'nullable|date',
            'departure_time'   => 'nullable|date_format:H:i',
            'arrival_time'     => 'nullable|date_format:H:i',
            'distance_km'      => 'nullable|numeric',
            'trip_notes'       => 'nullable|max:255',
            // Add any other validation rules you need here
        ]);
        
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return redirect()->route('trips.create')
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        $trip = new Trip();
        $trip->customer_id = $request->input('customer_id');
        $trip->driver_id = $request->input('driver_id');
        $trip->vehicle_id = $request->input('vehicle_id');
        $trip->pickup_location = $request->input('pickup_location');
        $trip->dropoff_location = $request->input('dropoff_location');
        $trip->fare_amount = $request->input('fare_amount');
        $trip->trip_date = $request->input('trip_date');
        $trip->departure_time = $request->input('departure_time');
        $trip->arrival_time = $request->input('arrival_time');
        $trip->distance_km = $request->input('distance_km');
        $trip->trip_notes = $request->input('trip_notes');
    
        // Save the trip to the database
        $trip->save();
    
        // Redirect to a success page or return a response as needed
        return redirect()->route('trips.index')->with('success', 'Trip created successfully');
    }

    public function show($id){

        $trip = Trip::find($id);
        $currency = currency(); 
        $expenses = Transaction::where('invoice_id', $id)->where('type', 'expense')->where('dr_cr', 'dr')->get();
        $payments = Transaction::where('invoice_id', $id)->where('type', 'income')->where('dr_cr', 'cr')->get();
        return view('backend.trips.view', compact('trip', 'expenses', 'currency', 'payments'));

    }
    public function edit(Request $request, $id){
        $trip = Trip::find($id);
        return view('backend.trips.edit', compact('trip', 'id'));
    }


    public function update(Request $request, $id) {
        
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'customer_id'      => 'required',
        //     'driver_id'        => 'required',
        //     'pickup_location'  => 'required',
        //     'dropoff_location' => 'nullable',
        //     'fare_amount'      => 'nullable|numeric',
        //     'trip_date'        => 'nullable|date',
        //     'departure_time'   => 'nullable|date_format:H:i',
        //     'arrival_time'     => 'nullable|date_format:H:i',
        //     'distance_km'      => 'nullable|numeric',
        //     'trip_notes'       => 'nullable|max:2355',
        //     // Add any other validation rules you need here
        // ]);
        
        // if ($validator->fails()) {
        //     if ($request->ajax()) {
        //         return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
        //     } else {
        //         return redirect()->route('trips.create')
        //             ->withErrors($validator)
        //             ->withInput();
        //     }
        // }
   

        $trip =  Trip::find($id);

        $trip->customer_id = $request->input('customer_id');
        $trip->driver_id = $request->input('driver_id');
        $trip->vehicle_id = $request->input('vehicle_id');
        $trip->pickup_location = $request->input('pickup_location');
        $trip->dropoff_location = $request->input('dropoff_location');
        $trip->fare_amount = $request->input('fare_amount');
        $trip->trip_date = $request->input('trip_date');
        $trip->departure_time = $request->input('departure_time');
        $trip->arrival_time = $request->input('arrival_time');
        $trip->distance_km = $request->input('distance_km');
        $trip->trip_notes = $request->input('trip_notes');
    
        // Save the trip to the database
        $trip->save();
        // Redirect to a success page or return a response as needed
        return redirect()->route('trips.index')->with('success', 'Trip created successfully');



    }
    public function store_payment(Request $request, $id = '') {

        $validator = Validator::make($request->all(), [
            'invoice_id'       => 'required',
            'account_id'        => 'required',
            'chart_id'          => 'required',
            'amount'            => 'required|numeric',
            'payment_method_id' => 'required',
            'reference'         => 'nullable|max:50',
            'attachment'        => 'nullable|mimes:jpeg,png,jpg,doc,pdf,docx,zip',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return back()->withErrors($validator)
                    ->withInput();
            }
        }

        $attachment = "";
        if ($request->hasfile('attachment')) {
            $file       = $request->file('attachment');
            $attachment = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/transactions/", $attachment);
        }

        $transaction                    = new Transaction();
        $transaction->trans_date        = date('Y-m-d');
        $transaction->account_id        = $request->input('account_id');
        $transaction->chart_id          = $request->input('chart_id');
        $transaction->type              = 'expense';
        $transaction->dr_cr             = 'dr';
        $transaction->amount            = $request->input('amount');
        $transaction->payment_method_id = $request->input('payment_method_id');
        $transaction->invoice_id       = $request->input('invoice_id');
        $transaction->reference         = $request->input('reference');
        $transaction->note              = $request->input('note');
        $transaction->attachment        = $attachment;

        $transaction->save();

    return redirect()->back();

       
    }

    public function store_payment_income(Request $request, $id = "") {
       
        $validator = Validator::make($request->all(), [
            'invoice_id'        => 'required',
            'account_id'        => 'required',
            'chart_id'          => 'required',
            'amount'            => 'required|numeric',
            'payment_method_id' => 'required',
            'reference'         => 'nullable|max:50',
            'attachment'        => 'nullable|mimes:jpeg,png,jpg,doc,pdf,docx,zip',
        ]);

            if ($validator->fails()) {
                if ($request->ajax()) {
                    return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
                } else {
                    return back()->withErrors($validator)
                        ->withInput();
                }
            }

     

            $attachment = "";
            if ($request->hasfile('attachment')) {
                $file       = $request->file('attachment');
                $attachment = time() . $file->getClientOriginalName();
                $file->move(public_path() . "/uploads/transactions/", $attachment);
            }

            $transaction                    = new Transaction();
            $transaction->trans_date        = date('Y-m-d');
            $transaction->account_id        = $request->input('account_id');
            $transaction->chart_id          = $request->input('chart_id');
            $transaction->type              = 'income';
            $transaction->dr_cr             = 'cr';
            $transaction->amount            = $request->input('amount');
            $transaction->payer_payee_id    = $request->input('client_id');
            $transaction->payment_method_id = $request->input('payment_method_id');
            $transaction->invoice_id        = $request->input('invoice_id');
            $transaction->reference         = $request->input('reference');
            $transaction->note              = $request->input('note');
            $transaction->attachment        = $attachment;

            $transaction->save();

    return redirect()->back();
      
        
    }
}
