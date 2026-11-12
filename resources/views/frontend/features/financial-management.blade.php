@extends('frontend.layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="/">{{ _lang('Home')}} </a></li>
						<li class="breadcrumbs__item breadcrumbs__item"> {{ _lang('Features')}}</li>
						<li class="breadcrumbs__item breadcrumbs__item--active">{{ _lang('Financial Management')}} </li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1> {{ _lang('Financial Management')}} </h1>
                        <p>
						{!! _lang('Simplify Your Finances with Vehicle Management System with  user-friendly Financial Management module designed to streamline your accounting tasks and optimize your financial operations.') !!}	
                        </p>

						 
					</div>
				</div>
				<!-- end title -->
			</div>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <img src="{{ asset('frontend/img/features/finance.svg') }}" alt="" class="img-fluid">
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
						<h2>{{ _lang('The essential features for your fleet management')}} </h2>

						<div class="row">
							<div class="col-12 col-xl-9">
							{!! _lang('Looking for a reliable car rental? Look no further! Our company offers affordable prices, full insurance coverage, and support on the road. With minimum bureaucracy, you can get on the road hassle-free.') !!}	
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
						<i class="fas fa-money-check-alt"></i>	</span>
						<h3 class="feature__title"> {{ _lang('Track Your Income and Expenses')}}</h3>
						<p class="feature__text">{!! _lang('Keep track of your trip income and expenses effortlessly with Vehicle Management System. Record income from customer bookings and track expenses such as fuel costs, driver fees, and maintenance expenses. This helps you understand your profitability and make informed financial decisions.') !!} </p>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon feature__icon--pink">
						<i class="fas fa-wrench"></i>	</span>
						<h3 class="feature__title">{{ _lang('Manage Service Costs')}} </h3>
						<p class="feature__text"> {!! _lang('Efficiently manage service costs with Vehicle Management System\' tracking feature. Record expenses related to vehicle maintenance, repairs, and other services, and categorize them for easy tracking and analysis. This helps you manage your budget effectively and ensure the reliability of your fleet.') !!}</p>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature">
						<span class="feature__icon feature__icon--purple">
						<i class="fas fa-file-invoice-dollar"></i>	</span>
						<h3 class="feature__title">{{ _lang('Track Payments')}} </h3>
						<p class="feature__text">{!! _lang('Stay on top of your payments with Vehicle Management System\' payment tracking tools. Track payments received from customers, manage outstanding invoices, and send payment reminders effortlessly. This helps you manage your cash flow effectively and improve your financial performance.') !!} </p>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6">
					<div class="feature feature--last">
						<span class="feature__icon feature__icon--green">
						<i class="fas fa-chart-line"></i></span>
						<h3 class="feature__title"> {{ _lang('Comprehensive Reporting')}} </h3>
						<p class="feature__text">{!! _lang('Vehicle Management System empowers you with robust reporting tools that provide valuable insights into your financial performance. Our platform offers a comprehensive range of reporting features, allowing you to analyze your income, expenses, and overall financial health with ease.') !!} </p>
					</div>
				</div>
			</div>
		</div>
		<!-- end features -->
@endsection
