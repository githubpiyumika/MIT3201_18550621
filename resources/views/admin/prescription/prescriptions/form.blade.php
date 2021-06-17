 <div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-{{ $formMode === 'edit' ? 'edit' : 'file' }}"></i>{{ $title }}</h2>
    </div>
    
        <div class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
    <label for="patient_id" class="control-label {{ $errors->has('patient_id') ? 'text-danger' : ''}}">{{ 'Patient Id' }}</label>
    <input class="form-control" name="patient_id" type="number" id="patient_id" value="{{ isset($prescription->patient_id) ? $prescription->patient_id : old('patient_id') }}" required>
    {!! $errors->first('patient_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
    <label for="doctor_id" class="control-label {{ $errors->has('doctor_id') ? 'text-danger' : ''}}">{{ 'Doctor Id' }}</label>
    <input class="form-control" name="doctor_id" type="number" id="doctor_id" value="{{ isset($prescription->doctor_id) ? $prescription->doctor_id : old('doctor_id') }}" required>
    {!! $errors->first('doctor_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pharmacy_id') ? 'has-error' : ''}}">
    <label for="pharmacy_id" class="control-label {{ $errors->has('pharmacy_id') ? 'text-danger' : ''}}">{{ 'Pharmacy Id' }}</label>
    <input class="form-control" name="pharmacy_id" type="number" id="pharmacy_id" value="{{ isset($prescription->pharmacy_id) ? $prescription->pharmacy_id : old('pharmacy_id') }}" >
    {!! $errors->first('pharmacy_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label {{ $errors->has('description') ? 'text-danger' : ''}}">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($prescription->description) ? $prescription->description : old('description')}}</textarea>
    {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label {{ $errors->has('status') ? 'text-danger' : ''}}">{{ 'Status' }}</label>
    <select name="status" class="form-control" id="status" >
    @foreach (json_decode('{"pending":"Pending","checked":"Checked","packing":"Packing Medicine","dispatched":"Parcel Dispatched","delivered":"Delivered"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($prescription->status) && $prescription->status == $optionKey) || (old('status') == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
</div>

   
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
