@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/pharmacies') }}">Pharmacies</a>
    </li>
    <li class="breadcrumb-item active">Add Pharmacy</li>
</ol>

<form method="POST" action="{{ url('/admin/pharmacies') }}" accept-charset="UTF-8" class="form-horizontal"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    @include ('admin.pharmacies.form', ['formMode' => 'create'])

</form>

@endsection