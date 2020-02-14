@extends('layouts.main')
@section('title', "Show Drivers")
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
                            Drivers

                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                @include('adminlte-templates::common.errors')
                    <div class="card-body">
                        <h5 class="card-title">Drivers</h5>
<a href="{{ route('drivers.index') }}" class="mb-2 mr-2 btn-icon btn btn-primary">Back</a>
                        @include('drivers.show_fields')

<a href="{{ route('drivers.index') }}" class="mb-2 mr-2 btn-icon btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>


@endsection


