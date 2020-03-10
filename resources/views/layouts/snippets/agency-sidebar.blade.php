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
                    <i class="metismenu-icon pe-7s-users"></i>
                    Agents
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li class="{{ Request::is('agents/create') ? 'mm-active' : '' }}">
                        <a href="{{ route('agents.create') }}">
                            <i class="metismenu-icon"></i>
                            Create field Agent
                        </a>
                    </li>
                    <li class="{{ Request::is('agents') ? 'mm-active' : '' }}">
                        <a href="{{ route('agents.index') }}">
                            <i class="metismenu-icon">
                            </i>Manage field Agents
                        </a>
                    </li>

                </ul>
            </li>
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
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon"></i>
                            Transacations Reports
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                    </li>

                    {{--<li class="{{ Request::is('payments/report') ? 'mm-active' : '' }}">--}}
                    {{--<a href="{{ url('payments/report') }}">--}}
                    {{--<i class="metismenu-icon"></i>--}}
                    {{--Transacations Reports--}}
                    {{--<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    <li>
                        <a href="#">
                            <i class="metismenu-icon"></i>
                            Financial Projections
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Remittance
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
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


        </ul>
    </div>
</div>
