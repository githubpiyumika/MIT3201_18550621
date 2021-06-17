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
    <li class="breadcrumb-item active">Patient #{{ $patient->id }}</li>
</ol>

<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-list"></i>Patient #{{ $patient->id }}</h2>
    </div>

    <a href="{{ url('/admin/patients') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
    <a href="{{ url('/admin/patients/' . $patient->id . '/edit') }}" title="Edit Patient"><button
            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

    <form method="POST" action="{{ url('admin/patients' . '/' . $patient->id) }}" accept-charset="UTF-8"
        style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm" title="Delete Patient"
            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
            Delete</button>
    </form>
    <br />
    <br />

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <th colspan="2" class="text-primary">General Details</th>
                </tr>
                <tr>
                    <th style="width:200px"> First Name: </th>
                    <td> {{ $patient->first_name }} </td>
                </tr>
                <tr>
                    <th> Last Name: </th>
                    <td> {{ $patient->last_name }} </td>
                </tr>
                <tr>
                    <th> Address: </th>
                    <td> {!! nl2br($patient->address) !!} </td>
                </tr>
                <tr>
                    <th> NIC: </th>
                    <td> {{ $patient->nic }} </td>
                </tr>
                <tr>
                    <th> Email: </th>
                    <td> {{ $patient->email }} </td>
                </tr>
                <tr>
                    <th> Contact Number: </th>
                    <td> {{ $patient->contact_number }} </td>
                </tr>
                <tr>
                    <th> Date of Brith: </th>
                    <td> {{ $patient->date_of_birth }} </td>
                </tr>
                <tr>
                    <th> Weight: </th>
                    <td> {{ $patient->weight }}kg </td>
                </tr>
                <tr>
                    <th> Height: </th>
                    <td> {{ $patient->height }}cm </td>
                </tr>
                <tr>
                    <th colspan="2" class="text-primary">General Medical History</th>
                </tr>
                <tr>
                    <th> Chicken Pox: </th>
                    <td> {{ $patient->chicken_pox? 'Yes' : 'No' }} </td>
                </tr>
                <tr>
                    <th> Measles: </th>
                    <td> {{ $patient->measles? 'Yes' : 'No' }} </td>
                </tr>
                <tr>
                    <th> Hepatitis B Vaccine: </th>
                    <td> {{ $patient->hepatitis_b? 'Yes' : 'No' }} </td>
                </tr>
                <tr>
                    <th> Medical Problems: </th>
                    <td>{!! nl2br($patient->medical_problems) !!} </td>
                </tr>
                <tr>
                    <th> Allergies: </th>
                    <td> {!! nl2br($patient->allergies) !!} </td>
                </tr>
                <tr>
                    <th> Regular Medications: </th>
                    <td> {!! nl2br($patient->regular_medications) !!} </td>
                </tr>
                <tr>
                    <th colspan="2" class="text-primary">Insurance Details</th>
                </tr>
                <tr>
                    <th> Insuared Company: </th>
                    <td> {{ $patient->insuared_company }} </td>
                </tr>
                <tr>
                    <th> Company Address: </th>
                    <td> {{ $patient->insuared_company_address }} </td>
                </tr>
                <tr>
                    <th> Policy Number: </th>
                    <td> {{ $patient->policy_number }} </td>
                </tr>
                <tr>
                    <th> Expiary Date: </th>
                    <td> {{ $patient->expiary_date }} </td>
                </tr>
                <tr>
                    <th colspan="2" class="text-primary">Emergency Contact</th>
                </tr>
                <tr>
                    <th> Contact Person: </th>
                    <td> {{ $patient->emergency_contact_name }} </td>
                </tr>
                <tr>
                    <th> Contact Number: </th>
                    <td> {{ $patient->emergency_contact_no }} </td>
                </tr>
                <tr>
                    <th> Address: </th>
                    <td> {{ $patient->emergency_address }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection