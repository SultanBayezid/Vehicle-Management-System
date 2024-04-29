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
                                        <th>{{_lang('Brand')}}</th>
                                        <th>{{_lang('Model')}}</th>
                                        <th>{{_lang('Manufacture Year')}}</th>
                                        <th>{{_lang('Status')}}</th>
                                        <th width="12%">{{_lang('Action')}}</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>{{_lang('Brand')}}</th>
                                        <th>{{_lang('Model')}}</th>
                                        <th>{{_lang('Manufacture Year')}}</th>
                                        <th>{{_lang('Status')}}</th>
                                        <th width="12%">{{_lang('Action')}}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($vehicles as $vehicle)
                                        <tr>
                                            <td>{{$vehicle->brand->name ?? '' }}</td>
                                            <td>{{$vehicle->model->name ?? '' }}</td>
            
                                            <td>{{$vehicle->myear->year ?? '' }}</td>
                                            <td>
                                                @if($vehicle->status == 0)
                                                    <span class="badge badge-secondary">Inactive</span>
                                                @else
                                                    <span class="badge badge-success">Active</span>
                                                @endif
                                            </td>
                                       
                                            <td>
                                            <div class="btn-group" > 
                <a href="{{ route('vehicles.show', Crypt::encrypt($vehicle->id)) }}" class="btn btn-link "><i class="fas fa-eye"></i></a>
                <a href="{{ route('vehicles.edit', Crypt::encrypt($vehicle->id)) }}" class="btn btn-link "><i class="fas fa-pen"></i></a>
            </div>
                
            </td>
                                        </tr>
                                        @endforeach
                                       
                             
                                    </tbody>
                                </table>
                                <div class="pagination justify-content-center">
                                    {{ $vehicles->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                 
 </div>



@endsection
