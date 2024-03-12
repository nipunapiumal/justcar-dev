@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Register') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Contact section start -->
    <div class="contact-section tab-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-12 bg-img">
                    <div class="informeson">
                        <div class="typing">
                            <h1>{{ __('Customer') }} {{ __('Register') }}</h1>
                        </div>
                        <p>
                            {{ __('By using the system, you accept the') }} <a href="" class="text-primary">
                                {{ __('Privacy Policy') }} </a> {{ __('and') }} <a href="" class="text-primary">
                                {{ __('System Regulations') }}. </a>
                        </p>
                        {{-- <div class="social-list">
                        <div class="buttons">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                            <a href="#" class="dribbble-bg"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div> --}}
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 form-section">
                    <div class="login-inner-form">
                        <div class="details">
                            {{-- <a href="{{ route('store.slug', $store->slug) }}">
                                @if (!empty($store->logo))
                                    <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                        alt="Image placeholder">
                                @else
                                    <img src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                        alt="Image placeholder">
                                @endif
                            </a> --}}

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
