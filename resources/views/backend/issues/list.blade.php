@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Issues')}}</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('issues.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">{{ _lang('Vehicles')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Issues')}}</li>
        </ol>
    </nav>

        <div class="card-body">
                                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <th>{{_lang('Priority')}}</th>
                                        <th>{{_lang('Vehicle')}}</th>
                                        <th>{{_lang('Driver')}}</th>
                                        <th>{{_lang('Summary')}}</th>
                                        <th>{{_lang('Reported Date')}}</th>
                                        <th>{{_lang('Status')}}</th>
                                        <th>{{_lang('Action')}}</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                    <th>{{_lang('Priority')}}</th>
                                    <th>{{_lang('Vehicle')}}</th>
                                    <th>{{_lang('Driver')}}</th>
                                    <th>{{_lang('Summary')}}</th>
                                    <th>{{_lang('Reported Date')}}</th>
                                    <th>{{_lang('Status')}}</th>
                                    <th>{{_lang('Action')}}</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($issues as $issue)
                                        <tr>
                                            <td>{{$issue->priority }}</td>
                                            <td><a href="{{ route('vehicles.show', Crypt::encrypt($issue->vehicle_id)) }}">{{$issue->vehicle->brand->name ?? '' }} {{$issue->vehicle->model->name ?? '' }} {{$issue->vehicle->myear->year ?? '' }}</a></td>
                                            <td>{{$issue->driver->name }}</td>
                                            <td>{{$issue->summary }}</td>
                                            <td>{{$issue->report_date }}</td>
                                            <td>@if ($issue->status == 1)
                                                    <div class="badge badge-danger">Pending</div> 
                                                @elseif ($issue->status == 2)
                                                <div class="badge badge-warning">Closed</div> 
                                                @elseif ($issue->status == 3)
                                                <div class="badge badge-success">Resolved</div> 
                                                @else
                                                    Status: Unknown
                                                @endif</td>
                                            <td>
                                            <div class="btn-group" role="group" aria-label="Basic example"> 
                <a href="{{ route('issues.show', $issue->id) }}" class="btn btn-link"><i class="fas fa-eye"></i></a>
                <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-link"><i class="fas fa-pen"></i></a>
          
            </td>
                                        </tr>
                                        @endforeach
                                       
                             
                                    </tbody>
                                </table>
                                <div class="pagination justify-content-center">
     {{ $issues->links('vendor.pagination.bootstrap-5') }}
</div>
                            </div>
                 
 </div>



@endsection
