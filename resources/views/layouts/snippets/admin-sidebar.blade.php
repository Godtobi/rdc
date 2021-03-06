<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <!-- <li class="app-sidebar__heading">Menu</li> -->
            <li
                class="{{ Request::is('home') ? 'mm-active' : '' }}">
                <a href="{{ url('home') }}">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Dashboard
                </a>
            </li>
            <li class="app-sidebar__heading">Users</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-user"></i>
                    Users
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    {{--<li class="{{ Request::is('userDetails/create') ? 'mm-active' : '' }}">--}}
                        {{--<a href="{{ route('userDetails.create') }}">--}}
                            {{--<i class="metismenu-icon">--}}
                            {{--</i>Create Users--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li class="{{ Request::is('userDetails') ? 'mm-active' : '' }}">
                        <a href="{{ route('userDetails.index') }}">
                            <i class="metismenu-icon">
                            </i>Manage Users
                        </a>
                    </li>

                    <li class="{{ Request::is('parkManagers') ? 'mm-active' : '' }}">
                        <a href="{{ route('parkManagers.index') }}">
                            <i class="metismenu-icon">
                            </i>Manage Park Managers
                        </a>
                    </li>
                </ul>
            </li>
            @if (request()->url() == url('home2'))
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Admin Agent
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li class="{{ Request::is('agencies/create') ? 'mm-active' : '' }}">
                            <a href="{{ route('agencies.create') }}">
                                <i class="metismenu-icon"></i>
                                Create Admin Agent
                            </a>
                        </li>
                        <li class="{{ Request::is('agencies') ? 'mm-active' : '' }}">
                            <a href="{{ route('agencies.index') }}">
                                <i class="metismenu-icon">
                                </i>Manage Admin Agent
                            </a>
                        </li>

                    </ul>
                </li>
            @endif


            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-users"></i>
                    Agents
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    {{--<li class="{{ Request::is('agents/create') ? 'mm-active' : '' }}">--}}
                        {{--<a href="{{ route('agents.create') }}">--}}
                            {{--<i class="metismenu-icon"></i>--}}
                            {{--Create field Agent--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li class="{{ Request::is('agents') ? 'mm-active' : '' }}">
                        <a href="{{ route('agents.index') }}">
                            <i class="metismenu-icon">
                            </i>Manage field Agents
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-car"></i>
                    Drivers
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    {{--<li class="{{ Request::is('drivers/create') ? 'mm-active' : '' }}">--}}
                        {{--<a href="{{ route('drivers.create') }}">--}}
                            {{--<i class="metismenu-icon">--}}
                            {{--</i>Create Drivers--}}
                        {{--</a>--}}
                    {{--</li>--}}


                    <li class="{{ Request::is('drivers') ? 'mm-active' : '' }}">
                        <a href="{{ route('drivers.index') }}">
                            <i class="metismenu-icon">
                            </i>Manage Drivers
                        </a>
                    </li>

                    {{--<li class="{{ Request::is('vehicleTypes*') ? 'mm-active' : '' }}">--}}
                        {{--<a href="{{ route('vehicleTypes.index') }}">--}}
                            {{--<i class="metismenu-icon">--}}
                            {{--</i>Vehicle Types--}}
                        {{--</a>--}}
                    {{--</li>--}}


                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-cash"></i>
                    Collectors
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    {{--<li class="{{ Request::is('collectors/create') ? 'mm-active' : '' }}">--}}
                        {{--<a href="{{ route('collectors.create') }}">--}}
                            {{--<i class="metismenu-icon">--}}
                            {{--</i>Create Collectors--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li class="{{ Request::is('collectors') ? 'mm-active' : '' }}">
                        <a href="{{ route('collectors.index') }}">
                            <i class="metismenu-icon">
                            </i>Manage Collectors
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-hammer"></i>
                    Enforcers
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    {{--<li class="{{ Request::is('enforcers/create') ? 'mm-active' : '' }}">--}}
                        {{--<a href="{{ route('enforcers.create') }}">--}}
                            {{--<i class="metismenu-icon">--}}
                            {{--</i>Create Enforcers--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li class="{{ Request::is('enforcers') ? 'mm-active' : '' }}">
                        <a href="{{ route('enforcers.index') }}">
                            <i class="metismenu-icon">
                            </i>Manage Enforcers
                        </a>
                    </li>

                </ul>
            </li>
            {{--<li class="{{ Request::is('lgas/index') ? 'mm-active' : '' }}">--}}
                {{--<a href="{{ route('lgas.index') }}">--}}
                    {{--<i class="metismenu-icon pe-7s-id">--}}
                    {{--</i>Local Govt--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="app-sidebar__heading">Financials</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-cash"></i>
                    Transactions
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li class="{{ Request::is('payments') ? 'mm-active' : '' }}">
                        <a href="{{ route('payments.index') }}">
                            <i class="metismenu-icon"></i>
                            View Transacations
                        </a>
                    </li>


                    {{--<li class="{{ Request::is('payments/list') ? 'mm-active' : '' }}">--}}
                        {{--<a href="{{ url('payments/list') }}">--}}
                            {{--<i class="metismenu-icon"></i>--}}
                            {{--Payment List--}}

                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<i class="metismenu-icon"></i>--}}
                            {{--Transacations Reports--}}
                            {{--<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    <li class="{{ Request::is('payments/report') ? 'mm-active' : '' }}">
                        <a href="{{ url('payments/report') }}">
                            <i class="metismenu-icon"></i>
                            Transacations Reports

                        </a>
                    </li>
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<i class="metismenu-icon"></i>--}}
                            {{--Financial Projections--}}

                        {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<i class="metismenu-icon pe-7s-news-paper"></i>--}}
                    {{--Receipts--}}
                    {{--<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>--}}
                {{--</a>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<i class="metismenu-icon">--}}
                            {{--</i>Generate Receipts--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<i class="metismenu-icon">--}}
                            {{--</i>Verify Receipts--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<i class="metismenu-icon">--}}
                            {{--</i>Receipt reports--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Remittance
                    {{--<i class="metismenu-state-icon pe-7s-angle-down "></i>--}}
                </a>
                <ul>
                    <li class="{{ Request::is('remitPayments') ? 'mm-active' : '' }}">
                        <a href="{{ route('remitPayments.index') }}">
                            <i class="metismenu-icon">
                            </i>View recorded Remittances
                        </a>
                    </li>

                </ul>
            </li>
            <li class="app-sidebar__heading">Reports & Analytics</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-graph">
                    </i>User Reports
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    {{--<li class="{{ Request::is('userDetails/create') ? 'mm-active' : '' }}">--}}
                    {{--<a href="{{ route('userDetails.create') }}">--}}
                    {{--<i class="metismenu-icon">--}}
                    {{--</i>Create Users--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    <li class="{{ Request::is('payments/list') ? 'mm-active' : '' }}">
                        <a href="{{ url('payments/list') }}">
                            <i class="metismenu-icon"></i>
                            Payment List

                        </a>
                    </li>
                    </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-way">
                    </i>Agent & Driver reports
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-ball">
                    </i>Collections & Enforcers
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-id">
                    </i>Financials
                </a>
            </li>
        </ul>
    </div>
</div>
