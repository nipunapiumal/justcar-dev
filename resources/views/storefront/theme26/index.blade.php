@extends('storefront.layout.theme26')
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
                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }} item-bg">
                            <img class="d-block w-100 h-100"
                                src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }}"
                                alt="banner">
                            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                                <div class="banner-info-inner">
                                    <h3 class="mb-1">
                                        {{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                    </h3>
                                    <p>{{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                                    </p>
                                    {{-- <div class="price">
                                        <div class="monthly">
                                            <h4>$370</h4>
                                            <h6>Monthly</h6>
                                        </div>
                                        <div class="fresh">
                                            <h5>Refreshed Style, <br>High Performance</h5>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <a href="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                            class="btn-6">{{ __('Browse Vehicles') }}</a>
                                        <a href="#" class="btn-5">Test Drive</a>
                                    </div> --}}
                                </div>

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
            </div>
        </div>
    @else
        <div class="banner" id="banner4">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner banner-slider-inner text-center">
                    <div class="carousel-item banner-max-height active item-bg">
                        <img class="d-block w-100 h-100"
                            src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}"
                            alt="banner">
                        <div class="carousel-content container banner-info-2 bi-2 text-left">
                            <div class="row bi5">
                                <div class="col-lg-7 align-self-center">
                                    <div class="banner-content3">
                                        <h3 class="mb-1">
                                            {{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
                                        </h3>
                                        <p> {{ !empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.' }}
                                        </p>
                                        {{-- <div class="price">
                                            <div class="monthly">
                                                <h4>$750</h4>
                                                <h6>Monthly</h6>
                                            </div>
                                            <div class="fresh">
                                                <h5>Refreshed Style, <br>High Performance</h5>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <a href="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                                class="btn btn-lg btn-round btn-theme">{{ __('Browse Vehicles') }}</a>
                                            <a href="#" class="btn btn-round btn-white-lg-outline">Test Drive</a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="search-box-4">
                                        <form
                                            action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                            id="frm-filter" method="get">
                                            @csrf
                                            <div class="form-group">
                                                <select class="selectpicker search-fields" name="vehicle_type_id"
                                                    id="vehicle_type_id"
                                                    data-url="{{ route('product.get-vehicle-brands', [$store->slug]) }}">
                                                    <option value="">
                                                        {{ __('Select Vehicle Type') }}
                                                    </option>
                                                    @foreach ($vehicleTypes as $vehicleType)
                                                        <option value="{{ $vehicleType['id'] }}">
                                                            {{ $vehicleType->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                                    data-url="{{ route('product.get-models', [$store->slug]) }}" disabled>
                                                    <option value="">
                                                        {{ __('Select Make') }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="selectpicker search-fields" name="model_id" id="model_id"
                                                    disabled>
                                                    <option value="">
                                                        {{ __('Select Model') }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn w-100 button-theme btn-md">
                                                    {{ __('Search') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Slider Area End -->


    @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
    <div class="search-box-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}" id="frm-filter"
                        method="get">
                        @csrf
                        <div class="row row-3">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                <select class="selectpicker search-fields" name="vehicle_type_id" id="vehicle_type_id"
                                    data-url="{{ route('product.get-vehicle-brands', [$store->slug]) }}">
                                    <option value="">
                                        {{ __('Select Vehicle Type') }}
                                    </option>
                                    @foreach ($vehicleTypes as $vehicleType)
                                        <option value="{{ $vehicleType['id'] }}">
                                            {{ $vehicleType->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                    data-url="{{ route('product.get-models', [$store->slug]) }}" disabled>
                                    <option value="">
                                        {{ __('Select Make') }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                <select class="selectpicker search-fields" name="model_id" id="model_id" disabled>
                                    <option value="">
                                        {{ __('Select Model') }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 col-pad">
                                <button class="btn w-100 btn-block btn-md">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif


     <!-- Vehicles Area Start -->
     @if ($products['Start shopping']->count() > 0)
     <div class="featured-car content-area">
         <div class="container">
             <!-- Main title -->
             <div class="main-title">
                 <h1 class="mb-10"> {{ __('Vehicles') }}</h1>
                 <div class="title-border">
                     <div class="title-border-inner"></div>
                     <div class="title-border-inner"></div>
                     <div class="title-border-inner"></div>
                     <div class="title-border-inner"></div>
                     <div class="title-border-inner"></div>
                 </div>
             </div>
             <div class="row">
                 @foreach ($product_list as $product)
                     @php
                         $product->name = $product->getName();
                     @endphp
                     <div class="col-lg-4 col-md-6">
                         <div class="car-box-3">
                             <div class="car-thumbnail">
                                 <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                     class="car-img">
                                     {{-- <div class="tag-2 bg-active">Featured</div> --}}
                                     <div class="price-box-2">
                                         {{-- <sup>$</sup> --}}
                                         {{ \App\Models\Utility::priceFormat($product->net_price) }}
                                         @if ($product->price)
                                             <span>/{{ \App\Models\Utility::priceFormat($product->price) }}</span>
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
                                 {{-- <div class="carbox-overlap-wrapper">
                                     <div class="overlap-box">
                                         <div class="overlap-btns-area">
                                             <a class="overlap-btn" data-bs-toggle="modal"
                                                 data-bs-target="#carOverviewModal">
                                                 <i class="fa fa-eye-slash"></i>
                                             </a>
                                             <a class="overlap-btn wishlist-btn">
                                                 <i class="fa fa-heart-o"></i>
                                             </a>
                                             <a class="overlap-btn compare-btn">
                                                 <i class="fa fa-balance-scale"></i>
                                             </a>
                                             <div class="car-magnify-gallery">
                                                 <a href="img/car/car-5.png" class="overlap-btn"
                                                     data-sub-html="<h4>Hyundai Santa</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                     <i class="fa fa-expand"></i>
                                                     <img class="hidden" src="img/car/car-5.png" alt="hidden-img">
                                                 </a>
                                                 <a href="img/car/car-2.png" class="hidden"
                                                     data-sub-html="<h4>2020 Ford Mustang</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                     <img class="hidden" src="img/car/car-2.png" alt="hidden-img">
                                                 </a>
                                                 <a href="img/car/car-3.png" class="hidden"
                                                     data-sub-html="<h4>Lexus GS F</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                     <img class="hidden" src="img/car/car-3.png" alt="hidden-img">
                                                 </a>
                                                 <a href="img/car/car-4.png" class="hidden"
                                                     data-sub-html="<h4>Toyota Prius specs</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                     <img class="hidden" src="img/car/car-4.png" alt="hidden-img">
                                                 </a>
                                                 <a href="img/car/car-1.png" class="hidden"
                                                     data-sub-html="<h4>Toyota Prius</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                     <img class="hidden" src="img/car/car-1.png" alt="hidden-img">
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                 </div> --}}
                             </div>
                             <div class="detail">
                                 <h1 class="title">
                                     <a
                                         href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">{{ $product->getName() }}</a>
                                 </h1>
                                 <div class="location">
                                     <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                         <i class="fas fa-th-large"></i> {{ $product->product_category() }}
                                     </a>
                                 </div>
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
                             </div>
                         </div>
                     </div>
                 @endforeach

             </div>
             <div class="advertisement-block">
                 {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
             </div>
         </div>
     </div>
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
    <div class="advantages-2 content-area bg-grea-3">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1 class="mb-10">{{ __('Why Choose Us?') }}</h1>
                <div class="title-border">
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                </div>
            </div>

            <div class="row">
                @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                    @if (isset($storethemesetting['features_icon1']))
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="advantages-box-2 df-box">
                                <div class="icon">
                                    {!! $storethemesetting['features_icon1'] !!}
                                </div>
                                <div class="detail">
                                    <h5>
                                        <a href="javascript:void(0)">{{ $storethemesetting['features_title1'] }}</a>
                                    </h5>
                                    <p>{{ $storethemesetting['features_description1'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                    @if (isset($storethemesetting['features_icon2']))
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="advantages-box-2 df-box">
                                <div class="icon">
                                    {!! $storethemesetting['features_icon2'] !!}
                                </div>
                                <div class="detail">
                                    <h5>
                                        <a href="javascript:void(0)">{{ $storethemesetting['features_title2'] }}</a>
                                    </h5>
                                    <p>{{ $storethemesetting['features_description2'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                    @if (isset($storethemesetting['features_icon3']))
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="advantages-box-2 df-box">
                                <div class="icon">
                                    {!! $storethemesetting['features_icon3'] !!}
                                </div>
                                <div class="detail">
                                    <h5>
                                        <a href="javascript:void(0)">{{ $storethemesetting['features_title3'] }}</a>
                                    </h5>
                                    <p>{{ $storethemesetting['features_description3'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif


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
        <div class="testimonial comon-slick content-area-5">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1 class="mb-10">
                        {{ !empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials' }}
                    </h1>
                    <div class="title-border">
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                    </div>
                </div>
                <!-- Slick slider area start -->
                <div class="slick row comon-slick-inner"
                    data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                        <div class="item slide-box">
                            <div class="testimonials-inner">
                                <div class="user">
                                    <a href="#">
                                        <img class="media-object"
                                            src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }}"
                                            alt="user">
                                    </a>
                                </div>
                                <div class="testimonial-info">
                                    <h3>
                                        {{ $storethemesetting['testimonial_name1'] }}
                                    </h3>
                                    <p> {{ $storethemesetting['testimonial_about_us1'] }}</p>
                                    <p>{{ $storethemesetting['testimonial_description1'] }}</p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                        <span>{{ __('Rating') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on')
                        <div class="item slide-box">
                            <div class="testimonials-inner">
                                <div class="user">
                                    <a href="#">
                                        <img class="media-object"
                                            src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png'))) }}"
                                            alt="user">
                                    </a>
                                </div>
                                <div class="testimonial-info">
                                    <h3>
                                        {{ $storethemesetting['testimonial_name2'] }}
                                    </h3>
                                    <p> {{ $storethemesetting['testimonial_about_us2'] }}</p>
                                    <p>{{ $storethemesetting['testimonial_description2'] }}</p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                        <span>{{ __('Rating') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on')
                        <div class="item slide-box">
                            <div class="testimonials-inner">
                                <div class="user">
                                    <a href="#">
                                        <img class="media-object"
                                            src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png'))) }}"
                                            alt="user">
                                    </a>
                                </div>
                                <div class="testimonial-info">
                                    <h3>
                                        {{ $storethemesetting['testimonial_name3'] }}
                                    </h3>
                                    <p> {{ $storethemesetting['testimonial_about_us3'] }}</p>
                                    <p>{{ $storethemesetting['testimonial_description3'] }}</p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                        <span>{{ __('Rating') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

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
