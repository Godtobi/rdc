@extends('layouts.main')
@section('title', "Edit Agent")
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
                            Agent

                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                @include('adminlte-templates::common.errors')
                    <div class="card-body">
                        <h5 class="card-title">Agent</h5>


                        {!! Form::model($agent, ['route' => ['agents.update', $agent->id, 'class'=>"col-md-10 mx-auto", 'id'=>"signupForm"], 'method' => 'patch']) !!}

                                                @include('agents.fields')

                                           {!! Form::close() !!}




                    </div>
                </div>
            </div>
        </div>


@endsection


