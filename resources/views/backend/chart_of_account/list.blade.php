@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">{{ ('Income and Expense Types') }}</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm" data-title="{{ ('Add Income') }}"
                href="{{ route('chart_of_accounts.create') }}">
                <i class="fas fa-plus"></i> {{ ('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Accounting</li>
            <li class="breadcrumb-item active" aria-current="page">Accounts</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-md-12">
            <div class="card-body">
            <table id="datatablesSimple" width="100%">
                    <thead>
                        <tr>
                            <th>{{ ('Name') }}</th>
                            <th>{{ ('Type') }}</th>
                            <th class="action-col"  width="5%">{{ ('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chartofaccounts as $chartofaccount)
                        <tr id="row_{{ $chartofaccount->id }}">
                            <td class='name'>{{ $chartofaccount->name }}</td>
                            <td class='type'>{{ (ucwords($chartofaccount->type)) }}</td>
                            <td class="text-center" width="5% !important">
                                <form action="{{action('App\Http\Controllers\ChartOfAccountController@destroy', $chartofaccount['id'])}}"
                                    method="post">
                                    <div class="btn-group" role="group" aria-label="Basic example">  
                                    <a href="{{action('App\Http\Controllers\ChartOfAccountController@edit', $chartofaccount['id'])}}"
                                        data-title="{{ ('Update Income/Expense Type') }}"
                                        class="btn btn-warning btn-sm ajax-modal"><i class="fas fa-pen"></i></a>
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm btn-remove"
                                        type="submit"><i class="fas fa-trash"></i></button>
                                        </div>  </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection