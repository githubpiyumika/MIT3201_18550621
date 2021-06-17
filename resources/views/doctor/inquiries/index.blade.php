@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/doctor/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Open Inquiries</li>
</ol>

<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-list"></i>Open Inquiries</h2>
    </div>
    <div>

        <form method="GET" action="{{ url('/admin/prescriptions') }}" accept-charset="UTF-8"
            class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
                <input class="form-control search-top" type="text" name="search" placeholder="Search..."
                    value="{{ request('search') }}">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <br />
        <br />
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Patient Name</th>
                        <th>Patient Contact</th>
                        <th>Patient Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prescriptions as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->patient->first_name }} {{ $item->patient->last_name }}</td>
                        <td>{{ $item->patient->contact_number }}</td>
                        <td>{{ $item->patient->address  }}</td>
                        <td>
                            <a href="{{ url('/doctor/patients/' . $item->patient->id) }}"
                                title="Patient Profile"><button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                        aria-hidden="true"></i>
                                    Patient Profile</button></a>
                            <a href="{{ url('/doctor/inquiry/' . $item->id . '/edit') }}"
                                title="Add Prescription"><button class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> Prescribe</button></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $prescriptions->appends(['search' => Request::get('search')])->render()
                !!} </div>
        </div>

    </div>
</div>

@endsection