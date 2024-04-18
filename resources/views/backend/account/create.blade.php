@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">{{ _lang('Create New Account') }}</h1>
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
            <li class="breadcrumb-item"><a href="{{route('accounts.index')}}">Accounts</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Create New Account') }}</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-md-12">
   
         

            <div class="card-body">

            <form method="post" class="validate" autocomplete="off" action="{{ route('accounts.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Account Title') }}</label>
                <input type="text" class="form-control" name="account_title" value="{{ old('account_title') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Opening Date') }}</label>
                <input type="date" class="form-control datepicker" name="opening_date" value="{{ old('opening_date') }}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Account Number') }}</label>
                <input type="text" class="form-control" name="account_number" value="{{ old('account_number') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Opening Balance')." ".currency() }}</label>
                <input type="text" class="form-control float-field" name="opening_balance" value="{{ old('opening_balance') }}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">{{ _lang('Note') }}</label>
                <textarea class="form-control" name="note">{{ old('note') }}</textarea>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-lgbtn-sm"><i class="fas fa-file"></i> {{ _lang('Save Changes') }}</button>
        </div>
    </div>
</form>

            </div>
        </div>
    </div>
</div>

@endsection