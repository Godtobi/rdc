{!! Form::open(['route' => ['drivers.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('drivers.show', $id) }}" class='mb-2 mr-2 btn-icon btn btn-primary'>
        View
    </a>
    <a href="{{ route('drivers.edit', $id) }}" class='mb-2 mr-2 btn-icon btn btn-secondary'>
         Edit
    </a>
    {!! Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', [
        'type' => 'submit',
        'class' => 'mb-2 mr-2 btn-icon btn btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
