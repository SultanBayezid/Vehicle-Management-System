@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">New Issue</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item"><a href="{{route('issues.index')}}">Issues</a></li>

            <li class="breadcrumb-item active"  aria-current="page">New Issue</li>
        </ol>
    </nav>
                      
                      
                            <div class="card-body">
                            <div class="container mt-4">
                                <form method="POST" action="{{route('issues.store')}}"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="table table-bordered table-condensed p-4">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Vehicle <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-6">
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
                                                <div class="col-md-2">
                                                    <label class="control-label">Assignee <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <select class="form-control " data-value="id" data-display="name" data-table="drivers" data-where="1" name="driver_id" id="driver_id" required>
                                            <option value="">{{ ('Select One') }}</option>
                                            {{ create_option("drivers", "id", "name", old('driver_id')) }}
                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Summary <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="summary" required="" 
                                                            placeholder="Summary" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Description</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea cols="3" rows="3" name="description" 
                                                                placeholder="Description" class="form-control" value=""></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Documents</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Priority <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control select2 select2-hidden-accessible" 
                                                                id="Priority" name="priority" required="True" style="width: 100%;" 
                                                                tabindex="-1" aria-hidden="true">
                                                            <option value="Low">Low</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Due Date</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="date" class="form-control" name="due_date">
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
                                </div>
                                </form>
                                
</div>

                            </div>
                        </div>
                   



@endsection
