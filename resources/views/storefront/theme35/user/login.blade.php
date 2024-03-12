@extends('storefront.layout.theme35')
@section('page-title')
    {{ __('Login') }}
@endsection
@section('content')
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="{{ asset('assets/theme35to37/images/page-title-bg-4.jpg') }}">
        <div class="container">
            <div class="content">
                <h2>{{ __('Login') }}</h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75">{{ __('Login') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Authentication-area start -->
    <div class="authentication-area ptb-100">
        <div class="container">
            <div class="auth-form border">
                {!! Form::open(
                    [
                        'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                    ],
                    ['method' => 'POST'],
                ) !!}
                <div class="title">
                    <h4 class="mb-20">{{ __('Login') }}</h4>
                </div>
                <div class="form-group mb-20">
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Your Email')]) }}
                </div>
                <div class="form-group mb-20">
                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => __('Enter Your Password')]) }}
                </div>
                <div class="row align-items-center mb-20">
                    {{-- <div class="col-sm-4">
                        <div class="link">
                            <a href="404.html" target="_self" title="Link">Forgot password?</a>
                        </div>
                    </div> --}}
                    <div class="col-sm-12">
                        <div class="link">
                                {{ __('Dont have account ?') }}
                                <a href="{{ route('store.usercreate', $slug) }}" class="thembo">{{ __('Register') }}</a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary w-100"> {{ __('Sign In') }} </button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- Authentication-area end -->
@endsection
@push('script-page')
    <script>
        if ('{!! !empty($is_cart) && $is_cart == true !!}') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
