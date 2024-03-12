@extends('layouts.authv2')
@section('page-title')
    {{ __('Login') }}
@endsection
@section('content')
<div id="auth">
    <aside>
        <figure>
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset(Storage::url('uploads/logo/' . \App\Models\Utility::GetLogo())) }}"
                    alt="{{ config('app.name', 'Storego') }}" width="150">
            </a>
            <div class="mt-4 text-center">
                <h4 class="f-w-600">{{ __('Login') }}</h4>
                
            </div>
        </figure>
        <form method="POST" action="{{ route('login') }}" class="needs-validation mt-4" novalidate="">
            @csrf
            <div>
                <div class="form-group mb-3">
                    <label class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email"
                        class="form-control  @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>
                    @error('email')
                        <span class="error invalid-email text-danger" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password"
                        class="form-control  @error('password') is-invalid @enderror" name="password"
                        placeholder="{{ __('Password') }}" required>
                    @error('password')
                        <span class="error invalid-password text-danger" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                    @if (Route::has('password.request'))
                        <div class="mt-2">
                            <a href="{{ route('password.request', $lang) }}"
                                class="small text-muted text-underline--dashed border-primar">{{ __('Forgot Your Password?') }}</a>
                        </div>
                        <div class="mt-2">
                            <p>
                                {{ __('By using the system, you accept the') }}
                                <a href="{{route("privacy")}}" class="text-primary"> {{ __('Privacy Policy') }} </a> and
                                <a href="{{route("terms")}}" class="text-primary"> {{ __('Term & condition') }}. </a>
                            </p>
                        </div>
                    @endif
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

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block mt-2"
                        tabindex="4">{{ __('Login') }}</button>
                </div>

                @if (Utility::getValByName('signup_button') == 'on')
                    <p class="my-4 text-center">{{ __("Don't have an account?") }}
                        <a href="{{ route('register', $lang) }}"
                            class="my-4 text-primary">{{ __('Register') }}</a>
                    </p>
                @endif
            </div>
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
        // $(document).ready(function() {
        //     $(".form_data").submit(function(e) {
        //         $(".login_button").attr("disabled", true);
        //         return true;
        //     });
        // });
    </script>
    @if (env('RECAPTCHA_MODULE') == 'yes')
        {!! NoCaptcha::renderJs() !!}
    @endif
@endpush
