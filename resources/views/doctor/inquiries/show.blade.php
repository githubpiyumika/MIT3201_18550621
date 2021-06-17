@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/prescriptions') }}">Prescriptions</a>
    </li>
    <li class="breadcrumb-item active">#{{ $prescription->id }}</li>
</ol>


<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-eye"></i>Prescription #{{ $prescription->id }}</h2>
    </div>

    <div>

        <a href="{{ url('/admin/prescriptions') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/admin/prescriptions/' . $prescription->id . '/edit') }}" title="Edit Prescription"><button
                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Edit</button></a>

        <form method="POST" action="{{ url('admin/prescriptions' . '/' . $prescription->id) }}" accept-charset="UTF-8"
            style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Prescription"
                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                Delete</button>
        </form>
        <br />
        <br />

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width: 250px;">ID</th>
                        <td>{{ $prescription->id }}</td>
                    </tr>
                    <tr>
                        <th> Patient Name </th>
                        <td> {{ $prescription->patient->first_name }} {{ $prescription->patient->last_name }}</td>
                    </tr>
                    <tr>
                        <th> Doctor Name </th>
                        <td> {{ $prescription->doctor->first_name }} {{ $prescription->doctor->last_name }} </td>
                    </tr>
                    <tr>
                        <th> Doctor Mobile </th>
                        <td> {{ $prescription->doctor->mobile }} </td>
                    </tr>
                    <tr>
                        <th> Doctor Address </th>
                        <td> {{ $prescription->doctor->institute_address }} </td>
                    </tr>
                    <tr>
                        <th> Pharmacy Name </th>
                        <td> {{ $prescription->pharmacy->pharmacy_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th> Pharmacy Mobile </th>
                        <td> {{ $prescription->pharmacy->pharmacy_phone ?? 'N/A' }} </td>
                    </tr>
                    <tr>
                        <th> Pharmacy Address </th>
                        <td> {{ $prescription->pharmacy->pharmacy_address ?? 'N/A' }} </td>
                    </tr>
                    <tr>
                        <th> Pharmacy Owner </th>
                        <td> {{ $prescription->pharmacy->first_name ?? 'N/A' }}
                            {{ $prescription->pharmacy->last_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th> Pharmacy Owner Contact </th>
                        <td> {{ $prescription->pharmacy->contact_number ?? 'N/A' }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection