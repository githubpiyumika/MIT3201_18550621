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
			<li>My Profile</li>
		</ul>
	</div>
</div>
<!-- /breadcrumb -->

<div class="container margin_60">
	<div class="row">
		<aside class="col-lg-3" id="sidebar">
			<div class="box_style_cat" id="faq_box">
				<ul id="cat_nav">
					<li><a href="{{route('patient.inquiries.index')}}"><i class="icon_document_alt"></i>My Inquiries</a>
					</li>
					<li><a href="{{route('patient.profile.create')}}" class="active"><i class="icon_document_alt"></i>My
							Profile</a></li>
				</ul>
			</div>
			<!--/sticky -->
		</aside>
		<!--/aside -->

		<div class="col-lg-9" id="faq">
			<div class="box_general">
				@if ($patient)
				<h3>{{$patient->first_name}}'s Profile</h3>
				<p>All data in this page is visble to doctors. Keep your profile upto date.</p>
				@else
				<h3>Complete Your Profile</h3>
				<p>Your patient profile is incomplete. Complete it before you can send inquiries</p>
				@endif

				@if(Session::has('flash_message'))
				<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('flash_message') }}
				</p>
				@endif

				<div>
					<div id="message-contact"></div>
					<form method="POST" action="{{ route('patient.profile.create') }}" accept-charset="UTF-8"
						class="form-horizontal" enctype="multipart/form-data">
						{{ csrf_field() }}

						@include ('patient.profile.form', ['formMode' => $patient ? 'edit': 'create'])

					</form>
				</div>
				<!-- /col -->
			</div>
		</div>
		<!-- /col -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->

@endsection