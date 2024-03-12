@extends('storefront.layout.theme37')
@section('page-title')
    {{ __('Register') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="{{ asset('assets/theme35to37/images/page-title-bg-4.jpg') }}">
        <div class="container">
            <div class="content">
                <h2>{{ __('Register') }}</h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75">{{ __('Register') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Authentication-area start -->
    <div class="authentication-area ptb-100">
        <div class="container">
            <div class="auth-form border">
                {!! Form::open(['route' => ['store.userstore', $slug], 'id' => 'contact-form'], ['method' => 'post']) !!}
                <div class="title">
                    <h4 class="mb-1">{{ __('Register') }}</h4>
                    <p class="mb-20">
                        {{ __('By using the system, you accept the') }} <a href="">
                            {{ __('Privacy Policy') }} </a> {{ __('and') }} <a href="">
                            {{ __('System Regulations') }}. </a>
                    </p>
                </div>
                <div class="form-group mb-20">
                    <input name="name" type="text" class="form-control" placeholder="{{ __('Full Name *') }}"
                        required="required">
                    @error('name')
                        <span class="error invalid-email text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-20">
                    <input name="email" type="email" class="form-control" placeholder="{{ __('Email *') }}"
                        required="required">
                    @error('email')
                        <span class="error invalid-email text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-20">
                    <input name="phone_number" type="text" class="form-control" placeholder="{{ __('Number *') }}"
                        required="required">
                    @error('number')
                        <span class="error invalid-email text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-20">
                    <input name="password" type="password" class="form-control" placeholder="{{ __('Password *') }}"
                        required="required">
                    @error('password')
                        <span class="error invalid-email text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-20">
                    <input name="password_confirmation" class="form-control" type="password"
                        placeholder="{{ __('Confirm Password *') }}" required="required">
                    @error('password_confirmation')
                        <span class="error invalid-email text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row align-items-center mb-20">
                    {{-- <div class="col-sm-4">
                        <div class="link">
                            <a href="404.html" target="_self" title="Link">Forgot password?</a>
                        </div>
                    </div> --}}
                    <div class="col-sm-8">
                        <div class="link go-signup">
                            {{ __('Already registered ?') }}
                            <a href="{{ route('customer.loginform', $slug) }}">
                                {{ __('Login') }}
                            </a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary w-100"> {{ __('Register') }} </button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- Authentication-area end -->
@endsection
@push('script-page')
@endpush
