@extends('backend.layouts.header')

@section('content')
<div class="container">
      <h1 class="h3 mb-2 pt-3 text-gray-800">Income Create</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item active"  aria-current="page">Accounts</li>
                <li class="breadcrumb-item active"  aria-current="page">Transactions</li>
                <li class="breadcrumb-item"><a href="{{route('income.index')}}">Income/Deposit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Income Create</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
      
      

            <div class="card-body">
                <form method="post" class="validate" autocomplete="off" action="{{ route('income.store') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ ('Date') }}</label>
            <input type="date" class="form-control datepicker" name="trans_date" value="{{ old('trans_date') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ ('Account') }}</label>
            <select class="form-control select2-ajax" data-value="id" data-display="account_title" data-table="accounts" data-where="1" name="account_id" id="account_id" required>
                <option value="">{{ ('Select One') }}</option>
                {{ create_option("accounts","id","account_title",old('account_id'),array("company_id=" => company_id())) }}
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ ('Income Type') }}</label>
            <select class="form-control select2-ajax" data-value="id" data-display="name" data-table="chart_of_accounts" data-where="3" name="chart_id" required>
                <option value="">{{ ('Select One') }}</option>
                {{ create_option("chart_of_accounts","id","name",old('chart_id'),array("type="=>"income","AND company_id="=>company_id())) }}
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ ('Amount')." ".currency() }}</label>
            <input type="text" class="form-control float-field" name="amount" value="{{ old('amount') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ ('Payer') }}</label>
            <select class="form-control select2-ajax" data-value="id" data-display="contact_name" data-table="contacts" data-where="1" name="payer_payee_id">
                <option value="">{{ ('Select One') }}</option>
                {{ create_option("contacts","id","contact_name",old('payer_payee_id'),array("company_id="=>company_id())) }}
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ ('Payment Method') }}</label>
            <select class="form-control select2-ajax" data-value="id" data-display="name" data-table="payment_methods" data-where="1" name="payment_method_id" required>
                <option value="">{{ ('Select One') }}</option>
                {{ create_option("payment_methods","id","name",old('payment_method_id'),array("company_id="=>company_id())) }}
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ ('Reference') }}</label>
            <input type="text" class="form-control" name="reference" value="{{ old('reference') }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ ('Attachment') }}</label>
            <input type="file" class="form-control trickycode-file" name="attachment">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">{{ ('Note') }}</label>
            <textarea class="form-control" name="note">{{ old('note') }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-file"></i> {{ ('Save Changes') }}</button>
        </div>
    </div>
</div>

                </form>
            </div>
       
    </div>
</div>
</div>
@endsection