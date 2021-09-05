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

<div class="container margin_120_95">
	<div class="main_title">
		<h2>Find by specialization</h2>
		<p>Nec graeci sadipscing disputationi ne, mea ea nonumes percipitur. Nonumy ponderum oporteat cu mel, pro movet
			cetero at.</p>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<a href="#0" class="box_cat_home">
				<i class="icon-info-4"></i>
				<img src="landing/img/icon_cat_1.svg" width="60" height="60" alt="">
				<h3>Primary Care</h3>
				<ul class="clearfix">
					<li><strong>124</strong>Doctors</li>
					<li><strong>60</strong>Clinics</li>
				</ul>
			</a>
		</div>
		<div class="col-lg-3 col-md-6">
			<a href="#0" class="box_cat_home">
				<i class="icon-info-4"></i>
				<img src="landing/img/icon_cat_2.svg" width="60" height="60" alt="">
				<h3>Cardiology</h3>
				<ul class="clearfix">
					<li><strong>124</strong>Doctors</li>
					<li><strong>60</strong>Clinics</li>
				</ul>
			</a>
		</div>
		<div class="col-lg-3 col-md-6">
			<a href="#0" class="box_cat_home">
				<i class="icon-info-4"></i>
				<img src="landing/img/icon_cat_3.svg" width="60" height="60" alt="">
				<h3>MRI Resonance</h3>
				<ul class="clearfix">
					<li><strong>124</strong>Doctors</li>
					<li><strong>60</strong>Clinics</li>
				</ul>
			</a>
		</div>
		<div class="col-lg-3 col-md-6">
			<a href="#0" class="box_cat_home">
				<i class="icon-info-4"></i>
				<img src="landing/img/icon_cat_4.svg" width="60" height="60" alt="">
				<h3>Blood test</h3>
				<ul class="clearfix">
					<li><strong>124</strong>Doctors</li>
					<li><strong>60</strong>Clinics</li>
				</ul>
			</a>
		</div>
		<div class="col-lg-3 col-md-6">
			<a href="#0" class="box_cat_home">
				<i class="icon-info-4"></i>
				<img src="landing/img/icon_cat_7.svg" width="60" height="60" alt="">
				<h3>Laboratory</h3>
				<ul class="clearfix">
					<li><strong>124</strong>Doctors</li>
					<li><strong>60</strong>Clinics</li>
				</ul>
			</a>
		</div>
		<div class="col-lg-3 col-md-6">
			<a href="#0" class="box_cat_home">
				<i class="icon-info-4"></i>
				<img src="landing/img/icon_cat_5.svg" width="60" height="60" alt="">
				<h3>Dentistry</h3>
				<ul class="clearfix">
					<li><strong>124</strong>Doctors</li>
					<li><strong>60</strong>Clinics</li>
				</ul>
			</a>
		</div>
		<div class="col-lg-3 col-md-6">
			<a href="#0" class="box_cat_home">
				<i class="icon-info-4"></i>
				<img src="landing/img/icon_cat_6.svg" width="60" height="60" alt="">
				<h3>X - Ray</h3>
				<ul class="clearfix">
					<li><strong>124</strong>Doctors</li>
					<li><strong>60</strong>Clinics</li>
				</ul>
			</a>
		</div>
		<div class="col-lg-3 col-md-6">
			<a href="#0" class="box_cat_home">
				<i class="icon-info-4"></i>
				<img src="landing/img/icon_cat_8.svg" width="60" height="60" alt="">
				<h3>Piscologist</h3>
				<ul class="clearfix">
					<li><strong>124</strong>Doctors</li>
					<li><strong>60</strong>Clinics</li>
				</ul>
			</a>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->



@endsection