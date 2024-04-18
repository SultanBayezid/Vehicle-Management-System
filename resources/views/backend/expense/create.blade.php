@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Expense Create</h1>
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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Accounting</li>
            <li class="breadcrumb-item active" aria-current="page">Transactions</li>
            <li class="breadcrumb-item"><a href="{{route('expense.index')}}">Expense </a></li>
            <li class="breadcrumb-item active" aria-current="page">Expense Create</li>

        </ol>
    </nav>
<div class="row">
    <div class="col-md-12">
    <div class="card-body">
                <form method="post" class="validate" autocomplete="off" action="{{ route('expense.store') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Date') }}</label>
                                <input type="date" class="form-control datepicker" name="trans_date"
                                    value="{{ old('trans_date') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                           
                                <label class="control-label">{{ _lang('Account') }}</label>
                                <select class="form-control select2-ajax" data-value="id" data-display="account_title"
                                    data-table="accounts" data-where="1" name="account_id" id="account_id" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("accounts","id","account_title",old('account_id'),array("company_id="=>company_id())) }}

                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                               
                                <label class="control-label">{{ _lang('Expense Type') }}</label>
                                <select class="form-control select2-ajax" data-value="id" data-display="name"
                                    data-table="chart_of_accounts" data-where="4" name="chart_id" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("chart_of_accounts","id","name",old('chart_id'),array("type="=>"expense","AND company_id="=>company_id())) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Amount')." ".currency() }}</label>
                                <input type="text" class="form-control float-field" name="amount"
                                    value="{{ old('amount') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              
                                <label class="control-label">{{ _lang('Payee') }}</label>
                                <select class="form-control select2-ajax" data-value="id" data-display="contact_name"
                                    data-table="contacts" data-where="1" name="payer_payee_id">
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("contacts","id","contact_name",old('payer_payee_id'),array("company_id="=>company_id())) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                             
                                <label class="control-label">{{ _lang('Payment Method') }}</label>
                                <select class="form-control select2-ajax" data-value="id" data-display="name"
                                    data-table="payment_methods" data-where="1" name="payment_method_id" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("payment_methods","id","name",old('payment_method_id'),array("company_id="=>company_id())) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Reference') }}</label>
                                <input type="text" class="form-control" name="reference" value="{{ old('reference') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Attachment') }}</label>
                                <input type="file" class="form-control trickycode-file" name="attachment">
                            </div>
                        </div>

                        <div class="col-md-12 clear">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Note') }}</label>
                                <textarea class="form-control" name="note">{{ old('note') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="ti-save"></i>
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