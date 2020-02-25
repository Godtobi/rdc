

<div class="form-group col-sm-6 {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group col-sm-6 {{ $errors->has('confirm_password') ? 'has-error' : ''}}">
    {!! Form::label('confirm_password', 'Confirm password:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
               placeholder="Confirm password"/>
        {!! $errors->first('confirm_password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
