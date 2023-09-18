<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('backend.drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('backend.drivers.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'license_expiry_date' => 'required|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'date_of_birth' => 'nullable|date',
            'nationality' => 'nullable|string|max:255',
            'emergency_contact' => 'nullable|string|max:255',
            'emergency_phone' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:255',
            'nid' => 'nullable|string|max:255',
            'passport' => 'nullable|string|max:255',
            // Add photo validation rules here if needed
        ]);

        // Handle photo upload if necessary
        
        $driver = Driver::create($validatedData);

        return redirect()->route('drivers.index')
            ->with('success', 'Driver created successfully');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'license_expiry_date' => 'required|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'date_of_birth' => 'nullable|date',
            'nationality' => 'nullable|string|max:255',
            'emergency_contact' => 'nullable|string|max:255',
            'emergency_phone' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:255',
            'nid' => 'nullable|string|max:255',
            'passport' => 'nullable|string|max:255',
            // Add photo validation rules here if needed
        ]);

        // Handle photo update if necessary

        $driver->update($validatedData);

        return redirect()->route('drivers.index')
            ->with('success', 'Driver updated successfully');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')
            ->with('success', 'Driver deleted successfully');
    }
}
