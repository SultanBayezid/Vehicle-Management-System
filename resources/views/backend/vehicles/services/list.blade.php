@extends('backend.layouts.header')
 @section('content') 
 <div class="container">
<h1 class="h3 mb-2 pt-3 text-gray-800">{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? '' }} {{$vehicle->myear->year ?? '' }}</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}">{{ _lang('Home') }}</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('vehicles.index')}}">{{ _lang('Vehicles') }}</a>
      </li>
      <li class="breadcrumb-item " aria-current="page">{{$vehicle->brand->name ?? '' }} {{$vehicle->model->name ?? '' }} {{$vehicle->myear->year ?? '' }}</li>
      <li class="breadcrumb-item active">{{ _lang('Service History') }}</li> 
    </ol>
  </nav>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2 col-sm-4 borderright"> @include('backend.vehicles.menu') </div>
        <div class="col-md-10 col-sm-8">
          <span>
            <h1 class="display-6" style="display: inline-block;">{{ _lang('Service History') }}</h1>
            <button class="btn btn-primary btn-sm" style="float: right;" data-toggle="modal" data-target="#service">
              <i class="fas fa-plus"></i> {{ _lang('Add Service History') }} </button>
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
          <td>{{ \Carbon\Carbon::parse($service->completed_date)->format('d F Y') }}</td>

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
                <a target="_blank" href="{{ action('App\Http\Controllers\ServiceController@edit', $service->id) }}"
                                        data-title="{{ _lang('Update service') }}"
                                        class="btn btn-link"><i class="fas fa-pen"></i></a>
                                    <a target="_blank" href="{{ action('App\Http\Controllers\ServiceController@show', $service->id) }}"
                                        data-title="{{ _lang('View service') }}"
                                        class="btn btn-link"><i class="fas fa-eye"></i></a>
           
          
      </div>

                </td>
              </tr>
          
               @endforeach 
              </tbody>
          </table>
          <div class="pagination justify-content-center">
                                    {{ $services->links('vendor.pagination.bootstrap-5') }}
                                </div>
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