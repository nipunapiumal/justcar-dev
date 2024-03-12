@extends('layouts.authv2')
@section('page-title')
    {{__('Reset Password')}}
@endsection
@section('content')
<div id="auth">
    <aside>
        <figure>
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset(Storage::url('uploads/logo/' . \App\Models\Utility::GetLogo())) }}"
                    alt="{{ config('app.name', 'Storego') }}" width="150">
            </a>
            <div class="text-center mt-4">
                <h4 class="f-w-600">{{ __('Forgot Password') }}</h4>
                @if(session('status'))
                    <div class="alert alert-primary">
                        {{ session('status') }}
                    </div>
                @endif
              <p class="text-xs text-muted">{{__('We will send a link to reset your password')}}</p>
            </div>
        </figure>
       
        <form method="POST" action="{{ route('password.email') }}" id="form_data" class="mt-4 ">
            @csrf
            <div class="">
                <div class="form-group mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="error invalid-email text-danger" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                @if(env('RECAPTCHA_MODULE') == 'yes')
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
                    <button class="btn btn-primary btn-submit btn-block mt-2">{{ __('Send Password Reset Link') }}  </button>
                </div>
                <p class="my-4 text-center">{{__('Back to')}}
                    <a href="{{route('login',$lang)}}" class="my-4 text-primary">{{ __('Login') }}</a>
                </p>
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
@if(env('RECAPTCHA_MODULE') == 'yes')
        {!! NoCaptcha::renderJs() !!}
@endif
@endpush
