<!-- First Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('first_name') ? 'has-error' : ''}}">
    {!! Form::label('first_name', 'First Name:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Last Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('last_name') ? 'has-error' : ''}}">
    {!! Form::label('last_name', 'Last Name:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Phone Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<!-- Email Field -->
<div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email:',['class' => 'col-sm-4 control-label']) !!}

    <div class="col-sm-12">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Address Field -->
<div class="form-group col-sm-6 {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address:',['class' => 'col-sm-4 control-label']) !!}

    <div class="col-sm-12">
        {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<div class="form-group col-sm-6  {{ $errors->has('state_id') ? 'has-error' : ''}}">
    {!! Form::label('state_id', 'State Of Origin', ['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('state_id', $state, null, ['class' => 'form-control', 'placeholder' => 'Pick a State']) !!}
        {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<div class="form-group col-sm-6  {{ $errors->has('marital_status') ? 'has-error' : ''}}">
    {!! Form::label('marital_status', 'Marital Status', ['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('marital_status', $marital, null, ['class' => 'form-control', 'placeholder' => 'Pick a Status']) !!}
        {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<div class="form-group col-sm-6 {{ $errors->has('lga') ? 'has-error' : ''}}">
    {!! Form::label('lga', 'Local Government', ['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::select('lga', $lga, null, ['class' => 'form-control select2', 'placeholder' => 'Pick a Local Govt...']) !!}
        {!! $errors->first('lga', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<br/>
<br/>
<br/>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('enforcers.index') }}" class="btn btn-danger">Cancel</a>
</div>
