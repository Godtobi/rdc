@extends('layouts.main')
@section('title', "Create Vehicle Type")
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
                            Vehicle Type

                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                @include('adminlte-templates::common.errors')
                    <div class="card-body">
                        <h5 class="card-title">Vehicle Type</h5>

                        {!! Form::open(['route' => 'vehicleTypes.store', 'class'=>"col-md-10 mx-auto", 'id'=>"signupForm"]) !!}

                                                @include('vehicle_types.fields')

                                            {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>


@endsection


