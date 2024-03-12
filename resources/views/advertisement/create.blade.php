{{ Form::open(['url' => 'advertisements', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="device" class="col-form-label">{{ __('Device') }}</label>
            <select name="device" class="form-control" id="device" required>
                <option value="1">{{ __('Desktop') }}</option>
                <option value="2"> {{ __('Mobile') }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="advertisement_type" class="col-form-label">{{ __('Advertisement Type') }}</label>
            <select name="advertisement_type" class="form-control" id="advertisement_type" required>
                <option value="">{{ __('Advertisement Type') }}</option>
                <option value="1">{{ __('Banner Image') }}</option>
                <option value="2"> {{ __('Google Ad code') }}</option>
                <option value="3"> {{ __('Interstitial Ad') }}</option>
            </select>
        </div>


        <div id="info-standard" style="display: none">
            <div class="form-group">
                <label for="info" class="col-form-label">{{ __('Banner Image') }}</label>
                <input type="file" name="info" id="info" class="form-control custom-input-file">
            </div>
            <div class="form-group">
                <label for="url" class="col-form-label">{{ __('Url') }}</label>
                <input type="text" name="url" id="url" class="form-control custom-input-file">
            </div>
        </div>



        <div class="form-group" id="info-google" style="display: none">
            {{ Form::label('info', __('Google Ad code'), ['class' => 'col-form-label']) }}
            {{ Form::textarea('info', null, ['class' => 'form-control', 'rows' => '4']) }}
        </div>


        <div id="info-interstitial" style="display: none">
            <div class="form-group">
                {{ Form::label('url', __('Url'), ['class' => 'col-form-label']) }}
                {{ Form::text('url', null, ['class' => 'form-control']) }}
            </div>
        </div>

    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary ms-2">
    </div>
</div>
{{ Form::close() }}
