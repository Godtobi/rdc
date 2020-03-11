<!-- Firstname Field -->
<div class="form-group col-sm-6 {{ $errors->has('firstname') ? 'has-error' : ''}}">
    {!! Form::label('firstname', 'Firstname:',['class' => 'col-sm-4 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Middlename Field -->
<div class="form-group col-sm-6 {{ $errors->has('middlename') ? 'has-error' : ''}}">
    {!! Form::label('middlename', 'Middlename:',['class' => 'col-sm-4 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('middlename', null, ['class' => 'form-control']) !!}
                {!! $errors->first('middlename', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Lastname Field -->
<div class="form-group col-sm-6 {{ $errors->has('lastname') ? 'has-error' : ''}}">
    {!! Form::label('lastname', 'Lastname:',['class' => 'col-sm-4 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Address Field -->
<div class="form-group col-sm-6 {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address:',['class' => 'col-sm-4 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
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


<!-- Maiden Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('maiden_name') ? 'has-error' : ''}}">
    {!! Form::label('maiden_name', 'Maiden Name:',['class' => 'col-sm-4 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('maiden_name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('maiden_name', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Origin Field -->
<div class="form-group col-sm-6 {{ $errors->has('origin') ? 'has-error' : ''}}">
    {!! Form::label('origin', 'Origin:',['class' => 'col-sm-4 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('origin', null, ['class' => 'form-control']) !!}
                {!! $errors->first('origin', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Vehicle Type Field -->
<div class="form-group col-sm-6 {{ $errors->has('vehicle_type') ? 'has-error' : ''}}">
    {!! Form::label('vehicle_type', 'Vehicle Type:',['class' => 'col-sm-4 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('vehicle_type', null, ['class' => 'form-control']) !!}
                {!! $errors->first('vehicle_type', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Local Govt Field -->
<div class="form-group col-sm-6 {{ $errors->has('local_govt') ? 'has-error' : ''}}">
    {!! Form::label('local_govt', 'Local Govt:',['class' => 'col-sm-4 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('local_govt', null, ['class' => 'form-control']) !!}
                {!! $errors->first('local_govt', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Parkmanager Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('Parkmanager_id') ? 'has-error' : ''}}">
    {!! Form::label('Parkmanager_id', 'Parkmanager Id:',['class' => 'col-sm-4 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('Parkmanager_id', null, ['class' => 'form-control']) !!}
                {!! $errors->first('Parkmanager_id', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<br/>
<br/>
<br/>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parkManagers.index') }}" class="btn btn-danger">Cancel</a>
</div>
