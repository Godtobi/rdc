<!-- First Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('first_name') ? 'has-error' : ''}}">
    {!! Form::label('first_name', 'First Name:',['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Middle Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('middle_name') ? 'has-error' : ''}}">
    {!! Form::label('middle_name', 'Middle Name:',['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Last Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('last_name') ? 'has-error' : ''}}">
    {!! Form::label('last_name', 'Last Name:',['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Address Field -->
<div class="form-group col-sm-6 {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address:',['class' => 'col-sm-8 control-label']) !!}

    <div class="col-sm-12">
        {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<!-- Phone Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone:',['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Plate No Field -->
<div class="form-group col-sm-6 {{ $errors->has('plate_no') ? 'has-error' : ''}}">
    {!! Form::label('plate_no', 'Plate No:',['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('plate_no', null, ['class' => 'form-control']) !!}
        {!! $errors->first('plate_no', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group  col-sm-6 {{ $errors->has('vehicle_type_id') ? 'has-error' : ''}}">
    {!! Form::label('vehicle_type_id', 'Vehicle Type', ['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::select('vehicle_type_id', $vehicleType, null, ['class' => 'form-control select2', 'placeholder' => 'Pick a Vehicle Type...']) !!}
        {!! $errors->first('vehicle_type_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<!-- Mother Maiden Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('mother_maiden_name') ? 'has-error' : ''}}">
    {!! Form::label('mother_maiden_name', 'Mother Maiden Name:',['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('mother_maiden_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mother_maiden_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Vehicle Owner Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('vehicle_owner_name') ? 'has-error' : ''}}">
    {!! Form::label('vehicle_owner_name', 'Vehicle Owner Name:',['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('vehicle_owner_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('vehicle_owner_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Vehicle Owner Phone Field -->
<div class="form-group col-sm-6 {{ $errors->has('vehicle_owner_phone') ? 'has-error' : ''}}">
    {!! Form::label('vehicle_owner_phone', 'Vehicle Owner Phone:',['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('vehicle_owner_phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('vehicle_owner_phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group col-sm-6 {{ $errors->has('lga') ? 'has-error' : ''}}">
    {!! Form::label('lga', 'Lga', ['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::select('lga', $lga, null, ['class' => 'form-control select2', 'placeholder' => 'Pick a Local Govt...']) !!}
        {!! $errors->first('lga', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<!-- Passport Field -->
<div class="form-group col-sm-6 {{ $errors->has('passport') ? 'has-error' : ''}}">
    {!! Form::label('passport', 'Passport:',['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::file('passport', null, ['class' => 'form-control']) !!}
        {!! $errors->first('passport', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<br/>
<br/>
<br/>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('drivers.index') }}" class="mb-2 mr-2 btn-icon btn btn-danger">Cancel</a>
</div>
