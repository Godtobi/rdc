<li class="{{ Request::is('drivers*') ? 'active' : '' }}">
    <a href="{{ route('drivers.index') }}"><i class="fa fa-edit"></i><span>Drivers</span></a>
</li>

<li class="{{ Request::is('vehicleTypes*') ? 'active' : '' }}">
    <a href="{{ route('vehicleTypes.index') }}"><i class="fa fa-edit"></i><span>Vehicle Types</span></a>
</li>

