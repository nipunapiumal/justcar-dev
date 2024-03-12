@extends('storefront.layout.' . $store->theme_dir . '')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')

    <!-- Slider Area Start -->
    @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
        <!-- Home-area start-->
        <section class="hero-banner hero-banner-1">
            <div class="container">
                <div class="swiper home-slider" id="home-slider-1">
                    <div class="swiper-wrapper">
                        @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                            <div class="swiper-slide" data-aos="fade-up">
                                <div class="banner-content" data-swiper-parallax="-300">
                                    <h1 class="title color-white">
                                        {{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                    </h1>
                                    <p class="color-white mb-20">
                                        {{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    @include('storefront.layout.theme35to37.search-type-1')
                    <div class="col-xl-2 align-self-end" data-aos="fade-up" data-aos-delay="100">
                        <div class="slider-navigation position-static text-end mt-2 mt-lg-0">
                            <button type="button" title="Slide prev" class="slider-btn radius-0" id="home-slider-1-prev">
                                <i class="fal fa-angle-left"></i>
                            </button>
                            <button type="button" title="Slide next" class="slider-btn radius-0" id="home-slider-1-next">
                                <i class="fal fa-angle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper home-img-slider" id="home-img-slider-1">
                <div class="swiper-wrapper">
                    @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                        <div class="swiper-slide" data-aos="fade-up">
                            <div class="bg-img"
                                data-bg-image="{{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-pagination pagination-fraction" id="home-slider-1-pagination"></div>
        </section>
        <!-- Home-area end -->
    @else
        <!-- Home-area start-->
        <section class="hero-banner hero-banner-1">
            <div class="container">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" data-aos="fade-up">
                            <div class="banner-content" data-swiper-parallax="-300">
                                <h1 class="title color-white">
                                    {{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
                                </h1>
                                <p class="color-white mb-20">
                                    {{ !empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @include('storefront.layout.theme35to37.search-type-1')
                </div>
            </div>
            <div class="swiper home-img-slider" id="home-img-slider-1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-aos="fade-up">
                        <div class="bg-img"
                            data-bg-image="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Home-area end -->
    @endif
    <!-- Slider Area End -->

    @include('storefront.layout.theme35to37.category-type-1')

    <!-- Vehicles Area Start -->
    @if ($products['Start shopping']->count() > 0)
        <section class="product-area pb-75 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <div class="section-title title-center mb-30">
                            <h2 class="title mw-100 mb-30">{{ __('Vehicles') }}</h2>
                            <div class="tabs-navigation mb-20">
                                <ul class="nav nav-tabs" data-hover="fancyHover">
                                    @foreach ($categories as $key => $category)
                                        {{-- <li class="nav-item active">
                                        <button class="nav-link hover-effect active btn-md" data-bs-toggle="tab"
                                            data-bs-target="#tab1" type="button">All Cars</button>
                                    </li> --}}

                                        <li class="nav-item {{ $category == 'Start shopping' ? 'active' : '' }}"
                                            role="presentation">
                                            <button
                                                class="nav-link hover-effect btn-md {{ $category == 'Start shopping' ? 'active' : '' }}"
                                                data-bs-toggle="tab" data-bs-target="#{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}"
                                                role="tab">
                                                {{ __($category) }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" data-aos="fade-up">
                            @foreach ($products as $key => $items)
                                <div class="tab-pane fade {{ $key == 'Start shopping' ? 'active show' : '' }}"
                                    id="{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $key) !!}">
                                    <div class="row">
                                        @if ($items->count() > 0)
                                            @foreach ($items as $product)
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="product-default border p-15 mb-25">
                                                        <figure class="product-img mb-15">
                                                            <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                                                target="_self" title="Link"
                                                                class="lazy-container ratio ratio-2-3">
                                                                @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                                    <img alt="Image placeholder"
                                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                        data-src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                                        class="d-block w-100 lazyload img-height-250">
                                                                @else
                                                                    <img alt="Image placeholder"
                                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                        class="d-block w-100 lazyload img-height-250">
                                                                @endif
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <span class="product-category font-xsm">
                                                                {{ $product->product_category() }}</span>
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-15">
                                                                <h5 class="product-title lc-1 mb-0">
                                                                    <a
                                                                        href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                                        {{ $product->getName() }}
                                                                    </a>
                                                                </h5>
                                                                {{-- <a href="wishlist.html" class="btn btn-icon"
                                                                    data-tooltip="tooltip" data-bs-placement="right"
                                                                    title="Save to Wishlist">
                                                                    <i class="fal fa-heart"></i>
                                                                </a> --}}
                                                            </div>
                                                            {{-- <div class="author mb-15">
                                                                <a href="car-grid.html" target="_self" title="link">
                                                                    <img class="lazyload blur-up"
                                                                        src="assets/images/placeholder.png"
                                                                        data-src="assets/images/avatar-1.jpg"
                                                                        alt="Image">
                                                                    <span>By Nikon</span>
                                                                </a>
                                                            </div> --}}
                                                            <ul class="product-icon-list mb-15 list-unstyled overflow-auto">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-gas-pump"></i>
                                                                    {{ \App\Models\Product::getFuelTypeById($product->fuel_type_id) }}
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-road"></i> {{ $product->millage }}
                                                                </li>

                                                                {{-- <li class="icon-start">
                                                                    <i class="fas fa-car"></i> {{ $product->power }}
                                                                </li> --}}
                                                                {{-- <li class="icon-start">
                                                                    <i class="fas fa-cog"></i> {{ $product->prev_owners }}
                                                                </li> --}}
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                    {{ $product->register_year }}
                                                                </li>
                                                                {{-- <li class="icon-start">
                                                                    <i class="fas fa-cogs"></i>
                                                                    {{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}
                                                                </li> --}}
                                                                {{-- <li class="icon-start">
                                                                    <i class="fal fa-tachometer-alt"></i>
                                                                    <span>Automatic</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fal fa-tire"></i>
                                                                    <span>3WD</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fal fa-map-marked-alt"></i>
                                                                    <span>1,000</span>
                                                                </li> --}}
                                                            </ul>
                                                            <div class="product-price">
                                                                <h6 class="new-price">
                                                                    {{ \App\Models\Utility::priceFormat($product->net_price) }}
                                                                </h6>
                                                                @if ($product->price)
                                                                    <span
                                                                        class="old-price font-sm">{{ \App\Models\Utility::priceFormat($product->price) }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product-default -->
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="text-center mt-15 mb-25" data-aos="fade-up">
                            <a href="{{ route('store.categorie.product', $store->slug) }}"
                                class="btn btn-lg btn-primary fancy">{{ __('Show More') }}</a>
                        </div> --}}
                    </div>
                    <div class="col-12">
                        <div class="advertisement-block">
                            {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @include('storefront.layout.theme35to37.product-type-1')
    @include('storefront.layout.theme35to37.features-type-1')

    <!-- Testimonials (v1) -->
    @if (isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on')
        <section class="testimonial-area testimonial-1">
            <div class="container">
                <div class="content">
                    <div class="row gx-xl-5 align-items-center">
                        <div class="col-md-6 col-lg-5 border-end border-sm-0" data-aos="fade-up">
                            <h2 class="title mb-20">
                                {{ !empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials' }}
                            </h2>
                        </div>
                        <div class="col-md-6 col-lg-5" data-aos="fade-up" data-aos-delay="100">
                            <p class="mb-20">
                                {{ !empty($storethemesetting['testimonial_main_heading_title'])
                                    ? $storethemesetting['testimonial_main_heading_title']
                                    : 'There is only that moment and the incredible certainty that <br> everything under the sun has been written by one hand only.' }}
                            </p>
                        </div>
                        <div class="col-lg-2" data-aos="fade-up" data-aos-delay="150">
                            <!-- Slider navigation buttons -->
                            <div class="slider-navigation text-lg-end mb-20">
                                <button type="button" title="Slide prev" class="slider-btn radius-0"
                                    id="testimonial-slider-btn-prev">
                                    <i class="fal fa-angle-left"></i>
                                </button>
                                <button type="button" title="Slide next" class="slider-btn radius-0"
                                    id="testimonial-slider-btn-next">
                                    <i class="fal fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center" data-aos="fade-up">
                    <div class="col-lg-9">
                        <div class="swiper pt-30 mb-15" id="testimonial-slider-1">
                            <div class="swiper-wrapper">
                                @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                                    <div class="swiper-slide pb-25" data-aos="fade-up">
                                        <div class="slider-item">
                                            <div class="client mb-25">
                                                <div class="client-info d-flex align-items-center">
                                                    <div class="client-img">
                                                        <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                            <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }}"
                                                                alt="testimonial">

                                                            {{-- <img class="lazyload" src="assets/images/placeholder.png"
                                                                data-src="assets/images/avatar-1.jpg" alt="Person Image"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="name">{{ $storethemesetting['testimonial_name1'] }}</h6>
                                                        <span class="designation">{{ $storethemesetting['testimonial_about_us1'] }}</span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <div class="rate">
                                                        <div class="rating-icon"></div>
                                                    </div>
                                                    {{-- <span class="ratings-total">5 star of 20 review</span> --}}
                                                </div>
                                            </div>
                                            <div class="quote mb-25">
                                                <span class="icon"><i class="fal fa-quote-right"></i></span>
                                                <p class="text mb-0">
                                                    {{ $storethemesetting['testimonial_description1'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on')
                                    <div class="swiper-slide pb-25" data-aos="fade-up">
                                        <div class="slider-item">
                                            <div class="client mb-25">
                                                <div class="client-info d-flex align-items-center">
                                                    <div class="client-img">
                                                        <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                            <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png'))) }}"
                                                                alt="testimonial">

                                                            {{-- <img class="lazyload" src="assets/images/placeholder.png"
                                                                data-src="assets/images/avatar-1.jpg" alt="Person Image"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="name">{{ $storethemesetting['testimonial_name2'] }}</h6>
                                                        <span class="designation">{{ $storethemesetting['testimonial_about_us2'] }}</span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <div class="rate">
                                                        <div class="rating-icon"></div>
                                                    </div>
                                                    {{-- <span class="ratings-total">5 star of 20 review</span> --}}
                                                </div>
                                            </div>
                                            <div class="quote mb-25">
                                                <span class="icon"><i class="fal fa-quote-right"></i></span>
                                                <p class="text mb-0">
                                                    {{ $storethemesetting['testimonial_description2'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on')
                                    <div class="swiper-slide pb-25" data-aos="fade-up">
                                        <div class="slider-item">
                                            <div class="client mb-25">
                                                <div class="client-info d-flex align-items-center">
                                                    <div class="client-img">
                                                        <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                            <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png'))) }}"
                                                                alt="testimonial">

                                                            {{-- <img class="lazyload" src="assets/images/placeholder.png"
                                                                data-src="assets/images/avatar-1.jpg" alt="Person Image"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="name">{{ $storethemesetting['testimonial_name3'] }}</h6>
                                                        <span class="designation">{{ $storethemesetting['testimonial_about_us3'] }}</span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <div class="rate">
                                                        <div class="rating-icon"></div>
                                                    </div>
                                                    {{-- <span class="ratings-total">5 star of 20 review</span> --}}
                                                </div>
                                            </div>
                                            <div class="quote mb-25">
                                                <span class="icon"><i class="fal fa-quote-right"></i></span>
                                                <p class="text mb-0">
                                                    {{ $storethemesetting['testimonial_description3'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                        {{-- <div class="clients d-flex align-items-center" data-aos="fade-up">
                            <div class="client-img">
                                <img class="lazyload blur-up" src="assets/images/placeholder.png"
                                    data-src="assets/images/avatar-1.jpg" alt="Client Image">
                                <img class="lazyload blur-up" src="assets/images/placeholder.png"
                                    data-src="assets/images/avatar-2.jpg" alt="Client Image">
                                <img class="lazyload blur-up" src="assets/images/placeholder.png"
                                    data-src="assets/images/avatar-3.jpg" alt="Client Image">
                                <img class="lazyload blur-up" src="assets/images/placeholder.png"
                                    data-src="assets/images/avatar-4.jpg" alt="Client Image">
                            </div>
                            <span>2k+</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="img-content d-none d-lg-block" data-aos="fade-left">
                <div class="img">
                    <img class="lazyload blur-up" src="assets/images/placeholder.png"
                        data-src="{{ asset('assets/theme35to37/images/testimonial-1.png') }}" alt="Image">
                </div>
            </div> --}}
            <!-- Shape -->
            <div class="shape d-none d-lg-block"></div>
        </section>
    @endif

@endsection
@push('script-page')
@endpush
