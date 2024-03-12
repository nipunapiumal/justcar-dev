@php
    // get theme color
    $setting = App\Models\Utility::colorset();
    $color = 'theme-4';
    if (!empty($setting['color'])) {
        $color = $setting['color'];
    }
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

<body id="auth-bg" class="{{ $color }}">
    @yield('content')
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
