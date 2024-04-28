@extends('backend.layouts.header')

@section('content')
<div class="container">
      <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Trips Create')}}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item"><a href="{{route('trips.index')}}">{{ _lang('Trips')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _lang('Trips Create')}}</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
 
 

            <div class="card-body">
            <form action="{{ route('trips.store') }}" method="POST">
    @csrf

    <!-- First Row -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="customer_id">{{ _lang('Customer')}}</label>
                <select class="form-control select2-ajax @error('customer_id') is-invalid @enderror" data-value="id" data-display="contact_name"
                    data-table="contacts" data-where="1" name="customer_id">
                    <option value="">{{ _lang('Select One') }}</option>
                    {{ create_option("contacts","id","contact_name",old('customer_id'),array("company_id="=>company_id())) }}
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
                <label for="driver_id">{{_lang('Driver')}}</label>
                <select class="getv form-control select2-ajax @error('driver_id') is-invalid @enderror" data-value="id" data-display="name"
                    data-table="drivers" data-where="1" name="driver_id">
                    <option value="">{{ _lang('Select One') }}</option>
                    {{ create_option("drivers","id","driver_name",old('driver_id'),array("company_id="=>company_id())) }}
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
                <label for="vehicle_id"> {{ _lang('Vehicle') }}</label>
                <select class="form-control select2-ajax @error('vehicle_id') is-invalid @enderror" name="vehicle_id" id="vehicle_id" required>
                    <option value="">{{ _lang('Select One') }}</option>
              
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
                <label for="pickup_location">{{ _lang('Pickup Location') }}</label>
                <input type="text" name="pickup_location" class="form-control @error('pickup_location') is-invalid @enderror" required>
                @error('pickup_location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="dropoff_location"> {{ _lang('Dropoff Location') }}</label>
                <input type="text" name="dropoff_location" class="form-control @error('dropoff_location') is-invalid @enderror">
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
                <label for="fare_amount"> {{ _lang('Fare Amount') }}</label>
                <input type="number" name="fare_amount" class="form-control @error('fare_amount') is-invalid @enderror">
                @error('fare_amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="distance_km">{{ _lang('Distance (in kilometers)') }}</label>
                <input type="number" name="distance_km" class="form-control @error('distance_km') is-invalid @enderror">
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
                <label for="trip_date">{{ _lang('Trip Date') }}</label>
                <input type="date" name="trip_date" class="form-control @error('trip_date') is-invalid @enderror" required>
                @error('trip_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="departure_time">{{ _lang('Departure Time') }}</label>
                <input type="time" name="departure_time" class="form-control @error('departure_time') is-invalid @enderror">
                @error('departure_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="arrival_time">{{ _lang('Arrival Time') }}</label>
                <input type="time" name="arrival_time" class="form-control @error('arrival_time') is-invalid @enderror">
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
                <label for="trip_notes">{{ _lang('Trip Notes') }}</label>
                <textarea name="trip_notes" class="form-control @error('trip_notes') is-invalid @enderror" rows="4"></textarea>
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
<script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('.getv').change(function() {
        var driver_id = $(this).val();
        if (driver_id !== '') {
            $.ajax({
                url: "{{ route('get-vehicles', ':driver_id') }}".replace(':driver_id', driver_id),
                type: 'GET',
                success: function(response) {
                    var options = '<option value="">{{ _lang('Select One') }}</option>';
                    $.each(response, function(index, vehicle) {
                        options += '<option value="' + vehicle.id + '">' + vehicle.brand.name + ' ' + vehicle.model.name + ' ' + vehicle.myear.year + '</option>';
                    });
                    $('#vehicle_id').html(options).select2(); // Initialize Select2 after updating options
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#vehicle_id').html('<option value="">{{ _lang('Select One') }}</option>').select2(); // Initialize Select2 after updating options
        }
    });
});
</script>

@endsection