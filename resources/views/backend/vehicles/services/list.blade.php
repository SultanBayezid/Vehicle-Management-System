@extends('backend.layouts.header')
 @section('content') 
 <div class="container">
  <h1 class="display-4">{{$vehicle->name}}</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('vehicles.index')}}">Vehicles</a>
      </li>
      <li class="breadcrumb-item " aria-current="page">{{$vehicle->name}}</li>
      <li class="breadcrumb-item active">{{ _lang('Service History') }}</li>
    </ol>
  </nav>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2 col-sm-4 borderright"> @include('backend.vehicles.menu') </div>
        <div class="col-md-10 col-sm-8">
          <span>
            <h1 class="display-6" style="display: inline-block;">Service History</h1>
            <button class="btn btn-primary btn-sm" style="float: right;" data-toggle="modal" data-target="#service">
              <i class="fas fa-plus"></i> Add Service Entry </button>
          </span>
          <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>{{ _lang('Completed') }}</th>
                <th>{{ _lang('Meter') }}</th>
                <th>{{ _lang('Issues') }}</th>
                <th class="action-col">{{ _lang('Action') }}</th>
              </tr>
            </thead>
            <tbody> @foreach($services as $service) <tr>
                <td>{{ $service->completed_date }}</td>
                <td>{{ $service->note }}</td>
                <td>
                <ul  class="">
                @foreach($service->issues as $issue) 
                <li class="list-group-item"><a target="_blank" href="{{route('issues.show', $issue->id)}}">{{ $issue->summary }}</a></li>

                  
@endforeach 
</ul>

                  </td>
                <td class="text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{$service->id}}">  <i class="fas fa-pen"></i> </button>
                  @include('backend.vehicles.services.modal.edit') 
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#showModal{{$service->id}}">
                  <i class="fas fa-eye"></i>
    </button>
                  @include('backend.vehicles.services.modal.view') 
                  <form action="{{ action('App\Http\Controllers\ServiceController@destroy', $service->id) }}" method="post">
          
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm btn-remove" type="submit">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
      </div>

                </td>
              </tr>
          
               @endforeach 
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Create  -->
<div class="modal fade" id="service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  @include('backend.vehicles.services.modal.create') 
</div> 
@endsection