{!! Form::open(['route' => ['collectors.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('collectors.show', $id) }}" class='mb-2 mr-2 btn-icon btn btn-primary'>
        <i class="lnr-crop btn-icon-wrapper"></i>View
    </a>
    <a href="{{ route('collectors.edit', $id) }}" class='mb-2 mr-2 btn-icon btn btn-secondary'>
        <i class="lnr-location btn-icon-wrapper"> </i> Edit
    </a>
    <a href="{{ route('collectors.reset', $id) }}" class='mb-2 mr-2 btn-icon btn btn-secondary'>
        <i class="lnr-location btn-icon-wrapper"> </i> Reset Device
    </a>
    {!! Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', [
        'type' => 'submit',
        'class' => 'mb-2 mr-2 btn-icon btn btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
