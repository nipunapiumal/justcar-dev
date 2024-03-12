@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = \App\Models\Utility::GetLogo();
    $setting = App\Models\Utility::colorset();
    if ($setting['color']) {
        $color = $setting['color'];
    } else {
        $color = 'theme-3';
    }
@endphp
<!DOCTYPE html>
<html lang="en" dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JustCar.me - The Car-Dealer Website</title>

    <meta name="keywords" content="JustCar.me - Car-Dealer Website" />
    <meta name="description"
        content="The new generation of dealer websites is here. Easily create a professional website without any programming knowledge.">
    <meta name="author" content="Jocianer IT Service by Foodianer.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/landing/img/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('assets/landing/img/apple-touch-icon.png') }}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landing/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/theme-shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/demos/demo-one-page-agency.css') }}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{ asset('assets/landing/css/skins/skin-one-page-agency.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('assets/landing/vendor/modernizr/modernizr.min.js') }}"></script>

</head>

<body class="{{ $color }}" data-plugin-scroll-spy data-plugin-options="{'target': '.wrapper-spy'}">

    <div class="body">
        <header id="header"
            data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAtElement': '#header', 'stickySetTop': '0', 'stickyChangeLogo': false}">
            <div class="header-body">
                <div class="header-container container-fluid px-0">
                    <div class="header-row">
                        <div class="header-column w-lg-25pct">
                            <div class="header-row">
                                <div class="header-logo px-4">
                                    <a href="demo-one-page-agency.html">
                                        <img alt="Porto One Page Agency" width="123" height="33"
                                            src="{{ asset('assets/landing/img/demos/one-page-agency/logo.png') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column justify-content-center w-lg-100pct">
                            <div class="header-row">
                                <div class="header-nav justify-content-center">
                                    <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                        <nav class="wrapper-spy collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <li>
                                                    <a class="nav-link active" href="/index.html" data-hash>
                                                        Homepage
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="#start" data-hash data-hash-offset="0"
                                                        data-hash-offset-lg="32">
                                                        Services
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="#layouts" data-hash data-hash-offset="0"
                                                        data-hash-offset-lg="32">
                                                        Layouts
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="#preise" data-hash data-hash-offset="0"
                                                        data-hash-offset-lg="32">
                                                        Prices
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="/register" data-hash>
                                                        Register
                                                    </a>
                                                </li>
                                                <li class="nav-item nav-item-borders py-2 d-none d-lg-inline-flex">
                                                    <a href="/login">Login</a>
                                                </li>
                                                <li class="nav-item nav-item-borders py-2 pe-0 ">
                                                    <a class="nav-link" href="https://car-dealer.net/index.html"
                                                        role="button" id="dropdownLanguage" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <img src="{{ asset('assets/landing/img/blank.gif') }}"
                                                            class="flag flag-de" alt="Deutsch" />

                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-column w-100pct w-lg-25pct justify-content-end">
                            <div class="header-row px-4">
                                <div class="d-none d-sm-flex align-items-center">

                                    <a href="mailto:hello@justcar.me"
                                        class="text-color-light font-weight-semibold opacity-hover-9 text-decoration-none">hello@justcar.me</a>
                                </div>
                                <button class="btn header-btn-collapse-nav btn-gradient" data-bs-toggle="collapse"
                                    data-bs-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div role="main" class="main">

            <div class="position-relative">
                <div class="d-none d-sm-block position-absolute top-50pct transform3dy-n50 right-15 z-index-3 pe-3">
                    <ul
                        class="d-flex flex-column social-icons social-icons-clean social-icons-icon-light social-icons-medium">
                        <li class="social-icons-instagram">
                            <a href="http://www.instagram.com/" class="text-color-quaternary" target="_blank"
                                title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="social-icons-facebook">
                            <a href="http://www.facebook.com/" class="text-color-quaternary" target="_blank"
                                title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="home"
                    class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual custom-dots-style-1 dots-inside dots-horizontal-center show-dots-hover show-dots-xs dots-light nav-style-1 nav-inside nav-inside-plus nav-light nav-md nav-font-size-md show-nav-hover mb-0"
                    data-plugin-options="{'autoplayTimeout': 7000, 'autoplay': false}" style="height: 100vh;">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">

                            <!-- Carousel Slide 1 -->
                            <div class="owl-item position-relative">
                                <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0 animated kenBurnsToRightTop"
                                    style="background-image: url({{ asset('assets/landing/img/demos/one-page-agency/slides/slide-1.jpg') }}); background-size: cover; background-position: center; animation-duration: 20s;">
                                </div>
                                <div class="container position-relative z-index-3 h-100">
                                    <div class="row justify-content-start align-items-center h-100">
                                        <div class="col-lg-7 text-center text-sm-start mb-4 pb-5 pb-lg-0">
                                            <h2 class="text-color-light font-weight-semibold text-3 text-sm-4 line-height-1 positive-ls-2 mb-1 appear-animation"
                                                data-appear-animation="fadeInUpShorter"
                                                data-appear-animation-delay="1000">
                                                The Car-Dealer Website
                                            </h2>
                                            <h1 class="d-inline-block text-color-light font-weight-bold text-11 text-sm-13 text-md-14 line-height-1 position-relative mb-3 pb-1 appear-animation"
                                                data-appear-animation="fadeInUpShorter"
                                                data-appear-animation-delay="1200">
                                                JustCar.me

                                            </h1>
                                            <p class="text-4 text-color-light w-sm-75pct pe-md-5 pe-lg-0 pe-xl-5 pb-3 mb-4 appear-animation"
                                                data-appear-animation="fadeInUpShorter"
                                                data-appear-animation-delay="1400">The new generation of dealer
                                                websites is here. In just a few steps to your own website.</p>
                                            <a href="#start"
                                                class="btn btn-gradient custom-btn-effect-1 custom-border-radius-1 d-inline-flex align-items-center font-weight-semibold text-3-5 btn-px-5 btn-py-3 appear-animation"
                                                data-hash data-hash-offset="0" data-hash-offset-lg="32"
                                                data-appear-animation="fadeInUpShorter"
                                                data-appear-animation-delay="1600"
                                                data-appear-animation-duration="1.7s">
                                                READ MORE
                                                <img width="15" height="15"
                                                    src="{{ asset('assets/landing/img/demos/one-page-agency/icons/arrow-down.svg') }}"
                                                    alt="" data-icon
                                                    data-plugin-options="{'onlySVG': true, 'removeClassAfterInit': 'fadeIn', 'extraClass': 'svg-fill-color-light position-relative bottom-1 ms-4'}" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Carousel Slide 2 -->
                            <div class="owl-item position-relative">
                                <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0 animated kenBurnsToRightTop"
                                    style="background-image: url({{ asset('assets/landing/img/demos/one-page-agency/slides/slide-2.jpg') }}); background-size: cover; background-position: center; animation-duration: 20s;">
                                </div>
                                <div class="container position-relative z-index-3 h-100">
                                    <div class="row justify-content-start align-items-center h-100">
                                        <div class="col-lg-7 text-center text-sm-start mb-4 pb-5 pb-lg-0">
                                            <h2 class="text-color-light font-weight-semibold text-3 text-sm-4 line-height-1 positive-ls-2 mb-1 appear-animation"
                                                data-appear-animation="fadeInUpShorter"
                                                data-appear-animation-delay="1000">
                                                Gallery, blog, job board and much more.
                                            </h2>
                                            <h1 class="d-inline-block text-color-light font-weight-bold text-11 text-sm-13 text-md-14 line-height-1 position-relative mb-3 pb-1 appear-animation"
                                                data-appear-animation="fadeInUpShorter"
                                                data-appear-animation-delay="1200">
                                                Over 50 designs

                                            </h1>
                                            <p class="text-4 text-color-light w-sm-75pct pe-md-5 pe-lg-0 pe-xl-5 pb-3 mb-4 appear-animation"
                                                data-appear-animation="fadeInUpShorter"
                                                data-appear-animation-delay="1400">You can choose from over 50
                                                different homepage layouts. Create your own dealer website quickly and
                                                easily.<br><br>
                                                <a href="#start"
                                                    class="btn btn-gradient custom-btn-effect-1 custom-border-radius-1 d-inline-flex align-items-center font-weight-semibold text-3-5 btn-px-5 btn-py-3 appear-animation"
                                                    data-hash data-hash-offset="0" data-hash-offset-lg="32"
                                                    data-appear-animation="fadeInUpShorter"
                                                    data-appear-animation-delay="1600" data-appear-animation-dur
                                                    ation="1.7s">
                                                    MREAD MORE
                                                    <img width="15" height="15"
                                                        src="{{ asset('assets/landing/img/demos/one-page-agency/icons/arrow-down.svg') }}"
                                                        alt="" data-icon
                                                        data-plugin-options="{'onlySVG': true, 'removeClassAfterInit': 'fadeIn', 'extraClass': 'svg-fill-color-light position-relative bottom-1 ms-4'}" />
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="owl-dots mb-5">
                        <button role="button" class="owl-dot active">
                            <span></span>
                        </button>
                        <button role="button" class="owl-dot">
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>


            <section id="start" class="section section-no-border bg-light pb-0 mt-3 mb-0">
                <div class="container pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-4">
                            <h2 class="text-7 font-weight-semibold line-height-2 mb-2">The new generation of dealer
                                websites is here.</h2>
                            <p>Easily create a professional website without any programming knowledge.</p>
                        </div>
                        <div class="col-sm-4 col-lg-auto icon-box text-center mb-4">
                            <i class="icon-bg icon-1"></i>
                            <h4 class="font-weight-bold custom-font-size-2 line-height-3 mb-0">Super
                                Fast<br>Performance</h4>
                        </div>
                        <div class="col-sm-4 col-lg-auto icon-box text-center mb-4">
                            <i class="icon-bg icon-2"></i>
                            <h4 class="font-weight-bold custom-font-size-2 line-height-3 mb-0">With many plugins
                                <br>and extensions
                            </h4>
                        </div>
                        <div class="col-sm-4 col-lg-auto icon-box text-center mb-4">
                            <i class="icon-bg icon-3"></i>
                            <h4 class="font-weight-bold custom-font-size-2 line-height-3 mb-0">Extremely easy<br>to
                                customize</h4>
                        </div>
                    </div>

                </div>
            </section>

            <section class="section section-no-border bg-light pb-0 mt-3 mb-0">
                <div class="container py-4">
                    <div class="row pt-4 mt-5">
                        <div class="col">
                            <div class="row pt-2 clearfix">
                                <div class="col-lg-6">
                                    <div class="feature-box feature-box-style-2 reverse appear-animation"
                                        data-appear-animation="fadeInRightShorter">
                                        <div class="feature-box-icon">
                                            <i class="bi bi-layout-wtf icons text-color-primary"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-2">50+ homepage layouts</h4>
                                            <p class="mb-4">You can choose from over 50 different layout templates.
                                                Choose the design that suits you best. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-box feature-box-style-2 appear-animation"
                                        data-appear-animation="fadeInLeftShorter">
                                        <div class="feature-box-icon">
                                            <i class="bi bi-image icons text-color-primary"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-2">Own gallery</h4>
                                            <p class="mb-4">Create your own gallery in different categories and
                                                present yourself from your best side.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="feature-box feature-box-style-2 reverse appear-animation"
                                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                                        <div class="feature-box-icon">
                                            <i class="bi bi-phone icons text-color-primary"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-2">Perfection in detail</h4>
                                            <p class="mb-4">Our optimized layouts look just as great on mobile as
                                                they do on a computer. Just make a good impression. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-box feature-box-style-2 appear-animation"
                                        data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                                        <div class="feature-box-icon">
                                            <i class="bi bi-file-text icons text-color-primary"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-2">Own Blog</h4>
                                            <p class="mb-4">Publish your own blog and keep your visitors up to date
                                                on everything to do with cars and other topics.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="feature-box feature-box-style-2 reverse appear-animation"
                                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                                        <div class="feature-box-icon">
                                            <i class="bi bi-display icons text-color-primary"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-2">Your own Domain</h4>
                                            <p class="mb-4">With your own domain, your business not only looks more
                                                professional, you can also find it better. Connect your current domain
                                                with our tool. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-box feature-box-style-2 appear-animation"
                                        data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
                                        <div class="feature-box-icon">
                                            <i class="bi bi-bar-chart icons text-color-primary"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-2">Statistics</h4>
                                            <p class="mb-4">Real time statistics. Statistics on your visitors, which
                                                browser or which operating system was used. You can also connect your
                                                own Google Analytics account.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="feature-box feature-box-style-2 reverse appear-animation"
                                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                                        <div class="feature-box-icon">
                                            <i class="bi bi-facebook icons text-color-primary"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-2">Social Media</h4>
                                            <p class="mb-4">Integrate your profiles from Facebook & Co. Link your
                                                social media accounts such as Facebook, Instagram, WhatsApp, Twitter,
                                                etc. with your great new website.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-box feature-box-style-2 appear-animation"
                                        data-appear-animation="fadeInleftShorter" data-appear-animation-delay="200">
                                        <div class="feature-box-icon">
                                            <i class="bi bi-envelope-paper icons text-color-primary"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-2">Job Board</h4>
                                            <p class="mb-4">You can publish your own job advertisements and potential
                                                applicants can apply directly via your own website.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-5 mb-5 mt-3">
                        <div class="col text-center">
                            <a href="/register"
                                class="btn btn-primary btn-px-5 py-3 font-weight-semibold text-2 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Register
                                now</a>
                            <p class="mb-4">Test 30 days free of charge and without obligation</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-secondary border-0 py-0 m-0 appear-animation"
                data-appear-animation="fadeIn">
                <div class="container">
                    <div class="row align-items-center justify-content-center justify-content-lg-between pb-5 pb-lg-0">
                        <div class="col-lg-5 order-2 order-lg-1 pt-4 pt-lg-0 pb-5 pb-lg-0 mt-5 mt-lg-0 appear-animation"
                            data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                            <h2 class="font-weight-bold text-color-light text-7 mb-2">In few minutes online</h2>
                            <p class="lead font-weight-light text-color-light text-4">and your new professional dealer
                                website is online in just a few steps</p>
                            <p class="font-weight-light text-color-light text-2 mb-4 opacity-7">Register now for free,
                                choose your favorite design, adjust the texts according to your needs and go online with
                                your own professional website directly, simply and easily! <br><br>Test 30 days free of
                                charge and without obligation.</p>
                            <a href="#" class="btn btn-dark-scale-2 btn-px-5 btn-py-2 text-2">JREGISTER NOW</a>
                        </div>
                        <div class="col-9 offset-lg-1 col-lg-5 order-1 order-lg-2 scale-2">
                            <img class="img-fluid box-shadow-3 my-2 border-radius"
                                src="{{ asset('assets/landing/img/justcar-front.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <br><br><br>

            <section id="layouts" class="section section-no-border bg-light pt-0 pb-4 m-0">
                <div class="container">
                    <div class="row pb-lg-3 counters">
                        <div class="col-lg-10 text-center offset-lg-1">
                            <h2 class="font-weight-bold text-9 mb-0">The perfect design</h2>
                            <p class="sub-title text-primary text-4 font-weight-semibold positive-ls-2 mt-2 mb-4">YOUR
                                WEBSITE GETS A NEW LEVEL! PUSH THE LIMIT.</p>

                        </div>

                    </div>
                </div>
            </section>

            <hr>

            <section class="section section-no-border section-light position-relative z-index-3 pt-0 m-0">
                <div class="container-fluid position-relative">
                    <div class="row portfolio-list sort-destination sort-destination-margin sort-destination-items-hardware-acc overflow-visible mt-4"
                        data-sort-id="portfolio">

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item classic" data-sort-search="classic">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item business" data-sort-search="corporate 8">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item onepage" data-sort-search="one page">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item business"
                            data-sort-search="business consulting 3">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item classic" data-sort-search="classic">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item business" data-sort-search="corporate 8">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item onepage" data-sort-search="one page">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item business"
                            data-sort-search="business consulting 3">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item classic" data-sort-search="classic">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item business" data-sort-search="corporate 8">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item onepage" data-sort-search="one page">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item business"
                            data-sort-search="business consulting 3">
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200" data-appear-animation-duration="750">
                                <div class="portfolio-item hover-effect-1 text-center">
                                    <span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
                                        <span
                                            class="thumb-info-wrapper thumb-info-wrapper-demos thumb-info-wrapper-link lazyload m-0"
                                            data-bg-src="{{ asset('assets/landing/img/previews/layout-1.png') }}">
                                            <a></a>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div id="preise" class="container py-4">
                <div class="row mb-4">
                    <div class="col">
                        <hr class="tall my-5">
                        <h4><strong>Our</strong> Prices</h4>
                    </div>
                </div>


                <div class="row mb-5">
                    <div class="col text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="text-3 p-relative top-1">monthly</div>
                            <div class="px-2">
                                <div class="form-check form-switch form-switch-md mb-0">
                                    <input data-content-switcher data-content-switcher-content-id="pricingTable1"
                                        type="checkbox" class="form-check-input" checked>
                                </div>
                            </div>
                            <div class="text-3 p-relative top-1">Yearly</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <div
                            class="card border-radius-0 bg-color-light box-shadow-6 anim-hover-translate-top-10px transition-3ms">
                            <div class="card-body py-5">

                                <div class="pricing-block">
                                    <div class="text-center">
                                        <h4 class="font-weight-bold">Basic</h4>
                                        <div class="content-switcher-wrapper">
                                            <div class="content-switcher left-50pct transform3dx-n50 active"
                                                data-content-switcher-id="pricingTable1"
                                                data-content-switcher-rel="1">
                                                <div class="plan-price bg-transparent mb-4">
                                                    <span class="price"><span class="price-unit">€</span>0.-</span>
                                                    <label class="price-label">100% for free</label>
                                                </div>
                                            </div>
                                            <div class="content-switcher left-50pct transform3dx-n50"
                                                data-content-switcher-id="pricingTable1"
                                                data-content-switcher-rel="2">
                                                <div class="plan-price bg-transparent mb-4">
                                                    <span class="price"><span class="price-unit">€</span>0.-</span>
                                                    <label class="price-label">100% for free</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <ul class="list list-icons list-icons-style-3  list-icons-sm ms-3">
                                        <li><i class="fas fa-check"></i> Your own Domain
                                            <a class="text-primary" data-bs-toggle="tooltip"
                                                data-bs-animation="false" title=""
                                                data-bs-original-title="Integrate your existing domain. Don't have your own domain? Book your own domain with us from €10.-"><i
                                                    class="fas fa-question-circle"></i></a>
                                        </li>
                                        <li><i class="fas fa-check"></i> Eigene Sub Domain
                                            <a class="text-primary" data-bs-toggle="tooltip"
                                                data-bs-animation="false" title=""
                                                data-bs-original-title="BIntegrate your existing domain. Don't have your own domain? Book your own domain with us from €10.-"><i
                                                    class="fas fa-question-circle"></i></a>
                                        </li>
                                        <li><i class="fas fa-check"></i> Blog</li>
                                        <li><i class="fas fa-check"></i> Own gallery</li>
                                        <li><i class="fas fa-check"></i> 3 layouts to choose</li>
                                        <li><i class="fas fa-check"></i> max. 10 vehicle</li>
                                        <li><i class="fas fa-check"></i> 1 Store</li>
                                        <li><i class="fas fa-check"></i> Support by E-Mail</li>
                                        <li><i class="fas fa-close"></i> No Ad-free</li>
                                    </ul>

                                    <div class="text-center mt-4 pt-2">
                                        <a href="#" class="btn btn-dark btn-modern">Register now</a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div
                            class="card border-radius-0 bg-color-light box-shadow-6 anim-hover-translate-top-10px transition-3ms">
                            <div class="card-body py-5">

                                <div class="pricing-block">
                                    <div class="text-center">
                                        <h4 class="font-weight-bold">Premium</h4>
                                        <div class="content-switcher-wrapper">
                                            <div class="content-switcher left-50pct transform3dx-n50 active"
                                                data-content-switcher-id="pricingTable1"
                                                data-content-switcher-rel="1">
                                                <div class="plan-price bg-transparent mb-4">
                                                    <span class="price"><span class="price-unit">€</span>299.-</span>
                                                    <label class="price-label">Annually/ Prices net</label>
                                                </div>
                                            </div>
                                            <div class="content-switcher left-50pct transform3dx-n50"
                                                data-content-switcher-id="pricingTable1"
                                                data-content-switcher-rel="2">
                                                <div class="plan-price bg-transparent mb-4">
                                                    <span class="price"><span class="price-unit">€</span>39.-</span>
                                                    <label class="price-label">Monthly/ Prices net</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <ul class="list list-icons list-icons-style-3 list-dark list-icons-sm ms-3">
                                        <li>
                                            <p> Same as basic + following options</p>
                                        </li><br><br>
                                        <li><i class="fas fa-check"></i> 20 Premium Templates</li>
                                        <li><i class="fas fa-check"></i> max. 50 vehicles</li>
                                        <li><i class="fas fa-check"></i> Premium Support</li>
                                    </ul>

                                    <div class="text-center mt-4 pt-2">
                                        <a href="#" class="btn btn-dark btn-modern">Register now</a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div
                            class="card border-radius-0 bg-color-light box-shadow-6 anim-hover-translate-top-10px transition-3ms">
                            <div class="card-body py-5">

                                <div class="pricing-block">
                                    <div class="text-center">
                                        <h4 class="font-weight-bold">Premium Plus +</h4>
                                        <div class="content-switcher-wrapper">
                                            <div class="content-switcher left-50pct transform3dx-n50 active"
                                                data-content-switcher-id="pricingTable1"
                                                data-content-switcher-rel="1">
                                                <div class="plan-price bg-transparent mb-4">
                                                    <span class="price"><span class="price-unit">€</span>399.-</span>
                                                    <label class="price-label">Annually/ Prices net</label>
                                                </div>
                                            </div>
                                            <div class="content-switcher left-50pct transform3dx-n50"
                                                data-content-switcher-id="pricingTable1"
                                                data-content-switcher-rel="2">
                                                <div class="plan-price bg-transparent mb-4">
                                                    <span class="price"><span class="price-unit">€</span>49.-</span>
                                                    <label class="price-label">Monthly/ Prices net</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <ul class="list list-icons list-icons-style-3 list-dark list-icons-sm ms-3">
                                        <li>
                                            <p>Basic & Premium + following options</p>
                                        </li><br><br>
                                        <li><i class="fas fa-check"></i> without ads</li>
                                        <li><i class="fas fa-check"></i> 50+ Premium Templates</li>
                                        <li><i class="fas fa-check"></i> Unlimited vehicles</li>
                                        <li><i class="fas fa-check"></i> Unlimited Store</li>
                                        <li><i class="fas fa-check"></i> 24/7 Premium Support</li>
                                        <li><i class="fas fa-check"></i> Job Board</li>
                                    </ul>

                                    <div class="text-center mt-4 pt-2">
                                        <a href="#" class="btn btn-dark btn-modern">Register now</a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="container my-4">
            <div class="row py-5">
                <div class="col-md-5 col-lg-3 mb-5 mb-lg-0">
                    <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">JustCar.me</h5>
                    <p class="text-4 mb-1">Stöberlstrasse 80</p>
                    <p class="text-4 mb-4 pb-1">80686 München</p>

                    <p class="text-5 mb-1 pt-2"><a href="tel:+4989200085120" class="text-decoration-none">089-2000
                            851 20</a></p>
                    <p class="text-5 mb-0"><a href="mailto:info@justcar.me">info@justcar.me</a></p>
                </div>
                <div class="col-md-7 col-lg-5 mb-5 mb-lg-0">
                    <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4"></h5>
                    <div class="row">
                        <div class="col-6">
                            <p class="mb-1"><a href="elements-call-to-action.html"
                                    class="text-4 link-hover-style-1">Homepage</a></p>
                            <p class="mb-1"><a href="elements-pricing-tables.html"
                                    class="text-4 link-hover-style-1">About us</a></p>
                            <p class="mb-1"><a href="elements-word-rotator.html"
                                    class="text-4 link-hover-style-1">What we do</a></p>
                            <p class="mb-1"><a href="elements-tooltips-popovers.html"
                                    class="text-4 link-hover-style-1">Portfolio</a></p>
                            <p class="mb-1"><a href="elements-sticky-elements.html"
                                    class="text-4 link-hover-style-1">Our Team</a></p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1"><a href="elements-progressbars.html"
                                    class="text-4 link-hover-style-1">Blog</a></p>
                            <p class="mb-1"><a href="elements-sections.html"
                                    class="text-4 link-hover-style-1">Kontakt</a></p>
                            <p class="mb-1"><a href="elements-lists.html"
                                    class="text-4 link-hover-style-1">Cockies</a></p>
                            <p class="mb-1"><a href="elements-image-frames.html"
                                    class="text-4 link-hover-style-1">Privacy policy</a></p>
                            <p class="mb-1"><a href="elements-testimonials.html"
                                    class="text-4 link-hover-style-1">Imprint</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">Newsletter</h5>
                    <p class="text-4 mb-1">Receive up-to-date information and offers.</p>
                    <p class="text-4">Sign up for our newsletter.</p>
                    <div class="alert alert-success d-none" id="newsletterSuccess">
                        <strong>Successfully registered!</strong> You have successfully registered for our newsletter.
                    </div>
                    <div class="alert alert-danger d-none" id="newsletterError"></div>
                    <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" class="mw-100">
                        <div class="input-group input-group-rounded">
                            <input class="form-control form-control-sm bg-light px-4 text-3"
                                placeholder="Email Address..." name="newsletterEmail" id="newsletterEmail"
                                type="email">
                            <button class="btn btn-primary text-color-light text-2 py-3 px-4"
                                type="submit"><strong>SIGN IN!</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-copyright footer-copyright-style-2">
            <div class="container py-2">
                <div class="row py-4">
                    <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                        <p>
                            © {{ date('Y') }} 
                            {{ __('copyright_text', [
                                'app_name' => env('APP_NAME'),
                                'membership' => '',
                            ]) }}
                            {{-- JustCar.me © Copyright 2022. All rights reserved. --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Vendor -->
    <script src="{{ asset('assets/landing/vendor/plugins/js/plugins.min.js') }}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets/landing/js/theme.js') }}"></script>

    <!-- Current Page Vendor and Views -->
    <script src="{{ asset('assets/landing/js/views/view.contact.js') }}"></script>

    <!-- Demo -->
    <script src="{{ asset('assets/landing/js/demos/demo-one-page-agency.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('assets/landing/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets/landing/js/theme.init.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script>
        /*
                    			Map Settings

                    				Find the Latitude and Longitude of your address:
                    					- https://www.latlong.net/
                    					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

                    			*/

        function initializeGoogleMaps() {
            // Map Markers
            var mapMarkers = [{
                address: "New York, NY 10017",
                html: "<strong>Porto One Page Agency</strong><br>New York, NY 10017",
                icon: {
                    image: "{{ asset('assets/landing/img/pin.png') }}",
                    iconsize: [26, 46],
                    iconanchor: [12, 46]
                },
                popup: true
            }];

            // Map Initial Location
            var initLatitude = 40.75198;
            var initLongitude = -73.96978;

            // Map Extended Settings
            var mapSettings = {
                controls: {
                    draggable: (($.browser.mobile) ? false : true),
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true
                },
                scrollwheel: false,
                markers: mapMarkers,
                latitude: initLatitude,
                longitude: initLongitude,
                zoom: 16
            };

            var map = $('#googlemaps').gMap(mapSettings),
                mapRef = $('#googlemaps').data('gMap.reference');

            // Styles from https://snazzymaps.com/
            var styles = [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#e9e9e9"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 29
                }, {
                    "weight": 0.2
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 18
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 21
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#dedede"
                }, {
                    "lightness": 21
                }]
            }, {
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                }, {
                    "color": "#333333"
                }, {
                    "lightness": 40
                }]
            }, {
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f2f2f2"
                }, {
                    "lightness": 19
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 17
                }, {
                    "weight": 1.2
                }]
            }];

            var styledMap = new google.maps.StyledMapType(styles, {
                name: 'Styled Map'
            });

            mapRef.mapTypes.set('map_style', styledMap);
            mapRef.setMapTypeId('map_style');

            // Change text-center Position
            if ($(window).width() > 767) {
                if ($('html[dir="rtl"]').get(0)) {
                    mapRef.panBy(250, 0);
                } else {
                    mapRef.panBy(-250, 0);
                }
            }
        }

        // Initialize Google Maps when element enter on browser view
        theme.fn.intObs('.google-map', 'initializeGoogleMaps()', {});

        // Map text-center At
        var mapCenterAt = function(options, e) {
            e.preventDefault();
            $('#googlemaps').gMap("centerAt", options);
        }
    </script>

</body>

</html>
