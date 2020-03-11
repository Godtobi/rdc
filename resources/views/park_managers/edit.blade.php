@extends('layouts.main')
@section('title', "Edit Park Manager")
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
                            Park Manager

                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                @include('adminlte-templates::common.errors')
                    <div class="card-body">
                        <h5 class="card-title">Park Manager</h5>


                        {!! Form::model($parkManager, ['route' => ['parkManagers.update', $parkManager->id, 'class'=>"col-md-10 mx-auto", 'id'=>"signupForm"], 'method' => 'patch']) !!}

                                                @include('park_managers.fields')

                                           {!! Form::close() !!}




                    </div>
                </div>
            </div>
        </div>


@endsection


