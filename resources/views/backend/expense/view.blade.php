@extends('backend.layouts.header')

@section('content')
<div class="container">
        <h1 class="display-4">{{ _lang('View Expense') }}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">Accounting</li>
                <li class="breadcrumb-item">{{ ('Transactions') }}</li>
                <li class="breadcrumb-item"><a href="{{route('expense.index')}}">Expense</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _lang('View Expense') }}</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
    <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>{{ _lang('Trans Date') }}</td>
                        <td>{{ $transaction->trans_date }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Account') }}</td>
                        <td>{{ $transaction->account->account_title }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Expense Type') }}</td>
                        <td>{{ isset($transaction->expense_type->name) ? $transaction->expense_type->name : _lang('Transfer') }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Amount') }}</td>
                        <td>{{ decimalPlace($transaction->amount, currency()) }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Payee') }}</td>
                        <td>{{ $transaction->payee->contact_name }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Payment Method') }}</td>
                        <td>{{ $transaction->payment_method->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Reference') }}</td>
                        <td>{{ $transaction->reference }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Attachment') }}</td>
                        <td>
                            @if($transaction->attachment != "")
                            <a href="{{ asset('uploads/transactions/'.$transaction->attachment) }}"
                                target="_blank" class="btn btn-primary btn-sm">{{ _lang('View Attachment') }}</a>
                            @else
                            <label class="label label-warning">
                                <strong>{{ _lang('No Atachment Available !') }}</strong>
                            </label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Note') }}</td>
                        <td>{{ $transaction->note }}</td>
                    </tr>
                </table>
            </div>
    </div>
</div>
@endsection