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

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

	<!-- Bootstrap core CSS-->
	<link href="{{ asset('admin-template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Icon fonts-->
	<link href="{{ asset('admin-template/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
		type="text/css">
	<!-- Plugin styles -->
	<link href="{{ asset('admin-template/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<!-- Main styles -->
	<link href="{{ asset('admin-template/css/admin.css') }}" rel="stylesheet">
	<!-- Your custom styles -->
	<link href="{{ asset('admin-template/css/admin.css') }}" rel="stylesheet">
	@yield('styles')



</head>

<body class="fixed-nav sticky-footer" id="page-top">

	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
		<a class="navbar-brand" href="{{route('admin.dashboard')}}">
			{{-- <img src="{{asset('admin-template/img/logo.png')}}" data-retina="true" alt="" width="163" height="36">
			--}}
			<div style="height:36px">Happy Health Care</div>
		</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
			data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">

			@if (Auth::user()->user_type == \App\User::USER_TYPE_ADMIN)
			@component('admin.sidebar')@endcomponent
			@endif

			@if (Auth::user()->user_type == \App\User::USER_TYPE_DOCTOR)
			@component('doctor.sidebar')@endcomponent
			@endif

			@if (Auth::user()->user_type == \App\User::USER_TYPE_PHARMACIST)
			@component('pharmacy.sidebar')@endcomponent
			@endif

			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a class="nav-link text-center" id="sidenavToggler">
						<i class="fa fa-fw fa-angle-left"></i>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">

				<li class="nav-item">
					<a class="nav-link">
						<i class="fa fa-fw fa-user"></i>Welcome {{Auth::user()->name}}!</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-fw fa-sign-out"></i>Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- /Navigation-->


	<div class="content-wrapper">
		<div class="container-fluid">
			@yield('content')
		</div>
		<!-- /.container-fluid-->
	</div>
	<!-- /.container-wrapper-->

	<footer class="sticky-footer">
		<div class="container">
			<div class="text-center">
				<small>Copyright © Happy Health Care 2021</small>
			</div>
		</div>
	</footer>
	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fa fa-angle-up"></i>
	</a>
	<!-- Logout Modal-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="{{ asset('admin-template/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('admin-template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- Core plugin JavaScript-->
	<script src="{{ asset('admin-template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<!-- Page level plugin JavaScript-->
	<script src="{{ asset('admin-template/vendor/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('admin-template/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('admin-template/vendor/jquery.selectbox-0.2.js') }}"></script>
	<script src="{{ asset('admin-template/vendor/retina-replace.min.js') }}"></script>
	<script src="{{ asset('admin-template/vendor/jquery.magnific-popup.min.js') }}"></script>
	<!-- Custom scripts for all pages-->
	<script src="{{ asset('admin-template/js/admin.js') }}"></script>


	<!-- SPECIFIC SCRIPTS -->
	@yield('scripts')

</body>

</html>