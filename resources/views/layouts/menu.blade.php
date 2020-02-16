<li class="{{ Request::is('drivers*') ? 'active' : '' }}">
    <a href="{{ route('drivers.index') }}"><i class="fa fa-edit"></i><span>Drivers</span></a>
</li>

<li class="{{ Request::is('vehicleTypes*') ? 'active' : '' }}">
    <a href="{{ route('vehicleTypes.index') }}"><i class="fa fa-edit"></i><span>Vehicle Types</span></a>
</li>

<li class="{{ Request::is('agents*') ? 'active' : '' }}">
    <a href="{{ route('agents.index') }}"><i class="fa fa-edit"></i><span>Agents</span></a>
</li>

<li class="{{ Request::is('collectors*') ? 'active' : '' }}">
    <a href="{{ route('collectors.index') }}"><i class="fa fa-edit"></i><span>Collectors</span></a>
</li>

<li class="{{ Request::is('enforcers*') ? 'active' : '' }}">
    <a href="{{ route('enforcers.index') }}"><i class="fa fa-edit"></i><span>Enforcers</span></a>
</li>

