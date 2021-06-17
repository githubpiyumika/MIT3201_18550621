@extends('layouts.admin')

@section('content')


<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/doctors') }}">Doctors</a>
    </li>
    <li class="breadcrumb-item active">Add Doctor</li>
</ol>

<form method="POST" action="{{ url('/admin/doctors') }}" accept-charset="UTF-8" class="form-horizontal"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    @include ('admin.doctors.form', ['formMode' => 'create','title' =>'Create Doctor'])

</form>

@endsection