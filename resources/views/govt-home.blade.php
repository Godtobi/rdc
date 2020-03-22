@extends('layouts.main')
@section('title', "CDR BILL COLLECTION SYSTEM.")
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Dashboard
                            <div class="page-title-subheading">CDR BILL COLLECTIONS APPLICATION.
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                    </div>
                </div>
            </div>
            <div class="tabs-animation">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card mb-3 widget-chart">
                            <div class="widget-chart-content">
                                <div class="icon-wrapper rounded">
                                    <div class="icon-wrapper-bg bg-warning"></div>
                                    <i class="metismenu-icon pe-7s-cash text-warning"></i></div>
                                <div class="widget-numbers">
                                    <span>₦	{{$paymentToday}}</span>
                                </div>
                                <div
                                    class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    Total Amount
                                </div>

                            </div>
                            <div class="widget-chart-wrapper">
                                <div id="dashboard-sparklines-simple-1"></div>
                            </div>
                        </div>
                    </div>




                    {{--<div class="col-sm-12 col-md-6 col-xl-4">--}}
                        {{--<div class="card mb-3 widget-chart">--}}
                            {{--<div class="widget-chart-content">--}}
                                {{--<div class="icon-wrapper rounded">--}}
                                    {{--<div class="icon-wrapper-bg bg-danger"></div>--}}
                                    {{--<i class="metismenu-icon pe-7s-credit text-danger"></i>--}}
                                {{--</div>--}}
                                {{--<div class="widget-numbers"><span>₦{{$projectedRev}}</span></div>--}}
                                {{--<div class="widget-subheading fsize-1 pt-2 opacity-10 text-danger font-weight-bold">--}}
                                    {{--Projected Revenue--}}
                                {{--</div>--}}
                                {{--<div class="widget-description opacity-8">--}}
                                    {{--Compared to deposits:--}}
                                    {{--<span class="text-info pl-1">--}}
                                                    {{--<i class="fa fa-angle-down"></i>--}}
                                                    {{--<span class="pl-1">{{$diffProj}}%</span>--}}
                                                {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="widget-chart-wrapper">--}}
                                {{--<div id="dashboard-sparklines-simple-2"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="col-sm-12 col-md-12 col-xl-4">
                        <div class="card mb-3 widget-chart">
                            <div class="widget-chart-content">
                                <div class="icon-wrapper rounded">
                                    <div class="icon-wrapper-bg bg-info"></div>
                                    <i class="metismenu-icon pe-7s-car text-info"></i></div>
                                <div class="widget-numbers text-danger"><span>{{$drivers}}</span></div>
                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-info font-weight-bold">
                                    Total Drivers
                                </div>

                            </div>
                            <div class="widget-chart-wrapper">
                                <div id="dashboard-sparklines-simple-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mbg-3">
                    <a href="{{url('payments/report')}}"><button class="btn-wide btn-pill btn-shadow fsize-1 btn btn-focus btn-lg">
                                    <span class="mr-2 opacity-7">
                                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                    </span>
                            View Complete Report
                        </button></a>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="mb-3 card">
                            <div class="card-header-tab card-header">
                                <div>Driver Table</div>
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <button class="btn-shadow  btn btn-dark">Refresh</button>
                                        <button type="button" class="btn-shadow  btn btn-dark">Remove</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="card no-shadow bg-transparent no-border rm-borders mb-3">
                    <div class="card">
                        <div class="no-gutters row">
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <div class="pt-0 pb-0 card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Total Drivers</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="widget-numbers text-primary">{{$drivers}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-progress-wrapper">
                                                        <div
                                                            class="progress-bar-sm progress-bar-animated-alt progress">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 aria-valuenow="43" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: 43%;"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-wrapper-footer">
            <div class="app-footer">
                <div class="app-footer__inner">
                    <div class="app-footer-left">
                        <div class="footer-dots">

                            <div class="dots-separator"></div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection


