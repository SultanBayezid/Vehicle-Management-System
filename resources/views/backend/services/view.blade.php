@extends('backend.layouts.header')

@section('content')
<div class="container">
        <h1 class="display-4">Service Details</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active"  aria-current="page">Accounts</li>
                <li class="breadcrumb-item active"  aria-current="page">Transactions</li>
                <li class="breadcrumb-item"><a href="{{route('services.index')}}">services</a></li>
                <li class="breadcrumb-item active" aria-current="page">service Details</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
      
     

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>{{ _lang('Vehicle') }}</td>
                        <td>{{$service->vehicle->name}}</td>
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
                        <td>{{$service->description}}</td>
                    </tr>
                    <tr>
                        <td>
                            Issues
                        </td>
                        <td>
                        @foreach($service->issues as $issue)
                                <li>{{ $issue->summary }} 
                                     @if ($issue->status == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($issue->status == 2)
                                        <span class="badge badge-info">Closed</span>
                                    @elseif ($issue->status == 3)
                                        <span class="badge badge-success">Resolved</span>
                                    @endif </li>
                            @endforeach</td>
                        </td>
                    </tr>
                </table>
            </div>
       
    </div>
</div>
</div>
@endsection