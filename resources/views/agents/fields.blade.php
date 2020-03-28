<div class="row">
    <!-- First Name Field -->
    <div class="form-group col-sm-6 {{ $errors->has('first_name') ? 'has-error' : ''}}">
        {!! Form::label('first_name', 'First Name:',['class' => 'col-sm-12 control-label']) !!}
        <div class="col-sm-12">
            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


    <!-- Last Name Field -->
    <div class="form-group col-sm-6 {{ $errors->has('last_name') ? 'has-error' : ''}}">
        {!! Form::label('last_name', 'Last Name:',['class' => 'col-sm-12 control-label']) !!}
        <div class="col-sm-12">
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">

    <!-- Phone Field -->
    <div class="form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
        {!! Form::label('phone', 'Phone:',['class' => 'col-sm-12 control-label']) !!}
        <div class="col-sm-12">
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

@include('biodatas.fields')
@include('user_details.account')
{{--<!-- User Id Field -->--}}
{{--<div class="form-group col-sm-6 {{ $errors->has('user_id') ? 'has-error' : ''}}">--}}
{{--{!! Form::label('user_id', 'User Id:',['class' => 'col-sm-12 control-label']) !!}--}}

{{--<div class="col-sm-12">--}}
{{--{!! Form::number('user_id', null, ['class' => 'form-control']) !!}--}}

{{--{!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}
{{--</div>--}}


<br/>
<br/>
<br/>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('agents.index') }}" class="btn btn-danger">Cancel</a>
</div>
