<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-{{ $formMode === 'edit' ? 'edit' : 'file' }}"></i>{{ $title }}</h2>
    </div>


    <a class="btn btn-warning btn-sm" href="{{ url('doctor/inquiries') }}" title="Back">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
    </a>
    <a class="btn btn-primary btn-sm" href="{{ url('/doctor/patients/' . $prescription->patient_id) }}" target="_blank"
        title="Patient History">
        <i class="fa fa-eye" aria-hidden="true"></i> Patient History
    </a>

    <br>
    <div class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
        <input class="form-control" name="patient_id" type="hidden" id="patient_id"
            value="{{ isset($prescription->patient_id) ? $prescription->patient_id : old('patient_id') }}" required>
        {!! $errors->first('patient_id', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
        <input class="form-control" name="doctor_id" type="hidden" id="doctor_id"
            value="{{ isset($prescription->doctor_id) ? $prescription->doctor_id : old('doctor_id') }}" required>
        {!! $errors->first('doctor_id', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group">
        <label for="description" class="control-label">Patient
            Note</label>
        <textarea readonly class="form-control" rows="5" name="description" type="textarea"
            id="description">{{ $prescription->patient_note }}</textarea>
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        <label for="description"
            class="control-label {{ $errors->has('description') ? 'text-danger' : ''}}">Prescription</label>
        <textarea class="form-control" rows="5" name="description" type="textarea"
            id="description">{{ isset($prescription->description) ? $prescription->description : old('description')}}</textarea>
        {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('pharmacy_id') ? 'has-error' : ''}}">
        <label for="pharmacy_id"
            class="control-label {{ $errors->has('pharmacy_id') ? 'text-danger' : ''}}">{{ 'Pharmacy Id' }}</label>
        <select name="pharmacy_id" class="form-control" id="pharmacy_id">
            @foreach ($pharmacies as $pharmacy)
            <option value="{{ $pharmacy->id }}"
                {{ (isset($prescription->pharmacy_id) && $prescription->pharmacy_id == $pharmacy->id) || (old('pharmacy_id') == $pharmacy->id) ? 'selected' : ''}}>
                {{ $pharmacy->pharmacy_name }}</option>
            @endforeach
        </select>
        {!! $errors->first('pharmacy_id', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <input type="hidden" value="checked" name="status" id="status">
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Submit' : 'Create' }}">
</div>