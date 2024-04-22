@extends('frontend.layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="/">{{ _lang('Home')}}</a></li>
						<li class="breadcrumbs__item breadcrumbs__item"> {{ _lang('Features')}}</li>
						<li class="breadcrumbs__item breadcrumbs__item--active"> {{ _lang('Fleet Management')}}</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>{{_lang('Manage Vehicle')}}</h1>
                        <p>
						{!! _lang('In the modern business landscape, efficient management of vehicle fleets is paramount for maintaining competitiveness. Omniverse Dynamics provides state-of-the-art solutions designed to transform your vehicle management practices. Our comprehensive array of features enables you to streamline operations, optimize resource utilization, and enhance productivity significantly.') !!}
						
                        </p>

						 
					</div>
				</div>
				<!-- end title -->
			</div>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <img src="{{ asset('frontend/img/features/omniverse.png') }}" alt="" class="img-fluid">
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
						<h2> {!! _lang('Streamline Operations and Enhance Efficiency with Advanced Fleet Management Features') !!} </h2>

						<div class="row">
							<div class="col-12 col-xl-9">
								<p> {!! _lang('Optimize your operations and increase efficiency with our advanced fleet management features.') !!} </p>
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
							<i class="fas fa-car fa-lg text-primary"></i></span>
						<h3 class="feature__title">{{ _lang('Vehicle Details')}}</h3>
						<p class="feature__text"> {!! _lang('Maintain comprehensive records of each vehicle in your fleet, including make, model, year, registration information, and specifications. Easily access important vehicle details for informed decision-making and resource allocation.') !!}</p>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon feature__icon--pink">
						<i class="fas fa-wrench"></i>	</span>
						<h3 class="feature__title">{{ _lang('Service History')}}</h3>
						<p class="feature__text"> {!! _lang('Keep track of maintenance and service records for every vehicle. Schedule routine maintenance, track service intervals, and receive alerts for upcoming maintenance tasks to ensure the longevity and reliability of your fleet.') !!}</p>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon feature__icon--purple">
						<i class="fas fa-exclamation-triangle"></i>	</span>
						<h3 class="feature__title">{{ _lang('Issues Tracking')}}</h3>
						<p class="feature__text"> {!! _lang('Streamline the process of reporting and resolving vehicle issues. Capture and document any issues or defects encountered during operation, assign tasks to designated team members, and track the status of resolution efforts to minimize downtime and maintain operational efficiency.') !!} </p>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature feature--last">
						<span class="feature__icon feature__icon--green">
						<i class="fas fa-route"></i></span>
						<h3 class="feature__title">{{ _lang('Trip Management')}}</h3>
						<p class="feature__text">{!! _lang('Monitor and analyze the trips undertaken by each vehicle in your fleet. Track trip details such as distance traveled, duration, route taken, and fuel consumption to optimize route planning, identify inefficiencies, and improve overall fleet performance.') !!} </p>
					</div>
				</div>
				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature feature--last">
						<span class="feature__icon feature__icon--green">
						<i class="fas fa-map-marker-alt"></i>	</span>
						<h3 class="feature__title">{{ _lang('Real-Time Vehicle Monitoring')}}</h3>
						<p class="feature__text"> {!! _lang('Keep track of your fleet\'s whereabouts at all times with real-time GPS tracking. Monitor each vehicle\'s location on a map, allowing you to efficiently dispatch vehicles, optimize routes, and respond promptly to unexpected events.') !!} </p>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature feature--last">
						<span class="feature__icon feature__icon--green">
							<i class="fas fa-car"></i>
							</span>
						<h3 class="feature__title">{{ _lang('Fuel History')}}</h3>
						<p class="feature__text">{!! _lang('Track fuel consumption and expenses over time to gain insights into fuel usage patterns and trends. Monitor fuel efficiency, identify anomalies, and make informed decisions to optimize fuel consumption and reduce operational costs.') !!} </p>
					</div>
				</div>
			</div>
		</div>
		<!-- end features -->
@endsection
