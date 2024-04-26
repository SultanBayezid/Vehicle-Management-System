@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">Services</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item"><a href="{{route('services.index')}}">Services</a></li>

            <li class="breadcrumb-item active"  aria-current="page">Service Edit</li>
        </ol>
    </nav>
                      
                      
                            <div class="card-body">
                         
                            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Vehicle') }}</label>
                                            <div class="form-group">
                                                      <input type="text" value="{{$service->vehicle->brand->name ?? ''}} {{$service->vehicle->model->name ?? ''}} {{$service->vehicle->myear->year ?? ''}}" class="form-control" readonly>
                                                    <input type="hidden" name="vehicle_id" value="{{$service->vehicle_id}}">
                                                    </div>
                                                
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Completion Date *') }}</label>
                                            <input type="date" class="form-control datepicker" name="completed_date" value="{{ $service->completed_date }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Odometer') }}</label>
                                            <input type="number" class="form-control" name="odometer" value="{{ $service->odometer }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                       <p> {{ _lang('Select any issues that were resolved as part of this service') }}</p>
                                            @foreach($issues as $issue)
    <label>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="issues[]" value="{{ $issue->id }}" {{ $service->issues->contains('id', $issue->id) ? 'checked' : '' }}>
        <a target="_blank" href="{{ route('issues.show', $issue->id) }}">{{ $issue->summary }}</a>
    </label>
    </div>
@endforeach

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">{{ ('Attachment') }}</label>
                                          <input type="file" class="form-control " name="document">
                                          <br>

                                          @if($service->document != "")
                                        <a href="{{ asset('uploads/service/'.$service->document) }}"
                                            target="_blank" class="btn btn-primary btn-sm">{{ _lang('View Attachment') }}</a>
                                        @else
                                        <label class="label label-warning">
                                            <strong>{{ _lang('No Atachment Available !') }}</strong>
                                        </label>
                                        @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Note') }}</label>
                                            <textarea class="form-control" name="note">{{ $service->note }}</textarea>
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
