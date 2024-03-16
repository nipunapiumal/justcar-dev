@extends('storefront.layout.theme23')
@section('page-title')
    {{ __('Register') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Contact section start -->
    <div class="login-1">
        <div class="container-fluid">
            <div class="row login-box">
                <div style="cursor: pointer" class="col-lg-6 d-flex justify-content-center align-items-center bg-dark d-none d-lg-flex" onclick="location.href='{{ route('store.slug', $store->slug) }}'">
                    @if (!empty($store->logo))
                        <img width="300" src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                            alt="Image placeholder">
                    @else
                        <img width="300"class="logo1 img-fluid"
                            src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}" alt="Image placeholder">
                    @endif
                    {{-- <div class="info clearfix">
                        <h1>{{ __('Welcome to') }} <a
                                href="{{ route('store.slug', $store->slug) }}" class="fw-bolder">{{ env('APP_NAME') }}</a></h1>
                        <p>{{ __('By using the system, you accept the') }} <a href="">
                                {{ __('Privacy Policy') }} </a> {{ __('and') }} <a href="">
                                {{ __('System Regulations') }}</a></p>
                    </div> --}}
                </div>
                <div class="col-lg-6 align-self-center pad-0 form-section">
                    <div class="login-inner-form">
                        <div class="form-inner">
                            <h3 class="font-weight-bold">{{ __('Customer') }}  {{ __('Register') }}</h3>
                            <div class="mb-5"></div>
                            {!! Form::open(['route' => ['store.userstore', $slug], 'id' => 'contact-form'], ['method' => 'post']) !!}
                            <div class="form-group form-box">
                                <input name="name" type="text" class="form-control"
                                    placeholder="{{ __('Full Name *') }}" required="required">
                                @error('name')
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-box">
                                <input name="email" type="email" class="form-control" placeholder="{{ __('Email *') }}"
                                    required="required">
                                @error('email')
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-box">
                                <input name="phone_number" type="text" class="form-control"
                                    placeholder="{{ __('Number *') }}" required="required">
                                @error('number')
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-box">
                                <input name="password" type="password" class="form-control"
                                    placeholder="{{ __('Password *') }}" required="required">
                                @error('password')
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-box">
                                <input name="password_confirmation" class="form-control" type="password"
                                    placeholder="{{ __('Confirm Password *') }}" required="required">
                                @error('password_confirmation')
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group mt-4">
                                <button type="submit" class="btn-md btn-theme w-100">{{ __('Register') }}</button>
                            </div>
                            <p>{{ __('Already registered ?') }}
                                <a href="{{ route('customer.loginform', $slug) }}">{{ __('Login') }}</a>
                            </p>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact section end -->
@endsection
@push('script-page')
@endpush
