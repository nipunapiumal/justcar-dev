{{ Form::model($advertisement, ['route' => ['advertisements.update', $advertisement->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="device" class="col-form-label">{{ __('Device') }}</label>
            <select name="device" class="form-control" id="device" required>
                <option value="1" {{ $advertisement->device == 1 ? 'selected' : '' }}>
                    {{ __('Desktop') }}</option>
                <option value="2" {{ $advertisement->device == 2 ? 'selected' : '' }}>
                    {{ __('Mobile') }}</option>
            </select>
            @error('device')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="advertisement_type" class="col-form-label">{{ __('Advertisement Type') }}</label>
            <select name="advertisement_type" class="form-control" id="advertisement_type" required>
                <option value="">{{ __('Advertisement Type') }}</option>
                <option value="1" {{ $advertisement->advertisement_type == 1 ? 'selected' : '' }}>
                    {{ __('Banner Image') }}</option>
                <option value="2" {{ $advertisement->advertisement_type == 2 ? 'selected' : '' }}>
                    {{ __('Google Ad code') }}</option>
                <option value="3" {{ $advertisement->advertisement_type == 3 ? 'selected' : '' }}>
                    {{ __('Interstitial Ad') }}</option>
            </select>
            @error('advertisement_type')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div id="info-standard" style="{{ $advertisement->advertisement_type == 1 ? '' : 'display:none' }}">
            <div class="form-group">
                <label for="info" class="col-form-label">{{ __('Banner Image') }}</label>
                <input type="file" name="info" id="info" class="form-control custom-input-file">
                @error('info')
                    <span class="invalid-name" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('url', __('Url'), ['class' => 'col-form-label']) }}
                {{ Form::text('url', null, ['class' => 'form-control']) }}
                @error('url')
                    <span class="invalid-name" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group" id="info-google"
            style="{{ $advertisement->advertisement_type == 2 ? '' : 'display:none' }}">
            {{ Form::label('info', __('Google Ad code'), ['class' => 'col-form-label']) }}
            {{ Form::textarea('info', $advertisement->advertisement_type == 2 ? $advertisement->info : '', ['class' => 'form-control', 'rows' => '4']) }}
            @error('info')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div id="info-interstitial" style="{{ $advertisement->advertisement_type == 3 ? '' : 'display:none' }}">
            <div class="form-group">
                {{ Form::label('url', __('Url'), ['class' => 'col-form-label']) }}
                {{ Form::text('url', $advertisement->advertisement_type == 3 ? $advertisement->info : '', ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
</div>
{{ Form::close() }}
