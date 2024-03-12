@extends('layouts.admin')
@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = \App\Models\Utility::getValByName('company_logo');
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store->lang;
    }
@endphp
@section('page-title')
    {{ __('Store Theme Setting') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('settings') }}">{{ __('Settings') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Store Theme Setting') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-bold mb-0 text-white">{{ __('Store Theme Setting') }}</h5>
    </div>
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
    <style>
        hr {
            margin: 8px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            @if (Auth::user()->type == 'Owner')
                                @if ($plan->premium_layouts == 'on' && $theme == 'themePlus1')
                                    <a href="#Style_Switcher" id="Style_Switcher_tab"
                                        class="list-group-item list-group-item-action">
                                        {{ __('Style Switcher') }}
                                        <div class="float-end">
                                            <i class="ti ti-chevron-right"></i>
                                        </div>
                                    </a>
                                @endif
                                <a href="#Top_Bar_Setting" id="Top_Bar_Setting_tab"
                                    class="list-group-item list-group-item-action">{{ __('Top Bar Setting') }} <div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                {{-- @if ($theme == 'theme3' || $theme == 'theme4')
                                    <a href="#Banner_Img_Setting" id="Banner_Img_Setting_tab"
                                        class="list-group-item list-group-item-action">{{ __('Banner Img Setting') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif --}}
                                @if ($theme != 'theme3')
                                    <a href="#Header_Setting" id="Header_Setting_tab"
                                        class="list-group-item list-group-item-action">{{ __('Header Setting') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif
                                <a href="#Header_Navigation" id="Header_Navigation_tab"
                                        class="list-group-item list-group-item-action">{{ __('Header Navigation') }}
                                        <div
                                            class="float-end">
                                            <i class="ti ti-chevron-right"></i>
                                        </div>
                                        </a>
                                @if ($theme != 'theme1')
                                    <a href="#Quick_Contact_Info" id="Header_Setting_tab"
                                        class="list-group-item list-group-item-action">{{ __('Sidebar Panel') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif
                                @if ($theme != 'theme1')
                                    <a href="#Galleries" id="Header_Setting_tab"
                                        class="list-group-item list-group-item-action">{{ __('Gallery') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif
                                @if ($plan->job_board == 'on')
                                    <a href="#JobBoard" id="Header_Setting_tab"
                                        class="list-group-item list-group-item-action">{{ __('Job Board') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif
                                <a href="#Features_Setting" id="Features_Setting_tab"
                                    class="list-group-item list-group-item-action">{{ __('Features Setting') }}<div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @if ($theme != 'theme3')
                                    <a href="#Email_Subscriber_Setting" id="Email_Subscriber_Setting_tab"
                                        class="list-group-item list-group-item-action">{{ __('Email Subscriber Setting') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif
                                <a href="#Categories" id="Categories_tab"
                                    class="list-group-item list-group-item-action">{{ __('Categories') }}<div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <a href="#Testimonials" id="Testimonials_tab"
                                    class="list-group-item list-group-item-action">{{ __('Testimonials') }}<div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @if ($theme != 'theme3')
                                    <a href="#Brand_Logo" id="Brand_Logo_tab"
                                        class="list-group-item list-group-item-action">{{ __('Brand Logo') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                {{-- @if ($theme != 'theme3') --}}
                                <a href="#Footer_1" id="Footer_1_tab"
                                    class="list-group-item list-group-item-action">{{ __('Footer 1') }}<div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                {{-- @endif --}}
                                {{-- @if ($theme == 'theme3' || $theme == 'theme4')
                                    <a href="#Footer_1" id="Footer_1_tab"
                                        class="list-group-item list-group-item-action">{{ __('Footer 1') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif --}}
                                <a href="#Footer_2" id="Footer_2_tab"
                                    class="list-group-item list-group-item-action">{{ __('Social Media & Copyright') }}<div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#Content_Sharing" id="Content_Sharing_tab"
                                    class="list-group-item list-group-item-action">
                                    {{ __('Content Sharing') }}
                                    <div class="float-end">
                                        <i class="ti ti-chevron-right"></i>
                                    </div>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
                @if (Auth::user()->type == 'Owner')

                    <div class="col-xl-9">
                        {{ Form::open(['route' => ['store.storeeditproducts', [$store->slug, $theme]], 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

                        @if (in_array($theme, Utility::styleSwitcherEnabledThemes()))
                            <div class="active" id="Style_Switcher">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Style Switcher') }}</h5>
                                                    <small>
                                                        {{ __('Note: This detail will use to change header setting.') }}</small>
                                                </div>

                                            </div>
                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-md-3 mt-3">
                                                            <div class="form-group">
                                                                {{ Form::label('premium_plus_primary_color', __('Primary Color'), ['class' => 'col-form-label']) }}
                                                                {{ Form::color('premium_plus_primary_color', !empty($getStoreThemeSetting['premium_plus_primary_color']) ? $getStoreThemeSetting['premium_plus_primary_color'] : '', ['class' => 'form-control']) }}
                                                                @error('premium_plus_primary_color')
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-3">
                                                            <div class="form-group">
                                                                {{ Form::label('premium_plus_secondary_color', __('Secondary Color'), ['class' => 'col-form-label']) }}
                                                                {{ Form::color('premium_plus_secondary_color', !empty($getStoreThemeSetting['premium_plus_secondary_color']) ? $getStoreThemeSetting['premium_plus_secondary_color'] : '', ['class' => 'form-control']) }}
                                                                @error('premium_plus_secondary_color')
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-3">
                                                            <div class="form-group">
                                                                {{ Form::label('premium_plus_tertiary_color', __('Tertiary Color'), ['class' => 'col-form-label']) }}
                                                                {{ Form::color('premium_plus_tertiary_color', !empty($getStoreThemeSetting['premium_plus_tertiary_color']) ? $getStoreThemeSetting['premium_plus_tertiary_color'] : '', ['class' => 'form-control']) }}
                                                                @error('premium_plus_tertiary_color')
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-3">
                                                            <div class="form-group">

                                                                {{ Form::label('premium_plus_quaternary_color', __('Quaternary Color'), ['class' => 'col-form-label']) }}
                                                                {{ Form::color('premium_plus_quaternary_color', !empty($getStoreThemeSetting['premium_plus_quaternary_color']) ? $getStoreThemeSetting['premium_plus_quaternary_color'] : '', ['class' => 'form-control']) }}
                                                                @error('premium_plus_quaternary_color')
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif


                        @if ($theme != 'theme2')
                            <div class="active" id="Top_Bar_Setting">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Top Bar Setting') }}
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="{{ asset(Storage::url('uploads/guide/guide4.jpeg')) }}">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        {{ __('Note: This detail will use to change header setting.') }}</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_top_bar" value="off">
                                                        @if (!empty($getStoreThemeSetting['enable_top_bar']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_top_bar" id="enable_top_bar"
                                                                {{ $getStoreThemeSetting['enable_top_bar'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_top_bar" id="enable_top_bar">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_top_bar">{{ __('Enable') }}
                                                            {{ __('Top Bar Setting') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-md-12 mt-3">
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

                                                                        @php
                                                                            $data = !empty($getStoreThemeSetting['top_bar_title']) ? json_decode($getStoreThemeSetting['top_bar_title']) : '';
                                                                            if (empty($data->$lang)) {
                                                                                $value = '';
                                                                            } else {
                                                                                $value = $data->$lang == '**********' ? '' : $data->$lang;
                                                                            }
                                                                        @endphp


                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_top_bar_title', __('Top Bar Title'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::text('' . $lang . '_top_bar_title', $value, ['class' => 'form-control', 'placeholder' => __('Enter Top Bar Title')]) }}
                                                                            @error('top_bar_title')
                                                                                <span class="invalid-top_bar_title"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>


                                                                    </div>
                                                                @endforeach
                                                            </div>




                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                {{ Form::label('top_bar_number', __('Top Bar Number'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('top_bar_number', !empty($getStoreThemeSetting['top_bar_number']) ? $getStoreThemeSetting['top_bar_number'] : '', ['class' => 'form-control', 'placeholder' => __('Top Bar Number')]) }}
                                                                @error('top_bar_number')
                                                                    <span class="invalid-top_bar_number" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                {{ Form::label('top_bar_whatsapp', __('Whatsapp'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('top_bar_whatsapp', !empty($getStoreThemeSetting['top_bar_whatsapp']) ? $getStoreThemeSetting['top_bar_whatsapp'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Whatsapp')]) }}
                                                                @error('top_bar_whatsapp')
                                                                    <span class="invalid-top_bar_whatsapp" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                {{ Form::label('top_bar_instagram', __('Instagram'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('top_bar_instagram', !empty($getStoreThemeSetting['top_bar_instagram']) ? $getStoreThemeSetting['top_bar_instagram'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Instagram')]) }}
                                                                @error('top_bar_instagram')
                                                                    <span class="invalid-top_bar_instagram" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                {{ Form::label('top_bar_twitter', __('Twitter'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('top_bar_twitter', !empty($getStoreThemeSetting['top_bar_twitter']) ? $getStoreThemeSetting['top_bar_twitter'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Twitter')]) }}
                                                                @error('top_bar_twitter')
                                                                    <span class="invalid-top_bar_twitter" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                {{ Form::label('top_bar_messenger', __('Messenger'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('top_bar_messenger', !empty($getStoreThemeSetting['top_bar_messenger']) ? $getStoreThemeSetting['top_bar_messenger'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Messenger')]) }}
                                                                @error('top_bar_messenger')
                                                                    <span class="invalid-top_bar_messenger" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                        {{-- @if ($theme == 'theme3' || $theme == 'theme4')
                            <div class="active" id="Banner_Img_Setting">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Banner Img Setting') }}</h5>
                                                    <small>
                                                        {{ __('Note: This detail will use to change header setting.') }}</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_banner_img" value="off">
                                                        @if (!empty($getStoreThemeSetting['enable_banner_img']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_banner_img" id="enable_banner_img"
                                                                {{ $getStoreThemeSetting['enable_banner_img'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_banner_img" id="enable_banner_img">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_banner_img">{{ __('Enable Banner Img') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="banner_img"
                                                                    class="col-form-label">{{ __('Banner Image') }}</label>
                                                                <input type="file" name="banner_img" id="banner_img"
                                                                    value="{{ !empty($getStoreThemeSetting['banner_img']) ? $getStoreThemeSetting['banner_img'] : '' }}"
                                                                    class="form-control custom-input-file">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif --}}

                        @if ($theme != 'theme3')
                            <div class="active" id="Header_Setting">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Header Setting') }}
                                                        @if (!empty($getStoreThemeSetting['header_img']))
                                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                                class="view-img-link popup-img-dashboard" target="_blank"
                                                                href="{{ asset(Storage::url('uploads/guide/guide1.jpeg')) }}">
                                                                <i class="far fa-question-circle"></i></a>
                                                        @endif

                                                        
                                                    </h5>

                                                    <small>
                                                        {{ __('Note: This detail will use to change header setting.') }}</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_header_img" value="off">
                                                        @if (isset($getStoreThemeSetting['enable_header_img']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_header_img" id="enable_header_img"
                                                                {{ $getStoreThemeSetting['enable_header_img'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_header_img" id="enable_header_img">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_header_img">{{ __('Enable Header Img') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="header_img"
                                                                    class="col-form-label">{{ __('Header Image') }}
                                                                </label>
                                                                <input type="file" name="header_img" id="header_img"
                                                                    value="{{ !empty($getStoreThemeSetting['header_img']) ? $getStoreThemeSetting['header_img'] : '' }}"
                                                                    class="form-control custom-input-file">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column">
                                                            <h4 class="mt-3">{{ __('autoGallery') }}</h4>
                                                            <div class="text-center">
                                                                <small>
                                                                    {!! __('autoGallery introducing text', [
                                                                        'url' =>
                                                                            "<a class='ag-trigger' data-type='header_img' data-url='" .
                                                                            route('auto-gallery.show', ['header_img']) .
                                                                            "' href='javascript:void(0)' >" .
                                                                            __('autoGallery') .
                                                                            '</a>',
                                                                    ]) !!}
                                                                </small>
                                                                {{ Form::hidden('ag_header_img') }}
                                                            </div>
                                                            <a class="btn btn-sm btn-primary ag-trigger mt-2 mb-2"
                                                                data-type='header_img'
                                                                data-url="{{ route('auto-gallery.show', ['header_img']) }}"><i
                                                                    class="fas fa-plus"></i>
                                                                {{ __('Browse') }}
                                                            </a>
                                                        </div>
                                                        <ul class="nav nav-tabs" role="tablist">
                                                            @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                            @foreach ($store_languages as $lang)
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                        id="Header_Setting_{{ $lang }}-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Header_Setting_{{ $lang }}"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="tab-content">
                                                            @foreach ($store_languages as $lang)
                                                                <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Header_Setting_{{ $lang }}"
                                                                    role="tabpanel"
                                                                    aria-labelledby="Header_Setting_{{ $lang }}-tab">


                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_header_title', __('Header Title'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::text('' . $lang . '_header_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['header_title'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Header Title')]) }}
                                                                            @error('' . $lang . '_header_title')
                                                                                <span class="invalid-header_title"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_header_desc', __('Header Description'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::text('' . $lang . '_header_desc', \App\Models\Utility::getTranslation($getStoreThemeSetting['header_desc'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Header Description')]) }}
                                                                            @error('' . $lang . '_header_desc')
                                                                                <span class="invalid-header_desc"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_button_text', __('Header Button Text'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::text('' . $lang . '_button_text', \App\Models\Utility::getTranslation($getStoreThemeSetting['button_text'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Header Button Text')]) }}
                                                                            @error('' . $lang . '_button_text')
                                                                                <span class="invalid-button_text"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endif
                        <div class="active" id="Header_Navigation">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5>
                                                    {{ __('Header Navigation') }}
                                                  
                                                </h5>

                                                <small>
                                                    {{ __('Here, you can arrange your navigation menu in the order that you prefer.') }}
                                                </small>
                                            </div>
                                            <div class="text-end">
                                                <a class="btn btn-sm btn-primary mt-2"
                                                href="{{ route('custom-page.index') }}" 
                                                {{-- data-bs-toggle="tooltip"  --}}
                                                {{-- data-bs-placement="top"  --}}
                                                {{-- title="{{__('Create')}} {{ __('Custom Page') }}" --}}
                                                >
                                                <i
                                            class="fas fa-plus"></i>
                                            {{__('Create')}} {{ __('Custom Page') }}
                                    </a>
                                                
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label">{{ __('Selection Area') }}
                                                            </label>
                                                        </div>
                                                        <div id="item-list">
                                                            <ul class="list-group menu-list"
                                                                id="sortable-list" data-name="selection_nav_menu[]"
                                                                style="list-style-type: none">
                                                                <li class="list-group-item disabled">
                                                                    <i class="fas fa-angle-double-down"></i>
                                                                    {{ __('Drop Here') }}
                                                                </li>
                                                                        @foreach (Utility::defaultMenuV2($getStoreThemeSetting, $store, $plan,true) as $menu_title)
                                                                        @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                            @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                            @if (isset($page_slug_url->name))
                                                                                <li class="list-group-item"
                                                                                    data-name="{{ $page_slug_url->id }}">
                                                                                    <i
                                                                                        class="fas fa-arrows-alt"></i>
                                                                                    {{ ucfirst($page_slug_url->name) }}
                                                                                </li>
                                                                            @endif
                                                                        @else
                                                                            <li class="list-group-item"
                                                                                data-name="{{ $menu_title }}">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                {{ __($menu_title) }}
                                                                            </li>
                                                                        @endif
                                                                        @endforeach
                                                                {{-- @if (isset($getStoreThemeSetting['selection_nav_menu']))
                                                                @if ($getStoreThemeSetting['selection_nav_menu'])    
                                                                @foreach (json_decode($getStoreThemeSetting['selection_nav_menu']) as $menu_title)
                                                                        @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                            @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                            @if (isset($page_slug_url->name))
                                                                                <li class="list-group-item"
                                                                                    data-name="{{ $page_slug_url->id }}">
                                                                                    <i
                                                                                        class="fas fa-arrows-alt"></i>
                                                                                    {{ ucfirst($page_slug_url->name) }}
                                                                                </li>
                                                                            @endif
                                                                        @else
                                                                            <li class="list-group-item"
                                                                                data-name="{{ $menu_title }}">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                {{ __($menu_title) }}
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                    @endif
                                                                @else
                                                                    <li class="list-group-item"
                                                                        data-name="Home">
                                                                        <i class="fas fa-arrows-alt"></i>
                                                                        {{ __('Home') }}
                                                                    </li>
                                                                    
                                                                    <li class="list-group-item"
                                                                        data-name="Blog">
                                                                        <i class="fas fa-arrows-alt"></i>
                                                                        {{ __('Blog') }}
                                                                    </li>

                                                                    <li class="list-group-item"
                                                                        data-name="Contact Us">
                                                                        <i class="fas fa-arrows-alt"></i>
                                                                        {{ __('Contact Us') }}
                                                                    </li>

                                                                    <li class="list-group-item"
                                                                        data-name="Gallery">
                                                                        <i class="fas fa-arrows-alt"></i>
                                                                        {{ __('Gallery') }}
                                                                    </li>

                                                                    <li class="list-group-item"
                                                                        data-name="Career With Us">
                                                                        <i class="fas fa-arrows-alt"></i>
                                                                        {{ __('Career With Us') }}
                                                                    </li>

                                                                    @foreach ($page_slug_urls as $k => $page_slug_url)
                                                                        @if ($page_slug_url->enable_page_header == 'on')
                                                                            <li class="list-group-item"
                                                                                data-name="{{ $page_slug_url->id }}">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                {{ ucfirst($page_slug_url->name) }}
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endif --}}
                                                            </ul>
                                                        </div>
                                                        <div id="sorted-info">
                                                            {{-- here goes the updated nav menu data --}}
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label">{{ __('Primary Menu') }}
                                                            </label>
                                                        </div>
                                                        
                                                        <div class="menu">
                                                            <ul class="list-group menu-list"
                                                                id="sortable-primary" data-name="primary_nav_menu[]"
                                                                style="list-style-type: none">
                                                                <li class="list-group-item disabled">
                                                                    <i class="fas fa-angle-double-down"></i>
                                                                    {{ __('Drop Here') }}
                                                                </li>
                                                                @if (isset($getStoreThemeSetting['primary_nav_menu']) && $getStoreThemeSetting['primary_nav_menu'])
                                                                    @foreach (json_decode($getStoreThemeSetting['primary_nav_menu']) as $menu_title)
                                                                        @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                            @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                            @if (isset($page_slug_url->name))
                                                                                <li class="list-group-item"
                                                                                    data-name="{{ $page_slug_url->id }}">
                                                                                    <i
                                                                                        class="fas fa-arrows-alt"></i>
                                                                                    {{ ucfirst($page_slug_url->name) }}
                                                                                </li>
                                                                            @endif
                                                                        @else
                                                                            <li class="list-group-item"
                                                                                data-name="{{ $menu_title }}">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                {{ __($menu_title) }}
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </div>



                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label">{{ __('Secondary Menu') }}
                                                            </label>
                                                        </div>
                                                        {{-- <h4>{{ __('Secondary Menu') }}</h4> --}}
                                                        <div class="menu">
                                                            <ul class="list-group menu-list"
                                                                id="sortable-secondary" data-name="secondary_nav_menu[]"
                                                                style="list-style-type: none">
                                                                <li class="list-group-item disabled">
                                                                    <i class="fas fa-angle-double-down"></i>
                                                                    {{ __('Drop Here') }}
                                                                </li>
                                                                @if (isset($getStoreThemeSetting['secondary_nav_menu']) && $getStoreThemeSetting['secondary_nav_menu'])
                                                                    @foreach (json_decode($getStoreThemeSetting['secondary_nav_menu']) as $menu_title)
                                                                        @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                            @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                            @if (isset($page_slug_url->name))
                                                                                <li class="list-group-item"
                                                                                    data-name="{{ $page_slug_url->id }}">
                                                                                    <i
                                                                                        class="fas fa-arrows-alt"></i>
                                                                                    {{ ucfirst($page_slug_url->name) }}
                                                                                </li>
                                                                            @endif
                                                                        @else
                                                                            <li class="list-group-item"
                                                                                data-name="{{ $menu_title }}">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                {{ __($menu_title) }}
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end">
                                                {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($theme != 'theme1')
                            <div class="active">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Slider Setting') }}</h5>
                                                    <small>
                                                        {{ __('Note: If you enable the Slider Settings, Header Settings will not work!') }}</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_slider_settings"
                                                            value="off">
                                                        @if (isset($getStoreThemeSetting['enable_slider_settings']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_slider_settings" id="enable_slider_settings"
                                                                {{ $getStoreThemeSetting['enable_slider_settings'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_slider_settings" id="enable_slider_settings">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_slider_settings">{{ __('Enable Slider Settings') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class="setting-card">
                                                    <div class="row mt-3" id="sliders">
                                                        @php
                                                            $i = 1;
                                                            $locale = App::getLocale();
                                                            $slider_settings = [];
                                                            if (isset(json_decode($getStoreThemeSetting['slider_settings'])->$locale)) {
                                                                $slider_settings = json_decode($getStoreThemeSetting['slider_settings'])->$locale;
                                                            } elseif (isset(json_decode($getStoreThemeSetting['slider_settings'])->en)) {
                                                                $slider_settings = json_decode($getStoreThemeSetting['slider_settings'])->en;
                                                            }

                                                            $index = 0;

                                                        @endphp
                                                        @if ($slider_settings)
                                                            @php

                                                            @endphp
                                                            @foreach ($slider_settings as $key => $sliderSettings)
                                                                <div class="row slider align-items-start "
                                                                    id="slider-{{ $i }}">
                                                                    <div class="col-md-4">

                                                                        <input type="hidden" name="slider_image_old[]"
                                                                            value="{{ $sliderSettings->slider_image }}">
                                                                        <a class="popup-img-dashboard" target="_blank"
                                                                            href="{{ asset(Storage::url('uploads/store_logo/' . $sliderSettings->slider_image)) }}">
                                                                            <img class="img-whp img-thumbnail img-fluid cover"
                                                                                style="height: 135px;width:200px;object-fit:cover"
                                                                                src="{{ asset(Storage::url('uploads/store_logo/' . $sliderSettings->slider_image)) }}"
                                                                                alt="Image"></a>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <input type="file" name="slider_image[]"
                                                                                class="form-control custom-input-file"
                                                                                placeholder="{{ __('Slider Image') }}">
                                                                        </div>


                                                                        <ul class="nav nav-tabs" role="tablist">
                                                                            @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                                            @foreach ($store_languages as $lang)
                                                                                <li class="nav-item" role="presentation">
                                                                                    <button
                                                                                        class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                                        id="Slider_Setting_{{ $key }}-{{ $lang }}-tab"
                                                                                        data-bs-toggle="tab"
                                                                                        data-bs-target="#Slider_Setting_{{ $key }}-{{ $lang }}"
                                                                                        type="button" role="tab"
                                                                                        aria-controls="home"
                                                                                        aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                        <div class="tab-content">
                                                                            @foreach ($store_languages as $lang)
                                                                                <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                                    id="Slider_Setting_{{ $key }}-{{ $lang }}"
                                                                                    role="tabpanel"
                                                                                    aria-labelledby="Slider_Setting_{{ $key }}-{{ $lang }}-tab">


                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            @php

                                                                                                if (isset(json_decode($getStoreThemeSetting['slider_settings'])->$lang)) {
                                                                                                    $current_slider_settings = json_decode($getStoreThemeSetting['slider_settings'])->$lang;
                                                                                                }

                                                                                            @endphp
                                                                                            {{ Form::text('' . $lang . '_slider_title[]', isset($current_slider_settings) ? $current_slider_settings[$key]->slider_title : '', ['class' => 'form-control', 'placeholder' => __('Enter Slider Title')]) }}
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            {{ Form::text('' . $lang . '_slider_description[]', isset($current_slider_settings) ? $current_slider_settings[$key]->slider_description : '', ['class' => 'form-control', 'placeholder' => __('Enter Slider Description')]) }}
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        {{-- <div class="form-group">
                                                                            {{ Form::text('slider_title[]', $sliderSettings->slider_title, ['class' => 'form-control', 'placeholder' => __('Enter Slider Title')]) }}
                                                                        </div> --}}
                                                                        {{-- <div class="form-group">
                                                                            {{ Form::text('slider_description[]', $sliderSettings->slider_description, ['class' => 'form-control', 'placeholder' => __('Enter Slider Description')]) }}
                                                                        </div> --}}
                                                                    </div>
                                                                    <hr>

                                                                    @if ($i != 1)
                                                                        <div class="col-md-12 mb-3 text-center">
                                                                            <button type="button"
                                                                                class="btn btn-default text-danger"
                                                                                onclick="removeSlider({{ $i }})">
                                                                                <i class="fas fa-trash-alt"></i>
                                                                            </button>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                @php
                                                                    $i++;
                                                                    $index++;
                                                                @endphp
                                                            @endforeach
                                                        @else
                                                            <div class="row slider align-items-start">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <input type="file" name="slider_image[]"
                                                                            class="form-control custom-input-file"
                                                                            placeholder="{{ __('Slider Image') }}">
                                                                    </div>
                                                                </div>
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                                    @foreach ($store_languages as $lang)
                                                                        <li class="nav-item" role="presentation">
                                                                            <button
                                                                                class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                                id="Slider_Setting_0-{{ $lang }}-tab"
                                                                                data-bs-toggle="tab"
                                                                                data-bs-target="#Slider_Setting_0-{{ $lang }}"
                                                                                type="button" role="tab"
                                                                                aria-controls="home"
                                                                                aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach ($store_languages as $lang)
                                                                        <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                            id="Slider_Setting_0-{{ $lang }}"
                                                                            role="tabpanel"
                                                                            aria-labelledby="Slider_Setting_0-{{ $lang }}-tab">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::text('' . $lang . '_slider_title[]', null, ['class' => 'form-control', 'placeholder' => __('Enter Slider Title')]) }}
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    {{ Form::text('' . $lang . '_slider_description[]', null, ['class' => 'form-control', 'placeholder' => __('Enter Slider Description')]) }}
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                {{-- <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        {{ Form::text('slider_title[]', null, ['class' => 'form-control', 'placeholder' => __('Enter Slider Title')]) }}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        {{ Form::text('slider_description[]', null, ['class' => 'form-control', 'placeholder' => __('Enter Slider Description')]) }}
                                                                    </div>
                                                                </div> --}}
                                                                <hr>
                                                            </div>
                                                        @endif



                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <button type="button" class="btn btn-sm btn-primary"
                                                                onclick="addNewSlider({{ json_encode($store_languages) }},'{{ basename(App::getLocale()) }}')"><i
                                                                    class="fas fa-plus"></i>
                                                                {{ __('Add New Slider') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($theme != 'theme1')
                            <div class="active" id="Quick_Contact_Info">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Sidebar Panel') }}
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="{{ asset(Storage::url('uploads/guide/guide6.jpeg')) }}">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        {{ __('Note: This detail will use to change header setting.') }}</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_sidebar_panel" value="off">
                                                        @if (isset($getStoreThemeSetting['enable_sidebar_panel']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_sidebar_panel" id="enable_sidebar_panel"
                                                                {{ $getStoreThemeSetting['enable_sidebar_panel'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_sidebar_panel" id="enable_sidebar_panel">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_sidebar_panel">{{ __('Enable Sidebar Panel') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class="setting-card">
                                                    <div class="form-group">
                                                        {{ Form::label('contact_info_phone_no', __('Phone Number'), ['class' => 'col-form-label']) }}
                                                        {{ Form::text('contact_info_phone_no', isset($getStoreThemeSetting['contact_info_phone_no']) ? $getStoreThemeSetting['contact_info_phone_no'] : '', ['class' => 'form-control', 'placeholder' => 'Phone Number']) }}
                                                        @error('contact_info_phone_no')
                                                            <span class="invalid-quick_contact_info" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('contact_info_email', __('Email'), ['class' => 'col-form-label']) }}
                                                        {{ Form::text('contact_info_email', isset($getStoreThemeSetting['contact_info_email']) ? $getStoreThemeSetting['contact_info_email'] : '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
                                                        @error('contact_info_email')
                                                            <span class="invalid-quick_contact_info" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Quick_Contact_Info{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Quick_Contact_Info{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                    <div class="tab-content">



                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Quick_Contact_Info{{ $lang }}"
                                                                role="tabpanel"
                                                                aria-labelledby="Quick_Contact_Info{{ $lang }}-tab">

                                                                <div class="row">


                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_quick_contact_info', __('Quick Contact Info'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::textarea('' . $lang . '_quick_contact_info', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_contact_info'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Quick Contact Info', 'maxlength' => '300']) }}
                                                                            @error('' . $lang . '_quick_contact_info')
                                                                                <span class="invalid-quick_contact_info"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_office_address', __('Office Address'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::textarea('' . $lang . '_office_address', \App\Models\Utility::getTranslation($getStoreThemeSetting['office_address'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Office Address', 'maxlength' => '300']) }}
                                                                            @error('' . $lang . '_office_address')
                                                                                <span class="invalid-office_address"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_opening_hours', __('Opening Hours'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::textarea('' . $lang . '_opening_hours', \App\Models\Utility::getTranslation($getStoreThemeSetting['opening_hours'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Opening Hours', 'maxlength' => '300']) }}
                                                                            @error('' . $lang . '_opening_hours')
                                                                                <span class="invalid-opening_hours"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                </div>




                                                            </div>
                                                        @endforeach
                                                    </div>



                                                    <div class="row">
                                                        <div class="col-md-6 mt-3">
                                                            <div class="form-group">
                                                                {{ Form::label('sidebar_panel_background_color', __('Background Color'), ['class' => 'col-form-label']) }}
                                                                {{ Form::color('sidebar_panel_background_color', !empty($getStoreThemeSetting['sidebar_panel_background_color']) ? $getStoreThemeSetting['sidebar_panel_background_color'] : '#0A2357', ['class' => 'form-control']) }}
                                                                @error('sidebar_panel_background_color')
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3">
                                                            <div class="form-group">
                                                                {{ Form::label('sidebar_panel_foreground_color', __('Foreground Color'), ['class' => 'col-form-label']) }}
                                                                {{ Form::color('sidebar_panel_foreground_color', !empty($getStoreThemeSetting['sidebar_panel_foreground_color']) ? $getStoreThemeSetting['sidebar_panel_foreground_color'] : '#ffffff', ['class' => 'form-control']) }}
                                                                @error('sidebar_panel_foreground_color')
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                    </div>


                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        @if ($theme != 'theme1')
                            <div class="active" id="Galleries">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Gallery') }}
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="{{ asset(Storage::url('uploads/guide/guide5.jpeg')) }}">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        {{ __('Note : This detail will use for make explore social media.') }}
                                                    </small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_gallery" value="off">
                                                        @if (!empty($getStoreThemeSetting['enable_gallery']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_gallery" id="enable_gallery"
                                                                {{ $getStoreThemeSetting['enable_gallery'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_gallery" id="enable_gallery">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_gallery">{{ __('Enable Gallery') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Galleries{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Galleries{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Galleries{{ $lang }}" role="tabpanel"
                                                                aria-labelledby="Galleries{{ $lang }}-tab">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_gallery_title', __('Title'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::text('' . $lang . '_gallery_title', \App\Models\Utility::getTranslation(isset($getStoreThemeSetting['gallery_title']) ? $getStoreThemeSetting['gallery_title'] : '', $lang), ['class' => 'form-control', 'placeholder' => 'Title']) }}
                                                                            @error('' . $lang . '_gallery_title')
                                                                                <span class="invalid-gallery_title"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_gallery_description', __('Description'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::textarea('' . $lang . '_gallery_description', \App\Models\Utility::getTranslation(isset($getStoreThemeSetting['gallery_description']) ? $getStoreThemeSetting['gallery_description'] : '', $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description']) }}
                                                                            @error('' . $lang . '_gallery_description')
                                                                                <span class="invalid-gallery_description"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        @endforeach
                                                    </div>




                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($plan->job_board == 'on')
                            <div class="active" id="JobBoard">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Job Board') }}</h5>
                                                    <small>
                                                        {{ __('Note : This detail will use for make explore social media.') }}
                                                    </small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_job_board" value="off">
                                                        @if (!empty($getStoreThemeSetting['enable_job_board']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_job_board" id="enable_job_board"
                                                                {{ $getStoreThemeSetting['enable_job_board'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_job_board" id="enable_job_board">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_job_board">{{ __('Enable Job Board') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="JobBoard{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#JobBoard{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="JobBoard{{ $lang }}" role="tabpanel"
                                                                aria-labelledby="JobBoard{{ $lang }}-tab">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_job_board_title', __('Title'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::text('' . $lang . '_job_board_title', \App\Models\Utility::getTranslation(isset($getStoreThemeSetting['job_board_title']) ? $getStoreThemeSetting['job_board_title'] : '', $lang), ['class' => 'form-control', 'placeholder' => 'Title']) }}
                                                                            @error('' . $lang . '_job_board_title')
                                                                                <span class="invalid-gallery_title"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_job_board_description', __('Description'), ['class' => 'col-form-label']) }}
                                                                            {{ Form::textarea('' . $lang . '_job_board_description', \App\Models\Utility::getTranslation(isset($getStoreThemeSetting['job_board_description']) ? $getStoreThemeSetting['job_board_description'] : '', $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description']) }}
                                                                            @error('' . $lang . '_job_board_description')
                                                                                <span class="invalid-gallery_description"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        @endforeach
                                                    </div>




                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="active" id="Features_Setting">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5>{{ __('Features Setting') }}
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                        class="view-img-link popup-img-dashboard" target="_blank"
                                                        href="{{ asset(Storage::url('uploads/guide/guide7.jpeg')) }}">
                                                        <i class="far fa-question-circle"></i></a>
                                                </h5>
                                                <small>
                                                    {{ __('Note: This detail will use to change header setting.') }}</small>
                                            </div>
                                            <div class="text-end">
                                                <div class="form-check form-switch form-switch-right">
                                                    <input type="hidden" name="enable_features" value="off">
                                                    @if (!empty($getStoreThemeSetting['enable_features']))
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_features" id="enable_features"
                                                            {{ $getStoreThemeSetting['enable_features'] == 'on' ? 'checked="checked"' : '' }}>
                                                    @else
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_features" id="enable_features">
                                                    @endif
                                                    <label class="form-check-label"
                                                        for="enable_features">{{ __('Enable Features') }}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row">
                                                    <hr class="">
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_features1" value="off">
                                                            @if (!empty($getStoreThemeSetting['enable_features1']))
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features1" id="enable_features1"
                                                                    {{ $getStoreThemeSetting['enable_features1'] == 'on' ? 'checked="checked"' : '' }}>
                                                            @else
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features1" id="enable_features1">
                                                            @endif
                                                            <label class="form-check-label"
                                                                for="enable_features1">{{ __('Enable Features 1') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('features_icon1', __('Features Font Icon 1'), ['class' => 'col-form-label']) }}

                                                            @php
                                                                $iconList = Storage::get('uploads/fa_icon_list/fa_5.txt');
                                                                $iconList = explode(',', $iconList);
                                                            @endphp

                                                            <select class="form-control icon-select" name="features_icon1"
                                                                id="features_icon1">
                                                                @foreach ($iconList as $icon)
                                                                    <option value="<i class='{{ $icon }}'></i>"
                                                                        {{ !empty($getStoreThemeSetting['features_icon1']) && $getStoreThemeSetting['features_icon1'] == "<i class='$icon'></i>" ? 'selected' : '' }}>
                                                                        {{ $icon }}</option>
                                                                @endforeach
                                                            </select>

                                                            {{-- {{ Form::select('product_tax[]', $x, null, ['class' => 'form-control multi-select', 'id' => 'choices-multiple1', '']) }} --}}


                                                            {{-- {{ Form::text('features_icon1', !empty($getStoreThemeSetting['features_icon1']) ? $getStoreThemeSetting['features_icon1'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Features Font Icon 1')]) }} --}}
                                                            <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2"
                                                                target="_blank">
                                                                <small>{{ __('Please click here to find font') }}</small>
                                                                ... <b
                                                                    class="text-sm font-weight-bold">{{ __('fontawesome.com') }}</b>
                                                            </a>
                                                            @error('features_icon1')
                                                                <span class="invalid-features_icon1" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Features_Setting0{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Features_Setting0{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Features_Setting0{{ $lang }}"
                                                                role="tabpanel"
                                                                aria-labelledby="Features_Setting0{{ $lang }}-tab">
                                                                <div class="row">
                                                                    @if ($theme != 'theme5')
                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_features_title1', __('Features Title 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_features_title1', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_title1'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter features Title 1')]) }}
                                                                                    @error('' . $lang . '_features_title1')
                                                                                        <span class="invalid-features_title1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_features_description1', __('Features Description 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_features_description1', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_description1'], $lang), ['class' => 'form-control', 'placeholder' => __('Features Description 1')]) }}
                                                                                    @error('' . $lang .
                                                                                        '_features_description1')
                                                                                        <span
                                                                                            class="invalid-features_description1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>


                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <hr class="">
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_features2" value="off">
                                                            @if (!empty($getStoreThemeSetting['enable_features2']))
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features2" id="enable_features2"
                                                                    {{ $getStoreThemeSetting['enable_features2'] == 'on' ? 'checked="checked"' : '' }}>
                                                            @else
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features2" id="enable_features2">
                                                            @endif
                                                            <label class="form-check-label"
                                                                for="enable_features2">{{ __('Enable Features 2') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('features_icon2', __('Features Font Icon 2'), ['class' => 'col-form-label']) }}
                                                            <select class="form-control icon-select" name="features_icon2"
                                                                id="features_icon2">
                                                                @foreach ($iconList as $icon)
                                                                    <option value="<i class='{{ $icon }}'></i>"
                                                                        {{ !empty($getStoreThemeSetting['features_icon2']) && $getStoreThemeSetting['features_icon2'] == "<i class='$icon'></i>" ? 'selected' : '' }}>
                                                                        {{ $icon }}</option>
                                                                @endforeach
                                                            </select>

                                                            {{-- {{ Form::text('features_icon2', !empty($getStoreThemeSetting['features_icon2']) ? $getStoreThemeSetting['features_icon2'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Features Font Icon 2')]) }} --}}
                                                            <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2"
                                                                target="_blank">
                                                                <small>{{ __('Please click here to find font') }}</small>
                                                                ... <b
                                                                    class="text-sm font-weight-bold">{{ __('fontawesome.com') }}</b>
                                                            </a>
                                                            @error('features_icon2')
                                                                <span class="invalid-features_icon2" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Features_Setting1{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Features_Setting1{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Features_Setting1{{ $lang }}"
                                                                role="tabpanel"
                                                                aria-labelledby="Features_Setting1{{ $lang }}-tab">
                                                                <div class="row">
                                                                    @if ($theme != 'theme5')
                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_features_title2', __('Features Title 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_features_title2', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_title2'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter features Title 2')]) }}
                                                                                    @error('' . $lang . '_features_title2')
                                                                                        <span class="invalid-features_title1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_features_description2', __('Features Description 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_features_description2', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_description2'], $lang), ['class' => 'form-control', 'placeholder' => __('Features Description 2')]) }}
                                                                                    @error('' . $lang .
                                                                                        '_features_description2')
                                                                                        <span
                                                                                            class="invalid-features_description1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>


                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    {{-- <div class="col-md-6">
                                                        <div class="form-group">
                                                            {{ Form::label('features_title2', __('Features Title 2'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('features_title2', !empty($getStoreThemeSetting['features_title2']) ? $getStoreThemeSetting['features_title2'] : '', ['class' => 'form-control', 'placeholder' => __('Enter features Title 2')]) }}
                                                            @error('features_title2')
                                                                <span class="invalid-features_title2" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('features_description2', __('Features Description 2'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('features_description2', !empty($getStoreThemeSetting['features_description2']) ? $getStoreThemeSetting['features_description2'] : '', ['class' => 'form-control', 'placeholder' => __('Features Description 2')]) }}
                                                            @error('features_description2')
                                                                <span class="invalid-features_description2" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="row">
                                                    <hr class="">
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_features3" value="off">
                                                            @if (!empty($getStoreThemeSetting['enable_features3']))
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features3" id="enable_features3"
                                                                    {{ $getStoreThemeSetting['enable_features3'] == 'on' ? 'checked="checked"' : '' }}>
                                                            @else
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features3" id="enable_features3">
                                                            @endif
                                                            <label class="form-check-label"
                                                                for="enable_features3">{{ __('Enable Features 3') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('features_icon3', __('Features Font Icon 3'), ['class' => 'col-form-label']) }}
                                                            <select class="form-control icon-select" name="features_icon3"
                                                                id="features_icon3">
                                                                @foreach ($iconList as $icon)
                                                                    <option value="<i class='{{ $icon }}'></i>"
                                                                        {{ !empty($getStoreThemeSetting['features_icon3']) && $getStoreThemeSetting['features_icon3'] == "<i class='$icon'></i>" ? 'selected' : '' }}>
                                                                        {{ $icon }}</option>
                                                                @endforeach
                                                            </select>
                                                            {{-- {{ Form::text('features_icon3', !empty($getStoreThemeSetting['features_icon3']) ? $getStoreThemeSetting['features_icon3'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Features Font Icon 3')]) }} --}}
                                                            <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2"
                                                                target="_blank">
                                                                <small>{{ __('Please click here to find font') }}</small>
                                                                ... <b
                                                                    class="text-sm font-weight-bold">{{ __('fontawesome.com') }}</b>
                                                            </a>
                                                            @error('features_icon3')
                                                                <span class="invalid-features_icon3" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Features_Setting2{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Features_Setting2{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Features_Setting2{{ $lang }}"
                                                                role="tabpanel"
                                                                aria-labelledby="Features_Setting2{{ $lang }}-tab">
                                                                <div class="row">
                                                                    @if ($theme != 'theme5')
                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_features_title3', __('Features Title 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_features_title3', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_title3'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter features Title 3')]) }}
                                                                                    @error('' . $lang . '_features_title3')
                                                                                        <span class="invalid-features_title1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_features_description3', __('Features Description 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_features_description3', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_description3'], $lang), ['class' => 'form-control', 'placeholder' => __('Features Description 3')]) }}
                                                                                    @error('' . $lang .
                                                                                        '_features_description3')
                                                                                        <span
                                                                                            class="invalid-features_description1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>


                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    {{-- <div class="col-md-6">
                                                        <div class="form-group">
                                                            {{ Form::label('features_title3', __('Features Title 3'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('features_title3', !empty($getStoreThemeSetting['features_title3']) ? $getStoreThemeSetting['features_title3'] : '', ['class' => 'form-control', 'placeholder' => __('Enter features Title 3')]) }}
                                                            @error('features_title3')
                                                                <span class="invalid-features_title3" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('features_description3', __('Features Description 3'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('features_description3', !empty($getStoreThemeSetting['features_description3']) ? $getStoreThemeSetting['features_description3'] : '', ['class' => 'form-control', 'placeholder' => __('Features Description 3')]) }}
                                                            @error('features_description3')
                                                                <span class="invalid-features_description3" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end">
                                                {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($theme != 'theme3')
                            <div class="active" id="Email_Subscriber_Setting">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Email Subscriber Setting') }} @if (!empty($getStoreThemeSetting['subscriber_img']))
                                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                                class="view-img-link popup-img-dashboard" target="_blank"
                                                                href="{{ asset(Storage::url('uploads/guide/guide2.jpeg')) }}">
                                                                <i class="far fa-question-circle"></i></a>
                                                        @endif
                                                    </h5>
                                                    <small>
                                                        {{ __('Note: This detail will use to change header setting.') }}</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_email_subscriber"
                                                            value="off">
                                                        @if (!empty($getStoreThemeSetting['enable_email_subscriber']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_email_subscriber"
                                                                id="enable_email_subscriber"
                                                                {{ $getStoreThemeSetting['enable_email_subscriber'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_email_subscriber"
                                                                id="enable_email_subscriber">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_email_subscriber">{{ __('Enable Email Subscriber') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    @if ($theme != 'theme5')
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="logo"
                                                                    class="col-form-label">{{ __('Subscriber Background Image') }}


                                                                </label>
                                                                @if (!empty($getStoreThemeSetting['subscriber_img']))
                                                                    <input type="file" name="subscriber_img"
                                                                        id="subscriber_img"
                                                                        class="form-control custom-input-file"
                                                                        value="{{ $getStoreThemeSetting['subscriber_img'] }}">
                                                                @else
                                                                    <input type="file" name="subscriber_img"
                                                                        id="subscriber_img"
                                                                        class="form-control custom-input-file"
                                                                        value="">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Email_Subscriber_Setting{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Email_Subscriber_Setting{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Email_Subscriber_Setting{{ $lang }}"
                                                                role="tabpanel"
                                                                aria-labelledby="Email_Subscriber_Setting{{ $lang }}-tab">


                                                                <div class="row">


                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_subscriber_title', __('Subscriber Title'), ['class' => 'col-form-label  ']) }}
                                                                            {{ Form::text('' . $lang . '_subscriber_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['subscriber_title'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Subscriber Title')]) }}
                                                                            @error('' . $lang . '_subscriber_title')
                                                                                <span class="invalid-subscriber_title"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            {{ Form::label('' . $lang . '_subscriber_sub_title', __('Subscriber Sub Title'), ['class' => 'col-form-label  ']) }}
                                                                            {{ Form::text('' . $lang . '_subscriber_sub_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['subscriber_sub_title'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Subscriber Sub Title')]) }}
                                                                            @error('' . $lang . '_subscriber_sub_title')
                                                                                <span class="invalid-subscriber_sub_title"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        @endforeach
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="active" id="Categories">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5>{{ __('Categories') }}
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                        class="view-img-link popup-img-dashboard" target="_blank"
                                                        href="{{ asset(Storage::url('uploads/guide/guide8.jpeg')) }}">
                                                        <i class="far fa-question-circle"></i></a>
                                                </h5>
                                                <small>
                                                    {{ __('Note : This detail will use for make explore social media.') }}</small>
                                            </div>
                                            <div class="text-end">
                                                <div class="form-check form-switch form-switch-right">
                                                    <input type="hidden" name="enable_categories" value="off">
                                                    @if (!empty($getStoreThemeSetting['enable_categories']))
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_categories" id="enable_categories"
                                                            {{ $getStoreThemeSetting['enable_categories'] == 'on' ? 'checked="checked"' : '' }}>
                                                    @else
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_categories" id="enable_categories">
                                                    @endif
                                                    <label class="form-check-label"
                                                        for="enable_categories">{{ __('Enable Categories') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <ul class="nav nav-tabs mt-3" role="tablist">
                                                    @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                    @foreach ($store_languages as $lang)
                                                        <li class="nav-item" role="presentation">
                                                            <button
                                                                class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Categories{{ $lang }}-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#Categories{{ $lang }}"
                                                                type="button" role="tab" aria-controls="home"
                                                                aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($store_languages as $lang)
                                                        <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                            id="Categories{{ $lang }}" role="tabpanel"
                                                            aria-labelledby="Categories{{ $lang }}-tab">
                                                            <div class="row">
                                                                @if ($theme != 'theme5')
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                {{ Form::label('' . $lang . '_categories', __('Categories'), ['class' => 'col-form-label']) }}
                                                                                {{ Form::text('' . $lang . '_categories', \App\Models\Utility::getTranslation($getStoreThemeSetting['categories'], $lang), ['class' => 'form-control', 'placeholder' => 'Categories']) }}
                                                                                @error('' . $lang . '_categories')
                                                                                    <span class="invalid-categories"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger">{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                {{ Form::label('' . $lang . '_categories_title', __('Categories Title'), ['class' => 'col-form-label']) }}
                                                                                {{ Form::textarea('' . $lang . '_categories_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['categories_title'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Categories Title']) }}
                                                                                @error('' . $lang . '_categories_title')
                                                                                    <span class="invalid-categories_title"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger">{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>


                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end">
                                                {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="active" id="Testimonials">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5>{{ __('Testimonials') }}
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                        class="view-img-link popup-img-dashboard" target="_blank"
                                                        href="{{ asset(Storage::url('uploads/guide/guide3.jpeg')) }}">
                                                        <i class="far fa-question-circle"></i></a>
                                                </h5>
                                                <small>
                                                    {{ __('Note : This detail will use for make explore social media.') }}</small>
                                            </div>
                                            <div class="text-end">
                                                <div class="form-check form-switch form-switch-right">
                                                    <input type="hidden" name="enable_testimonial" value="off">
                                                    @if (!empty($getStoreThemeSetting['enable_testimonial']))
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_testimonial" id="enable_testimonial"
                                                            {{ $getStoreThemeSetting['enable_testimonial'] == 'on' ? 'checked="checked"' : '' }}>
                                                    @else
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_testimonial" id="enable_testimonial">
                                                    @endif
                                                    <label class="form-check-label"
                                                        for="enable_testimonial">{{ __('Enable Testimonials') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <ul class="nav nav-tabs mt-3" role="tablist">
                                                    @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                    @foreach ($store_languages as $lang)
                                                        <li class="nav-item" role="presentation">
                                                            <button
                                                                class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Testimonials0{{ $lang }}-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#Testimonials0{{ $lang }}"
                                                                type="button" role="tab" aria-controls="home"
                                                                aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($store_languages as $lang)
                                                        <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                            id="Testimonials0{{ $lang }}" role="tabpanel"
                                                            aria-labelledby="Testimonials0{{ $lang }}-tab">
                                                            <div class="row">
                                                                @if ($theme != 'theme5')
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                {{ Form::label('' . $lang . '_testimonial_main_heading', __('Main Heading'), ['class' => 'col-form-label']) }}
                                                                                {{ Form::text('' . $lang . '_testimonial_main_heading', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_main_heading'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Main Heading']) }}
                                                                                @error('' . $lang .
                                                                                    '_testimonial_main_heading')
                                                                                    <span
                                                                                        class="invalid-testimonial_main_heading"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger">{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                {{ Form::label('' . $lang . '_testimonial_main_heading_title', __('Main Heading Title'), ['class' => 'col-form-label']) }}
                                                                                {{ Form::textarea('' . $lang . '_testimonial_main_heading_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_main_heading_title'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Main Heading Title']) }}
                                                                                @error('' . $lang .
                                                                                    '_testimonial_main_heading_title')
                                                                                    <span
                                                                                        class="invalid-testimonial_main_heading_title"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger">{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>


                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row">
                                                    <hr class="my-2">
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_testimonial1"
                                                                value="off">
                                                            @if (!empty($getStoreThemeSetting['enable_testimonial1']))
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial1" id="enable_testimonial1"
                                                                    {{ $getStoreThemeSetting['enable_testimonial1'] == 'on' ? 'checked="checked"' : '' }}>
                                                            @else
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial1" id="enable_testimonial1">
                                                            @endif
                                                            <label class="form-check-label"
                                                                for="enable_testimonial1">{{ __('Enable Testimonial 1') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="testimonial_img1"
                                                                class="col-form-label">{{ __('Image') }}

                                                            </label>
                                                            <input type="file" class="form-control custom-input-file"
                                                                name="testimonial_img1" value="" />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column">
                                                        <h4 class="mt-3">{{ __('autoGallery') }}</h4>
                                                        <div class="text-center">
                                                            <small>
                                                                {!! __('autoGallery introducing text', [
                                                                    'url' =>
                                                                        "<a class='ag-trigger' data-type='testimonial_img1' data-url='" .
                                                                        route('auto-gallery.show', ['testimonial_img|testimonial_img1']) .
                                                                        "' href='javascript:void(0)' >" .
                                                                        __('autoGallery') .
                                                                        '</a>',
                                                                ]) !!}
                                                            </small>
                                                            {{ Form::hidden('ag_testimonial_img1') }}
                                                        </div>
                                                        <a class="btn btn-sm btn-primary ag-trigger mt-2"
                                                            data-type='testimonial_img1'
                                                            data-url="{{ route('auto-gallery.show', ['testimonial_img|testimonial_img1']) }}"><i
                                                                class="fas fa-plus"></i>
                                                            {{ __('Browse') }}
                                                        </a>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Testimonials1{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Testimonials1{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Testimonials1{{ $lang }}" role="tabpanel"
                                                                aria-labelledby="Testimonials1{{ $lang }}-tab">
                                                                <div class="row">
                                                                    @if ($theme != 'theme5')
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_testimonial_name1', __('Name'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_testimonial_name1', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_name1'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Name']) }}
                                                                                    @error('' . $lang .
                                                                                        '_testimonial_name1')
                                                                                        <span
                                                                                            class="invalid-testimonial_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_testimonial_about_us1', __('About Us'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_testimonial_about_us1', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_about_us1'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'About Us']) }}
                                                                                    @error('' . $lang .
                                                                                        '_testimonial_about_us1')
                                                                                        <span
                                                                                            class="invalid-testimonial_about_us1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_testimonial_description1', __('Description'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::textarea('' . $lang . '_testimonial_description1', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_description1'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description']) }}
                                                                                    @error('' . $lang .
                                                                                        '_testimonial_description1')
                                                                                        <span
                                                                                            class="invalid-testimonial_description1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>


                                                            </div>
                                                        @endforeach
                                                    </div>


                                                    <hr class="my-2">
                                                    {{-- TESTIMONIAL 2 --}}
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_testimonial2"
                                                                value="off">
                                                            @if (!empty($getStoreThemeSetting['enable_testimonial2']))
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial2" id="enable_testimonial2"
                                                                    {{ $getStoreThemeSetting['enable_testimonial2'] == 'on' ? 'checked="checked"' : '' }}>
                                                            @else
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial2" id="enable_testimonial2">
                                                            @endif
                                                            <label class="form-check-label"
                                                                for="enable_testimonial2">{{ __('Enable Testimonial 2') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="testimonial_img2"
                                                                class="col-form-label">{{ __('Image') }}
                                                            </label>
                                                            <input type="file" class="form-control custom-input-file"
                                                                name="testimonial_img2" value="" />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column">
                                                        <h4 class="mt-3">{{ __('autoGallery') }}</h4>
                                                        <div class="text-center">
                                                            <small>
                                                                {!! __('autoGallery introducing text', [
                                                                    'url' =>
                                                                        "<a class='ag-trigger' data-type='testimonial_img2' data-url='" .
                                                                        route('auto-gallery.show', ['testimonial_img|testimonial_img2']) .
                                                                        "' href='javascript:void(0)' >" .
                                                                        __('autoGallery') .
                                                                        '</a>',
                                                                ]) !!}
                                                            </small>
                                                            {{ Form::hidden('ag_testimonial_img2') }}
                                                        </div>
                                                        <a class="btn btn-sm btn-primary ag-trigger mt-2"
                                                            data-type='testimonial_img1'
                                                            data-url="{{ route('auto-gallery.show', ['testimonial_img|testimonial_img1']) }}"><i
                                                                class="fas fa-plus"></i>
                                                            {{ __('Browse') }}
                                                        </a>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Testimonials2{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Testimonials2{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Testimonials2{{ $lang }}" role="tabpanel"
                                                                aria-labelledby="Testimonials2{{ $lang }}-tab">
                                                                <div class="row">
                                                                    @if ($theme != 'theme5')
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_testimonial_name2', __('Name'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_testimonial_name2', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_name2'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Name']) }}
                                                                                    @error('' . $lang .
                                                                                        '_testimonial_name2')
                                                                                        <span
                                                                                            class="invalid-testimonial_name2"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_testimonial_about_us2', __('About Us'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_testimonial_about_us2', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_about_us2'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'About Us']) }}
                                                                                    @error('' . $lang .
                                                                                        '_testimonial_about_us2')
                                                                                        <span
                                                                                            class="invalid-testimonial_about_us2"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_testimonial_description2', __('Description'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::textarea('' . $lang . '_testimonial_description2', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_description2'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description']) }}
                                                                                    @error('' . $lang .
                                                                                        '_testimonial_description2')
                                                                                        <span
                                                                                            class="invalid-testimonial_description2"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>


                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <hr class="my-2">
                                                    {{-- TESTIMONIAL 3 --}}
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_testimonial3"
                                                                value="off">
                                                            @if (!empty($getStoreThemeSetting['enable_testimonial3']))
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial3" id="enable_testimonial3"
                                                                    {{ $getStoreThemeSetting['enable_testimonial3'] == 'on' ? 'checked="checked"' : '' }}>
                                                            @else
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial3" id="enable_testimonial3">
                                                            @endif
                                                            <label class="form-check-label"
                                                                for="enable_testimonial3">{{ __('Enable Testimonial 3') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="testimonial_img3"
                                                                class="col-form-label">{{ __('Image') }}
                                                            </label>
                                                            <input type="file" class="form-control custom-input-file"
                                                                name="testimonial_img3" value="" />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column">
                                                        <h4 class="mt-3">{{ __('autoGallery') }}</h4>
                                                        <div class="text-center">
                                                            <small>
                                                                {!! __('autoGallery introducing text', [
                                                                    'url' =>
                                                                        "<a class='ag-trigger' data-type='testimonial_img3' data-url='" .
                                                                        route('auto-gallery.show', ['testimonial_img|testimonial_img3']) .
                                                                        "' href='javascript:void(0)' >" .
                                                                        __('autoGallery') .
                                                                        '</a>',
                                                                ]) !!}
                                                            </small>
                                                            {{ Form::hidden('ag_testimonial_img3') }}
                                                        </div>
                                                        <a class="btn btn-sm btn-primary ag-trigger mt-2"
                                                            data-type='testimonial_img1'
                                                            data-url="{{ route('auto-gallery.show', ['testimonial_img|testimonial_img1']) }}"><i
                                                                class="fas fa-plus"></i>
                                                            {{ __('Browse') }}
                                                        </a>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                        @foreach ($store_languages as $lang)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Testimonials3{{ $lang }}-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Testimonials3{{ $lang }}"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($store_languages as $lang)
                                                            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                id="Testimonials3{{ $lang }}" role="tabpanel"
                                                                aria-labelledby="Testimonials3{{ $lang }}-tab">
                                                                <div class="row">
                                                                    @if ($theme != 'theme5')
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_testimonial_name3', __('Name'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_testimonial_name3', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_name3'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Name']) }}
                                                                                    @error('' . $lang .
                                                                                        '_testimonial_name3')
                                                                                        <span
                                                                                            class="invalid-testimonial_name3"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_testimonial_about_us3', __('About Us'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_testimonial_about_us3', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_about_us3'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'About Us']) }}
                                                                                    @error('' . $lang .
                                                                                        '_testimonial_about_us3')
                                                                                        <span
                                                                                            class="invalid-testimonial_about_us3"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_testimonial_description3', __('Description'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::textarea('' . $lang . '_testimonial_description3', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_description3'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description']) }}
                                                                                    @error('' . $lang .
                                                                                        '_testimonial_description3')
                                                                                        <span
                                                                                            class="invalid-testimonial_description3"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>


                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end">
                                                {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($theme != 'theme3')
                            <div class="active" id="Brand_Logo">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Brand Logo') }}
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="{{ asset(Storage::url('uploads/guide/guide10.jpeg')) }}">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        {{ __('Note : This detail will use for make explore social media.') }}</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_brand_logo" value="off">
                                                        @if (!empty($getStoreThemeSetting['enable_brand_logo']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_brand_logo" id="enable_brand_logo"
                                                                {{ $getStoreThemeSetting['enable_brand_logo'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_brand_logo" id="enable_brand_logo">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_brand_logo">{{ __('Enable Brand Logo') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="file"
                                                                    class="col-form-label">{{ __('Brand Logo') }}</label>
                                                                <input type="file" name="file[]" id="file"
                                                                    class="form-control custom-input-file" multiple>
                                                            </div>
                                                            <div id="img-count"
                                                                class="badge badge-success rounded-pill">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card-wrapper p-3 lead-common-box">
                                                                @if (isset($getStoreThemeSetting['brand_logo']) && $getStoreThemeSetting['brand_logo'] != null)
                                                                    @foreach (explode(',', $getStoreThemeSetting['brand_logo']) as $file)
                                                                        <div class="card mb-3 border shadow-none product_Image"
                                                                            data-value="{{ $file }}">
                                                                            <div class="px-3 py-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col ml-n2">
                                                                                        <p
                                                                                            class="card-text small text-muted">
                                                                                            {{ Form::hidden('brand_logo_old[]', $file) }}
                                                                                            <img class="rounded"
                                                                                                src=" {{ asset(Storage::url('uploads/store_logo/' . $file)) }}"
                                                                                                width="70px"
                                                                                                alt="Image placeholder"
                                                                                                data-dz-thumbnail>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto actions">
                                                                                        <a class="action-item"
                                                                                            href=" {{ asset(Storage::url('uploads/store_logo/' . $file)) }}"
                                                                                            download=""
                                                                                            data-toggle="tooltip"
                                                                                            data-original-title="{{ __('Download') }}">
                                                                                            <i
                                                                                                class="fas fa-download"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-auto actions">
                                                                                        <a name="deleteRecord"
                                                                                            class="action-item deleteRecord"
                                                                                            data-name="{{ $file }}">
                                                                                            <i class="fas fa-trash"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($theme != 'theme3' && $theme != 'theme4')
                            <div class="active" id="Footer_1">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Footer 1') }}
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="{{ asset(Storage::url('uploads/guide/guide9.jpeg')) }}">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        {{ __('Note : This detail will use for make explore social media.') }}</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_footer_note"
                                                            value="off">
                                                        @if (!empty($getStoreThemeSetting['enable_footer_note']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_footer_note" id="enable_footer_note"
                                                                {{ $getStoreThemeSetting['enable_footer_note'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_footer_note" id="enable_footer_note">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_footer_note">{{ __('Enable Footer Note') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            {{ Form::label('footer_logo', __('Footer Logo'), ['class' => 'col-form-label']) }}
                                                            <input type="file" name="footer_logo" id="footer_logo"
                                                                class="form-control custom-input-file">
                                                            @error('footer_logo')
                                                                <span class="invalid-footer_logo" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        {{-- @if ($theme == 'theme2')
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('footer_number', __('Footer Number'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('footer_number', !empty($getStoreThemeSetting['footer_number']) ? $getStoreThemeSetting['footer_number'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Footer Number']) }}
                                                                </div>
                                                                @error('footer_number')
                                                                    <span class="invalid-footer_number" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        @endif --}}
                                                        <div class="col-6 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link1"
                                                                    value="off">
                                                                @if (!empty($getStoreThemeSetting['enable_quick_link1']))
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link1"
                                                                        id="enable_quick_link1"
                                                                        {{ $getStoreThemeSetting['enable_quick_link1'] == 'on' ? 'checked="checked"' : '' }}>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link1"
                                                                        id="enable_quick_link1">
                                                                @endif
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link1">{{ __('Enable Quick Link 1') }}</label>
                                                            </div>
                                                        </div>

                                                        {{-- @php
                                                            $footer_type_1 = isset($getStoreThemeSetting['footer_type_1']) ? $getStoreThemeSetting['footer_type_1'] : null;
                                                        @endphp
                                                        <div class="col-12">
                                                            {{ Form::label('footer_type_1', __('Type'), ['class' => 'col-form-label']) }}
                                                            {{ Form::select('footer_type_1', App\Models\Utility::getFooterTypes(), $footer_type_1, ['class' => 'form-control']) }}
                                                            <small class="text-xs">
                                                                {{ __('You have the option to choose from a set of standard footer links which consist of custom pages, and you can also add your own footer name and URL as per your preference.') }}
                                                            </small>
                                                        </div> --}}

                                                        <ul class="nav nav-tabs mt-3" role="tablist">
                                                            @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                            @foreach ($store_languages as $lang)
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                        id="Personalized_Footer_1{{ $lang }}-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Personalized_Footer_1{{ $lang }}"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="tab-content">
                                                            @foreach ($store_languages as $lang)
                                                                <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Personalized_Footer_1{{ $lang }}"
                                                                    role="tabpanel"
                                                                    aria-labelledby="Personalized_Footer_1{{ $lang }}-tab">
                                                                    <div class="row">
                                                                        @if ($theme != 'theme5')
                                                                            {{-- <div class="row"> --}}
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_header_name1', __('Footer Quick Link Header Name 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_header_name1', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_header_name1'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Footer Quick Link Header Name 1']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_header_name1')
                                                                                        <span
                                                                                            class="invalid-quick_link_header_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            {{-- <div
                                                                                class="row personalized-footer-type-1 {{ $footer_type_1 == 1 ? 'hide' : '' }}">

                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        {{ Form::label('' . $lang . '_quick_link_name1', __('Quick Link Name 1'), ['class' => 'col-form-label']) }}
                                                                                        {{ Form::text('' . $lang . '_quick_link_name1', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name1'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 1']) }}
                                                                                        @error('' . $lang .
                                                                                            '_quick_link_name1')
                                                                                            <span
                                                                                                class="invalid-quick_link_name1"
                                                                                                role="alert">
                                                                                                <strong
                                                                                                    class="text-danger">{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        {{ Form::label('' . $lang . '_quick_link_name12', __('Quick Link Name 2'), ['class' => 'col-form-label']) }}
                                                                                        {{ Form::text('' . $lang . '_quick_link_name12', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name12'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                        @error('' . $lang .
                                                                                            '_quick_link_name1')
                                                                                            <span
                                                                                                class="invalid-quick_link_name1"
                                                                                                role="alert">
                                                                                                <strong
                                                                                                    class="text-danger">{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        {{ Form::label('' . $lang . '_quick_link_name13', __('Quick Link Name 3'), ['class' => 'col-form-label']) }}
                                                                                        {{ Form::text('' . $lang . '_quick_link_name13', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name13'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                        @error('' . $lang .
                                                                                            '_quick_link_name1')
                                                                                            <span
                                                                                                class="invalid-quick_link_name1"
                                                                                                role="alert">
                                                                                                <strong
                                                                                                    class="text-danger">{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        {{ Form::label('' . $lang . '_quick_link_name14', __('Quick Link Name 4'), ['class' => 'col-form-label']) }}
                                                                                        {{ Form::text('' . $lang . '_quick_link_name14', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name14'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                        @error('' . $lang .
                                                                                            '_quick_link_name1')
                                                                                            <span
                                                                                                class="invalid-quick_link_name1"
                                                                                                role="alert">
                                                                                                <strong
                                                                                                    class="text-danger">{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        {{-- <div
                                                            class="row personalized-footer-type-1 {{ $footer_type_1 == 1 ? 'hide' : '' }}">

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url1', __('Quick Link Url 1'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url1', !empty($getStoreThemeSetting['quick_link_url1']) ? $getStoreThemeSetting['quick_link_url1'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 1']) }}
                                                                    @error('quick_link_url1')
                                                                        <span class="invalid-quick_link_url1"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url12', __('Quick Link Url 2'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url12', !empty($getStoreThemeSetting['quick_link_url12']) ? $getStoreThemeSetting['quick_link_url12'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 2']) }}
                                                                    @error('quick_link_url1')
                                                                        <span class="invalid-quick_link_url1"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url13', __('Quick Link Url 3'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url13', !empty($getStoreThemeSetting['quick_link_url13']) ? $getStoreThemeSetting['quick_link_url13'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 2']) }}
                                                                    @error('quick_link_url1')
                                                                        <span class="invalid-quick_link_url1"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url14', __('Quick Link Url 4'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url14', !empty($getStoreThemeSetting['quick_link_url14']) ? $getStoreThemeSetting['quick_link_url14'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 2']) }}
                                                                    @error('quick_link_url1')
                                                                        <span class="invalid-quick_link_url1"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="row standard-footer-type-1 {{ $footer_type_1 == 1 ? '' : 'hide' }}">

                                                            @if (!empty($page_slug_urls))
                                                                <select name="" id="drpdwn-page-slug-urls"
                                                                    class="hide">
                                                                    @foreach ($page_slug_urls as $k => $page_slug_url)
                                                                        @if ($page_slug_url->enable_page_header == 'on')
                                                                            <option value="{{ $page_slug_url->id }}">
                                                                                {{ $page_slug_url->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            @endif

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_1', __('Standard Links', ['number' => 1]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_1', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_2', __('Standard Links', ['number' => 2]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_2', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_3', __('Standard Links', ['number' => 3]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_3', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_4', __('Standard Links', ['number' => 4]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_4', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                        </div> --}}


                                                        <hr>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link2"
                                                                    value="off">
                                                                @if (!empty($getStoreThemeSetting['enable_quick_link2']))
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link2"
                                                                        id="enable_quick_link2"
                                                                        {{ $getStoreThemeSetting['enable_quick_link2'] == 'on' ? 'checked="checked"' : '' }}>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link2"
                                                                        id="enable_quick_link2">
                                                                @endif
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link2">{{ __('Enable Quick Link 2') }}</label>
                                                            </div>
                                                        </div>

                                                        {{-- @php
                                                            $footer_type_2 = isset($getStoreThemeSetting['footer_type_2']) ? $getStoreThemeSetting['footer_type_2'] : null;
                                                        @endphp --}}

                                                        {{-- 
                                                        <div class="col-12">
                                                            {{ Form::label('footer_type_2', __('Type'), ['class' => 'col-form-label']) }}
                                                            {{ Form::select('footer_type_2', App\Models\Utility::getFooterTypes(), $footer_type_2, ['class' => 'form-control']) }}
                                                            <small class="text-xs">
                                                                {{ __('You have the option to choose from a set of standard footer links which consist of custom pages, and you can also add your own footer name and URL as per your preference.') }}
                                                            </small>
                                                        </div> --}}

                                                        <ul class="nav nav-tabs mt-3" role="tablist">
                                                            @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                            @foreach ($store_languages as $lang)
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                        id="Footer_12{{ $lang }}-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Footer_12{{ $lang }}"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="tab-content">
                                                            @foreach ($store_languages as $lang)
                                                                <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Footer_12{{ $lang }}" role="tabpanel"
                                                                    aria-labelledby="Footer_12{{ $lang }}-tab">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                {{ Form::label('' . $lang . '_quick_link_header_name2', __('Footer Quick Link Header Name 2'), ['class' => 'col-form-label']) }}
                                                                                {{ Form::text('' . $lang . '_quick_link_header_name2', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_header_name2'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Footer Quick Link Header Name 2']) }}
                                                                                @error('' . $lang .
                                                                                    '_quick_link_header_name2')
                                                                                    <span
                                                                                        class="invalid-quick_link_header_name1"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger">{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div
                                                                            class="row personalized-footer-type-2 {{ $footer_type_2 == 1 ? 'hide' : '' }}">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name21', __('Quick Link Name 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name21', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name21'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 1']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name21')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name22', __('Quick Link Name 2'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name22', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name22'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name22')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name23', __('Quick Link Name 3'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name23', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name23'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name23')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name24', __('Quick Link Name 4'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name24', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name24'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name24')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                    </div>


                                                                </div>
                                                            @endforeach
                                                        </div>



                                                        {{-- <div
                                                            class="row personalized-footer-type-2 {{ $footer_type_2 == 1 ? 'hide' : '' }}">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url21', __('Quick Link Url 1'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url21', !empty($getStoreThemeSetting['quick_link_url21']) ? $getStoreThemeSetting['quick_link_url21'] : '', ['class' => 'form-control', 'placeholder' => 'Quick Link Url 1']) }}
                                                                    @error('quick_link_url2')
                                                                        <span class="invalid-quick_link_url2"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url22', __('Quick Link Url 2'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url22', !empty($getStoreThemeSetting['quick_link_url22']) ? $getStoreThemeSetting['quick_link_url22'] : '', ['class' => 'form-control', 'placeholder' => 'Quick Link Url 2']) }}
                                                                    @error('quick_link_url2')
                                                                        <span class="invalid-quick_link_url2"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url23', __('Quick Link Url 3'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url23', !empty($getStoreThemeSetting['quick_link_url23']) ? $getStoreThemeSetting['quick_link_url23'] : '', ['class' => 'form-control', 'placeholder' => 'Quick Link Url 3']) }}
                                                                    @error('quick_link_url2')
                                                                        <span class="invalid-quick_link_url2"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url24', __('Quick Link Url 4'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url24', !empty($getStoreThemeSetting['quick_link_url24']) ? $getStoreThemeSetting['quick_link_url24'] : '', ['class' => 'form-control', 'placeholder' => 'Quick Link Url 4']) }}
                                                                    @error('quick_link_url2')
                                                                        <span class="invalid-quick_link_url2"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> --}}




                                                        {{-- <div
                                                            class="row standard-footer-type-2 {{ $footer_type_1 == 1 ? '' : 'hide' }}">

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_21', __('Standard Links', ['number' => 1]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_21', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_22', __('Standard Links', ['number' => 2]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_22', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_23', __('Standard Links', ['number' => 3]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_23', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_24', __('Standard Links', ['number' => 4]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_24', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                        </div> --}}



                                                        <hr>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link3"
                                                                    value="off">
                                                                @if (!empty($getStoreThemeSetting['enable_quick_link3']))
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link3"
                                                                        id="enable_quick_link3"
                                                                        {{ $getStoreThemeSetting['enable_quick_link3'] == 'on' ? 'checked="checked"' : '' }}>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link3"
                                                                        id="enable_quick_link3">
                                                                @endif
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link3">{{ __('Enable Quick Link 3') }}</label>
                                                            </div>
                                                        </div>

                                                        {{-- @php
                                                            $footer_type_3 = isset($getStoreThemeSetting['footer_type_3']) ? $getStoreThemeSetting['footer_type_3'] : null;
                                                        @endphp
                                                        <div class="col-12">
                                                            {{ Form::label('footer_type_3', __('Type'), ['class' => 'col-form-label']) }}
                                                            {{ Form::select('footer_type_3', App\Models\Utility::getFooterTypes(), $footer_type_3, ['class' => 'form-control']) }}
                                                            <small class="text-xs">
                                                                {{ __('You have the option to choose from a set of standard footer links which consist of custom pages, and you can also add your own footer name and URL as per your preference.') }}
                                                            </small>
                                                        </div> --}}

                                                        <ul class="nav nav-tabs mt-3" role="tablist">
                                                            @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                            @foreach ($store_languages as $lang)
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                        id="Footer_13{{ $lang }}-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Footer_13{{ $lang }}"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="tab-content">
                                                            @foreach ($store_languages as $lang)
                                                                <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Footer_13{{ $lang }}" role="tabpanel"
                                                                    aria-labelledby="Footer_13{{ $lang }}-tab">
                                                                    <div class="row">
                                                                        {{-- @if ($theme != 'theme5')
                                                                            <div class="row"> --}}
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                {{ Form::label('' . $lang . '_quick_link_header_name3', __('Footer Quick Link Header Name 3'), ['class' => 'col-form-label']) }}
                                                                                {{ Form::text('' . $lang . '_quick_link_header_name3', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_header_name3'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Footer Quick Link Header Name 3']) }}
                                                                                @error('' . $lang .
                                                                                    '_quick_link_header_name3')
                                                                                    <span
                                                                                        class="invalid-quick_link_header_name1"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger">{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div
                                                                            class="row personalized-footer-type-3 {{ $footer_type_3 == 1 ? 'hide' : '' }}">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name31', __('Quick Link Name 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name31', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name31'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 1']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name31')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name32', __('Quick Link Name 2'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name32', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name32'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name32')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name33', __('Quick Link Name 3'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name33', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name33'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name33')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name34', __('Quick Link Name 4'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name34', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name34'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name34')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                        {{-- </div>
                                                                        @endif --}}
                                                                    </div>


                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        {{-- <div
                                                            class="row personalized-footer-type-3 {{ $footer_type_3 == 1 ? 'hide' : '' }}">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url31', __('Quick Link Url 1'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url31', !empty($getStoreThemeSetting['quick_link_url31']) ? $getStoreThemeSetting['quick_link_url31'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 1']) }}
                                                                    @error('quick_link_url3')
                                                                        <span class="invalid-quick_link_url3"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url32', __('Quick Link Name 2'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url32', !empty($getStoreThemeSetting['quick_link_url32']) ? $getStoreThemeSetting['quick_link_url32'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                    @error('quick_link_url3')
                                                                        <span class="invalid-quick_link_url3"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url33', __('Quick Link Url 3'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url33', !empty($getStoreThemeSetting['quick_link_url33']) ? $getStoreThemeSetting['quick_link_url33'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 3']) }}
                                                                    @error('quick_link_url3')
                                                                        <span class="invalid-quick_link_url3"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url34', __('Quick Link Url 4'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url34', !empty($getStoreThemeSetting['quick_link_url34']) ? $getStoreThemeSetting['quick_link_url34'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 4']) }}
                                                                    @error('quick_link_url3')
                                                                        <span class="invalid-quick_link_url3"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="row standard-footer-type-3 {{ $footer_type_1 == 1 ? '' : 'hide' }}">

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_31', __('Standard Links', ['number' => 1]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_31', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_32', __('Standard Links', ['number' => 2]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_32', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_33', __('Standard Links', ['number' => 3]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_33', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_34', __('Standard Links', ['number' => 4]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_34', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        <hr>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link4"
                                                                    value="off">
                                                                @if (!empty($getStoreThemeSetting['enable_quick_link4']))
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link4"
                                                                        id="enable_quick_link4"
                                                                        {{ $getStoreThemeSetting['enable_quick_link4'] == 'on' ? 'checked="checked"' : '' }}>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link4"
                                                                        id="enable_quick_link4">
                                                                @endif
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link4">{{ __('Enable Quick Link 4') }}</label>
                                                            </div>
                                                        </div>

                                                        {{-- @php
                                                            $footer_type_4 = isset($getStoreThemeSetting['footer_type_4']) ? $getStoreThemeSetting['footer_type_4'] : null;
                                                        @endphp
                                                        <div class="col-12">
                                                            {{ Form::label('footer_type_4', __('Type'), ['class' => 'col-form-label']) }}
                                                            {{ Form::select('footer_type_4', App\Models\Utility::getFooterTypes(), $footer_type_4, ['class' => 'form-control']) }}
                                                            <small class="text-xs">
                                                                {{ __('You have the option to choose from a set of standard footer links which consist of custom pages, and you can also add your own footer name and URL as per your preference.') }}
                                                            </small>
                                                        </div> --}}

                                                        <ul class="nav nav-tabs mt-3" role="tablist">
                                                            @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
                                                            @foreach ($store_languages as $lang)
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                        id="Footer_14{{ $lang }}-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Footer_14{{ $lang }}"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="tab-content">
                                                            @foreach ($store_languages as $lang)
                                                                <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                                                    id="Footer_14{{ $lang }}" role="tabpanel"
                                                                    aria-labelledby="Footer_14{{ $lang }}-tab">
                                                                    <div class="row">
                                                                        {{-- @if ($theme != 'theme5')
                                                                            <div class="row"> --}}
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                {{ Form::label('' . $lang . '_quick_link_header_name4', __('Footer Quick Link Header Name 4'), ['class' => 'col-form-label']) }}
                                                                                {{ Form::text('' . $lang . '_quick_link_header_name4', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_header_name4'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Footer Quick Link Header Name 4']) }}
                                                                                @error('' . $lang .
                                                                                    '_quick_link_header_name4')
                                                                                    <span
                                                                                        class="invalid-quick_link_header_name4"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger">{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div
                                                                            class="row personalized-footer-type-4 {{ $footer_type_4 == 1 ? 'hide' : '' }}">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name41', __('Quick Link Name 1'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name41', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name41'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 1']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name41')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name42', __('Quick Link Name 2'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name42', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name42'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name42')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name43', __('Quick Link Name 3'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name43', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name43'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name43')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('' . $lang . '_quick_link_name44', __('Quick Link Name 4'), ['class' => 'col-form-label']) }}
                                                                                    {{ Form::text('' . $lang . '_quick_link_name44', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_name44'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                                    @error('' . $lang .
                                                                                        '_quick_link_name44')
                                                                                        <span class="invalid-quick_link_name1"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                    </div>


                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-12 bg-light rounded">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3 mt-3">
                                                                <h4>{{ __('Selection Area') }}</h4>
                                                                <div>
                                                                    <ul class="list-group menu-list" id="sortable-list-v2" data-name="selection_footer_menu[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            {{ __('Drop Here') }}
                                                                        </li>

                                                                        @foreach (Utility::defaultMenuV2($getStoreThemeSetting, $store, $plan,true,true) as $menu_title)
                                                                        @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                            @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                            @if (isset($page_slug_url->name))
                                                                                <li class="list-group-item"
                                                                                    data-name="{{ $page_slug_url->id }}">
                                                                                    <i
                                                                                        class="fas fa-arrows-alt"></i>
                                                                                    {{ ucfirst($page_slug_url->name) }}
                                                                                </li>
                                                                            @endif
                                                                        @else
                                                                            <li class="list-group-item"
                                                                                data-name="{{ $menu_title }}">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                {{ __($menu_title) }}
                                                                            </li>
                                                                        @endif
                                                                        @endforeach
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        {{-- @if (isset($getStoreThemeSetting['selection_footer_menu']))
                                                                        @if ($getStoreThemeSetting['selection_footer_menu'])
                                                                            @foreach (json_decode($getStoreThemeSetting['selection_footer_menu']) as $menu_title)
                                                                                @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                                    @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                                    @if (isset($page_slug_url->name))
                                                                                        <li class="list-group-item"
                                                                                            data-name="{{ $page_slug_url->id }}">
                                                                                            <i
                                                                                                class="fas fa-arrows-alt"></i>
                                                                                            {{ ucfirst($page_slug_url->name) }}
                                                                                        </li>
                                                                                    @endif
                                                                                @else
                                                                                    <li class="list-group-item"
                                                                                        data-name="{{ $menu_title }}">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        {{ __($menu_title) }}
                                                                                    </li>
                                                                                @endif
                                                                                @endforeach
                                                                                @endif
                                                                        @else
                                                                            <li class="list-group-item"
                                                                                data-name="Blog">
                                                                                <i class="fas fa-arrows-alt"></i>
                                                                                {{ __('Blog') }}
                                                                            </li>

                                                                            <li class="list-group-item"
                                                                                data-name="Contact Us">
                                                                                <i class="fas fa-arrows-alt"></i>
                                                                                {{ __('Contact Us') }}
                                                                            </li>

                                                                            <li class="list-group-item"
                                                                                data-name="Gallery">
                                                                                <i class="fas fa-arrows-alt"></i>
                                                                                {{ __('Gallery') }}
                                                                            </li>

                                                                            <li class="list-group-item"
                                                                                data-name="Career With Us">
                                                                                <i class="fas fa-arrows-alt"></i>
                                                                                {{ __('Career With Us') }}
                                                                            </li>

                                                                            @foreach ($page_slug_urls as $k => $page_slug_url)
                                                                                @if ($page_slug_url->enable_page_header == 'on')
                                                                                    <li class="list-group-item"
                                                                                        data-name="{{ $page_slug_url->id }}">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        {{ ucfirst($page_slug_url->name) }}
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif --}}
                                                                       
                                                                    </ul>
                                                                </div>
                                                                <div id="sorted-info-v2">
                                                                    {{-- here goes the updated nav menu data --}}
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center flex-column">
                                                                <small>
                                                                    {{__('Please utilize the selection area to drag and drop links into each column within the footer area.')}}
                                                                </small>
                                                                <i class="fas fa-share fa-2x" style="rotate: 95deg;"></i>

                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6>{{ __('Footer Area', ['number' => 1]) }}</h6>
                                                               
                                                                <div class="menu">
                                                                    <ul class="list-group menu-list"
                                                                        id="sortable-footer-1" data-name="footer_menu_1[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            <div class="ms-2 me-auto">
                                                                              <div class="fw-bold">
                                                                                {{ Utility::getTranslation($getStoreThemeSetting['quick_link_header_name1'], $lang) }}
                                                                            </div>
                                                                            {{ __('Drop Here') }}
                                                                            </div>
                                                                          </li>
                                                                        @if (isset($getStoreThemeSetting['footer_menu_1']) && $getStoreThemeSetting['footer_menu_1'])
                                                                            @foreach (json_decode($getStoreThemeSetting['footer_menu_1']) as $menu_title)
                                                                                @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                                    @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                                    @if (isset($page_slug_url->name))
                                                                                        <li class="list-group-item"
                                                                                            data-name="{{ $page_slug_url->id }}">
                                                                                            <i
                                                                                                class="fas fa-arrows-alt"></i>
                                                                                            {{ ucfirst($page_slug_url->name) }}
                                                                                        </li>
                                                                                    @endif
                                                                                @else
                                                                                    <li class="list-group-item"
                                                                                        data-name="{{ $menu_title }}">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        {{ __($menu_title) }}
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6>{{ __('Footer Area', ['number' => 2]) }}</h6>
                                                      
                                                                <div class="menu">
                                                                    <ul class="list-group menu-list"
                                                                        id="sortable-footer-2" data-name="footer_menu_2[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            <div class="ms-2 me-auto">
                                                                              <div class="fw-bold">
                                                                                {{ Utility::getTranslation($getStoreThemeSetting['quick_link_header_name2'], $lang) }}
                                                                            </div>
                                                                            {{ __('Drop Here') }}
                                                                            </div>
                                                                          </li>
                                                                       
                                                                        @if (isset($getStoreThemeSetting['footer_menu_2']) && $getStoreThemeSetting['footer_menu_2'])
                                                                            @foreach (json_decode($getStoreThemeSetting['footer_menu_2']) as $menu_title)
                                                                                @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                                    @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                                    @if (isset($page_slug_url->name))
                                                                                        <li class="list-group-item"
                                                                                            data-name="{{ $page_slug_url->id }}">
                                                                                            <i
                                                                                                class="fas fa-arrows-alt"></i>
                                                                                            {{ ucfirst($page_slug_url->name) }}
                                                                                        </li>
                                                                                    @endif
                                                                                @else
                                                                                    <li class="list-group-item"
                                                                                        data-name="{{ $menu_title }}">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        {{ __($menu_title) }}
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6>{{ __('Footer Area', ['number' => 3]) }}</h6>
                                                                <div class="menu">
                                                                    <ul class="list-group menu-list"
                                                                        id="sortable-footer-3" data-name="footer_menu_3[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            <div class="ms-2 me-auto">
                                                                              <div class="fw-bold">
                                                                                {{ Utility::getTranslation($getStoreThemeSetting['quick_link_header_name3'], $lang) }}
                                                                            </div>
                                                                            {{ __('Drop Here') }}
                                                                            </div>
                                                                          </li>
                                                                        @if (isset($getStoreThemeSetting['footer_menu_3']) && $getStoreThemeSetting['footer_menu_3'])
                                                                            @foreach (json_decode($getStoreThemeSetting['footer_menu_3']) as $menu_title)
                                                                                @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                                    @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                                    @if (isset($page_slug_url->name))
                                                                                        <li class="list-group-item"
                                                                                            data-name="{{ $page_slug_url->id }}">
                                                                                            <i
                                                                                                class="fas fa-arrows-alt"></i>
                                                                                            {{ ucfirst($page_slug_url->name) }}
                                                                                        </li>
                                                                                    @endif
                                                                                @else
                                                                                    <li class="list-group-item"
                                                                                        data-name="{{ $menu_title }}">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        {{ __($menu_title) }}
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6>{{ __('Footer Area', ['number' => 4]) }}</h6>
                                                                
                                                                <div class="menu">
                                                                    <ul class="list-group menu-list"
                                                                        id="sortable-footer-4" data-name="footer_menu_4[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            <div class="ms-2 me-auto">
                                                                              <div class="fw-bold">
                                                                                {{ Utility::getTranslation($getStoreThemeSetting['quick_link_header_name4'], $lang) }}
                                                                            </div>
                                                                            {{ __('Drop Here') }}
                                                                            </div>
                                                                          </li>
                                                                        @if (isset($getStoreThemeSetting['footer_menu_4']) && $getStoreThemeSetting['footer_menu_4'])
                                                                            @foreach (json_decode($getStoreThemeSetting['footer_menu_4']) as $menu_title)
                                                                                @if (is_numeric($menu_title) && floor($menu_title) == $menu_title)
                                                                                    @php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); @endphp
                                                                                    @if (isset($page_slug_url->name))
                                                                                        <li class="list-group-item"
                                                                                            data-name="{{ $page_slug_url->id }}">
                                                                                            <i
                                                                                                class="fas fa-arrows-alt"></i>
                                                                                            {{ ucfirst($page_slug_url->name) }}
                                                                                        </li>
                                                                                    @endif
                                                                                @else
                                                                                    <li class="list-group-item"
                                                                                        data-name="{{ $menu_title }}">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        {{ __($menu_title) }}
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        {{-- <div
                                                            class="row personalized-footer-type-4 {{ $footer_type_4 == 1 ? 'hide' : '' }}">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url41', __('Quick Link Url 1'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url41', !empty($getStoreThemeSetting['quick_link_url41']) ? $getStoreThemeSetting['quick_link_url41'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 1']) }}
                                                                    @error('quick_link_url4')
                                                                        <span class="invalid-quick_link_url4"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url42', __('Quick Link Name 2'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url42', !empty($getStoreThemeSetting['quick_link_url42']) ? $getStoreThemeSetting['quick_link_url42'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                    @error('quick_link_url4')
                                                                        <span class="invalid-quick_link_url4"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url43', __('Quick Link Url 3'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url43', !empty($getStoreThemeSetting['quick_link_url43']) ? $getStoreThemeSetting['quick_link_url43'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 3']) }}
                                                                    @error('quick_link_url4')
                                                                        <span class="invalid-quick_link_url4"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('quick_link_url44', __('Quick Link Url 4'), ['class' => 'col-form-label']) }}
                                                                    {{ Form::text('quick_link_url44', !empty($getStoreThemeSetting['quick_link_url44']) ? $getStoreThemeSetting['quick_link_url44'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 4']) }}
                                                                    @error('quick_link_url4')
                                                                        <span class="invalid-quick_link_url4"
                                                                            role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        {{-- <div
                                                            class="row standard-footer-type-4 {{ $footer_type_1 == 1 ? '' : 'hide' }}">

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_41', __('Standard Links', ['number' => 1]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_41', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_42', __('Standard Links', ['number' => 2]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_42', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_43', __('Standard Links', ['number' => 3]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_43', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    {{ Form::label('standard_link_44', __('Standard Links', ['number' => 4]), ['class' => 'col-form-label']) }}
                                                                    {{ Form::select('standard_link_44', [], null, ['class' => 'form-control drpdwn-page-slug-urls']) }}
                                                                </div>
                                                            </div>
                                                        </div> --}}





















                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- @if ($theme == 'theme3' || $theme == 'theme4')
                            <div class="active" id="Footer_1">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ __('Footer 1') }}</h5>
                                                    <small>
                                                        {{ __('Note : This detail will use for make explore social media.') }}</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_footer_note"
                                                            value="off">
                                                        @if (!empty($getStoreThemeSetting['enable_footer_note']))
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_footer_note" id="enable_footer_note"
                                                                {{ $getStoreThemeSetting['enable_footer_note'] == 'on' ? 'checked="checked"' : '' }}>
                                                        @else
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_footer_note" id="enable_footer_note">
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="enable_footer_note">{{ __('Enable Footer Note') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                {{ Form::label('footer_logo', __('Footer Logo'), ['class' => 'form-control-label']) }}
                                                                <input type="file" name="footer_logo"
                                                                    id="footer_logo"
                                                                    class="form-control custom-input-file">
                                                                @error('footer_logo')
                                                                    <span class="invalid-footer_logo" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link1"
                                                                    value="off">
                                                                @if (!empty($getStoreThemeSetting['enable_quick_link1']))
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link1"
                                                                        id="enable_quick_link1"
                                                                        {{ $getStoreThemeSetting['enable_quick_link1'] == 'on' ? 'checked="checked"' : '' }}>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link1"
                                                                        id="enable_quick_link1">
                                                                @endif
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link1">{{ __('Enable Quick Link 1') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                {{ Form::label('quick_link_name1', __('Quick Link Name 1'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('quick_link_name1', !empty($getStoreThemeSetting['quick_link_name1']) ? $getStoreThemeSetting['quick_link_name1'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 1']) }}
                                                                @error('quick_link_name1')
                                                                    <span class="invalid-quick_link_name1" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                {{ Form::label('quick_link_url1', __('Quick Link Url 1'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('quick_link_url1', !empty($getStoreThemeSetting['quick_link_url1']) ? $getStoreThemeSetting['quick_link_url1'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 1']) }}
                                                                @error('quick_link_url1')
                                                                    <span class="invalid-quick_link_url1" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link2"
                                                                    value="off">
                                                                @if (!empty($getStoreThemeSetting['enable_quick_link2']))
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link2"
                                                                        id="enable_quick_link2"
                                                                        {{ $getStoreThemeSetting['enable_quick_link2'] == 'on' ? 'checked="checked"' : '' }}>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link2"
                                                                        id="enable_quick_link2">
                                                                @endif
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link2">{{ __('Enable Quick Link 2') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                {{ Form::label('quick_link_name21', __('Quick Link Name 2'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('quick_link_name21', !empty($getStoreThemeSetting['quick_link_name21']) ? $getStoreThemeSetting['quick_link_name21'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 2']) }}
                                                                @error('quick_link_name2')
                                                                    <span class="invalid-footer_link_name" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                {{ Form::label('quick_link_url21', __('Quick Link Url 2'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('quick_link_url21', !empty($getStoreThemeSetting['quick_link_url21']) ? $getStoreThemeSetting['quick_link_url21'] : '', ['class' => 'form-control', 'placeholder' => 'Quick Link Url 2']) }}
                                                                @error('quick_link_url2')
                                                                    <span class="invalid-quick_link_url2" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link3"
                                                                    value="off">
                                                                @if (!empty($getStoreThemeSetting['enable_quick_link3']))
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link3"
                                                                        id="enable_quick_link3"
                                                                        {{ $getStoreThemeSetting['enable_quick_link3'] == 'on' ? 'checked="checked"' : '' }}>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link3"
                                                                        id="enable_quick_link3">
                                                                @endif
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link3">{{ __('Enable Quick Link 3') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                {{ Form::label('quick_link_name31', __('Quick Link Name 3'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('quick_link_name31', !empty($getStoreThemeSetting['quick_link_name31']) ? $getStoreThemeSetting['quick_link_name31'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 3']) }}
                                                                @error('quick_link_name3')
                                                                    <span class="invalid-quick_link_name3" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                {{ Form::label('quick_link_url31', __('Quick Link Url 3'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('quick_link_url31', !empty($getStoreThemeSetting['quick_link_url31']) ? $getStoreThemeSetting['quick_link_url31'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 3']) }}
                                                                @error('quick_link_url3')
                                                                    <span class="invalid-quick_link_url3" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link4"
                                                                    value="off">
                                                                @if (!empty($getStoreThemeSetting['enable_quick_link4']))
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link4"
                                                                        id="enable_quick_link4"
                                                                        {{ $getStoreThemeSetting['enable_quick_link4'] == 'on' ? 'checked="checked"' : '' }}>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link4"
                                                                        id="enable_quick_link4">
                                                                @endif
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link4">{{ __('Enable Quick Link 4') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                {{ Form::label('quick_link_name41', __('Quick Link Name 4'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('quick_link_name41', !empty($getStoreThemeSetting['quick_link_name41']) ? $getStoreThemeSetting['quick_link_name41'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Name 4']) }}
                                                                @error('quick_link_name4')
                                                                    <span class="invalid-quick_link_name4" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                {{ Form::label('quick_link_url41', __('Quick Link Url 4'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('quick_link_url41', !empty($getStoreThemeSetting['quick_link_url41']) ? $getStoreThemeSetting['quick_link_url41'] : '', ['class' => 'form-control', 'placeholder' => 'Enter Quick Link Url 4']) }}
                                                                @error('quick_link_url4')
                                                                    <span class="invalid-quick_link_url4" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif --}}

                        <div class="active" id="Footer_2">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5>{{ __('Social Media & Copyright') }}
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('View Image') }}"
                                                        class="view-img-link popup-img-dashboard" target="_blank"
                                                        href="{{ asset(Storage::url('uploads/guide/guide9.jpeg')) }}">
                                                        <i class="far fa-question-circle"></i></a>
                                                </h5>
                                                <small>
                                                    {{ __('Note : This detail will use for make explore social media.') }}</small>
                                            </div>
                                            <div class="text-end">
                                                <div class="form-check form-switch form-switch-right">
                                                    <input type="hidden" name="enable_footer" value="off">
                                                    @if (!empty($getStoreThemeSetting['enable_footer']))
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_footer" id="enable_footer"
                                                            {{ $getStoreThemeSetting['enable_footer'] == 'on' ? 'checked="checked"' : '' }}>
                                                    @else
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_footer" id="enable_footer">
                                                    @endif

                                                    <label class="form-check-label"
                                                        for="enable_footer">{{ __('Enable Footer') }}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fas fa-envelope"></i>
                                                            {{ Form::label('email', __('Email'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('email', !empty($getStoreThemeSetting['email']) ? $getStoreThemeSetting['email'] : '', ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Email')]) }}
                                                            @error('email')
                                                                <span class="invalid-email" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                                            {{ Form::label('whatsapp', __('Whatsapp'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('whatsapp', !empty($getStoreThemeSetting['whatsapp']) ? $getStoreThemeSetting['whatsapp'] : '', ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'https://www.whatsapp.com/']) }}
                                                            @error('whatsapp')
                                                                <span class="invalid-whatsapp" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-facebook-square" aria-hidden="true"></i>
                                                            {{ Form::label('facebook', __('Facebook'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('facebook', !empty($getStoreThemeSetting['facebook']) ? $getStoreThemeSetting['facebook'] : '', ['class' => 'form-control', 'placeholder' => 'https://www.facebook.com/']) }}
                                                            @error('facebook')
                                                                <span class="invalid-facebook" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                                            {{ Form::label('instagram', __('Instagram'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('instagram', !empty($getStoreThemeSetting['instagram']) ? $getStoreThemeSetting['instagram'] : '', ['class' => 'form-control', 'placeholder' => 'https://www.instagram.com/']) }}
                                                            @error('instagram')
                                                                <span class="invalid-instagram" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                                            {{ Form::label('twitter', __('Twitter'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('twitter', !empty($getStoreThemeSetting['twitter']) ? $getStoreThemeSetting['twitter'] : '', ['class' => 'form-control', 'placeholder' => 'https://twitter.com/']) }}
                                                            @error('twitter')
                                                                <span class="invalid-twitter" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    @if ($theme != 'theme5')
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                                                {{ Form::label('youtube', __('Youtube'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('youtube', !empty($getStoreThemeSetting['youtube']) ? $getStoreThemeSetting['youtube'] : '', ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/']) }}
                                                                @error('youtube')
                                                                    <span class="invalid-youtube" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <i class="fas fa-copyright" aria-hidden="true"></i>
                                                            {{ Form::label('footer_note', __('Footer Note'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('footer_note', !empty($getStoreThemeSetting['footer_note']) ? $getStoreThemeSetting['footer_note'] : '', ['class' => 'form-control', 'placeholder' => __('Footer Note')]) }}
                                                            @if (!$copyright_plan->price)
                                                                <small class="text-xs">
                                                                    {!! __('join copyright plan', [
                                                                        'default_copyright_text' => __('Free Car Dealer Website Powered By') . ' ' . env('APP_NAME'),
                                                                        'copyright_plan' => "<a href='" . route('copyright-plan.index') . "'>" . __('Copyright Plan') . '</a>',
                                                                    ]) !!}.
                                                                </small>
                                                            @endif
                                                            @error('footer_note')
                                                                <span class="invalid-footer_note" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        {{ Form::label('storejs', __('Store Custom JS'), ['class' => 'col-form-label']) }}
                                                        {{ Form::textarea('storejs', !empty($getStoreThemeSetting['storejs']) ? $getStoreThemeSetting['storejs'] : '', ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Store Custom JS')]) }}

                                                        @error('storejs')
                                                            <span class="invalid-storejs" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end">
                                                {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div>

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-footer">
                                            <div class="col-sm-12 px-2">
                                                <div class="text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {!! Form::close() !!}


                        {{ Form::open(['route' => ['theme.sharing.content', [$store->slug, $theme]], 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                        <div id="Content_Sharing">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5>{{ __('Content Sharing') }}</h5>
                                                <small>
                                                    {{ __('Here you can share content between themes. Note: Content of the selected theme\'s will be copied to the :theme!', ['theme' => \App\Models\Utility::getThemeMapping($theme)]) }}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label class="col-form-label"
                                                                for="example3cols3Input">{{ __('Select the Theme') }}</label>
                                                        </div>
                                                    </div>


                                                    @foreach (\App\Models\Utility::themeOne() as $key => $v)
                                                        @if ($key != $theme)
                                                            @php
                                                                $theme_name = \App\Models\Utility::getThemeMapping($key);
                                                            @endphp
                                                            <div class="col-md-3">
                                                                <div class="form-check form-check-inline mb-3">
                                                                    <input type="radio"
                                                                        id="sharing-content-{{ $key }}"
                                                                        name="theme_name" value="{{ $key }}"
                                                                        class="form-check-input">
                                                                    <label class="form-check-label"
                                                                        for="sharing-content-{{ $key }}">{{ $theme_name }}</label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    @if ($plan->free_layouts == 'on')
                                                        @foreach (\App\Models\Utility::premiumThemes() as $key => $v)
                                                            @if ($key != $theme)
                                                                @php
                                                                    $theme_name = \App\Models\Utility::getThemeMapping($key);
                                                                @endphp
                                                                <div class="col-md-3">
                                                                    <div class="form-check form-check-inline mb-3">
                                                                        <input type="radio"
                                                                            id="sharing-content-{{ $key }}"
                                                                            name="theme_name"
                                                                            value="{{ $key }}"
                                                                            class="form-check-input">
                                                                        <label class="form-check-label"
                                                                            for="sharing-content-{{ $key }}">{{ $theme_name }}</label>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif


                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-sm-12 px-2">
                                                <div class="text-end">
                                                    {{ Form::hidden('themefile', null, ['id' => 'themefile']) }}
                                                    {{ Form::submit(__('Share Content to :theme', ['theme' => \App\Models\Utility::getThemeMapping($theme)]), ['class' => 'btn btn-xs btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                @endif

            </div>
            <!-- [ sample-page ] end -->
        </div>
    </div>
    {{-- <div id="slider-structure" class="d-none">


        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input type="file" name="slider_image[]" class="form-control custom-input-file"
                        placeholder="{{ __('Slider Image') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::text('slider_title[]', null, ['class' => 'form-control', 'placeholder' => __('Enter Slider Title')]) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::text('slider_description[]', null, ['class' => 'form-control', 'placeholder' => __('Enter Slider Description')]) }}
                </div>
            </div>
            <div class="col-md-12 mb-3 text-center">
                <button type="button" class="btn btn-default text-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
            <hr>
        </div>
    </div> --}}
@endsection
@push('script-page')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
    <script>
        function check_theme(color_val) {
            $('.theme-color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.repeater').repeater({
                initEmpty: false,
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                isFirstItemUndeletable: true
            })
        });

        $(".deleteRecord").click(function() {
            var name = $(this).data("name");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: '{{ route('brand.file.delete', [$store->slug, $theme, '_name']) }}'.replace('_name',
                    name),
                type: 'DELETE',
                data: {
                    "name": name,
                    "_token": token,
                },
                success: function(response) {
                    show_toastr('Success', response.success, 'success');
                    $('.product_Image[data-value="' + response.name + '"]').remove();
                },
                error: function(response) {
                    show_toastr('Error', response.error, 'error');
                }
            });
        });
    </script>
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
    <script>
        var Dropzones = function() {
            var e = $('[data-toggle="dropzone1"]'),
                t = $(".dz-preview");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            e.length && (Dropzone.autoDiscover = !1, e.each(function() {
                var e, a, n, o, i;
                e = $(this), a = void 0 !== e.data("dropzone-multiple"), n = e.find(t), o = void 0, i = {
                    url: "{{ route('store.storeeditproducts', [$store->slug, $theme]) }}",
                    headers: {
                        'x-csrf-token': CSRF_TOKEN,
                    },
                    thumbnailWidth: null,
                    thumbnailHeight: null,
                    previewsContainer: n.get(0),
                    previewTemplate: n.html(),
                    maxFiles: 10,
                    parallelUploads: 10,
                    autoProcessQueue: true,
                    uploadMultiple: true,
                    acceptedFiles: a ? null : "image/*",
                    success: function(file, response) {
                        if (response.status == "success") {
                            show_toastr('success', response.success, 'success');
                            {{-- // window.location.href = "{{route('product.index')}}"; --}}
                        } else {
                            show_toastr('Error', response.msg, 'error');
                        }
                    },
                    error: function(file, response) {
                        // Dropzones.removeFile(file);
                        if (response.error) {
                            show_toastr('Error', response.error, 'error');
                        } else {
                            show_toastr('Error', response, 'error');
                        }
                    },
                    init: function() {
                        var myDropzone = this;
                    }

                }, n.html(""), e.dropzone(i)
            }))
        }()

        $("#eventBtn").click(function() {
            $("#BigButton").clone(true).appendTo("#fileUploadsContainer").find("input").val("").end();
        });
        $("#testimonial_eventBtn").click(function() {
            $("#BigButton2").clone(true).appendTo("#fileUploadsContainer2").find("input").val("").end();
        });

        $(document).on('click', '#remove', function() {
            var qq = $('.BigButton').length;

            if (qq > 1) {
                var dd = $(this).attr('data-id');

                $(this).parents('#BigButton').remove();
            }
        });
        $("input[type='file']").on("change", function() {
            var numFiles = $(this).get(0).files.length
            $('#img-count').html(numFiles + ' Images selected');
        });

        $('.list-group-sortable-exclude').sortable({
            placeholderClass: 'list-group-item',
            items: ':not(.disabled)'
        });

        $(document).ready(function() {
            $("#sortable-list, #sortable-primary, #sortable-secondary").sortable({
                connectWith: ".menu-list",
                placeholder: "ui-state-highlight",
                stop: function(event, ui) {
                    // Handle the end of sorting if needed

                    $("#sorted-info").html("");
                    generateHiddenInputs($("#sortable-list"),"sorted-info");
                    generateHiddenInputs($("#sortable-primary"),"sorted-info");
                    generateHiddenInputs($("#sortable-secondary"),"sorted-info");
                    // // Iterate through each li element and extract data-name attribute
                    // $sortableList.find("li").each(function() {
                    //     if ($(this).data("name")) {
                    //         // Create a hidden field dynamically
                    //         var hiddenField = $("<input>").attr("type", "hidden")
                    //             .attr("name", "selection_nav_menu[]").val($(this).data(
                    //                 "name"));

                    //         // Append the hidden field to the "info" element
                    //         $("#sorted-info").append(hiddenField);
                    //     }

                    // });

                    // $sortablePrimary.find("li").each(function() {

                    //     if ($(this).data("name")) {
                    //         // Create a hidden field dynamically
                    //         var hiddenField = $("<input>").attr("type", "hidden")
                    //             .attr("name", "primary_nav_menu[]").val($(this).data("name"));

                    //         // Append the hidden field to the "info" element
                    //         $("#sorted-info").append(hiddenField);
                    //     }


                    // });

                    // $sortableSecondary.find("li").each(function() {
                    //     if ($(this).data("name")) {
                    //         // Create a hidden field dynamically
                    //         var hiddenField = $("<input>").attr("type", "hidden")
                    //             .attr("name", "secondary_nav_menu[]").val($(this).data(
                    //                 "name"));

                    //         // Append the hidden field to the "info" element
                    //         $("#sorted-info").append(hiddenField);
                    //     }

                    // });
                },
                // receive: function(event, ui) {
                //     // Callback when an item is dropped into the list
                //     console.log("Item dropped into menu");
                // },
                // create: function(event, ui) {
                //     console.log('create');
                // },
                // change: function(event, ui) {
                //     console.log('change');
                // }
            });

            $("#sortable-list-v2, #sortable-footer-1, #sortable-footer-2, #sortable-footer-3, #sortable-footer-4").sortable({
                connectWith: ".menu-list",
                placeholder: "ui-state-highlight",
                stop: function(event, ui) {
                    // Handle the end of sorting if needed

                    $("#sorted-info-v2").html("");

                    generateHiddenInputs($("#sortable-list-v2"),"sorted-info-v2");
                    generateHiddenInputs($("#sortable-footer-1"),"sorted-info-v2");
                    generateHiddenInputs($("#sortable-footer-2"),"sorted-info-v2");
                    generateHiddenInputs($("#sortable-footer-3"),"sorted-info-v2");
                    generateHiddenInputs($("#sortable-footer-4"),"sorted-info-v2");

                   
                },
                
            });
        });


        // $(document).on('change', '#footer_type_1', function(e) {
        //     if ($(this).val() == 1) {
        //         $(".standard-footer-type-1").removeClass('hide');
        //         $(".personalized-footer-type-1").addClass('hide');
        //     } else {
        //         $(".standard-footer-type-1").addClass('hide');
        //         $(".personalized-footer-type-1").removeClass('hide');
        //     }
        // });
        // $(document).on('change', '#footer_type_2', function(e) {
        //     if ($(this).val() == 1) {
        //         $(".standard-footer-type-2").removeClass('hide');
        //         $(".personalized-footer-type-2").addClass('hide');
        //     } else {
        //         $(".standard-footer-type-2").addClass('hide');
        //         $(".personalized-footer-type-2").removeClass('hide');
        //     }
        // });
        // $(document).on('change', '#footer_type_3', function(e) {
        //     if ($(this).val() == 1) {
        //         $(".standard-footer-type-3").removeClass('hide');
        //         $(".personalized-footer-type-3").addClass('hide');
        //     } else {
        //         $(".standard-footer-type-3").addClass('hide');
        //         $(".personalized-footer-type-3").removeClass('hide');
        //     }
        // });
        // $(document).on('change', '#footer_type_4', function(e) {
        //     if ($(this).val() == 1) {
        //         $(".standard-footer-type-4").removeClass('hide');
        //         $(".personalized-footer-type-4").addClass('hide');
        //     } else {
        //         $(".standard-footer-type-4").addClass('hide');
        //         $(".personalized-footer-type-4").removeClass('hide');
        //     }
        // });

        $('.list-group-sortable-exclude').sortable({
            placeholderClass: 'list-group-item',
            items: ':not(.disabled)'
        });

        $(document).ready(function() {
            $(".drpdwn-page-slug-urls").html($("#drpdwn-page-slug-urls").html());
        });

        


    </script>
@endpush
