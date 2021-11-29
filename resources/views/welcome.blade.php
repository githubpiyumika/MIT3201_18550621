@extends('layouts.app')

@section('styles')
@endsection

@section('scripts')

@endsection

@section('content')

<div class="hero_home version_3">
	<div class="content">
		<h3>Happy Health Care</h3>
		<p>
			Find the best doctors in the country at your finger tip
		</p>
		<a href="{{route('search')}}" class="btn_1 medium">View all Doctors</a>
	</div>
</div>
<!-- /Hero -->

<div class="bg_color_1">
	<div class="container margin_120_95">
		<div class="main_title">
			<h2>Just for you</h2>
			<p>Here are some tips and news for your healthy life.</p>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<img width="100%" class="mb-3" src="{{asset('landing/img/news/Img-1.jpg')}}">
			</div>
			<div class="col-lg-6 col-md-12">
				<img width="100%" class="mb-3" src="{{asset('landing/img/news/Img-2.jpg')}}">
			</div>
			<div class="col-lg-6 col-md-12">
				<img width="100%" class="mb-3" src="{{asset('landing/img/news/Img-3.jpg')}}">
			</div>
			<div class="col-lg-6 col-md-12">
				<img width="100%" class="mb-3" src="{{asset('landing/img/news/Img-4.jpg')}}">
			</div>
		</div>
	</div>
	<!-- /container -->
</div>
<!-- /white_bg -->


<!-- /container -->



@endsection