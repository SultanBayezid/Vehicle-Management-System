@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Contact List') }} </h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm mtop" data-title="{{ ('Add Income') }}"
                href="{{route('contacts.create')}}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{_lang('People')}}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Contact List') }}</li>
        </ol>
    </nav>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
           
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                   
                            <th>{{ _lang('Contact Name') }}</th>
                            <th>{{ _lang('Phone') }}</th>
                            <th>{{ _lang('Email') }}</th>
                            <th>{{ _lang('Address') }}</th>
                            <th class="text-center">{{ _lang('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                    
                      
                         <td> {{$contact->contact_name}}</td>
                         <td> {{$contact->contact_phone}}</td>
                         <td> {{$contact->contact_email}}</td>
                         <td> {{$contact->address}}</td>

                         <td class="text-center">
                       <div class="btn-group">
                       <a href="{{ action('App\Http\Controllers\ContactController@show', $contact->id) }}"
                                        data-title="{{ _lang('View contact') }}"
                                        class="btn btn-link"><i class="fas fa-eye"></i></a>
                                    <a href="{{ action('App\Http\Controllers\ContactController@edit', $contact->id) }}"
                                        data-title="{{ _lang('Update contact') }}"
                                        class="btn btn-primary btn-sm ajax-modal"><i class="fas fa-pen"></i></a>
                       </div>
                    
                          
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
     {{ $contacts->links('vendor.pagination.bootstrap-5') }}
</div>
            
        </div>
    </div>
</div>
</div>
@endsection

