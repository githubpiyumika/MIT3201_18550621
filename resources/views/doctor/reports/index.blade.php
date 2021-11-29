@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/doctor/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Reports</li>
</ol>

<div class="row">
    <div class="col-md-4">
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-list"></i>Income Report</h2>
            </div>
            <div>

                <form action="{{route('doctor.reports.income')}}">
                    <div class="form-group">
                        <label for="from_date" class="control-label">From Date</label>
                        <input class="form-control" name="from_date" type="date"
                            value="{{\Carbon\Carbon::today()->toDateString()}}" id="from_date">
                    </div>
                    <div class="form-group">
                        <label for="to_date" class="control-label">To Date</label>
                        <input class="form-control" name="to_date" type="date"
                            value="{{\Carbon\Carbon::today()->toDateString()}}" id="to_date">
                    </div>
                    <div class="form-group">
                        <label for="pay_type_" class="control-label">Payment Type</label>
                        <select name="pay_type_" class="form-control" id="pay_type_">
                            @foreach ($payTypes as $payCode => $payName)
                            <option value="{{ $payCode }}">
                                {{ $payName }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Generate Report">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection