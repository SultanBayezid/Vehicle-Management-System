@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Services</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('services.index')}}">Fuel History</a></li>

            <li class="breadcrumb-item active"  aria-current="page">Service Create</li>
        </ol>
    </nav>
                      
                      
                            <div class="card-body">
                         
                            <form method="POST" action="{{route('fuels.store')}}"  enctype="multipart/form-data">
          @csrf
          <div class="row mb-4 m-3">
                                        <div class="col-md-12">
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Vehicle <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <select class="form-control "  name="vehicle_id" id="vehicle_id" required>
                                            <option value="">{{ ('Select One') }}</option>
                                          @foreach($vehicles as $vehicle)
                                          <option value="{{$vehicle->id}}">{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? ''}} {{$vehicle->myear->year ?? ''}}</option>
                                          @endforeach
                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                            
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Fuel Entry Date *</label>
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
                                                    <label class="control-label">Odometer <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="number" name="odometer" required="" 
                                                            placeholder="Odometer" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Fuel Quantity</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <input type="number" name="qty" required="" 
                                                            placeholder="Fuel Quantity" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Reference</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <input type="text" name="reference" 
                                                            placeholder="reference" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Attachment</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <input type="file" class="form-control" name="attachment">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Note <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <textarea cols="3" rows="3" name="note" 
                                                                placeholder="Note" class="form-control" value=""></textarea>
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
                                                <button type="reset" class="btn btn-danger" style="margin-right: 30px; width: 100px;">
                                                    <i class="fa fa-remove"></i> Reset
                                                </button>
                                                <button type="submit" class="btn btn-primary" style="width: 100px;">
                                                    <i class="fa fa-save"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                       
  </form>

                            </div>
                        </div>
                   



@endsection
