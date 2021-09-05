@extends('layouts.admin')
@section('styles')
<style>
    .pro-image-wrapper {
        display: flex;
        flex-direction: row;
    }

    .pro-image-wrapper figure {
        padding-right: 15px
    }

    .pro-image-wrapper img {
        width: 150px;
        border-radius: 5px;
    }
</style>
@endsection
@section('content')


<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/doctors') }}">Doctors</a>
    </li>
    <li class="breadcrumb-item active">Update #{{ $doctor->id }}</li>
</ol>

<form method="POST" action="{{ url('/admin/doctors/' . $doctor->id) }}" accept-charset="UTF-8" class="form-horizontal"
    enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    @include ('admin.doctors.form', ['formMode' => 'edit', 'title' => 'Update #' . $doctor->id])

</form>




@endsection