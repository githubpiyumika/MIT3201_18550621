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
    <li class="breadcrumb-item active">Update #{{ $patient->id }}</li>
</ol>


<form method="POST" action="{{ url('/admin/patients/' . $patient->id) }}" accept-charset="UTF-8" class="form-horizontal"
    enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    @include ('admin.patients.form', ['formMode' => 'edit'])

</form>


@endsection