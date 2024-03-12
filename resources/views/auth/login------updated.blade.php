@php
    $company_logo = \App\Models\Utility::GetLogo();
@endphp
@extends('layouts.authv2')
@section('page-title')
    {{ __('Login') }}
@endsection
@section('content')
    <div id="register">
        <aside>
            <figure>
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset(Storage::url('uploads/logo/' . $company_logo)) }}"
                        alt="{{ config('app.name', 'Storego') }}" width="150">
                </a>
            </figure>
            {{-- <div class="access_social">
                <a href="#0" class="social_bt facebook">Login with Facebook</a>
                <a href="#0" class="social_bt google">Login with Google</a>
            </div>
            <div class="divider"><span>Or</span></div> --}}
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <input id="email" type="email"
                    class="form-control  @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>
                    <i class="icon_mail_alt"></i>
                @error('email')
                    <span class="error invalid-email text-danger" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                        name="password" placeholder="{{ __('Password') }}" required>
                        
                        <i class="icon_lock_alt"></i>
                    @error('password')
                        <span class="error invalid-password text-danger" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                @if (env('RECAPTCHA_MODULE') == 'yes')
                    <div class="form-group col-lg-12 col-md-12 mt-3">
                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                            <span class="error small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
                <div class="clearfix add_bottom_15">

                    @if (Route::has('password.request'))
                        <div>
                            <a id="forgot" href="{{ route('password.request', $lang) }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif

                </div>
                @if (Route::has('password.request'))
                    <div class="d-flex">
                        <p>
                            {{ __('By using the system, you accept the') }}
                            <a href="{{ route('privacy') }}" class="text-primary"> {{ __('Privacy Policy') }} </a> and
                            <a href="{{ route('terms') }}" class="text-primary"> {{ __('Term & condition') }}. </a>
                        </p>
                    </div>
                @endif
                <button type="submit" class="btn_1 gradient full-width">{{ __('Login') }}</button>
                {{-- btn btn-primary btn-block mt-2 --}}

                @if (Utility::getValByName('signup_button') == 'on')
                    <div class="text-center mt-2">
                        <small>{{ __("Don't have an account?") }}<strong>
                                <a href="{{ route('register', $lang) }}">
                                    {{ __('Register') }}</a>
                            </strong>
                        </small>
                    </div>
                @endif


            </form>
            <div class="copy">
                &copy;
                {{ Utility::getValByName('footer_text') ? Utility::getValByName('footer_text') : config('app.name', 'WorkGo') }}
                {{ date('Y') }}
            </div>
        </aside>
    </div>
@endsection
@push('custom-scripts')
    <script src="{{ asset('custom/libs/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".form_data").submit(function(e) {
                $(".login_button").attr("disabled", true);
                return true;
            });
        });
    </script>
    @if (env('RECAPTCHA_MODULE') == 'yes')
        {!! NoCaptcha::renderJs() !!}
    @endif
@endpush
