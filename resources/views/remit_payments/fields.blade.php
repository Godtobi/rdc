<!-- Agent Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('agent_id') ? 'has-error' : ''}}">
    {!! Form::label('agent_id', 'Agent Id:',['class' => 'col-sm-12 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('agent_id', null, ['class' => 'form-control']) !!}
                {!! $errors->first('agent_id', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Collector Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('collector_id') ? 'has-error' : ''}}">
    {!! Form::label('collector_id', 'Collector Id:',['class' => 'col-sm-12 control-label']) !!}
     <div class="col-sm-12">
                {!! Form::text('collector_id', null, ['class' => 'form-control']) !!}
                {!! $errors->first('collector_id', '<p class="help-block">:message</p>') !!}
            </div>
</div>


<!-- Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('date') ? 'has-error' : ''}}">
    {!! Form::label('date', 'Date:',['class' => 'col-sm-12 control-label']) !!}

    <div class="col-sm-12">
                     {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush


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
    <a href="{{ route('remitPayments.index') }}" class="btn btn-danger">Cancel</a>
</div>
