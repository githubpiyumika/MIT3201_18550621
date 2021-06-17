@extends('layouts.admin')

@section('content')
    
   
    <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/doctor-specializations') }}">Doctorspecializations</a>
        </li>
        <li class="breadcrumb-item active">Update #{{ $doctorspecialization->id }}</li>
    </ol>
        

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ url('/admin/doctor-specializations/' . $doctorspecialization->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('admin.doctor-specializations.form', ['formMode' => 'edit', 'title' => 'Update #' . $doctorspecialization->id])

            </form>

     
   
       
@endsection
