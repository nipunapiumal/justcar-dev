<!DOCTYPE html>
<html lang="en" dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">
@php
    $userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
    $settings = \DB::table('settings')
        ->where('name', 'company_favicon')
        ->where('created_by', $store->id)
        ->first();

    $creator = \App\Models\User::find($store->created_by);
    $plan = \App\Models\Plan::find($creator->plan);

    $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);

@endphp


<head>
    @if (!empty($store->cookiebot_group_id) && $store->is_cookiebot_enable == 'on')
        <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="<?php echo $store->cookiebot_group_id; ?>"
            data-blockingmode="auto" type="text/javascript"></script>
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="{{ $store->metakeyword }}">

    @if (isset($pageoption))
        <meta name="description" content="{{ $pageoption->meta_description }}">
        <title>{{ $pageoption->meta_title }}</title>
    @else
        <meta name="description" content="{{ $store->metadesc }}">
        <title>@yield('page-title') - {{ $store->tagline ? $store->tagline : config('APP_NAME', ucfirst($store->name)) }}
        </title>
    @endif

    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon"
        href="{{ asset(Storage::url('uploads/logo/') . (!empty($settings->value) ? $settings->value : 'favicon.png')) }}"
        type="image/png">



    @include('storefront.layout.initialize-css')

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/themePlus1/vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/themePlus1/vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/themePlus1/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themePlus1/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/themePlus1/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme16to21/css/magnific-popup.css') }}">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/themePlus1/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themePlus1/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themePlus1/css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themePlus1/css/theme-shop.css') }}">


    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ asset('assets/themePlus1/css/demos/demo-transportation-logistic.css?v=2') }}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet"
        href="{{ asset('assets/themePlus1/css/skins/skin-transportation-logistic.css') }}">


    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/themePlus1/css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('assets/themePlus1/vendor/modernizr/modernizr.min.js') }}"></script>


    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/theme16to21/css/ie10-viewport-bug-workaround.css') }}">

    @stack('css-page')
</head>

