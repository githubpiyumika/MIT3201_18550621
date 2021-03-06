@extends('layouts.app')

@section('styles')

<style>
	.two-column {
		columns: 2;
		-webkit-columns: 2;
		-moz-columns: 2;
	}
</style>
@endsection

@section('scripts')

@endsection

@section('content')

<div id="breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{ route('home') }}">Home</a></li>
			<li><a
					href="{{ route('search', ['specialization' => $doctor->doctorSpecialization->id])}}">{{$doctor->doctorSpecialization->name}}</a>
			</li>
			<li>Doctor Name</li>
		</ul>
	</div>
</div>
<!-- /breadcrumb -->

<!-- <div id="map_contact"></div> -->
<!-- /map -->

<div class="container margin_60">
	<div class="row">
		<div class="col-xl-8 col-lg-8">
			<nav id="secondary_nav">
				<div class="container">
					<ul class="clearfix">
						<li><a href="#section_1" class="active">General info</a></li>
						<li><a href="#sidebar">Inquiry</a></li>
					</ul>
				</div>
			</nav>
			<div id="section_1">
				<div class="box_general_3">
					<div class="profile">
						<div class="row">
							<div class="col-lg-5 col-md-4">
								<figure>
									<img src="{{$doctor->getFirstMediaUrl('avatar') ? $doctor->getFirstMediaUrl('avatar') :asset('admin-template/img/default-doc.jpg')}}"
										alt="" class="img-fluid">
								</figure>
							</div>
							<div class="col-lg-7 col-md-8">
								<small>{{$doctor->doctorSpecialization->name}}</small>
								<h1>{{$doctor->first_name}} {{$doctor->last_name}}</h1>

								<ul class="statistic">
									<li title="Registration Number">{{$doctor->registration_number??"-"}}</li>
									<li title="Gender">{{ucfirst($doctor->gender)}}</li>
								</ul>
								<ul class="contacts">
									<li>
										<h6>Institutional Address</h6>
										{{$doctor->institute_address}}
									</li>
									<li>
										<h6>Residential Address</h6>
										{{$doctor->residential_address}}
									</li>
									<li>
										<h6>Phone</h6> <a href="tel://{{$doctor->mobile}}">{{$doctor->mobile}}</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<hr>

					<!-- /profile -->
					<div class="indent_title_in">
						<i class="pe-7s-user"></i>
						<h3>Professional statement</h3>
						<p>About the professional qualifications & experience.</p>
					</div>
					<div class="wrapper_indent">
						<p>{!! nl2br($doctor->professional_statement) !!}</p>

						@if ($doctor->sub_specializations)
						<h6>Specializations</h6>
						<div class="row">
							<div class="col-lg-12">
								<ul class="bullets two-column">
									@foreach (explode(',',$doctor->sub_specializations) as $sub_specialization )
									<li>{{$sub_specialization}}</li>
									@endforeach
								</ul>
							</div>
						</div>
						@endif


						@if ($doctor->experience_after_graduation)

						<h6 class="mt-4">Experience after graduation</h6>
						<div class="row">
							<div class="col-lg-12">
								<ul class="bullets">
									@foreach (explode(PHP_EOL,$doctor->experience_after_graduation) as $experience)
									<li>{{$experience}}</li>
									@endforeach
								</ul>
							</div>
						</div>
						@endif

					</div>
					<!-- /wrapper indent -->

					<hr>

					<div class="indent_title_in">
						<i class="pe-7s-news-paper"></i>
						<h3>Education</h3>
						<p>Summary of the educational qualifications.</p>
					</div>
					<div class="wrapper_indent">
						<p>{!! nl2br($doctor->education_qualiication) !!}</p>

						@if ($doctor->curriculum)
						<h6>Curriculum</h6>
						<ul class="list_edu">
							@foreach (explode(PHP_EOL,$doctor->curriculum) as $curriculum)
							<li>{{$curriculum}}</li>
							@endforeach
						</ul>
						@endif

					</div>
					<!--  End wrapper indent -->
				</div>
				<!-- /section_1 -->
			</div>
			<!-- /box_general -->
		</div>
		<!-- /col -->
		<aside class="col-xl-4 col-lg-4" id="sidebar">
			<div class="box_general_3 booking">
				<div class="title">
					<h3>Inquiry</h3>
					<small>Respond within one hour</small>
				</div>
				<div id="message-booking"></div>
				<form method="post" action="https://sandbox.payhere.lk/pay/checkout" id="booking">
					{{ csrf_field() }}
					<input type="hidden" value="{{$patient->id ?? ''}}" name="patient_id">
					<input type="hidden" value="{{$doctor->id ?? ''}}" name="doctor_id">
					<div class="row">
						<div class="col-md-6 ">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name" name="first_name1"
									value="{{$patient->first_name ?? ''}}" id="first_name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Last Name" name="last_name1"
									value="{{$patient->last_name ?? ''}}" id="last_name">
							</div>
						</div>
					</div>
					<!-- /row -->
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email Address"
									value="{{$patient->email ?? ''}}" name="email1" id="email">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<input type="contact_number" class="form-control" placeholder="Contact Number"
									value="{{$patient->contact_number ?? ''}}" name="contact_number1"
									id="contact_number">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<textarea required rows="8" id="custom_1" name="custom_1"
									class="form-control {{ $errors->has('custom_1') ? 'text-danger' : ''}}"
									style=" height:200px;" placeholder="Describe your illness"></textarea>
								{!! $errors->first('custom_1', '<p class="text-danger">:message</p>')
								!!}
							</div>
						</div>
					</div>
					<!-- /row -->
					<hr>
					<div style="position:relative;">

						@auth
						<input type="submit" class="btn_1 full-width" value="Create Inquiry" id="submit-booking">
						@endauth
						@guest
						<a class="btn_1 full-width text-light" href="{{route('login')}}"> Create Inquiry</a>
						@endguest

					</div>

					<input type="hidden" name="merchant_id" value="{{config('app.payhere_mechant_id')}}">
					<!-- Replace your Merchant ID -->
					<input type="hidden" name="return_url" value="{{route('patient.inquiries.confirmed')}}">
					<input type="hidden" name="cancel_url" value="{{route('patient.inquiries.cancelled')}}">
					<input type="hidden" name="notify_url" value="{{config('app.proxy_url')}}/patients/pay">
					<input type="hidden" name="order_id" value="inq">
					<input type="hidden" name="items"
						value="Inquiry (Dr. {{$doctor->first_name}} {{$doctor->last_name}})">
					<input type="hidden" name="currency" value="LKR">
					<input type="hidden" name="amount" value="1500">
					<input type="hidden" name="first_name" value="{{$patient->first_name ?? ''}}">
					<input type="hidden" name="last_name" value="{{$patient->last_name ?? ''}}">
					<input type="hidden" name="email" value="{{$patient->email ?? ''}}">
					<input type="hidden" name="phone" value="{{$patient->contact_name ?? ''}}">
					<input type="hidden" name="address" value="{{$patient->address ?? ''}}">
					<input type="hidden" name="city" value="">
					<input type="hidden" name="custom_2" value="{{$patient->id ?? ''}}|{{$doctor->id ?? ''}}">
					<input type="hidden" name="country" value="Sri Lanka">
				</form>

			</div>
			<!-- /box_general -->
		</aside>
		<!-- /asdide -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->

@endsection