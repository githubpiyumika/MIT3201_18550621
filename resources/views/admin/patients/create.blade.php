@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/patients') }}">Patients</a>
    </li>
    <li class="breadcrumb-item active">Add Patient</li>
</ol>
<form method="POST" action="{{ url('/admin/patients') }}" accept-charset="UTF-8" class="form-horizontal"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    @include ('admin.patients.form', ['formMode' => 'create'])

</form>


@endsection