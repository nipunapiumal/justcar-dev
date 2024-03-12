@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Login') }}
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
                        <h1>{{ __('Customer') }} {{ __('login') }}</h1>
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
                        <a href="{{ route('store.slug', $store->slug) }}">
                            @if (!empty($store->logo))
                                <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                    alt="Image placeholder">
                            @else
                                <img src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                    alt="Image placeholder">
                            @endif
                        </a>
                        
                        <div class="mb-5"></div>
                        {!! Form::open(
                            [
                                'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                                'id' => 'contact-form',
                            ],
                            ['method' => 'POST'],
                        ) !!}
                            <div class="form-group form-box">
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Your Email')]) }}
                            </div>
                            <div class="form-group form-box">
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => __('Enter Your Password')]) }}
                            </div>
                            {{-- <div class="form-group form-box checkbox clearfix"> --}}
                                {{-- <div class="form-check checkbox-theme"> --}}
                                    {{-- <input class="form-check-input" type="checkbox" value="" id="rememberMe" checked>
                                    <label>
                                        {{ __('By using the system, you accept the') }} <a href="" class="text-primary">
                                            {{ __('Privacy Policy') }} </a> {{ __('and') }} <a href="" class="text-primary">
                                            {{ __('System Regulations') }}. </a>
                                    </label> --}}
                                {{-- </div> --}}
                                {{-- <a href="forgot-password.html">Forgot Password</a> --}}
                            {{-- </div> --}}
                            <div class="form-group mt-4">
                                <button type="submit" class="btn-md btn-theme w-100">{{ __('Sign In') }}</button>
                            </div>
                            <p>{{ __('Dont have account ?') }}
                            <a href="{{ route('store.usercreate', $slug) }}">{{ __('Register') }}</a>
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
    <script>
        if ('{!! !empty($is_cart) && $is_cart == true !!}') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
