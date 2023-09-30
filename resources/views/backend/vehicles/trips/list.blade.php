@extends('backend.layouts.header')
@section('content') 


<div class="container">
  <h1 class="display-4">{{$vehicle->name}}</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('vehicles.index')}}">Vehicles</a>
      </li>
      <li class="breadcrumb-item " aria-current="page">{{$vehicle->name}}</li>
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
        <table id="datatablesSimple">
          <thead>
          <tr>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Driver</th>
                                            <th>Pickup Location</th>
                                            <th>Dropoff Location</th>
                                            <th>Fare</th>
                                            <th>Action</th>
                                        </tr>
          </thead>
          <tfoot>
          <tr>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Driver</th>
                                            <th>Pickup Location</th>
                                            <th>Dropoff Location</th>
                                            <th>Fare</th>
                                            <th>Action</th>
                                        </tr>
          </tfoot>
          <tbody>
          @foreach($trips as $trip)
                                        <tr>
                                            <td>{{$trip->trip_date }}</td>
                                            <td>{{$trip->customer->contact_name }}</td>
                                            <td>{{$trip->driver->name }}</td>
                                            <td>{{$trip->pickup_location }}</td>
                                            <td>{{$trip->dropoff_location }}</td>
                                            <td>{{$trip->fare_amount }}</td>
                                            <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('trips.show', $trip->id) }}" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a target="_blank" href="{{ route('trips.edit', $trip->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                        <form method="POST" action="{{ route('trips.destroy', $trip->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Driver?')"><i class="fas fa-trash"></i></button>
                                        </form>
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