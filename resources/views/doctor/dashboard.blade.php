@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/doctor">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Doctor Dashboard</li>
</ol>
<!-- Icon Cards-->
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-calendar-check-o"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$prescriptionOpen}} Open Inquiries!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="doctor/inquiries">
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
                    <i class="fa fa-fw fa-user-plus"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$patientToday}} New Patients Today!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="doctor/inquiries/prescribed">
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
                    <i class="fa fa-fw fa-usd"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$paymentsToday}} Income Today!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="doctor/report">
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
                    <i class="fa fa-fw fa-credit-card"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$paymentsMonthly}} {{date('F')}} Income!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="doctor/report">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>


@endsection