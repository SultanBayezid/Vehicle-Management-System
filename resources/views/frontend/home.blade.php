
@extends('frontend.layouts.app')

@section('content')

<!-- home -->
<div class="home">
			<!-- home bg -->
			<div class="home__bg"></div>
			<!-- end home bg -->
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="home__content">
							<h1 class="home__title">Manage, rent, sell <br> cars  all in one <br> convenient platform. </h1>
							<p class="home__text">Omniverse not only streamlines vehicle management but also facilitates <br> car booking, rentals, and sales, providing a comprehensive solution <br> for your automotive needs. </p>

							<!-- <form class="home__search" action="#">
								<div class="home__group">
									<label for="search1">Car, model, or brand</label>
									<input type="text" name="search1" id="search1" placeholder="What car are you looking for?">
								</div>

								<div class="home__group">
									<label for="search2">Max. monthly payment</label>
									<input type="text" name="search2" id="search2" placeholder="Add an amount in $">
								</div>

								<div class="home__group">
									<label for="search3">Make Year</label>
									<input type="text" name="search3" id="search3" placeholder="Add a minimal make year">
								</div>
								
								<button type="button"><span>Search</span></button>
							</form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end home -->

		<div class="container">
            
			<!-- get started -->
			<section class="row">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Get started with 4 simple steps</h2>
					</div>
				</div>
				<!-- end title -->

				<div class="col-12 col-md-6 col-xl-3">
					<div class="step1">
						<span class="step1__icon step1__icon--pink">
						<i class="fas fa-truck"></i></span>
						<h3 class="step1__title">Manage Vehicle</h3>
						<p class="step1__text">Streamline vehicle management effortlessly. Gain insights for efficient operations and cost savings.</p>
						<div class="car__footer">
							<a href="{{ route('fleet-management') }}" class="car__home"><span> learn more</span></a>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-3">
					<div class="step1">
						<span class="step1__icon">
							<i class="fas fa-map-marked-alt"></i></span>
						<h3 class="step1__title">Trip Management</h3>
						<p class="step1__text">Simplify trip planning and tracking. Manage expenses and streamline travel processes.</p>
						<div class="car__footer">
						<a href="{{ route('trip-management') }}" class="car__home"><span> learn more</span></a>
						</div></div>
				</div>

				<div class="col-12 col-md-6 col-xl-3">
					<div class="step1">
						<span class="step1__icon step1__icon--green">
						<i class="fas fa-address-book"></i></span>
						<h3 class="step1__title">Contact Management</h3>
						<p class="step1__text">Stay connected effortlessly. Organize contacts and enhance collaboration seamlessly.</p>
						<div class="car__footer">
						<a href="{{ route('contact-management') }}" class="car__home"><span> learn more</span></a>
						</div></div>
				</div>

				<div class="col-12 col-md-6 col-xl-3">
					<div class="step1">
						<span class="step1__icon step1__icon--purple">
						<i class="fas fa-chart-line"></i></span>
						<h3 class="step1__title">Financial Management</h3>
						<p class="step1__text">Take control of finances easily. Manage income, expenses, and invoicing effectively.
