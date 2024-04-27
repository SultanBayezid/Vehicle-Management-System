@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">Drivers</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm mtop" data-title="{{ ('Add Income') }}"
                href="{{ route('drivers.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('People')}}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Drivers')}}</li>
        </ol>
    </nav>
    <div class="card"> <div class="card-body">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ _lang('Name') }}</th>
                                        <th>{{ _lang('License Number') }}</th>
                                        <th>{{ _lang('License Expiry Date') }}</th>
                                        <th>{{ _lang('Phone Number') }}</th>
                                        <th>{{ _lang('Blood Group') }}:</th>
                                        <th>{{ _lang('Action') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>{{ _lang('Name') }}</th>
                                        <th>{{ _lang('License Number') }}</th>
                                        <th>{{ _lang('License Expiry Date') }}</th>
                                        <th>{{ _lang('Phone Number') }}</th>
                                        <th>{{ _lang('Blood Group') }}:</th>
                                        <th>{{ _lang('Action') }}</th>
                                    </tr>
                                </tfoot>

                                    <tbody>
                                        @foreach($drivers as $driver)
                                        <tr>
                                            <td>{{$driver->driver_name }}</td>
                                            <td>{{$driver->license_number }}</td>
                                            <td>{{$driver->license_expiry_date }}</td>
                                            <td>{{$driver->driver_phone_number }}</td>
                                            <td>{{$driver->blood_group }}</td>
                                     
                                            <td>
                <a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-link"> <i class="fas fa-eye"></i></a>
                <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-link"> <i class="fas fa-pen"></i></a>
          
            </td>
                                        </tr>
                                        @endforeach
                                       
                             
                                    </tbody>
                                </table>
                                <div class="pagination justify-content-center">
                                    {{ $drivers->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                        </div>
            



@endsection
