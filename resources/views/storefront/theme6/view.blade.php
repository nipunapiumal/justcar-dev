@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Product Details') }}
@endsection
@section('content')
    @php

    @endphp
    <!-- Agent Single Grid View -->
    <section class="our-agent-single pb90 mt70-992 pt30 bt1">
        <div class="container">
            <div class="row mb30">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        <ol class="breadcrumb float-start">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('store.slug', $store->slug) }}">{{ __('Main site') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $products->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row mb30">
                <div class="col-lg-7 col-xl-8">
                    <div class="single_product_grid single_page1">
                        <div class="sps_content">
                            <div class="thumb">
                                <div class="single_product">
                                    <div class="single_item">
                                        <div class="thumb">
                                            {{-- <div class="tags">FEATURED</div> --}}
                                            @if (!empty($products->is_cover) && \Storage::exists('uploads/is_cover_image/' . $products->is_cover))
                                                <img alt="{{ $products->name }}"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/' . $products->is_cover)) }}"
                                                    class="img-fluid">
                                            @else
                                                <img alt="Image placeholder"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                    class="img-fluid">
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="overlay_icon"><a class="video_popup_btn popup-img popup-youtube"
                                            href="https://www.youtube.com/watch?v=oqNZOOWF8qM"><span
                                                class="flaticon-play-button"></span>Video</a></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="row">
                        @php $i=1; @endphp
                        @foreach ($products_image as $key => $value)
                            <div class="col-xxs-6 col-xs-3 col-sm-3 col-md-6 {{ $i >= 7 ? 'd-none' : '' }}">
                                <div class="sp5_small_img mb25">
                                    <div class="thumb">
                                        @if (!empty($products_image[$key]->product_images))
                                            <a class="popup-img"
                                                href="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}">
                                                <img class="img-whp" style="width: 190px;height:150px;object-fit:cover"
                                                    src="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}"
                                                    alt="">
                                            </a>
                                        @else
                                            <a class="popup-img"
                                                href="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}">
                                                <img class="img-whp" style="width: 190px;height:150px;object-fit:cover"
                                                    src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                    alt="">
                                            </a>
                                        @endif
                                        @if ($i == 6)
                                            <div class="overlay popup-img">
                                                <span class="flaticon-photo-camera"></span>
                                                <h5 class="title">{{ __('Show All Photo') }}</h5>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @php $i++; @endphp
                        @endforeach
                        {{-- <div class="col-xxs-6 col-xs-3 col-sm-3 col-md-6">
                            <div class="sp5_small_img mb25">
                                <div class="thumb">
                                    <a class="popup-img" href="images/listing/lsp1-v2.jpg"><img class="img-whp"
                                            src="images/listing/sp5s2.jpg" alt="sp5s2.jpg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxs-6 col-xs-3 col-sm-3 col-md-6">
                            <div class="sp5_small_img mb25">
                                <div class="thumb">
                                    <a class="popup-img" href="images/listing/lsp1-v3.jpg"><img class="img-whp"
                                            src="images/listing/sp5s3.jpg" alt="sp5s3.jpg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxs-6 col-xs-3 col-sm-3 col-md-6">
                            <div class="sp5_small_img mb25">
                                <div class="thumb">
                                    <a class="popup-img" href="images/listing/lsp1-v5.jpg"><img class="img-whp"
                                            src="images/listing/sp5s4.jpg" alt="sp5s4.jpg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxs-6 col-xs-3 col-sm-3 col-md-6">
                            <div class="sp5_small_img mb15-sm">
                                <div class="thumb">
                                    <a class="popup-img" href="images/listing/lsp1-v4.jpg"><img class="img-whp"
                                            src="images/listing/sp5s5.jpg" alt="sp5s5.jpg"></a>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-xxs-6 col-xs-3 col-sm-3 col-md-6">
                            <div class="sp5_small_img">
                                <div class="thumb">
                                    <a class="popup-img" href="images/listing/lsp5-v2.jpg"><img class="img-whp"
                                            src="images/listing/sp5s6.jpg" alt="sp5s6.jpg"></a>
                                    <div class="overlay popup-img">
                                        <span class="flaticon-photo-camera"></span>
                                        <h5 class="title">Show All Photo</h5>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row mb30">
                <div class="col-lg-7 col-xl-8">
                    <div class="single_page_heading_content">
                        <div class="car_single_content_wrapper">
                            {{-- <ul class="car_info mb20-md">
                                <li class="list-inline-item"><a href="#">BRAND NEW - IN STOCK</a></li>
                                <li class="list-inline-item"><a href="#"><span class="flaticon-clock-1 vam"></span>2
                                        years ago</a></li>
                                <li class="list-inline-item"><a href="#"><span
                                            class="flaticon-eye vam"></span>13102</a></li>
                            </ul> --}}

                            @if ($products->product_type == 1)
                                <ul class="car_info mb20-md">
                                    <li class="list-inline-item"><a href="#">{{ __('Category') }} -
                                            {{ $products->product_category() }}</a></li>
                                    {{-- <li class="list-inline-item">
                                        <a href="#">
                                            <span class="flaticon-clock-1 vam"></span>
                                            {{__('Category')}}: {{$products->product_category()}}
                                        </a>
                                        </li> --}}
                                    <li class="list-inline-item"><a href="javascript:void(0)">
                                            <i class="fa fa-star"></i>
                                            {{ $avg_rating }} {{ __('Reviews') }}</a></li>
                                </ul>
                                <h2 class="title">
                                    {{ $products->name }}
                                </h2>
                            @else
                                <h2 class="title">
                                    {{ $products->getVehicleBrand() }}
                                    {{ $products->getVehicleModel() }}
                                </h2>
                                <p class="para">{{ $products->getName() }}</p>
                            @endif


                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="single_page_heading_content text-start text-lg-end">
                        <div class="share_content">
                            <ul>
                                <li class="list-inline-item">
                                    @include('partials.social-sharing')
                                </li>
                                @if (isset($storethemesetting['contact_info_email']) && $storethemesetting['contact_info_email'])
                                    <li class="list-inline-item">
                                        <a href="mailto:{{ $storethemesetting['contact_info_email'] }}">
                                            <span class="flaticon-email"></span>
                                            {{ __('Email') }}

                                        </a>
                                    </li>
                                @endif
                                <li class="list-inline-item"><a href="javascript:window.print()"><span
                                            class="flaticon-printer"></span>{{ __('Print') }}</a></li>

                                @if ($products->product_type == 1)
                                    @if (Auth::guard('customers')->check())
                                        @if (!empty($wishlist) && isset($wishlist[$products->id]['product_id']))
                                            @if ($wishlist[$products->id]['product_id'] != $products->id)
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)"
                                                        class="add_to_wishlist wishlist_{{ $products->id }}"
                                                        data-url="{{ route('store.addtowishlist', [$store->slug, $products->id]) }}"
                                                        data-csrf="{{ csrf_token() }}">
                                                        <i class="far fa-heart"></i>
                                                        {{ __('Save') }}
                                                    </a>
                                                </li>
                                            @else
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="disabled">
                                                        <i class="fas fa-heart text-danger"></i>
                                                        {{ __('Save') }}
                                                    </a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)"
                                                    class="add_to_wishlist wishlist_{{ $products->id }}"
                                                    data-url="{{ route('store.addtowishlist', [$store->slug, $products->id]) }}"
                                                    data-csrf="{{ csrf_token() }}">
                                                    <i class="far fa-heart"></i>
                                                    {{ __('Save') }}
                                                </a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)"
                                                class="add_to_wishlist wishlist_{{ $products->id }}"
                                                data-url="{{ route('store.addtowishlist', [$store->slug, $products->id]) }}"
                                                data-csrf="{{ csrf_token() }}">
                                                <i class="far fa-heart"></i>
                                                {{ __('Save') }}
                                            </a>
                                        </li>

                                    @endif
                                @endif





                            </ul>
                        </div>
                        <div class="price_content">
                            <div class="price mt60 mb10 mt10-md">
                                <h3>

                                    @if ($products->product_type == 1)
                                        <small class="mr15">
                                            <del>{{ \App\Models\Utility::priceFormat($products->last_price) }}</del>
                                        </small>
                                        @if ($products->enable_product_variant == 'on')
                                            {{ \App\Models\Utility::priceFormat(0) }}
                                        @else
                                            {{ \App\Models\Utility::priceFormat($products->price) }}
                                        @endif
                                    @else
                                        @if ($products->net_price)
                                            <small class="mr15">
                                                <del>{{ __('Net') }}
                                                    {{ \App\Models\Utility::priceFormat($products->net_price) }}</del>
                                            </small>
                                        @endif
                                        {{ __('Gross') }} {{ \App\Models\Utility::priceFormat($products->price) }}
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="listing_single_description mt30 bdr_none p0">
                                <h4 class="mb30">{{ __('DESCRIPTION') }} <span class="float-end body-color fz13">
                                        @if ($products->product_type == 1)
                                            {{ $products->SKU }}
                                        @else
                                            {{ $products->vehicle_number }}
                                        @endif
                                    </span>
                                </h4>
                                <p class="first-para">
                                    {!! $products->description !!}
                                </p>
                                <p class="mt10 mb20">
                                    {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                                </p>
                            </div>
                        </div>
                        @if ($products->product_type == 1)
                            <div class="col-lg-12">
                                <div class="listing_single_description mt30 bdr_none p0 text-uppercase">
                                    <h4 class="mb30">{{ __('Product Specification') }}
                                    </h4>
                                    <p class="first-para">
                                        {!! $products->specification !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="listing_single_description mt30 bdr_none p0">
                                    <h4 class="mb30"> {{ __('DETAILS') }}
                                    </h4>
                                    <p class="first-para">
                                        {!! $products->detail !!}
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-12">
                                <div class="user_profile_service bdr_none p0 mt30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="title">{{ __('Features') }}</h4>
                                        </div>
                                        <div class="col-xl-6">
                                            <h5 class="subtitle">{{ __('Equipments') }}</h5>
                                        </div>
                                        <div class="col-xl-6">
                                            <ul class="service_list">
                                                @foreach (json_decode($products->equipments) as $key_equipment => $equipment)
                                                    <li>{{ $equipment }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <h5 class="subtitle">{{ __('Exterior Color') }}</h5>
                                        </div>
                                        <div class="col-lg-6 col-xl-5">
                                            <ul class="service_list">
                                                <li class="d-flex align-items-center">
                                                    <span class="colorinput-color"
                                                        style="background:{{ $products->exterior_color }}"></span>
                                                    &nbsp; {{ $products->exterior_color }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h5 class="subtitle">{{ __('Interior Design') }}</h5>
                                        </div>
                                        <div class="col-xl-6">
                                            <ul class="service_list">
                                                @foreach (json_decode($products->interior_design) as $key_interior_design => $interior_design)
                                                    <li>{{ $interior_design }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h5 class="subtitle">{{ __('Interior Color') }}</h5>
                                        </div>
                                        <div class="col-lg-6 col-xl-5">
                                            <ul class="service_list">
                                                <li class="d-flex align-items-center">
                                                    <span class="colorinput-color"
                                                        style="background:{{ $products->interior_color }}"></span>
                                                    &nbsp; {{ $products->interior_color }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if ($products->youtube_video)
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <h5 class="subtitle">{{ __('Youtube Video') }}</h5>
                                            </div>
                                            <div class="col-lg-6 col-xl-5">
                                                <ul class="service_list">
                                                    <li class="d-flex align-items-center">{{ $products->youtube_video }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    @if ($products->product_type == 1)
                        <div class="offer_btns">
                            <div class="text-end">
                                {{-- <button class="btn btn-thm ofr_btn1 btn-block mt0 mb20"><span
                                    class="flaticon-coin mr10 fz18 vam"></span>Make an Offer Price</button> --}}
                                <button class="btn ofr_btn2 btn-block mt0 mb20 add_to_cart"
                                    data-url="{{ route('user.addToCart', [$products->id, $store->slug, 'variation_id']) }}"
                                    data-csrf="{{ csrf_token() }}">
                                    <span class="fas fa-shopping-basket mr10 fz18 vam"></span>
                                    {{ __('Add to cart') }}
                                </button>
                            </div>
                        </div>
                    @endif
                    @if ($products->product_type == 2)
                        <div class="opening_hour_widgets p30 mb30">
                            <div class="wrapper">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('Vehicle Brand') }}</div>
                                        </div>
                                        <span class="schedule">{{ $vehicle_brand->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('Vehicle Model') }}</div>
                                        </div>
                                        <span class="schedule">{{ $vehicle_model->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('Vehicle Number') }}</div>
                                        </div>
                                        <span class="schedule">{{ $products->vehicle_number }}</span>
                                    </li>
                                    @if($products->fin_number_display)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('Fin Number') }}</div>
                                        </div>
                                        <span class="schedule">{{ $products->fin_number }}</span>
                                    </li>
                                    @endif
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('First Register Year') }}</div>
                                        </div>
                                        <span class="schedule">{{ $products->register_year }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('First Register Month') }}</div>
                                        </div>
                                        <span class="schedule">{{ $products->register_month }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('Millage (km)') }}</div>
                                        </div>
                                        <span class="schedule">{{ $products->millage }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('Fuel Type') }}</div>
                                        </div>
                                        <span class="schedule">{{ $fuel_type->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('Previous Owners') }}</div>
                                        </div>
                                        <span class="schedule">{{ $products->prev_owners }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('Transmission') }}</div>
                                        </div>
                                        <span
                                            class="schedule">{{ \App\Models\Utility::getVehicleTransmission($products->transmission_id) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day">{{ __('Power') }}</div>
                                        </div>
                                        <span class="schedule">{{ $products->power }}
                                            ({{ $products->power_type }})</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="sidebar_seller_contact bgc-f9 p30">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img class="mr-3 author_img w60"
                                    src="{{ asset(Storage::url('uploads/profile/' . (!empty($owner->avatar) ? $owner->avatar : 'avatar.png'))) }}"
                                    alt="author.png">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mt0 mb5 fz16 heading-color fw600">{{ __('Call Dealer') }}</h5>
                                <p class="mb0 tdu">
                                    <span class="flaticon-phone-call pr5 vam"></span>
                                    <a
                                        href="tel:{{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '' }}">{{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '' }}</a>
                                </p>
                            </div>
                        </div>
                        <h4 class="mb30 mt30">Contact Seller</h4>
                        {!! Form::open(
                            ['route' => ['store.store-contact', $store->slug], 'class' => 'contact_form'],
                            ['method' => 'POST'],
                        ) !!}
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="first_name"
                                        placeholder="{{ __('First Name') }}*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="last_name"
                                        placeholder="{{ __('Last Name') }}*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control email" type="email" name="email"
                                        placeholder="{{ __('Email') }}*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="phone"
                                        placeholder="{{ __('Phone No') }}*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="subject"
                                        placeholder="{{ __('Subject') }}*">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea name="message" class="form-control" rows="6" maxlength="1000" placeholder="{{ __('Message') }}*"></textarea>
                                </div>
                                <button type="submit"
                                    class="btn btn-block btn-thm mt10 mb20">{{ __('Get In Touch') }}</button>

                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
