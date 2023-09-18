@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
				<span class="header-title">{{ ('List Income') }}</span>
                <a class="btn btn-primary btn-sm ml-auto ajax-modal" data-title="{{ ('Add Income') }}"
                    href="{{ route('income.create') }}"><i class="ti-plus"></i> {{ ('Add New') }}</a>
            </div>

            <div class="card-body">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ ('Date') }}</th>
                            <th>{{ ('Account') }}</th>
                            <th>{{ ('Income Type') }}</th>
                            <th class="text-right">{{ ('Amount') }}</th>
                            <th>{{ ('Payer') }}</th>
                            <th>{{ ('Payment Method') }}</th>
                            <th class="action-col">{{ ('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->trans_date }}</td>
                <td>{{ $transaction->account->account_title }}</td>
                <td>{{ $transaction->income_type->name}}</td>
                <td>{{ decimalPlace($transaction->amount, $currency) }}</td>
                <td>{{ $transaction->payer->contact_name ?? '' }}</td>
                <td>{{ $transaction->payment_method->name ?? '' }}</td>
    
                <td>
                    @if(isset($transaction->income_type->name))
                    <form action="{{ action('App\Http\Controllers\IncomeController@destroy', $transaction->id) }}" class="text-center" method="post">
                        <a href="{{ action('App\Http\Controllers\IncomeController@edit', $transaction->id) }}" data-title="{{ _lang('Update Income') }}" class="btn btn-warning btn-sm ajax-modal"><i class="ti-pencil-alt"></i></a>
                        <a href="{{ action('App\Http\Controllers\IncomeController@show', $transaction->id) }}" data-title="{{ _lang('View Income') }}" class="btn btn-info btn-sm ajax-modal"><i class="ti-eye"></i></a>
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger btn-sm btn-remove" type="submit"><i class="ti-trash"></i></button>
                    </form>
                    @else
                    <form action="{{ action('App\Http\Controllers\IncomeController@destroy', $transaction->id) }}" class="text-center" method="post">
                        <a href="#" data-title="{{ _lang('Update Income') }}" class="btn btn-warning btn-sm ajax-modal" disabled><i class="ti-pencil-alt"></i></a>
                        <a href="{{ action(' App\Http\Controllers\IncomeController@show', $transaction->id) }}" data-title="{{ _lang('View Income') }}" class="btn btn-info btn-sm ajax-modal"><i class="ti-eye"></i></a>
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger btn-sm btn-remove" type="submit"><i class="ti-trash"></i></button>
                    </form>
                    @endif
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
