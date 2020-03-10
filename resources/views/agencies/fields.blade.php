<!-- Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Address Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address:',['class' => 'col-sm-4 control-label']) !!}

    <div class="col-sm-12">
        {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<!-- Contact Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('contact_name') ? 'has-error' : ''}}">
    {!! Form::label('contact_name', 'Contact Name:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('contact_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('contact_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Contact Phone Field -->
<div class="form-group col-sm-6 {{ $errors->has('contact_phone') ? 'has-error' : ''}}">
    {!! Form::label('contact_phone', 'Contact Phone:',['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('contact_phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('contact_phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Email Field -->
<div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email:',['class' => 'col-sm-12 control-label']) !!}

    <div class="col-sm-12">
        {!! Form::email('email', @$data->biodata->email, ['class' => 'form-control']) !!}
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
    <a href="{{ route('agencies.index') }}" class="btn btn-danger">Cancel</a>
</div>
