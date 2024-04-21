@extends('frontend.layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="/">Home</a></li>
						<li class="breadcrumbs__item breadcrumbs__item">Features</li>
						<li class="breadcrumbs__item breadcrumbs__item--active">Trip Management</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>Trip Management</h1>
                        <p>
						{!! _lang('At Omniverse Dynamics, we understand the importance of seamless trip management for businesses and individuals. Our Trip Management module offers a comprehensive solution that covers every aspect of the trip lifecycle, ensuring a smooth and efficient journey from booking to profit calculation.') !!} 
                        </p>

						 
					</div>
				</div>
				<!-- end title -->
			</div>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <img src="{{ asset('frontend/img/features/trips.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- features -->
<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2> {!! _lang('Experience the convenience and efficiency of Omniverse Dynamics\'s Trip Management feature.') !!}</h2>

						<div class="row">
							<div class="col-12 col-xl-9">
								<p>{!! _lang('From booking to profit calculation, we\'ve got you covered every step of the way.') !!} </p>
							</div>
						</div>
					</div>
				</div>
				<!-- end title -->
			</div>

			<div class="row">
				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon">
						<i class="fas fa-calendar-plus"></i>	</span>
						<h3 class="feature__title">Booking a Trip</h3>
						<p class="feature__text">{!! _lang('Customers can easily book a trip through our user-friendly platform. They select their desired drop-off location and pickup time, and the system automatically calculates the trip fare based on factors such as distance, time of day, and any additional services requested. This ensures transparency and accuracy in pricing, providing customers with a clear understanding of their trip costs upfront.') !!} </p>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon feature__icon--pink">
						<i class="fas fa-car"></i></span>
						<h3 class="feature__title">Driver Approval and Arrival</h3>
						<p class="feature__text">{!! _lang('Once a trip is booked, it is sent to the driver or team for approval. Upon approval, the driver is notified, and they proceed to the pickup location. Customers can track the driver\'s location in real-time, providing peace of mind and better planning. Upon arrival at the pickup location, the driver initiates the trip, marking the beginning of the journey.') !!} </p>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon feature__icon--purple">
						<i class="fas fa-route"></i>	</span>
						<h3 class="feature__title">Driver-Initiated Trips</h3>
						<p class="feature__text">{!! _lang('In addition to customer-initiated trips, drivers also have the option to create trips directly from their portal. Whether it\'s a scheduled trip or an ad-hoc request, our platform allows drivers to manage their trips efficiently, ensuring timely service for customers.') !!} </p>
					</div>
				</div>

		
				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature feature--last">
						<span class="feature__icon feature__icon--green">
						<i class="fas fa-chart-line"></i>	</span>
						<h3 class="feature__title">Gross Profit and Net Profit Calculation</h3>
						<p class="feature__text"> {!! _lang('At the end of each trip, our system automatically calculates the gross profit and net profit for the driver. Gross profit is calculated by subtracting the total trip expenses including fuel, driver fees, and maintenance costs from the trip fare. Net profit is then determined by subtracting any additional overhead costs from the gross profit, providing drivers with a clear understanding of their earnings for each trip.') !!} </p>
					</div>
				</div>
	
			</div>
		</div>
		<!-- end features -->
@endsection
