@extends('backend.layouts.header')

@section('content')
<style>
    .car-block-two {
    position: relative;
    padding-bottom: 20px;
    border-bottom: 1px solid #f0f0f0;
    margin-bottom: 40px;
}

.car-block-two .inner-box .image-column {
    position: relative;
    margin-bottom: 20px;
}

.car-block-two .inner-box .image {
    position: relative;
    text-align: center;
    border: 1px solid #f0f0f0;
}

.car-block-two .inner-box .content-column {
    position: relative;
    margin-bottom: 10px;
}

.car-block-two .inner-box .content-column h3 {
    position: relative;
    font-size: 22px;
    font-weight: 600;
    text-transform: capitalize;
    margin-top: -5px;
}

.car-block-two .inner-box .content-column .price {
    position: relative;
    display: inline-block;
    color:#333;
    font-size: 16px;
    font-weight: 300;
    padding: 3px 15px;
    line-height: 24px;
    margin-top: 12px;
    font-family: 'Montserrat', sans-serif;
    transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
}

.car-block-two .inner-box .content-column .info-box {
    position: relative;
    padding: 20px 0px;
}
.car-block-two .inner-box .content-column .lower-box {
    position: relative;
    padding-top: 3px;
}
.car-block-two .inner-box .content-column .compare-check {
    position: absolute;
    right: 15px;
    top: 0px;
    z-index: 1;
}
.car-block-two .inner-box .info-box .car-info {
    position: relative;
    font-family: 'Montserrat', sans-serif;
}
ul, li {
    list-style: none;
    padding: 0px;
    margin: 0px;
}

.car-block-two .inner-box .info-box .car-info li .info-title {
    position: relative;
    display: block;
    font-weight: 400;
    color: #848484;
}

.car-block-two .inner-box .info-box .car-info li {
    position: relative;
    color: #232527;
    font-size: 14px;
    line-height: 20px;
    min-height: 40px;
    padding-left: 24px;
    padding-right: 12px;
    margin-right: 10px;
    display: inline-block;
    border-right: 1px solid #eaeaea;
}
.car-block-two .inner-box .info-box .car-info li .icon {
    position: absolute;
    line-height: 24px;
    color: #0048d8;
    font-size: 16px;
    left: 0px;
    top: 50%;
    margin-top: -12px;
}

.btn-style-four {
    position: relative;
    padding: 8px 20px;
    line-height: 24px;
    color: #282328;
    text-align: center;
    font-size: 14px;
    font-weight: 600;
    background: #f2f2f2;
    letter-spacing: 0px;
    text-transform: uppercase;
    font-family: 'Montserrat', sans-serif;
}

.car-block-two .inner-box .content-column .lower-box .btns-box {
    position: relative;
    float: left;
}

.car-block-two .inner-box .content-column h3 {
    position: relative;
    font-size: 22px;
    font-weight: 600;
    text-transform: capitalize;
    margin-top: -5px;
}
.car-block-two .inner-box .content-column {
    position: relative;
    margin-bottom: 10px;
}

.car-block-two .inner-box .content-column {
    position: relative;
    margin-bottom: 10px;
}
</style>
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Vehicles') }} </h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Vehicles') }}</li>
        </ol>
    </nav>

    <div class="row">
        @foreach($vehicles as $vehicle)
    
        <div class="car-block-two text-center">
                        <div class="inner-box">
                        	<div class="row clearfix">
                            	<div class="image-column col-md-4 col-sm-4 col-xs-12">
                                    <div class="image">
                                        <a href="#">
                                            
                                        @if($vehicle->images->isNotEmpty())
    <img src="{{ asset($vehicle->images->first()->path) }}" alt="Vehicle Image" style="object-fit: cover; width: 100%; height: 200px;">
@endif


</a>
                                        
                                    </div>
                                </div>
                                <div class="content-column col-md-8 col-sm-8 col-xs-12">
                                    <h3>{{$vehicle->brand->name }} {{$vehicle->model->name }} {{$vehicle->myear->year }}</h3>
                                    <div class="price">{{currency()}}{{ $vehicle->price_per_km }}/{{ _lang('KM') }}  |  {{currency()}}{{ $vehicle->price_per_day }}/{{ _lang('Day') }}</div>
                                    <div class="info-box">
                                        <ul class="car-info">
                                            <li><span class="fa fa-road icon"></span><span class="info-title">{{ _lang('Mileage') }}</span>{{$vehicle->mileage }}</li>
                                            <li><span class="icon fa fa-car"></span><span class="info-title">{{ _lang('Fuel') }}</span>	@foreach($vehicle->fuelTypes as $fuelType)
											{{ $fuelType->name }} 
										@endforeach</li>
                                            <li><span class="icon fas fa-clock"></span><span class="info-title">{{ _lang('Manufacture Year') }}</span>{{$vehicle->manufacture_year }}</li>
                                            <li><span class="fa fa-gears icon"></span><span class="info-title">{{ _lang('Transmission') }}</span>{{$vehicle->transmission->name ?? '' }}</li>
                                            <li><span class="icon fas fa-cogs"></span><span class="info-title">{{ _lang('Engine Capacity') }}</span>{{$vehicle->engine_capacity }}</li>
                                        </ul>
                                    </div>
                               
                           
                                  
                                </div>
                            </div>
                        </div>
                   
        </div>
  @endforeach

</div>
                 
 </div>



@endsection
