@extends('layouts.main')
@section('title', "Report")
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-graph2 icon-gradient bg-happy-green">
                            </i>
                        </div>
                        <div>Transaction Analysis
                            <!-- <div class="page-title-subheading">Wonderful animated charts built as a jQuery component.
                            </div> -->
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
                                    @unlessrole('govt')
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
                                    @endunlessrole
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

            <strong>
                Transaction Revenue for
                @if(empty($from) && empty($to))
                    Last 15 Days
                @else
                    <span class="reportDateClass"></span>
                @endif
            </strong>

            <div
                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 20%">
                <input id="reportrangeV" style="width: 80%">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
            </div>


            {{--<div>--}}
            {{----}}
            {{--</div>--}}
            {{--<input id="reportrangeV"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 50%"/>--}}
            {{--<i class="fa fa-calendar"></i>&nbsp;--}}
            {{--<span></span> <i class="fa fa-caret-down"></i>--}}

            <div class="row">

                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            {{--<h5 class="card-title">Transaction Revenue for Last 15 Days</h5>--}}
                            <div>
                                {!! $usersChart->container() !!}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>



@endsection

@push('scripts')

    {{-- ChartScript --}}
    {!! $usersChart->script() !!}
@endpush

@section('js')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <script>

        function cb(start, end) {
            $('#reportrangeV span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('.reportDateClass').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        console.log('f')

        // //plottest();
        // var start = moment().subtract(29, 'days');
        // var end = moment();
        //


        //plottest();
        var start = moment.unix("{{ $date_from }}");
        var end = moment.unix("{{ $date_to }}");


        $('#reportrangeV').daterangepicker({
            startDate: start,
            endDate: end,
            //format: 'YYYY-MM-DD',
            ranges: {
                //'Today': [moment().startOf('day'), moment().endOf('day')],
                //'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days').endOf('day')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
            }
        }, cb);

        cb(start, end);
    </script>
    <script>

        $(function () {
            $('#reportrangeV').on('change', function () {
                // //alert('apply clicked!');
                var res = $('#reportrangeV').val().split("-");
                var startDate = res[0].trim();
                var endDate = res[1].trim();

                $('<form method="get" action="{{url('payments/report')}}">')
                    .append('<input type="text" name="date_from" value="' + startDate + '">')
                    .append('<input type="text" name="date_to" value="' + endDate + '">')
                    .appendTo('body')
                    .submit()
            });
            // $('#reportrangeV').on('apply.daterangepicker', function (e, picker) {
            //
            //
            // })
        });


    </script>
@endsection



