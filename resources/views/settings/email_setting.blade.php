@extends('layouts.admin')
@section('page-title')
    {{ __('Email Settings') }}
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
    <li class="breadcrumb-item active" aria-current="page">{{ __('Email Settings') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Email Settings') }}</h5>
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
                            {{ __('Email settings') }}
                        </h5>
                    </div> --}}
                    <div class="card-body p-4">
                        {{ Form::open(['route' => ['owner.email.setting', $store_settings->slug], 'method' => 'post']) }}
                        <div class="row">
                            {{-- <div class="form-group col-md-6">
                        {{ Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-label']) }}
                        {{ Form::text('mail_driver', $store_settings->mail_driver, ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')]) }}
                        @error('mail_driver')
                            <span class="invalid-mail_driver" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                            {{-- <div class="form-group col-md-6">
                        {{ Form::label('mail_host', __('Mail Host'), ['class' => 'form-label']) }}
                        {{ Form::text('mail_host', $store_settings->mail_host, ['class' => 'form-control ', 'placeholder' => __('Enter Mail Host')]) }}
                        @error('mail_host')
                            <span class="invalid-mail_driver" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                            {{-- <div class="form-group col-md-6">
                        {{ Form::label('mail_port', __('Mail Port'), ['class' => 'form-label']) }}
                        {{ Form::text('mail_port', $store_settings->mail_port, ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')]) }}
                        @error('mail_port')
                            <span class="invalid-mail_port" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                            {{-- <div class="form-group col-md-6">
                        {{ Form::label('mail_username', __('Mail Username'), ['class' => 'form-label']) }}
                        {{ Form::text('mail_username', $store_settings->mail_username, ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')]) }}
                        @error('mail_username')
                            <span class="invalid-mail_username" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('mail_password', __('Mail Password'), ['class' => 'form-label']) }}
                        {{ Form::text('mail_password', $store_settings->mail_password, ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')]) }}
                        @error('mail_password')
                            <span class="invalid-mail_password" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                            {{-- <div class="form-group col-md-6">
                        {{ Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'form-label']) }}
                        {{ Form::text('mail_encryption', $store_settings->mail_encryption, ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')]) }}
                        @error('mail_encryption')
                            <span class="invalid-mail_encryption" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                            {{-- <div class="form-group col-md-6">
                        {{ Form::label('mail_from_address', __('Mail From Address'), ['class' => 'form-label']) }}
                        {{ Form::text('mail_from_address', $store_settings->mail_from_address, ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')]) }}
                        @error('mail_from_address')
                            <span class="invalid-mail_from_address" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                            <div class="form-group col-md-6">
                                {{ Form::label('mail_from_name', __('Mail From Name'), ['class' => 'form-label']) }}
                                {{ Form::text('mail_from_name', $store_settings->mail_from_name, ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')]) }}
                                @error('mail_from_name')
                                    <span class="invalid-mail_from_name" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-end">
                            <div class="card-footer">
                                <div class="col-sm-12 px-2">
                                    <div class="d-flex justify-content-between">
                                        <a href="#" data-url="{{ route('test.mail') }}" data-ajax-popup="true"
                                            data-title="{{ __('Send Test Mail') }}"
                                            class="btn btn-xs btn-primary send_email">
                                            {{ __('Send Test Mail') }}
                                        </a>
                                        </a>
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
@endpush
