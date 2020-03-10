@role('admin')
@include('admin-home')
@else
    @include('agency-home')
    @endrole
