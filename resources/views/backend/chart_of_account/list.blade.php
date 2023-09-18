@extends('backend.layouts.header')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Drivers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Drivers</li>
                            <li  class="breadcrumb-item">
                            <a href="{{ route('drivers.create') }}" class="btn btn-primary">Create New Driver</a>

                            </li>
                        </ol>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
				<h4 class="header-title">{{ ('Income and Expense Types') }}</h4>
                <a class="btn btn-primary btn-sm ml-auto ajax-modal"
                    data-title="{{ ('Add Income/Expense Type') }}"
                    href="{{ route('chart_of_accounts.create') }}"><i class="ti-plus"></i> {{ ('Add New') }}</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>{{ ('Name') }}</th>
                            <th>{{ ('Type') }}</th>
                            <th class="action-col">{{ ('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chartofaccounts as $chartofaccount)
                        <tr id="row_{{ $chartofaccount->id }}">
                            <td class='name'>{{ $chartofaccount->name }}</td>
                            <td class='type'>{{ (ucwords($chartofaccount->type)) }}</td>
                            <td class="text-center">
                                <form action="{{action('App\Http\Controllers\ChartOfAccountController@destroy', $chartofaccount['id'])}}"
                                    method="post">
                                    <a href="{{action('App\Http\Controllers\ChartOfAccountController@edit', $chartofaccount['id'])}}"
                                        data-title="{{ ('Update Income/Expense Type') }}"
                                        class="btn btn-warning btn-sm ajax-modal"><i class="ti-pencil-alt"></i></a>
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm btn-remove"
                                        type="submit"><i class="ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection