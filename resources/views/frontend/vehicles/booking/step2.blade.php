
@extends('frontend.layouts.app')

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
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumbs__item breadcrumbs__item">Services</li>
						<li class="breadcrumbs__item breadcrumbs__item--active">Rent A Car</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>Rent A Car</h1>
                        <p>
                        In addition to the business modules designed to meet the specific needs of different sectors of activity, DIGIPARC offers a set of modules which are essential for any fleet manager, regardless of the size of the fleet or the sector of activity of the organization.
                        </p>

						 
					</div>
				</div>
				<!-- end title -->
			</div>
<div class="container">
	
  <div class="col-md-12">
      <div class="invoice">
 

         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <small>VEHICLE</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{ session('trip.vehicle.name') }}</strong><br>
                  Seat Capacity :{{ session('trip.vehicle.seating_capacity') }}<br>
                  License Plate : {{ session('trip.vehicle.license_plate') }}<br>
                  Engine CC : {{ session('trip.vehicle.horsepower') }}<br>
                  Fax: (123) 456-7890
               </address>
            </div>
            <div class="invoice-to">
               <small>DRIVER</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{ session('trip.driver.name') }} </strong><br>
                  License Number: {{ session('trip.driver.license_number') }}<br>
                  Phone No : {{ session('trip.driver.phone_number') }}<br>
                 Blood Group : {{ session('trip.driver.blood_group') }}<br>
                  Address: {{ session('trip.address') }}
               </address>
            </div>
            <div class="invoice-date">
               <small>Date and Time</small>
               <div class="date text-inverse m-t-5">{{ \Carbon\Carbon::parse(session('trip.trip_date'))->format('d-m-Y') }}

            </div>
               <div class="invoice-detail">
                 Departure time : {{ \Carbon\Carbon::parse(session('trip.departure_time'))->format('h:i A') }}
                    <br>


                  Arival time : {{ \Carbon\Carbon::parse(session('trip.arrival_time'))->format('h:i A') }}
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
                        <th class="text-right" width="10%">DISTANCE</th>
                        <th class="text-right" width="10%">FARE</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Name: {{ session('trip.customer.name') }}</span><br>
                           <small>Phone:  {{ session('trip.customer.email') }} </small> <br>
                           <small>Address: {{ session('trip.customer_id') }}</small></td>
                        <td class="text-center">{{ session('trip.pickup_location') }}</td>
                        <td class="text-center">{{ session('trip.dropoff_location') }}</td>
                        <td class="text-center">{{ session('trip.distance_km') }} KM</td>
                        <td class="text-center"> {{ decimalPlace(session('trip.fare_amount'))}} {{currency()}}</td>
                
                        <!-- <td class="text-right">$2,500.00</td> -->
                     </tr>
                 
                 
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->

       
         </div>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <div class="invoice-note">
           NOTE <br>
           {{ session('trip.trip_notes') }}
         </div>
   
      </div>
  
      <a href="{{route('book.step3')}} " class="btn btn-primary mt-3">Confirm Booking</a>
   </div>

		</div>
	
@endsection

