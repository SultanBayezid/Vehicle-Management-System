@extends('backend.layouts.header')
@section('content') 


<div class="container">
<h1 class="h3 mb-2 pt-3 text-gray-800">{{$vehicle->brand->name  ??  ' '}} {{$vehicle->model->name ?? ' ' }} {{$vehicle->myear->year ?? ' ' }}</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}">{{ _lang('Home') }}</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('vehicles.index')}}">{{ _lang('Vehicles') }}</a>
      </li>
      <li class="breadcrumb-item " aria-current="page">{{$vehicle->brand->name  ??  ' '}} {{$vehicle->model->name ?? ' ' }} {{$vehicle->myear->year ?? ' ' }}</li>
      <li class="breadcrumb-item active">{{ _lang('Issue') }}</li>
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
    <h1 class="display-6" style="display: inline-block;">{{ _lang('Issue') }}</h1>
    <button class="btn btn-primary btn-sm" style="float: right;"  data-toggle="modal" data-target="#issue"><i class="fas fa-plus"></i> {{ _lang('Add New Issue') }}</button>
</span>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Piority</th>
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
              <th>Driver</th>
              <th>Summary</th>
              <th>Reported Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody> @foreach($issues as $issue) <tr>
              <td>{{$issue->priority }}</td>
              <td>{{$issue->driver->driver_name }}</td>
              <td>{{$issue->summary }}</td>
              <td>{{$issue->report_date }}</td>
              <td>@if ($issue->status == 1) <div class="badge badge-danger">Pending</div> @elseif ($issue->status == 2) <div class="badge badge-warning">Closed</div> @elseif ($issue->status == 3) <div class="badge badge-success">Resolved</div> @else Status: Unknown @endif </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a target="_blank" href="{{ route('issues.show', $issue->id) }}" class="btn btn-link"><i class="fas fa-eye"></i></a>
                <a target="_blank" href="{{ route('issues.edit', $issue->id) }}" class="btn btn-link"><i class="fas fa-pen"></i></a>
              </div>
              </td>
            </tr> 
            @endforeach </tbody>
        </table>
        <div class="pagination justify-content-center">
                                    {{ $issues->links('vendor.pagination.bootstrap-5') }}
                                </div>
      </div>
      </div>

    </div>
  </div>

</div>
@include('backend.vehicles.issues.modal.create') 



@endsection