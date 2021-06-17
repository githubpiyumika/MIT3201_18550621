@extends('layouts.app')

@section('styles')
@endsection

@section('scripts')

@endsection

@section('content')

<div id="resultz">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h4><strong>Showing {{$doctors->count()}}</strong> of {{$doctors->total()}} results
					{{Request::get('search')? " for '".Request::get('search')."'" : ""}}</h4>
			</div>
			<div class="col-md-6">
				<form method="GET" action="{{ route('search') }}" accept-charset="UTF-8" role="search">
					<div class="search_bar_list">
						<input type="text" name="search" class="form-control" placeholder="Ex. Name, Specialization...">
						<input type="submit" value="Search">
					</div>
				</form>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /results -->



<div class="container margin_60_35">
	<div class="row">
		<div class="col-lg-8">
			<div class="row">
				@foreach ($doctors as $doctor)


				<div class="col-md-6">
					<div class="box_list wow fadeIn">
						<a href="#0" class="wish_bt"></a>
						<figure>
							<a href="{{route('doctor-profile', $doctor->id)}}"><img
									src="http://www.ansonika.com/findoctor/img/doctor_listing_1.jpg" class="img-fluid"
									alt="">
								<div class="preview"><span>Read more</span></div>
							</a>
						</figure>
						<div class="wrapper">
							<small>{{$doctor->doctorSpecialization->name}}</small>
							<h3>Dr. {{$doctor->first_name}} {{$doctor->last_name}}</h3>

							<p>{!! nl2br($doctor->professional_statement) !!}</p>
						</div>
						<ul>
							<li>
								{{ucfirst($doctor->gender)}} </li>
							<li>
							</li>
							<li><a href="{{route('doctor-profile', $doctor->id)}}">Inquiry</a></li>
						</ul>
					</div>
				</div>
				<!-- /box_list -->
				@endforeach
			</div>
			<!-- /row -->

			<nav aria-label="" class="add_top_20">
				<?php echo $doctors->render(); ?>
			</nav>
			<!-- /pagination -->
		</div>
		<!-- /col -->

		<aside class="col-lg-4" id="sidebar">
			<h2 class="mb-4">Specializations</h2>
			<div class="box_style_cat" id="faq_box">
				<ul id="cat_nav">
					@foreach ($specializations as $specialization)
					<li>
						<a href="{{ route('search', ['specialization' => $specialization->id])}}" class="active"><i
								class="icon_document_alt"></i>{{$specialization->name}}</a>
					</li>
					@endforeach

				</ul>
			</div>
		</aside>
		<!-- /aside -->

	</div>
	<!-- /row -->
</div>
<!-- /container -->

@endsection