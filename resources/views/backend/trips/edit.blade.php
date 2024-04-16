@extends('backend.layouts.header')

@section('content')
<div class="container">
        <h1 class="display-4">Trip Edit</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('trips.index')}}">Trips</a></li>
                <li class="breadcrumb-item active" aria-current="page">Trip Edit</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
 
 

            <div class="card-body">
            <form method="post" autocomplete="off"
                    action="{{route('trips.update', $trip->id)}}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">
    <!-- First Row -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select class="form-control select2-ajax @error('customer_id') is-invalid @enderror" data-value="id" data-display="contact_name"
                    data-table="contacts" data-where="1" name="customer_id">
                    <option value="">{{ _lang('Select One') }}</option>
                    {{ create_option("contacts","id","contact_name",$trip->customer_id,array("company_id="=>company_id())) }}
                </select>
                @error('customer_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="driver_id">Driver</label>
                <select class="form-control select2-ajax @error('driver_id') is-invalid @enderror" data-value="id" data-display="name"
                    data-table="drivers" data-where="1" name="driver_id">
                    <option value="">{{ _lang('Select One') }}</option>
                    {{ create_option("drivers","id","name",$trip->driver_id,array("company_id="=>company_id())) }}
                    
                </select>
                @error('driver_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="vehicle_id">Vehicle</label>
                <select class="form-control @error('vehicle_id') is-invalid @enderror" name="vehicle_id" id="vehicle_id" required>
                    <option value="">{{ __('Select One') }}</option>
                    @foreach($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}"{{$vehicle->id == $trip->vehicle_id ? 'selected' : ''}}>{{$vehicle->brand->name}} {{$vehicle->model->name}} {{$vehicle->myear->year}}</option>
                    @endforeach
                </select>
                @error('vehicle_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Second Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="pickup_location">Pickup Location:</label>
                <input type="text" name="pickup_location" class="form-control @error('pickup_location') is-invalid @enderror" value="{{$trip->pickup_location}}" required >
                @error('pickup_location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="dropoff_location">Dropoff Location:</label>
                <input type="text" name="dropoff_location" class="form-control @error('dropoff_location') is-invalid @enderror" value="{{$trip->dropoff_location}}">
                @error('dropoff_location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Third Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="fare_amount">Fare Amount:</label>
                <input type="number" name="fare_amount" class="form-control @error('fare_amount') is-invalid @enderror" value="{{$trip->fare_amount}}">
                @error('fare_amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="distance_km">Distance (in kilometers):</label>
                <input type="number" name="distance_km" class="form-control @error('distance_km') is-invalid @enderror" value="{{$trip->distance_km}}">
                @error('distance_km')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Remaining Fields -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="trip_date">Trip Date:</label>
                <input type="date" name="trip_date" class="form-control @error('trip_date') is-invalid @enderror" required value="{{$trip->trip_date}}">
                @error('trip_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="departure_time">Departure Time:</label>
                <input type="time" name="departure_time" class="form-control @error('departure_time') is-invalid @enderror" value="{{$trip->departure_time}}">
                @error('departure_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="arrival_time">Arrival Time:</label>
                <input type="time" name="arrival_time" class="form-control @error('arrival_time') is-invalid @enderror" value="{{$trip->arrival_time}}">
                @error('arrival_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="trip_notes">Trip Notes:</label>
                <textarea name="trip_notes" class="form-control @error('trip_notes') is-invalid @enderror" rows="4">{{$trip->trip_notes}}</textarea>
                @error('trip_notes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Create Trip</button>
</form>
            </div>
    
    </div>
</div>
</div>
@endsection