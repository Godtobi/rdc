<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $vehicleType->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $vehicleType->description }}</p>
</div>

<!-- Vehicleid Field -->
<div class="form-group">
    {!! Form::label('vehicleId', 'Vehicleid:') !!}
    <p>{{ $vehicleType->vehicleId }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $vehicleType->amount }}</p>
</div>

