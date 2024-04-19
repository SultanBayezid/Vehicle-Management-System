@extends('backend.layouts.header')

@section('content')
<div class="container">
      <h1 class="h3 mb-2 pt-3 text-gray-800">Fuel  Details</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item"><a href="{{route('services.index')}}">Fuel</a></li>
                <li class="breadcrumb-item"><a href="{{route('vehicles.show', $fuel->vehicle_id)}}">{{$fuel->vehicle->brand->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fuel Details</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
      
     

            <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tr>
                        <td>{{ _lang('Date') }}</td>
                        <td>{{$fuel->date}}</td>
                    </tr>        
            
            <tr>
                        <td>{{ _lang('Vehicle') }}</td>
                        <td>{{$fuel->vehicle->brand->name}} {{$fuel->vehicle->model->name}} {{$fuel->vehicle->myear->year}}</td>
                    </tr>
     
                    <tr>
                        <td>{{ _lang('Odometer') }}</td>
                    
                        <td>{{$fuel->odometer}}</td>
                    </tr>

                    <tr>
                        <td>{{ _lang('Quantity') }}</td>
                    
                        <td>{{$fuel->qty}}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Reference') }}</td>
                    
                        <td>{{$fuel->reference}}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Attachement') }}</td>
                        <td>
                            @if($fuel->attachment != "")
                            <a href="{{ asset('uploads/fuel/'.$fuel->attachment) }}"
                                target="_blank" class="btn btn-primary btn-sm">{{ _lang('View Attachment') }}</a>
                            @else
                            <label class="label label-warning">
                                <strong>{{ _lang('No Atachment Available !') }}</strong>
                            </label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Note') }}</td>
                        <td>{{$fuel->note}}</td>
                    </tr>
                
                    </tr>
                </table>
            </div>
       
    </div>
</div>
</div>
@endsection