@extends('backend.layouts.header')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">trips</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">trips</li>
                            <li  class="breadcrumb-item">
                            <a href="{{ route('trips.create') }}" class="btn btn-primary">Create New Driver</a>

                            </li>
                        </ol>
                    
                        <div class="card mb-4">
                            <!-- <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div> -->
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Driver</th>
                                            <th>Vehicle</th>=
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
                                            <th>Vehicle</th>
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
                                            <td>{{$trip->vehicle->make }}</td>
                                            <td>{{$trip->pickup_location }}</td>
                                            <td>{{$trip->dropoff_location }}</td>
                                            <td>{{$trip->fare_amount }}</td>
                                     
                                            <td>
                <a href="{{ route('trips.show', $trip->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('trips.destroy', $trip->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Driver?')">Delete</button>
                </form>
            </td>
                                        </tr>
                                        @endforeach
                                       
                             
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection
