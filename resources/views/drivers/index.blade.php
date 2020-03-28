@extends('layouts.main')
@section('title', "List Drivers")
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="ln lnr-user text-danger">
                            </i>
                        </div>
                        <div>
                            Manage Drivers


                        </div>

                    </div>
                </div>
                {{--<h1 class="pull-right">--}}
                    {{--<a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"--}}
                       {{--href="{{ route('drivers.create') }}">Add New</a>--}}
                {{--</h1>--}}
            </div>
            <div class="main-card mb-3 card">
                @include('flash::message')
                <div class="card-body">
                    <h5 class="card-title">Drivers</h5>

                    @include('drivers.table')


                </div>
            </div>
        </div>

        <div class="text-center">

        </div>
    </div>


@endsection


