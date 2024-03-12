@extends('storefront.layout.' . $store->theme_dir . '')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')

    <!-- Slider Area Start -->
    @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
        <div class="home3-banner-area">
            <div class="swiper home3-banner-slider">
                <div class="swiper-wrapper">
                    @php $i=0; @endphp
                    @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                        <div class="swiper-slide">
                            <div class="banner-bg"
                                style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.6) 100%), url({{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }});">
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-wrapper">
                            <div class="banner-content">
                                @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                                    <h1>{{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                    </h1>
                                    <div class="banner-feature">
                                        {{-- <p>{{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                                </p> --}}
                                        <ul>
                                            <li>
                                                {{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                                            </li>
                                            {{-- <li>Used Car <span>19, 230</span></li>
                                    <li>New Car <span>2, 230</span></li>
                                    <li>Auction Car <span>2, 230</span></li> --}}
                                        </ul>
                                    </div>
                                    @php
                                        break;
                                    @endphp
                                @endforeach
                                {{-- <div class="trustpilot-review">
                                    <strong>Excellent!</strong>
                                    <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-star2.svg') }}"
                                        alt="">
                                    <p>5.0 Rating out of <strong>5.0</strong> based on <a
                                            href="#"><strong>245354</strong>
                                            reviews</a></p>
                                    <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-logo2.svg') }}"
                                        alt="">
                                </div> --}}
                            </div>
                            <div
                                class="slider-btn-group style-2 style-3 justify-content-md-end justify-content-center gap-4">
                                <div class="slider-btn prev-4 d-md-flex d-none">
                                    <svg width="11" height="19" viewBox="0 0 8 13"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="paginations111"></div>
                                <div class="slider-btn next-4 d-md-flex d-none">
                                    <svg width="11" height="19" viewBox="0 0 8 13"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('storefront.layout.theme29to34.banner-type-1')
    @endif
    <!-- Slider Area End -->

    <!-- Vehicles Area Start -->
    @if ($products['Start shopping']->count() > 0)
        <div class="featured-car-section pt-100 mb-100">
            <div class="container">
                <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <div class="col-lg-12 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <h2>{{ __('Vehicles') }}</h2>
                            <p>{{ __('Here are some of the featured cars in different categories') }}</p>
                        </div>
                        <div class="slider-btn-group2">
                            <div class="slider-btn prev-1">
                                <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                </svg>
                            </div>
                            <div class="slider-btn next-1">
                                <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row wow fadeInUp" data-wow-delay="300ms">
                    <div class="swiper home2-featured-slider">
                        <div class="swiper-wrapper">
                            @foreach ($product_list as $product)
                                <div class="swiper-slide">
                                    <div class="feature-card">
                                        <div class="product-img">
                                            {{-- <div class="number-of-img">
                                        <img src="assets/img/home1/icon/gallery-icon-1.svg" alt="">
                                        10
                                    </div> --}}
                                            {{-- <a href="#" class="fav">
                                        <svg width="14" height="13" viewBox="0 0 14 14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.00012 2.40453L6.37273 1.75966C4.90006 0.245917 2.19972 0.76829 1.22495 2.67141C0.767306 3.56653 0.664053 4.8589 1.4997 6.50827C2.30473 8.09639 3.97953 9.99864 7.00012 12.0706C10.0207 9.99864 11.6946 8.09639 12.5005 6.50827C13.3362 4.85803 13.2338 3.56653 12.7753 2.67141C11.8005 0.76829 9.10019 0.245042 7.62752 1.75879L7.00012 2.40453ZM7.00012 13.125C-6.41666 4.25953 2.86912 -2.65995 6.84612 1.00016C6.89862 1.04829 6.95024 1.09816 7.00012 1.14979C7.04949 1.09821 7.10087 1.04859 7.15413 1.00104C11.1302 -2.6617 20.4169 4.25865 7.00012 13.125Z">
                                            </path>
                                        </svg>
                                    </a> --}}
                                            {{-- <div class="slider-btn-group">
                                        <div class="product-stand-next swiper-arrow">
                                            <svg width="8" height="13" viewBox="0 0 8 13"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z" />
                                            </svg>
                                        </div>
                                        <div class="product-stand-prev swiper-arrow">
                                            <svg width="8" height="13" viewBox="0 0 8 13"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z" />
                                            </svg>
                                        </div>
                                    </div> --}}
                                            <div class="swiper product-img-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                            <img alt="Image placeholder"
                                                                class="d-block w-100 img-height-407"
                                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}">
                                                        @else
                                                            <img alt="Image placeholder"
                                                                class="d-block w-100 img-height-407"
                                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}">
                                                        @endif
                                                    </div>
                                                    {{-- <div class="swiper-slide">
                                                <img class="img-fluid" src="assets/img/home2/feature-1.png" alt="image">
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="img-fluid" src="assets/img/home2/feature-1.png" alt="image">
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="img-fluid" src="assets/img/home2/feature-1.png" alt="image">
                                            </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="price">
                                                <strong>
                                                    {{ \App\Models\Utility::priceFormat($product->net_price) }}
                                                    @if ($product->price)
                                                        <span>/{{ \App\Models\Utility::priceFormat($product->price) }}</span>
                                                    @endif
                                                    {{-- <small class="text-muted">({{ $product->product_category() }})</small> --}}
                                                </strong>
                                            </div>
                                            <h5><a
                                                    href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">{{ $product->getName() }}</a>
                                            </h5>
                                            <ul class="features">
                                                <li>
                                                    <i class="fas fa-gas-pump"></i>
                                                    {{ \App\Models\Product::getFuelTypeById($product->fuel_type_id) }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-road"></i> {{ $product->millage }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-car"></i> {{ $product->power }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-cog"></i> {{ $product->prev_owners }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-calendar-alt"></i> {{ $product->register_year }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-cogs"></i>
                                                    {{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('storefront.layout.theme29to34.product-type-1')

    @if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
        <div class="why-choose-area two pt-90 pb-90 mb-100">
            <div class="container">
                <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <h2>{{ __('Why Choose Us?') }}</h2>
                            <p>{{ __('Premium Plan Free Trial') }}</p>
                        </div>
                        {{-- <div class="review-and-btn d-flex flex-wrap align-items-center gap-3">
                            <div class="rating">
                                <a href="#">
                                    <div class="review-top">
                                        <div class="logo">
                                            <img src="{{ asset('assets/theme29to34/img/home1/icon/google-logo.svg') }}"
                                                alt="">
                                        </div>
                                        <div class="star">
                                            <ul>
                                                <li><i class="bi bi-star-fill"></i></li>
                                                <li><i class="bi bi-star-fill"></i></li>
                                                <li><i class="bi bi-star-fill"></i></li>
                                                <li><i class="bi bi-star-fill"></i></li>
                                                <li><i class="bi bi-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>Trust Rating <span>5.0</span></li>
                                            <li><span>2348</span> Reviews</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                            <div class="rating">
                                <a href="#">
                                    <div class="review-top">
                                        <div class="logo">
                                            <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-logo3.svg') }}"
                                                alt="">
                                        </div>
                                        <div class="star">
                                            <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-star.svg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>Trust Rating <span>5.0</span></li>
                                            <li><span>2348</span> Reviews</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                        @if (isset($storethemesetting['features_icon1']))
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                <div class="choose-card">
                                    <div class="choose-top">
                                        <div class="choose-icon fa-2x">
                                            {!! $storethemesetting['features_icon1'] !!}
                                        </div>
                                        <h5>{{ $storethemesetting['features_title1'] }}</h5>
                                    </div>
                                    <p>
                                        {{ $storethemesetting['features_description1'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                        @if (isset($storethemesetting['features_icon2']))
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                                <div class="choose-card">
                                    <div class="choose-top">
                                        <div class="choose-icon fa-2x">
                                            {!! $storethemesetting['features_icon2'] !!}
                                        </div>
                                        <h5>{{ $storethemesetting['features_title2'] }}</h5>
                                    </div>
                                    <p>
                                        {{ $storethemesetting['features_description2'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                        @if (isset($storethemesetting['features_icon3']))
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                                <div class="choose-card">
                                    <div class="choose-top">
                                        <div class="choose-icon fa-2x">
                                            {!! $storethemesetting['features_icon3'] !!}
                                        </div>
                                        <h5>{{ $storethemesetting['features_title3'] }}</h5>
                                    </div>
                                    <p>
                                        {{ $storethemesetting['features_description3'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endif

    @include('storefront.layout.theme29to34.gallery-type-1')
    @include('storefront.layout.theme29to34.category-type-1')
    @include('storefront.layout.theme29to34.testimonial-type-1')
    @include('storefront.layout.theme29to34.brand-logo-type-1')

@endsection
@push('script-page')
@endpush
