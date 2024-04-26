@extends('backend.layouts.header')

@section('content')
<div class="container">
<div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Contact List') }}</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm mtop" data-title="{{ _lang('Add Contact Group') }}"
                href="{{ route('contact_groups.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('People')}}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Contact List') }}</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-lg-12">
  
    
            <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>{{ _lang('Group') }}</th>
                            <th>{{ _lang('Note') }}</th>
                            <th class="text-center">{{ _lang('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactgroups as $contactgroup)
                        <tr id="row_{{ $contactgroup->id }}">
                            <td class='group'>{{ $contactgroup->name }}</td>
                            <td class='note'>{{ $contactgroup->note }}</td>
                            <td class="text-center">
                                <form action="{{route('contact_groups.destroy', $contactgroup['id'])}}"
                                    method="post">
                                    <a href="{{route('contact_groups.edit', $contactgroup['id'])}}"
                                        data-title="{{ _lang('Update Contact Group') }}"
                                        class="btn btn-link "><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{route('contact_groups.show', $contactgroup['id'])}}"
                                        data-title="{{ _lang('View Contact Group') }}"
                                        class="btn btn-link "><i class="fas fa-eye"></i></a>
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-link btn-sm btn-remove"
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

@endsection