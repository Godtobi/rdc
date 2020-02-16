<!-- Tally Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('tally_number') ? 'has-error' : ''}}">
    {!! Form::label('tally_number', 'Tally Number:',['class' => 'col-sm-12 control-label']) !!}

    <div class="col-sm-12">
        {!! Form::number('tally_number', @$data->biodata->tally_number, ['class' => 'form-control']) !!}
        {!! $errors->first('tally_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Email Field -->
<div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email:',['class' => 'col-sm-12 control-label']) !!}

    <div class="col-sm-12">
        {!! Form::email('email', @$data->biodata->email, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Account Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('account_number') ? 'has-error' : ''}}">
    {!! Form::label('account_number', 'Account Number:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('account_number', @$data->biodata->account_number, ['class' => 'form-control']) !!}
        {!! $errors->first('account_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Medical Condition Field -->
<div class="form-group col-sm-6 {{ $errors->has('medical_condition') ? 'has-error' : ''}}">
    {!! Form::label('medical_condition', 'Medical Condition:',['class' => 'col-sm-12 control-label']) !!}

    <div class="col-sm-12">
        {!! Form::textarea('medical_condition', @$data->biodata->medical_condition, ['class' => 'form-control']) !!}
        {!! $errors->first('medical_condition', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<!-- Guarantor Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('guarantor_name') ? 'has-error' : ''}}">
    {!! Form::label('guarantor_name', 'Guarantor Name:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('guarantor_name', @$data->biodata->guarantor_name, ['class' => 'form-control']) !!}
        {!! $errors->first('guarantor_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Contact Field -->
<div class="form-group col-sm-6 {{ $errors->has('contact') ? 'has-error' : ''}}">
    {!! Form::label('contact', 'Contact:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('contact', @$data->biodata->contact, ['class' => 'form-control']) !!}
        {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Guarantor Address Field -->
<div class="form-group col-sm-6 {{ $errors->has('guarantor_address') ? 'has-error' : ''}}">
    {!! Form::label('guarantor_address', 'Guarantor Address:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('guarantor_address', @$data->biodata->guarantor_address, ['class' => 'form-control']) !!}
        {!! $errors->first('guarantor_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Emergency Contact Name 1 Field -->
<div class="form-group col-sm-6 {{ $errors->has('emergency_contact_name_1') ? 'has-error' : ''}}">
    {!! Form::label('emergency_contact_name_1', 'Emergency Contact Name 1:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('emergency_contact_name_1', @$data->biodata->emergency_contact_name_1, ['class' => 'form-control']) !!}
        {!! $errors->first('emergency_contact_name_1', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Phone No 1 Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone_no_1') ? 'has-error' : ''}}">
    {!! Form::label('phone_no_1', 'Phone No 1:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('phone_no_1', @$data->biodata->phone_no_1, ['class' => 'form-control']) !!}
        {!! $errors->first('phone_no_1', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Emergency Contact Name 2 Field -->
<div class="form-group col-sm-6 {{ $errors->has('emergency_contact_name_2') ? 'has-error' : ''}}">
    {!! Form::label('emergency_contact_name_2', 'Emergency Contact Name 2:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('emergency_contact_name_2', @$data->biodata->emergency_contact_name_2, ['class' => 'form-control']) !!}
        {!! $errors->first('emergency_contact_name_2', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Phone No 2 Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone_no_2') ? 'has-error' : ''}}">
    {!! Form::label('phone_no_2', 'Phone No 2:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('phone_no_2', @$data->biodata->phone_no_2, ['class' => 'form-control']) !!}
        {!! $errors->first('phone_no_2', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Next Of Kin Field -->
<div class="form-group col-sm-6 {{ $errors->has('next_of_kin') ? 'has-error' : ''}}">
    {!! Form::label('next_of_kin', 'Next Of Kin:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('next_of_kin', @$data->biodata->next_of_kin, ['class' => 'form-control']) !!}
        {!! $errors->first('next_of_kin', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Next Of Kin Address Field -->
<div class="form-group col-sm-6 {{ $errors->has('next_of_kin_address') ? 'has-error' : ''}}">
    {!! Form::label('next_of_kin_address', 'Next Of Kin Address:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('next_of_kin_address',  @$data->biodata->next_of_kin_address, ['class' => 'form-control']) !!}
        {!! $errors->first('next_of_kin_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Next Of Kin Phone Field -->
<div class="form-group col-sm-6 {{ $errors->has('next_of_kin_phone') ? 'has-error' : ''}}">
    {!! Form::label('next_of_kin_phone', 'Next Of Kin Phone:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('next_of_kin_phone', @$data->biodata->next_of_kin_phone, ['class' => 'form-control']) !!}
        {!! $errors->first('next_of_kin_phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Pfa Field -->
<div class="form-group col-sm-6 {{ $errors->has('pfa') ? 'has-error' : ''}}">
    {!! Form::label('pfa', 'Pfa:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('pfa', @$data->biodata->pfa, ['class' => 'form-control']) !!}
        {!! $errors->first('pfa', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Rsa Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('rsa_number') ? 'has-error' : ''}}">
    {!! Form::label('rsa_number', 'Rsa Number:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('rsa_number',  @$data->biodata->rsa_number, ['class' => 'form-control']) !!}
        {!! $errors->first('rsa_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Job Title Field -->
<div class="form-group col-sm-6 {{ $errors->has('job_title') ? 'has-error' : ''}}">
    {!! Form::label('job_title', 'Job Title:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('job_title', @$data->biodata->job_title, ['class' => 'form-control']) !!}
        {!! $errors->first('job_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Driver Lic Issuance Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('driver_lic_issuance_date') ? 'has-error' : ''}}">
    {!! Form::label('driver_lic_issuance_date', 'Driver Lic Issuance Date:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::date('driver_lic_issuance_date', @$data->biodata->driver_lic_issuance_date, ['class' => 'form-control']) !!}
        {!! $errors->first('driver_lic_issuance_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Driver Lic Expiry Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('driver_lic_expiry_date') ? 'has-error' : ''}}">
    {!! Form::label('driver_lic_expiry_date', 'Driver Lic Expiry Date:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::date('driver_lic_expiry_date', @$data->biodata->driver_lic_expiry_date, ['class' => 'form-control']) !!}
        {!! $errors->first('driver_lic_expiry_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Driver Lic Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('driver_lic_date') ? 'has-error' : ''}}">
    {!! Form::label('driver_lic_date', 'Driver Lic Date:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::date('driver_lic_date',  @$data->biodata->driver_lic_date, ['class' => 'form-control']) !!}
        {!! $errors->first('driver_lic_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Dob Field -->
<div class="form-group col-sm-6 {{ $errors->has('dob') ? 'has-error' : ''}}">
    {!! Form::label('dob', 'Dob:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::date('dob',  @$data->biodata->dob, ['class' => 'form-control']) !!}
        {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Sex Field -->
<div class="form-group col-sm-6 {{ $errors->has('sex') ? 'has-error' : ''}}">
    {!! Form::label('sex', 'Sex:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {{--{!! Form::text('sex', null, ['class' => 'form-control']) !!}--}}
        <select class="form-control" name="sex" id="sex" required>
            <option value="">Pick a Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Bank Field -->
<div class="form-group col-sm-6 {{ $errors->has('bank') ? 'has-error' : ''}}">
    {!! Form::label('bank', 'Bank:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('bank', @$data->biodata->bank, ['class' => 'form-control']) !!}
        {!! $errors->first('bank', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Spouse Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('spouse_name') ? 'has-error' : ''}}">
    {!! Form::label('spouse_name', 'Spouse Name:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('spouse_name', @$data->biodata->spouse_name, ['class' => 'form-control']) !!}
        {!! $errors->first('spouse_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Spouse Address Field -->
<div class="form-group col-sm-6 {{ $errors->has('spouse_address') ? 'has-error' : ''}}">
    {!! Form::label('spouse_address', 'Spouse Address:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('spouse_address',  @$data->biodata->spouse_address, ['class' => 'form-control']) !!}
        {!! $errors->first('spouse_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Spouse Phone Field -->
<div class="form-group col-sm-6 {{ $errors->has('spouse_phone') ? 'has-error' : ''}}">
    {!! Form::label('spouse_phone', 'Spouse Phone:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('spouse_phone', @$data->biodata->spouse_phone, ['class' => 'form-control']) !!}
        {!! $errors->first('spouse_phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Employment Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('employment_date') ? 'has-error' : ''}}">
    {!! Form::label('employment_date', 'Employment Date:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::date('employment_date', @$data->biodata->employment_date, ['class' => 'form-control']) !!}
        {!! $errors->first('employment_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group col-sm-6 {{ $errors->has('lga_id') ? 'has-error' : ''}}">
    {!! Form::label('lga_id', 'Lga', ['class' => 'col-sm-8 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::select('lga_id', $lga, @$data->biodata->lga_id, ['class' => 'form-control select2', 'required','placeholder' => 'Pick a Local Govt...']) !!}
        {!! $errors->first('lga_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<!-- Bank Code Field -->
<div class="form-group col-sm-6 {{ $errors->has('bank_code') ? 'has-error' : ''}}">
    {!! Form::label('bank_code', 'Bank Code:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('bank_code', @$data->biodata->bank_code, ['class' => 'form-control']) !!}
        {!! $errors->first('bank_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Bank Pfa Code Field -->
<div class="form-group col-sm-6 {{ $errors->has('bank_pfa_code') ? 'has-error' : ''}}">
    {!! Form::label('bank_pfa_code', 'Bank Pfa Code:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('bank_pfa_code', @$data->biodata->bank_pfa_code, ['class' => 'form-control']) !!}
        {!! $errors->first('bank_pfa_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Driver License Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('driver_license_number') ? 'has-error' : ''}}">
    {!! Form::label('driver_license_number', 'Driver License Number:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('driver_license_number', @$data->biodata->driver_license_number, ['class' => 'form-control']) !!}
        {!! $errors->first('driver_license_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Pre Employment Test Result Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('pre_employment_test_result_date') ? 'has-error' : ''}}">
    {!! Form::label('pre_employment_test_result_date', 'Pre Employment Test Result Date:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::date('pre_employment_test_result_date', @$data->biodata->pre_employment_test_result_date, ['class' => 'form-control']) !!}
        {!! $errors->first('pre_employment_test_result_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Pre Employment Test Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('pre_employment_test_date') ? 'has-error' : ''}}">
    {!! Form::label('pre_employment_test_date', 'Pre Employment Test Date:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::date('pre_employment_test_date', @$data->biodata->pre_employment_test_date, ['class' => 'form-control']) !!}
        {!! $errors->first('pre_employment_test_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<!-- Salary Field -->
<div class="form-group col-sm-6 {{ $errors->has('salary') ? 'has-error' : ''}}">
    {!! Form::label('salary', 'Salary:',['class' => 'col-sm-12 control-label']) !!}
    <div class="col-sm-12">
        {!! Form::text('salary', @$data->biodata->salary, ['class' => 'form-control']) !!}
        {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
    </div>
</div>


{{--<br/>--}}
{{--<br/>--}}
{{--<br/>--}}
{{--<!-- Submit Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}--}}
{{--<a href="{{ route('biodatas.index') }}" class="btn btn-danger">Cancel</a>--}}
{{--</div>--}}
