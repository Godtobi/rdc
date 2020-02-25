<!-- Agent Id Field -->
<div class="form-group">
    {!! Form::label('agent_id', 'Agent Id:') !!}
    <p>{{ $remitPayments->agent_id }}</p>
</div>

<!-- Collector Id Field -->
<div class="form-group">
    {!! Form::label('collector_id', 'Collector Id:') !!}
    <p>{{ $remitPayments->collector_id }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $remitPayments->date }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $remitPayments->amount }}</p>
</div>

