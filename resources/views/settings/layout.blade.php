@extends('layouts.admin')
@section('page-title')
    {{ __('Layouts') }}
@endsection
@php
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Layouts') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Layouts') }}</h5>
    </div>
@endsection
@section('action-btn')
@endsection
@section('content')
    @if (Auth::user()->type == 'Owner')

        {{ Form::open(['route' => ['store.changetheme', $store_settings->id], 'method' => 'POST', 'id' => 'theme-changer']) }}
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                {{-- @if (\App\Models\Utility::isProductPlanActive())
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h5>{{ __('Product Layouts') }}

                                </h5>
                            </div>
                            @if (isset($store_settings['theme_dir']))
                                <div class="text-end">
                                    <span class="d-flex align-items-center ">
                                        <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                        <span class="ms-2">{{ __('Active Theme') }}:
                                            <b> {{ \App\Models\Utility::getThemeMapping($store_settings['theme_dir']) }}</b>
                                        </span>
                                    </span>
                                </div>
                            @endif
                        </div>


                        <div class="card-body">
                            <div class="row theme-changer">
                                @foreach (\App\Models\Utility::productThemes() as $key => $v)
                                    <div class="col-3 cc-selector mb-2">
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
                                        <div class="form-group theme-changer">
                                            <div class="row gutters-xs theme_color" id="{{ $key }}">
                                                @foreach ($v as $css => $val)
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
                                                @endforeach
                                                <div class="col">
                                                    @if (isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key)
                                                        <a href="{{ route('store.editproducts', [$store_settings->slug, $key]) }}"
                                                            class="btn btn-outline-primary theme_btn" type="button"
                                                            id="button-addon2">{{ __('Edit') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5>{{ __('Free Layouts') }}

                            </h5>
                        </div>

                        @if (isset($store_settings['theme_dir']))
                            <div class="text-end">
                                <span class="d-flex align-items-center ">
                                    <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                    <span class="ms-2">{{ __('Active Theme') }}:
                                        <b> {{ \App\Models\Utility::getThemeMapping($store_settings['theme_dir']) }}</b>
                                    </span>
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        {{-- <div class="row">
                            @foreach (\App\Models\Utility::productThemes() as $key => $v)
                                <div class="col-4 cc-selector mb-2">
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
                                    <div class="form-group theme-changer">
                                        <div class="row gutters-xs theme_color"
                                            id="{{ $key }}">
                                            @foreach ($v as $css => $val)
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
                                            @endforeach
                                            <div class="col">
                                                @if (isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key)
                                                    <a href="{{ route('store.editproducts', [$store_settings->slug, $key]) }}"
                                                        class="btn btn-outline-primary theme_btn"
                                                        type="button"
                                                        id="button-addon2">{{ __('Edit') }}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}

                        {{-- @if ($plan->free_layouts == 'on') --}}

                        {{-- <h5 class="mt-3 mb-4">{{ __('Free Layouts') }}</h5> --}}
                        <div class="row theme-changer">
                            {{-- @foreach (\App\Models\Utility::premiumThemes() as $key => $v) --}}
                            @foreach (\App\Models\Utility::themeOne() as $key => $v)
                                @php
                                    $key_mapping = \App\Models\Utility::getThemeMapping($key);
                                @endphp
                                <div class="col-6 col-md-3 cc-selector mb-2">
                                    <div class="mb-3 screen image">
                                        <img src="{{ asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg')) }}"
                                            class="img-center pro_max_width pro_max_height {{ $key }}_img {{ isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key ? 'active' : '' }}">
                                        <div class="actions">
                                            <a href="">
                                                <button type="button" class="btn btn-default delete-image-btn pull-right">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </a>
                                            <a href="">
                                                <button type="button" class="btn btn-default edit-image-btn pull-right">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row gutters-xs theme_color" id="{{ $key }}">
                                            <div class="col-12 d-flex justify-content-center align-items-center">
                                                <label class="colorinput">
                                                    <input name="theme_color" type="radio" value="white-black-color.css"
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

                                                    <button type="button" class="btn btn-xs btn-primary"
                                                        title="{{ __('Save') }}"
                                                        style="display: none;padding: 4px 10px;"><i
                                                            class="fas fa-save"></i></button>
                                                    {{-- {{ Form::submit(__('Save'), ['class' => 'btn btn-xs btn-primary', 'style' => 'display:none']) }} --}}
                                                </div>
                                                <div style="margin-left: 5px">
                                                    @if (isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key)
                                                        <a title="{{ __('Edit') }}"
                                                            href="{{ route('store.editproducts', [$store_settings->slug, $key_mapping]) }}"
                                                            class="btn btn-outline-primary theme_btn" type="button"
                                                            id="button-addon2" style="padding: 4px 10px;"><i
                                                                class="ti ti-pencil"></i></a>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- @endif --}}
                    </div>

                </div>
                <div class="card">
                    {{-- <div class="card-header">
                        <h5>{{ __('Premium Layouts') }}</h5>
                    </div> --}}
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5>{{ __('Premium Layouts') }}

                            </h5>
                        </div>
                        @if (isset($store_settings['theme_dir']))
                            <div class="text-end">
                                <span class="d-flex align-items-center ">
                                    <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                    <span class="ms-2">{{ __('Active Theme') }}:
                                        <b> {{ \App\Models\Utility::getThemeMapping($store_settings['theme_dir']) }}</b>
                                    </span>
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        {{-- @if ($plan->premium_layouts == 'on') --}}
                        <h5 class="mt-3 mb-4">{{ __('Premium Layouts') }}</h5>
                        <div class="row theme-changer">
                            @foreach (\App\Models\Utility::premiumPlusThemes() as $key => $v)
                                @php $key_mapping = \App\Models\Utility::getThemeMapping($key); @endphp
                                <div class="col-12 col-md-3 cc-selector mb-2">
                                    <div class="mb-3 screen image">
                                        <img src="{{ asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg')) }}"
                                            class="img-center pro_max_width pro_max_height {{ $key }}_img {{ isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key ? 'active' : '' }}">
                                        <div class="actions">
                                            <a href="">
                                                <button type="button"
                                                    class="btn btn-default delete-image-btn pull-right">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </a>
                                            <a href="">
                                                <button type="button" class="btn btn-default edit-image-btn pull-right">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row gutters-xs theme_color" id="{{ $key }}">
                                            <div class="col-12 d-flex justify-content-center align-items-center">
                                                <label class="colorinput">
                                                    <input name="theme_color" type="radio"
                                                        value="white-black-color.css" data-theme="{{ $key }}"
                                                        data-imgpath="{{ asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg')) }}"
                                                        class="colorinput-input"
                                                        {{ isset($store_settings['store_theme']) && $store_settings['store_theme'] == $key ? 'checked' : '' }}>
                                                    <span class="colorinput-color-v2"></span>
                                                    <label style="font-size: 12px">&nbsp;
                                                        {{ __('Set') }}
                                                        {{ $key_mapping }}</label>
                                                </label>
                                                <div style="margin-left: 5px">
                                                    <button data-premiumplan="{{ $plan->premium_layouts }}"
                                                        data-planpage="{{ route('plans.index') }}"
                                                        data-trial="{{ Auth::user()->free_trial_status }}" type="button"
                                                        class="btn btn-xs btn-primary" title="{{ __('Save') }}"
                                                        style="display: none;padding-left:12px;padding-right:12px;"><i
                                                            class="fas fa-save"></i></button>
                                                    {{-- {{ Form::submit(__('Save'), ['class' => 'btn btn-xs btn-primary', 'style' => 'display:none']) }} --}}
                                                </div>
                                                <div style="margin-left: 5px">
                                                    @if (isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key)
                                                        <a title="{{ __('Edit') }}"
                                                            href="{{ route('store.editproducts', [$store_settings->slug, $key_mapping]) }}"
                                                            class="btn btn-outline-primary theme_btn" type="button"
                                                            id="button-addon2"
                                                            style="padding-left:12px;padding-right:12px;"><i
                                                                class="ti ti-pencil"></i></a>
                                                    @endif
                                                </div>
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
                        {{-- @endif --}}

                    </div>
                    <div class="card-footer">
                        <div class="col-sm-12 px-2">
                            <div class="text-end">
                                {{ Form::hidden('content_sharing', 0, ['id' => 'content-sharing']) }}
                                {{ Form::hidden('themefile', null, ['id' => 'themefile']) }}
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
