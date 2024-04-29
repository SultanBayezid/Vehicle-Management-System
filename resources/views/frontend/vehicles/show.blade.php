
@extends('frontend.layouts.app')

@section('content')

<div class="container">
			<section class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="index-2.html">{{ _lang('Home')}}</a></li>
						<li class="breadcrumbs__item"><a href="{{route('rent')}}">{{ _lang('Explore cars')}}</a></li>
						<li class="breadcrumbs__item breadcrumbs__item--active">{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? ''}} {{$vehicle->myear->year ?? ''}} </li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? ''}}</h1>
					</div>
				</div>
				<!-- end title -->

				<!-- details -->
				<div class="col-12 col-lg-7">
					<div class="details">
						<div class="splide splide--details details__slider">
							<div class="splide__arrows">
								<button class="splide__arrow splide__arrow--prev" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"></path></svg></button>
								<button class="splide__arrow splide__arrow--next" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path></svg></button>
							</div>

							<div class="splide__track">
								<ul class="splide__list">
								@foreach($vehicle->images as $image)
									<li class="splide__slide">
										<img src="{{ asset($image->path) }}" alt="">
									</li>
									@endforeach
								
								</ul>
							</div>
						</div>

						<ul id="thumbnails" class="thumbnails">
						@foreach($vehicle->images as $image)
							<li class="thumbnail">
								<img src="{{ asset($image->path) }}" alt="">
							</li>
							@endforeach
				
						</ul>
					</div>
				</div>
				<!-- end details -->
				@if(auth()->check())
    			<!-- offer -->
				<div class="col-12 col-lg-5">
					<div class="offer">
						<span class="offer__title">Fare</span>
						<div class="offer__wrap">
						@php $encryptedId = Crypt::encrypt($vehicle->id); @endphp
							<span class="offer__price"> {{currency()}} {{$vehicle->price_per_day}}<sub>/ day</sub></span>
							<a class="offer__rent" href="{{ route('enquiry', ['id' => $encryptedId]) }}">{{ _lang('Enquiry')}}</a>

							
						</div>

						<span class="offer__title"> {{ _lang('Car details')}}</span>
						<ul class="offer__list">
							<li>
								<span class="offer__list-name">{{ _lang('Brand')}} </span>
								<span class="offer__list-value offer__list-value--dark">{{$vehicle->brand->name ?? ''}}</span>
							</li>
							<li>
								<span class="offer__list-name">{{ _lang('Model')}}</span>
								<span class="offer__list-value">{{$vehicle->model->name ?? ''}}</span>
							</li>
							<li>
								<span class="offer__list-name">{{ _lang('Manufacture Year')}}</span>
								<span class="offer__list-value">{{$vehicle->myear->year ?? ''}}</span>
							</li>
							<li>
								<span class="offer__list-name">{{ _lang('Engine Capacity')}}</span>
								<span class="offer__list-value">{{$vehicle->engine_capacity ?? ''}}</span>
							</li>
							<li>
								<span class="offer__list-name">{{ _lang('Body Type')}}</span>
								<span class="offer__list-value">{{$vehicle->carBodyType->name ?? ''}}</span>
							</li>
							<li>
								<span class="offer__list-name">{{ _lang('Fuel Type')}}</span>
								<span class="offer__list-value offer__list-value--dark">
								@if($vehicle->fuelTypes->count() > 0)
									<ul>
										@foreach($vehicle->fuelTypes as $fuelType)
											{{ $fuelType->name }} 
										@endforeach
									</ul>
								@else
									<p>No fuel types associated with this vehicle.</p>
								@endif

									
								
								</span>
							</li>
							<li>
								<span class="offer__list-name"> {{ _lang('Seating Capacity')}}</span>
								<span class="offer__list-value offer__list-value--dark">{{$vehicle->seating_capacity ?? ''}} {{ _lang('Persons')}}</span>
							</li>
						</ul>

						<!-- <span class="offer__title">Driver Details</span>
						<ul class="offer__list">
							<li>
							<span class="offer__list-name">Name</span>
							<span class="offer__list-value offer__list-value--dark">{{$vehicle->driver->name ?? ''}} </span>
							</li>
							<li>
							<span class="offer__list-name">Phone</span>
							<span class="offer__list-value offer__list-value--dark">{{$vehicle->driver->phone_number ?? ''}} </span>
							</li>
						</ul> -->

						<span class="offer__title"> {{ _lang('Share')}} </span>
						<div class="offer__share">
							<a href="#" class="offer__share-link offer__share-link--fb"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.56341 16.8197V8.65888H7.81615L8.11468 5.84663H5.56341L5.56724 4.43907C5.56724 3.70559 5.63693 3.31257 6.69042 3.31257H8.09873V0.5H5.84568C3.1394 0.5 2.18686 1.86425 2.18686 4.15848V5.84695H0.499939V8.6592H2.18686V16.8197H5.56341Z"></path></svg> share</a>
							<a href="#" class="offer__share-link offer__share-link--tw"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.55075 3.19219L7.58223 3.71122L7.05762 3.64767C5.14804 3.40404 3.47978 2.57782 2.06334 1.1902L1.37085 0.501686L1.19248 1.01013C0.814766 2.14353 1.05609 3.34048 1.843 4.14552C2.26269 4.5904 2.16826 4.65396 1.4443 4.38914C1.19248 4.3044 0.972149 4.24085 0.951164 4.27263C0.877719 4.34677 1.12953 5.31069 1.32888 5.69202C1.60168 6.22165 2.15777 6.74068 2.76631 7.04787L3.28043 7.2915L2.67188 7.30209C2.08432 7.30209 2.06334 7.31268 2.12629 7.53512C2.33613 8.22364 3.16502 8.95452 4.08833 9.2723L4.73884 9.49474L4.17227 9.8337C3.33289 10.321 2.34663 10.5964 1.36036 10.6175C0.888211 10.6281 0.5 10.6705 0.5 10.7023C0.5 10.8082 1.78005 11.4014 2.52499 11.6344C4.75983 12.3229 7.41435 12.0264 9.40787 10.8506C10.8243 10.0138 12.2408 8.35075 12.9018 6.74068C13.2585 5.88269 13.6152 4.315 13.6152 3.56293C13.6152 3.07567 13.6467 3.01212 14.2343 2.42953C14.5805 2.09056 14.9058 1.71983 14.9687 1.6139C15.0737 1.41264 15.0632 1.41264 14.5281 1.59272C13.6362 1.91049 13.5103 1.86812 13.951 1.39146C14.2762 1.0525 14.6645 0.438131 14.6645 0.258058C14.6645 0.22628 14.5071 0.279243 14.3287 0.374576C14.1398 0.480501 13.7202 0.639389 13.4054 0.734722L12.8388 0.914795L12.3247 0.565241C12.0414 0.374576 11.6427 0.162725 11.4329 0.0991699C10.8978 -0.0491255 10.0794 -0.0279404 9.59673 0.14154C8.2852 0.618204 7.45632 1.84694 7.55075 3.19219Z"></path></svg> tweet</a>
							<a href="#" class="offer__share-link offer__share-link--link"><svg width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8,12a1,1,0,0,0,1,1h6a1,1,0,0,0,0-2H9A1,1,0,0,0,8,12Zm2,3H7A3,3,0,0,1,7,9h3a1,1,0,0,0,0-2H7A5,5,0,0,0,7,17h3a1,1,0,0,0,0-2Zm7-8H14a1,1,0,0,0,0,2h3a3,3,0,0,1,0,6H14a1,1,0,0,0,0,2h3A5,5,0,0,0,17,7Z"></path></svg> <span>link</span></a>
						</div>
					</div>
				</div>
				<!-- end offer -->
