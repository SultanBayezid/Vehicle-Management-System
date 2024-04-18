@extends('backend.layouts.header')
@section('content')
<h4 class="page-title">{{ _lang('User Management') }}</h4>

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header d-flex align-items-center">
                <h4 class="header-title">{{ _lang('User List') }}</h4>
                <a class="btn btn-primary btn-sm ml-auto ajax-modal" data-title="{{ _lang('Create User') }}"
                    href="{{ route('users.create') }}"><i class="ti-plus"></i> {{ _lang('Add New') }}</a>
            </div>

            <div class="card-body">
                <table id="users_table" class="table data-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Email') }}</th>
                            <th>{{ _lang('User Type') }}</th>
                            <th>{{ _lang('Valid Until') }}</th>
                            <th>{{ _lang('Status') }}</th>
                            <th class="text-center">{{ _lang('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr data-id="row_{{ $user->id }}">
                            <td class='profile_picture text-center'><img
                                    src="{{ profile_picture($user->profile_picture) }}" class="thumb-sm img-thumbnail">
                            </td>
                            <td class='name'>{{ $user->name }}</td>
                            <td class='email'>{{ $user->email }}</td>
                            <td class='user_type'>{{ strtoupper($user->user_type) }}</td>
                            <td class='valid_to'>{{ $user->validUntil() }}</td>
                            <td class='status'>{!! xss_clean(user_status($user->status)) !!}</td>
                            <td class="text-center">
                              
                                
                                    <form action="{{ action('App\Http\Controllers\UserController@destroy', $user['id']) }}" method="post">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">

                                        <a href="{{ action('App\Http\Controllers\UserController@edit', $user['id']) }}"
                                                data-title="{{ _lang('Update User') }}"
                                                class="btn btn-warning btn-sm ajax-modal"><i class="fas fa-pencil-alt"></i>
                                                {{ _lang('Edit') }}</a>
                                         
                                            <a href="{{ action('App\Http\Controllers\UserController@show', $user['id']) }}"
                                                data-title="{{ _lang('View User') }}"
                                                class="btn btn-success btn-sm ajax-modal"><i class="fas fa-eye"></i>
                                                {{ _lang('View') }}</a>
                                            <button class="btn-remove btn btn-danger btn-sm" type="submit"><i
                                                    class="fas fa-trash"></i> {{ _lang('Delete') }}</button>
                                        
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