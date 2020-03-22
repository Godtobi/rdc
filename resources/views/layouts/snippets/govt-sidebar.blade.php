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
                    <li class="{{ Request::is('userDetails/create') ? 'mm-active' : '' }}">
                        <a href="{{ route('userDetails.create') }}">
                            <i class="metismenu-icon">
                            </i>Create Users
                        </a>
                    </li>
                    <li class="{{ Request::is('userDetails') ? 'mm-active' : '' }}">
                        <a href="{{ route('userDetails.index') }}">
                            <i class="metismenu-icon">
                            </i>Manage Users
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
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </div>
</div>
