<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('pharmacy.dashboard')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('pharmacy.prescriptions.index')}}">
            <i class="fa fa-fw fa-circle-o"></i>
            <span class="nav-link-text">Open Prescriptions</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('pharmacy.prescriptions.index','packing')}}">
            <i class="fa fa-fw fa-circle-o"></i>
            <span class="nav-link-text">Packing Prescriptions</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('pharmacy.prescriptions.index','dispatched')}}">
            <i class="fa fa-fw fa-circle-o"></i>
            <span class="nav-link-text">Dispatched Prescriptions</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('pharmacy.prescriptions.index','delivered')}}">
            <i class="fa fa-fw fa-circle-o"></i>
            <span class="nav-link-text">Delivered Prescriptions</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('pharmacy.profile.edit')}}">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Edit Profile</span>
        </a>
    </li>
</ul>