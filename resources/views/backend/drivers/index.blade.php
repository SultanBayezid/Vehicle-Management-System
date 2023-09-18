@extends('backend.layouts.header')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Drivers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Drivers</li>
                            <li  class="breadcrumb-item">
                            <a href="{{ route('drivers.create') }}" class="btn btn-primary">Create New Driver</a>

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
                                            <th>License Number</th>
                                            <th>License Expiry Date</th>
                                            <th>Phone Number</th>
                                            <th>Blood Group:</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Name</th>
                                            <th>License Number</th>
                                            <th>License Expiry Date</th>
                                            <th>Phone Number</th>
                                            <th>Blood Group:</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($drivers as $driver)
                                        <tr>
                                            <td>{{$driver->name }}</td>
                                            <td>{{$driver->license_number }}</td>
                                            <td>{{$driver->license_expiry_date }}</td>
                                            <td>{{$driver->phone_number }}</td>
                                            <td>{{$driver->blood_group }}</td>
                                     
                                            <td>
                <a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('drivers.destroy', $driver->id) }}" style="display: inline;">
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
