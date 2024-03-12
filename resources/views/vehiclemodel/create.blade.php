{{ Form::open(['url' => 'vehicle_model', 'method' => 'post']) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <select name="brand" class="form-control" id="brand" required>
                <option value="">{{__('Please Select')}}</option>
                @foreach ($vehicleBrands as $vehicleBrand)
                <option value="{{$vehicleBrand->id}}">
                    {{ $vehicleBrand->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('name', __('Model Name'),['class' => 'col-form-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control','placeholder' => __('Enter Model Name'),'required' => 'required']) }}
        </div>
    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary ms-2">
    </div>
</div>
{{ Form::close() }}