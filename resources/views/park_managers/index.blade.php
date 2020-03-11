@extends('layouts.main')
@section('title', "List Park Manager")
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
                            Park Managers




                            </div>

                        </div>
                    </div>
                    <h1 class="pull-right">
                                                                                       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('parkManagers.create') }}">Add New</a>
                                                                                    </h1>
                </div>
                <div class="main-card mb-3 card">
               @include('flash::message')
                    <div class="card-body">
                        <h5 class="card-title">Park Manager</h5>

                       @include('park_managers.table')


                    </div>
                </div>
            </div>

            <div class="text-center">
                    
                    </div>
        </div>


@endsection


