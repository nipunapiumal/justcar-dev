@extends('layouts.admin')
@section('page-title')
    {{ __('Mobile.de Seller-API') }}
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
    <li class="breadcrumb-item active" aria-current="page">{{ __('Mobile.de Seller-API') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Mobile.de Seller-API') }}</h5>
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
                            {{ __('Mobile.de Seller-API') }}
                        </h5>
                        <small class="text-dark font-weight-bold">
                            {!! __('mobile.de desc', [
                                'url' => "<a href='https://sandbox.services.mobile.de' target='_blank'>sandbox.services.mobile.de</a>",
                            ]) !!}
                        </small>
                    </div>
                    @if (Auth::user()->type == 'Owner')
                        {{ Form::model($store_settings, ['route' => ['store.mobile.de'], 'method' => 'POST']) }}
                        {{-- <form method="POST" action="{{ route('store.live.chat') }}"
                        accept-charset="UTF-8">
                        @csrf
                        @method('PUT') --}}
                        <div class="card-body p-4">
                            <div class="row">

                                <p class="mb-2">
                                    {!! __('mobile.de desc 1') !!}}
                                </p>
                                <p class="mb-2">
                                   <b> {!! __('mobile.de desc 2') !!}</b>
                                </p>
                                <p> {{ __('mobile.de desc 3') }}</p>

                                <div class="col-12 py-2 text-end">
                                    <div class="form-check form-switch form-switch-right mb-2">
                                        <input type="hidden" name="is_mobilede_api_enabled" value="off">
                                        <input type="checkbox" class="form-check-input mx-2" name="is_mobilede_api_enabled"
                                            id="is_mobilede_api_enabled"
                                            {{ isset($store_settings['is_mobilede_api_enabled']) && $store_settings['is_mobilede_api_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                        <label class="form-check-label"
                                            for="is_mobilede_api_enabled">{{ __('Enable') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-4">



                                    <label class="paypal-label col-form-label"
                                        for="mobilede_api_mode">{{ __('API Mode') }}</label>
                                    <br>
                                    <div class="d-flex">
                                        <div class="mr-2" style="margin-right: 15px;">
                                            <div class="border card p-3">
                                                <div class="form-check">
                                                    <label class="form-check-labe text-dark">
                                                        <input type="radio" name="mobilede_api_mode" value="sandbox"
                                                            class="form-check-input"
                                                            {{ !isset($store_settings['mobilede_api_mode']) || $store_settings['mobilede_api_mode'] == '' || $store_settings['mobilede_api_mode'] == 'sandbox' ? 'checked="checked"' : '' }}>
                                                        {{ __('Sandbox') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mr-2">
                                            <div class="border card p-3">
                                                <div class="form-check">
                                                    <label class="form-check-labe text-dark">
                                                        <input type="radio" name="mobilede_api_mode" value="live"
                                                            class="form-check-input"
                                                            {{ isset($store_settings['mobilede_api_mode']) && $store_settings['mobilede_api_mode'] == 'live' ? 'checked="checked"' : '' }}>
                                                        {{ __('Live') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('mobilede_api_username', __('Seller API Userename'), ['class' => 'col-form-label']) }}
                                        {{ Form::text('mobilede_api_username', isset($store_settings['mobilede_api_username']) ? $store_settings['mobilede_api_username'] : '', ['class' => 'form-control', 'placeholder' => __('Enter') . ' ' . __('Seller API Userename')]) }}
                                        @error('stripe_key')
                                            <span class="invalid-stripe_key" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('mobilede_api_password', __('Seller API Password'), ['class' => 'col-form-label']) }}
                                        {{ Form::text('mobilede_api_password', isset($store_settings['mobilede_api_password']) ? $store_settings['mobilede_api_password'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter') . ' ' . __('Seller API Password')]) }}
                                        @error('mobilede_api_password')
                                            <span class="invalid-mobilede_api_password" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('mobilede_api_seller_id', __('Seller-ID'), ['class' => 'col-form-label']) }}
                                        {{ Form::text('mobilede_api_seller_id', isset($store_settings['mobilede_api_seller_id']) ? $store_settings['mobilede_api_seller_id'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter') . ' ' . __('Seller-ID')]) }}
                                        @error('mobilede_api_seller_id')
                                            <span class="invalid-mobilede_api_seller_id" role="alert">
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
