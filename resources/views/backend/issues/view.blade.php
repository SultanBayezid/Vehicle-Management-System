@extends('backend.layouts.header')

@section('content')
<div class="container">
        <h1 class="display-4">Issue Details</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"  aria-current="page">Accounts</li>
                <li class="breadcrumb-item active"  aria-current="page">Transactions</li>
                <li class="breadcrumb-item"><a href="{{route('issues.index')}}">Issues</a></li>
                <li class="breadcrumb-item active" aria-current="page">Issue Details</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
      
     

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>{{ _lang('Vehicle') }}</td>
                        <td>{{$issue->vehicle->name}}</td>
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
                                target="_blank" class="btn btn-primary">{{ _lang('View Attachment') }}</a>
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
            </div>
       
    </div>
</div>
</div>
@endsection