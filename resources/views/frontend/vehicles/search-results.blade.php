
@extends('frontend.layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
					<li class="breadcrumbs__item"><a href="/">{{ _lang('Home')}} </a></li>
						<li class="breadcrumbs__item breadcrumbs__item--active">{{ _lang('Rent A Car')}} </li>

					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>{{ _lang('Rent A Car')}}</h1>
                        <p>
						{!! _lang('Discover the perfect vehicle for your journey from our extensive collection of available cars. Whether you re planning a weekend getaway or a business trip, we have a range of options to suit your needs. Browse our selection below and find your ideal ride for your next adventure.') !!}	
                        </p>

						 
					</div>
				</div>
				<!-- end title -->
			</div>
<div class="container">
	
			<div class="row">
				<!-- sidebar -->
				<div class="col-12 col-xl-3 order-xl-1">
				<form action="{{ route('search') }}" method="GET">
					<div class="filter-wrap">
						<button class="filter-wrap__btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter"><span>{{ _lang('Open filter')}}</span></button>

						<div class="collapse filter-wrap__content" id="collapseFilter">
							<!-- filter -->
							<div class="filter filter--left filter--sticky">
								<h4 class="filter__title">{{ _lang('Filters')}} <button type="button"> {{ _lang('Clear all')}}</button></h4>

								<div class="filter__group">
									<label class="filter__label">{{ _lang('Keyword:')}}</label>
									<input type="text" name="keyword" class="filter__input" placeholder="Keyword">
								</div>

								<div class="filter__group">
									<label for="filter__category" class="filter__label">{{ _lang('Brands:')}}</label>

									<div class="filter__select-wrap">
										<select name="brand_id" id="filter__category" class="filter__select" required>
											<option value="">{{ _lang('Select One')}}</option>
											{{ create_option("car_brands", "id", "name", old('brand_id')) }}
										</select>
									
									</div>
								</div>

								<div class="filter__group">
									<button class="filter__btn" type="submit"><span>{{ _lang('APPLY FILTER')}}</span></button>
								</div>
							</div>
							<!-- end filter -->
						</div>
					</div>
					</form>
				</div>
				<!-- end sidebar -->

				<!-- content -->
				<div class="col-12 col-xl-9 order-xl-2">
					<div class="row">
					@forelse($vehicles as $vehicle)
				<!-- car -->
				<div class="col-12 col-md-6 col-xl-6">
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
										<img src="{{ asset($image->thumbnail_path) }}" alt="Vehicle Image" style=" width: 100%;
    margin: 0 auto;
    display: flex;
    height: 250px;
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
							<span class="car__price">{{currency()}} {{$vehicle->price_per_km ?? ''}} <sub>/ km</sub></span>
						
							<a href="{{route('single.vehicle', $vehicle->id)}}" class="car__more"><span>{{ _lang('View Details')}}</span></a>
						</div>
					</div>
				</div>
				<!-- end car -->

                @empty

               <div class="justify-content-center">
               <div class="">
						<img width="200px" src="{{asset('frontend/img/logo_light.svg')}}" alt="">
					</div>
                    <div class="alert alert-warning" role="alert">
            <p>Sorry, no vehicles found matching your search criteria. Here are some suggestions:</p>
            <ul>
                <li>Double-check your spelling and try again.</li>
                <li>Try using different Brands.</li>
                <li>Contact our support team for assistance.</li>
            </ul>
        </div>
               </div>

                @endforelse

					</div>
                    <div class="pagination justify-content-center mt-5">
     {{ $vehicles->links('vendor.pagination.bootstrap-5') }}
</div>
				</div>
				<!-- end content -->
			</div>
		</div>
	
@endsection

