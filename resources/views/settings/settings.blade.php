@extends('layouts.admin')
@section('page-title')
    {{ __('Settings') }}
@endsection
@php
    
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Settings') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Settings') }}</h5>
    </div>
@endsection
@section('action-btn')
@endsection
@section('content')
    @if (Auth::user()->type == 'Owner')
        {{ Form::model($store_settings, ['route' => ['settings.store', $store_settings['id']], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h5>{{ __('Settings') }}</h5>
                    </div> --}}
                    <div class="card-body pt-0">
                        <div class=" setting-card">
                            <div class="row mt-2">
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('Store Logo') }}</h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="logo-content mt-3">
                                                    <img src="{{ $store_logo . '/' . (isset($store_settings['logo']) && !empty($store_settings['logo']) ? $store_settings['logo'] : 'logo.png') }}"
                                                        width="140px" class="invoice_logo">
                                                </div>
                                                <div class="choose-files mt-4">
                                                    <label for="logo">
                                                        <div class=" bg-primary logo_update"> <i
                                                                class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                        </div>
                                                        <input type="file" class="form-control file" name="logo"
                                                            id="logo" data-filename="logo_update">
                                                    </label>
                                                </div>
                                                @error('logo')
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('Store Logo Dark') }}</h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="logo-content mt-3">
                                                    <img src="{{ $store_logo . '/' . (isset($store_settings['logo_dark']) && !empty($store_settings['logo_dark']) ? $store_settings['logo_dark'] : 'logo.png') }}"
                                                        width="140px" class="invoice_logo">
                                                </div>
                                                <div class="choose-files mt-4">
                                                    <label for="logo_dark">
                                                        <div class=" bg-primary logo_update"> <i
                                                                class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                        </div>
                                                        <input type="file" class="form-control file" name="logo_dark"
                                                            id="logo_dark" data-filename="logo_update">
                                                    </label>
                                                </div>
                                                @error('logo')
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('Invoice Logo') }}</h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="logo-content mt-3">
                                                    <img src="{{ $store_logo . '/' . (isset($store_settings['invoice_logo']) && !empty($store_settings['invoice_logo']) ? $store_settings['invoice_logo'] : 'invoice_logo.png') }}"
                                                        width="140px" class="invoice_logo">
                                                </div>
                                                <div class="choose-files mt-4">
                                                    <label for="invoice_logo">
                                                        <div class=" bg-primary logo_update"> <i
                                                                class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                        </div>
                                                        <input type="file" name="invoice_logo" id="invoice_logo"
                                                            class="form-control file" data-filename="invoice_logo_update">
                                                    </label>
                                                </div>
                                                @error('invoice_logo')
                                                    <div class="row">
                                                        <span class="invalid-invoice_logo" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    {{ Form::label('store_name', __('Store Name'), ['class' => 'form-label']) }}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Store Name')]) !!}
                                    @error('store_name')
                                        <span class="invalid-store_name" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email')]) }}
                                    @error('email')
                                        <span class="invalid-email" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if ($plan->enable_custdomain == 'on' || $plan->enable_custsubdomain == 'on')
                                    <div class="col-md-6 py-4">
                                        <div class="radio-button-group mts">
                                            <div class="item">
                                                <label
                                                    class="btn btn-outline-primary {{ $store_settings['enable_storelink'] == 'on' ? 'active' : '' }}">
                                                    <input type="radio" class="domain_click  radio-button"
                                                        name="enable_domain" value="enable_storelink" id="enable_storelink"
                                                        {{ $store_settings['enable_storelink'] == 'on' ? 'checked' : '' }}">
                                                    {{ __('Store Link') }}
                                                </label>
                                            </div>
                                            @if ($plan->enable_custdomain == 'on')
                                                <div class="item">
                                                    <label
                                                        class="btn btn-outline-primary {{ $store_settings['enable_domain'] == 'on' ? 'active' : '' }}">
                                                        <input type="radio" class="domain_click radio-button"
                                                            name="enable_domain" value="enable_domain" id="enable_domain"
                                                            {{ $store_settings['enable_domain'] == 'on' ? 'checked' : '' }}>
                                                        {{ __('Domain') }}
                                                    </label>
                                                </div>
                                            @endif
                                            @if ($plan->enable_custsubdomain == 'on')
                                                <div class="item">
                                                    <label
                                                        class="btn btn-outline-primary {{ $store_settings['enable_subdomain'] == 'on' ? 'active' : '' }}">
                                                        <input type="radio" class="domain_click radio-button"
                                                            name="enable_domain" value="enable_subdomain"
                                                            id="enable_subdomain"
                                                            {{ $store_settings['enable_subdomain'] == 'on' ? 'checked' : '' }}>
                                                        {{ __('Sub Domain') }}
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="text-sm mt-2" id="domainnote" style="display: none">
                                            {{ __('Note : Before add custom domain, your domain A record is pointing to our server IP :') }}{{ $serverIp }}
                                            <br>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="StoreLink"
                                        style="{{ $store_settings['enable_storelink'] == 'on' ? 'display: block' : 'display: none' }}">
                                        {{ Form::label('store_link', __('Store Link'), ['class' => 'form-label']) }}
                                        <div class="input-group">
                                            <input type="text" value="{{ $store_settings['store_url'] }}"
                                                id="myInput" class="form-control d-inline-block"
                                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                                readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="button"
                                                    onclick="myFunction()" id="button-addon2"><i class="far fa-copy"></i>
                                                    {{ __('Copy Link') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 domain"
                                        style="{{ $store_settings['enable_domain'] == 'on' ? 'display:block' : 'display:none' }}">
                                        {{ Form::label('store_domain', __('Custom Domain'), ['class' => 'form-label']) }}
                                        {{ Form::text('domains', $store_settings['domains'], ['class' => 'form-control', 'placeholder' => __('xyz.com')]) }}
                                    </div>
                                    @if ($plan->enable_custsubdomain == 'on')
                                        <div class="form-group col-md-6 sundomain"
                                            style="{{ $store_settings['enable_subdomain'] == 'on' ? 'display:block' : 'display:none' }}">
                                            {{ Form::label('store_subdomain', __('Sub Domain'), ['class' => 'form-label']) }}
                                            <div class="input-group">
                                                {{ Form::text('subdomain', $store_settings['slug'], ['class' => 'form-control', 'placeholder' => __('Enter Domain'), 'readonly']) }}
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        id="basic-addon2">.{{ $subdomain_name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="form-group col-md-6" id="StoreLink">
                                        {{ Form::label('store_link', __('Store Link'), ['class' => 'form-label']) }}
                                        <div class="input-group">
                                            <input type="text" value="{{ $store_settings['store_url'] }}"
                                                id="myInput" class="form-control d-inline-block"
                                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                                readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="button"
                                                    onclick="myFunction()" id="button-addon2"><i class="far fa-copy"></i>
                                                    {{ __('Copy Link') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group col-md-4">
                                    {{ Form::label('tagline', __('Tagline'), ['class' => 'form-label']) }}
                                    {{ Form::text('tagline', null, ['class' => 'form-control', 'placeholder' => __('Tagline')]) }}
                                    @error('tagline')
                                        <span class="invalid-tagline" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('address', __('Address'), ['class' => 'form-label']) }}
                                    {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('Address')]) }}
                                    @error('address')
                                        <span class="invalid-address" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('city', __('City'), ['class' => 'form-label']) }}
                                    {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('City')]) }}
                                    @error('city')
                                        <span class="invalid-city" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('state', __('State'), ['class' => 'form-label']) }}
                                    {{ Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('State')]) }}
                                    @error('state')
                                        <span class="invalid-state" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('zipcode', __('Zipcode'), ['class' => 'form-label']) }}
                                    {{ Form::text('zipcode', null, ['class' => 'form-control', 'placeholder' => __('Zipcode')]) }}
                                    @error('zipcode')
                                        <span class="invalid-zipcode" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('country', __('Country'), ['class' => 'form-label']) }}
                                    {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('Country')]) }}
                                    @error('country')
                                        <span class="invalid-country" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('store_default_language', __('Store Default Language'), ['class' => 'form-label']) }}
                                    <div class="changeLanguage">
                                        <select name="store_default_language" id="store_default_language"
                                            class="form-control" data-toggle="select">
                                            @foreach (\App\Models\Utility::languages() as $language)
                                                <option @if ($store_lang == $language) selected @endif
                                                    value="{{ $language }}">
                                                    {{ Str::upper($language) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('decimal_number_format', __('Decimal Number Format'), ['class' => 'form-label']) }}
                                    {{ Form::number('decimal_number', isset($store_settings['decimal_number']) ? $store_settings['decimal_number'] : 2, ['class' => 'form-control', 'placeholder' => __('decimal_number')]) }}
                                    @error('decimal_number')
                                        <span class="invalid-decimal_number" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 mt-3">
                                    <label class="form-check-label" for="is_checkout_login_required"></label>
                                    <div class="custom-control form-switch">
                                        <input type="checkbox" class="form-check-input" name="is_checkout_login_required"
                                            id="is_checkout_login_required"
                                            @if ($store_settings['is_checkout_login_required'] == null) @if ($settings['is_checkout_login_required'] == 'on')
                                                {{ 'checked=checked' }} @endif
                                    @elseif($store_settings['is_checkout_login_required'] == 'on') {{ 'checked=checked' }} @else
                                        {{ '' }} @endif
                                    {{-- {{ $store_settings['is_checkout_login_required'] == 'on' ? 'checked=checked' : '' }} --}}
                                    >
                                    {{ Form::label('is_checkout_login_required', __('Is Checkout Login Required'), ['class' => 'form-check-label mb-3']) }}
                                </div>
                            </div>
                            @if ($plan->blog == 'on')
                                <div class="form-group col-md-4">
                                    <label class="form-check-label" for="blog_enable"></label>
                                    <div class="custom-control form-switch">
                                        <input type="checkbox" class="form-check-input" name="blog_enable"
                                            id="blog_enable"
                                            {{ $store_settings['blog_enable'] == 'on' ? 'checked=checked' : '' }}>
                                        {{ Form::label('blog_enable', __('Blog Menu Dispay'), ['class' => 'form-check-label mb-3']) }}
                                    </div>
                                </div>
                            @endif
                            @if ($plan->shipping_method == 'on')
                                <div class="form-group col-md-4">
                                    <label class="form-check-label" for="enable_shipping"></label>
                                    <div class="custom-control form-switch">
                                        <input type="checkbox" class="form-check-input" name="enable_shipping"
                                            id="enable_shipping"
                                            {{ $store_settings['enable_shipping'] == 'on' ? 'checked=checked' : '' }}>
                                        {{ Form::label('enable_shipping', __('Shipping Method Enable'), ['class' => 'form-check-label mb-3']) }}
                                    </div>
                                </div>
                            @endif

                            <div class="form-group col-md-4 ">
                                <label class="form-check-label" for="enable_rating"></label>
                                <div class="custom-control form-switch">
                                    <input type="checkbox" class="form-check-input" name="enable_rating"
                                        id="enable_rating"
                                        {{ $store_settings['enable_rating'] == 'on' ? 'checked=checked' : '' }}>
                                    {{ Form::label('enable_rating', __('Product Rating Display'), ['class' => 'form-check-label mb-3']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fab fa-google" aria-hidden="true"></i>
                                    {{ Form::label('google_analytic', __('Google Analytic'), ['class' => 'form-label']) }}
                                    {{ Form::text('google_analytic', null, ['class' => 'form-control', 'placeholder' => 'UA-XXXXXXXXX-X']) }}
                                    @error('google_analytic')
                                        <span class="invalid-google_analytic" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    {{ Form::label('facebook_pixel_code', __('Facebook Pixel'), ['class' => 'form-label']) }}
                                    {{ Form::text('fbpixel_code', null, ['class' => 'form-control', 'placeholder' => 'UA-0000000-0']) }}
                                    @error('facebook_pixel_code')
                                        <span class="invalid-google_analytic" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {{ Form::label('storejs', __('Store Custom JS'), ['class' => 'form-label']) }}
                                {{ Form::textarea('storejs', null, ['class' => 'form-control', 'rows' => 3, 'placehold   er' => __('About')]) }}
                                @error('storejs')
                                    <span class="invalid-about" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                {{ Form::label('metakeyword', __('Meta Keywords'), ['class' => 'form-label']) }}
                                {!! Form::textarea('metakeyword', null, [
                                    'class' => 'form-control',
                                    'rows' => 3,
                                    'placeholder' => __('Meta Keyword'),
                                ]) !!}
                                @error('meta_keywords')
                                    <span class="invalid-about" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                {{ Form::label('metadesc', __('Meta Description'), ['class' => 'form-label']) }}
                                {!! Form::textarea('metadesc', null, [
                                    'class' => 'form-control',
                                    'rows' => 3,
                                    'placeholder' => __('Meta Description'),
                                ]) !!}

                                @error('meta_description')
                                    <span class="invalid-about" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-sm-12 px-2">
                        <div class="text-end">
                            <button type="button" class="btn bs-pass-para btn-secondary btn-light"
                                data-title="{{ __('Delete') }}" data-confirm="{{ __('Are You Sure?') }}"
                                data-text="{{ __('This action can not be undone. Do you want to continue?') }}"
                                data-confirm-yes="delete-form-{{ $store_settings->id }}">
                                <span class="text-black">{{ __('Delete Store') }}</span>
                            </button>
                            {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    {!! Form::open([
        'method' => 'DELETE',
        'route' => ['ownerstore.destroy', $store_settings->id],
        'id' => 'delete-form-' . $store_settings->id,
    ]) !!}
    {!! Form::close() !!}
@endif
@endsection

@push('scripts')
@endpush
