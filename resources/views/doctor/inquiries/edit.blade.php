@extends('layouts.admin')

@section('content')


<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/doctor/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/doctor/inquiries') }}">Inquiries</a>
    </li>
    <li class="breadcrumb-item active">Inquiry #{{ $prescription->id }}</li>
</ol>

<form method="POST" action="{{ url('/doctor/inquiry/' . $prescription->id) }}" accept-charset="UTF-8"
    class="form-horizontal" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    @include ('doctor/inquiries.form', ['formMode' => 'edit', 'title' => $prescription->patient->first_name."'s Inquiry
    #"
    . $prescription->id])

</form>




@endsection