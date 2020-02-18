<!-- First Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('first_name') ? 'has-error' : ''}}">
    {!! Form::label('first_name', 'First Name:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('first_name', null, ['required','class' => 'form-control']) !!}
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Last Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('last_name') ? 'has-error' : ''}}">
    {!! Form::label('last_name', 'Last Name:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('last_name', null, ['required','class' => 'form-control']) !!}
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Phone Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('phone', null, ['required','class' => 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group col-sm-6  {{ $errors->has('role_id') ? 'has-error' : ''}}">
    {!! Form::label('role_id', 'Role', ['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('role_id', $roles, null, ['class' => 'form-control', 'placeholder' => 'Pick a Role']) !!}
        {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<!-- Picture Field -->
<div class="form-group col-sm-6 {{ $errors->has('picture') ? 'has-error' : ''}}">
    {!! Form::label('picture', 'Picture:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::file('picture', null, ['class' => 'form-control']) !!}
        {!! $errors->first('picture', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Phone Field -->
<div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'E-Mail:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::email('email', null, ['required','class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@include('user_details.account')


<br/>
<br/>
<br/>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userDetails.index') }}" class="btn btn-danger">Cancel</a>
</div>
