@extends('storefront.layout.theme13to15')
@section('page-title')
    {{ __('Register') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-9">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2>{{ __('Customer') }} {{ __('Register') }}</h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Customer') }} {{ __('Register') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Area Start -->
    <div class="contact-form-area pt-100 pb-150">
        <div class="container">

            <div class="contact-form-wrapper fix">
                {!! Form::open(['route' => ['store.userstore', $slug], 'id' => 'contact-form'], ['method' => 'post']) !!}
                <div class="row">
                    <div class="col-md-7">
                        <p>{{ __('Already registered ?') }}
                            <a href="{{ route('customer.loginform', $slug) }}" class="text-primary">{{ __('Login') }}</a>
                        </p>

                        <input name="name" type="text" placeholder="{{ __('Full Name *') }}" required="required">
                        @error('name')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input name="email" type="email" placeholder="{{ __('Email *') }}" required="required">
                        @error('email')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input name="phone_number" type="text" placeholder="{{ __('Number *') }}" required="required">
                        @error('number')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input name="password" type="password" placeholder="{{ __('Password *') }}" required="required">
                        @error('password')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input name="password_confirmation" type="password" placeholder="{{ __('Confirm Password *') }}"
                            required="required">
                        @error('password_confirmation')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="custom-control custom-checkbox mb-2">
                            {{-- <input type="checkbox" class="custom-control-input" id="exampleCheck3" checked> --}}
                            <label class="custom-control-label" for="exampleCheck3">
                                {{ __('By using the system, you accept the') }} <a href="" class="text-primary">
                                    {{ __('Privacy Policy') }} </a> {{ __('and') }} <a href=""
                                    class="text-primary"> {{ __('System Regulations') }}. </a>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn default-btn gradient">
                    <span>{{ __('Register') }}</span>
                </button>
                {{-- <p class="form-messege"></p> --}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->
@endsection
@push('script-page')
@endpush
