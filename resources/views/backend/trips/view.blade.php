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
<div class="container-fluid px-4">
                        <h1 class="mt-4">Trip Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Drivers</li>
                            <li  class="breadcrumb-item">
                            <a href="{{ route('drivers.create') }}" class="btn btn-primary">Create New Driver</a>

                            </li>
                        </ol>
                    
                        <div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            Company Name, Inc
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <small>VEHICLE</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{$trip->vehicle->make}} {{$trip->vehicle->model}} {{$trip->vehicle->year}} {{$trip->vehicle->color}}</strong><br>
                  Seat Capacity : {{$trip->vehicle->seating_capacity}}<br>
                  License Plate : {{$trip->vehicle->license_plate}}<br>
                  Engine CC : {{$trip->vehicle->horsepower}}<br>
                  Fax: (123) 456-7890
               </address>
            </div>
            <div class="invoice-to">
               <small>DRIVER</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{$trip->driver->name}} </strong><br>
                  License Number: {{$trip->driver->license_number}}<br>
                  Phone No : {{$trip->driver->phone_number}}<br>
                 Blood Group : {{$trip->driver->blood_group}}<br>
                  Address: {{$trip->driver->address}}
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
                           <span class="text-inverse">{{$trip->customer->contact_name}}</span><br>
                           <small><i class="fas fa-phone"></i> {{$trip->customer->contact_phone}}  &nbsp;&nbsp;<i class="fas fa-	fas fa-map-marker-alt"></i> {{$trip->customer->address}}</small>
                        </td>
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
               </div>
               <div class="invoice-price-right">
                  <small>EXPENSE</small> <span class="f-w-600">$4508.00</span>
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
   </div>
</div>
                    </div>



@endsection
