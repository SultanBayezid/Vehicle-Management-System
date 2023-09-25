@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">{{ _lang('Payment Methods') }}</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm mtop" data-title="{{ ('Add Income') }}"
                href="{{ route('payment_methods.create') }}">
                <i class="fas fa-plus"></i> {{ ('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">People</li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Payment Methods') }}</li>
        </ol>
    </nav>

<div class="row">
    <div class="col-md-12">
        <div class="card">
 

            <div class="card-body">
            <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>{{ _lang('Name') }}</th>
                            <th class="action-col">{{ _lang('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($paymentmethods as $paymentmethod)
                        <tr id="row_{{ $paymentmethod->id }}">
                            <td class='name'>{{ $paymentmethod->name }}</td>
                            <td class="text-center">
                                <form action="{{ action('App\Http\Controllers\PaymentMethodController@destroy', $paymentmethod['id']) }}"
                                    method="post">
                                    <a href="{{ action('App\Http\Controllers\PaymentMethodController@edit', $paymentmethod['id']) }}"
                                        data-title="{{ _lang('Update Payment Method') }}"
                                        class="btn btn-warning btn-sm ajax-modal"><i class="fas fa-pencil"></i></a>
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm btn-remove"
                                        type="submit"><i class="fas fa-trash"></i></button>
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