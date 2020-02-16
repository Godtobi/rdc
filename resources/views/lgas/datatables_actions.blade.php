{!! Form::open(['route' => ['lgas.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('lgas.show', $id) }}" class='mb-2 mr-2 btn-icon btn btn-primary'>
        <i class="lnr-crop btn-icon-wrapper"></i>View
    </a>
    <a href="{{ route('lgas.edit', $id) }}" class='mb-2 mr-2 btn-icon btn btn-secondary'>
        <i class="lnr-location btn-icon-wrapper"> </i> Edit
    </a>
</div>
{!! Form::close() !!}
