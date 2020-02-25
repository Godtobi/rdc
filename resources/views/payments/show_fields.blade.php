<!-- Vehicle Plate Number Field -->
<div class="form-group">
    {!! Form::label('vehicle_plate_number', 'Vehicle Plate Number:') !!}
    <p>{{ $payment->vehicle_plate_number }}</p>
</div>

<!-- Driver Code Field -->
<div class="form-group">
    {!! Form::label('driver_code', 'Driver Code:') !!}
    <p>{{ $payment->driver_code }}</p>
</div>

<!-- Vehicle Type Id Field -->
<div class="form-group">
    {!! Form::label('vehicle_type_id', 'Vehicle Type Id:') !!}
    <p>{{ $payment->vehicle_type_id }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $payment->amount }}</p>
</div>

