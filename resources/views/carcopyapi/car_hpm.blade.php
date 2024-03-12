@extends('layouts.admin')
@section('page-title')
    {{ __('Carcopy.com CarHPM') }}
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
    <li class="breadcrumb-item active" aria-current="page">{{ __('Carcopy.com CarHPM') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Carcopy.com CarHPM') }}</h5>
    </div>
@endsection
@section('action-btn')
@endsection
@section('content')
    @if (Auth::user()->type == 'Owner')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">
                            {{ __('Carcopy.com CarHPM') }}
                        </h5>
                        <small class="text-dark font-weight-bold">
                            {!! __('carhpm desc', [
                                'url' => "<a href='https://www.carcopy.com/fahrzeug-homepage-modul/' target='_blank'>carcopy.com</a>",
                                'app_name' => env('APP_NAME'),
                            ]) !!}
                        </small>
                    </div>
                    @if (Auth::user()->type == 'Owner')
                        {{ Form::model($store_settings, ['route' => ['store.car.hpm'], 'method' => 'POST']) }}
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12 py-2 text-end">
                                    <div class="form-check form-switch form-switch-right mb-2">
                                        <input type="hidden" name="is_car_hpm_enabled" value="off">
                                        <input type="checkbox" class="form-check-input mx-2" name="is_car_hpm_enabled"
                                            id="is_car_hpm_enabled"
                                            {{ isset($store_settings['is_car_hpm_enabled']) && $store_settings['is_car_hpm_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                        <label class="form-check-label" for="is_car_hpm_enabled">{{ __('Enable') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-4">
                                    <label class="paypal-label col-form-label"
                                        for="car_hpm_mode">{{ __('API Mode') }}</label>
                                    <br>
                                    <div class="d-flex">
                                        <div class="mr-2" style="margin-right: 15px;">
                                            <div class="border card p-3">
                                                <div class="form-check">
                                                    <label class="form-check-labe text-dark">
                                                        <input type="radio" name="car_hpm_mode" value="sandbox"
                                                            class="form-check-input"
                                                            {{ !isset($store_settings['car_hpm_mode']) || $store_settings['car_hpm_mode'] == '' || $store_settings['car_hpm_mode'] == 'sandbox' ? 'checked="checked"' : '' }}>
                                                        {{ __('Sandbox') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mr-2">
                                            <div class="border card p-3">
                                                <div class="form-check">
                                                    <label class="form-check-labe text-dark">
                                                        <input type="radio" name="car_hpm_mode" value="live"
                                                            class="form-check-input"
                                                            {{ isset($store_settings['car_hpm_mode']) && $store_settings['car_hpm_mode'] == 'live' ? 'checked="checked"' : '' }}>
                                                        {{ __('Live') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        {{ Form::label('car_hpm_api_key', __('API Key'), ['class' => 'col-form-label']) }}
                                        {{ Form::text('car_hpm_api_key', isset($store_settings['car_hpm_api_key']) ? $store_settings['car_hpm_api_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter') . ' ' . __('API Key')]) }}
                                        @error('stripe_key')
                                            <span class="invalid-stripe_key" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <div class="card-footer">
                                    <div class="col-sm-12">
                                        <div class="text-end">
                                            <a href="{{route('carcopy.index')}}" type="button" class="btn btn-danger text-light">
                                                <span class="">{{ __('View')." ".__('Carcopy.com CarHPM') }}</span>
                                            </a>
                                            {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ Form::close() }}
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
@endpush
