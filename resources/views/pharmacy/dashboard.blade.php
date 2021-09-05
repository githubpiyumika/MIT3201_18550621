@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Pharmacy Dashboard</li>
</ol>
<!-- Icon Cards-->
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-envelope-open"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$prescriptionOpen}} Open Prescriptions!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="pharmacy/prescriptions/">
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
                    <i class="fa fa-fw fa-star"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$prescriptionPacking}} Packing Prescriptions!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="pharmacy/prescriptions/packing">
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
                    <h5>{{$prescriptionDispatched}} Dispatched Prescriptions!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="pharmacy/prescriptions/dispatched">
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
                    <i class="fa fa-fw fa-heart"></i>
                </div>
                <div class="mr-5">
                    <h5>{{$prescriptionDelivered}} Delivered Prescriptions!</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="pharmacy/prescriptions/delivered">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>


@endsection