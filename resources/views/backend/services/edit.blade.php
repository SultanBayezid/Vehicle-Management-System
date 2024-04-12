@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">{{$vehicle->name}}</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">Vehicles</a></li>

            <li class="breadcrumb-item active"  aria-current="page">{{$vehicle->name}}</li>
        </ol>
    </nav>
                      
                      
                            <div class="card-body">
                            <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
                                @csrf
                            @method('PUT')
                            
                            <!-- Row 1 -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" value="{{$vehicle->name}}" name="name" >
                                </div>
                                <div class="col-md-4">
                                    <label for="make" class="form-label">Make</label>
                                    <input type="text" class="form-control" id="make" value="{{$vehicle->make}}" name="make" >
                                </div>
                                <div class="col-md-4">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" class="form-control" id="model"  value="{{$vehicle->model}}" name="model"  >
                                </div>
                               
                            </div>
                            <!-- Row 2 -->
                            <div class="row mb-3">
                            <div class="col-md-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" value="{{$vehicle->year}}" >
                                </div>
                                <div class="col-md-3">
                                    <label for="vin" class="form-label">VIN</label>
                                    <input type="text" class="form-control" id="vin" name="vin"   value="{{$vehicle->vin}}" >
                                </div>
                                <div class="col-md-3">
                                    <label for="color" class="form-label">Color</label>
                                    <input type="text" class="form-control" id="color" name="color"  value="{{$vehicle->color}}"  >
                                </div>
                                <div class="col-md-3">
                                    <label for="mileage" class="form-label">Mileage</label>
                                    <input type="number" class="form-control" id="mileage" value="{{$vehicle->mileage}}"   name="mileage" >
                                </div>
                            </div>
                            <!-- Row 3 -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="license_plate" class="form-label">License Plate</label>
                                    <input type="text" class="form-control" id="license_plate"  value="{{$vehicle->license_plate}}"  name="license_plate" >
                                </div>
                                <div class="col-md-4">
                                    <label for="engine_number" class="form-label">Engine Number</label>
                                    <input type="text" class="form-control" id="engine_number"  value="{{$vehicle->engine_number}}"  name="engine_number" >
                                </div>
                                <div class="col-md-4">
                                    <label for="chassis_number" class="form-label">Chassis Number</label>
                                    <input type="text" class="form-control" id="chassis_number"  value="{{$vehicle->chassis_number}}"  name="chassis_number" >
                                </div>
                            </div>
                            <!-- Row 4 -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="seating_capacity" class="form-label">Seating Capacity</label>
                                    <input type="number" class="form-control" id="seating_capacity"  value="{{$vehicle->seating_capacity}}"  name="seating_capacity" >
                                </div>
                                <div class="col-md-4">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="number" class="form-control" id="weight"  value="{{$vehicle->weight}}"  name="weight" >
                                </div>
                                <div class="col-md-4">
                                    <label for="horsepower" class="form-label">Horsepower</label>
                                    <input type="number" class="form-control" id="horsepower"  value="{{$vehicle->horsepower}}"  name="horsepower" >
                                </div>
                            </div>
                            <!-- Row 5 -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="purchase_date" class="form-label">Purchase Date</label>
                                    <input type="date" class="form-control" id="purchase_date"  value="{{$vehicle->purchase_date}}"  name="purchase_date" >
                                </div>
                                <div class="col-md-4">
                                    <label for="purchase_price" class="form-label">Purchase Price</label>
                                    <input type="number" class="form-control" id="purchase_price"  value="{{$vehicle->purchase_price}}"  name="purchase_price" >
                                </div>
                                <div class="col-md-4">
                                    <label for="last_service_date" class="form-label">Last Service Date</label>
                                    <input type="date" class="form-control" id="last_service_date"  value="{{$vehicle->last_service_date}}"  name="last_service_date">
                                </div>
                            </div>
                            <!-- Row 6 -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="odometer_reading" class="form-label">Odometer Reading</label>
                                    <input type="number" class="form-control" id="odometer_reading"  value="{{$vehicle->odometer_reading}}"  name="odometer_reading">
                                </div>
                                <!-- Add additional rows and fields as needed -->

                            </div>

                            <div class="">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                            </div>
                        </div>
                   



@endsection
