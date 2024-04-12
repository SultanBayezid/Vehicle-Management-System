@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">{{ $contact->contact_name }}</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contacts</li>
            <li class="breadcrumb-item active" aria-current="page">{{ $contact->contact_name }}</li>
        </ol>
    </nav>
<div class="row">
    @php $currency = currency() @endphp

    <div class="col-md-3 col-sm-4">
        <ul class="nav flex-column nav-tabs settings-tab" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#general-info"><i
                        class="ti-user"></i> {{ _lang('General Info') }}</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#invoices"><i class="ti-receipt"></i>
                    {{ _lang('Trips') }}</a></li>
       
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#transaction"><i
                        class="ti-credit-card"></i> {{ _lang('Transactions') }}</a></li>
         
            <li class="nav-item"><a class="nav-link" href="{{ route('contacts.edit', $contact->id) }}"><i
                        class="ti-pencil-alt"></i> {{ _lang('Edit') }}</a> </li>
        </ul>
    </div>

    <div class="col-md-9 col-sm-8">
        <div class="card">

            <div class="card-body">

                <div class="tab-content">

                    <div id="general-info" class="tab-pane active">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center"><img class="thumb-image-md img-thumbnail"
                                        src="{{ asset('uploads/contacts/'.$contact->contact_image) }}"></td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Profile Type') }}</td>
                                <td>{{ $contact->profile_type }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Company Name') }}</td>
                                <td>{{ $contact->company_name }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Contact Name') }}</td>
                                <td>{{ $contact->contact_name }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Contact Email') }}</td>
                                <td>{{ $contact->contact_email }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Contact Phone') }}</td>
                                <td>{{ $contact->contact_phone }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Country') }}</td>
                                <td>{{ $contact->country }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('City') }}</td>
                                <td>{{ $contact->city }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('State') }}</td>
                                <td>{{ $contact->state }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Zip') }}</td>
                                <td>{{ $contact->zip }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Address') }}</td>
                                <td>{{ $contact->address }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Facebook') }}</td>
                                <td>{{ $contact->facebook }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Twitter') }}</td>
                                <td>{{ $contact->twitter }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Linkedin') }}</td>
                                <td>{{ $contact->linkedin }}</td>
                            </tr>
                            <tr>
                                <td>{{ _lang('Remarks') }}</td>
                                <td>{{ $contact->remarks }}</td>
                            </tr>
                    
                        </table>
                    </div>


                    <div id="invoices" class="tab-pane fade">

                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                <th>Date</th>
                 
                                            <th>Driver</th>
                                            <th>Vehicle</th>
                                            <th>Pickup Location</th>
                                            <th>Dropoff Location</th>
                                            <th>Fare</th>
                                            <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($invoices as $invoice)
                                <tr id="row_{{ $invoice->id }}">
                                <td>{{$invoice->trip_date }}</td>
                                       
                                            <td>{{$invoice->driver->name }}</td>
                                            <td>{{$invoice->vehicle->make }}</td>
                                            <td>{{$invoice->vehicle->make }}</td>
                                            <td>{{$invoice->vehicle->make }}</td>
                                            <td>  {{ decimalPlace($invoice->fare_amount, $currency) }}</td>
                                    <td class="text-center">

                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown">{{ _lang('Action') }}
                                                <span class="caret"></span></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ action('App\Http\Controllers\TripController@edit', $invoice->id) }}"><i
                                                        class="ti-pencil-alt"></i> {{ _lang('Edit') }}</a>
                                                <a class="dropdown-item" href="{{ action('App\Http\Controllers\TripController@show', $invoice->id) }}"
                                                    data-title="{{ _lang('View Invoice') }}" data-fullscreen="true"><i
                                                        class="ti-eye"></i>
                                                    {{ _lang('View') }}</a>
                                             
                                         

                                                <form action="{{action('App\Http\Controllers\TripController@destroy', $invoice['id'])}}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="button-link btn-remove" type="submit"><i
                                                            class="ti-trash"></i>
                                                        {{ _lang('Delete') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="quotations" class="tab-pane fade">
                        @php $currency = currency() @endphp
                
                    </div>

                    <div id="transaction" class="tab-pane fade">
                        <table class="table table-bordered data-table">
                            <thead>
                                <th>{{ _lang('Date') }}</th>
                                <th>{{ _lang('Account') }}</th>
                                <th>{{ _lang('Category') }}</th>
                                <th class="text-right">{{ _lang('Amount') }}</th>
                                <th>{{ _lang('Payment Method') }}</th>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->trans_date }}</td>
                                    <td>{{ $transaction->account->account_title }}
                                    </td>
                                    <td>{{ $transaction->income_type->name }}</td>
                                    <td class="text-right">{{ decimalPlace($transaction->amount, $currency) }}</td>
                                    <td>{{ $transaction->payment_method->name }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

             

                </div>
                <!--End TAB-->
            </div>
        </div>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

@endsection