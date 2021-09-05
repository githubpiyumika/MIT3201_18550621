@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/pharmacy/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/pharmacy/prescriptions') }}">Prescriptions</a>
    </li>
    <li class="breadcrumb-item active">#{{ $prescription->id }}</li>
</ol>


<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-eye"></i>Prescription #{{ $prescription->id }}</h2>
    </div>

    <div>
        @if(Session::has('flash_message'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('flash_message') }}
        </p>
        @endif

        <a href="{{ url('/pharmacy/prescriptions/'.$prescription->patient->status) }}" title="Back"><button
                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

        @if ($nextAction)
        <form method="POST" action="{{ url('pharmacy/prescription' . '/' . $prescription->id) }}" accept-charset="UTF-8"
            style="display:inline">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <input type="hidden" name="status" value="{{$nextAction['status']}}">
            <button type="submit" class="btn btn-primary btn-sm" title="Delete Prescription"
                onclick="return confirm(&quot;Confirm {{$nextAction['label']??''}}?&quot;)"><i
                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                {{$nextAction['label']}}</button>
        </form>
        @endif

        <br />
        <br />

        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th colspan="2" class="text-primary">Patient Details</th>
                            </tr>
                            <tr>
                                <th style="width:200px"> First Name: </th>
                                <td> {{ $prescription->patient->first_name }} {{ $prescription->patient->last_name }}
                                </td>
                            </tr>
                            <tr>
                                <th> Address: </th>
                                <td> {!! nl2br($prescription->patient->address) !!} </td>
                            </tr>
                            <tr>
                                <th> Email: </th>
                                <td> {{ $prescription->patient->email }} </td>
                            </tr>
                            <tr>
                                <th> Contact Number: </th>
                                <td> {{ $prescription->patient->contact_number }} </td>
                            </tr>

                            <tr>
                                <th colspan="2" class="text-primary">Doctor Details</th>
                            </tr>
                            <tr>
                                <th style="width:250px"> Name </th>
                                <td> {{ $prescription->doctor->first_name }} {{ $prescription->doctor->last_name }}</td>
                            </tr>
                            <tr>
                                <th> Specialization </th>
                                <td> {{ $prescription->doctor->doctorSpecialization->name }} </td>
                            </tr>
                            <tr>
                                <th> Institute Address </th>
                                <td> {{ $prescription->doctor->institute_address }} </td>
                            </tr>
                            <tr>
                                <th> Mobile </th>
                                <td> {{ $prescription->doctor->mobile }} </td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td> {{ $prescription->doctor->email }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description" class="control-label text-primary">Prescription</label>
                    <textarea class="form-control" rows="15" readonly name="description" type="textarea"
                        id="description">{{nl2br($prescription->description)}}</textarea>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection