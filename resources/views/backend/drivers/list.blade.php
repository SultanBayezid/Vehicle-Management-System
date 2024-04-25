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
            <li class="breadcrumb-item active" aria-current="page">People</li>
            <li class="breadcrumb-item active" aria-current="page">Drivers</li>
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
                                            <td>{{$driver->name }}</td>
                                            <td>{{$driver->license_number }}</td>
                                            <td>{{$driver->license_expiry_date }}</td>
                                            <td>{{$driver->driver_phone_number }}</td>
                                            <td>{{$driver->blood_group }}</td>
                                     
                                            <td>
                <a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('drivers.destroy', $driver->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Driver?')">Delete</button>
                </form>
            </td>
                                        </tr>
                                        @endforeach
                                       
                             
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
            



@endsection
