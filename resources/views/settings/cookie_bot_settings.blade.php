@extends('layouts.admin')
@section('page-title')
    {{ __('Cookie Bot') }}
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
    <li class="breadcrumb-item active" aria-current="page">{{ __('Cookie Bot') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Cookie Bot') }}</h5>
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
                            {{ __('Cookie Bot') }}
                        </h5>
                        <small class="text-dark font-weight-bold">
                            {{ __('Here you can add Cookie Bot to your store. Note: Please create an Account in manage.cookiebot.com to get a Group ID!') }}
                        </small>
                    </div>
                    <form method="POST"
                        action="{{ route('store.cookie.bot') }}"
                        accept-charset="UTF-8">
                        @csrf
                        @method('PUT')

                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check form-switch float-end">
                                        <label class="form-check-label" for="is_cookiebot_enable">
                                            {{ __('Enable') }}
                                        </label>
                                        <input 
                                            type="checkbox"
                                            class="form-check-input"
                                            id="is_cookiebot_enable"
                                            name="is_cookiebot_enable"
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
                                                <input 
                                                    type="radio"
                                                    id="cookiebot_api_mode_sandbox"
                                                    name="cookiebot_api_mode" 
                                                    value="sandbox"
                                                    class="form-check-input"
                                                    {{ $store_settings->cookiebot_api_mode == 'sandbox' ? 'checked' : '' }}>

                                                <label class="form-check-label" for="cookiebot_api_mode_sandbox">{{ __('Sandbox') }}</label>
                                            </div>
                                            <div class="form-check form-check-inline mb">
                                                <input 
                                                    type="radio"
                                                    id="cookiebot_api_mode_live"
                                                    name="cookiebot_api_mode" 
                                                    value="live"
                                                    class="form-check-input"
                                                    {{ $store_settings->cookiebot_api_mode == 'live' ? 'checked' : '' }}>

                                                <label class="form-check-label" for="cookiebot_api_mode_live">{{ __('Live') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h5> {{ __('Cookie Bot Group ID') }} </h5>
                            
                                    <div class="col-lg col-md col-sm form-group">
                                        <input 
                                            class="form-control" 
                                            name="cookie_bot_group_id" 
                                            type="text"
                                            value="{{ $store_settings->cookiebot_group_id }}" 
                                            id="cookie_bot_group_id"
                                            placeholder="Paste your Cookie bot Group ID here">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <div class="card-footer">
                                    <div class="col-sm-12 px-2">
                                        <div class="d-flex justify-content-end">
                                            {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
@endpush
