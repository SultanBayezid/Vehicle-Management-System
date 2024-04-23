@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Accounts') }} </h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('accounts.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item active"  aria-current="page">{{ _lang('Accounting') }} </li>
                <li class="breadcrumb-item active" aria-current="page">{{ _lang('Accounts') }}</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-md-12">

    

            <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{ _lang('Account Title') }}</th>
                            <th>{{ _lang('Opening Date') }}</th>
                            <th>{{ _lang('Account Number') }}</th>
                            <th class="text-right">{{ _lang('Opening Balance') }}</th>
                            <th class="action-col">{{ _lang('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $currency = currency(); @endphp
						@php $date_format = get_date_format(); @endphp
                        @foreach($accounts as $account)
                        <tr id="row_{{ $account->id }}">
                            <td class='account_title'>{{ $account->account_title }}</td>
                            <td class='opening_date'>{{ date("$date_format", strtotime($account->opening_date)) }}</td>
                            <td class='account_number'>{{ $account->account_number }}</td>
                            <td class='opening_balance text-right'>
                                {{ decimalPlace($account->opening_balance, $currency) }}</td>
                            <td class="text-center">
                                <form action="{{ action('App\Http\Controllers\AccountController@destroy', $account->id) }}" method="post">
                                    <a href="{{ action('App\Http\Controllers\AccountController@edit', $account->id) }}"
                                        data-title="{{ _lang('Update Account') }}"
                                        class="btn btn-warning btn-sm ajax-modal"><i class="fas fa-pen"></i></a>
                                    <a href="{{ action('App\Http\Controllers\AccountController@show', $account->id) }}"
                                        data-title="{{ _lang('View Account') }}"
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


@endsection