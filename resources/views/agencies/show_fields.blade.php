<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $agency->name }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $agency->address }}</p>
</div>

<!-- Contact Name Field -->
<div class="form-group">
    {!! Form::label('contact_name', 'Contact Name:') !!}
    <p>{{ $agency->contact_name }}</p>
</div>

<!-- Contact Phone Field -->
<div class="form-group">
    {!! Form::label('contact_phone', 'Contact Phone:') !!}
    <p>{{ $agency->contact_phone }}</p>
</div>

