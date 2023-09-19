@extends('backend.layouts.header')

@section('content')
<div class="container">
        <h1 class="display-4">{{ ('Update Income/Expense Type') }}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('chart_of_accounts.index')}}">Income|Deposit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Income</li>
            </ol>
        </nav>
<div class="row">
    <div class="col-md-12">
    <div class="card-body">
                <div class="col-md-6">
                    <form method="post" class="validate" autocomplete="off"
                        action="{{ action('App\Http\Controllers\ChartOfAccountController@update', $chartofaccount) }}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ ('Name') }}</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $chartofaccount->name }}" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ ('Type') }}</label>
                                    <select class="form-control auto-select" data-selected="{{ $chartofaccount->type }}"
                                        name="type" id="type" required>
                                        <option value="income">{{ ('Income') }}</option>
                                        <option value="expense">{{ ('Expense') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-file"></i>
                                        {{ ('Update') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
</div>
@endsection