<body data-plugin-page-transition>
    @php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }
        $languages = \App\Models\Utility::languages($store->slug);
    @endphp
    <div class="body p-relative bottom-1">
        <header id="header" class="header-effect-reveal"
            data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'reveal', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': false, 'stickyStartAt': 200, 'stickySetTop': '-44px'}">
            <div class="header-body border-0 border-bottom-light">
                <div class="header-container container-fluid p-0">
                    <div class="header-row">
                        <div class="header-column header-column-border-right flex-grow-0 d-sticky-header-active-none">
                            <div class="header-row">
                                <div class="header-logo p-relative top-1 m-0">
                                    <a href="{{ route('store.slug', $store->slug) }}">
                                        @if (!empty($store->logo_dark))
                                            <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                                                width="250px" height="150px" alt="Image placeholder"
                                                style="object-fit: contain">
                                        @else
                                            <img class="logo1 img-fluid"
                                                src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                                width="250px" height="150px" alt="Image placeholder"
                                                style="object-fit: contain">
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column">
                            @php
                                // print_r($storethemesetting);
                            @endphp
                            @if ($storethemesetting['enable_top_bar'] == 'on')
                                <div class="border-bottom-light w-100">
                                    <div class="hstack gap-4 px-4 py-2 font-weight-semi-bold d-none d-lg-flex">
                                        <div class="d-none d-lg-inline-block ps-1"><a
                                                class="text-color-default text-color-hover-primary text-2"
                                                href="#">{{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220' }}</a>
                                        </div>
                                        <div class="vr d-lg-inline-block opacity-2 d-none d-xl-inline-block"></div>
                                        <div class="d-none d-xl-inline-block"><a
                                                class="text-color-default text-color-hover-primary text-2"
                                                href="#">{{ !empty($storethemesetting['email']) ? $storethemesetting['email'] : '' }}</a>
                                        </div>
                                        <div class="vr opacity-2 d-none d-xl-inline-block"></div>
                                        <div class="d-none d-xl-inline-block"><span
                                                class="text-color-default text-color-hover-primary text-2">
                                                {{ !empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199' }}
                                            </span></div>
                                        <div class="ms-auto d-none d-lg-inline-block">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link text-2 p-0 text-color-default" href="#"
                                                        role="button" id="dropdownLanguage" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        {{ \App\Models\Utility::getLangCodes($currantLang) }}
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-end text-2"
                                                        aria-labelledby="dropdownLanguage">
                                                        @foreach ($languages as $language)
                                                            <a class="dropdown-item text-color-default"
                                                                href="{{ route('change.languagestore', [$store->slug, $language]) }}">{{ \App\Models\Utility::getLangCodes($language) }}</a>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="vr opacity-2 d-none d-lg-inline-block"></div>


                                        <div class="d-none d-lg-inline-block">
                                            <ul class="nav nav-pills me-1">
                                                @if (!empty($storethemesetting['whatsapp']))
                                                    <li class="nav-item pe-2 mx-1">
                                                        <a href="https://wa.me/{{ $storethemesetting['whatsapp'] }}"
                                                            target="_blank" title="Whatsapp"
                                                            class="text-color-default text-color-hover-primary text-2"><i
                                                                class="fab fa-whatsapp"></i></a>
                                                    </li>
                                                @endif
                                                @if (!empty($storethemesetting['facebook']))
                                                    <li class="nav-item pe-2 mx-1">
                                                        <a href="{{ $storethemesetting['facebook'] }}"
                                                            target="_blank" title="Facebook"
                                                            class="text-color-default text-color-hover-primary text-2"><i
                                                                class="fab fa-facebook"></i></a>
                                                    </li>
                                                @endif
                                                @if (!empty($storethemesetting['twitter']))
                                                    <li class="nav-item px-2 mx-1">
                                                        <a href="{{ $storethemesetting['twitter'] }}" target="_blank"
                                                            title="Twitter"
                                                            class="text-color-default text-color-hover-primary text-2"><i
                                                                class="fab fa-twitter"></i></a>
                                                    </li>
                                                @endif
                                                @if (!empty($storethemesetting['email']))
                                                    <li class="nav-item px-2 mx-1">
                                                        <a href="{{ $storethemesetting['email'] }}" target="_blank"
                                                            title="Email"
                                                            class="text-color-default text-color-hover-primary text-2"><i
                                                                class="fa fa-envelope"></i></a>
                                                    </li>
                                                @endif
                                                @if (!empty($storethemesetting['instagram']))
                                                    <li class="nav-item px-2 mx-1">
                                                        <a href="{{ $storethemesetting['instagram'] }}"
                                                            target="_blank" title="Instagram"
                                                            class="text-color-default text-color-hover-primary text-2"><i
                                                                class="fab fa-instagram"></i></a>
                                                    </li>
                                                @endif
                                                @if (!empty($storethemesetting['youtube']))
                                                    <li class="nav-item px-2 mx-1">
                                                        <a href="{{ $storethemesetting['youtube'] }}" target="_blank"
                                                            title="Youtube"
                                                            class="text-color-default text-color-hover-primary text-2"><i
                                                                class="fab fa-youtube"></i></a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="header-row h-100">
                                <div class="hstack h-100 w-100">
                                    <div class="d-flex pe-3 ps-3">
                                        @if (Utility::CustomerAuthCheck($store->slug) == true)
                                            <ul class="header-extra-info">
                                                <li class="me-2 ms-3">
                                                    <div class="header-extra-info-icon">
                                                        <a href="{{ route('store.wishlist', $store->slug) }}"
                                                            class="text-decoration-none text-color-dark text-color-hover-primary text-2">
                                                            <i class="icons icon-heart"></i>
                                                            {{-- <span class="cart-info">
                                                                <span class="cart-qty wishlist_count"
                                                                    id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                                                            </span> --}}
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endif
                                        {{-- onclick="location.href='{{ route('store.cart', $store->slug) }}'" --}}
                                        <div class="header-nav-features ps-0 ms-1">
                                            <div
                                                class="header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex top-2 ms-2">
                                                <a href="{{ route('store.cart', $store->slug) }}">
                                                    <img src="{{ asset('assets/themePlus1/img/demos/transportation-logistic/icons/icon-cart-big.svg') }}"
                                                        height="30" alt=""
                                                        class="header-nav-top-icon-img">
                                                    <span class="cart-info">
                                                        <span class="cart-qty shopping_count"
                                                            id="shopping_count">{{ !empty($total_item) ? $total_item : '0' }}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="h-100 w-100 w-xl-auto">
                                        <div
                                            class="header-nav header-nav-links h-100 justify-content-end justify-content-lg-start me-4 me-lg-0 ms-lg-3">
                                            <div
                                                class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-text-capitalize header-nav-main-text-size-4 header-nav-main-arrows header-nav-main-full-width-mega-menu header-nav-main-mega-menu-bg-hover header-nav-main-effect-5">
                                                <nav class="collapse">
                                                    <ul class="nav nav-pills" id="mainNav">
                                                        {{-- <li class="dropdown">
                                                            <a class="nav-link"
                                                                href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                                                        </li> --}}
                                                        @php
                                                            if (!isset($storethemesetting['primary_nav_menu'])) {
                                                                $storethemesetting['primary_nav_menu'] = Utility::defaultMenu($storethemesetting, $store, $plan);
                                                            }
                                                        @endphp

                                                        @if ($storethemesetting['primary_nav_menu'])
                                                            @foreach (json_decode($storethemesetting['primary_nav_menu']) as $menu_title)
                                                                @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                                    <li>
                                                                        <a class="nav-link"
                                                                            href="{{ $info['link_url'] }}">
                                                                            {{ $info['link_name'] }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                        @if (isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu'])
                                                            <li class="dropdown">
                                                                <a class="nav-link dropdown-toggle" href="#">
                                                                    {{ __('More') }}
                                                                </a>
                                                                <ul class="dropdown-menu border-light mt-n1">
                                                                    @foreach (json_decode($storethemesetting['secondary_nav_menu']) as $menu_title)
                                                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                    href="{{ $info['link_url'] }}">
                                                                                    {{ $info['link_name'] }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endif


                                                        @if (Utility::CustomerAuthCheck($store->slug) != true)
                                                            <li class="d-md-none ">
                                                                <a href="{{ route('customer.login', [$store->slug]) }}"
                                                                    class="nav-link">
                                                                    {{ __('Log in') }}
                                                                </a>
                                                            </li>
                                                            <li class="d-md-none">
                                                                <a href="{{ route('store.usercreate', [$store->slug]) }}"
                                                                    class="nav-link">
                                                                    {{ __('Register') }}
                                                                </a>
                                                            </li>
                                                        @endif





                                                        @if (Utility::CustomerAuthCheck($store->slug) == true)

                                                            <li class="dropdown">
                                                                <a class="nav-link dropdown-toggle" href="#">
                                                                    {{ ucFirst(Auth::guard('customers')->user()->name) }}
                                                                </a>
                                                                <ul class="dropdown-menu border-light mt-n1">
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('store.slug', $store->slug) }}">
                                                                            {{ __('My Dashboard') }}
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)]) }}">

                                                                            {{ __('My Profile') }}
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('customer.home', $store->slug) }}"
                                                                            class="nav-link">

                                                                            {{ __('My Orders') }}
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        @if (Utility::CustomerAuthCheck($store->slug) == false)
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('customer.login', $store->slug) }}"
                                                                                class="nav-link">
                                                                                {{ __('Sign in') }}
                                                                            </a>
                                                                        @else
                                                                            <a class="dropdown-item" href="#"
                                                                                onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                                                                class="nav-link">
                                                                                {{ __('Logout') }}
                                                                            </a>
                                                                            <form id="customer-frm-logout"
                                                                                action="{{ route('customer.logout', $store->slug) }}"
                                                                                method="POST" class="d-none">
                                                                                {{ csrf_field() }}
                                                                            </form>
                                                                        @endif
                                                                    </li>
                                                                </ul>
                                                            </li>


                                                        @endif


                                                        {{-- <li class="dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#">
                                                                Pages
                                                            </a>
                                                            <ul class="dropdown-menu border-light mt-n1">
                                                                <li>
                                                                    <a href="page-team.html"
                                                                        class="dropdown-item">Team</a>
                                                                </li>
                                                                <li>
                                                                    <a href="page-careers.html"
                                                                        class="dropdown-item">Careers</a>
                                                                </li>
                                                                <li>
                                                                    <a href="page-faq.html"
                                                                        class="dropdown-item">FAQ's</a>
                                                                </li>
                                                            </ul>
                                                        </li> --}}
                                                        {{-- <li>
                                                            <a class="nav-link"
                                                                href="demo-transportation-logistic-news.html">
                                                                News
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="nav-link"
                                                                href="demo-transportation-logistic-contact-us.html">
                                                                Contact Us
                                                            </a>
                                                        </li> --}}
                                                    </ul>
                                                </nav>
                                            </div>
                                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
                                                data-bs-target=".header-nav-main nav">
                                                <i class="fas fa-bars"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if (Utility::CustomerAuthCheck($store->slug) != true)
                                        <div class="vr opacity-2 ms-auto d-none d-xl-inline-block"></div>
                                        <div class="px-4 d-none d-xxl-inline-block ws-nowrap">
                                            <a href="{{ route('customer.login', [$store->slug]) }}"
                                                class="btn border-0 px-4 py-2 line-height-9 btn-tertiary me-2">{{ __('Log in') }}</a>
                                            <a href="{{ route('store.usercreate', [$store->slug]) }}"
                                                class="btn border-0 px-4 py-2 line-height-9 btn-primary">{{ __('Register') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div role="main" class="main">

            {{-- @if (!empty($store->cookiebot_group_id) && $store->is_cookiebot_enable == 'on')
                <script id="CookieDeclaration" src="https://consent.cookiebot.com/<?php echo $store->cookiebot_group_id; ?>/cd.js" type="text/javascript" async></script>
            @endif --}}

            @yield('content')
        </div>

        <footer id="footer" class="position-relative top-1 bg-tertiary border-top-0">

            <div class="container py-5">
                <div class="row pt-5">
                    <div class="col-lg-4">

                        <a href="#" class="text-decoration-none">
                            @if (
                                !empty($storethemesetting['footer_logo']) &&
                                    \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo']))
                                <img src="{{ asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo'])) }}"
                                    alt="Footer logo" class="img-fluid mb-4" width="150">
                            @else
                                <img src="{{ asset(Storage::url('uploads/store_logo/footer_logo.png')) }}"
                                    alt="Footer logo" class="img-fluid mb-4" width="150">
                            @endif

                            {{-- <img src="img/demos/transportation-logistic/logo-footer.png" class="img-fluid mb-4"
                                width="88"> --}}
                        </a>
                        <p class="text-3-5 pe-lg-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit quisque
                            rutrum pellentesqu. </p>
                        <ul class="list list-unstyled">
                            <li class="d-flex align-items-center mb-4">
                                <a href="mailto:porto@transportation-logistic.com"
                                    class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-4-5">
                                    {{ !empty($storethemesetting['email']) ? $storethemesetting['email'] : '' }}
                                </a>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <a href="tel:8001234567"
                                    class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-4-5">
                                    {{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '' }}
                                </a>
                            </li>
                        </ul>
                        {{-- <div class="d-none d-xxl-inline-block ws-nowrap">
                            <a href="#"
                                class="btn border-0 px-4 py-2 line-height-9 btn-light text-color-dark me-2">Request
                                Rate</a>
                            <a href="#" class="btn border-0 px-4 py-2 line-height-9 btn-primary">Track Order</a>
                        </div> --}}
                    </div>
                    <div class="col-lg-8">
                        <div class="row mb-5">
                            @if (isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on')
                                <div class="col-lg-4 mb-4 mb-lg-0">
                                    <div class="footer-item">
                                        <h4 class="text-color-light font-weight-semibold mb-3">
                                            {{ __($storethemesetting['quick_link_header_name1']) }}
                                        </h4>
                                        <ul class="list list-unstyled">
                                            @if (isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1'])
                                                @foreach (json_decode($storethemesetting['footer_menu_1']) as $menu_title)
                                                    @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                        <li>
                                                            <a href="{{ $info['link_url'] }}">
                                                                {{ $info['link_name'] }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if (isset($storethemesetting['enable_quick_link2']) && $storethemesetting['enable_quick_link2'] == 'on')
                                <div class="col-lg-4">
                                    <div class="footer-item">
                                        <h4 class="text-color-light font-weight-semibold mb-3">
                                            {{ __($storethemesetting['quick_link_header_name2']) }}
                                        </h4>
                                        <ul class="list list-unstyled">
                                            @if (isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2'])
                                                @foreach (json_decode($storethemesetting['footer_menu_2']) as $menu_title)
                                                    @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                        <li>
                                                            <a href="{{ $info['link_url'] }}">
                                                                {{ $info['link_name'] }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if (isset($storethemesetting['enable_quick_link3']) && $storethemesetting['enable_quick_link3'] == 'on')
                                <div class="col-lg-4">
                                    <div class="footer-item">
                                        <h4 class="text-color-light font-weight-semibold mb-3">
                                            {{ __($storethemesetting['quick_link_header_name3']) }}
                                        </h4>

                                        <ul class="list list-unstyled">
                                            @if (isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3'])
                                                @foreach (json_decode($storethemesetting['footer_menu_3']) as $menu_title)
                                                    @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                        <li>
                                                            <a href="{{ $info['link_url'] }}">
                                                                {{ $info['link_name'] }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            @endif

                        </div>

                        <!-- subscriber-->
                        @if (isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on')
                            @if ($storethemesetting['enable_email_subscriber'] == 'on')
                                <div class="row">
                                    <div class="col p-relative bottom-3">
                                        <div class="alert alert-success d-none" id="newsletterSuccess">
                                            <strong>Success!</strong> You've been added to our email list.
                                        </div>
                                        <div class="alert alert-danger d-none" id="newsletterError"></div>
                                        <div
                                            class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
                                            <h4 class="text-color-light ws-nowrap me-3 mb-3 mb-lg-0">
                                                {{ !empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time' }}
                                            </h4>
                                            {{ Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST', 'class' => 'form-style-3 w-100', 'id' => 'newsletterForm']) }}
                                            <div class="d-flex">
                                                {{ Form::email('email', null, ['class' => 'form-control box-shadow-none', 'aria-label' => 'Enter your email address', 'placeholder' => __('Enter Your Email Address')]) }}
                                                <button
                                                    class="btn btn-primary custom-form-control-newsletter-btn btn-px-3 btn-py-2 font-weight-bold"
                                                    type="submit">
                                                    {{ __('Go') }}
                                                </button>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @if ($storethemesetting['enable_footer'] == 'on')
                <div class="footer-copyright bg-transparent">
                    <div class="container">
                        <hr class="bg-color-light opacity-1">
                        <div class="row">
                            <div class="col mt-4 mb-4 pb-4">
                                <p class="text-center text-3 mb-0 text-color-grey">
                                    {{ \App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </footer>
    </div>




    <!-- Vendor -->
    <script src="{{ asset('assets/themePlus1/vendor/plugins/js/plugins.min.js') }}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets/themePlus1/js/theme.js') }}"></script>

    <!-- Demo -->
    <script src="{{ asset('assets/themePlus1/js/demos/demo-transportation-logistic.js') }}"></script>

    <!-- Current Page Vendor and Views -->
    <script src="{{ asset('assets/themePlus1/js/views/view.contact.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('assets/themePlus1/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets/themePlus1/js/theme.init.js') }}"></script>



    <!-- Custom js from entire application here -->
    <script src="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js') }}"></script>
    <script src="{{ asset('custom/js/custom.js') }}"></script>



    @if (App\Models\Utility::getValByName('gdpr_cookie') == 'on')
        <script type="text/javascript">
            var defaults = {
                'messageLocales': {
                    /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                    'en': "{{ App\Models\Utility::getValByName('cookie_text') }}"
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'cookieNoticePosition': 'bottom',
                'learnMoreLinkEnabled': false,
                'learnMoreLinkHref': '/cookie-banner-information.html',
                'learnMoreLinkText': {
                    'it': 'Saperne di più',
                    'en': 'Learn more',
                    'de': 'Mehr erfahren',
                    'fr': 'En savoir plus'
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'expiresIn': 30,
                'buttonBgColor': '#d35400',
                'buttonTextColor': '#fff',
                'noticeBgColor': '#000',
                'noticeTextColor': '#fff',
                'linkColor': '#009fdd'
            };
        </script>
        <script src="{{ asset('custom/js/cookie.notice.js') }}"></script>
    @endif


    @stack('script-page')
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



    @php
        $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
    @endphp
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $store_settings->google_analytic }}"></script>

    {!! $store_settings->storejs !!}

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{ $store_settings->google_analytic }}');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $store_settings->fbpixel_code }}');
        fbq('track', 'PageView');



        var x, i, j, l, ll, selElmnt, a, b, c;
        /* Look for any elements with the class "prime-select": */
        x = document.getElementsByClassName("prime-select");
        l = x.length;
        var langIcon = "<i class='fa fa-language'></i> ";
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];

            ll = selElmnt.length;
            /* For each element, create a new DIV that will act as the selected item: */
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");

            a.innerHTML = langIcon + selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /* For each element, create a new DIV that will contain the option list: */
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < ll; j++) {
                /* For each option in the original select element,
                create a new DIV that will act as an option item: */
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.setAttribute("onclick", selElmnt.options[j].getAttribute("onclick"))
                c.addEventListener("click", function(e) {
                    /* When an item is clicked, update the original select box,
                    and the selected item: */
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = langIcon + this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /* When the select box is clicked, close any other select boxes,
                and open/close the current select box: */
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            /* A function that will close all select boxes in the document,
            except the current select box: */
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }

        /* If the user clicks anywhere outside the select box,
        then close all select boxes: */
        document.addEventListener("click", closeAllSelect);
    </script>

    @if (!empty($store->smartsupp_key) && $store->is_smartsupp_enable == 'on')
        <!-- Smartsupp Live Chat script -->
        <script type="text/javascript">
            var _smartsupp = _smartsupp || {};
            _smartsupp.key = "<?php echo $store->smartsupp_key; ?>";
            window.smartsupp || (function(d) {
                var s, c, o = smartsupp = function() {
                    o._.push(arguments)
                };
                o._ = [];
                s = d.getElementsByTagName('script')[0];
                c = d.createElement('script');
                c.type = 'text/javascript';
                c.charset = 'utf-8';
                c.async = true;
                c.src = 'https://www.smartsuppchat.com/loader.js?';
                s.parentNode.insertBefore(c, s);
            })(document);
        </script>
    @endif

    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript={{ $store_settings->fbpixel_code }}" /></noscript>


</body>

</html>
