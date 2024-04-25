
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
							<h1 class="home__title">{!! _lang('Manage, rent, sell <br> cars all in one <br> convenient platform.') !!} </h1>
							<p class="home__text">{!! _lang('Omniverse Dynamics goes beyond simplifying vehicle management, <br> it serves as a  one-stop solution for car owners, dealers, and customers. Whether you are <br> looking to rent out your own vehicle searching for a car to purchase, <br> or managing a fleet for your business,  Omniverse Dynamics streamlines it all') !!}</p>

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
						<h2>{{_lang('Learn What Omniverse Dynamics Can Do')}}</h2>
					</div>
				</div>
				<!-- end title -->

				<div class="col-12 col-md-6 col-xl-3">
					<div class="step1">
						<span class="step1__icon step1__icon--pink">
						<i class="fas fa-truck"></i></span>
						<h3 class="step1__title">{{_lang('Manage Vehicle')}}</h3>
						<p class="step1__text">{{_lang('Streamline vehicle management effortlessly. Gain insights for efficient operations and cost savings.')}}</p>
						<div class="car__footer">
							<a href="{{ route('fleet-management') }}" class="car__home"><span> {{ _lang('learn more') }} </span></a>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-3">
					<div class="step1">
						<span class="step1__icon">
							<i class="fas fa-map-marked-alt"></i></span>
						<h3 class="step1__title">{{_lang('Trip Management')}} </h3>
						<p class="step1__text">{!! _lang('Simplify trip planning and tracking. Manage expenses and streamline travel processes.') !!}</p>
						<div class="car__footer">
						<a href="{{ route('trip-management') }}" class="car__home"><span> {{ _lang('learn more')}} </span></a>
						</div></div>
				</div>

				<div class="col-12 col-md-6 col-xl-3">
					<div class="step1">
						<span class="step1__icon step1__icon--green">
						<i class="fas fa-address-book"></i></span>
						<h3 class="step1__title">{{_lang('Contact Management')}} </h3>
						<p class="step1__text">{{ _lang('Stay connected effortlessly. Organize contacts and enhance collaboration seamlessly.') }} </p>
						<div class="car__footer">
						<a href="{{ route('contact-management') }}" class="car__home"><span>{{ _lang('learn more')}}  </span></a>
						</div></div>
				</div>

				<div class="col-12 col-md-6 col-xl-3">
					<div class="step1">
						<span class="step1__icon step1__icon--purple">
						<i class="fas fa-chart-line"></i></span>
						<h3 class="step1__title">{{_lang('Financial Management')}} </h3>
						<p class="step1__text">{!! _lang('Take control of finances easily. Manage income, expenses, and invoicing effectively.')!!}
</p>
<div class="car__footer">
<a href="{{ route('financial-management') }}" class="car__home"><span>{{ _lang('learn more')}} </span></a>
						</div></div>
				</div>
			</section>
			<!-- end get started -->
			<!-- cars -->
			<section class="row">
				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--first">
						<h2>{{ _lang('Rent A Car')}}</h2>

						<a href="{{route('rent')}}" class="main__link">{{ _lang('View All')}} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></a>
					</div>
				</div>
				<!-- end title -->
              @foreach($vehicles as $vehicle )
			  <?php $encryptedId = Crypt::encrypt($vehicle->id); ?>
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
								@foreach($vehicle->images->take(3) as $image)
    <li class="splide__slide">
        <img src="{{ asset($image->thumbnail_path) }}" alt="Vehicle Image" style="width: 100%;
        margin: 0 auto;
        display: flex;
        height: 220px;
        border-radius: 6px 6px 0 0;
        -o-object-fit: cover;
        object-fit: cover;
        -o-object-position: center;
        object-position: center;
        transition: .3s linear;">
    </li>
@endforeach

								
								</ul>
							</div>
						</div>
						<div class="car__title">
							<h3 class="car__name"><a href="{{route('single.vehicle', $vehicle->id)}}">{{$vehicle->brand->name ?? '' }} {{$vehicle->model->name ?? '' }}</a></h3>
							<span class="car__year">{{$vehicle->myear->year ?? '' }}</span>
						</div>
						<ul class="car__list">
							<li>
								<i class="fas fa-male  blue"></i><span>&nbsp; {{$vehicle->seating_capacity}} Persons</span>
							</li>
							<li>
								<i class="fas fa-car fa-lg  blue"></i><span>&nbsp; {{$vehicle->carBodyType->name ?? ''}}</span>
							</li>
							<li>
								<i class="fas fa-gas-pump  blue"></i><span> @if($vehicle->fuelTypes->count() > 0)
									<ul>&nbsp;
										@foreach($vehicle->fuelTypes as $fuelType)
											{{ $fuelType->name }} &nbsp;
										@endforeach
									</ul>
								@else
								&nbsp; Gas
								@endif</span>
							</li>
							<li>
								<i class="fas fa-cogs  blue"></i><span>&nbsp; {{$vehicle->engine_capacity ?? ''}} CC</span>
							</li>
						</ul>
						<div class="car__footer">
							<span class="car__price">{{currency()}} {{$vehicle->price_per_day ?? ''}} <sub>/ {{ _lang('Day')}}</sub></span>
						
							<a href="{{ route('single.vehicle', ['id' => $encryptedId]) }}" class="car__more"><span>{{ _lang('View Details')}}</span></a>
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
						<h2>{{ _lang('Our Blog')}}</h2>
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

