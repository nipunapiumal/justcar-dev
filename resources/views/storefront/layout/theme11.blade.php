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

    <style>
        :root {
            --sidepanel-background: {{ !empty($storethemesetting['sidebar_panel_background_color']) ? $storethemesetting['sidebar_panel_background_color'] : '#0A2357' }};
            --sidepanel-foreground: {{ !empty($storethemesetting['sidebar_panel_foreground_color']) ? $storethemesetting['sidebar_panel_foreground_color'] : '#ffffff' }};
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/theme6/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/theme6/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme6/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme6/css/custom.css?v=2') }}">
    @stack('css-page')
    
</head>
@php
    $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
@endphp

<body>
    @php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }
        $languages = \App\Models\Utility::languages($store->slug);
    @endphp
    <div class="wrapper ovh">

        {{-- @if (!empty($store->cookiebot_group_id) && $store->is_cookiebot_enable == 'on')
            <script id="CookieDeclaration" src="https://consent.cookiebot.com/<?php echo $store->cookiebot_group_id; ?>/cd.js" type="text/javascript" async></script>
        @endif --}}

        <div class="preloader"></div>
        @if ($storethemesetting['enable_sidebar_panel'] == 'on')
            <!-- Sidebar Panel Start -->
            <div class="listing_sidebar">
                <div class="siderbar_left_home pt20">
                    <a class="sidebar_switch sidebar_close_btn float-end" href="#">X</a>
                    <div class="footer_contact_widget mt100">
                        <h3 class="title">{{ __('Quick contact info') }}</h3>
                        <p>{{ $storethemesetting['quick_contact_info'] }}</p>
                    </div>
                    <div class="footer_contact_widget">
                        <h5 class="title">{{ __('Contact Us') }}</h5>
                        <div class="footer_phone">{{ $storethemesetting['contact_info_phone_no'] }}</div>
                        <p>{{ $storethemesetting['contact_info_email'] }}</p>
                    </div>
                    <div class="footer_about_widget">
                        <h5 class="title">{{ __('Office Address') }}</h5>
                        <p>{!! nl2br(e($storethemesetting['office_address'])) !!}</p>
                    </div>
                    <div class="footer_contact_widget">
                        <h5 class="title">{{ __('Opening Hours') }}</h5>
                        <p>{!! nl2br(e($storethemesetting['opening_hours'])) !!}</p>
                    </div>
                    <div class="footer_contact_widget">
                        <p class="footer_note">
                            {{ \App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator) }}</p>
                    </div>
                </div>
            </div>
            <!-- Sidebar Panel End -->
        @endif

        @php

            // if ($store->slug == Request::segment(2) && !Request::segment(3)):
            //     //home page
            //     $style_top_header = 'home6_style';
            // elseif (Request::segment(3)):
            //     $style_top_header = 'home5_style';
            // endif;
        @endphp

        <!-- Main Header Nav -->
        <header class="header-nav menu_style_home_one home6_style transparent main-menu">
            <!-- Ace Responsive Menu -->
            <nav>
                <div class="container">
                    <!-- Menu Toggle btn-->
                    <div class="menu-toggle">
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Logo -->
                    <a href="{{ route('store.slug', $store->slug) }}" class="navbar_brand float-start dn-md">
                        @if (!empty($store->logo))
                            <img width="165px" class="logo1 img-fluid"
                                src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                alt="{{ $store->logo }}">
                            <img width="165px" class="logo2 img-fluid"
                                src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                alt="{{ $store->logo }}">
                        @else
                            <img width="165px" class="logo1 img-fluid"
                                src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}" alt="logo">
                        @endif
                    </a>

                    <!-- Responsive Menu Structure-->
                    <ul id="respMenu" class="ace-responsive-menu menu_list_custom_code wa float-start"
                        data-menu-style="horizontal">

                        {{-- <li> <a href="{{ route('store.slug', $store->slug) }}"><span
                                    class="title">{{ __('Home') }}</span></a></li> --}}

                                    @php
                                    if (!isset($storethemesetting['primary_nav_menu'])) {
                                        $storethemesetting['primary_nav_menu'] = Utility::defaultMenu($storethemesetting, $store, $plan);
                                    }
                                @endphp
        
                                @if ($storethemesetting['primary_nav_menu'])
                                    @foreach (json_decode($storethemesetting['primary_nav_menu']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                            <li>
                                                <a href="{{ $info['link_url'] }}">
                                                    <span class="title">{{ $info['link_name'] }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
        
                                @if (isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu'])
                                    <li>
                                        <a href="#">
                                            <span class="title">
                                                {{ __('More') }}
                                            </span>
                                        </a>
                                        <ul>
                                            @foreach (json_decode($storethemesetting['secondary_nav_menu']) as $menu_title)
                                                @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                    <li>
                                                        <a href="{{ $info['link_url'] }}">
                                                            <span class="title">{{ $info['link_name'] }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                        @if (Utility::CustomerAuthCheck($store->slug) == true)

                            <li>
                                <a href="#"><span class="title">
                                        {{ ucFirst(Auth::guard('customers')->user()->name) }}</span>
                                </a>
                                <!-- Level Two-->
                                <ul>
                                    <li>
                                        <a href="{{ route('store.slug', $store->slug) }}">
                                            {{ __('My Dashboard') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)]) }}">

                                            {{ __('My Profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.home', $store->slug) }}" class="nav-link">

                                            {{ __('My Orders') }}
                                        </a>
                                    </li>
                                    <li>
                                        @if (Utility::CustomerAuthCheck($store->slug) == false)
                                            <a href="{{ route('customer.login', $store->slug) }}" class="nav-link">
                                                {{ __('Sign in') }}
                                            </a>
                                        @else
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                                class="nav-link">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="customer-frm-logout"
                                                action="{{ route('customer.logout', $store->slug) }}" method="POST"
                                                class="d-none">
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        @endif



                    </ul>
                    <!-- Responsive Menu Structure-->
                    <ul id="respMenu2" class="ace-responsive-menu menu_list_custom_code wa text-end"
                        data-menu-style="horizontal">
                        {{-- <li class="list_c">
                            <a href="#"><span class="flaticon-magnifiying-glass icon vam"></span></a>
                        </li>
                        <li class="add_listing"><a href="page-dashboard-add-listings.html">+ <span class="dn-lg">Add
                                    Listing</span></a></li> --}}

                        @if (Utility::CustomerAuthCheck($store->slug) != true)
                            <li>
                                <a href="{{ route('customer.login', $store->slug) }}"
                                    class="">{{ __('Log in') }}</a>
                            </li>
                            <li><a href="#">|</a></li>
                            <li><a href="{{ route('store.usercreate', $store->slug) }}">{{ __('Register') }}</a></li>
                        @else
                            <li>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="customer-frm-logout" action="{{ route('customer.logout', $store->slug) }}"
                                    method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                        @if (Utility::CustomerAuthCheck($store->slug) == true)
                            <li>
                                <a href="{{ route('store.wishlist', $store->slug) }}">

                                    <i class="fas fa-heart">
                                        <span class="title wishlist_count"
                                            id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                                    </i>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('store.cart', $store->slug) }}">

                                <i class="fas fa-shopping-basket">
                                    <span class="title shopping_count"
                                        id="shopping_count">{{ !empty($total_item) ? $total_item : '0' }}</span>

                                </i>
                            </a>
                        </li>



                        @if ($storethemesetting['enable_sidebar_panel'] == 'on')
                            <li class="sidebar_panel"><a class="sidebar_switch pt0" href="#"><span></span></a>
                            </li>
                        @endif

                    </ul>
                </div>
            </nav>
        </header>

        <!-- Main Header Nav For Mobile -->
        <div id="page" class="stylehome1 h0">
            <div class="mobile-menu">
                <div class="header stylehome1">
                    <div class="mobile_menu_bar">
                        <a class="menubar" href="#menu"><small>{{ __('Menu') }}</small><span></span></a>
                    </div>
                    <div class="mobile_menu_main_logo">
                        @if (!empty($store->logo_dark))
                            <img class="nav_logo_img img-fluid" width="170px"
                                src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                                alt="Image placeholder">
                        @else
                            <img width="170px" class="nav_logo_img img-fluid"
                                src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                alt="images/header-logo2.png">
                        @endif

                    </div>
                </div>
            </div>
            <!-- /.mobile-menu -->
            <nav id="menu" class="stylehome1">
                <ul>
                    {{-- <li>
                        <a href="{{ route('store.slug', $store->slug) }}"><span
                                class="title">{{ __('Home') }}</span>
                        </a>
                    </li> --}}
                    @if ($storethemesetting['primary_nav_menu'])
                    @foreach (json_decode($storethemesetting['primary_nav_menu']) as $menu_title)
                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                            <li>
                                <a href="{{ $info['link_url'] }}">
                                    <span class="title">{{ $info['link_name'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif

                @if (isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu'])
                    <li>
                        <a href="#">
                            <span class="title">
                                {{ __('More') }}
                            </span>
                        </a>
                        <ul>
                            @foreach (json_decode($storethemesetting['secondary_nav_menu']) as $menu_title)
                                @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                    <li>
                                        <a href="{{ $info['link_url'] }}">
                                            <span class="title">{{ $info['link_name'] }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif

                    @if (Utility::CustomerAuthCheck($store->slug) == true)

                        <li>
                            <a href="#"><span class="title">
                                    {{ ucFirst(Auth::guard('customers')->user()->name) }}</span>
                            </a>
                            <!-- Level Two-->
                            <ul>
                                <li>
                                    <a href="{{ route('store.slug', $store->slug) }}">
                                        {{ __('My Dashboard') }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)]) }}">

                                        {{ __('My Profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.home', $store->slug) }}" class="nav-link">

                                        {{ __('My Orders') }}
                                    </a>
                                </li>
                                <li>
                                    @if (Utility::CustomerAuthCheck($store->slug) == false)
                                        <a href="{{ route('customer.login', $store->slug) }}" class="nav-link">
                                            {{ __('Sign in') }}
                                        </a>
                                    @else
                                        <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                            class="nav-link">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="customer-frm-logout"
                                            action="{{ route('customer.logout', $store->slug) }}" method="POST"
                                            class="d-none">
                                            {{ csrf_field() }}
                                        </form>
                                    @endif
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('customer.login', $store->slug) }}"
                                style="border-radius: 6px;">{{ __('Log in') }}</a>
                        </li>
                    @endif


                    @if (Utility::CustomerAuthCheck($store->slug) == true)
                        <li>
                            <a href="{{ route('store.wishlist', $store->slug) }}">

                                <i class="fas fa-heart">
                                    <span class="title wishlist_count"
                                        id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                                </i>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('store.cart', $store->slug) }}">

                            <i class="fas fa-shopping-basket">
                                <span class="title shopping_count"
                                    id="shopping_count">{{ !empty($total_item) ? $total_item : '0' }}</span>

                            </i>
                        </a>
                    </li>

                    <!-- Only for Mobile View -->
                    <li class="mm-add-listing">
                        <span class="border-none">
                            <span class="mmenu-contact-info">
                                <span class="phone-num"><i class="flaticon-map"></i> <a href="#">
                                        {!! nl2br(e($storethemesetting['office_address'])) !!}
                                    </a></span>
                                <span class="phone-num"><i class="flaticon-phone-call"></i> <a
                                        href="tel:{{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220' }}">{{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220' }}</a></span>
                                <span class="phone-num"><i class="flaticon-clock"></i> <a href="#">
                                        {!! nl2br(e($storethemesetting['opening_hours'])) !!}
                                    </a></span>
                            </span>
                            <span class="social-links">

                                @if (!empty($storethemesetting['top_bar_whatsapp']))
                                    <a class=""
                                        href="https://wa.me/{{ $storethemesetting['top_bar_whatsapp'] }}"
                                        target="_blank">
                                        <span class="fab fa-whatsapp"></span>
                                    </a>
                                @endif
                                @if (!empty($storethemesetting['top_bar_instagram']))
                                    <a class="" href="{{ $storethemesetting['top_bar_instagram'] }}"
                                        target="_blank">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                @endif
                                @if (!empty($storethemesetting['top_bar_twitter']))
                                    <a class="" href="{{ $storethemesetting['top_bar_twitter'] }}"
                                        target="_blank">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                @endif
                                @if (!empty($storethemesetting['top_bar_messenger']))
                                    <a class="" href="{{ $storethemesetting['top_bar_messenger'] }}"
                                        target="_blank">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                @endif



                                {{-- <a href="#"><span class="fab fa-facebook-f"></span></a>
                                <a href="#"><span class="fab fa-twitter"></span></a>
                                <a href="#"><span class="fab fa-instagram"></span></a>
                                <a href="#"><span class="fab fa-youtube"></span></a>
                                <a href="#"><span class="fab fa-pinterest"></span></a> --}}
                            </span>
                        </span>
                    </li>
                </ul>
            </nav>
        </div>

        @yield('content')

        <!-- Our Footer -->
        <section class="footer_one home6_style pt50 pb25">
            <div class="container">
                <div class="row">
                    {{-- @if ($store->theme_dir != 'theme8') --}}
                    <div class="col-md-4 col-xl-7">
                        <div class="footer_about_widget text-start">
                            <div class="logo mb40 mb0-sm">

                                @if (
                                    !empty($storethemesetting['footer_logo']) &&
                                        \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo']))
                                    <img src="{{ asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo'])) }}"
                                        alt="Footer logo" style="height: 40px;">
                                @else
                                    <img src="{{ asset(Storage::url('uploads/store_logo/footer_logo.png')) }}"
                                        alt="Footer logo" style="height: 40px;">
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                    @if (isset($storethemesetting['enable_quick_link4']) && $storethemesetting['enable_quick_link4'] == 'on')
                        <div class="col-md-8 col-xl-5">
                            <div class="footer_menu_widget text-start text-md-end mt15">
                                <ul>
                                    @if (isset($storethemesetting['footer_menu_4']) && $storethemesetting['footer_menu_4'])
                                        @foreach (json_decode($storethemesetting['footer_menu_4']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li class="list-inline-item">
                                                    <a class="t-gray" target="_blank"
                                                        href="{{ $info['link_url'] }}">{{ $info['link_name'] }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="container pt80 pt20-sm pb70 pb0-sm">
                <div class="row">
                    @if (isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on')
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div class="footer_about_widget">
                                <h5 class="title">{{ __($storethemesetting['quick_link_header_name1']) }}</h5>
                                @if (isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1'])
                                    @foreach (json_decode($storethemesetting['footer_menu_1']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                            <p>
                                                <a class="t-gray" target="_blank" href="{{ $info['link_url'] }}">
                                                    {{ $info['link_name'] }}
                                                </a>
                                            </p>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_quick_link2']) && $storethemesetting['enable_quick_link2'] == 'on')
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div class="footer_about_widget">
                                <h5 class="title">{{ __($storethemesetting['quick_link_header_name2']) }}</h5>
                                @if (isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2'])
                                    @foreach (json_decode($storethemesetting['footer_menu_2']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                            <p>
                                                <a class="t-gray" target="_blank" href="{{ $info['link_url'] }}">
                                                    {{ $info['link_name'] }}
                                                </a>
                                            </p>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_quick_link3']) && $storethemesetting['enable_quick_link3'] == 'on')
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div class="footer_about_widget">
                                <h5 class="title">{{ __($storethemesetting['quick_link_header_name3']) }}</h5>
                                @if (isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3'])
                                    @foreach (json_decode($storethemesetting['footer_menu_3']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                            <p>
                                                <a class="t-gray" target="_blank" href="{{ $info['link_url'] }}">
                                                    {{ $info['link_name'] }}
                                                </a>
                                            </p>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- subscriber-->
                    @if (isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on')
                        @if ($storethemesetting['enable_email_subscriber'] == 'on')
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <div class="footer_contact_widget">
                                    <h5 class="title">
                                        {{ !empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time' }}
                                    </h5>
                                    {{ Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST', 'class' => 'footer_mailchimp_form']) }}
                                    <div class="wrapper">
                                        <div class="col-auto">
                                            {{ Form::email('email', null, ['class' => 'form-control', 'aria-label' => 'Enter your email address', 'placeholder' => __('Enter Your Email Address')]) }}

                                            <button type="submit">{{ __('Subscribe') }}</button>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                    <p>{{ !empty($storethemesetting['subscriber_sub_title']) ? $storethemesetting['subscriber_sub_title'] : 'Subscription here' }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            @if ($storethemesetting['enable_footer'] == 'on')
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-8 col-xl-9">
                            <div class="copyright-widget mt5 text-start mb20-sm">
                                <p>
                                    {{ \App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator) }}
                                </p>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="footer_social_widget text-start text-md-end">
                                <ul class="mb0">
                                    @if (!empty($storethemesetting['whatsapp']))
                                        <li class="list-inline-item">
                                            <a href="https://wa.me/{{ $storethemesetting['whatsapp'] }}"
                                                target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['facebook']))
                                        <li class="list-inline-item">
                                            <a href="{{ $storethemesetting['facebook'] }}" target="_blank">
                                                <i class="fab fa-facebook-square"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['twitter']))
                                        <li class="list-inline-item">
                                            <a href="{{ $storethemesetting['twitter'] }}" target="_blank">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['email']))
                                        <li class="list-inline-item">
                                            <a href="mailto:{{ $storethemesetting['email'] }}" target="_blank">
                                                <i class="far fa-envelope"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['instagram']))
                                        <li class="list-inline-item">
                                            <a href="{{ $storethemesetting['instagram'] }}" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['youtube']))
                                        <li class="list-inline-item">
                                            <a href="{{ $storethemesetting['youtube'] }}" target="_blank">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                    @endif


                                    {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a>
                                </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
        <a class="scrollToHome" href="#"><i class="fas fa-arrow-up"></i></a>
    </div>
    <!-- Wrapper End -->
    <script src="{{ asset('assets/theme6/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('custom/js/custom.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/jquery.mmenu.all.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/ace-responsive-menu.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/isotop.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/snackbar.min.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/parallax.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/scrollto.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/jquery-scrolltofixed-min.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/jquery.counterup.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/progressbar.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/slider.js') }}"></script>
    <script src="{{ asset('assets/theme6/js/timepicker.js') }}"></script>
    <!-- Custom script for all pages -->
    <script src="{{ asset('assets/theme6/js/script.js') }}"></script>

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
            show_toastr('{{ __('Success') }}', '{!! session('success') !!}', 'success');
        </script>
        {{ Session::forget('success') }}
    @endif
    @if (Session::has('error'))
        <script>
            show_toastr('{{ __('Error') }}', '{!! session('error') !!}', 'error');
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
