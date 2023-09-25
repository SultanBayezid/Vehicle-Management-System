@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Issues</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('issues.create') }}">
                <i class="fas fa-plus"></i> {{ ('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Issues</li>
        </ol>
    </nav>

        <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Piority</th>
                                            <th>Vehicle</th>
                                            <th>Driver</th>
                                            <th>Summary</th>
                                            <th>Reported Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                           <th>Piority</th>
                                            <th>Vehicle</th>
                                            <th>Driver</th>
                                            <th>Summary</th>
                                            <th>Reported Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($issues as $issue)
                                        <tr>
                                            <td>{{$issue->priority }}</td>
                                            <td>{{$issue->vehicle->name }}</td>
                                            <td>{{$issue->driver->name }}</td>
                                            <td>{{$issue->summary }}</td>
                                            <td>{{$issue->report_date }}</td>
                                            <td>@if ($issue->status == 1)
                                                    <div class="badge badge-danger">Pending</div> 
                                                @elseif ($issue->status == 2)
                                                <div class="badge badge-warning">Closed</div> 
                                                @elseif ($issue->status == 3)
                                                <div class="badge badge-success">Resolved</div> 
                                                @else
                                                    Status: Unknown
                                                @endif</td>
                                            <td>
                                            <div class="btn-group" role="group" aria-label="Basic example"> 
                <a href="{{ route('issues.show', $issue->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                <form method="POST" action="{{ route('issues.destroy', $issue->id) }}" >
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
