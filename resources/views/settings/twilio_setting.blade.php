@extends('layouts.admin')
@section('page-title')
    {{ __('Twilio setting') }}
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
    <li class="breadcrumb-item active" aria-current="page">{{ __('Twilio setting') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Twilio setting') }}</h5>
    </div>
@endsection
@section('action-btn')
@endsection
@section('content')
    @if (Auth::user()->type == 'Owner')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h5 class="">
                            {{ __('Twilio setting') }}
                        </h5>
                    </div> --}}
                    <form method="POST" action="{{ route('owner.twilio.setting', $store_settings->slug) }}"
                        accept-charset="UTF-8">
                        @csrf
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" name="is_twilio_enabled"
                                            id="twilio_module"
                                            {{ $store_settings['is_twilio_enabled'] == 'on' ? 'checked=checked' : '' }}>
                                        <label class="form-check-label" for="twilio_module">
                                            {{ __('Twilio') }}
                                            </a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                    <label for="twilio_token" class="form-label">{{ __('Twillo SID') }}</label>
                                    <input class="form-control" name="twilio_sid" type="text"
                                        value="{{ $store_settings->twilio_sid }}" id="twilio_sid">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                    <label for="twilio_token" class="form-label">{{ __('Twillo Token') }}</label>
                                    <input class="form-control " name="twilio_token" type="text"
                                        value="{{ $store_settings->twilio_token }}" id="twilio_token">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                    <label for="twilio_from" class="form-label">{{ __('Twillo From') }}</label>
                                    <input class="form-control " name="twilio_from" type="text"
                                        value="{{ $store_settings->twilio_from }}" id="twilio_from">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                    <label for="notification_number"
                                        class="form-label">{{ __('Notification Number') }}</label>
                                    <input class="form-control " name="notification_number" type="text"
                                        value="{{ $store_settings->notification_number }}" id="notification_number">
                                    <small>* Use country code with your number *</small>
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
