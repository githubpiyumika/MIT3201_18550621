<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Pharmacy details</h2>
    </div>
    <div class="form-group {{ $errors->has('pharmacy_name') ? 'has-error' : ''}}">
        <label for="pharmacy_name" class="control-label">{{ 'Name' }}</label>
        <input class="form-control" name="pharmacy_name" type="text" id="pharmacy_name"
            value="{{ isset($pharmacy->pharmacy_name) ? $pharmacy->pharmacy_name :  old('pharmacy_name') }}">
        {!! $errors->first('pharmacy_name', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('pharmacy_address') ? 'has-error' : ''}}">
        <label for="pharmacy_address" class="control-label">{{ 'Address' }}</label>
        <textarea class="form-control" rows="5" name="pharmacy_address" type="textarea"
            id="pharmacy_address">{{ isset($pharmacy->pharmacy_address) ? $pharmacy->pharmacy_address :  old('pharmacy_address') }}</textarea>
        {!! $errors->first('pharmacy_address', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('pharmacy_phone') ? 'has-error' : ''}}">
                <label for="pharmacy_phone" class="control-label">{{ 'Phone' }}</label>
                <input class="form-control" name="pharmacy_phone" type="text" id="pharmacy_phone"
                    value="{{ isset($pharmacy->pharmacy_phone) ? $pharmacy->pharmacy_phone :  old('pharmacy_phone') }}">
                {!! $errors->first('pharmacy_phone', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('fax_number') ? 'has-error' : ''}}">
                <label for="fax_number" class="control-label">{{ 'Fax Number' }}</label>
                <input class="form-control" name="fax_number" type="text" id="fax_number"
                    value="{{ isset($pharmacy->fax_number) ? $pharmacy->fax_number : old('fax_number')}}">
                {!! $errors->first('fax_number', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
    </div>

</div>

<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Owner details</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <label for="first_name" class="control-label">{{ 'First Name' }}</label>
                <input class="form-control" name="first_name" type="text" id="first_name"
                    value="{{ isset($pharmacy->first_name) ? $pharmacy->first_name :  old('first_name') }}">
                {!! $errors->first('first_name', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
                <input class="form-control" name="last_name" type="text" id="last_name"
                    value="{{ isset($pharmacy->last_name) ? $pharmacy->last_name :  old('last_name') }}">
                {!! $errors->first('last_name', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
        <label for="registration_number" class="control-label">{{ 'Registration Number' }}</label>
        <input class="form-control" name="registration_number" type="text" id="registration_number"
            value="{{ isset($pharmacy->registration_number) ? $pharmacy->registration_number :  old('registration_number') }}">
        {!! $errors->first('registration_number', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('contact_number') ? 'has-error' : ''}}">
                <label for="contact_number" class="control-label">{{ 'Contact Number' }}</label>
                <input class="form-control" name="contact_number" type="text" id="contact_number"
                    value="{{ isset($pharmacy->contact_number) ? $pharmacy->contact_number :  old('contact_number') }}">
                {!! $errors->first('contact_number', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email" class="control-label">{{ 'Email' }}</label>
                <input class="form-control" name="email" type="text" id="email"
                    value="{{ isset($pharmacy->email) ? $pharmacy->email :  old('email') }}">
                {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
        <label for="address" class="control-label">{{ 'Address' }}</label>
        <textarea class="form-control" rows="5" name="address" type="textarea"
            id="address">{{ isset($pharmacy->address) ? $pharmacy->address :  old('address') }}</textarea>
        {!! $errors->first('address', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>