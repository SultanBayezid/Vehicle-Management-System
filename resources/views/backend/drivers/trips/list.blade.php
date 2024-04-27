@extends('backend.layouts.header')

@section('content')
<style>
    .title {
    font-weight: 100;
    text-align: center;

}

.center {
    font-weight: 100;
    text-align: center !important;

}


</style>
<!-- jQuery -->
<div class="container">
    <div class="row center">
        <div class="col-md-6 text-md-left">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Trips') }} </h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">

            <button class="btn btn-primary btn-sm"   data-toggle="modal" data-target="#issue"><i class="fas fa-plus"></i> {{ _lang('Add New Trip') }} </button>
        </div>
    </div>
    

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
 
        </ol>
    </nav>




    <div class="row">
    @foreach($trips as $trip)
        <div class="col-sm-12">
        <div class="border">
            <div class="center p-2">
            <p class=""><span class="h6">{{ _lang('Date') }} :</span> {{ $trip->trip_date }} {{ $trip->departure_time }}</p>
            <p class=""><span class="h6">{{ _lang('Customer') }} :</span> {{ $trip->customer->contact_name }}</p>
            <p class=""><span class="h6">{{ _lang('Vehicle') }} :</span> {{$trip->vehicle->brand->name ?? ''}} {{$trip->vehicle->model->name ?? ''}} {{$trip->vehicle->myear->year ?? ''}}</p>
            <p class=""><span class="h6">{{ _lang('Pickup Location') }} :</span> {{ $trip->pickup_location }} </p>
            <p class=""><span class="h6">{{ _lang('Dropoff Location') }} :</span> {{ $trip->dropoff_location }} </p>
            <p class=""><span class="h6">{{ _lang('Fare') }} :</span> {{currency()}} {{ $trip->fare_amount }}  </p>
            <p class=""><span class="h6">{{ _lang('Note') }} :</span> {{ $trip->trip_notes }} </p>
       
    
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editModal{{ $trip->id }}">
                    <i class="fas fa-pen"></i> {{ _lang('Edit') }}
                    </button>
                 
                    <form action="{{ route('driver_trip_delete', $trip->id) }}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this Trip?')">
                        <i class="fas fa-trash"></i> {{ _lang('Delete') }}
                    </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        @include('backend.drivers.trips.modal.edit')

    @endforeach

   </div>



                 
 </div>


 <div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0"> {{ _lang('Add New Trip') }}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="POST" action="{{ route('driver_trip_store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Vehicle') }}</label>
                        <select class="form-control "  name="vehicle_id">
                <option value="">{{ ('Select One') }}</option>
                @foreach($vehicles as $vehicle)
                <option value="{{$vehicle->id}}">{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? ''}} {{$vehicle->myear->year ?? ''}}</option>
                @endforeach
            </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Passenger') }}</label>
                        <select class="form-control " name="customer_id">
                <option value="">{{ ('Select One') }}</option>
                {{ create_option("contacts","id","contact_name",old('contact_name'),array("ref_user_id="=>auth()->user()->id)) }}
            </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Pickup Location') }}</label>
                        <input type="text" name="pickup_location" class="form-control sign__input" required="" placeholder="">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Dropoff Location') }}</label>
                        <input type="text" name="dropoff_location" class="form-control sign__input" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Fare') }}</label>
                        <input type="number" name="fare_amount" class="form-control sign__input" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Distance') }}</label>
                        <input type="number" name="distance_km" class="form-control sign__input">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Trip Date') }} </label>
                        <input type="date" name="trip_date" class="form-control sign__input" value="{{ now()->toDateString() }}" required="">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Departure Time') }}</label>
                        <input type="time" name="departure_time" value="{{ now()->format('H:i') }}" class="form-control sign__input">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Trip Notes') }}</label>
                        <textarea name="trip_notes" class="form-control " rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-primary btn-lg"><i class="ti-save"></i> {{ _lang('Save Trip') }}</button>
    </div>
</form>


    </div>
  </div>
  </div>
</div>


@endsection
