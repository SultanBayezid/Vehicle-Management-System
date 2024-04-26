@extends('backend.layouts.header')

@section('content')

<style>


.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 50%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 50%;
    background: #b1dcbe;
    color: #000;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
</style>
<div class="container">
      <h1 class="h3 mb-2 pt-3 text-gray-800">Trip Details</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
                <li class="breadcrumb-item"><a href="{{route('trips.index')}}">Trips</a></li>
                <li class="breadcrumb-item active" aria-current="page">Trip Details</li>
            </ol>
        </nav>
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <a href="#" class="btn btn-sm btn-white m-b-10 p-l-5" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-money-check-alt text-success fa-fw fa-lg"></i> Add Trip Payment</a>
            <a href="#" class="btn btn-sm btn-white m-b-10 p-l-5" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-money-check-alt text-danger fa-fw fa-lg"></i> Add Trip Expense</a>
      
         </div>

         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <small>VEHICLE</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{$trip->vehicle->brand->name ?? '' }} {{$trip->vehicle->model->name ?? ''}} {{$trip->vehicle->myear->year ?? ''}} {{$trip->vehicle->color}}</strong><br>
                  Seat Capacity : {{$trip->vehicle->seating_capacity}}<br>
                  License Plate : {{$trip->vehicle->license_plate}}<br>
                  Engine CC : {{$trip->vehicle->horsepower}}<br>
                  Fax: (123) 456-7890
               </address>
            </div>
            <div class="invoice-to">
               <small>DRIVER</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{$trip->driver->driver_name ?? ''}} </strong><br>
                  License Number: {{$trip->driver->license_number ?? ''}}<br>
                  Phone No : {{$trip->driver->phone_number ??''}}<br>
                 Blood Group : {{$trip->driver->blood_group ?? ''}}<br>
                  Address: {{$trip->driver->address ??''}}
               </address>
            </div>
            <div class="invoice-date">
               <small>Date and Time</small>
               <div class="date text-inverse m-t-5">{{$trip->trip_date}}</div>
               <div class="invoice-detail">
               Departure time : {{$trip->departure_time}}<br>
               Arival time : {{$trip->arrival_time}}
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>CUSTOMER</th>
                        <th class="text-center" width="30%">PICKUP LOCATION</th>
                        <th class="text-center" width="30%">DROPOFF LOCATION</th>
                        <!-- <th class="text-right" width="20%">DISTANCE</th> -->
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Name: {{$trip->customer->contact_name ?? ''}}</span><br>
                           <small>Phone:  {{$trip->customer->contact_phone  ?? ''}} </small> <br>
                           <small>Address: {{$trip->customer->address  ?? ''}}</small></td>
                        <td class="text-center">{{$trip->pickup_location}}</td>
                        <td class="text-center">{{$trip->dropoff_location}}</td>
                        <!-- <td class="text-right">$2,500.00</td> -->
                     </tr>
                 
                 
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>DISTANCE</small>
                        <span class="text-inverse">{{$trip->distance_km}} KM</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>FARE</small>
                        <span class="text-inverse">{{$trip->fare_amount}} TK</span>
                     </div>
                     
                  </div>
                  <div style="font-size:14px;"> 
               <table id="expense-table" class="table table-bordered">
               <th>{{ _lang('Date') }}</th>
  
                            <th>{{ _lang('Payment Method') }}</th>
                            <th class="text-right">{{ _lang('Amount') }}</th>

                     <tbody>
                     @php
                            $totalpayment = 0;
                     @endphp
                        @foreach($payments as $payment)
                     <tr>
                     <td> <a href="{{ action('App\Http\Controllers\IncomeController@show', $payment->id) }}" >{{$payment->trans_date }}</a></td>
                    

                <td>{{ $payment->payment_method->name ?? '' }}</td>
                <td>{{ decimalPlace($payment->amount, $currency) }}</td>

                     </tr>
                     @php
            $totalpayment += $payment->amount;
        @endphp
                     @endforeach
                     </tbody>
                   
                
                   
                  </table>
               </div>
               <small></small> <span class="f-w-600" style="float: right;margin-right:10px">{{ decimalPlace($totalpayment, $currency) }}</span>
               </div>
               <div class="invoice-price-right">
                  <small>EXPENSE</small> <br>
               <div style="font-size:14px;"> 
               <table id="expense-table" class="table table-bordered">
               <th>{{ _lang('Date') }}</th>
  
                            <th>{{ _lang('Payment Method') }}</th>
                            <th class="text-right">{{ _lang('Amount') }}</th>

                     <tbody>
                     @php
                            $totalExpenseAmount = 0;
                     @endphp
                        @foreach($expenses as $expense)
                     <tr>
                     <td><a href="{{ action('App\Http\Controllers\ExpenseController@show', $expense->id) }}" >{{$expense->trans_date }}</a></td>

                <td>{{ $expense->payment_method->name ?? '' }}</td>
                <td>{{ decimalPlace($expense->amount, $currency) }}</td>

                     </tr>
                     @php
            $totalExpenseAmount += $expense->amount;
        @endphp
                     @endforeach
                     </tbody>
                   
                
                   
                  </table>
               </div>
               <small></small> <span class="f-w-600">{{ decimalPlace($totalExpenseAmount, $currency) }}</span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <div class="invoice-note">
           NOTE <br>
           {{$trip->note}}
         </div>
   
      </div>

  
                                        <form method="POST" action="{{ route('trips.destroy', $trip->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Driver?')"><i class="fas fa-trash"></i></button>
                                        </form>
   </div>
