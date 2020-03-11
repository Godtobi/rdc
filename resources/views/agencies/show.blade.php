@extends('layouts.main')
@section('title', "$agency->name Agents")
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
                            {{$agency->name}} Agents


                        </div>

                    </div>
                </div>

            </div>
            <div class="main-card mb-3 card">
                @include('flash::message')
                <div class="card-body">
                    <h5 class="card-title">{{$agency->name}} Agents</h5>

                    @include('agencies.table')


                </div>
            </div>
        </div>

        <div class="text-center">

        </div>
    </div>


@endsection


