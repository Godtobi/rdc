<!-- Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('vehicleId', 'Vehicle ID:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('vehicleId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('vehicleId', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Description Field -->
<div class="form-group col-sm-6 {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<br/>
<br/>
<br/>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('vehicleTypes.index') }}" class="btn btn-danger">Cancel</a>
</div>
