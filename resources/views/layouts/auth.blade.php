@php
    // get theme color
    $setting = App\Models\Utility::colorset();
    $color = 'theme-4';
    if (!empty($setting['color'])) {
        $color = $setting['color'];
    }
    $company_logo = \App\Models\Utility::GetLogo();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on' ? 'rtl' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name', 'Laravel') }}">
    <title>
        {{ \App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'Laravel') }}
        - @yield('page-title')</title>

    <link rel="icon" href="{{ asset(Storage::url('uploads/logo/')) . '/favicon.png' }}" type="image/png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">

    <link rel="stylesheet"
        href="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.css') }}">

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">
    @if ($setting['SITE_RTL'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}" id="main-style-link">
    @endif
    @if ($setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    @endif
</head>

<body class="{{ $color }}">
    <div class="auth-wrapper auth-v3">
        @if(\Request::route()->getName()!="privacy" && \Request::route()->getName()!="terms")
        <div class="bg-auth-side bg-primary"></div>
        @endif
        <div class="auth-content">
            <nav class="navbar navbar-expand-md navbar-light default">
                <div class="container-fluid pe-2">
                    <a class="navbar-brand" href="{{route('dashboard')}}">
                        <img src="{{ asset(Storage::url('uploads/logo/' . $company_logo)) }}"
                            alt="{{ config('app.name', 'Storego') }}" class="navbar-brand-img auth-navbar-brand">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="flex-grow: 0;">
                        <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">{{ __('Support') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('terms',app()->getLocale())}}">{{ __('Term & condition') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('privacy',app()->getLocale())}}">{{ __('Privacy Policy') }}</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            @yield('language-bar')
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
            <div class="auth-footer">
                <div class="container-fluid">
                    <p class="">{{ __('Copyright') }} &copy;
                        {{ Utility::getValByName('footer_text') ? Utility::getValByName('footer_text') : config('app.name', 'WorkGo') }}
                        {{ date('Y') }}</p>
                </div>
            </div>
        </div>
    </div>
    @stack('custom-scripts')
    <!-- Custom js from entire application here -->
    <script src="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js') }}"></script>
    <script src="{{ asset('custom/js/jquery.min.js') }}"></script>
    <script src="{{ asset('custom/js/custom.js?v=3') }}"></script>

    @if (Session::has('success'))
        <script>
            showToast('{{ __('Success') }}', '{!! session('success') !!}', 'success');
            // show_toastr('{{ __('Success') }}', '{!! session('success') !!}', 'success');
        </script>
        {{ Session::forget('success') }}
    @endif
    @if (Session::has('error'))
        <script>
            showToast('{{ __('Error') }}', '{!! session('error') !!}', 'error');
            // show_toastr('{{ __('Error') }}', '{!! session('error') !!}', 'error');
        </script>
        {{ Session::forget('error') }}
    @endif

    @stack('script')

</body>

</html>
