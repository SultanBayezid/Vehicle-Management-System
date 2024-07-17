
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
						<li class="breadcrumbs__item"><a href="index-2.html">{{ _lang('Home')}}</a></li>
						<li class="breadcrumbs__item breadcrumbs__item--active">{{ _lang('Contacts')}}</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

	<!-- title -->
    <div class="col-12 col-xl-11">
					<div class="main__title main__title--page">
						<h1>{{ _lang('Contacts')}}</h1>
                        <p>
						{!! _lang('Thank you for your interest in Omniverse Dynamics. We appreciate your inquiries, feedback, and potential collaboration opportunities. Please do not hesitate to reach out to us using the contact information provided below, and we will be delighted to assist you.') !!}	
                        </p>

						 
					</div>
				</div>
				<!-- end title -->
			</div>

			<div class="row">
				<div class="col-12 col-lg-7 col-xl-7">
                    <p class="main__title main__title--page"> {{ _lang('Please fill out the form below and we will get back to you as soon as possible')}} </p>
					<form action="{{route('enquirySend')}}" class="sign__form sign__form--contacts" method="POST">
						@csrf
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="sign__group">
									<input type="text" name="name" value="{{Auth()->user()->name ?? ''}}" class="sign__input  @error('name') is-invalid @enderror" placeholder="{{ _lang('Name')}}">
									@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								   @enderror
</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="sign__group">
									<input type="number" value="{{Auth()->user()->phone ?? ''}}" name="phone" class="sign__input @error('phone') is-invalid @enderror" placeholder="{{ _lang('Phone')}}">
									@error('phone')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								   @enderror</div>
							</div>

							<div class="col-12">
								<div class="sign__group">
								<input type="text" name="subject" class="sign__input @error('subject') is-invalid @enderror" placeholder="{{ _lang('Subject') }}" value="{{ isset($subject) ? $subject : '' }}">
								@error('subject')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								   @enderror
								</div>
							</div>

							<div class="col-12">
								<div class="sign__group">
								<textarea name="message" class="sign__textarea @error('message') is-invalid @enderror" placeholder="{{ _lang('Type Your Message') }}">{!! isset($message) ? $message : '' !!}</textarea>

								@error('message')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								   @enderror

								</div>
							</div>

							<div class="col-12 col-xl-3">
								<button type="submit" class="sign__btn"><span>{{ _lang('Send')}}</span></button>
							</div>
						</div>
					</form>	
				</div>

				<div class="col-12 col-md-6 col-lg-5 col-xl-4 offset-xl-1">
    <div class="main__title main__title--sidebar">
        <h2>{{ _lang('Office') }}</h2>
        
        <p>{{ _lang('<strong>Omniverse Dynamics</strong> <br>Porgona bazar, Sylhet - 3103') }}</p>
        <br>
        
        <h4>{{ _lang('General Inquiries') }}</h4>
        <p>{{ _lang('For general inquiries or questions about our services, please email us at contact@omniversedynamics.com or call us at +8801736374073') }}</p>
        <br>
        
        <h4>{{ _lang('Customer Support') }}</h4>
        <p>{{ _lang('If you need assistance with our products or services, our dedicated customer support team is here to help. You can reach them via email at support@omniversedynamics.com or by phone at +88+1 555 123 4567.') }}</p>
    </div>
</div>

				
				</div>
			</div>

		</div>
	
@endsection

