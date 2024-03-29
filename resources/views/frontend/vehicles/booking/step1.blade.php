
@extends('frontend.layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumbs__item breadcrumbs__item">Services</li>
						<li class="breadcrumbs__item breadcrumbs__item--active">Rent A Car</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>Rent A Car</h1>
                        <p>
                        In addition to the business modules designed to meet the specific needs of different sectors of activity, DIGIPARC offers a set of modules which are essential for any fleet manager, regardless of the size of the fleet or the sector of activity of the organization.
                        </p>

						 
					</div>
				</div>
				<!-- end title -->
			</div>
<div class="container">
	
<form action="{{ route('book.step2') }}" method="POST">
    @csrf

    <!-- First Row -->
    <div class="row pt-5">
        <div class="col-md-4">
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <input type="text" name="customer_name"  class="form-control sign__input" value="{{ auth()->user()->name ?? ''}}"  readonly>
                <input type="hidden" name="customer_id"  value="{{ auth()->user()->id ?? ''}}" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="driver_id">Driver</label>
                <input type="text"  name="driver_name" class="form-control sign__input" value="{{$vehicle->driver->name ?? ''}}"  readonly>
                <input type="hidden" name="driver_id"  value="{{$vehicle->driver->id ?? ''}}" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="vehicle_id">Vehicle</label>
                <input type="text"  name="vehicle_name" class="form-control sign__input" value="{{$vehicle->name}} -- {{$vehicle->model}} -- {{$vehicle->year}}"  readonly>
                <input type="hidden" name="vehicle_id"  value="{{$vehicle->id ?? ''}}">
            </div>
        </div>
    </div>

    <!-- Second Row -->
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="pickup_location">Pickup Location: <span class="text-danger">*</span></label>
                <input type="text" name="pickup_location" class="form-control sign__input" required placeholder="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="dropoff_location">Dropoff Location: <span class="text-danger">*</span></label>
                <input type="text" name="dropoff_location" class="form-control sign__input">
            </div>
        </div>
    </div>

    <!-- Third Row -->
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="fare_amount">Fare Amount: <span class="text-danger">*</span></label>
                <input type="text" name="fare_amount" class="form-control sign__input">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="distance_km">Distance (in kilometers):</label>
                <input type="text" name="distance_km" class="form-control sign__input">
            </div>
        </div>
    </div>

    <!-- Remaining Fields -->
    <div class="row pt-3">
        <div class="col-md-4">
            <div class="form-group">
                <label for="trip_date">Trip Date: <span class="text-danger">*</span></label>
                <input type="date" name="trip_date" class="form-control sign__input" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="departure_time">Departure Time: <span class="text-danger">*</span></label>
                <input type="time" name="departure_time" class="form-control sign__input">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="arrival_time">Arrival Time:</label>
                <input type="time" name="arrival_time" class="form-control sign__input">
            </div>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col-md-12">
            <div class="form-group">
                <label for="trip_notes">Trip Notes:</label>
                <textarea name="trip_notes" class="form-control " rows="4"></textarea>
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-3">Create Trip</button>
</form>

		</div>
	
@endsection

