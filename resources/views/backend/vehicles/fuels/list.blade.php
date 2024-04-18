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
    <h1 class="display-6" style="display: inline-block;">Fuels</h1>
    <button class="btn btn-primary btn-sm" style="float: right;"  data-toggle="modal" data-target="#fuel"><i class="fas fa-plus"></i> Add Fuel Entry</button>
</span>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Date</th>
              <th>Odometer</th>
              <th>Qty</th>
              <th>reference</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>Date</th>
              <th>Odometer</th>
              <th>Qty</th>
              <th>reference</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody> @foreach($fuels as $fuel) <tr>
              <td>{{$fuel->date }}</td>
              <td>{{$fuel->odometer }}</td>
              <td>{{$fuel->qty }}</td>
              <td>{{$fuel->reference }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-primary btn-sm edit-fuel" 
data-toggle="modal" 
data-target="#fueledit" 
data-date="{{$fuel->date}}"
data-vehicle-id="{{$fuel->vehicle_id}}"
data-vehicle-name="{{$fuel->vehicle->brand->name ?? ''}} {{$fuel->vehicle->model->name ?? '' }} {{$fuel->vehicle->myear->year ?? ''}}"
data-odometer="{{$fuel->odometer}}"
data-qty="{{$fuel->qty}}"
data-reference="{{$fuel->reference}}"
data-note="{{$fuel->note}}">
<i class="fas fa-pen"></i>
</button>

<button class="btn btn-success btn-sm view-fuel" 
data-toggle="modal" 
data-target="#viewedit" 
data-date="{{$fuel->date}}"
data-vehicle-id="{{$fuel->vehicle_id}}"
data-vehicle-name="{{$fuel->vehicle->brand->name ?? ''}} {{$fuel->vehicle->model->name ?? '' }} {{$fuel->vehicle->myear->year ?? ''}}"
data-odometer="{{$fuel->odometer}}"
data-qty="{{$fuel->qty}}"
data-reference="{{$fuel->reference}}"
data-attachment-url="{{ asset('uploads/fuel/'.$fuel->attachment) }}"
data-note="{{$fuel->note}}">
<i class="fas fa-eye"></i>
</button>
          
                  <form method="POST" action="{{ route('fuels.destroy', $fuel->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vehicle?')">
                      <i class="fas fa-trash"></i>
                    </button>
                </div>
                </form>
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
@include('backend.vehicles.fuels.modal.edit') 
@include('backend.vehicles.fuels.modal.view') 



@endsection