</p>
<div class="car__footer">
<a href="{{ route('financial-management') }}" class="car__home"><span> learn more</span></a>
						</div></div>
				</div>
			</section>
			<!-- end get started -->
			<!-- cars -->
			<section class="row">
				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--first">
						<h2>Featured cars</h2>

						<a href="cars.html" class="main__link">View more <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></a>
					</div>
				</div>
				<!-- end title -->
              @foreach($vehicles as $vehicle )
				<!-- car -->
				<div class="col-12 col-md-6 col-xl-4">
					<div class="car">
						<div class="splide splide--card car__slider">
							<div class="splide__arrows">
								<button class="splide__arrow splide__arrow--prev" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"></path></svg></button>
								<button class="splide__arrow splide__arrow--next" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path></svg></button>
							</div>

							<div class="splide__track">
								<ul class="splide__list">
									@foreach($vehicle->images as $image)
									<li class="splide__slide">
										<img src="{{ asset($image->path) }}" alt="Vehicle Image">
									</li>
									@endforeach
								
								</ul>
							</div>
						</div>
						<div class="car__title">
							<h3 class="car__name"><a href="{{route('single.vehicle', $vehicle->id)}}">{{$vehicle->name }}</a></h3>
							<span class="car__year">{{$vehicle->year}}</span>
						</div>
						<ul class="car__list">
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"/></svg>
								<span>{{$vehicle->seating_capacity}}</span>
							</li>
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.54,6.29,19,4.75,17.59,3.34a1,1,0,0,0-1.42,1.42l1,1-.83,2.49a3,3,0,0,0,.73,3.07l2.95,3V19a1,1,0,0,1-2,0V17a3,3,0,0,0-3-3H14V5a3,3,0,0,0-3-3H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3h6a3,3,0,0,0,3-3V16h1a1,1,0,0,1,1,1v2a3,3,0,0,0,6,0V9.83A5,5,0,0,0,20.54,6.29ZM12,19a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12h8Zm0-9H4V5A1,1,0,0,1,5,4h6a1,1,0,0,1,1,1Zm8,1.42L18.46,9.88a1,1,0,0,1-.24-1l.51-1.54.39.4A3,3,0,0,1,20,9.83Z"/></svg>
								<span>Hybrid</span>
							</li>
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.088,4.95453c-.00732-.00781-.00952-.01819-.01715-.02582s-.01819-.00995-.02606-.01733a9.97886,9.97886,0,0,0-14.08948,0c-.00787.00738-.01837.00964-.02606.01733s-.00983.018-.01715.02582a10,10,0,1,0,14.1759,0ZM12,20a7.9847,7.9847,0,0,1-6.235-3H9.78027a2.9636,2.9636,0,0,0,4.43946,0h4.01532A7.9847,7.9847,0,0,1,12,20Zm-1-5a1,1,0,1,1,1,1A1.001,1.001,0,0,1,11,15Zm8.41022.00208L19.3999,15H15a2.99507,2.99507,0,0,0-2-2.81573V9a1,1,0,0,0-2,0v3.18427A2.99507,2.99507,0,0,0,9,15H4.6001l-.01032.00208A7.93083,7.93083,0,0,1,4.06946,13H5a1,1,0,0,0,0-2H4.06946A7.95128,7.95128,0,0,1,5.68854,7.10211l.65472.65473A.99989.99989,0,1,0,7.75732,6.34277l-.65466-.65466A7.95231,7.95231,0,0,1,11,4.06946V5a1,1,0,0,0,2,0V4.06946a7.95231,7.95231,0,0,1,3.89734,1.61865l-.65466.65466a.99989.99989,0,1,0,1.41406,1.41407l.65472-.65473A7.95128,7.95128,0,0,1,19.93054,11H19a1,1,0,0,0,0,2h.93054A7.93083,7.93083,0,0,1,19.41022,15.00208Z"/></svg>
								<span>6.1km / 1-litre</span>
							</li>
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,12a1,1,0,1,0,1,1A1,1,0,0,0,12,12Zm9.71-2.36a0,0,0,0,1,0,0,10,10,0,0,0-19.4,0,0,0,0,0,1,0,0,9.75,9.75,0,0,0,0,4.72,0,0,0,0,1,0,0A10,10,0,0,0,9.61,21.7h0a9.67,9.67,0,0,0,4.7,0h0a10,10,0,0,0,7.31-7.31,0,0,0,0,1,0,0,9.75,9.75,0,0,0,0-4.72ZM12,4a8,8,0,0,1,7.41,5H4.59A8,8,0,0,1,12,4ZM4,12a8.26,8.26,0,0,1,.07-1H6v2H4.07A8.26,8.26,0,0,1,4,12Zm5,7.41A8,8,0,0,1,4.59,15H7a2,2,0,0,1,2,2Zm4,.52A8.26,8.26,0,0,1,12,20a8.26,8.26,0,0,1-1-.07V18h2ZM13.14,16H10.86A4,4,0,0,0,8,13.14V11h8v2.14A4,4,0,0,0,13.14,16ZM15,19.41V17a2,2,0,0,1,2-2h2.41A8,8,0,0,1,15,19.41ZM19.93,13H18V11h1.93A8.26,8.26,0,0,1,20,12,8.26,8.26,0,0,1,19.93,13Z"/></svg>
								<span>Automatic</span>
							</li>
						</ul>
						<div class="car__footer">
							<span class="car__price">$440 <sub>/ month</sub></span>
							<button class="car__favorite" type="button" aria-label="Add to favorite"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.16,5A6.29,6.29,0,0,0,12,4.36a6.27,6.27,0,0,0-8.16,9.48l6.21,6.22a2.78,2.78,0,0,0,3.9,0l6.21-6.22A6.27,6.27,0,0,0,20.16,5Zm-1.41,7.46-6.21,6.21a.76.76,0,0,1-1.08,0L5.25,12.43a4.29,4.29,0,0,1,0-6,4.27,4.27,0,0,1,6,0,1,1,0,0,0,1.42,0,4.27,4.27,0,0,1,6,0A4.29,4.29,0,0,1,18.75,12.43Z"/></svg></button>
							<a href="car.html" class="car__more"><span>Rent now</span></a>
						</div>
					</div>
				</div>
				<!-- end car -->

                @endforeach

			</section>
			<!-- end cars -->

		</div>

		<!-- news -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Our Blog</h2>
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
					@foreach($blogs as $blog)
					<li class="splide__slide">
						<div class="post post--carousel">
							<a href="{{route('blogs.show', $blog->id)}}" class="post__img">
								<img src="{{ asset('/uploads/blogs/' . $blog->image) }}" alt="Not Available">
							</a>

							<div class="post__content">
								<!-- <a href="#" class="post__category"><span>Cars</span></a> -->
								<h3 class="post__title"><a href="{{route('blogs.show', $blog->id)}}">{{$blog->title}}</a></h3>
								<div class="post__meta">
									<span class="post__date"> <i class="fas fa-clock fa-lg text-success"></i> &nbsp;&nbsp; {{ $blog->created_at->format('d/m/Y') }}
</span>
									
								</div>
							</div>
						</div>
					</li>
					@endforeach

				
				</ul>
			</div>
		</div>
	
@endsection

