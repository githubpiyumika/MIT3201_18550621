@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Admin Dashboard</li>
</ol>
<!-- Icon Cards-->
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-user-md"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$doctorToday}} New Doctors!</h5>
                    <h5>{{$doctorTotal}} Total Doctors!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/admin/doctors">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-user"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$patientToday}} New Patients!</h5>
                    <h5>{{$patientTotal}} Total Patients!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/admin/patients">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-calendar-check-o"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$prescriptionToday}} New Inquiries!</h5>
                    <h5>{{$prescriptionTotal}} Total Inquiries!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-ambulance"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$pharmacyToday}} New Pharmacies!</h5>
                    <h5>{{$pharmacyTotal}} Total Pharmacies!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="bookmarks.html">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>


@endsection