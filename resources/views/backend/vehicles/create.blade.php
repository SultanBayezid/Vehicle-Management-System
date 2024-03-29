@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Vehicle Create</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">Vehicles</a></li>

            <li class="breadcrumb-item active"  aria-current="page">Vehicle Create</li>
        </ol>
    </nav>
                      
                      
                            <div class="card-body">
                            <form method="POST" action="{{ route('vehicles.store') }}">
    @csrf
    <h4>Basic Information</h4>
    <!-- Row 1 -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="make" class="form-label">Make</label>
            <input type="text" class="form-control @error('make') is-invalid @enderror" id="make" name="make" >
            @error('make')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" >
            @error('model')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <!-- Section 2: Vehicle Details -->
<h4>Vehicle Details</h4>
<!-- Row 2 -->
<div class="row mb-3">
    <div class="col-md-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" >
        @error('year')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="vin" class="form-label">VIN</label>
        <input type="text" class="form-control @error('vin') is-invalid @enderror" id="vin" name="vin" >
        @error('vin')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="color" class="form-label">Color</label>
        <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" >
        @error('color')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="mileage" class="form-label">Mileage</label>
        <input type="number" class="form-control @error('mileage') is-invalid @enderror" id="mileage" name="mileage" >
        @error('mileage')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- Row 3 -->
<div class="row mb-3">
    <div class="col-md-4">
        <label for="license_plate" class="form-label">License Plate</label>
        <input type="text" class="form-control @error('license_plate') is-invalid @enderror" id="license_plate" name="license_plate" >
        @error('license_plate')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="engine_number" class="form-label">Engine Number</label>
        <input type="text" class="form-control @error('engine_number') is-invalid @enderror" id="engine_number" name="engine_number" >
        @error('engine_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="chassis_number" class="form-label">Chassis Number</label>
        <input type="text" class="form-control @error('chassis_number') is-invalid @enderror" id="chassis_number" name="chassis_number" >
        @error('chassis_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- Row 4 -->
<div class="row mb-3">
    <div class="col-md-4">
        <label for="seating_capacity" class="form-label">Seating Capacity</label>
        <input type="number" class="form-control @error('seating_capacity') is-invalid @enderror" id="seating_capacity" name="seating_capacity" >
        @error('seating_capacity')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="weight" class="form-label">Weight</label>
        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" >
        @error('weight')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="horsepower" class="form-label">Horsepower</label>
        <input type="number" class="form-control @error('horsepower') is-invalid @enderror" id="horsepower" name="horsepower" >
        @error('horsepower')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<!-- Section 3: Purchase and Service Information -->
<h4>Purchase and Service Information</h4>
<!-- Row 5 -->
<div class="row mb-3">
    <div class="col-md-4">
        <label for="purchase_date" class="form-label">Purchase Date</label>
        <input type="date" class="form-control @error('purchase_date') is-invalid @enderror" id="purchase_date" name="purchase_date" >
        @error('purchase_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="purchase_price" class="form-label">Purchase Price</label>
        <input type="number" class="form-control @error('purchase_price') is-invalid @enderror" id="purchase_price" name="purchase_price" >
        @error('purchase_price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="last_service_date" class="form-label">Last Service Date</label>
        <input type="date" class="form-control @error('last_service_date') is-invalid @enderror" id="last_service_date" name="last_service_date" >
        @error('last_service_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<!-- Row 6 -->
<div class="row mb-3">
    <div class="col-md-4">
        <label for="odometer_reading" class="form-label">Odometer Reading</label>
        <input type="number" class="form-control @error('odometer_reading') is-invalid @enderror" id="odometer_reading" name="odometer_reading" >
        @error('odometer_reading')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Assign Driver') }}</label>
                                <select class="form-control select2" name="driver_id" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("drivers", "id", "name", old('driver_id')) }}

                                </select>
                            </div>
                        </div>
</div>


<div class="">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
                            </div>
                        </div>
                   



@endsection
