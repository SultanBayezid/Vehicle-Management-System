@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('New Issues')}}</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item"><a href="{{route('issues.index')}}">{{ _lang('Issues')}}</a></li>

            <li class="breadcrumb-item active"  aria-current="page">{{ _lang('New Issues')}}</li>
        </ol>
    </nav>
                      
                      
                            <div class="card-body">
                            <div class="container mt-4">
                            <form method="POST" action="{{ route('issues.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Vehicle') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control select2-ajax" name="vehicle_id" id="vehicle_id" required>
                            <option value="">{{ _lang('Select One') }}</option>
                            @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->brand->name ?? '' }} {{ $vehicle->model->name ?? '' }} {{ $vehicle->myear->year ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Assignee') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control select2-ajax" data-value="id" data-display="name" data-table="drivers" data-where="1" name="driver_id" id="driver_id" required>
                            <option value="">{{ _lang('Select One') }}</option>
                            {{ create_option("drivers", "id", "driver_name", old('driver_id'),array("company_id="=>company_id())) }}
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Summary') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="summary" required="" placeholder="{{ _lang('Summary') }}" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Description') }}</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea cols="3" rows="3" name="description" placeholder="{{ _lang('Description') }}" class="form-control" value=""></textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Documents') }}</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Priority') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control select2-ajax" name="priority">
                            <option value="Low">{{ _lang('Low') }}</option>
                            <option value="Medium">{{ _lang('Medium') }}</option>
                            <option value="High">{{ _lang('High') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Due Date') }}</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="date" class="form-control" name="due_date">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <button type="reset" class="btn btn-danger">
                <i class="fa fa-remove"></i> {{ _lang('Reset') }}
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> {{ _lang('Save') }}
            </button>
        </div>
    </div>
</form>

                                


                            </div>
                        </div>
                   



@endsection
