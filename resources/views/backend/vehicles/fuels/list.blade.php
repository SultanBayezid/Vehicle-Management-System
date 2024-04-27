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
      <li class="breadcrumb-item active">{{ _lang('Fuels') }}</li>
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
    <h1 class="display-6" style="display: inline-block;">{{ _lang('Fuel History') }}</h1>
    <button class="btn btn-primary btn-sm" style="float: right;"  data-toggle="modal" data-target="#fuel"><i class="fas fa-plus"></i> Add Fuel Entry</button>
</span>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
            <th>{{ _lang('Date') }}</th>
              <th>{{ _lang('Qty') }}</th>
              <th>{{ _lang('Odometer')}}</th>
              <th>{{ _lang('Refference') }}</th>
              <th class="action-col">{{ _lang('Action') }}</th>
              
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>{{ _lang('Date') }}</th>
            <th>{{ _lang('Qty') }}</th>
            <th>{{ _lang('Odometer')}}</th>
            <th>{{ _lang('Refference') }}</th>
            <th class="action-col">{{ _lang('Action') }}</th>
            </tr>
          </tfoot>
          <tbody> @foreach($fuels as $fuel) <tr>
              <td>{{$fuel->date }}</td>
              <td>{{$fuel->odometer }}</td>
              <td>{{$fuel->qty }}</td>
              <td>{{$fuel->reference }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a target="_blank" href="{{ action('App\Http\Controllers\FuelController@edit', $fuel->id) }}"
                                        data-title="{{ _lang('Update service') }}"
                                        class="btn btn-link"><i class="fas fa-pen"></i></a>
                                    <a target="_blank" href="{{ action('App\Http\Controllers\FuelController@show', $fuel->id) }}"
                                        data-title="{{ _lang('View service') }}"
                                        class="btn btn-link"><i class="fas fa-eye"></i></a>
                
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
@include('backend.vehicles.fuels.modal.create') 


@endsection