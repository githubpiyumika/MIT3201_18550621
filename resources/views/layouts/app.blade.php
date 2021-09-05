<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Happy Health Care') }}</title>

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="{{ asset('landing/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('landing/css/style.css')}}" rel="stylesheet">
	<link href="{{ asset('landing/css/menu.css')}}" rel="stylesheet">
	<link href="{{ asset('landing/css/vendors.css')}}" rel="stylesheet">
	<link href="{{ asset('landing/css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="{{ asset('landing/css/custom.css')}}" rel="stylesheet">
	@yield('styles')



</head>

<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->

	<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="index.html" title="HappyHealthCare">HappyHealthCare</a></h1>
					</div>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu
							mobile</span></a>
					<ul id="top_access">


						@if (Auth::user())
						<li><a href="{{route('patient.profile.create')}}">Welcome {{Auth::user()->name}}!</a></li>
						<li>
							<a href=" {{ route('login') }}" href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();"><i class="pe-7s-power"></i></a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</li>
						@else
						<li><a href="{{ route('login') }}"><i class="pe-7s-user"></i></a></li>
						{{-- <li><a href="{{ route('register') }}"><i class="pe-7s-add-user"></i></a></li> --}}
						@endif

					</ul>
					<div class="main-menu">
						<ul>
							<li><a href="{{ route('home') }}">Home</i></a></li>
							<li><a href="{{ route('about') }}">About Us</a></li>
							<li><a href="{{ route('search') }}">Search Doctors</a></li>
							<li><a href="{{ route('contact') }}">Contact Us</a></li>
						</ul>
					</div>
					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->

	<main>
		@yield('content')
	</main>
	<!-- /main content -->

	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="index.html" title="HappyHealthCare">
							<img src="{{ asset('landing/img/logo.png')}}" data-retina="true" alt="" width="163"
								height="36" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>About</h5>
					<ul class="links">
						<li><a href="{{ route('about') }}">About us</a></li>
						<li><a href="{{ route('search') }}">Doctors</a></li>
						<li><a href="{{ route('contact') }}">Contact Us</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ route('register') }}">Register</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="icon_mobile"></i> + 94 11 803 3400</a></li>
						<li><a href="mailto:info@happyhealthcare.lk"><i class="icon_mail_alt"></i>
								help@happyhealthcare.lk</a>
						</li>
					</ul>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2021 Happy Health Care</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->

	<!-- Back to top button -->
	<div id="toTop"></div>

	<!-- COMMON SCRIPTS -->
	<script src="{{ asset('landing/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{ asset('landing/js/common_scripts.min.js')}}"></script>
	<script src="{{ asset('landing/js/functions.js')}}"></script>

	<!-- SPECIFIC SCRIPTS -->
	@yield('scripts')

</body>

</html>