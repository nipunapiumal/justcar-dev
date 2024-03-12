<!DOCTYPE html>
<html lang="en" dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">
@php
    $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
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

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500" rel="stylesheet"> --}}
    <!-- All css here -->
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/bootstrap.min.css') }}">

    <!-- Fontawesome Icon CSS -->
   <link rel="stylesheet" href="{{ asset('assets/theme35to37/fonts/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/linear-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/stroke-gan-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/shortcode/shortcodes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/responsive.css?v=2') }}">


    <script src="{{ asset('assets/theme13to15/js/vendor/modernizr-2.8.3.min.js') }}"></script>

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

    <!-- Header Area Start -->
    <header
        class="{{ $store->theme_dir == 'theme14' || $store->theme_dir == 'theme15' ? 'header-full-area' : 'header-area' }} fixed">
        @if ($storethemesetting['enable_top_bar'] == 'on')
            <div class="header-top hidden-xs">
                <div
                    class="{{ $store->theme_dir == 'theme14' || $store->theme_dir == 'theme15' ? 'container-fluid' : 'container' }}">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-left">
                                <span>
                                    {{ !empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199' }}
                                    - {{ __('Contact Us') }}:
                                    {{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220' }}
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="social-links">

                                @if (!empty($storethemesetting['top_bar_whatsapp']))
                                    <a class="" href="https://wa.me/{{ $storethemesetting['top_bar_whatsapp'] }}"
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
                                {{-- <a href="https://twitter.com/devitemsllc"><i class="fa fa-twitter"></i></a> --}}
                                {{-- <a href="https://www.facebook.com/devitems/"><i class="fa fa-facebook"></i></a> --}}
                                {{-- <a href="https://www.rss.com/"><i class="fa fa-rss"></i></a> --}}
                                {{-- <a href="https://dribbble.com/devitemsllc"><i class="fa fa-dribbble"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="header-bottom header-sticky">
            <div
                class="{{ $store->theme_dir == 'theme14' || $store->theme_dir == 'theme15' ? 'container-fluid' : 'container' }}">
                <div class="row">
                    <div class="col-lg-2 col-md-12">
                        <div class="logo">
                            <a href="{{ route('store.slug', $store->slug) }}">
                                @if (!empty($store->logo))
                                    <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                        alt="Image placeholder" width="95px">
                                @else
                                    <img class="logo1 img-fluid"
                                        src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                        alt="Image placeholder" width="95px">
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="main-menu mean-menu">
                            <nav>
                                <ul>

                                    {{-- <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li> --}}

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
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif

                                    @if (isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu'])
                                        <li>
                                            <a href="#">
                                                <i class="icon-arrow-down"></i> {{ __('More') }}
                                            </a>
                                            <ul>
                                                @foreach (json_decode($storethemesetting['secondary_nav_menu']) as $menu_title)
                                                    @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                        <li>
                                                            <a href="{{ $info['link_url'] }}">
                                                                {{ $info['link_name'] }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif


                                    @if (Utility::CustomerAuthCheck($store->slug) == true)
                                        <li class="nav-icons">
                                            <a href="{{ route('store.wishlist', $store->slug) }}">
                                                <i class="far fa-heart fa-lg position-relative"
                                                    style="display: inline-block">
                                                    <span
                                                        class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                        style="font-family: sans-serif;display: inline-block;font-size:10px;"
                                                        id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                                                </i>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-icons">
                                        <a href="{{ route('store.cart', $store->slug) }}">
                                            <i class="fas fa-shopping-cart fa-lg position-relative"
                                                style="display: inline-block">
                                                <span
                                                    class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                    style="font-family: sans-serif;display: inline-block;font-size:10px;"
                                                    id="shopping_count">{{ !empty($total_item) ? $total_item : '0' }}</span>

                                            </i>
                                        </a>
                                    </li>

                                    {{-- @if (!empty($page_slug_urls))
                                        @foreach ($page_slug_urls as $k => $page_slug_url)
                                            @if ($page_slug_url->enable_page_header == 'on')
                                                <li>
                                                    <a href="{{ env('APP_URL') . '/page/' . $page_slug_url->slug }}">
                                                        {{ ucfirst($page_slug_url->name) }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif --}}
                                    {{-- @if ($store['blog_enable'] == 'on' && !empty($blog))
                                        <li>
                                            <a href="{{ route('store.blog', $store->slug) }}">
                                                {{ __('Blog') }}
                                            </a>
                                        </li>
                                    @endif

                                    <li>
                                        <a href="{{ route('store.contact', $store->slug) }}">
                                            {{ __('Contact Us') }}
                                        </a>
                                    </li>

                                    @if (isset($storethemesetting['enable_gallery']) && $storethemesetting['enable_gallery'] == 'on')
                                        <li>
                                            <a href="{{ route('store.gallery', [$store->slug]) }}">
                                                {{ __('Gallery') }}
                                            </a>
                                        </li>
                                    @endif

                                    @if ($plan->job_board == 'on' && isset($storethemesetting['enable_job_board']) && $storethemesetting['enable_job_board'] == 'on')
                                        <li>
                                            <a href="{{ route('store.job-board', [$store->slug]) }}">
                                                {{ __('Career With Us') }}
                                            </a>
                                        </li>
                                    @endif --}}


                                    @if (Utility::CustomerAuthCheck($store->slug) == true)

                                        <li class=""><a href="javascript:void(0)">
                                                {{ ucFirst(Auth::guard('customers')->user()->name) }}<i
                                                    class="icon-arrow-down"></i></a>
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
                                                    <a href="{{ route('customer.home', $store->slug) }}"
                                                        class="nav-link">

                                                        {{ __('My Orders') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    @if (Utility::CustomerAuthCheck($store->slug) == false)
                                                        <a href="{{ route('customer.login', $store->slug) }}"
                                                            class="nav-link">
                                                            {{ __('Sign in') }}
                                                        </a>
                                                    @else
                                                        <a href="#"
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
                                    @else
                                        <li>
                                            <a href="{{ route('customer.login', [$store->slug]) }}">
                                                {{ __('Log in') }}
                                            </a>
                                        </li>
                                    @endif
                                    @if (Utility::CustomerAuthCheck($store->slug) == true)
                                        {{-- <li>
                                        <a href="{{ route('store.wishlist', $store->slug) }}">
    
                                            <i class="fas fa-heart">
                                                <span class="title wishlist_count"
                                                    id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                                            </i>
                                        </a>
                                    </li> --}}
                                    @endif
                                    {{-- <li>
                                    <a href="{{ route('store.cart', $store->slug) }}">
    
                                        <i class="fas fa-shopping-basket">
                                            <span class="title shopping_count"
                                                id="shopping_count">{{ !empty($total_item) ? $total_item : '0' }}</span>
    
                                        </i>
                                    </a>
                                </li> --}}





                                    {{-- <li class="active"><a href="index.html">Home<i class="icon-arrow-down"></i></a>
                                        <ul>
                                            <li><a href="index.html">Homepage One</a></li>
                                            <li><a href="index-2.html">Homepage Two</a></li>
                                            <li><a href="index-3.html">Homepage Three</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-list.html">Shop<i class="icon-arrow-down"></i></a>
                                        <ul>
                                            <li><a href="product-details.html">Product Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="service.html">Service</a></li>
                                    <li><a href="team.html">Team</a></li>
                                    <li><a href="blog.html">Blog<i class="icon-arrow-down"></i></a>
                                        <ul>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">contact us</a></li> --}}
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md"></div>
                    </div>
                    <div class="col-lg-2 col-md-12 d-flex align-items-center justify-content-between right-content">
                        <div class="prime-select">
                            <select>
                                <option value="">
                                    {{ \App\Models\Utility::getLangCodes($currantLang) }}</option>
                                @foreach ($languages as $language)
                                    <option
                                        onclick="window.location = '{{ route('change.languagestore', [$store->slug, $language]) }}';">
                                        {{ \App\Models\Utility::getLangCodes($language) }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (Utility::CustomerAuthCheck($store->slug) == true)
                            <div>
                                <a href="{{ route('store.wishlist', $store->slug) }}">
                                    <i class="far fa-heart fa-lg text-light position-relative">
                                        <span
                                            class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                            style="font-family: sans-serif;font-size:10px;"
                                            id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                                    </i>
                                </a>
                            </div>
                        @endif
                        <div>
                            <a href="{{ route('store.cart', $store->slug) }}">
                                <i class="fas fa-shopping-cart fa-lg text-light position-relative">
                                    <span
                                        class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        style="font-family: sans-serif;font-size:10px;"
                                        id="shopping_count">
                                        {{ !empty($total_item) ? $total_item : '50' }}
                                    </span>

                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->


    {{-- @if (!empty($store->cookiebot_group_id) && $store->is_cookiebot_enable == 'on')
        <script id="CookieDeclaration" src="https://consent.cookiebot.com/<?php echo $store->cookiebot_group_id; ?>/cd.js" type="text/javascript"
            async></script>
    @endif --}}

    @yield('content')


    <!-- Footer Area Start -->
    <footer class="footer-area bg-5">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    @if (isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on')
                        <div class="col-lg-2 col-md-4 col-xs-12">
                            <div class="single-footer-widget">
                                <h5 class="pb-35">{{ __($storethemesetting['quick_link_header_name1']) }}</h5>
                                @if (isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1'])
                                    @foreach (json_decode($storethemesetting['footer_menu_1']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                            <p>
                                                <a href="{{ $info['link_url'] }}">
                                                    {{ $info['link_name'] }}
                                                </a>
                                            </p>
                                        @endif
                                    @endforeach
                                @endif
                                {{-- <p><a
                                        href="{{ $storethemesetting['quick_link_url1'] }}">{{ __($storethemesetting['quick_link_name1']) }}</a>
                                </p>
                                <p><a
                                        href="{{ $storethemesetting['quick_link_url12'] }}">{{ __($storethemesetting['quick_link_name12']) }}</a>
                                </p>
                                <p><a
                                        href="{{ $storethemesetting['quick_link_url13'] }}">{{ __($storethemesetting['quick_link_name13']) }}</a>
                                </p>
                                <p><a
                                        href="{{ $storethemesetting['quick_link_url14'] }}">{{ __($storethemesetting['quick_link_name14']) }}</a>
                                </p> --}}
                                {{-- <ul class="footer-list">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                               
                            </ul> --}}
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_quick_link2']) && $storethemesetting['enable_quick_link2'] == 'on')
                        <div class="col-lg-2 col-md-4 col-xs-12">
                            <div class="single-footer-widget">
                                <h5 class="pb-35">{{ __($storethemesetting['quick_link_header_name2']) }}</h5>
                                @if (isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2'])
                                    @foreach (json_decode($storethemesetting['footer_menu_2']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                            <p>
                                                <a href="{{ $info['link_url'] }}">
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
                        <div class="col-lg-2 col-md-4 col-xs-12">
                            <div class="single-footer-widget">
                                <h5 class="pb-35">{{ __($storethemesetting['quick_link_header_name3']) }}</h5>
                                @if (isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3'])
                                    @foreach (json_decode($storethemesetting['footer_menu_3']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                            <p>
                                                <a href="{{ $info['link_url'] }}">
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
                        <div class="col-lg-6 col-md-4 col-xs-12">
                            <div class="single-footer-widget">
                                <div class="footer-logo">
                                    <a href="{{ route('store.slug', $store->slug) }}">
                                        @if (
                                            !empty($storethemesetting['footer_logo']) &&
                                                \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo']))
                                            <img src="{{ asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo'])) }}"
                                                alt="Footer logo" style="height: 26px;">
                                        @else
                                            <img src="{{ asset(Storage::url('uploads/store_logo/footer_logo.png')) }}"
                                                alt="Footer logo" style="height: 26px;">
                                        @endif


                                    </a>




                                </div>
                                @if ($storethemesetting['enable_sidebar_panel'] == 'on')
                                    <p class="pr-10">
                                        {{ $storethemesetting['quick_contact_info'] }}
                                    </p>
                                    <div class="footer-info-wrapper">
                                        <div class="f-info">
                                            <span class="icon icon-Pointer"></span>
                                            <span class="f-info-text">{{ __('Office Address') }} :
                                                {{ $storethemesetting['office_address'] }}</span>
                                        </div>
                                        <div class="f-info">
                                            <span class="icon icon-Phone"></span>
                                            <span class="f-info-text">{{ __('Contact Us') }}:
                                                {{ $storethemesetting['contact_info_phone_no'] }}</span>
                                        </div>
                                        <div class="f-info">
                                            <span class="icon icon-Mail"></span>
                                            <span class="f-info-text">{{ __('Email') }}:
                                                {{ $storethemesetting['contact_info_email'] }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        @if ($storethemesetting['enable_footer'] == 'on')
            <div class="footer-bottom">
                <div class="footer-border"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-md-12">
                            <div class="footer-links-copyright">
                                <span>
                                    {{ \App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator) }}
                                </span>
                                <div class="social-links">
                                    @if (!empty($storethemesetting['whatsapp']))
                                        <a href="https://wa.me/{{ $storethemesetting['whatsapp'] }}"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    @endif
                                    @if (!empty($storethemesetting['facebook']))
                                        <a href="{{ $storethemesetting['facebook'] }}" target="_blank">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                    @endif
                                    @if (!empty($storethemesetting['twitter']))
                                        <a href="{{ $storethemesetting['twitter'] }}" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if (!empty($storethemesetting['email']))
                                        <a href="mailto:{{ $storethemesetting['email'] }}" target="_blank">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                    @endif
                                    @if (!empty($storethemesetting['instagram']))
                                        <a href="{{ $storethemesetting['instagram'] }}" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    @endif
                                    @if (!empty($storethemesetting['youtube']))
                                        <a href="{{ $storethemesetting['youtube'] }}" target="_blank">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    @endif


                                    {{-- <a href="https://www.facebook.com/devitems/"><i class="fa fa-facebook"></i></a>
                                    <a href="https://twitter.com/devitemsllc"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.behance.net/devitems"><i class="fa fa-behance"></i></a>
                                    <a href="https://dribbble.com/devitemsllc"><i class="fa fa-dribbble"></i></a> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif

    </footer>
    <!-- Footer Area End -->




    <!-- All js here -->
    <script src="{{ asset('assets/theme13to15/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/slick.min.js') }}"></script>

    <script src="{{ asset('assets/theme13to15/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/main.js') }}"></script>

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
    @include('storefront.layout.additional-scripts')
</body>

</html>
