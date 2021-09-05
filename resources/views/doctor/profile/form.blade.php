<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Basic info</h2>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <label for="first_name"
                    class="control-label {{ $errors->has('first_name') ? 'text-danger' : ''}}">{{ 'First Name' }}</label>
                <input class="form-control" name="first_name" type="text" id="first_name"
                    value="{{ isset($doctor->first_name) ? $doctor->first_name : old('first_name') }}">
                {!! $errors->first('first_name', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                <label for="last_name"
                    class="control-label {{ $errors->has('last_name') ? 'text-danger' : ''}}">{{ 'Last Name' }}</label>
                <input class="form-control" name="last_name" type="text" id="last_name"
                    value="{{ isset($doctor->last_name) ? $doctor->last_name : old('last_name') }}">
                {!! $errors->first('last_name', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('specialization') ? 'has-error' : ''}}">
                <label for="specialization"
                    class="control-label {{ $errors->has('specialization') ? 'text-danger' : ''}}">{{ 'Specialization' }}</label>
                <select name="specialization" class="form-control" id="specialization">
                    @foreach ($doctorSpecializations as $doctorSpecialization)
                    <option value="{{ $doctorSpecialization->id }}"
                        {{ (isset($doctor->specialization) && $doctor->specialization == $doctorSpecialization->id) || (old('specialization') == $doctorSpecialization->id) ? 'selected' : ''}}>
                        {{ $doctorSpecialization->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('specialization', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                <label for="gender"
                    class="control-label {{ $errors->has('gender') ? 'text-danger' : ''}}">{{ 'Gender' }}</label>
                <select name="gender" class="form-control" id="gender">
                    @foreach (json_decode('{"male":"Male","female":"Female"}', true) as $optionKey => $optionValue)
                    <option value="{{ $optionKey }}"
                        {{ (isset($doctor->gender) && $doctor->gender == $optionKey) || (old('gender') == $optionKey) ? 'selected' : ''}}>
                        {{ $optionValue }}</option>
                    @endforeach
                </select>
                {!! $errors->first('gender', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : ''}}">
                <label for="date_of_birth"
                    class="control-label {{ $errors->has('date_of_birth') ? 'text-danger' : ''}}">{{ 'Date Of Birth' }}</label>
                <input class="form-control" name="date_of_birth" type="date" id="date_of_birth"
                    value="{{ isset($doctor->date_of_birth) ? $doctor->date_of_birth : old('date_of_birth') }}">
                {!! $errors->first('date_of_birth', '<p class="help-block text-danger">:message</p>') !!}
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('marital_status') ? 'has-error' : ''}}">
                <label for="marital_status"
                    class="control-label {{ $errors->has('marital_status') ? 'text-danger' : ''}}">{{ 'Marital Status' }}</label>
                <select name="marital_status" class="form-control" id="marital_status">
                    @foreach (json_decode('{"married":"Married","single":"Single"}', true) as $optionKey =>
                    $optionValue)
                    <option value="{{ $optionKey }}"
                        {{ (isset($doctor->marital_status) && $doctor->marital_status == $optionKey) || (old('marital_status') == $optionKey) ? 'selected' : ''}}>
                        {{ $optionValue }}</option>
                    @endforeach
                </select>
                {!! $errors->first('marital_status', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('nationality') ? 'has-error' : ''}}">
                <label for="nationality"
                    class="control-label {{ $errors->has('nationality') ? 'text-danger' : ''}}">{{ 'Nationality' }}</label>
                <input class="form-control" name="nationality" type="text" id="nationality"
                    value="{{ isset($doctor->nationality) ? $doctor->nationality : old('nationality') }}">
                {!! $errors->first('nationality', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                <label for="registration_number"
                    class="control-label {{ $errors->has('registration_number') ? 'text-danger' : ''}}">{{ 'Registration Number' }}</label>
                <input class="form-control" name="registration_number" type="text" id="registration_number"
                    value="{{ isset($doctor->registration_number) ? $doctor->registration_number : old('registration_number') }}">
                {!! $errors->first('registration_number', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">

        </div>
    </div>

</div>

<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-map-marker"></i>Contact info</h2>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('residential_address') ? 'has-error' : ''}}">
                <label for="residential_address"
                    class="control-label {{ $errors->has('residential_address') ? 'text-danger' : ''}}">{{ 'Residential Address' }}</label>
                <textarea class="form-control" rows="3" name="residential_address" type="textarea"
                    id="residential_address">{{ isset($doctor->residential_address) ? $doctor->residential_address : old('residential_address')}}</textarea>
                {!! $errors->first('residential_address', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('institute_address') ? 'has-error' : ''}}">
                <label for="institute_address"
                    class="control-label {{ $errors->has('institute_address') ? 'text-danger' : ''}}">{{ 'Institute Address' }}</label>
                <textarea class="form-control" rows="3" name="institute_address" type="textarea"
                    id="institute_address">{{ isset($doctor->institute_address) ? $doctor->institute_address : old('institute_address')}}</textarea>
                {!! $errors->first('institute_address', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                <label for="mobile"
                    class="control-label {{ $errors->has('mobile') ? 'text-danger' : ''}}">{{ 'Mobile' }}</label>
                <input class="form-control" name="mobile" type="text" id="mobile"
                    value="{{ isset($doctor->mobile) ? $doctor->mobile : old('mobile') }}">
                {!! $errors->first('mobile', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email"
                    class="control-label {{ $errors->has('email') ? 'text-danger' : ''}}">{{ 'Email' }}</label>
                <input class="form-control" name="email" type="text" id="email"
                    value="{{ isset($doctor->email) ? $doctor->email : old('email') }}">
                {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
            </div>
        </div>

    </div>
</div>

<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-file-text"></i>Education & Experience</h2>
    </div>

    <div class="form-group {{ $errors->has('professional_statement') ? 'has-error' : ''}}">
        <label for="professional_statement"
            class="control-label {{ $errors->has('professional_statement') ? 'text-danger' : ''}}">{{ 'Professional Statement' }}</label>
        <textarea class="form-control" rows="5" name="professional_statement" type="textarea"
            placeholder="Write here your description.... "
            id="professional_statement">{{ isset($doctor->professional_statement) ? $doctor->professional_statement : old('professional_statement')}}</textarea>
        {!! $errors->first('professional_statement', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('sub_specializations') ? 'has-error' : ''}}">
        <label for="sub_specializations"
            class="control-label {{ $errors->has('sub_specializations') ? 'text-danger' : ''}}">{{ 'Other Specializations' }}</label>
        <input class="form-control" name="sub_specializations" type="text" id="sub_specializations"
            placeholder="Ex: Abdominal radiology, Breast imaging, Cardiothoracic radiology ..."
            value="{{ isset($doctor->sub_specializations) ? $doctor->sub_specializations : old('sub_specializations') }}">
        <small class="form-text text-muted">Enter other specializations seperated by a comma</small>
        {!! $errors->first('sub_specializations', '<p class="help-block text-danger">:message</p>') !!}
    </div>

    <div class="form-group {{ $errors->has('experience_after_graduation') ? 'has-error' : ''}}">
        <label for="experience_after_graduation"
            class="control-label {{ $errors->has('experience_after_graduation') ? 'text-danger' : ''}}">{{ 'Experience After Graduation' }}</label>
        <textarea class="form-control" rows="5" name="experience_after_graduation" type="textarea"
            id="experience_after_graduation">{{ isset($doctor->experience_after_graduation) ? $doctor->experience_after_graduation : old('experience_after_graduation')}}</textarea>
        <small class="form-text text-muted">Follow the format of
            [Place of work] - [Designation]</small>
        {!! $errors->first('experience_after_graduation', '<p class="help-block text-danger">:message</p>') !!}
    </div>

    <div class="form-group {{ $errors->has('education_qualiication') ? 'has-error' : ''}}">
        <label for="education_qualiication"
            class="control-label {{ $errors->has('education_qualiication') ? 'text-danger' : ''}}">{{ 'Education Statement' }}</label>
        <textarea class="form-control" rows="5" name="education_qualiication" type="textarea"
            id="education_qualiication">{{ isset($doctor->education_qualiication) ? $doctor->education_qualiication : old('education_qualiication')}}</textarea>
        {!! $errors->first('education_qualiication', '<p class="help-block text-danger">:message</p>') !!}
    </div>

    <div class="form-group {{ $errors->has('curriculum') ? 'has-error' : ''}}">
        <label for="curriculum"
            class="control-label {{ $errors->has('curriculum') ? 'text-danger' : ''}}">{{ 'Curriculum' }}</label>
        <textarea class="form-control" rows="5" name="curriculum" type="textarea"
            placeholder="Ex: New York Medical College - Doctor of Medicine"
            id="curriculum">{{ isset($doctor->curriculum) ? $doctor->curriculum : old('curriculum')}}</textarea>
        <small class="form-text text-muted">Follow the format of
            [Collage/University] - [Degree/Examination/Certification]</small>
        {!! $errors->first('curriculum', '<p class="help-block text-danger">:message</p>') !!}
    </div>

</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>