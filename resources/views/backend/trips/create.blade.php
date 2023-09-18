@extends('backend.layouts.header')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">{{ ('Add New Income') }}</h4>
            </div>

            <div class="card-body">
            <form action="{{ route('trips.store') }}" method="POST">
            @csrf

            <!-- First Row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="customer_id">Customer</label>
                        <select class="form-control select2-ajax" data-value="id" data-display="contact_name"
                                    data-table="contacts" data-where="1" name="customer_id">
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("contacts", "id", "contact_name", old('customer_id')) }}

                                </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="driver_id">Driver</label>
                        <select class="form-control select2-ajax" data-value="id" data-display="name"
                                    data-table="drivers" data-where="1" name="driver_id">
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("drivers", "id", "name", old('driver_id')) }}

                                </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="vehicle_id">Vehicle</label>
                        <select class="form-control select2-ajax" data-value="id" data-display="make"
                                    data-table="vehicles" data-where="1" name="vehicle_id">
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("vehicles", "id", "make", old('vehicle_id')) }}

                                </select>
                    </div>
                </div>
            </div>

            <!-- Second Row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pickup_location">Pickup Location:</label>
                        <input type="text" name="pickup_location" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dropoff_location">Dropoff Location:</label>
                        <input type="text" name="dropoff_location" class="form-control">
                    </div>
                </div>
            </div>





                        <!-- Third Row -->
                        <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <label for="fare_amount">Fare Amount:</label>
                <input type="text" name="fare_amount" class="form-control">
            </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="distance_km">Distance (in kilometers):</label>
                <input type="text" name="distance_km" class="form-control">
            </div>
                
                </div>
            </div>
            <!-- Remaining Fields -->
            <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label for="trip_date">Trip Date:</label>
                <input type="date" name="trip_date" class="form-control">
            </div>
            </div>
                <div class="col-md-4">
                <div class="form-group">
                <label for="departure_time">Departure Time:</label>
                <input type="time" name="departure_time" class="form-control">
            </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label for="arrival_time">Arrival Time:</label>
                <input type="time" name="arrival_time" class="form-control">
            </div>
                </div>
              
   
             
            </div>
    
            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                <label for="trip_notes">Trip Notes:</label>
                <textarea name="trip_notes" class="form-control" rows="4"></textarea>
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