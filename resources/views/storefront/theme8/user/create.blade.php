@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Register') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Our SigUp -->
    <section class="our-log bgc-f9">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <div class="sign_up_form mt60-sm">
                        <h2 class="title">{{ __('Customer') }} <span> {{ __('Register') }} </span></h2>
                        <p>{{ __('Already registered ?') }}
                            <a href="{{ route('customer.loginform', $slug) }}" class="text-primary">{{ __('Login') }}</a>
                        </p>
                        {!! Form::open(['route' => ['store.userstore', $slug], 'class' => 'login-form-main'], ['method' => 'post']) !!}
                        <div class="form-group mt-2">
                            <label for="exampleInputEmail1"
                                class="form-label float-left w-100 text-left">{{ __('Full Name') }}</label>
                            <input name="name" class="form-control" type="text" placeholder="{{ __('Full Name *') }}"
                                required="required">
                        </div>
                        @error('name')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left">{{ __('Email') }}</label>
                            <input name="email" class="form-control" type="email" placeholder="{{ __('Email *') }}"
                                required="required">
                        </div>
                        @error('email')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left">{{ __('Number') }}</label>
                            <input name="phone_number" class="form-control" type="text"
                                placeholder="{{ __('Number *') }}" required="required">
                        </div>
                        @error('number')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left">{{ __('Password') }}</label>
                            <input name="password" class="form-control" type="password"
                                placeholder="{{ __('Password *') }}" required="required">
                        </div>
                        @error('password')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1"
                                class="form-label float-left">{{ __('Confirm Password') }}</label>
                            <input name="password_confirmation" class="form-control" type="password"
                                placeholder="{{ __('Confirm Password *') }}" required="required">
                        </div>
                        @error('password_confirmation')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="exampleCheck3" checked>
                            <label class="custom-control-label" for="exampleCheck3">
                                {{ __('By using the system, you accept the') }} <a href="" class="text-primary">
                                    {{ __('Privacy Policy') }} </a> {{ __('and') }} <a href=""
                                    class="text-primary"> {{ __('System Regulations') }}. </a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-signup btn-thm mt5">{{ __('Register') }}</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script-page')
@endpush
