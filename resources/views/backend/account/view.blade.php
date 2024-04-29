@extends('backend.layouts.header')

@section('content')
<div class="container">
      <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Account Details') }}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item active"  aria-current="page">{{ _lang('Accounting') }} </li>
                <li class="breadcrumb-item"><a href="{{route('accounts.index')}}"> {{ _lang('Accounts') }} </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _lang('Account Details') }}</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
    <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>{{ _lang('Account Title') }}</td>
                        <td>{{ $account->account_title }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Opening Date') }}</td>
                        <td>{{ $account->opening_date }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Account Number') }}</td>
                        <td>{{ $account->account_number }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Opening Balance') }}</td>
                        <td>{{ decimalPlace($account->opening_balance, currency()) }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Note') }}</td>
                        <td>{{ $account->note }}</td>
                    </tr>
                </table>
            </div>
            <form action="{{ action('App\Http\Controllers\AccountController@destroy', $account->id) }}" method="post">
            {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm btn-remove"
                                        type="submit"><i class="fas fa-trash"></i> Delete</button>
                                </form>
    </div>
</div>
</div>
@endsection