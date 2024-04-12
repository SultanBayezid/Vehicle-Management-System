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
        <table id="datatablesSimple">
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
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{$fuel->id}}">  <i class="fas fa-pen"></i> </button>
            @include('backend.vehicles.fuels.modal.edit') 

                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal{{$fuel->id}}">
                <i class="fas fa-eye"></i></button>

            @include('backend.vehicles.fuels.modal.view') 


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



@endsection