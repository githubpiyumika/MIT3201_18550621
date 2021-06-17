 <div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-{{ $formMode === 'edit' ? 'edit' : 'file' }}"></i>{{ $title }}</h2>
    </div>
    
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label {{ $errors->has('name') ? 'text-danger' : ''}}">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($doctorspecialization->name) ? $doctorspecialization->name : old('name') }}" required>
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label {{ $errors->has('description') ? 'text-danger' : ''}}">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ isset($doctorspecialization->description) ? $doctorspecialization->description : old('description')}}</textarea>
    {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
</div>

   
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
