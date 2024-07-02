
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
						<li class="breadcrumbs__item breadcrumbs__item--active">About Us</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>About Us</h1>
						Omniverse Dynamics is a pioneering vehicle technology startup dedicated to revolutionizing the way businesses manage their vehicle fleets. Established in Bangladesh, we specialize in providing cutting-edge vehicle management software designed to streamline and optimize all aspects of fleet operations. Our comprehensive solution integrates fleet management, fuel management, issue management, service management, GPRS tracking, and contact management into a single, user-friendly platform.
						<br>
						<br>
						<h4>Our Vision</h4>
At Omniverse Dynamics, our vision is to empower businesses with intelligent vehicle management solutions that enhance efficiency, reduce costs, and improve decision-making. We aim to be the leading provider of vehicle management technology, not only in Bangladesh but across Southeast Asia and beyond.
<br>
<br>

<h4>Our Mission</h4>
Our mission is to deliver innovative, reliable, and scalable vehicle management software that meets the evolving needs of our clients. By leveraging the latest technologies and industry best practices, we strive to provide exceptional value and support to our customers, helping them achieve their operational goals and drive business growth.

					</div>
				</div>
				<!-- end title -->
			</div>

					<div class="row">
			<div class="main__title main__title--page">
			<h4>Our Values</h4>
			</div>
				<div class="col-12 col-lg-3">
					<div class="step">
						<span class="step__number"><i class="fas fa-lightbulb"></i></span>
						<h3 class="step__title">Innovation</h3>
						<p class="step__text">We are committed to continuous innovation, constantly enhancing our software to meet the changing demands of the vehicle management industry.</p>
					</div>
				</div>
				
				<div class="col-12 col-lg-3">
					<div class="step">
						<span class="step__number"><i class="fas fa-star"></i></span>
						<h3 class="step__title">Customer Focus</h3>
						<p class="step__text">Our clients are at the heart of everything we do. We prioritize their needs and work tirelessly to ensure their satisfaction.</p>
					</div>
				</div>

				<div class="col-12 col-lg-3">
					<div class="step">
						<span class="step__number"><i class="fas fa-shield-alt"></i></span>
						<h3 class="step__title">Integrity</h3>
						<p class="step__text">We conduct our business with the highest standards of ethics and transparency, building trust with our clients and partners.</p>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="step">
						<span class="step__number"><i class="fas fa-headset"></i></span>
						<h3 class="step__title">Excellence</h3>
						<p class="step__text">We strive for excellence in all aspects of our operations, from product development to customer support.</p>
					</div>
				</div>
			</div>
		</div>

	

		<!-- team -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title">
						<h4>Our Leadership</h4>
						
					</div>
				</div>
				<!-- end title -->
			</div>

			<div class="row">
	
				<div class="col-6 col-lg-3">
					<div class="team">
						<div class="team__img">
							<img src="{{asset('frontend/img/team/sultan.jpg')}}" alt="">
						</div>
						<h3 class="team__name">Sultan Bayezid</h3>
						<span class="team__position">Co-Founder & CEO</span>
						<div class="team__social">
							
							<a href="https://www.linkedin.com/in/sultanbayezid/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.47,2H3.53A1.45,1.45,0,0,0,2.06,3.43V20.57A1.45,1.45,0,0,0,3.53,22H20.47a1.45,1.45,0,0,0,1.47-1.43V3.43A1.45,1.45,0,0,0,20.47,2ZM8.09,18.74h-3v-9h3ZM6.59,8.48h0a1.56,1.56,0,1,1,0-3.12,1.57,1.57,0,1,1,0,3.12ZM18.91,18.74h-3V13.91c0-1.21-.43-2-1.52-2A1.65,1.65,0,0,0,12.85,13a2,2,0,0,0-.1.73v5h-3s0-8.18,0-9h3V11A3,3,0,0,1,15.46,9.5c2,0,3.45,1.29,3.45,4.06Z"/></svg></a>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3">
					<div class="team">
						<div class="team__img">
							<img src="{{asset('frontend/img/team/reza.jpeg')}}" alt="">
						</div>
						<h3 class="team__name">M Rezaul Karim</h3>
						<span class="team__position">Co-Founder</span>
						<div class="team__social">
		
						<a href="https://www.linkedin.com/in/rezaenterprises?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BjLfGIm6cThaZEilXhGotQg%3D%3D" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.47,2H3.53A1.45,1.45,0,0,0,2.06,3.43V20.57A1.45,1.45,0,0,0,3.53,22H20.47a1.45,1.45,0,0,0,1.47-1.43V3.43A1.45,1.45,0,0,0,20.47,2ZM8.09,18.74h-3v-9h3ZM6.59,8.48h0a1.56,1.56,0,1,1,0-3.12,1.57,1.57,0,1,1,0,3.12ZM18.91,18.74h-3V13.91c0-1.21-.43-2-1.52-2A1.65,1.65,0,0,0,12.85,13a2,2,0,0,0-.1.73v5h-3s0-8.18,0-9h3V11A3,3,0,0,1,15.46,9.5c2,0,3.45,1.29,3.45,4.06Z"/></svg></a>
						</div>
					</div>
				</div>

		

		
				<div class="col-6 col-lg-3">
					<div class="team">
						<div class="team__img">
							<img src="{{asset('frontend/img/team/abu_bokr_himel.jpg')}}" alt="">
						</div>
						<h3 class="team__name">Md. Abu Bokor Himel</h3>
						<span class="team__position">Customer Service</span>
					
					</div>
				</div>
				<div class="col-6 col-lg-3">
					<div class="team">
						<div class="team__img">
							<img src="{{asset('frontend/img/team/sayem_ahmed.jpg')}}" alt="">
						</div>
						<h3 class="team__name">Sayem Ahmed</h3>
						<span class="team__position">Sales & Marketing</span>
					
					</div>
				</div>
				<div class="col-6 col-lg-3">
					<div class="team">
						<div class="team__img">
							<img src="{{asset('frontend/img/team/rejowan_kabir.jpg')}}" alt="">
						</div>
						<h3 class="team__name">Rejowan Kabir</h3>
						<span class="team__position">Sales & Marketing</span>
					
					</div>
				</div>
				<div class="col-6 col-lg-3">
					<div class="team">
						<div class="team__img">
							<img src="{{asset('frontend/img/team/forhad_hossain.jpg')}}" alt="">
						</div>
						<h3 class="team__name">Forhad Hossain</h3>
						<span class="team__position">Software Engineer</span>
					
					</div>
				</div>
			</div>
		</div>
		<!-- end team -->

		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Customer reviews</h2>
					</div>
				</div>
				<!-- end title -->
			</div>
		</div>

		<div class="main__carousel splide splide--content">
			<div class="splide__arrows">
				<button class="splide__arrow splide__arrow--prev" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"></path></svg></button>
				<button class="splide__arrow splide__arrow--next" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path></svg></button>
			</div>

			<div class="splide__track">
				<ul class="splide__list">
					<li class="splide__slide">
						<div class="testimonial testimonial--carousel">
							<div class="testimonial__text">
								<p>"The Omniverse Dynamics Vehicle Management System has transformed how we handle fleet management. With all our data in one place, decision-making is faster and more informed. This tool has become essential to our daily operations."</p>
							</div>

							<div class="testimonial__client">
								<img src="{{asset('frontend/img/partners/Rent_A_Car_Sylhet_Travel.jpg')}}" alt="">
								<p>Rent A Car Sylhet Travel</p>
								<span>Sylhet, Bangladesh</span>
							</div>
						</div>
					</li>

					<li class="splide__slide">
						<div class="testimonial testimonial--carousel">
							<div class="testimonial__text">
								<p>"We've seen a significant improvement in our efficiency since using the Omniverse Dynamics Vehicle Management System. It centralizes all our data, making it easy to monitor and manage our fleet. Highly recommend it for any organization looking to streamline their processes."</p>
							</div>

							<div class="testimonial__client">
								<img src="{{asset('frontend/img/partners/mahmud_rent_a_car.jpg')}}" alt="">
								<p>Mahmud Rent A Car</p>
								<span>Dhaka, Bangladesh</span>
							</div>
						</div>
					</li>

					<li class="splide__slide">
						<div class="testimonial testimonial--carousel">
							<div class="testimonial__text">
								<p>"The comprehensive data provided by the Omniverse Dynamics Vehicle Management System has been a game-changer. It helps us make better decisions and keeps our Rent A Car business running smoothly. This system is a must-have for any business managing multiple vehicles."</p>
							</div>

							<div class="testimonial__client">
								<img src="{{asset('frontend/img/partners/rent_noah.jpg')}}" alt="">
								<p>Rent Noah Sylhet</p>
								<span>Sylhet, Bangladesh</span>
							</div>
						</div>
					</li>

					<li class="splide__slide">
						<div class="testimonial testimonial--carousel">
							<div class="testimonial__text">
								<p>"Omniverse Dynamics has simplified our fleet management like never before. All the data we need is now in one place, enabling us to make smart, informed decisions quickly. It’s a critical tool for guiding our business."</p>
							</div>

							<div class="testimonial__client">
								<img src="{{asset('frontend/img/partners/moulvibazar.jpg')}}" alt="">
								<p>Rent Car Moulvibazar</p>
								<span>Moulvibazar, Sylhet</span>
							</div>
						</div>
					</li>

					<li class="splide__slide">
						<div class="testimonial testimonial--carousel">
							<div class="testimonial__text">
								<p>"Since implementing the Omniverse Dynamics Vehicle Management System, our Rent A Car operations have become much more efficient. The centralized data helps us stay on top of everything and make decisions that positively impact our business. We couldn't be happier with this system."</p>
							</div>

							<div class="testimonial__client">
								<img src="{{asset('frontend/img/partners/bd_travel.jpg')}}" alt="">
								<p>BD Travel Rent A Car Service</p>
								<span>Banani, Dhaka</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
		

	
@endsection

