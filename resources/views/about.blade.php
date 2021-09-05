@extends('layouts.app')

@section('styles')
@endsection

@section('scripts')

@endsection

@section('content')

<div id="breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{ route('home') }}">Home</a></li>
			<li>About Us</li>
		</ul>
	</div>
</div>
<!-- /breadcrumb -->

<div class="bg_color_1">
	<div class="container margin_120_95">
		<div class="main_title">
			<h1>About Happy Health Care</h1>
			<p>Be healthy, be happy, find the best doctors in Sri Lanka</p>
		</div>
		<div class="row justify-content-between">
			<div class="col-lg-6">
				<figure class="add_bottom_30">
					<img src="{{asset('landing/img/about.jpg')}}" class="img-fluid" alt="">
				</figure>
			</div>
			<div class="col-lg-5">
				<p>At Happy Health Care, each day we strive to build technology that makes people feel cared for by
					elevating the doctor –
					patient relationship</p>

				<h4> Our mission</h4>
				<p>To reinvent the modern day case experience</p>

				<h4>Experienced Physicians</h4>
				<p>Happy Health Care’s network of doctors have worked together as a local team of emergency physicians.
					Happy Health
					Care users are connected with a board – certified doctor for each and every interaction</p>
				<h4> Leadership</h4>
				<p>Our team is a deep well of skills that includes management, sales, business development, marketing
					and creative technology.</p>
			</div>
		</div>
		<!--/row-->
	</div>
	<!--/container-->
</div>
<!--/bg_color_1-->

@endsection