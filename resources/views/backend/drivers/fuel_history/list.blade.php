@extends('backend.layouts.header')

@section('content')
<style>
    .title {
    font-weight: 100;
    text-align: center;

}

.center {
    font-weight: 100;
    text-align: center !important;

}


</style>
<!-- jQuery -->
<div class="container">
    <div class="row center">
        <div class="col-md-6 text-md-left">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Fuel History') }} </h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">

            <button class="btn btn-primary btn-sm"   data-toggle="modal" data-target="#issue"><i class="fas fa-plus"></i> {{ _lang('Add New Fuel History') }} </button>
        </div>
    </div>
    

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
 
        </ol>
    </nav>




    <div class="row">
    @foreach($fuels as $fuel)
        <div class="col-sm-12">
        <div class="border">
            <div class="center p-2">
                <h5 class="title">
                    {{ $fuel->vehicle->brand->name ?? '' }}
                    {{ $fuel->vehicle->model->name ?? '' }}
                    {{ $fuel->vehicle->myear->year ?? '' }}
                </h5>
        

            
            <p class=""><span class="h6">{{ _lang('Fuel Entry Date') }} :</span> {{ $fuel->date }}</p>
            <p class=""><span class="h6">{{ _lang('Fuel Quantity') }} :</span> {{ $fuel->qty }}</p>
            <p class=""><span class="h6">{{ _lang('Odometer') }} :</span> {{ $fuel->odometer }} {{ _lang('KM') }}</p>
            <p class=""><span class="h6">{{ _lang('Reference') }} :</span> {{ $fuel->reference }} </p>
            <p class=""><span class="h6">{{ _lang('Note') }} :</span> {{ $fuel->note }} </p>
            <p class="">    @if($fuel->attachment != "")
                            <a href="{{ asset('uploads/fuel/'.$fuel->attachment) }}"
                                target="_blank" class="btn btn-primary btn-sm">{{ _lang('View Attachment') }}</a>
                            @else
                            <label class="label label-warning">
                                <strong>{{ _lang('No Atachment Available !') }}</strong>
                            </label>
                            @endif </p>
    
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editModal{{ $fuel->id }}">
                    <i class="fas fa-pen"></i> {{ _lang('Edit') }}
                    </button>
                 
                    @include('backend.drivers.fuel_history.modal.edit')
                    <form action="{{ route('driver_fuel_delete', $fuel->id) }}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this Fuel History?')">
                        <i class="fas fa-trash"></i> {{ _lang('Delete') }}
                    </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    @endforeach


</div>



                 
 </div>


 <div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0"> {{ _lang('Add New Fuel History') }}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="POST" action="{{ route('driver_fuelhistory_store') }}" enctype="multipart/form-data">
    @csrf
                                <div class="row mb-4 m-3">
                                    <div class="col-md-12">
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Vehicle') }} <sup style="color:red">*</sup></label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <select class="form-control" name="vehicle_id" id="vehicle_id" required>
                                                        <option value="">{{ _lang('Select One') }}</option>
                                                        @foreach($vehicles as $vehicle)
                                                        <option value="{{ $vehicle->id }}">{{ $vehicle->brand->name ?? '' }} {{ $vehicle->model->name ?? '' }} {{ $vehicle->myear->year ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Fuel Entry Date') }} *</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>
                                                    @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Odometer') }} <sup style="color:red">*</sup></label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="number" name="odometer" required="" placeholder="{{ _lang('Odometer') }}" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Fuel Quantity') }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="number" name="qty" required="" placeholder="{{ _lang('Fuel Quantity') }}" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Reference') }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" name="reference" placeholder="{{ _lang('Reference') }}" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Attachment') }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="file" class="form-control" name="attachment">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Note') }} <sup style="color:red">*</sup></label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <textarea cols="3" rows="3" name="note" placeholder="{{ _lang('Note') }}" class="form-control" value=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group">
                 
                                            <button type="submit" class="btn btn-primary" >
                                                <i class="fa fa-save"></i> {{ _lang('Save') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

    </div>
  </div>
  </div>
</div>


@endsection
