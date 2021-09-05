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
    <li class="breadcrumb-item active">#{{ $doctor->id }}</li>
</ol>


<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-eye"></i>Doctor #{{ $doctor->id }}</h2>
    </div>

    <div>

        <a href="{{ url('/admin/doctors') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/admin/doctors/' . $doctor->id . '/edit') }}" title="Edit Doctor"><button
                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Edit</button></a>

        <form method="POST" action="{{ url('admin/doctors' . '/' . $doctor->id) }}" accept-charset="UTF-8"
            style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Doctor"
                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                Delete</button>
        </form>
        <br />
        <br />

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th colspan="2" class="text-primary">Basic Details</th>
                    </tr>
                    <tr>
                        <th style="width:250px"> First Name </th>
                        <td> {{ $doctor->first_name }} </td>
                    </tr>
                    <tr>
                        <th> Last Name </th>
                        <td> {{ $doctor->last_name }} </td>
                    </tr>
                    <tr>
                        <th> Specialization </th>
                        <td> {{ $doctor->doctorSpecialization->name }} </td>
                    </tr>
                    <tr>
                        <th> Gender </th>
                        <td> {{ $doctor->gender }} </td>
                    </tr>
                    <tr>
                        <th> Marital Status </th>
                        <td> {{ $doctor->marital_status }} </td>
                    </tr>
                    <tr>
                        <th> Nationality</th>
                        <td> {{ $doctor->nationality }} </td>
                    </tr>
                    <tr>
                        <th> Date Of Birth</th>
                        <td> {{ $doctor->date_of_birth }} </td>
                    </tr>
                    <tr>
                        <th> Registration Number</th>
                        <td> {{ $doctor->registration_number }} </td>
                    </tr>

                    <tr>
                        <th colspan="2" class="text-primary">Contact Details</th>
                    </tr>
                    <tr>
                        <th> Residential Address </th>
                        <td> {{ $doctor->residential_address }} </td>
                    </tr>
                    <tr>
                        <th> Institute Address </th>
                        <td> {{ $doctor->institute_address }} </td>
                    </tr>
                    <tr>
                        <th> Mobile </th>
                        <td> {{ $doctor->mobile }} </td>
                    </tr>
                    <tr>
                        <th> Email </th>
                        <td> {{ $doctor->email }} </td>
                    </tr>

                    <tr>
                        <th colspan="2" class="text-primary">Education & Experience</th>
                    </tr>
                    <tr>
                        <th> Professional Statement </th>
                        <td> {!! nl2br($doctor->professional_statement) !!} </td>
                    </tr>
                    <tr>
                        <th> Other Specializations </th>
                        <td>
                            @foreach (explode(',',$doctor->sub_specializations) as $sub_specialization )
                            {{$sub_specialization}}<br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th> Experience After Graduation </th>
                        <td> {!! nl2br( $doctor->experience_after_graduation ) !!} </td>
                    </tr>
                    <tr>
                        <th> Education Statement </th>
                        <td> {!! nl2br( $doctor->education_qualiication ) !!} </td>
                    </tr>
                    <tr>
                        <th> Curriculum </th>
                        <td> {!! nl2br( $doctor->curriculum ) !!} </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection