@extends('backend.layouts.header')
@section('content') 


<div class="container">
<h1 class="h3 mb-2 pt-3 text-gray-800">{{$vehicle->brand->name }} {{$vehicle->model->name }} {{$vehicle->myear->year }}</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}">{{ _lang('Home') }}</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('vehicles.index')}}">{{ _lang('Vehicles') }}</a>
      </li>
      <li class="breadcrumb-item " aria-current="page">{{$vehicle->brand->name }} {{$vehicle->model->name }} {{$vehicle->myear->year }}</li>
      <li class="breadcrumb-item active">{{ _lang('Trips') }}</li>
    </ol>
  </nav>
  <div class="card">
    <div class="card-body">
      <div class="row">
      <div class="col-md-2 col-sm-4 borderright">
   @include('backend.vehicles.menu')

      </div>
      <div class="col-md-10 col-sm-8">
      <span>
    <h1 class="display-6" style="display: inline-block;">Trips</h1>
    <!-- <button class="btn btn-primary btn-sm" style="float: right;"  data-toggle="modal" data-target="#issue"><i class="fas fa-plus"></i> Add New Issue</button> -->
</span>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
          <tr>
                                        <th>{{ _lang('Date') }}</th>
                                        <th>{{ _lang('Customer') }}</th>
                                        <th>{{ _lang('Driver') }}</th>
                                        <th>{{ _lang('Vehicle') }}</th>
                                        <th>{{ _lang('Pickup Location') }}</th>
                                        <th>{{ _lang('Dropoff Location') }}</th>
                                        <th>{{ _lang('Fare') }}</th>
                                        <th>{{ _lang('Action') }}</th>

                                        </tr>
          </thead>
          <tfoot>
          <tr>
                                        <th>{{ _lang('Date') }}</th>
                                        <th>{{ _lang('Customer') }}</th>
                                        <th>{{ _lang('Driver') }}</th>
                                        <th>{{ _lang('Vehicle') }}</th>
                                        <th>{{ _lang('Pickup Location') }}</th>
                                        <th>{{ _lang('Dropoff Location') }}</th>
                                        <th>{{ _lang('Fare') }}</th>
                                        <th>{{ _lang('Action') }}</th>

                                        </tr>
          </tfoot>
          <tbody>
          @foreach($trips as $trip)
                                        <tr>
                                        <td>{{$trip->trip_date }}</td>
                                            <td>{{$trip->customer->contact_name ?? '' }}</td>
                                            <td>{{$trip->vehicle->driver->driver_name ?? '' }}</td>
                                            <td>{{$trip->vehicle->brand->name }} {{$trip->vehicle->model->name }} {{$trip->vehicle->myear->year }}</td>
                                            <td>{{$trip->pickup_location }}</td>
                                            <td>{{$trip->dropoff_location }}</td>
                                            <td>{{$trip->fare_amount }}</td>
                                            <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('trips.show', $trip->id) }}" target="_blank" class="btn btn-link"><i class="fas fa-eye"></i></a>
                                            <a target="_blank" href="{{ route('trips.edit', $trip->id) }}" class="btn btn-link"><i class="fas fa-pen"></i></a>
                                            </div>
                                    
                                          </td>
            </tr> 
            @endforeach </tbody>
        </table>
      </div>
      </div>

    </div>
  </div>

</div>
@include('backend.vehicles.issues.modal.create') 



@endsection