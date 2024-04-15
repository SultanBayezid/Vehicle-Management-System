
@extends('frontend.layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="/">Home</a></li>
						<li class="breadcrumbs__item breadcrumbs__item">Services</li>
						<li class="breadcrumbs__item breadcrumbs__item--active">Rent A Car</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>Rent A Car</h1>
                        <p>
						Discover the perfect vehicle for your journey from our extensive collection of available cars. Whether you're planning a weekend getaway or a business trip, we have a range of options to suit your needs. Browse our selection below and find your ideal ride for your next adventure.
                        </p>

						 
					</div>
				</div>
				<!-- end title -->
			</div>
<div class="container">
	
			<div class="row">
				<!-- sidebar -->
				<div class="col-12 col-xl-3 order-xl-1">
					<div class="filter-wrap">
						<button class="filter-wrap__btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter"><span>Open filter</span></button>

						<div class="collapse filter-wrap__content" id="collapseFilter">
							<!-- filter -->
							<div class="filter filter--left filter--sticky">
								<h4 class="filter__title">Filters <button type="button">Clear all</button></h4>

								<div class="filter__group">
									<label class="filter__label">Keyword:</label>
									<input type="text" class="filter__input" placeholder="Keyword">
								</div>

								<div class="filter__group">
									<label for="filter__category" class="filter__label">Brands:</label>

									<div class="filter__select-wrap">
										<select name="filter__category" id="filter__category" class="filter__select">
											<option value="All categories">All brands</option>
											<option value="1">Audi</option>
											<option value="2">BMW</option>
											<option value="3">Cadillac</option>
											<option value="4">Chevrolet</option>
											<option value="5">Dodge</option>
											<option value="6">Ferrari</option>
											<option value="7">Ford</option>
											<option value="8">Honda</option>
											<option value="9">Hyundai</option>
											<option value="10">Jaguar</option>
											<option value="11">Jeep</option>
											<option value="12">Lexus</option>
											<option value="13">Mitsubishi</option>
											<option value="14">Porsche</option>
											<option value="15">Subaru</option>
											<option value="16">Tesla</option>
											<option value="17">Toyota</option>
											<option value="18">Volkswagen</option>
										</select>
									</div>
								</div>

								<div class="filter__group">
									<label class="filter__label">Transmission:</label>
									<ul class="filter__checkboxes">
										<li>
											<input id="type5" type="checkbox" name="type5" checked="">
											<label for="type5">Automatic</label>
										</li>
										<li>
											<input id="type6" type="checkbox" name="type6">
											<label for="type6">Manual</label>
										</li>
									</ul>
								</div>

								<div class="filter__group">
									<label class="filter__label">Fuel:</label>
									<ul class="filter__checkboxes">
										<li>
											<input id="type8" type="checkbox" name="type8">
											<label for="type8">Diesel</label>
										</li>
										<li>
											<input id="type9" type="checkbox" name="type9">
											<label for="type9">Hybrid</label>
										</li>
										<li>
											<input id="type10" type="checkbox" name="type10">
											<label for="type10">Gas</label>
										</li>
										<li>
											<input id="type11" type="checkbox" name="type11">
											<label for="type11">Eletric</label>
										</li>
									</ul>
								</div>

								<div class="filter__group">
									<button class="filter__btn" type="button"><span>APPLY FILTER</span></button>
								</div>
							</div>
							<!-- end filter -->
						</div>
					</div>
				</div>
				<!-- end sidebar -->

				<!-- content -->
				<div class="col-12 col-xl-9 order-xl-2">
					<div class="row">
					@foreach($vehicles as $vehicle )
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
						
							<a href="{{route('single.vehicle', $vehicle->id)}}" class="car__more"><span>View Details</span></a>
						</div>
					</div>
				</div>
				<!-- end car -->

                @endforeach

					</div>
				</div>
				<!-- end content -->
			</div>
		</div>
	
@endsection

