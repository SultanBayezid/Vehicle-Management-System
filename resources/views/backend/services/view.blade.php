@extends('backend.layouts.header')

@section('content')
<div class="container">
      <h1 class="h3 mb-2 pt-3 text-gray-800">Service Details</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item"><a href="{{route('services.index')}}">Services</a></li>
                <li class="breadcrumb-item"><a href="{{route('vehicles.show', $service->vehicle_id)}}">{{$service->vehicle->brand->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Service Details</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
      
     

            <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <tr>
                        <td>{{ _lang('Vehicle') }}</td>
                        <td>{{$service->vehicle->brand->name}} {{$service->vehicle->model->name}} {{$service->vehicle->myear->year}}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Completion Date') }}</td>
                        <td>{{$service->completed_date}}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Odometer') }}</td>
                    
                        <td>{{$service->odometer}}</td>
                    </tr>

                    <tr>
                        <td>{{ _lang('Documents') }}</td>
                        <td>
                            @if($service->document != "")
                            <a href="{{ asset('uploads/service/'.$service->document) }}"
                                target="_blank" class="btn btn-primary btn-sm">{{ _lang('View Attachment') }}</a>
                            @else
                            <label class="label label-warning">
                                <strong>{{ _lang('No Atachment Available !') }}</strong>
                            </label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Description') }}</td>
                        <td>{{$service->description}}</td>
                    </tr>
                    <tr>
                        <td>
                            Issues
                        </td>
                        <td>
                        @foreach($service->issues as $issue)
                        <li class="list-group-item"><a target="_blank" href="{{route('issues.show', $issue->id)}}">{{ $issue->summary }}</a></li>
                            @endforeach</td>
                        </td>
                    </tr>
                </table>
            </div>
       
    </div>
</div>
</div>
@endsection