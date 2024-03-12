@extends('layouts.authv2')
@section('page-title')
    {{ __('Register') }}
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
                    <h4 class="f-w-600">{{ __('Register') }}</h4>
                    
                </div>
            </figure>
           
            <form method="POST" action="{{ route('register') }}" class="needs-validation mt-4" novalidate="">
                @csrf

                {{-- <div class="">
                    <h2 class="mb-3 f-w-600">{{ __('Register') }}</h2>
                </div> --}}
                <div class="">
                    <div class="form-group mb-3">
                        {{ Form::hidden('username', null) }}
                        <label class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="error invalid-name text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">{{ __('Store Name') }}</label>
                        <input id="store_name" type="text" class="form-control @error('store_name') is-invalid @enderror"
                            name="store_name" value="{{ old('store_name') }}" required autocomplete="store_name">
                        @error('store_name')
                            <span class="error invalid-name text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="error invalid-email text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="error invalid-password text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label class="form-label">{{ __('Confirm password') }}</label>
                        <input id="password-confirm" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="error invalid-password_confirmation text-danger" role="alert">
                                <strong>{{ $message }}</strong>
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

                    <div class="mt-2">
                        <p>
                            {{ __('By using the system, you accept the') }}
                            <a href="{{ route('privacy') }}" class="text-primary"> {{ __('Privacy Policy') }} </a>
                            and
                            <a href="{{ route('terms') }}" class="text-primary"> {{ __('Term & condition') }}.
                            </a>
                        </p>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary btn-block mt-2" type="submit">{{ __('Register') }}</button>
                    </div>

                    <p class="mb-2 my-4 text-center">{{ __('Already have an account?') }} <a
                            href="{{ route('login', $lang) }}" class="f-w-400 text-primary">{{ __('Login') }}</a></p>

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
    @if (env('RECAPTCHA_MODULE') == 'yes')
        {!! NoCaptcha::renderJs() !!}
    @endif
@endpush
