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
        <li class="breadcrumb-item active">#{{ $doctorspecialization->id }}</li>
    </ol>


    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-eye"></i>DoctorSpecialization #{{ $doctorspecialization->id }}</h2>
        </div>
   
        <div>

            <a href="{{ url('/admin/doctor-specializations') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <a href="{{ url('/admin/doctor-specializations/' . $doctorspecialization->id . '/edit') }}" title="Edit DoctorSpecialization"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

            <form method="POST" action="{{ url('admin/doctorspecializations' . '/' . $doctorspecialization->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete DoctorSpecialization" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
            </form>
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th><td>{{ $doctorspecialization->id }}</td>
                        </tr>
                        <tr><th> Name </th><td> {{ $doctorspecialization->name }} </td></tr><tr><th> Description </th><td> {{ $doctorspecialization->description }} </td></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
           
@endsection
