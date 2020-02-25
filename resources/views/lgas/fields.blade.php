<!-- Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Lgaid Field -->
<div class="form-group col-sm-6 {{ $errors->has('lgaId') ? 'has-error' : ''}}">
    {!! Form::label('lgaId', 'Lgaid:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('lgaId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('lgaId', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<br/>
<br/>
<br/>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('lgas.index') }}" class="btn btn-danger">Cancel</a>
</div>
