@extends('layouts.main')
@section('title', "$agent->first_name Payments")
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="lnr-picture text-danger">
                            </i>
                        </div>
                        <div>
                            {{$agent->first_name}} Payments


                        </div>

                    </div>
                </div>

            </div>
            <div class="main-card mb-3 card">
                @include('flash::message')
                <div class="card-body">
                    <h5 class="card-title">{{$agent->first_name}} Payments</h5>

                    @include('payments.table')


                </div>
            </div>
        </div>

        <div class="text-center">

        </div>
    </div>


@endsection


