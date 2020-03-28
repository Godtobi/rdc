{!! Form::open(['route' => ['agents.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    {{--<a href="{{ route('agents.show', $id) }}" class='mb-2 mr-2 btn-icon btn btn-primary'>--}}
        {{--<i class="lnr-crop btn-icon-wrapper"></i>View--}}
    {{--</a>--}}
    <a href="{{ route('agents.edit', $id) }}" class='mb-2 mr-2 btn-icon btn btn-success'>
    Edit
    </a>
    <a href="{{ route('agents.reset', $id) }}" class='mb-2 mr-2 btn-icon btn btn-primary'>
     Reset Device
    </a>
    {!! Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', [
        'type' => 'submit',
        'class' => 'mb-2 mr-2 btn-icon btn btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
