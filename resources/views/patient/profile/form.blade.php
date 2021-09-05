<h6>General Details</h6>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name" class="control-label">{{ 'First Name' }}</label>
            <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" name="first_name"
                type="text" id="first_name"
                value="{{ isset($patient->first_name) ? $patient->first_name : old('first_name')}}">
            {!! $errors->first('first_name', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
            <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" name="last_name" type="text"
                id="last_name" value="{{ isset($patient->last_name) ? $patient->last_name : old('last_name')}}">
            {!! $errors->first('last_name', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" rows="5" name="address"
        type="textarea" id="address">{{ isset($patient->address) ? $patient->address : old('address')}}</textarea>
    {!! $errors->first('address', '<p class="text-danger">:message</p>') !!}
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nic" class="control-label">{{ 'Nic' }}</label>
            <input class="form-control {{ $errors->has('nic') ? 'is-invalid' : ''}}" name="nic" type="text" id="nic"
                value="{{ isset($patient->nic) ? $patient->nic : old('nic')}}">
            {!! $errors->first('nic', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date_of_birth" class="control-label">{{ 'Date Of Birth' }}</label>
            <input class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : ''}}" name="date_of_birth"
                type="date" id="date_of_birth"
                value="{{ isset($patient->date_of_birth) ? $patient->date_of_birth : old('date_of_birth')}}">
            {!! $errors->first('date_of_birth', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="contact_number" class="control-label">{{ 'Contact Number' }}</label>
            <input class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : ''}}" name="contact_number"
                type="text" id="contact_number"
                value="{{ isset($patient->contact_number) ? $patient->contact_number : old('contact_number')}}">
            {!! $errors->first('contact_number', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email" class="control-label">{{ 'Email' }}</label>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" name="email" type="text"
                id="email" value="{{ isset($patient->email) ? $patient->email : old('email')}}">
            {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="weight" class="control-label">{{ 'Weight' }}</label>

            <div class="input-group mb-2"> <input class="form-control  {{ $errors->has('weight') ? 'is-invalid' : ''}}"
                    name="weight" id="weight" value="{{ isset($patient->weight) ? $patient->weight : old('weight')}}">
                <div class="input-group-append">
                    <div class="input-group-text">kg</div>
                </div>
            </div>
            {!! $errors->first('weight', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="height" class="control-label">{{ 'Height' }}</label>
            <div class="input-group mb-2">
                <input class="form-control {{ $errors->has('height') ? 'is-invalid' : ''}}" name="height" id="height"
                    value="{{ isset($patient->height) ? $patient->height : old('height')}}">
                <div class="input-group-append">
                    <div class="input-group-text">cm</div>
                </div>
            </div>
            {!! $errors->first('height', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
</div>

<br>
<h6>Emergency Contact Details</h6>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="emergency_contact_name" class="control-label">{{ 'Emergency Contact Name' }}</label>
            <input class="form-control {{ $errors->has('emergency_contact_name') ? 'is-invalid' : ''}}"
                name="emergency_contact_name" type="text" id="emergency_contact_name"
                value="{{ isset($patient->emergency_contact_name) ? $patient->emergency_contact_name : old('emergency_contact_name')}}">
            {!! $errors->first('emergency_contact_name', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="emergency_contact_no" class="control-label">{{ 'Emergency Contact No' }}</label>
            <input class="form-control {{ $errors->has('emergency_contact_no') ? 'is-invalid' : ''}}"
                name="emergency_contact_no" type="text" id="emergency_contact_no"
                value="{{ isset($patient->emergency_contact_no) ? $patient->emergency_contact_no : old('emergency_contact_no')}}">
            {!! $errors->first('emergency_contact_no', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="emergency_address" class="control-label">{{ 'Emergency Address' }}</label>
    <textarea class="form-control {{ $errors->has('emergency_address') ? 'is-invalid' : ''}}" rows="5"
        name="emergency_address" type="textarea"
        id="emergency_address">{{ isset($patient->emergency_address) ? $patient->emergency_address : old('emergency_address')}}</textarea>
    {!! $errors->first('emergency_address', '<p class="text-danger">:message</p>') !!}
</div>

<br>
<h6>General Medical History</h6>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="chicken_pox" class="control-label">{{ 'Chicken Pox' }}</label>
            <div class="radio">
                <label><input name="chicken_pox" type="radio" value="1"
                        {{ (isset($patient) && 1 == $patient->chicken_pox) ? 'checked' : '' }}>
                    Yes</label>
            </div>
            <div class="radio">
                <label><input name="chicken_pox" type="radio" value="0" @if (isset($patient))
                        {{ (0 == $patient->chicken_pox) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
            </div>
            {!! $errors->first('chicken_pox', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('measles') ? 'is-invalid' : ''}}">
            <label for="measles" class="control-label">{{ 'Measles' }}</label>
            <div class="radio">
                <label><input name="measles" type="radio" value="1"
                        {{ (isset($patient) && 1 == $patient->measles) ? 'checked' : '' }}> Yes</label>
            </div>
            <div class="radio">
                <label><input name="measles" type="radio" value="0" @if (isset($patient))
                        {{ (0 == $patient->measles) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
            </div>
            {!! $errors->first('measles', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('hepatitis_b') ? 'is-invalid' : ''}}">
            <label for="hepatitis_b" class="control-label">{{ 'Hepatitis B' }}</label>
            <div class="radio">
                <label><input name="hepatitis_b" type="radio" value="1"
                        {{ (isset($patient) && 1 == $patient->hepatitis_b) ? 'checked' : '' }}> Yes</label>
            </div>
            <div class="radio">
                <label><input name="hepatitis_b" type="radio" value="0" @if (isset($patient))
                        {{ (0 == $patient->hepatitis_b) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
            </div>
            {!! $errors->first('hepatitis_b', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="medical_problems" class="control-label">{{ 'Medical Problems' }}</label>
    <textarea class="form-control {{ $errors->has('medical_problems') ? 'is-invalid' : ''}}" rows="5"
        name="medical_problems" type="textarea"
        id="medical_problems">{{ isset($patient->medical_problems) ? $patient->medical_problems : old('medical_problems')}}</textarea>
    {!! $errors->first('medical_problems', '<p class="text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="allergies" class="control-label">{{ 'Allergies' }}</label>
    <textarea class="form-control {{ $errors->has('allergies') ? 'is-invalid' : ''}}" rows="5" name="allergies"
        type="textarea"
        id="allergies">{{ isset($patient->allergies) ? $patient->allergies : old('allergies')}}</textarea>
    {!! $errors->first('allergies', '<p class="text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="regular_medications" class="control-label">{{ 'Regular Medications' }}</label>
    <textarea class="form-control {{ $errors->has('regular_medications') ? 'is-invalid' : ''}}" rows="5"
        name="regular_medications" type="textarea"
        id="regular_medications">{{ isset($patient->regular_medications) ? $patient->regular_medications : old('regular_medications')}}</textarea>
    {!! $errors->first('regular_medications', '<p class="text-danger">:message</p>') !!}
</div>


<br>
<h6>Insurance Details</h6>
<hr>
<div class="form-group {{ $errors->has('has_insurance') ? 'is-invalid' : ''}}">
    <label for="has_insurance" class="control-label">{{ 'Has Insurance' }}</label>
    <div class="radio">
        <label><input name="has_insurance" type="radio" value="1"
                onclick="document.getElementById('ins-details').style.display='block'"
                {{ (isset($patient) && 1 == $patient->has_insurance) ? 'checked' : '' }}> Yes</label>
    </div>
    <div class=" radio">
        <label><input name="has_insurance" type="radio" value="0"
                onclick="document.getElementById('ins-details').style.display='none'" @if (isset($patient))
                {{ (0 == $patient->has_insurance) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
    </div>
    {!! $errors->first('has_insurance', '<p class="text-danger">:message</p>') !!}
</div>
<div id="ins-details" style="display: {{isset($patient) && $patient->has_insurance?'block':'none'}}">
    <div class="form-group">
        <label for="insuared_company" class="control-label">{{ 'Insuared Company' }}</label>
        <input class="form-control {{ $errors->has('insuared_company') ? 'is-invalid' : ''}}" name="insuared_company"
            type="text" id="insuared_company"
            value="{{ isset($patient->insuared_company) ? $patient->insuared_company : old('insuared_company')}}">
        {!! $errors->first('insuared_company', '<p class="text-danger">:message</p>') !!}
    </div>
    <div class="form-group">
        <label for="insuared_company_address" class="control-label">{{ 'Insuared Company Address' }}</label>
        <textarea class="form-control {{ $errors->has('insuared_company_address') ? 'is-invalid' : ''}}" rows="5"
            name="insuared_company_address" type="textarea"
            id="insuared_company_address">{{ isset($patient->insuared_company_address) ? $patient->insuared_company_address : old('insuared_company_address')}}</textarea>
        {!! $errors->first('insuared_company_address', '<p class="text-danger">:message</p>') !!}
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="policy_number" class="control-label">{{ 'Policy Number' }}</label>
                <input class="form-control {{ $errors->has('policy_number') ? 'is-invalid' : ''}}" name="policy_number"
                    type="text" id="policy_number"
                    value="{{ isset($patient->policy_number) ? $patient->policy_number : old('policy_number')}}">
                {!! $errors->first('policy_number', '<p class="text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="expiary_date" class="control-label">{{ 'Expiary Date' }}</label>
                <input class="form-control {{ $errors->has('expiary_date') ? 'is-invalid' : ''}}" name="expiary_date"
                    type="date" id="expiary_date"
                    value="{{ isset($patient->expiary_date) ? $patient->expiary_date : old('expiary_date')}}">
                {!! $errors->first('expiary_date', '<p class="text-danger">:message</p>') !!}
            </div>
        </div>
    </div>
</div>




<input name="user_id" type="hidden" value="{{Auth::user()->id}}">

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Save' }}">
</div>