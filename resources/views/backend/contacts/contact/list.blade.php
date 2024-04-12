@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">{{ _lang('Contact List') }}</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm mtop" data-title="{{ ('Add Income') }}"
                href="{{route('contacts.create')}}">
                <i class="fas fa-plus"></i> {{ ('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">People</li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Contact List') }}</li>
        </ol>
    </nav>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <table id="datatablesSimple">
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
                                <form action="{{ action('App\Http\Controllers\ContactController@destroy', $contact->id) }}" method="post">
                                    <a href="{{ action('App\Http\Controllers\ContactController@edit', $contact->id) }}"
                                        data-title="{{ _lang('Update contact') }}"
                                        class="btn btn-warning btn-sm ajax-modal"><i class="fas fa-pen"></i></a>
                                    <a href="{{ action('App\Http\Controllers\ContactController@show', $contact->id) }}"
                                        data-title="{{ _lang('View contact') }}"
                                        class="btn btn-primary btn-sm ajax-modal"><i class="fas fa-eye"></i></a>
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm btn-remove"
                                        type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

