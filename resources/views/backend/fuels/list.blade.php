@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Fuel History') }}</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('fuels.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">{{ _lang('Vehicles') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Fuel History') }}</li>
        </ol>
    </nav>

        <div class="card-body">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{ _lang('Date') }}</th>
                            <th>{{ _lang('Vehicle') }}</th>
                            <th>{{ _lang('Qty') }}</th>
                            <th>{{ _lang('Odometer')}}</th>
                            <th>{{ _lang('Refference') }}</th>
                            <th class="action-col">{{ _lang('Action') }}</th>
                    
                    </thead>
                    <tbody>
          
                        @foreach($fuels as $fuel)
                        <tr >
                          
                            <td>{{$fuel->date }}</td>
                            <td >{{ $fuel->vehicle->brand->name ?? '' }} {{ $fuel->vehicle->model->name ?? '' }} {{ $fuel->vehicle->myear->year ?? '' }}</td>
                            <td>{{$fuel->qty }}</td>
                            <td>{{$fuel->odometer }}</td>
                             <td>{{$fuel->reference }}</td>
                          
                        
                            <td class="text-center">
                                <form action="{{ action('App\Http\Controllers\FuelController@destroy', $fuel->id) }}" method="post">
                                    <a href="{{ action('App\Http\Controllers\FuelController@edit', $fuel->id) }}"
                                        data-title="{{ _lang('Update service') }}"
                                        class="btn btn-warning btn-sm ajax-modal"><i class="fas fa-pen"></i></a>
                                    <a href="{{ action('App\Http\Controllers\FuelController@show', $fuel->id) }}"
                                        data-title="{{ _lang('View service') }}"
                                        class="btn btn-primary btn-sm ajax-modal"><i class="fas fa-eye"></i></a>
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm btn-remove"
                                        type="submit" onclick="return confirm('Are you sure you want to delete this Fuel History?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
     {{ $fuels->links('vendor.pagination.bootstrap-5') }}
</div>
                            </div>
                 
 </div>



 

@endsection
