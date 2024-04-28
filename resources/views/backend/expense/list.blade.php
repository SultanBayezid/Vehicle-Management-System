@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">Expense</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('expense.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">Accounting</li>
            <li class="breadcrumb-item active" aria-current="page">Transactions</li>
            <li class="breadcrumb-item active" aria-current="page">Expense</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-md-12">
        
          <div class="card-body">
          <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{ _lang('Date') }}</th>
                            <th>{{ _lang('Account') }}</th>
                            <th>{{ _lang('Expense Type') }}</th>
                            <th class="text-right">{{ _lang('Amount') }}</th>
                            <th>{{ _lang('Payee') }}</th>
                            <th>{{ _lang('Payment Method') }}</th>
                            <th class="action-col">{{ _lang('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->trans_date }}</td>
                <td>{{ $transaction->account->account_title }}</td>
                <td>{{ $transaction->expense_type->name}}</td>
                <td>{{ decimalPlace($transaction->amount, $currency) }}</td>
                <td>{{ $transaction->payee->contact_name ?? '' }}</td>
                <td>{{ $transaction->payment_method->name ?? '' }}</td>
    
                <td>
                    @if(isset($transaction->income_type->name))
                    <form action="{{ action('App\Http\Controllers\ExpenseController@destroy', $transaction->id) }}" class="text-center" method="post">
                    <div class="btn-group" role="group" aria-label="Basic example">           <a href="{{ action('App\Http\Controllers\ExpenseController@edit', $transaction->id) }}" data-title="{{ _lang('Update Income') }}" class="btn btn-warning btn-sm ajax-modal"><i class="fas fa-pen"></i></a>
                        <a href="{{ action('App\Http\Controllers\ExpenseController@show', $transaction->id) }}" data-title="{{ _lang('View Income') }}" class="btn btn-info btn-sm ajax-modal"><i class="fas fa-eye"></i></a>
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger btn-sm btn-remove" type="submit"><i class="fas fa-trash"></i></button>
                        </div>   </form>
                    @else
                    <form action="{{ action('App\Http\Controllers\ExpenseController@destroy', $transaction->id) }}" class="text-center" method="post">
                    <div class="btn-group" role="group" aria-label="Basic example">         <a href="#" data-title="{{ _lang('Update Income') }}" class="btn btn-warning btn-sm ajax-modal" disabled><i class="fas fa-pen"></i></a>
                        <a href="{{ action('App\Http\Controllers\ExpenseController@show', $transaction->id) }}" data-title="{{ _lang('View Income') }}" class="btn btn-info btn-sm ajax-modal"><i class="fas fa-eye"></i></a>
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger btn-sm btn-remove" type="submit"><i class="fas fa-trash"></i></button>
                        </div> </form>
                    @endif
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

