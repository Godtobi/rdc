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
                    <li>
                        <a href="create_user.html">
                            <i class="metismenu-icon">
                            </i>Create Users
                        </a>
                    </li>
                    <li>
                        <a href="manage_user.html">
                            <i class="metismenu-icon">
                            </i>Manage Users
                        </a>
                    </li>
                    <li>
                        <a href="user_reports.html">
                            <i class="metismenu-icon">
                            </i>User analytics
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-users"></i>
                    Agents
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="create_agent.html">
                            <i class="metismenu-icon"></i>
                            Create field Agent
                        </a>
                    </li>
                    <li>
                        <a href="manage_agent.html">
                            <i class="metismenu-icon">
                            </i>Manage field Agents
                        </a>
                    </li>
                    <li>
                        <a href="agent_reports.html">
                            <i class="metismenu-icon">
                            </i>Agents Analytics
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
                    <li class="{{ Request::is('drivers/create') ? 'mm-active' : '' }}">
                        <a href="{{ route('drivers.create') }}">
                            <i class="metismenu-icon">
                            </i>Create Drivers
                        </a>
                    </li>


                    <li class="{{ Request::is('drivers') ? 'mm-active' : '' }}">
                        <a href="{{ route('drivers.index') }}">
                            <i class="metismenu-icon">
                            </i>Manage Drivers
                        </a>
                    </li>

                    <li class="{{ Request::is('vehicleTypes*') ? 'mm-active' : '' }}">
                        <a href="{{ route('vehicleTypes.index') }}">
                            <i class="metismenu-icon">
                            </i>Vehicle Types
                        </a>
                    </li>

                    <li>
                        <a href="driver_reports.html">
                            <i class="metismenu-icon">
                            </i>Driver Analytics
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-cash"></i>
                    Collectors
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="create_collector.html">
                            <i class="metismenu-icon">
                            </i>Create Collectors
                        </a>
                    </li>
                    <li>
                        <a href="manage_collector.html">
                            <i class="metismenu-icon">
                            </i>Manage Collectors
                        </a>
                    </li>
                    <li>
                        <a href="collector_reports.html">
                            <i class="metismenu-icon">
                            </i>Collector Analytics
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
                    <li>
                        <a href="create_collector.html">
                            <i class="metismenu-icon">
                            </i>Create Collectors
                        </a>
                    </li>
                    <li>
                        <a href="manage_collector.html">
                            <i class="metismenu-icon">
                            </i>Manage Collectors
                        </a>
                    </li>
                    <li>
                        <a href="apps-faq-section.html">
                            <i class="metismenu-icon">
                            </i>Collector Analytics
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
                    <li>
                        <a href="#">
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
                    <i class="metismenu-icon pe-7s-news-paper"></i>
                    Receipts
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="components-tabs.html">
                            <i class="metismenu-icon">
                            </i>Generate Receipts
                        </a>
                    </li>
                    <li>
                        <a href="components-accordions.html">
                            <i class="metismenu-icon">
                            </i>Verify Receipts
                        </a>
                    </li>
                    <li>
                        <a href="components-notifications.html">
                            <i class="metismenu-icon">
                            </i>Receipt reports
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
                    <li>
                        <a href="tables-data-tables.html">
                            <i class="metismenu-icon">
                            </i>View recorded Remittances
                        </a>
                    </li>
                    <li>
                        <a href="tables-regular.html">
                            <i class="metismenu-icon">
                            </i>Remittance Analytics
                        </a>
                    </li>
                </ul>
            </li>
            <li class="app-sidebar__heading">Reports & Analytics</li>
            <li>
                <a href="widgets-chart-boxes.html">
                    <i class="metismenu-icon pe-7s-graph">
                    </i>User Reports
                </a>
            </li>
            <li>
                <a href="widgets-chart-boxes-2.html">
                    <i class="metismenu-icon pe-7s-way">
                    </i>Agent & Driver reports
                </a>
            </li>
            <li>
                <a href="widgets-chart-boxes-3.html">
                    <i class="metismenu-icon pe-7s-ball">
                    </i>Collections & Enforcers
                </a>
            </li>
            <li>
                <a href="widgets-profile-boxes.html">
                    <i class="metismenu-icon pe-7s-id">
                    </i>Financials
                </a>
            </li>
        </ul>
    </div>
</div>
