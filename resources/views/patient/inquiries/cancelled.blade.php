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
			<li><a href="{{ route('patient.inquiries.index') }}">Inquiries</a></li>
			<li>Confirmed</li>
		</ul>
	</div>
</div>
<!-- /breadcrumb -->

<div class="container margin_120">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div id="confirm">
				<div class="icon icon--order-success svg add_bottom_15">
					<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
						<g fill="none" stroke="#8EC343" stroke-width="2">
							<circle cx="36" cy="36" r="35"
								style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
							<path d="M17.417,37.778l9.93,9.909l25.444-25.393"
								style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
						</g>
					</svg>
				</div>
				<h2>Inquiry was cancelled!</h2>
				<p>You'll receive a confirmation email at {{Auth::user()->email}}</p>
				<a class="btn btn-success btn-sm" href="{{ route('patient.inquiries.index') }}">Goto Inquiries</a>
			</div>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->

@endsection