@extends('backend.layouts.header')

@section('content')
<div class="container">
      <h1 class="h3 mb-2 pt-3 text-gray-800">{{ ('Add Income/Expense Type') }}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item">Transactions</li>
                <li class="breadcrumb-item"><a href="{{ route('chart_of_accounts.index') }}">{{ ('Income/Expense Type') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ ('Add Income/Expense Type') }}</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
    <div class="card-body">
                <div class="col-md-12">
                    <form method="post" class="validate" autocomplete="off"
                        action="{{ route('chart_of_accounts.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ ('Name') }}</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ ('Type') }}</label>
                                    <select class="form-control" name="type" required>
                                        <option value="income">{{ ('Income') }}</option>
                                        <option value="expense">{{ ('Expense') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="ti-save"></i>
                                        {{ ('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection