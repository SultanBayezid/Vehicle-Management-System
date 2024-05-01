
@extends('frontend.layouts.app')

@section('content')
<style>
	.mr-2{
		margin-right:15px;
	}
</style>


<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
					<li class="breadcrumbs__item"><a href="/">{{ _lang('Home')}} </a></li>
						<li class="breadcrumbs__item breadcrumbs__item--active">{{ _lang('Pricing')}} </li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>{{ _lang('Pricing Plan')}}</h1>

				<p>	{!! _lang('We believe in providing flexible and affordable solutions to meet your needs. Our pricing plans are designed to offer value and functionality, ensuring that you get the most out of our services without breaking the bank. Whether you re a small startup or a large enterprise, we have a plan tailored just for you. Explore our pricing options below and choose the one that best fits your requirements') !!}</p>
					</div>
				</div>
				<!-- end title -->


			</div>

			<div class="row">


				<div class="col-12 col-md-6 col-lg-4 order-md-2 order-lg-1">
					<div class="plan">
						<h3 class="plan__title"> {{ _lang('Basic plan')}}</h3>
                        <p class="footer__copyright"> {{ _lang('This plan offers essential features for contact, financial, and vehicle management. Its suitable for individuals or small businesses looking to streamline basic fleet operations at no cost.')}}</p>
						<span class="plan__price">{{ _lang('Free')}}</span></span>
						<ul class="plan__list">
						<li> <span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Contact Groups')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Centralized Contact Database')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Track Your Income and Expenses')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Vehicle Details')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Service History')}}</li>
					    <li> <span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span> {{ _lang('Driver-Initiated Trips')}}</li>
						<li > <span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Manage Service Costs')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Transaction History')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Comprehensive Reporting')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Issues Tracking')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Real-Time Vehicle Monitoring')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Fuel History')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Gross Profit and Net Profit Calculation')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Trip History')}}</li>
						</ul>
						<a href="{{ route('enquiry', ['id' => 'basic']) }}" class="plan__btn">{{ _lang('Get Started') }}</a>
					</div>
				</div>

				<div class="col-12 col-lg-4 order-md-1 order-lg-2">
					<div class="plan">
						<h3 class="plan__title">{{ _lang('Regular Plan')}} </h3>
                        <p class="footer__copyright"> {{ _lang('The Regular Plan provides comprehensive contact, financial, vehicle, and trip management features. Its ideal for small to medium-sized businesses seeking enhanced operational control and efficiency.') }} </p>

						<span class="plan__price">৳ 2200<span> / {{ _lang('month')}}</span></span>
						<ul class="plan__list">
						<li> <span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Contact Groups')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Centralized Contact Database')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Track Your Income and Expenses')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Vehicle Details')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Service History')}}</li>
					    <li> <span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span> {{ _lang('Driver-Initiated Trips')}}</li>
						<li > <span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Manage Service Costs')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Transaction History')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Comprehensive Reporting')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Issues Tracking')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Real-Time Vehicle Monitoring')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Fuel History')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Gross Profit and Net Profit Calculation')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-times text-danger " aria-hidden="true"></i> </span>{{ _lang('Trip History')}}</li>

					</ul>
					<a href="{{ route('enquiry', ['id' => 'regular']) }}" class="plan__btn">{{ _lang('Get Started') }}</a>
					</div>
				</div>

				<div class="col-12 col-md-6 col-lg-4 order-md-3 order-lg-3">
					<div class="plan">
						<h3 class="plan__title">{{ _lang('Premium Plan')}}</h3>
                        <p class="footer__copyright">{{ _lang('Designed for businesses with advanced fleet management needs, the Premium Plan offers comprehensive features across all areas. It enables users to efficiently manage contacts, finances, vehicles, trips, and services for optimized fleet performance and cost control.') }}</p>
						<span class="plan__price">৳ 4400<span> / {{ _lang('month')}}</span></span>
						<ul class="plan__list">
						<li> <span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Contact Groups')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Centralized Contact Database')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Track Your Income and Expenses')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Vehicle Details')}}</li>
						<li><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Service History')}}</li>
					    <li> <span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span> {{ _lang('Driver-Initiated Trips')}}</li>
						<li > <span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Manage Service Costs')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Transaction History')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Comprehensive Reporting')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Issues Tracking')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Real-Time Vehicle Monitoring')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Fuel History')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Gross Profit and Net Profit Calculation')}}</li>
						<li ><span class="mr-2" ><i class="fa fa-check text-success " aria-hidden="true"></i> </span>{{ _lang('Trip History')}}</li>
						</ul>
						
						<a href="{{ route('enquiry', ['id' => 'premium']) }}" class="plan__btn">{{ _lang('Get Started') }}</a>
					</div>
				</div>
			</div>


	
		</div>
	
@endsection

