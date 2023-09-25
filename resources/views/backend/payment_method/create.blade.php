@extends('backend.layouts.header')

@section('content')
<div class="container">
        <h1 class="display-4">{{ _lang('Add Payment Method') }}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">Accounting</li>
                <li class="breadcrumb-item">{{ ('Transactions') }}</li>
                <li class="breadcrumb-item"><a href="{{route('expense.index')}}">Expense</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _lang('Add Payment Method') }}</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="col-md-6">
                    <form method="post" class="validate" autocomplete="off"
                        action="{{ route('payment_methods.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                    {{ _lang('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection