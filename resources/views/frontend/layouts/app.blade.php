<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/splide.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/slimselect.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<meta name="description" content="Ominiverse Dynamaics">
	<meta name="keywords" content="">
	<meta name="author" content="Ominiverse Dynamaics">
	<title> {{ get_option('site_title', config('app.name')) }}</title>
	<style>
		.mr2 {
    margin-left: 10px;
}
	</style>

</head>
<body>
	<!-- header -->
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
					<div class="header__logo">
							<a href="{{route('home')}}">
								<img src="{{asset('frontend/img/logo.png')}}" alt="">
							</a>
						</div>

						<div class="header__menu">
							<ul class="header__nav">
					
								<li class="header__nav-item">
									<a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ _lang('FEATURES')}} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z"/></svg></a>

									<ul class="dropdown-menu header__nav-menu">
										<li><a href="/fleet-management">{{_lang('FLEET MANAGEMENT')}}</a></li>
										<li><a href="/trip-management">{{ _lang('TRIP MANAGEMENT') }}</a></li>
										<li><a href="/financial-management">{{ _lang('FINANCIAL MANAGEMENT') }}</a></li>
										<li><a href="/contact-management"> {{ _lang('CONTACT MANAGEMENT') }}</a></li>

									</ul>
								</li>
								<li class="header__nav-item">
									<a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ _lang('SERVICES')}}  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z"/></svg></a>

									<ul class="dropdown-menu header__nav-menu">
										<li><a href="{{route('rent')}}">{{ _lang('RENT A CAR')}} </a></li>
						

									</ul>
								</li>
							
								<li class="header__nav-item">
									<a href="{{route('pricing')}}" class="header__nav-link"> {{ _lang('PRICING')}} </a>
								</li>
					
								<li class="header__nav-item">
									<a href="{{route('contactus')}}" class="header__nav-link"> {{ _lang('CONTACT')}} </a>
								</li>
							
							</ul>
						</div>

						<div class="header__actions">
						@unless(auth()->check())
						<div class="">
						<div class="">


						@php
$currentLanguage = session('language');

// If no session language is set, set it to a default language
if (!$currentLanguage) {
    $defaultLanguage = 'English'; // Change 'english' to your desired default language
    session(['language' => $defaultLanguage]);
    $currentLanguage = $defaultLanguage;
}

$languageDropdown = '<div class="dropdown">';
$languageDropdown .= '<a class="footer__lang-btn dropdown-toggle" href="#" role="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">';
$languageDropdown .= '<img width="20" id="selectedFlag" src="' . asset('frontend/img/flags/' . $currentLanguage . '.png') . '" alt="' . $currentLanguage . ' Flag">';
$languageDropdown .= '<span id="selectedLanguage">' . ucfirst($currentLanguage) . '</span>';
$languageDropdown .= '</a>';
$languageDropdown .= '<ul class="dropdown-menu footer__lang-dropdown" aria-labelledby="languageDropdown">';

foreach(glob(resource_path('language/*.php')) as $file) {
    $langCode = basename($file, '.php');
    
    // Exclude language.php file
    if ($langCode === 'language') {
        continue;
    }
    
    $flagPath = asset('frontend/img/flags/'.$langCode.'.png');
    $languageDropdown .= '<li>';
    $languageDropdown .= '<a class="' . ($langCode == $currentLanguage ? ' active' : '') . '" href="#" onclick="setLanguage(\'' . $langCode . '\')">';
    $languageDropdown .= '<img width="30" src="' . $flagPath . '" alt="' . $langCode . ' Flag">';
    $languageDropdown .= ucfirst($langCode);
    $languageDropdown .= '</a>';
    $languageDropdown .= '</li>';
}

$languageDropdown .= '</ul>';
$languageDropdown .= '</div>';
echo $languageDropdown;
@endphp


<form id="languageForm" action="{{ route('setLanguage') }}" method="POST" style="display: none;">
@csrf
<input type="hidden" name="language" id="languageInput">
</form>


</div>
							</div>
							@endunless
							<div class="header__action">
								<a class="header__profile-btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-user"></i>
								</a>

								
								<!-- Display dropdown menu for account options -->
								<ul class="dropdown-menu header__profile-menu">
    @if (auth()->check())
        @if (auth()->user()->user_type == 'user')
            <!-- Display Admin options -->
            <li>
                <strong>{{ auth()->user()->name }}</strong>
            </li>
            <li><a href="{{'dashboard'}}"><i class="far fa-paper-plane fa-lg text-primary"></i> <span class="mr2">{{ _lang('Dashboard')}}</span></a>
		
		</li>

        @elseif (auth()->user()->user_type == 'client')
            <!-- Display Client options -->
            <li>
                <strong>{{ auth()->user()->name }}</strong>
            </li>
          
            
        @else
            <!-- Unknown user type, display default options -->
            <li>
                <strong>{{ auth()->user()->name }}</strong>
            </li>
			<li><a href="{{'dashboard'}}"><i class="far fa-paper-plane fa-lg text-primary"></i> <span class="mr2">{{ _lang('Dashboard')}}</span></a>
        @endif
        <!-- Common logout option for all users -->
        <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-lg text-primary"></i>
                    <span class="mr2"> {{ _lang('Sign Out')}}</span>
                </a>
            </form>
        </li>
    @else
        <!-- Display login and registration options for guests -->
        <li><a href="{{ route('login') }}"><i class="fas fa-lock text-primary"></i> <span class="mr2">{{ _lang('Sign In')}}</span></a></li>
        <li><a href="{{ route('register') }}"><i class="fas fa-user-plus  text-primary"></i> <span class="mr2"> {{ _lang('Register')}}</span></a></li>
    @endif
</ul>


							</div>
						</div>

						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->

	<!-- main content -->
	<main class="main">
		
	@if(session('success'))
    <div class="container">
        <div class="row">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container">
        <div class="row">
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif
        @yield('content')
			<!-- end news -->
	</main>
	<!-- end main content -->

	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
					<div class="footer__logo">
						<img src="{{asset('frontend/img/logo_light.png')}}" alt="">
					</div>

					<p class="footer__tagline"> {!! _lang('Omniverse Dynamics are specialize in simplifying business operations. Think of us as the wizards behind the scenes, making sure everything runs smoothly. From managing vehicles to organizing trips, staying connected with contacts, and handling finances wisely, we have got it covered. Our goal is to make complex tasks feel effortless, like magic! So, whether its managing fleets, planning trips, keeping in touch, or staying financially savvy, businesses trust us to handle it all with professionalism and ease.') !!} </p>

					
				</div>

				<div class="col-6 col-md-4 col-lg-3 col-xl-2 order-1 order-md-2 order-lg-2 order-xl-3 offset-md-2 offset-lg-0">
					<h6 class="footer__title">{{ _lang('Company')}}</h6>
					<div class="footer__nav">
						<a href="#">{{ _lang('About Us')}}</a>
						<a href="#">{{ _lang('Pricing Plan')}}</a>
						<a href="#">{{ _lang('Blogs')}}</a>
						<a href="#">{{ _lang('Contacts')}}</a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="footer__content">
						<div class="footer__social">
							<a href="#" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.9,2H3.1A1.1,1.1,0,0,0,2,3.1V20.9A1.1,1.1,0,0,0,3.1,22h9.58V14.25h-2.6v-3h2.6V9a3.64,3.64,0,0,1,3.88-4,20.26,20.26,0,0,1,2.33.12v2.7H17.3c-1.26,0-1.5.6-1.5,1.47v1.93h3l-.39,3H15.8V22h5.1A1.1,1.1,0,0,0,22,20.9V3.1A1.1,1.1,0,0,0,20.9,2Z"/></svg></a>

							<a href="#" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.34,5.46h0a1.2,1.2,0,1,0,1.2,1.2A1.2,1.2,0,0,0,17.34,5.46Zm4.6,2.42a7.59,7.59,0,0,0-.46-2.43,4.94,4.94,0,0,0-1.16-1.77,4.7,4.7,0,0,0-1.77-1.15,7.3,7.3,0,0,0-2.43-.47C15.06,2,14.72,2,12,2s-3.06,0-4.12.06a7.3,7.3,0,0,0-2.43.47A4.78,4.78,0,0,0,3.68,3.68,4.7,4.7,0,0,0,2.53,5.45a7.3,7.3,0,0,0-.47,2.43C2,8.94,2,9.28,2,12s0,3.06.06,4.12a7.3,7.3,0,0,0,.47,2.43,4.7,4.7,0,0,0,1.15,1.77,4.78,4.78,0,0,0,1.77,1.15,7.3,7.3,0,0,0,2.43.47C8.94,22,9.28,22,12,22s3.06,0,4.12-.06a7.3,7.3,0,0,0,2.43-.47,4.7,4.7,0,0,0,1.77-1.15,4.85,4.85,0,0,0,1.16-1.77,7.59,7.59,0,0,0,.46-2.43c0-1.06.06-1.4.06-4.12S22,8.94,21.94,7.88ZM20.14,16a5.61,5.61,0,0,1-.34,1.86,3.06,3.06,0,0,1-.75,1.15,3.19,3.19,0,0,1-1.15.75,5.61,5.61,0,0,1-1.86.34c-1,.05-1.37.06-4,.06s-3,0-4-.06A5.73,5.73,0,0,1,6.1,19.8,3.27,3.27,0,0,1,5,19.05a3,3,0,0,1-.74-1.15A5.54,5.54,0,0,1,3.86,16c0-1-.06-1.37-.06-4s0-3,.06-4A5.54,5.54,0,0,1,4.21,6.1,3,3,0,0,1,5,5,3.14,3.14,0,0,1,6.1,4.2,5.73,5.73,0,0,1,8,3.86c1,0,1.37-.06,4-.06s3,0,4,.06a5.61,5.61,0,0,1,1.86.34A3.06,3.06,0,0,1,19.05,5,3.06,3.06,0,0,1,19.8,6.1,5.61,5.61,0,0,1,20.14,8c.05,1,.06,1.37.06,4S20.19,15,20.14,16ZM12,6.87A5.13,5.13,0,1,0,17.14,12,5.12,5.12,0,0,0,12,6.87Zm0,8.46A3.33,3.33,0,1,1,15.33,12,3.33,3.33,0,0,1,12,15.33Z"/></svg></a>

							<a href="#" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,5.8a8.49,8.49,0,0,1-2.36.64,4.13,4.13,0,0,0,1.81-2.27,8.21,8.21,0,0,1-2.61,1,4.1,4.1,0,0,0-7,3.74A11.64,11.64,0,0,1,3.39,4.62a4.16,4.16,0,0,0-.55,2.07A4.09,4.09,0,0,0,4.66,10.1,4.05,4.05,0,0,1,2.8,9.59v.05a4.1,4.1,0,0,0,3.3,4A3.93,3.93,0,0,1,5,13.81a4.9,4.9,0,0,1-.77-.07,4.11,4.11,0,0,0,3.83,2.84A8.22,8.22,0,0,1,3,18.34a7.93,7.93,0,0,1-1-.06,11.57,11.57,0,0,0,6.29,1.85A11.59,11.59,0,0,0,20,8.45c0-.17,0-.35,0-.53A8.43,8.43,0,0,0,22,5.8Z"/></svg></a>

							<a href="#" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22.26465,2.42773a2.04837,2.04837,0,0,0-2.07813-.32421L2.26562,9.33887a2.043,2.043,0,0,0,.1045,3.81836l3.625,1.26074,2.0205,6.68164A.998.998,0,0,0,8.134,21.352c.00775.012.01868.02093.02692.03259a.98844.98844,0,0,0,.21143.21576c.02307.01758.04516.03406.06982.04968a.98592.98592,0,0,0,.31073.13611l.01184.001.00671.00287a1.02183,1.02183,0,0,0,.20215.02051c.00653,0,.01233-.00312.0188-.00324a.99255.99255,0,0,0,.30109-.05231c.02258-.00769.04193-.02056.06384-.02984a.9931.9931,0,0,0,.20429-.11456,250.75993,250.75993,0,0,1,.15222-.12818L12.416,18.499l4.03027,3.12207a2.02322,2.02322,0,0,0,1.24121.42676A2.05413,2.05413,0,0,0,19.69531,20.415L22.958,4.39844A2.02966,2.02966,0,0,0,22.26465,2.42773ZM9.37012,14.73633a.99357.99357,0,0,0-.27246.50586l-.30951,1.504-.78406-2.59307,4.06525-2.11695ZM17.67188,20.04l-4.7627-3.68945a1.00134,1.00134,0,0,0-1.35352.11914l-.86541.9552.30584-1.48645,7.083-7.083a.99975.99975,0,0,0-1.16894-1.59375L6.74487,12.55432,3.02051,11.19141,20.999,3.999Z"/></svg></a>
							
							<a href="#" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.43451,14.15552a9.586,9.586,0,0,0,.21155-2.02631,9.47653,9.47653,0,0,0-9.54029-9.42254,9.11414,9.11414,0,0,0-1.62494.14178A5.53558,5.53558,0,0,0,2.00061,7.466a5.42884,5.42884,0,0,0,.75354,2.7558,10.0197,10.0197,0,0,0-.18866,1.88452,9.33889,9.33889,0,0,0,9.54028,9.25788,8.56663,8.56663,0,0,0,1.74268-.16584A5.57942,5.57942,0,0,0,16.46368,22a5.433,5.433,0,0,0,4.97083-7.84448ZM16.43964,15.9931a3.63146,3.63146,0,0,1-1.62488,1.22473,6.33963,6.33963,0,0,1-2.52033.44709,6.21683,6.21683,0,0,1-2.89764-.61176,3.733,3.733,0,0,1-1.31964-1.17779,2.574,2.574,0,0,1-.494-1.41339.88041.88041,0,0,1,.30646-.68384,1.09008,1.09008,0,0,1,.77643-.28247.94433.94433,0,0,1,.637.2127,1.793,1.793,0,0,1,.44708.65863,3.39792,3.39792,0,0,0,.49518.87256,1.78964,1.78964,0,0,0,.72955.56488,3.01435,3.01435,0,0,0,1.24872.23554,2.9217,2.9217,0,0,0,1.71985-.44708,1.33217,1.33217,0,0,0,.65979-1.13092,1.135,1.135,0,0,0-.35333-.87134,2.18491,2.18491,0,0,0-.91944-.51923c-.37616-.11774-.89538-.23553-1.53112-.37616a13.9908,13.9908,0,0,1-2.14295-.6358,3.34814,3.34814,0,0,1-1.36651-1.01312,2.47429,2.47429,0,0,1-.49512-1.57807,2.62945,2.62945,0,0,1,.54205-1.60205,3.41154,3.41154,0,0,1,1.53113-1.084,6.652,6.652,0,0,1,2.37964-.37623,6.403,6.403,0,0,1,1.88452.25843,4.07215,4.07215,0,0,1,1.31842.65979,2.91587,2.91587,0,0,1,.77765.87134,1.80281,1.80281,0,0,1,.23553.87139.96189.96189,0,0,1-.30645.70667.9912.9912,0,0,1-.7536.30646.9735.9735,0,0,1-.63575-.18866,2.38218,2.38218,0,0,1-.47113-.61176,2.93711,2.93711,0,0,0-.77758-.96631A2.37614,2.37614,0,0,0,12.0589,7.96a2.7028,2.7028,0,0,0-1.5083.37738,1.07558,1.07558,0,0,0-.56488.89539.95783.95783,0,0,0,.18866.56488,1.41851,1.41851,0,0,0,.54205.4002,2.69264,2.69264,0,0,0,.68262.25959c.23559.07092.613.16467,1.15381.28247.65979.14178,1.27276.30646,1.81475.47107a5.43,5.43,0,0,1,1.38941.6358,2.85691,2.85691,0,0,1,.89532.94226,2.8284,2.8284,0,0,1,.32935,1.3905A2.89029,2.89029,0,0,1,16.43964,15.9931Z"/></svg></a>

							<a href="#" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm-.41,2-5.88,5.88a1,1,0,0,1-1.42,0L5.41,6ZM20,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V7.41l5.88,5.88a3,3,0,0,0,4.24,0L20,7.41Z"/></svg></a>
						</div>

						<small class="footer__copyright">© {{ _lang('Omniverse Dynamics, 2024.')}} </small>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->
	<script>
    function setLanguage(language) {
        document.getElementById('languageInput').value = language;
        document.getElementById('languageForm').submit();
    }
</script>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/splide.min.js') }}"></script>
<script src="{{ asset('frontend/js/slimselect.min.js') }}"></script>
<script src="{{ asset('frontend/js/smooth-scrollbar.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>


</html>