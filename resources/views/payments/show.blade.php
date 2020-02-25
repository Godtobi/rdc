@extends('layouts.main')
@section('title', "Show Payment")
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
                            Payment

                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                @include('adminlte-templates::common.errors')
                    <div class="card-body">
                        <h5 class="card-title">Payment</h5>
<a href="{{ route('payments.index') }}" class="mb-2 mr-2 btn-icon btn btn-primary">Back</a>
                        @include('payments.show_fields')

<a href="{{ route('payments.index') }}" class="mb-2 mr-2 btn-icon btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>


@endsection


