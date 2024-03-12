@extends('storefront.layout.themePlus1')
@section('page-title')
    {{ __('Register') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{ __('Customer') }} {{ __('Register') }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                        <li class="active">{{ __('Register') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-6 mb-5 mb-lg-0">
                {!! Form::open(['route' => ['store.userstore', $slug], 'id' => 'contact-form'], ['method' => 'post']) !!}

                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">{{ __('Full Name') }} <span
                                class="text-color-danger">*</span></label>
                        {{ Form::text('name', null, ['class' => 'form-control form-control-lg text-4']) }}
                        @error('name')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">{{ __('Email') }} <span
                                class="text-color-danger">*</span></label>
                        {{ Form::text('email', null, ['class' => 'form-control form-control-lg text-4']) }}
                        @error('email')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">{{ __('Number') }} <span
                                class="text-color-danger">*</span></label>
                        {{ Form::text('phone_number', null, ['class' => 'form-control form-control-lg text-4']) }}
                        @error('number')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">{{ __('Password') }} <span
                                class="text-color-danger">*</span></label>
                        {{ Form::password('password', ['class' => 'form-control form-control-lg text-4']) }}
                        @error('password')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">{{ __('Confirm Password') }} <span
                                class="text-color-danger">*</span></label>
                        {{ Form::password('password_confirmation', ['class' => 'form-control form-control-lg text-4']) }}
                        @error('password_confirmation')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group col-md-auto">
                        <label class="form-label custom-control-label cur-pointer text-2" for="rememberme">
                            {{__('By using the system, you accept the')}} <a href="" class="text-primary"> {{__('Privacy Policy')}} </a> {{__('and')}} <a href="" class="text-primary"> {{__('System Regulations')}}. </a>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <button type="submit"
                            class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3"
                            data-loading-text="Loading...">{{ __('Register') }}</button>
                    </div>
                    <p class="text-center">{{ __('Already registered ?') }}
                        <a href="{{ route('customer.loginform', $slug) }}">{{ __('Login') }}</a>
                    </p>
                </div>

                {{ Form::close() }}
            </div>
        </div>

    </div>
@endsection
@push('script-page')
@endpush
