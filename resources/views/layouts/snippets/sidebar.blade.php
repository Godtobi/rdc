    @role('admin')
        @include('layouts.snippets.admin-sidebar')
    @else
        @include('layouts.snippets.agency-sidebar')
    @endrole
