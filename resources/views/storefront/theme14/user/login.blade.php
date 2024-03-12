@extends('storefront.layout.theme13to15')
@section('page-title')
    {{ __('Login') }}
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
                        <h2>{{ __('Customer') }} {{ __('login') }}</h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Customer') }} {{ __('login') }}</li>
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
                {!! Form::open(
                    [
                        'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                        'id' => 'contact-form',
                    ],
                    ['method' => 'POST'],
                ) !!}

                <div class="row">
                    <div class="col-md-7">
                        <p>
                            {{ __('Dont have account ?') }}
                            <a href="{{ route('store.usercreate', $slug) }}"
                                class="login-form-main-a text-primary">{{ __('Register') }}</a>
                        </p>
                        {{ Form::text('email', null, ['class' => '', 'placeholder' => __('Enter Your Email')]) }}
                        {{-- <input type="text" name="first_name" placeholder="{{ __('First Name') }}"> --}}
                    </div>
                    <div class="col-md-7">
                        {{-- <input type="text" name="last_name" placeholder="{{ __('Last Name') }}"> --}}
                        {{ Form::password('password', ['class' => '', 'id' => 'exampleInputPassword1', 'placeholder' => __('Enter Your Password')]) }}
                    </div>
                </div>
                <div class="custom-control custom-checkbox">
                    {{-- <input type="checkbox" class="custom-control-input" id="exampleCheck3" checked> --}}
                    <label class="custom-control-label" for="exampleCheck3">
                        {{ __('By using the system, you accept the') }} <a href="" class="text-primary">
                            {{ __('Privacy Policy') }} </a> {{ __('and') }} <a href="" class="text-primary">
                            {{ __('System Regulations') }}. </a>
                    </label>
                </div>


                <button type="submit" class="submit-btn default-btn gradient">
                    <span>{{ __('Sign In') }}</span>
                </button>
                {{-- <p class="form-messege"></p> --}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->
@endsection
@push('script-page')
    <script>
        if ('{!! !empty($is_cart) && $is_cart == true !!}') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
