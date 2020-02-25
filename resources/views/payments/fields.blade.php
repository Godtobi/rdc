<!-- Vehicle Plate Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('vehicle_plate_number') ? 'has-error' : ''}}">
    {!! Form::label('vehicle_plate_number', 'Vehicle Plate Number:',['class' => 'col-sm-12 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('vehicle_plate_number', null, ['class' => 'form-control']) !!}
                {!! $errors->first('vehicle_plate_number', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Driver Code Field -->
<div class="form-group col-sm-6 {{ $errors->has('driver_code') ? 'has-error' : ''}}">
    {!! Form::label('driver_code', 'Driver Code:',['class' => 'col-sm-12 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('driver_code', null, ['class' => 'form-control']) !!}
                {!! $errors->first('driver_code', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Vehicle Type Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('vehicle_type_id') ? 'has-error' : ''}}">
    {!! Form::label('vehicle_type_id', 'Vehicle Type Id:',['class' => 'col-sm-12 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('vehicle_type_id', null, ['class' => 'form-control']) !!}
                {!! $errors->first('vehicle_type_id', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Amount Field -->
<div class="form-group col-sm-6 {{ $errors->has('amount') ? 'has-error' : ''}}">
    {!! Form::label('amount', 'Amount:',['class' => 'col-sm-12 control-label']) !!}

     <div class="col-sm-12">
                          {!! Form::number('amount', null, ['class' => 'form-control']) !!}

                        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
                    </div>
</div>


<br/>
<br/>
<br/>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('payments.index') }}" class="btn btn-danger">Cancel</a>
</div>