@else
<div class="col-12 col-lg-5">
					<div class="offer">
				

						<span class="offer__title"> {{ _lang('Car details')}}</span>
						<a class="btn btn-primary" href="{{ route('login') }}"> {{ _lang('Login to view complete details.')}}</a>
						<ul class="offer__list">
					
							<li>
								<span class="offer__list-name"> </span>
								<span class="offer__list-value offer__list-value--dark"></span>
								
							</li>
						</ul>

		
					</div>
				</div>
				<!-- end offer -->
@endif

	
			</section>
		</div>

		<div class="container">
			<!-- cars -->
			<section class="row">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2> {{ _lang('You may also like')}} </h2>

						<a href="{{route('rent')}}" class="main__link">{{_lang('View more')}} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></a>
					</div>
				</div>
				<!-- end title -->

				<!-- car -->
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
									@foreach($vehicle->images as $image)
									<li class="splide__slide">
										<img src="{{ asset($image->path) }}" alt="Vehicle Image" style=" width: 100%;
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
							<h3 class="car__name"><a href="{{ route('single.vehicle', ['id' => $encryptedId]) }}">{{$vehicle->brand->name ?? '' }} {{$vehicle->model->name ?? '' }}</a></h3>
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
							<span class="car__price">{{currency()}} {{$vehicle->price_per_km ?? ''}} <sub>/ km</sub></span>
						
							<a href="{{ route('single.vehicle', ['id' => $encryptedId]) }}" class="car__more"><span>View Details</span></a>
						</div>
					</div>
				</div>
				<!-- end car -->

                @endforeach


			
			</section>
			<!-- end cars -->
		</div>
	
@endsection

