@extends('storefront.layout.themePlus1')
@section('page-title')
    {{ __('Login') }}
@endsection
@push('css-page')
@endpush
@section('content')

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="font-weight-bold text-dark">{{ __('Customer') }} {{ __('login') }}</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Login') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-6 mb-5 mb-lg-0">
            {{-- <h2 class="font-weight-bold text-5 mb-0">Login</h2> --}}
            {!! Form::open(
                [
                    'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                    'id' => 'contact-form',
                ],
                ['method' => 'POST'],
            ) !!}
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">{{__('Email')}} <span class="text-color-danger">*</span></label>
                        {{ Form::text('email', null, ['class' => 'form-control form-control-lg text-4', 'placeholder' => __('Enter Your Email')]) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3"> {{__('Password')}} <span class="text-color-danger">*</span></label>
                        {{ Form::password('password', ['class' => 'form-control form-control-lg text-4', 'placeholder' => __('Enter Your Password')]) }}
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
                        <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">{{ __('Sign In') }}</button>
                    </div>
                    <p class="text-center">{{ __('Dont have account ?') }}
                        <a href="{{ route('store.usercreate', $slug) }}">{{ __('Register') }}</a>
                        </p>
                </div>
                {{ Form::close() }}
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
