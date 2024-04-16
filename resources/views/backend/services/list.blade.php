@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Services</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('services.create') }}">
                <i class="fas fa-plus"></i> {{ ('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">Vehicles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
        </ol>
    </nav>

        <div class="card-body">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{ _lang('Vehicle') }}</th>
                            <th>{{ _lang('Completed') }}</th>
                            <th>{{ _lang('Meter') }}</th>
                            <th>{{ _lang('Issues') }}</th>
                            <th class="action-col">{{ _lang('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
          
                        @foreach($services as $service)
                        <tr >
                            <td >{{ $service->vehicle->brand->name ?? '' }} {{ $service->vehicle->model->name ?? '' }} {{ $service->vehicle->myear->year ?? '' }}</td>
                            <td >{{ $service->completed_date }}</td>
                            <td >{{ $service->odometer }}</td>
                            <td >
                            @foreach($service->issues as $issue)
                            <li class="list-group-item"><a target="_blank" href="{{route('issues.show', $issue->id)}}">{{ $issue->summary }}</a></li>
                            @endforeach</td>
                        
                            <td class="text-center">
                                <form action="{{ action('App\Http\Controllers\ServiceController@destroy', $service->id) }}" method="post">
                                    <a href="{{ action('App\Http\Controllers\ServiceController@edit', $service->id) }}"
                                        data-title="{{ _lang('Update service') }}"
                                        class="btn btn-warning btn-sm ajax-modal"><i class="fas fa-pen"></i></a>
                                    <a href="{{ action('App\Http\Controllers\ServiceController@show', $service->id) }}"
                                        data-title="{{ _lang('View service') }}"
                                        class="btn btn-primary btn-sm ajax-modal"><i class="fas fa-eye"></i></a>
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm btn-remove"
                                        type="submit" onclick="return confirm('Are you sure you want to delete this Service?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
     {{ $services->links('vendor.pagination.bootstrap-5') }}
</div>
                            </div>
                 
 </div>



@endsection