</div>
                    </div>

<!-- Modal content  -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0">Add Expense</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="post" class="ajax-submit" autocomplete="off" action="{{route('trip_expense.create_payment')}}"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="col-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                 
                    <label class="control-label">{{ _lang('Account') }}</label>
                    <select class="form-control select2-ajax" data-value="id" data-display="account_title"
                        data-table="accounts" data-where="1" name="account_id" id="account_id" required>
                        <option value="">{{ _lang('Select One') }}</option>
                        {{ create_option("accounts", "id", "account_title", old('account_id')) }}

                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  
                    <label class="control-label">{{ _lang('Expense Type') }}</label>
                    <select class="form-control select2-ajax" data-value="id" data-display="name"
                        data-table="chart_of_accounts" data-where="4" name="chart_id" required>
                        <option value="">{{ _lang('Select One') }}</option>
                        {{ create_option("chart_of_accounts", "id", "name", old('chart_id'), array("type=" => "expense")) }}

                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Trip Fare') }} (<b><span
                                class="account_currency">{{ currency() }}</span></b>)</label>
                    <input type="text" class="form-control float-field"
                        value="{{$trip->fare_amount}}" id="pending_amount" readOnly="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Amount') }}</label>
                    <input type="text" class="form-control float-field" name="amount" value="{{ old('amount') }}"
                        required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                   
                    <label class="control-label">{{ _lang('Payment Method') }}</label>
                    <select class="form-control select2-ajax" data-value="id" data-display="name"
                        data-table="payment_methods" data-where="1" name="payment_method_id" required>
                        <option value="">{{ _lang('Select One') }}</option>
                        {{ create_option("payment_methods", "id", "name", old('payment_method_id')) }}

                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Reference') }}</label>
                    <input type="text" class="form-control" name="reference" value="{{ old('reference') }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Attachment') }}</label>
                    <input type="file" class="form-control dropify" name="attachment">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Note') }}</label>
                    <textarea class="form-control" name="note">{{ old('note') }}</textarea>
                </div>
            </div>

            <input type="hidden" name="invoice_id" value="{{ $trip->id}}">

            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-file"></i>
                        {{ _lang('Make Payment') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
    </div>
  </div>
  </div>
</div>



<!-- model payment  -->

@php
$pending = $trip->fare_amount - $totalpayment;
@endphp
             
             
<!-- Modal content  -->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0">Add Expense</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="post" class="ajax-submit" autocomplete="off" action="{{ route('trip_income.create_payment') }}"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row p-2">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Credit Account') }}</label>
                <select class="form-control select2" name="account_id" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{ create_option("accounts", "id", "account_title", old('account_id')) }}

                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Income Type') }}</label>
                <select class="form-control select2" name="chart_id" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{ create_option("chart_of_accounts", "id", "name", old('chart_id'), array("type=" => "income")) }}

                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Pending Amount')." ".currency() }}</label>
                <input type="text" class="form-control float-field"
                    value="{{ $pending }}" readOnly="true">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Amount')." ".currency() }}</label>
                <input type="text" class="form-control float-field" name="amount" value="{{ old('amount') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Payment Method') }}</label>
                <select class="form-control select2" name="payment_method_id" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{ create_option("payment_methods", "id", "name", old('payment_method_id')) }}

                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ _lang('Reference') }}</label>
                <input type="text" class="form-control" name="reference" value="{{ old('reference') }}">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">{{ _lang('Attachment') }}</label>
                <input type="file" class="form-control dropify" name="attachment">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">{{ _lang('Note') }}</label>
                <textarea class="form-control" name="note">{{ old('note') }}</textarea>
            </div>
        </div>

        <input type="hidden" name="invoice_id" value="{{ $trip->id }}">
        <input type="hidden" name="client_id" value="{{ $trip->customer_id }}">

        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-file"></i> {{ _lang('Add Expense') }}</button>
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
