@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Driver Create</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('drivers.create') }}">
                <i class="fas fa-plus"></i> {{ ('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">People</li>
            <li class="breadcrumb-item"><a href="{{route('drivers.index')}}">Drivers</a></li>

            <li class="breadcrumb-item active" aria-current="page">Driver Create</li>
        </ol>
    </nav>
            
                            <div class="card-body">
                            <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-4">
            <!-- Row 1 -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="license_number">License Number:</label>
                <input type="text" name="license_number" id="license_number" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="license_expiry_date">License Expiry Date:</label>
                <input type="date" name="license_expiry_date" id="license_expiry_date" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" name="state" id="state" class="form-control">
            </div>
        </div>
        
        <!-- Column 2 -->
        <div class="col-md-4">
            <!-- Row 2 -->
            <div class="form-group">
                <label for="postal_code">Postal Code:</label>
                <input type="text" name="postal_code" id="postal_code" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
            </div>
        </div>
        
        <!-- Column 3 -->
        <div class="col-md-4">
            <!-- Row 3 -->
            <div class="form-group">
                <label for="nationality">Nationality:</label>
                <input type="text" name="nationality" id="nationality" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="emergency_contact">Emergency Contact:</label>
                <input type="text" name="emergency_contact" id="emergency_contact" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="emergency_phone">Emergency Phone:</label>
                <input type="text" name="emergency_phone" id="emergency_phone" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="blood_group">Blood Group:</label>
                <input type="text" name="blood_group" id="blood_group" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="nid">NID (National ID):</label>
                <input type="text" name="nid" id="nid" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="passport">Passport:</label>
                <input type="text" name="passport" id="passport" class="form-control">
            </div>
            
            <!-- Photo Upload -->
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
            </div>
        </div>
    </div>
</div>

            <button type="submit" class="btn btn-primary">Create Driver</button>
        </form>
                            </div>
                        </div>
                    </div>
                    </div>



@endsection
