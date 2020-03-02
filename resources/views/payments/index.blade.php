@extends('layouts.main')
@section('title', "List Payment")
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-cash icon-gradient bg-tempting-azure">
                            </i>
                        </div>
                        <div>Transactions
                            <div class="page-title-subheading">View Daily Transaction Reports
                            </div>
                            <div class="page-title-subheading">Current Revenue for today is
                                NGN{{number_format($paymentToday)}}
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                Filter By
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-briefcase"></i>
                                            <span>
                                                        Agents
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-users"></i>
                                            <span>
                                                        Drivers
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-apartment"></i>
                                            <span>
                                                        Local Governments
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a disabled class="nav-link disabled">
                                            <i class="nav-link-icon lnr-car"></i>
                                            <span>
                                                        Vehicle Types
                                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    @include('payments.table')
                </div>
            </div>
        </div>
        <div class="app-wrapper-footer">

        </div>
    </div>
@endsection


