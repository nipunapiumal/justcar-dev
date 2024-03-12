@php
$logo = asset(Storage::url('uploads/logo/'));
$favicon = \App\Models\Utility::getValByName('company_favicon');

@endphp

<head>
    <meta charset="utf-8"  dir="{{ $setting['SITE_RTL'] == 'on' ? 'rtl' : '' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=  ">
    <meta name="description" content="{{ env('APP_NAME') }} - Online Store Builder">

    <title>
        {{ \App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'Laravel') }}
        - @yield('page-title')</title>
    @if (\Auth::user()->type == 'super admin')
        <link rel="icon" href="{{ $logo . '/favicon.png' }}" type="image" sizes="16x16">
    @else
        <link rel="icon" href="{{ $logo . '/' . (isset($favicon) && !empty($favicon) ? $favicon : 'favicon.png') }}"
            type="image" sizes="16x16">
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">


    @if (\Auth::user()->type == 'Owner')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-tour-standalone.min.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('custom/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css') }}">

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('custom/libs/@fortawesome/fontawesome-free/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/font-awesome.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/libs/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/libs/select2/dist/css/select2.min.css') }}">
    <!-- vendor css -->

    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/landing.css')}}"> --}}
    {{-- dark theme --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css')}}"> --}}
    {{-- end --}}


    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-switch-button.min.css') }}">
    

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">


    @if (isset($setting['SITE_RTL'] ) && $setting['SITE_RTL'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}" id="main-style-link">
    @endif
    @if ($setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    @endif

    @stack('css-page')
    <script>
        var jsLang = @json(\App\Models\Utility::jsLanguageAdmin());

    </script>
</head>
