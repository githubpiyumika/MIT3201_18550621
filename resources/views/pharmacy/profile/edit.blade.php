@extends('layouts.admin')

@section('content')


<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/pharmacy/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Edit Profile</li>
</ol>

@if(Session::has('flash_message'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('flash_message') }}
</p>
@endif


<form method="POST" action="{{ url('/pharmacy/profile/') }}" accept-charset="UTF-8" class="form-horizontal"
    enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    @include ('pharmacy.profile.form', ['formMode' => 'edit', 'title' => 'Edit Profile'])

</form>




@endsection