@extends('backend.layouts.header')

@section('content')
<div class="container">
      <h1 class="h3 mb-2 pt-3 text-gray-800">Issue Details</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">Vehicles</a></li>
                <li class="breadcrumb-item"><a href="{{route('issues.index')}}">Issues</a></li>
                <li class="breadcrumb-item"><a href="{{route('vehicles.show', $issue->vehicle_id)}}">{{$issue->vehicle->brand->name}} {{$issue->vehicle->model->name}} {{$issue->vehicle->myear->year}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Issue Details</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
      
     

            <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <tr>
                        <td>{{ _lang('Vehicle') }}</td>
                        <td>{{$issue->vehicle->brand->name ?? '' }} {{$issue->vehicle->model->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Assignee') }}</td>
                        <td>{{$issue->driver->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Summary') }}</td>
                    
                        <td>{{$issue->summary}}</td>
                    </tr>

                    <tr>
                        <td>{{ _lang('Priority') }}</td>
                        <td>{{$issue->priority}}</td>

                      
                    </tr>
                    <tr>
                        <td>{{ _lang('Due Dat') }}</td>
                        <td>{{$issue->due_date}}</td>

                       
                    </tr>
                    <tr>
                        <td>{{ _lang('Reported Date') }}</td>
                        <td>{{$issue->report_date}}</td>

                       
                    </tr>
                    <tr>
                        <td>{{ _lang('Documents') }}</td>
                        <td>
                            @if($issue->image != "")
                            <a href="{{ asset('uploads/issue/'.$issue->image) }}"
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
                        <td>{{$issue->description}}</td>
                    </tr>
                </table>

                <form method="POST" action="{{ route('issues.destroy', $issue->id) }}" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{_lang('Are you sure you want to delete this vehicle?')}}')"><i class="fas fa-trash"></i> {{ _lang('Delete')}}</button>

                    </div> </form>
            </div>
       
    </div>
</div>
</div>
@endsection