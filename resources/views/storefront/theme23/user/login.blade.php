@extends('storefront.layout.theme23')
@section('page-title')
    {{ __('Login') }}
@endsection
@section('content')
    <div class="login-1">
        <div class="container-fluid">
            <div class="row login-box">
                {{-- <div class="col-lg-6 bg-color-15 pad-0 none-992 bg-img"> --}}
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
                    <div class="form-inner">
                        {{-- <a href="{{ route('store.slug', $store->slug) }}">
                            @if (!empty($store->logo_dark))
                                <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                                    alt="Image placeholder">
                            @else
                                <img src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}" alt="Image placeholder">
                            @endif
                        </a> --}}
                        <h3 class="font-weight-bold">{{ __('Customer') }} {{ __('login') }}</h3>
                        {!! Form::open(
                            [
                                'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                            ],
                            ['method' => 'POST'],
                        ) !!}
                        <div class="form-group clearfix">
                            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Your Email')]) }}
                        </div>
                        <div class="form-group clearfix">
                            {{ Form::password('password', ['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => __('Enter Your Password')]) }}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-theme btn-md w-100">{{ __('Sign In') }}</button>
                        </div>
                        {{ Form::close() }}

                        <div class="clearfix"></div>
                        <p>
                            {{ __('Dont have account ?') }}
                            <a href="{{ route('store.usercreate', $slug) }}" class="thembo">{{ __('Register') }}</a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script>
        if ('{!! !empty($is_cart) && $is_cart == true !!}') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
