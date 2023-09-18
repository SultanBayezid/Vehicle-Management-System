@extends('backend.layouts.header')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Vehicles</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Vehicles</li>
                            <li  class="breadcrumb-item">
                            <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Create New Vehicle</a>

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
                                            <th>Name</th>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Name</th>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($vehicles as $vehicle)
                                        <tr>
                                            <td>{{$vehicle->name }}</td>
                                            <td>{{$vehicle->make }}</td>
                                            <td>{{$vehicle->model }}</td>
                                            <td>{{$vehicle->year }}</td>
                                            <td>{{$vehicle->color }}</td>
                                            <td>
                <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('vehicles.destroy', $vehicle->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</button>
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
