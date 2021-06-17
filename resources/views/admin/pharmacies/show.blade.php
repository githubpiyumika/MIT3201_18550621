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
    <li class="breadcrumb-item active">Pharmacy #{{ $pharmacy->id }}</li>
</ol>

<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-list"></i>Pharmacy #{{ $pharmacy->id }}</h2>
    </div>

    <a href="{{ url('/admin/pharmacies') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
    <a href="{{ url('/admin/pharmacies/' . $pharmacy->id . '/edit') }}" title="Edit Pharmacy"><button
            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            Edit</button></a>

    <form method="POST" action="{{ url('admin/pharmacies' . '/' . $pharmacy->id) }}" accept-charset="UTF-8"
        style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm" title="Delete Pharmacy"
            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
            Delete</button>
    </form>
    <br />
    <br />

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <th colspan="2" class="text-primary">Pharmacy Details</th>
                </tr>
                <tr>
                    <th style="width:200px"> Name: </th>
                    <td> {{ $pharmacy->pharmacy_name }} </td>
                </tr>
                <tr>
                    <th> Address: </th>
                    <td> {!! nl2br($pharmacy->pharmacy_address) !!} </td>
                </tr>
                <tr>
                    <th> Phone: </th>
                    <td> {{ $pharmacy->pharmacy_phone }} </td>
                </tr>
                <tr>
                    <th> Fax: </th>
                    <td> {{ $pharmacy->fax_number }} </td>
                </tr>



                <tr>
                    <th colspan="2" class="text-primary">Owner Details</th>
                </tr>

                <tr>
                    <th> First Name </th>
                    <td> {{ $pharmacy->first_name }} </td>
                </tr>
                <tr>
                    <th> Last Name </th>
                    <td> {{ $pharmacy->last_name }} </td>
                </tr>
                <tr>
                    <th> Registration Number </th>
                    <td> {{ $pharmacy->registration_number }} </td>
                </tr>
                <tr>
                    <th> Email </th>
                    <td> {{ $pharmacy->email }} </td>
                </tr>
                <tr>
                    <th> Email </th>
                    <td> {{ $pharmacy->contact_number }} </td>
                </tr>
                <tr>
                    <th> Address: </th>
                    <td> {!! nl2br($pharmacy->address) !!} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
</div>

@endsection