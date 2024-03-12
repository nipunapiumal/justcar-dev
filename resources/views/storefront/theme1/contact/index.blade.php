@extends('storefront.layout.theme1')
@section('page-title')
{{ __('Contact Us') }}
@endsection
@push('css-page')
@endpush
@section('content')
<div class="main-content">
    <section class="mh-100vh d-flex align-items-center" data-offset-top="#header-main">
        <!-- SVG background -->
        <div class="bg-absolute-cover bg-size--contain d-flex align-items-center zindex0">
            <figure class="w-100 px-4">
                <img alt="Image placeholder" src="{{ asset('assets/img/bg-3.svg') }}" class="svg-inject">
            </figure>
        </div>
        <div class="container pt-6 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center">
                        <!-- Empty cart container -->
                        <div class="login-form">
                            <div class="categories-heading mb-4 float-left">
                                <h2 class="">{{ __('Contact Us') }}</h2>
                            </div>
                            {!! Form::open(
                                ['route' => ['store.store-contact', $store->slug], 'class' => 'login-form-main py-5'],
                                ['method' => 'POST'],
                            ) !!}
                            <div class="form-group mt-2">
                                <label for="exampleInputEmail1"
                                    class="form-label float-left w-100 text-left">{{ __('First Name') }}</label>
                                <input name="first_name" class="form-control" type="text"
                                    placeholder="{{ __('First Name') }} *" required="required">
                            </div>
                            @error('first_name')
                                <span class="error invalid-email text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    class="form-label float-left w-100 text-left">{{ __('Last Name') }}</label>
                                <input name="last_name" class="form-control" type="text"
                                    placeholder="{{ __('Last Name') }} *" required="required">
                            </div>
                            @error('last_name')
                                <span class="error invalid-email text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    class="form-label float-left">{{ __('Email') }}</label>
                                <input name="email" class="form-control" type="email"
                                    placeholder="{{ __('Email') }} *" required="required">
                            </div>
                            @error('email')
                                <span class="error invalid-email text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    class="form-label float-left">{{ __('Phone No') }}</label>
                                <input name="phone" class="form-control" type="text"
                                    placeholder="{{ __('Phone No') }} *" required="required">
                            </div>
                            @error('phone')
                                <span class="error invalid-email text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    class="form-label float-left">{{ __('Subject') }}</label>
                                <input name="subject" class="form-control" type="text"
                                    placeholder="{{ __('Subject') }} *" required="required">
                            </div>
                            @error('subject')
                                <span class="error invalid-email text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    class="form-label float-left">{{ __('Message') }}</label>
                                    <textarea name="message" class="form-control" rows="6" maxlength="1000"></textarea>
                            </div>
                            @error('message')
                                <span class="error invalid-email text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <div class="log_in_btn form-group mt-5 mb-3 d-flex align-items-center">
                                <button type="submit"
                                    class="btn btn-primary rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me text-nowrap">{{ __('Get In Touch') }}</button>
                               
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('script-page')
    <script>
        $("#pro_scroll").click(function() {
            $('html, body').animate({
                scrollTop: $("#pro_items").offset().top
            }, 1000);
        });
    </script>
@endpush
