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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="StoreGo - Business Ecommerce">
    <title>
        {{ \App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'StoreGo SaaS') }}
        - @yield('page-title')</title>

    <link rel="icon" href="{{ asset(Storage::url('uploads/logo/')) . '/favicon.png' }}" type="image/png">
    <!-- CSS Libraries -->
  
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('assets/login/css/bootstrap_customized.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/login/css/style.css') }}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('assets/login/css/order-sign_up.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/login/css/custom.css') }}" rel="stylesheet">

</head>

<body id="register_bg" class="{{ $color }}">
    @yield('content')
    @stack('custom-scripts')
    <!-- Custom js from entire application here -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js') }}"></script>
    {{-- <script src="{{ asset('custom/js/jquery.min.js') }}"></script>
    <script src="{{ asset('custom/js/custom.js?v=3') }}"></script> --}}

    <script src="{{ asset('assets/login/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/common_func.js') }}"></script>
    {{-- <script src="{{ asset('assets/login/js/validate.js') }}"></script> --}}

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
