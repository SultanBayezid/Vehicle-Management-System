@extends('backend.layouts.header')

@section('content')
<div class="container">
        <h1 class="display-4">{{ _lang('Add New Transfer') }}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Transactions</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _lang('Add New Transfer') }}</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
    <div class="card-body">
                <form method="post" class="validate" autocomplete="off" action="{{ route('transfer.store') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Account From') }}</label>
                                <select class="form-control select2" name="account_from" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("accounts", "id", "account_title", old('account_from')) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Account To') }}</label>
                                <select class="form-control select2" name="account_to" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("accounts", "id", "account_title", old('account_to')) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Date') }}</label>
                                <input type="date" class="form-control datepicker" name="trans_date"
                                    value="{{ old('trans_date') }}" required>
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
                                <label class="control-label">{{ _lang('Payment Method') }}</label>
                                <select class="form-control select2" name="payment_method_id" required>
                                    <option value="">{{ _lang('Select One') }}</option>
                                    {{ create_option("payment_methods", "id", "name", old('payment_method_id')) }}

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Reference') }}</label>
                                <input type="text" class="form-control" name="reference" value="{{ old('reference') }}">
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
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-file"></i>
                                    {{ _lang('Make Transfer') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
</div>
@endsection