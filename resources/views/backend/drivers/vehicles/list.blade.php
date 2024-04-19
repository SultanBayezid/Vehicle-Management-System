@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Vehicles') }} </h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('vehicles.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Vehicles') }}</li>
        </ol>
    </nav>

        <div class="card-body">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <th width="100%">{{_lang('Brand')}} {{_lang('Model')}} {{_lang('Manufacture Year')}}</th>
                                 

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th width="100%">{{_lang('Brand')}} {{_lang('Model')}} {{_lang('Manufacture Year')}}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($vehicles as $vehicle)
                                        <tr>
                                            <td>{{$vehicle->brand->name ?? '' }} {{$vehicle->model->name ?? '' }} {{$vehicle->myear->year ?? '' }}</td>
                                       
            
                                         

                                        </tr>
                                        @endforeach
                                       
                             
                                    </tbody>
                                </table>
                                
                            </div>
                 
 </div>



@endsection
