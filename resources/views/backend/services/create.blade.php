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
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('services.index')}}">Services</a></li>

            <li class="breadcrumb-item active"  aria-current="page">Service Create</li>
        </ol>
    </nav>
                      
                      
                            <div class="card-body">
                         
                            <form method="post" class="validate" autocomplete="off" action="{{ route('services.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Vehicle') }}</label>
                                            <select class="form-control " data-value="id" data-display="vehicle_id" data-table="vehicles" data-where="1" name="vehicle_id" id="vehicle_id" required>
                                            <option value="">{{ ('Select One') }}</option>
                                            {{ create_option("vehicles", "id", "name", old('vehicle_id')) }}
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Completion Date *') }}</label>
                                            <input type="date" class="form-control datepicker" name="completed_date" value="{{ old('completed_date') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Odometer') }}</label>
                                            <input type="text" class="form-control" name="odometer" value="{{ old('odometer') }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Select any issues that were resolved as part of this service') }}</label> <br>
                                            @foreach($issues as $issue)
                                                <input type="checkbox" name="issues[]" value="{{ $issue->id }}" >
                                                {{ $issue->summary }}
                                            </label><br>
                                        @endforeach
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label class="control-label">{{ ('Attachment') }}</label>
                                          <input type="file" class="form-control " name="document">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Note') }}</label>
                                            <textarea class="form-control" name="note">{{ old('note') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lgbtn-sm"><i class="fas fa-file"></i> {{ _lang('Save Changes') }}</button>
                                    </div>
                                </div>
                            </form>

                            </div>
                        </div>
                   



@endsection
