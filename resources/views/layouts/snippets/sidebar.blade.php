<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">

            <li class="app-sidebar__heading">Dashboard Widgets</li>

            <li class="{{ Request::is('drivers*') ? 'mm-active' : '' }}">
                <a href="{{ route('drivers.index') }}"><i
                        class="metismenu-icon pe-7s-graph"></i><span>Drivers</span></a>
            </li>


            <li class="{{ Request::is('vehicleTypes*') ? 'mm-active' : '' }}">
                <a href="{{ route('vehicleTypes.index') }}"><i
                        class="metismenu-icon pe-7s-way"></i><span>Vehicle Types</span></a>
            </li>


            <li>
                <a href="widgets-chart-boxes-3.html">
                    <i class="metismenu-icon pe-7s-ball">
                    </i>Chart Boxes 3
                </a>
            </li>
            <li>
                <a href="widgets-profile-boxes.html">
                    <i class="metismenu-icon pe-7s-id">
                    </i>Profile Boxes
                </a>
            </li>
            <li>
                <a href="charts-sparklines.html">
                    <i class="metismenu-icon pe-7s-graph1">
                    </i>Chart Sparklines
                </a>
            </li>
        </ul>
    </div>
</div>
