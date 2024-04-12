@extends('backend.layouts.header')

@section('content')
<div class="container">
        <h1 class="display-4">{{$vehicle->name}}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">Vehicles</a></li>
                <li class="breadcrumb-item "  aria-current="page">{{$vehicle->name}}</li>
                <li class="breadcrumb-item active">{{ _lang('Overview') }}</li>

            </ol>
        </nav>
      <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-2 col-sm-4 borderright">
            @include('backend.vehicles.menu')
            </div>

            <div class="col-md-10 col-sm-8">
            
            <h1 class="display-6">Overview</h1>

                        <div class="tab-content">

                            <div id="general-info" class="tab-pane active">
                            <table id="datatablesSimple">
                            <tr>
                                <td>{{ _lang('Name') }}</td>
                                <td>{{$vehicle->name}}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Make') }}</td>
                                <td>{{$vehicle->make}}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Model') }}</td>
                                <td>{{$vehicle->model}}</td>
                            
                            </tr>
                            <tr>
                                <td>{{ _lang('Year') }}</td>
                                <td>{{$vehicle->year}}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Color') }}</td>
                                <td>{{$vehicle->color}}</td>
                            </tr>

                            <tr>
                                <td>{{ _lang('License Plate') }}</td>
                                <td>{{$vehicle->license_plate}}</td>
                            </tr>
                            </tr>
                            <tr>
                                <td>{{ _lang('Seating Capacity') }}</td>
                                <td>{{$vehicle->seating_capacity}}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Weight') }}</td>
                                <td>{{$vehicle->weight}}</td>
                            </tr>
                            </tr>
                            <tr>
                                <td>{{ _lang('Engine Number') }}</td>
                                <td>{{$vehicle->engine_number}}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Chassis Number') }}</td>
                                <td>{{$vehicle->chassis_number}}</td>
                            </tr>
                            </tr>
                            <tr>
                                <td>{{ _lang('Horsepower') }}</td>
                                <td>{{$vehicle->horsepower}}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Purchase Date') }}</td>
                                <td>{{$vehicle->purchase_date}}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Assigned Driver') }}</td>
                                <td>{{$vehicle->driver->name ?? ''}}</td>
                            </tr>
                            </tr>
            
                    
                
                        </table>
                      

                        </div>
                        <!--End TAB-->
                    </div>
            
            </div>
       </div>
        </div>
      </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

@endsection