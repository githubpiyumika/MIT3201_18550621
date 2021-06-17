@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Patients</li>
</ol>

<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-list"></i>Patients</h2>
    </div>
    <div>
        <a href="{{ url('/admin/patients/create') }}" class="btn btn-success btn-sm" title="Add New Patient">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>

        <form method="GET" action="{{ url('/admin/patients') }}" accept-charset="UTF-8"
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="{{ url('/admin/patients/' . $item->id) }}" title="View Patient"><button
                                    class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    View</button></a>
                            <a href="{{ url('/admin/patients/' . $item->id . '/edit') }}" title="Edit Patient"><button
                                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('/admin/patients' . '/' . $item->id) }}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Patient"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $patients->appends(['search' => Request::get('search')])->render() !!}
            </div>
        </div>

    </div>
</div>

@endsection