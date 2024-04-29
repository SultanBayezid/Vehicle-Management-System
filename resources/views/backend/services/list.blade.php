@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Service')}}</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('services.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">{{ _lang('Vehicles')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('services.index')}}">{{ _lang('Service')}}</a></li>
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
                           
                                    <a href="{{ action('App\Http\Controllers\ServiceController@edit', Crypt::encrypt($service->id)) }}"
                                        data-title="{{ _lang('Update service') }}"
                                        class="btn btn-link"><i class="fas fa-pen"></i></a>
                                    <a href="{{ action('App\Http\Controllers\ServiceController@show', Crypt::encrypt($service->id)) }}"
                                        data-title="{{ _lang('View service') }}"
                                        class="btn btn-link"><i class="fas fa-eye"></i></a>
                          
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
