<ul class="nav nav-tabs" id="myTab" role="tablist">
    @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp

    @foreach ($store_languages as $lang)
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                id="{{ $lang }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $lang }}" type="button"
                role="tab" aria-controls="home" aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
        </li>
        {{-- <a href="{{ route('change.language', $lang) }}"
            class="dropdown-item {{ basename(App::getLocale()) == $lang ? 'text-primary' : '' }}">{{ Str::upper($lang) }}</a> --}}
    @endforeach
    {{-- <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
            role="tab" aria-controls="profile" aria-selected="false">Profile</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
            role="tab" aria-controls="contact" aria-selected="false">Contact</button>
    </li> --}}
</ul>
{{ Form::model($pageOption, ['route' => ['custom-page.update', $pageOption->id], 'method' => 'PUT']) }}
<div class="row mt-4">
    <div class="form-group col-md-6">
        <div class="custom-control form-switch">
            <input type="checkbox" class="form-check-input" name="enable_page_header"
                id="enable_page_header"
                {{ $pageOption['enable_page_header'] == 'on' ? 'checked=checked' : '' }}>
            {{ Form::label('enable_page_header', __('Live'), ['class' => 'form-check-label mb-3']) }}
        </div>
    </div>
</div>
<div class="tab-content" id="myTabContent">

    @foreach ($store_languages as $lang)
        <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
            id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}-tab">

            @php
                $data = App\Models\PageOptionLangs::where('parent_id', $pageOption->id)->where('lang', $lang)->first();
            @endphp
            
           
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        {{ Form::label('' . $lang . '_name', __('Name'), ['class' => 'form-label']) }}
                        {{ Form::text('' . $lang . '_name', (isset($data["name"])?$data["name"]:''), ['class' => 'form-control', 'placeholder' => __('Enter Name')]) }}
                        @error('name')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
               
                <h5>{{ __('Page Meta Tags') }}</h5>
                <hr>
                <div class="col-12">
                    <div class="form-group">
                        {{ Form::label('' . $lang . '_meta_title', __('Meta Title'), ['class' => 'form-label']) }}
                        {{ Form::text('' . $lang . '_meta_title', (isset($data["meta_title"])?$data["meta_title"]:''), ['class' => 'form-control', 'placeholder' => __('Meta Title')]) }}
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        {{ Form::label('' . $lang . '_meta_description', __('Meta Description'), ['class' => 'form-label']) }}
                        {{ Form::text('' . $lang . '_meta_description', (isset($data["meta_description"])?$data["meta_description"]:''), ['class' => 'form-control', 'placeholder' => __('Meta Description')]) }}
                    </div>
                </div>
                <div class="form-group col-md-12">
                    {{ Form::label('' . $lang . '_contents', __('Contents'), ['class' => 'col-form-label']) }}
                    {{ Form::textarea('' . $lang . '_contents', (isset($data["contents"])?$data["contents"]:''), ['class' => 'form-control summernote-simple', 'rows' => 3, 'placeholder' => __('Contents')]) }}
                    @error('contents')
                        <span class="invalid-contents" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            
        </div>
    @endforeach
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light"
        data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
</div>
{{ Form::close() }}
