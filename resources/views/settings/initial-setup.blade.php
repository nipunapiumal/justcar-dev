@extends('layouts.adminv2')
@php
    
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    $user = Auth::user();
    
    if ($user->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
@endphp
@push('script-page')
    <script>
        var type = window.location.hash.substr(1);
        $('.list-group-item').removeClass('active');
        $('.list-group-item').removeClass('text-primary');
        if (type != '') {
            $('a[href="#' + type + '"]').addClass('active').removeClass('text-primary');
        } else {
            $('.list-group-item:eq(0)').addClass('active').removeClass('text-primary');
        }

        $(document).on('click', '.list-group-item', function() {
            $('.list-group-item').removeClass('active');
            $('.list-group-item').removeClass('text-primary');
            setTimeout(() => {
                $(this).addClass('active').removeClass('text-primary');
            }, 10);
        });

        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
@endpush
@php
    
@endphp
@section('page-title')
    {{ __('Initial Setup') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">{{ __('Initial Setup') }}</h5>
    </div>
@endsection
@section('action-btn')
@endsection
@section('content')
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="alert alert-warning" role="alert">
                {{ __('Access your personalized dashboard by completing this section. You can conveniently modify these settings later within the dashboard to suit your preferences.') }}
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="sticky-top" style="top:30px">
                        <div class="card ">
                            <div class="list-group list-group-flush" id="useradd-sidenav">

                                @php
                                    $initial_setup = [];
                                    if ($user->initial_setup) {
                                        $initial_setup = json_decode($user->initial_setup);
                                    }
                                    
                                @endphp



                                <a href="#company-overview"
                                    class="list-group-item list-group-item-action">{{ __('Company Overview') }}
                                    <div class="float-end">
                                        @if (in_array('company-overview', $initial_setup))
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="ti ti-chevron-right"></i>
                                        @endif

                                    </div>
                                </a>

                                {{-- <a href="#store-logo" class="list-group-item list-group-item-action">{{ __('Store Logo') }}
                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a> --}}

                                <a href="#layouts" class="list-group-item list-group-item-action">{{ __('Layouts') }}
                                    <div class="float-end">
                                        @if (in_array('layouts', $initial_setup))
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="ti ti-chevron-right"></i>
                                        @endif

                                    </div>
                                </a>

                                <a href="#cookie-bot" class="list-group-item list-group-item-action">{{ __('Cookie Bot') }}
                                    <small class="text-muted">[{{ __('Optional') }}]</small>
                                    <div class="float-end">
                                        @if (in_array('cookie-bot', $initial_setup))
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="ti ti-chevron-right"></i>
                                        @endif

                                    </div>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8">

                    @if (!in_array('company-overview', $initial_setup))
                        <div id="company-overview" class="card">
                            <div class="card-header">
                                <h5>{{ __('Company Overview') }}</h5>
                            </div>

                            <div class="tab-pane " id="company-overview">
                                {{ Form::model($store_settings, ['route' => ['settings.store', $store_settings['id']], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                <div class="border p-3 rounded stripe-payment-div">
                                    <div class="form-group">
                                        {{ Form::label('store_name', __('Store Name'), ['class' => 'form-label']) }}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Store Name')]) !!}
                                        @error('store_name')
                                            <span class="invalid-store_name" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email')]) }}
                                        @error('email')
                                            <span class="invalid-email" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    @if ($plan->enable_custdomain == 'on' || $plan->enable_custsubdomain == 'on')
                                        <div class="col-md-8 py-4">
                                            <div class="radio-button-group mts">
                                                <div class="item">
                                                    <label
                                                        class="btn btn-outline-primary {{ $store_settings['enable_storelink'] == 'on' ? 'active' : '' }}">
                                                        <input type="radio" class="domain_click  radio-button"
                                                            name="enable_domain" value="enable_storelink"
                                                            id="enable_storelink"
                                                            {{ $store_settings['enable_storelink'] == 'on' ? 'checked' : '' }}">
                                                        {{ __('Store Link') }}
                                                    </label>
                                                </div>
                                                @if ($plan->enable_custdomain == 'on')
                                                    <div class="item">
                                                        <label
                                                            class="btn btn-outline-primary {{ $store_settings['enable_domain'] == 'on' ? 'active' : '' }}">
                                                            <input type="radio" class="domain_click radio-button"
                                                                name="enable_domain" value="enable_domain"
                                                                id="enable_domain"
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
                                        <div class="form-group" id="StoreLink"
                                            style="{{ $store_settings['enable_storelink'] == 'on' ? 'display: block' : 'display: none' }}">
                                            {{ Form::label('store_link', __('Store Link'), ['class' => 'form-label']) }}
                                            <div class="input-group">
                                                <input type="text" value="{{ $store_settings['store_url'] }}"
                                                    id="myInput" class="form-control d-inline-block"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="button"
                                                        onclick="copyText()" id="button-addon2"><i class="far fa-copy"></i>
                                                        {{ __('Copy Link') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group domain"
                                            style="{{ $store_settings['enable_domain'] == 'on' ? 'display:block' : 'display:none' }}">
                                            {{ Form::label('store_domain', __('Custom Domain'), ['class' => 'form-label']) }}
                                            {{ Form::text('domains', $store_settings['domains'], ['class' => 'form-control', 'placeholder' => __('xyz.com')]) }}
                                        </div>
                                        @if ($plan->enable_custsubdomain == 'on')
                                            <div class="form-group sundomain"
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
                                        <div class="form-group" id="StoreLink">
                                            {{ Form::label('store_link', __('Store Link'), ['class' => 'form-label']) }}
                                            <div class="input-group">
                                                <input type="text" value="{{ $store_settings['store_url'] }}"
                                                    id="myInput" class="form-control d-inline-block"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="button"
                                                        onclick="copyText()" id="button-addon2"><i
                                                            class="far fa-copy"></i>
                                                        {{ __('Copy Link') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        {{ Form::label('tagline', __('Tagline'), ['class' => 'form-label']) }}
                                        {{ Form::text('tagline', null, ['class' => 'form-control', 'placeholder' => __('Tagline')]) }}
                                        @error('tagline')
                                            <span class="invalid-tagline" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('address', __('Address'), ['class' => 'form-label']) }}
                                        {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('Address')]) }}
                                        @error('address')
                                            <span class="invalid-address" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('city', __('City'), ['class' => 'form-label']) }}
                                        {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('City')]) }}
                                        @error('city')
                                            <span class="invalid-city" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('state', __('State'), ['class' => 'form-label']) }}
                                        {{ Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('State')]) }}
                                        @error('state')
                                            <span class="invalid-state" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('zipcode', __('Zipcode'), ['class' => 'form-label']) }}
                                        {{ Form::text('zipcode', null, ['class' => 'form-control', 'placeholder' => __('Zipcode')]) }}
                                        @error('zipcode')
                                            <span class="invalid-zipcode" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('country', __('Country'), ['class' => 'form-label']) }}
                                        {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('Country')]) }}
                                        @error('country')
                                            <span class="invalid-country" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
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
                                    <div class="row">
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
                                                                <input type="file" class="form-control file"
                                                                    name="logo" id="logo"
                                                                    data-filename="logo_update">
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
                                                                <input type="file" class="form-control file"
                                                                    name="logo_dark" id="logo_dark"
                                                                    data-filename="logo_update">
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
                                                                <input type="file" name="invoice_logo"
                                                                    id="invoice_logo" class="form-control file"
                                                                    data-filename="invoice_logo_update">
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
                                    </div>
                                </div>
                                <div class="col-sm-12 my-2 px-2">
                                    <div class="text-end">

                                        <input type="submit" value="{{ __('Continue') }}"
                                            class="btn btn-xs btn-primary">
                                    </div>
                                </div>

                                {{ Form::close() }}
                            </div>
                        </div>

                    @endif


                    {{-- <div id="store-logo" class="card">
                        <div class="card-header">
                            <h5>{{ __('Store Logo') }}</h5>
                        </div>

                        <div class="tab-pane " id="store-logo">
                            {{ Form::model($store_settings, ['route' => ['settings.store', $store_settings['id']], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            <div class="border p-3 rounded stripe-payment-div">
                                <div class="row">
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
                                                            <input type="file" class="form-control file"
                                                                name="logo" id="logo"
                                                                data-filename="logo_update">
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
                                                            <input type="file" class="form-control file"
                                                                name="logo_dark" id="logo_dark"
                                                                data-filename="logo_update">
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
                                                                class="form-control file"
                                                                data-filename="invoice_logo_update">
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
                                </div>




                            </div>
                            <div class="col-sm-12 my-2 px-2">
                                <div class="text-end">

                                    <input type="submit" value="{{ __('Continue') }}" class="btn btn-xs btn-primary">
                                </div>
                            </div>

                            {{ Form::close() }}
                        </div>
                    </div> --}}
                    @if (!in_array('layouts', $initial_setup))
                        <div id="layouts" class="card">
                            <div class="card-header">
                                <h5>{{ __('Layouts') }}</h5>
                            </div>

                            <div class="tab-pane " id="layouts">
                                {{ Form::open(['route' => ['store.changetheme', $store_settings->id], 'method' => 'POST']) }}

                                <div class="border p-3 rounded stripe-payment-div">
                                    <div class="row">
                                        <h5 class="mt-3 mb-4">{{ __('Free Layouts') }}</h5>
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="row theme-changer">
                                                @foreach (\App\Models\Utility::themeOne() as $key => $v)
                                                @php $key_mapping = \App\Models\Utility::getThemeMapping($key); @endphp
                                                    <div class="col-6 col-md-4 cc-selector mb-2">
                                                        <div class="mb-3 screen image">
                                                            <img src="{{ asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg')) }}"
                                                                class="img-center pro_max_width pro_max_height {{ $key }}_img">
                                                            <div class="actions">
                                                                <a href="">
                                                                    <button type="button"
                                                                        class="btn btn-default delete-image-btn pull-right">
                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                    </button>
                                                                </a>
                                                                <a href="">
                                                                    <button type="button"
                                                                        class="btn btn-default edit-image-btn pull-right">
                                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row gutters-xs theme_color"
                                                                id="{{ $key }}">
                                                                <div
                                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                                    <label class="colorinput">
                                                                        <input name="theme_color" type="radio"
                                                                            value="white-black-color.css"
                                                                            data-theme="{{ $key }}"
                                                                            data-imgpath="{{ asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg')) }}"
                                                                            class="colorinput-input"
                                                                            {{ isset($store_settings['store_theme']) && $store_settings['store_theme'] == $key ? 'checked' : '' }}>
                                                                        <span class="colorinput-color-v2"></span>
                                                                        <label style="font-size: 12px">&nbsp;
                                                                            {{ __('Set') }}
                                                                            {{ $key_mapping }}</label>
                                                                    </label>
                                                                    <div style="margin-left: 5px">
                                                                        <button type="submit"
                                                                            class="btn btn-xs btn-primary"
                                                                            title="{{ __('Save') }}"
                                                                            style="display: none;padding: 4px 10px;"><i
                                                                                class="fas fa-save"></i></button>
                                                                        {{-- {{ Form::submit(__('Save'), ['class' => 'btn btn-xs btn-primary', 'style' => 'display:none']) }} --}}
                                                                    </div>
                                                                    {{-- <div style="margin-left: 5px">
                                                                        @if (isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key)
                                                                            <a title="{{ __('Edit') }}"
                                                                                href="{{ route('store.editproducts', [$store_settings->slug, $key]) }}"
                                                                                class="btn btn-outline-primary theme_btn"
                                                                                type="button" id="button-addon2"
                                                                                style="padding: 4px 10px;"><i
                                                                                    class="ti ti-pencil"></i></a>
                                                                        @endif
                                                                    </div> --}}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            @if ($plan->premium_layouts == 'on')
                                                <h5 class="mt-3 mb-4">{{ __('Premium Layouts') }}</h5>
                                                <div class="row theme-changer">
                                                    @foreach (\App\Models\Utility::premiumPlusThemes() as $key => $v)
                                                    @php $key_mapping = \App\Models\Utility::getThemeMapping($key); @endphp
                                                        <div class="col-12 col-md-4 cc-selector mb-2">
                                                            <div class="mb-3 screen image">
                                                                <img src="{{ asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg')) }}"
                                                                    class="img-center pro_max_width pro_max_height {{ $key }}_img">
                                                                <div class="actions">
                                                                    <a href="">
                                                                        <button type="button"
                                                                            class="btn btn-default delete-image-btn pull-right">
                                                                            <span class="glyphicon glyphicon-trash"></span>
                                                                        </button>
                                                                    </a>
                                                                    <a href="">
                                                                        <button type="button"
                                                                            class="btn btn-default edit-image-btn pull-right">
                                                                            <span
                                                                                class="glyphicon glyphicon-pencil"></span>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row gutters-xs theme_color"
                                                                    id="{{ $key_mapping }}">
                                                                    <div
                                                                        class="col-12 d-flex justify-content-center align-items-center">
                                                                        <label class="colorinput">
                                                                            <input name="theme_color" type="radio"
                                                                                value="white-black-color.css"
                                                                                data-theme="{{ $key }}"
                                                                                data-imgpath="{{ asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg')) }}"
                                                                                class="colorinput-input"
                                                                                {{ isset($store_settings['store_theme']) && $store_settings['store_theme'] == $key ? 'checked' : '' }}>
                                                                            <span class="colorinput-color-v2"></span>
                                                                            <label style="font-size: 12px">&nbsp;
                                                                                {{ __('Set') }}
                                                                                {{ $key }}</label>
                                                                        </label>
                                                                        <div style="margin-left: 5px">
                                                                            <button type="submit"
                                                                                class="btn btn-xs btn-primary"
                                                                                title="{{ __('Save') }}"
                                                                                style="display: none;padding-left:12px;padding-right:12px;"><i
                                                                                    class="fas fa-save"></i></button>
                                                                            {{-- {{ Form::submit(__('Save'), ['class' => 'btn btn-xs btn-primary', 'style' => 'display:none']) }} --}}
                                                                        </div>
                                                                        {{-- <div style="margin-left: 5px">
                                                                            @if (isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key)
                                                                                <a title="{{ __('Edit') }}"
                                                                                    href="{{ route('store.editproducts', [$store_settings->slug, $key]) }}"
                                                                                    class="btn btn-outline-primary theme_btn"
                                                                                    type="button" id="button-addon2"
                                                                                    style="padding-left:12px;padding-right:12px;"><i
                                                                                        class="ti ti-pencil"></i></a>
                                                                            @endif
                                                                        </div> --}}
                                                                    </div>
                                                                    {{-- @foreach ($v as $css => $val)
                                                                        <div class="col">
                                                                            <label class="colorinput">
                                                                                <input name="theme_color" type="radio"
                                                                                    value="{{ $css }}"
                                                                                    data-theme="{{ $key }}"
                                                                                    data-imgpath="{{ $val['img_path'] }}"
                                                                                    class="colorinput-input"
                                                                                    {{ isset($store_settings['store_theme']) && $store_settings['store_theme'] == $css ? 'checked' : '' }}>
                                                                                <span class="colorinput-color"
                                                                                    style="background:#{{ $val['color'] }}"></span>
                                                                            </label>
                                                                        </div>
                                                                    @endforeach --}}
                                                                    {{-- <div class="col-12">
                                                                       
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif


                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="col-sm-12 my-2 px-2">
                                <div class="text-end">

                                    <input type="submit" value="{{ __('Continue') }}" class="btn btn-xs btn-primary">
                                </div>
                            </div> --}}
                                {{ Form::hidden('themefile', null, ['id' => 'themefile']) }}

                                {{ Form::close() }}
                            </div>
                        </div>
                    @endif
                    @if (!in_array('cookie-bot', $initial_setup))
                        <div id="cookie-bot" class="card">
                            <div class="card-header">
                                <h5>{{ __('Cookie Bot') }}
                                    <small class="text-muted">[{{ __('Optional') }}]</small>
                                </h5>
                                <small class="text-dark font-weight-bold">
                                    {{ __("CookieScript is essential for GDPR, CCPA (California Consumer Privacy Act), and the 'EU Cookie Directive' compliance. Without a cookie script, websites risk non-compliance and potential warnings. Implementing CookieScript ensures a seamless way to meet these regulations and maintain user privacy.") }}
                                </small>
                            </div>

                            <div class="tab-pane " id="cookie-bot">
                                {{ Form::open(['route' => ['store.cookie.bot'], 'method' => 'PUT']) }}

                                <div class="border p-3 rounded stripe-payment-div">

                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check form-switch float-end">
                                                    <label class="form-check-label" for="is_cookiebot_enable">
                                                        {{ __('Enable') }}
                                                    </label>
                                                    <input type="checkbox" class="form-check-input"
                                                        id="is_cookiebot_enable" name="is_cookiebot_enable"
                                                        value="on"
                                                        {{ $store_settings->is_cookiebot_enable == 'on' ? 'checked=checked' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h5> {{ __('API Mode') }} </h5>

                                                <div class="row mt-2">
                                                    <div class="col-sm-3 form-group">
                                                        <div class="form-check form-check-inline mb">
                                                            <input type="radio" id="cookiebot_api_mode_sandbox"
                                                                name="cookiebot_api_mode" value="sandbox"
                                                                class="form-check-input"
                                                                {{ $store_settings->cookiebot_api_mode == 'sandbox' ? 'checked' : '' }}>

                                                            <label class="form-check-label"
                                                                for="cookiebot_api_mode_sandbox">{{ __('Sandbox') }}</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb">
                                                            <input type="radio" id="cookiebot_api_mode_live"
                                                                name="cookiebot_api_mode" value="live"
                                                                class="form-check-input"
                                                                {{ $store_settings->cookiebot_api_mode == 'live' ? 'checked' : '' }}>

                                                            <label class="form-check-label"
                                                                for="cookiebot_api_mode_live">{{ __('Live') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <h5> {{ __('Cookie Bot Group ID') }} </h5>

                                                <div class="col-lg col-md col-sm form-group">
                                                    <input class="form-control" name="cookie_bot_group_id" type="text"
                                                        value="{{ $store_settings->cookiebot_group_id }}"
                                                        id="cookie_bot_group_id"
                                                        placeholder="Paste your Cookie bot Group ID here">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-sm-12 my-2 px-2">
                                    <div class="text-end">

                                        <input type="submit" value="{{ __('Continue') }}"
                                            class="btn btn-xs btn-primary">
                                    </div>
                                </div>

                                {{ Form::close() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
