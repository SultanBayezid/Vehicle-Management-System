@extends('backend.layouts.header')

@section('content')
<div class="container">
        <h1 class="display-4">Income Details</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"  aria-current="page">Accounts</li>
                <li class="breadcrumb-item active"  aria-current="page">Transactions</li>
                <li class="breadcrumb-item"><a href="{{route('income.index')}}">Income/Deposit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Income Details</li>
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
                        <td>{{ _lang('Income Type') }}</td>
                        <td>{{ isset($transaction->income_type->name) ? $transaction->income_type->name : _lang('Transfer') }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Amount') }}</td>
                        <td>{{ decimalPlace($transaction->amount, currency()) }}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Payer') }}</td>
                        <td>{{ $transaction->payer->contact_name }}</td>
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
                                target="_blank" class="btn btn-primary">{{ _lang('View Attachment') }}</a>
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
</div>
@endsection