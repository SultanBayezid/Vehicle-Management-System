@extends('frontend.layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="/">Home</a></li>
						<li class="breadcrumbs__item breadcrumbs__item">Features</li>
						<li class="breadcrumbs__item breadcrumbs__item--active">Contact Management</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>Contact Management</h1>
                        <p>
						{!! _lang('Omniverse Dynamics\' Contact Management feature offers a comprehensive solution to streamline communication and collaboration with your drivers, clients, suppliers, and other stakeholders.') !!}  
                        </p>

						 
					</div>
				</div>
				<!-- end title -->
			</div>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <img src="{{ asset('frontend/img/features/contacts.png') }}" alt="" class="img-fluid">
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
						<h2>{!! _lang('The essential features for your fleet management') !!} </h2>

						<div class="row">
							<div class="col-12 col-xl-9">
								<p>{!! _lang('Looking for a reliable car rental? Look no further! Our company offers affordable prices, full insurance coverage, and support on the road. With minimum bureaucracy, you can get on the road hassle-free.') !!} </p>
							</div>
						</div>
					</div>
				</div>
				<!-- end title -->
			</div>

			<div class="row">
			<div class="col-12 col-md-6 col-xl-6">
					<div class="feature feature--last">
						<span class="feature__icon feature__icon--green">
						<i class="fas fa-users"></i></span>
						<h3 class="feature__title">Contact Groups</h3>
						<p class="feature__text">{!! _lang('Effortlessly organize your contacts into groups or categories based on shared characteristics or criteria. Whether you\'re managing clients, suppliers, or leads, creating contact groups allows for efficient segmentation and targeted communication.') !!} </p>
					</div>
				</div>
				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon">
						<i class="fas fa-address-card"></i></span>
						<h3 class="feature__title">Centralized Contact Database</h3>
						<p class="feature__text">{!! _lang('Our platform provides a centralized hub where you can store and organize all your contacts\' information. From driver details to client contacts and supplier information, everything is conveniently stored in one place for easy access.') !!} </p>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon feature__icon--pink">
						<i class="fas fa-money-check-alt"></i></span>
						<h3 class="feature__title">Transaction History</h3>
						<p class="feature__text">{!! _lang('Track every financial transaction with ease by accessing a complete transaction history for each customer. From invoices and payments received to outstanding balances, stay informed about transaction statuses and ensure timely follow-ups to maintain healthy cash flow.') !!} </p>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon feature__icon--purple">
						<i class="fas fa-road"></i>	</span>
						<h3 class="feature__title">Trip History</h3>
						<p class="feature__text">{!! _lang('Keep a complete record of every trip taken by your customers. Access trip details, including dates, destinations, drivers assigned, and trip statuses. Use this information to analyze travel patterns, identify trends, and optimize service delivery.') !!} </p>
					</div>
				</div>

		
			</div>
		</div>
		<!-- end features -->
@endsection
