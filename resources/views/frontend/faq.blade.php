
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
						<li class="breadcrumbs__item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumbs__item breadcrumbs__item--active">Frequently asked questions</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>Frequently Asked Questions (FAQ)</h1>
						<p>At Omniverse Dynamics, we understand that our clients may have various questions about our vehicle management software and services. To help you get a better understanding of what we offer and how we can benefit your business, we've compiled a list of the most frequently asked questions. If you have any additional questions, please don't hesitate to contact our support team..</p>
					</div>
				</div>
				<!-- end title -->

				<!-- accordion -->
				<div class="col-12">
					<div class="accordion" id="accordion">
						<div class="row">
							<div class="col-12 col-lg-6">
								<div class="accordion__card">
									<button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
									What is Omniverse Dynamics and what services do you offer?
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
										</span>
									</button>

									<div id="collapse1" class="collapse" data-bs-parent="#accordion">
										<p>Omniverse Dynamics is a vehicle technology startup that provides comprehensive vehicle management software. Our services include fleet management, fuel management, issue management, service management, GPRS tracking, and contact management. Our goal is to streamline and optimize vehicle operations for businesses.</p>
									</div>
								</div>

								<div class="accordion__card">
									<button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
									How does your vehicle management software improve operational efficiency?
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
										</span>
									</button>

									<div id="collapse2" class="collapse" data-bs-parent="#accordion">
										<p>Our software integrates all aspects of vehicle management into a single platform. This eliminates the need for multiple systems, reduces manual errors, and provides real-time insights. Features like automated service reminders, real-time fuel monitoring, and GPRS tracking help in reducing downtime, optimizing routes, and lowering operational costs.</p>
									</div>
								</div>

								<div class="accordion__card">
									<button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
									Is your software suitable for small and medium-sized businesses?
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
										</span>
									</button>

									<div id="collapse3" class="collapse" data-bs-parent="#accordion">
										<p>Yes, our software is designed to be scalable and flexible. We offer different pricing plans to accommodate businesses of all sizes, from small fleets to large enterprises. Our Basic Plan is ideal for small businesses, while our Professional and Enterprise Plans cater to medium and large-sized fleets with more advanced features.</p>
									</div>
								</div>

							
							</div>

							<div class="col-12 col-lg-6">
								<div class="accordion__card">
									<button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
									What kind of customer support do you provide?
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
										</span>
									</button>

									<div id="collapse5" class="collapse" data-bs-parent="#accordion">
										<p>We offer comprehensive customer support to ensure you get the most out of our software. Our support team is available to assist with onboarding, troubleshooting, and any questions you may have. We provide support through email, phone, and live chat, ensuring prompt and effective assistance.</p>
									</div>
								</div>
								<div class="accordion__card">
									<button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
									How secure is the data on your platform?
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
										</span>
									</button>

									<div id="collapse4" class="collapse" data-bs-parent="#accordion">
										<p>We prioritize data security and employ robust security measures to protect our clients' information. Our platform uses encryption, secure authentication, and regular security audits to ensure that your data is safe from unauthorized access and breaches.</p>
									</div>
								</div>
								<div class="accordion__card">
									<button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
									Can your software integrate with other existing systems we use?
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z"/></svg>
										</span>
									</button>

									<div id="collapse6" class="collapse" data-bs-parent="#accordion">
										<p>Yes, our software is designed to be compatible with a variety of third-party systems. We offer API integrations that allow seamless data exchange between our platform and other software you may be using, such as accounting systems, CRM tools, and more. This ensures a smooth workflow and maximizes the utility of your existing technology investments.</p>
									</div>
								</div>

							
							</div>
						</div>
					</div>
				</div>
				<!-- end accordion -->
			</div>
		</div>
	
@endsection

