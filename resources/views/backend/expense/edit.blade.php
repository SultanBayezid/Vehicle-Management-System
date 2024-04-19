@extends('backend.layouts.header')

@section('content')
<div class="container">
      <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Update Expense') }}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item">Accounting</li>
                <li class="breadcrumb-item">{{ ('Transactions') }}</li>
                <li class="breadcrumb-item"><a href="{{route('expense.index')}}">Expense</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _lang('Update Expense') }}</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
    <div class="card-body">
                <form method="post" class="validate" autocomplete="off"
                    action="{{ action('App\Http\Controllers\ExpenseController@update', $id) }}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Date') }}</label>
                                <input type="date" class="form-control datepicker" name="trans_date"
                                    value="{{ $transaction->getRawOriginal('trans_date') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                             
                                <label class="control-label">{{ _lang('Account') }}</label>
                                <select class="form-control select2-ajax" data-value="id" data-display="account_title"
                                    data-table="accounts" data-where="1" name="account_id" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("accounts", "id", "account_title", $transaction->account_id) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              
                                <label class="control-label">{{ _lang('Expense Type') }}</label>
                                <select class="form-control select2-ajax" data-value="id" data-display="name"
                                    data-table="chart_of_accounts" data-where="4" name="chart_id" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("chart_of_accounts", "id", "name", $transaction->chart_id, ["type=" => "expense"]) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Amount')." ".currency() }}</label>
                                <input type="text" class="form-control float-field" name="amount"
                                    value="{{ $transaction->amount }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                             
                                <label class="control-label">{{ _lang('Payee') }}</label>
                                <select class="form-control select2-ajax" data-value="id" data-display="contact_name"
                                    data-table="contacts" data-where="1" name="payer_payee_id">
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("contacts", "id", "contact_name", $transaction->payer_payee_id) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            
                                <label class="control-label">{{ _lang('Payment Method') }}</label>
                                <select class="form-control select2-ajax" data-value="id" data-display="name"
                                    data-table="payment_methods" data-where="1" name="payment_method_id" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("payment_methods", "id", "name", $transaction->payment_method_id) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Reference') }}</label>
                                <input type="text" class="form-control" name="reference"
                                    value="{{ $transaction->reference }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Attachment') }}</label>
                                <input type="file" class="form-control trickycode-file"
                                    data-value="{{ $transaction->attachment}}" name="attachment">
                            </div>
                        </div>

                        <div class="col-md-12 clear">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Note') }}</label>
                                <textarea class="form-control" name="note">{{ $transaction->note }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="ti-save"></i>
                                    {{ _lang('Save Changes') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
</div>

@endsection