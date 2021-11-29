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
			<li>Inquiries</li>
		</ul>
	</div>
</div>
<!-- /breadcrumb -->

<div class="container margin_60">
	<div class="row">
		<aside class="col-lg-3" id="sidebar">
			<div class="box_style_cat" id="faq_box">
				<ul id="cat_nav">
					<li><a href="{{route('patient.inquiries.index')}}" class="active"><i
								class="icon_document_alt"></i>My Inquiries</a></li>
					<li><a href="{{route('patient.profile.create')}}"><i class="icon_document_alt"></i>My Profile</a>
					</li>
				</ul>
			</div>
			<!--/sticky -->
		</aside>
		<!--/aside -->

		<form method="GET" action="{{ url('/patient/doctorsinquiries') }}" accept-charset="UTF-8"
            class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
                <input class="form-control search-top" type="text" name="search" placeholder="Search..."
                    value="{{ request('search') }}">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

		<div class="col-lg-9" id="faq">
			<div class="box_general">
				<h3>My Inquiries</h3>
				<p>Doctor inquiries </p>		

				

				<div>
					@if (count($prescriptions)>0)


					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Doctor Name</th>
									<th>Specialization</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($prescriptions as $item)
								<tr>
									<td>INQ{{ $item->id }}</td>
									<td>{{ $item->created_at }}</td>
									<td>{{ $item->doctor->first_name }} {{ $item->doctor->last_name }}</td>
									<td>{{ $item->doctor->doctorSpecialization->name}}</td>
									<td>{{ $item->status}}</td>
									<td>
										<a href="#" title="View Prescription">
											<button class="btn btn-info btn-sm"
												onclick="document.getElementById('view-detail-{{ $item->id }}').style.display=''">
												<i class="fa fa-eye" aria-hidden="true"></i>View
											</button>
										</a>
									</td>
								</tr>
								<tr id="view-detail-{{ $item->id }}" style="display: none">
									<td colspan="5">
										<div>
											<strong> My Note:</strong>
											<p>{!! nl2br($item->patient_note)!!}</p>
											@if ($item->description)
											<strong> Doctor's Note:</strong>
											<p>{!! nl2br($item->description) !!}</p>
											@endif
											@if ($item->pharmacy)
											<strong> Pharmacy:</strong>
											<p>
												{{ $item->pharmacy->pharmacy_name  }} <br>
												{{ $item->pharmacy->pharmacy_address  }} <br>
												{{ $item->pharmacy->pharmacy_phone  }}
											</p>
											@endif

										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="pagination-wrapper"> {!! $prescriptions->appends(['search' =>
							Request::get('search')])->render()
							!!} </div>
					</div>
					@else
					<div class="alert alert-info text-center">
						<strong>There are no inquiries yet</strong>
						<br>

						<a class="btn btn-primary btn-sm mt-3" href="{{route('search')}}">Create Now</a>
					</div>
					@endif
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