@extends('storefront.layout.' . $store->theme_dir . '')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Slider Area Start -->
    @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
        <div class="banner" id="banner4">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner banner-slider-inner">
                    @php $i=0; @endphp
                    @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                        <div class="carousel-item banner-max-height {{ $i == 0 ? 'active' : '' }} item-bg">
                            <img class="d-block w-100 h-100"
                                src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }}"
                                alt="banner">
                            <div class="carousel-content container banner-info-2 bi-2">
                                <h2 class="text-uppercase">
                                    {{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                </h2>
                                <p>
                                    {{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                                </p>
                                {{-- <a href="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                    class="btn-6">{{ __('Browse Vehicles') }}</a> --}}
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                @include('storefront.layout.theme23to28.search-box-type-1')
            </div>
        </div>
    @else
        <div class="banner" id="banner4">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner banner-slider-inner">
                    <div class="carousel-item banner-max-height active item-bg">
                        <img class="d-block w-100 h-100"
                            src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}"
                            alt="banner">
                        <div class="carousel-content container banner-info-2 bi-2">
                            <h2 class="text-uppercase">
                                {{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
                            </h2>
                            <p> {{ !empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.' }}
                            </p>
                            {{-- <a href="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                class="btn-6">{{ __('Browse Vehicles') }}</a> --}}
                        </div>
                    </div>
                </div>
                @include('storefront.layout.theme23to28.search-box-type-1')
            </div>
        </div>
    @endif
    <!-- Slider Area End -->


    <!-- Vehicles Area Start -->
    @if ($products['Start shopping']->count() > 0)
        <!-- Featured car start -->
        <div class="featured-car content-area-18">
            <div class="container">
                <!-- Main title 3 -->
                <div class="main-title-3">
                    {{-- <p>Types of car</p> --}}
                    <h1>{{ __('Vehicles') }}</h1>
                </div>
                <!-- Slick slider area start -->
                <div class="slick-slider-area clearfix">
                    <div class="row slick-carousel"
                        data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                        @foreach ($product_list as $product)
                            @php
                                $product->name = $product->getName();
                            @endphp
                            <div class="slick-slide-item">
                                <div class="car-box-4">
                                    <div class="photo-overflow">
                                        <div class="car-thumbnail-photo">
                                            @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                <img alt="Image placeholder" class="img-fluid w-100"
                                                    style="height:650px;object-fit:cover"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}">
                                            @else
                                                <img alt="Image placeholder" class="img-fluid w-100"
                                                    style="height:650px;object-fit:cover"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}">
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="for">For Sale</div> --}}
                                    <div class="ling-section">
                                        <div class="lo-text clearfix">
                                            <h3>
                                                <a
                                                    href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                    {{ $product->getName() }}
                                                </a>
                                            </h3>
                                            <h5>
                                                {{ \App\Models\Utility::priceFormat($product->net_price) }}
                                                @if ($product->price)
                                                    <span>/{{ \App\Models\Utility::priceFormat($product->price) }}</span>
                                                @endif
                                                <small class="text-muted">({{ $product->product_category() }})</small>
                                            </h5>
                                            <ul class="facilities-list clearfix">
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
                                            {{-- <ul class="facilities-list clearfix">
                                                <li>
                                                    <i class="flaticon-way"></i> 4,000 km
                                                </li>
                                                <li>
                                                    <i class="flaticon-manual-transmission"></i> Manual
                                                </li>
                                                <li>
                                                    <i class="flaticon-calendar-1"></i> 2021
                                                </li>
                                                <li>
                                                    <i class="flaticon-fuel"></i> Petrol
                                                </li>
                                                <li>
                                                    <i class="flaticon-car"></i> Sport
                                                </li>
                                                <li>
                                                    <i class="flaticon-gear"></i> Blue
                                                </li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="slick-prev slick-arrow-buton">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="slick-next slick-arrow-buton">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
                <div class="advertisement-block">
                    {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                </div>
            </div>
        </div>
        <!-- Featured car end -->
    @endif
    <!-- Vehicles Area End -->


    <!-- Products Area Start -->
    @if (
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0)
        <div class="featured-car content-area bg-grea-3">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1 class="mb-10"> {{ __('Products') }}</h1>
                    <div class="title-border">
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products_type1 as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="car-box-3">
                                <div class="car-thumbnail">
                                    <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                        class="car-img">
                                        {{-- <div class="tag-2 bg-active">Featured</div> --}}
                                        <div class="price-box-2">
                                            {{-- <sup>$</sup> --}}
                                            @if ($product->enable_product_variant == 'on')
                                                {{ \App\Models\Utility::priceFormat(0) }}
                                            @else
                                                {{ \App\Models\Utility::priceFormat($product->price) }}
                                            @endif
                                            @if ($product->last_price)
                                                <span>/<del>{{ \App\Models\Utility::priceFormat($product->last_price) }}</del>
                                                </span>
                                            @endif
                                        </div>
                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                            <img alt="Image placeholder" class="d-block w-100"
                                                style="width: 700px;height:250px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}">
                                        @else
                                            <img alt="Image placeholder" class="d-block w-100"
                                                style="width: 700px;height:250px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}">
                                        @endif
                                    </a>
                                    <div class="carbox-overlap-wrapper">
                                        <div class="overlap-box">
                                            <div class="overlap-btns-area">
                                                @if ($product->product_type == 1)
                                                    @php
                                                        $btn_class = 'add_to_wishlist wishlist_' . $product->id . '';
                                                        $icon_class = 'far';
                                                    @endphp

                                                    @if (Auth::guard('customers')->check())
                                                        @if (!empty($wishlist) && isset($wishlist[$product->id]['product_id']))
                                                            @if ($wishlist[$product->id]['product_id'] == $product->id)
                                                                @php
                                                                    $btn_class = 'disabled';
                                                                    $icon_class = 'fas text-danger';
                                                                @endphp
                                                            @endif
                                                        @endif
                                                    @endif
                                                    <a class="overlap-btn {{ $btn_class }}"
                                                        {{ $btn_class == 'disabled' ? 'disabled' : '' }}
                                                        data-url="{{ route('store.addtowishlist', [$store->slug, $product->id]) }}"
                                                        data-csrf="{{ csrf_token() }}">
                                                        <i class="{{ $icon_class }} fa-heart"></i>
                                                    </a>
                                                    <a class="overlap-btn add_to_cart"
                                                        data-url="{{ route('user.addToCart', [$product->id, $store->slug, 'variation_id']) }}"
                                                        data-csrf="{{ csrf_token() }}">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail">
                                    <h1 class="title"
                                        style="-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;height: 50px;overflow: hidden;">
                                        <a
                                            href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">{{ $product->name }}</a>
                                    </h1>
                                    <div class="location">
                                        <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                            <i class="fas fa-th-large"></i> {{ $product->product_category() }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif
    <!-- Products Area End -->

    @if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
        <div class="advantages content-area-5">
            <div class="container">
                <!-- Main title -->
                <div class="main-title-3">
                    {{-- <p>{{ __('Why Choose Us?') }}</p> --}}
                    <h1>{{ __('Why Choose Us?') }}</h1>
                </div>

                <div class="row">
                    @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                        @if (isset($storethemesetting['features_icon1']))
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="advantages-4">
                                    <div class="advantages-4-inner">
                                        <div class="icon flaticon-console">
                                            {!! $storethemesetting['features_icon1'] !!}
                                        </div>
                                        <div class="detail">
                                            <h4>
                                                <a
                                                    href="javascript:void(0)">{{ $storethemesetting['features_title1'] }}</a>
                                            </h4>
                                            <p>{{ $storethemesetting['features_description1'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                        @if (isset($storethemesetting['features_icon2']))
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="advantages-4">
                                    <div class="advantages-4-inner">
                                        <div class="icon flaticon-console">
                                            {!! $storethemesetting['features_icon2'] !!}
                                        </div>
                                        <div class="detail">
                                            <h4>
                                                <a
                                                    href="javascript:void(0)">{{ $storethemesetting['features_title2'] }}</a>
                                            </h4>
                                            <p>{{ $storethemesetting['features_description2'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                        @if (isset($storethemesetting['features_icon3']))
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="advantages-4">
                                    <div class="advantages-4-inner">
                                        <div class="icon flaticon-console">
                                            {!! $storethemesetting['features_icon3'] !!}
                                        </div>
                                        <div class="detail">
                                            <h4>
                                                <a
                                                    href="javascript:void(0)">{{ $storethemesetting['features_title3'] }}</a>
                                            </h4>
                                            <p>{{ $storethemesetting['features_description3'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    {{-- <div class="col-lg-12 text-center">
                        <a href="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                            class="btn-6">{{ __('Browse Vehicles') }}</a>

                    </div> --}}
                </div>
            </div>
        </div>
    @endif


    <!-- Gallery-->
    @if (isset($storethemesetting['enable_gallery']) &&
            $storethemesetting['enable_gallery'] == 'on' &&
            !empty($pro_categories))
        @if ($storethemesetting['enable_gallery'] == 'on')
            <div class="latest-offers categories content-area-13 bg-grea-3">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title text-center">
                        <h1>
                            {{ !empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery') }}
                        </h1>
                        <p class="mb-1">
                            {{ $storethemesetting['gallery_description'] }}
                        </p>
                        <div class="title-border">
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                        </div>
                    </div>
                    <div class="row row-2">
                        <div class="col-lg-4 col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-pad">
                                    <div class="latest-offers-box">
                                        <div class="photo-overflow">
                                            <div class="car-thumbnail-photo">
                                                @if (
                                                    !empty($gallery_categories_v2[0]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[0]['categorie_img']))
                                                    <img src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[0]['categorie_img'])) }}"
                                                        alt="" class="img-fluid w-100"
                                                        style="object-fit: cover;height:250px;">
                                                @else
                                                    <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="" class="img-fluid w-100"
                                                        style="object-fit: cover;height:250px;">
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="new">New</div> --}}
                                        <div class="ling-section">
                                            <div class="lo-text clearfix">
                                                <h3>
                                                    <a href="{{ route('store.gallery', $store->slug) }}">
                                                        {{ isset($gallery_categories_v2[0]['name']) ? $gallery_categories_v2[0]['name'] : '' }}
                                                    </a>
                                                </h3>
                                                {{-- <h5>$920.00 <span>/monthly</span></h5> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-pad">
                                    <div class="latest-offers-box">
                                        <div class="photo-overflow">
                                            <div class="car-thumbnail-photo">
                                                @if (
                                                    !empty($gallery_categories_v2[1]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[1]['categorie_img']))
                                                    <img src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[1]['categorie_img'])) }}"
                                                        alt="" class="img-fluid w-100"
                                                        style="object-fit: cover;height:250px;">
                                                @else
                                                    <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="" class="img-fluid w-100"
                                                        style="object-fit: cover;height:250px;">
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="new">New</div> --}}
                                        <div class="ling-section">
                                            <div class="lo-text clearfix">
                                                <h3>
                                                    <a href="{{ route('store.gallery', $store->slug) }}">
                                                        {{ isset($gallery_categories_v2[1]['name']) ? $gallery_categories_v2[1]['name'] : '' }}
                                                    </a>
                                                </h3>
                                                {{-- <h5>430.00 <span>/monthly</span></h5> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-pad">
                            <div class="latest-offers-box">
                                <div class="photo-overflow">
                                    <div class="car-thumbnail-photo">
                                        @if (
                                            !empty($gallery_categories_v2[2]['categorie_img']) &&
                                                \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[2]['categorie_img']))
                                            <img src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[2]['categorie_img'])) }}"
                                                alt="" class="img-fluid w-100 big-img" style="object-fit: cover">
                                        @else
                                            <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                alt="" class="img-fluid w-100 big-img" style="object-fit: cover">
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="new">New</div> --}}
                                <div class="ling-section">
                                    <div class="lo-text clearfix">
                                        <h3>
                                            <a href="{{ route('store.gallery', $store->slug) }}">
                                                {{ isset($gallery_categories_v2[2]['name']) ? $gallery_categories_v2[2]['name'] : '' }}
                                            </a>
                                        </h3>
                                        {{-- <h5>740.00 <span>/monthly</span></h5> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-pad">
                                    <div class="latest-offers-box">
                                        <div class="photo-overflow">
                                            <div class="car-thumbnail-photo">
                                                @if (
                                                    !empty($gallery_categories_v2[3]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[3]['categorie_img']))
                                                    <img class="img-fluid w-100"
                                                        src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[3]['categorie_img'])) }}"
                                                        alt="" style="object-fit: cover;height:250px;">
                                                @else
                                                    <img class="img-fluid w-100"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="" style="object-fit: cover;height:250px;">
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="new">New</div> --}}
                                        <div class="ling-section">
                                            <div class="lo-text clearfix">
                                                <h3>
                                                    <a href="{{ route('store.gallery', $store->slug) }}">
                                                        {{ isset($gallery_categories_v2[3]['name']) ? $gallery_categories_v2[3]['name'] : '' }}
                                                    </a>
                                                </h3>
                                                {{-- <h5>410.00 <span>/monthly</span></h5> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-pad">
                                    <div class="latest-offers-box">
                                        <div class="photo-overflow">
                                            <div class="car-thumbnail-photo">
                                                @if (
                                                    !empty($gallery_categories_v2[4]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[4]['categorie_img']))
                                                    <img class="img-fluid w-100"
                                                        src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[4]['categorie_img'])) }}"
                                                        alt="" style="object-fit: cover;height:250px;">
                                                @else
                                                    <img class="img-fluid w-100"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="" style="object-fit: cover;height:250px;">
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="new">New</div> --}}
                                        <div class="ling-section">
                                            <div class="lo-text clearfix">
                                                <h3>
                                                    <a href="{{ route('store.gallery', $store->slug) }}">
                                                        {{ isset($gallery_categories_v2[4]['name']) ? $gallery_categories_v2[4]['name'] : '' }}
                                                    </a>
                                                </h3>
                                                {{-- <h5>920.00 <span>/monthly</span></h5> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <!-- Products categories-->
    @if (isset($storethemesetting['enable_categories']) &&
            $storethemesetting['enable_categories'] == 'on' &&
            !empty($pro_categories))
        @if ($storethemesetting['enable_categories'] == 'on')
            <div class="blog comon-slick content-area">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title">
                        <h1 class="mb-10">
                            {{ !empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories' }}
                        </h1>
                        <p class="mb-1">
                            {{ !empty($storethemesetting['categories_title'])
                                ? $storethemesetting['categories_title']
                                : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            under the sun has been written by one hand only.' }}
                        </p>
                        <div class="title-border">
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                        </div>
                    </div>
                    <div class="slick row comon-slick-inner"
                        data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                        @foreach ($pro_categories as $key => $pro_categorie)
                            @if ($product_count[$key] > 0)
                                <div class="item slide-box">
                                    <div class="blog-4">
                                        <div class="blog-photo">
                                            @if (!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img))
                                                <img alt="Image placeholder" class="img-fluid"
                                                    src="{{ asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img)) }}"
                                                    style="height:250px !important;object-fit: cover">
                                            @else
                                                <img alt="Image placeholder" class="img-fluid"
                                                    src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                    style="height:250px !important;object-fit: cover">
                                            @endif
                                            {{-- <div class="date-box-2">27 Feb</div> --}}
                                            <div class="post-meta clearfix">
                                                <span><a href="#">
                                                        <i class="fas fa-car"></i>
                                                    </a>
                                                    {{ !empty($product_count[$key]) ? $product_count[$key] : '0' }}</span>
                                                {{-- <span><a href="#"><i class="flaticon-comment"></i></a>17K</span> --}}
                                                {{-- <span><a href="#"><i class="flaticon-calendar"></i></a>73k</span> --}}
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <h3>
                                                <a
                                                    href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}">{{ $pro_categorie->name }}</a>
                                            </h3>
                                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's</p> --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        @endif
    @endif

     <!-- Testimonials (v1) -->
     @if (isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on')
     <div class="testimonial-4 bg-grea-3">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-md-12">
                     <div id="carouselExampleFade2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                         <div class="carousel-indicators">
                             <button type="button" data-bs-target="#carouselExampleFade2" data-bs-slide-to="0"
                                 class="active" aria-current="true" aria-label="Slide 1"></button>
                             <button type="button" data-bs-target="#carouselExampleFade2" data-bs-slide-to="1"
                                 aria-label="Slide 2"></button>
                             <button type="button" data-bs-target="#carouselExampleFade2" data-bs-slide-to="2"
                                 aria-label="Slide 3"></button>
                         </div>
                         <div class="carousel-inner">
                             @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                                 <div class="carousel-item active">
                                     <div class="testimonial-info">
                                         <!-- Main title -->
                                         <div class="main-title-3">
                                             <p>{{__('What Clients Say')}}</p>
                                             <h1>
                                                 {{ !empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials' }}
                                             </h1>
                                         </div>
                                         <p class="mb-30">
                                             {{ $storethemesetting['testimonial_description1'] }}
                                         </p>
                                         <div class="user-info d-flex">
                                             <a class="pr-3" href="#" tabindex="-1">
                                                 <img class="flex-shrink-0 me-3"
                                                     src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }}"
                                                     alt="user">
                                             </a>
                                             <div class="detail align-self-center">
                                                 <h5>
                                                     <a href="#">{{ $storethemesetting['testimonial_name1'] }}</a>
                                                 </h5>
                                                 <p> {{ $storethemesetting['testimonial_about_us1'] }}</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endif
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 d-flex justify-content-center align-items-center bg-dark d-none d-lg-flex">
                    @if (!empty($store->logo))
                        <img width="300" src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                            alt="Image placeholder">
                    @else
                        <img width="300"class="logo1 img-fluid" src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                            alt="Image placeholder">
                    @endif
                </div>
             </div>
         </div>
     </div>
 @endif

    <!-- Client Logo -->
    @if (isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on')
        <div class="partners">
            <div class="container">
                <div class="slick-slider-area">
                    <div class="row slick-carousel"
                        data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                        @if (!empty($storethemesetting['brand_logo']))
                            @foreach (explode(',', $storethemesetting['brand_logo']) as $k => $value)
                                <div class="slick-slide-item">
                                    @if (!empty($value) && \Storage::exists('uploads/store_logo/' . $value))
                                        <img src="{{ asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png')) }}"
                                            alt="Footer logo" class="img-fluid">
                                    @else
                                        <img src="{{ asset(Storage::url('uploads/store_logo/brand_logo.png')) }}"
                                            alt="Footer logo" class="img-fluid">
                                    @endif
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection
@push('script-page')
@endpush
