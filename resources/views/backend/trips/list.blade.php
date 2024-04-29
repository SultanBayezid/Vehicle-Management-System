@extends('backend.layouts.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Trips')}}</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('trips.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Trips')}}</li>
        </ol>
    </nav>



    <div class="card-body">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <th>{{ _lang('Date') }}</th>
                                        <th>{{ _lang('Customer') }}</th>
                                        <th>{{ _lang('Driver') }}</th>
                                        <th>{{ _lang('Vehicle') }}</th>
                                        <th>{{ _lang('Pickup Location') }}</th>
                                        <th>{{ _lang('Dropoff Location') }}</th>
                                        <th>{{ _lang('Fare') }}</th>
                                        <th>{{ _lang('Action') }}</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>{{ _lang('Date') }}</th>
                                        <th>{{ _lang('Customer') }}</th>
                                        <th>{{ _lang('Driver') }}</th>
                                        <th>{{ _lang('Vehicle') }}</th>
                                        <th>{{ _lang('Pickup Location') }}</th>
                                        <th>{{ _lang('Dropoff Location') }}</th>
                                        <th>{{ _lang('Fare') }}</th>
                                        <th>{{ _lang('Action') }}</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($trips as $trip)
                                        <tr>
                                            <td>{{$trip->trip_date }}</td>
                                            <td>{{$trip->customer->contact_name ?? '' }}</td>
                                            <td>{{$trip->driver->name ?? '' }}</td>
                                            <td>{{$trip->vehicle->brand->name }} {{$trip->vehicle->model->name }} {{$trip->vehicle->myear->year }}</td>
                                            <td>{{$trip->pickup_location }}</td>
                                            <td>{{$trip->dropoff_location }}</td>
                                            <td>{{$trip->fare_amount }}</td>
                                     
                                        <td>
                                        <div class="btn-group">
                                            <a href="{{ route('trips.show', $trip->id) }}" class="btn btn-link"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-link"><i class="fas fa-pen"></i></a>
                                  
                                            </div>
                                    
                                          </td>
                                        </tr>
                                        @endforeach
                                       
                             
                                    </tbody>
                                </table>
                                <div class="pagination justify-content-center">
                                    {{ $trips->links('vendor.pagination.bootstrap-5') }}
                                </div>
                                                            </div>
                    
                  
</div>
               



@endsection
