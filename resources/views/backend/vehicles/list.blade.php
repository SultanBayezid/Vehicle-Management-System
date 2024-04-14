@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Vehicles</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('vehicles.create') }}">
                <i class="fas fa-plus"></i> {{ ('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
        </ol>
    </nav>

        <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Brand</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($vehicles as $vehicle)
                                        <tr>
                                            <td>{{$vehicle->brand->name ?? '' }}</td>
                                            <td>{{$vehicle->model->name ?? '' }}</td>
            
                                            <td>{{$vehicle->year }}</td>
                                            <td>{{$vehicle->color }}</td>
                                            <td>
                                            <div class="btn-group" role="group" aria-label="Basic example"> 
                <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                <form method="POST" action="{{ route('vehicles.destroy', $vehicle->id) }}" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vehicle?')"><i class="fas fa-trash"></i></button>
                    </div> </form>
            </td>
                                        </tr>
                                        @endforeach
                                       
                             
                                    </tbody>
                                </table>
                            </div>
                 
 </div>



@endsection
