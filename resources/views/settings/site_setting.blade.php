@extends('layouts.admin')
@section('page-title')
    {{ __('Site Settings') }}
@endsection
@php

    $logo = asset(Storage::url('uploads/logo/'));
    $logo_light = \App\Models\Utility::getValByName('company_logo_light');
    $logo_dark = \App\Models\Utility::getValByName('company_logo_dark');
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');

    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Site Settings') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Site Settings') }}</h5>
    </div>
@endsection
@section('action-btn')
@endsection
@push('script-page')
    <script>
        function check_theme(color_val) {
            $('.theme-color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }
    </script>
@endpush
@section('content')
    @if (Auth::user()->type == 'Owner')
        {{ Form::model($settings, ['route' => 'business.setting', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h5>{{ __('Site Settings') }}</h5>
                    </div> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ __('Logo dark') }}</h5>
                                    </div>

                                    <div class="card-body pt-0">
                                        <div class="setting-card">
                                            <div class="logo-content mt-4">
                                                {{-- <img src="{{ $logo . '/' . (isset($logo_dark) && !empty($logo_dark) ? $logo_dark : ' logo-dark.png') }}"
                                                    class="img-setting" width="170px"> --}}
                                                <img src="{{ $logo . '/' . (isset($logo_dark) && !empty($logo_dark) ? $logo_dark : 'logo-dark.png') }}"
                                                    width="170px" class="img_setting">
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="company_logo">
                                                    <div class=" bg-primary company_logo_update"> <i
                                                            class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                    </div>
                                                    <input type="file" name="logo_dark" id="company_logo"
                                                        class="form-control file " data-filename="company_logo_update">
                                                </label>
                                            </div>
                                            @error('company_logo')
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
                                        <h5>{{ __('Logo Light') }}</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-4">

                                                <img src="{{ $logo . '/' . (isset($logo_light) && !empty($logo_light) ? $logo_light : 'logo-light.png') }}"
                                                    class=" img_setting" width="170px">
                                                {{-- <img src="{{$logo.'/'.(isset($logo_light) && !empty($logo_light)?$logo_light:'logo-dark.png')}}" width="170px" class="img_setting"> --}}
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="company_logo_light">
                                                    <div class=" bg-primary dark_logo_update"> <i
                                                            class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                    </div>
                                                    <input type="file" class="form-control file" name="logo_light"
                                                        id="company_logo_light" data-filename="dark_logo_update">
                                                </label>
                                            </div>
                                            @error('company_logo_light')
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
                                        <h5>{{ __('Favicon') }}</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-3">
                                                <img src="{{ $logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}"
                                                    width="50px" height="50px" class=" img_setting favicon">
                                                {{-- <img src="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')}}" width="50px" class="img_setting"> --}}
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="company_favicon">
                                                    <div class=" bg-primary company_favicon_update"> <i
                                                            class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                    </div>
                                                    <input type="file" class="form-control file" id="company_favicon"
                                                        name="favicon" data-filename="company_favicon_update">
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

                            <div class="form-group col-md-4">
                                {{ Form::label('title_text', __('Title Text'), ['class' => 'form-label']) }}
                                {{ Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')]) }}
                                @error('title_text')
                                    <span class="invalid-title_text" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('address', __('Address'), ['class' => 'form-label']) }}
                                {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('Address')]) }}
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('zip_code', __('Zip Code'), ['class' => 'form-label']) }}
                                {{ Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => __('Zip Code')]) }}
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('city', __('City'), ['class' => 'form-label']) }}
                                {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('City')]) }}
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('vat_number', __('Vat Number'), ['class' => 'form-label']) }}
                                {{ Form::text('vat_number', null, ['class' => 'form-control', 'placeholder' => __('Vat Number')]) }}
                                <small class="text-xs">
                                    {{ __('Vat Number is used in invoices and various other locations') }}.
                                </small>
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('footer_text', __('Footer Text'), ['class' => 'form-label']) }}
                                {{ Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')]) }}

                                @if (!$copyright_plan->price)
                                    <small class="text-xs">
                                        {!! __('join copyright plan', [
                                            'default_copyright_text' => __('Free Car Dealer Website Powered By') . ' ' . env('APP_NAME'),
                                            'copyright_plan' => "<a href='" . route('copyright-plan.index') . "'>" . __('Copyright Plan') . '</a>',
                                        ]) !!}.
                                    </small>
                                   
                                @endif


                                @error('footer_text')
                                    <span class="invalid-footer_text" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('phone_number', __('Phone Number'), ['class' => 'form-label']) }}
                                {{ Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => __('Phone Number')]) }}
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('fax_number', __('Fax Number'), ['class' => 'form-label']) }}
                                {{ Form::text('fax_number', null, ['class' => 'form-control', 'placeholder' => __('Fax Number')]) }}
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email')]) }}
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('website', __('Website'), ['class' => 'form-label']) }}
                                {{ Form::text('website', null, ['class' => 'form-control', 'placeholder' => __('Website')]) }}
                            </div>
                            <div class="form-group col-md-12">
                                {{ Form::label('bank_number', __('Bank Transfer'), ['class' => 'col-form-label']) }}
                                {{ Form::textarea('bank_number', null, ['class' => 'form-control', 'rows' => '4']) }}
                                <small class="text-xs">
                                    {{__('Note: Input your bank details including bank name.')}}
                                </small>
                            </div>

                            <ul class="nav nav-tabs" role="tablist">
                                @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                @foreach ($store_languages as $lang)
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                            id="{{ $lang }}-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#{{ $lang }}"
                                            type="button" role="tab"
                                            aria-controls="home"
                                            aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach ($store_languages as $lang)
                                    <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                        id="{{ $lang }}" role="tabpanel"
                                        aria-labelledby="{{ $lang }}-tab">

                                        <div class="form-group col-md-12">
                                            {{ Form::label('' . $lang . '_terms_and_conditions', __('Term & condition'), ['class' => 'col-form-label']) }}
                                            {{ Form::textarea('' . $lang . '_terms_and_conditions', null, ['class' => 'form-control', 'rows' => '4']) }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            

                            <div class="form-group col-md-6">
                                <label for="site_date_format" class="form-label">{{ __('Date Format') }}</label>
                                <select type="text" name="site_date_format" class="form-control" data-toggle="select"
                                    id="site_date_format">
                                    <option value="M j, Y" @if (@$settings['site_date_format'] == 'M j, Y') selected="selected" @endif>
                                        Jan 1,2015</option>
                                    <option value="d-m-Y" @if (@$settings['site_date_format'] == 'd-m-Y') selected="selected" @endif>
                                        d-m-y</option>
                                    <option value="m-d-Y" @if (@$settings['site_date_format'] == 'm-d-Y') selected="selected" @endif>
                                        m-d-y</option>
                                    <option value="Y-m-d" @if (@$settings['site_date_format'] == 'Y-m-d') selected="selected" @endif>
                                        y-m-d</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="site_time_format" class="form-label">{{ __('Time Format') }}</label>
                                <select type="text" name="site_time_format" class="form-control" data-toggle="select"
                                    id="site_time_format">
                                    <option value="g:i A" @if (@$settings['site_time_format'] == 'g:i A') selected="selected" @endif>
                                        10:30 PM</option>
                                    <option value="g:i a" @if (@$settings['site_time_format'] == 'g:i a') selected="selected" @endif>
                                        10:30 pm</option>
                                    <option value="H:i" @if (@$settings['site_time_format'] == 'H:i') selected="selected" @endif>
                                        22:30</option>
                                </select>
                            </div>

                            <div class="form-group col-6 col-md-3">
                                <div class="custom-control form-switch p-0">
                                    <label class="form-check-label" for="SITE_RTL">{{ __('RTL') }}</label><br>
                                    <input type="checkbox" class="form-check-input" data-toggle="switchbutton"
                                        data-onstyle="primary" name="SITE_RTL" id="SITE_RTL"
                                        {{ $settings['SITE_RTL'] == 'on' ? 'checked="checked"' : '' }}>
                                </div>
                            </div>
                            <div class="setting-card setting-logo-box p-3">
                                <div class="row">
                                    <h5>{{ __('Theme Customizer') }}</h5>
                                    <div class="col-4 my-auto">
                                        <h6 class="mt-2">
                                            <i data-feather="credit-card"
                                                class="me-2"></i>{{ __('Primary color settings') }}
                                        </h6>
                                        <hr class="my-2" />
                                        <div class="theme-color themes-color">
                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-1' ? 'active_color' : '' }}"
                                                data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-1"
                                                style="display: none;">

                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-2' ? 'active_color' : '' }}"
                                                data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-2"
                                                style="display: none;">

                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-3' ? 'active_color' : '' }}"
                                                data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-3"
                                                style="display: none;">

                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-4' ? 'active_color' : '' }}"
                                                data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-4"
                                                style="display: none;">

                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-5' ? 'active_color' : '' }}"
                                                data-value="theme-5" onclick="check_theme('theme-5')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-5"
                                                style="display: none;">

                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-6' ? 'active_color' : '' }}"
                                                data-value="theme-6" onclick="check_theme('theme-6')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-6"
                                                style="display: none;">
                                        </div>
                                        {{-- <div class="theme-color themes-color">
                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-1' ? 'active_color' : '' }}"
                                                data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-1"
                                                >

                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-2' ? 'active_color' : '' }}"
                                                data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-2"
                                                >

                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-3' ? 'active_color' : '' }}"
                                                data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-3"
                                                >

                                            <a href="#!"
                                                class="{{ $settings['color'] == 'theme-4' ? 'active_color' : '' }}"
                                                data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-4"
                                                >
                                        </div> --}}
                                    </div>
                                    <div class="col-4 my-auto mt-2">
                                        <h6 class="">
                                            <i data-feather="layout" class="me-2"></i>{{ __('Sidebar settings') }}
                                        </h6>
                                        <hr class="my-2" />
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="cust-theme-bg"
                                                name="cust_theme_bg"
                                                {{ Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : '' }} />
                                            <label class="form-check-label f-w-600 pl-1"
                                                for="cust-theme-bg">{{ __('Transparent layout') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-4 my-auto mt-2">
                                        <h6 class="">
                                            <i data-feather="sun" class="me-2"></i>{{ __('Layout settings') }}
                                        </h6>
                                        <hr class="my-2" />
                                        <div class="form-check form-switch mt-2">
                                            <input type="checkbox" class="form-check-input" id="cust-darklayout"
                                                name="cust_darklayout"
                                                {{ $settings['cust_darklayout'] == 'on' ? 'checked="checked"' : '' }} />
                                            <label class="form-check-label f-w-600 pl-1"
                                                for="cust-darklayout">{{ __('Dark Layout') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="col-sm-12 px-2">
                            <div class="text-end">
                                {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    @endif
@endsection

@push('scripts')
@endpush
