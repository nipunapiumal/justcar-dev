@extends('storefront.layout.theme37')

@section('page-title')
    {{ __('Product Details') }}
@endsection
@section('content')
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="{{ asset('assets/theme35to37/images/page-title-bg-4.jpg') }}">
        <div class="container">
            <div class="content">
                <h2>{{ $products->getName() }}</h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75">{{ $products->getName() }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- car-details-area start -->
    <div class="car-details-area pt-100 pb-60">
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-9">
                    <div class="product-single-gallery mb-40">
                        <div class="swiper product-single-slider">
                            <div class="swiper-wrapper">
                                @foreach ($products_image as $key => $product)
                                    <div class="swiper-slide">
                                        <figure class="lazy-container ratio ratio-5-3">
                                            @if (!empty($products_image[$key]->product_images))
                                                <a href="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}"
                                                    class="lightbox-single">
                                                    <img class="lazyload img-fluid w-100"
                                                        style="height:500px;object-fit:cover"
                                                        src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                        data-src="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}"
                                                        alt=""> </a>
                                            @else
                                                <a href="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                    class="lightbox-single">
                                                    <img class="lazyload img-fluid w-100"
                                                        style="height:500px;object-fit:cover"
                                                        src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                        alt=""> </a>
                                            @endif
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="product-thumb">
                            <div class="swiper slider-thumbnails">
                                <div class="swiper-wrapper">
                                    @foreach ($products_image as $key => $product)
                                        <div class="swiper-slide">
                                            <div class="thumbnail-img lazy-container ratio ratio-5-3">
                                                @if (!empty($products_image[$key]->product_images))
                                                    <img class="lazyload img-fluid w-100"
                                                        style="height:100px;object-fit:cover"
                                                        src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                        data-src="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}"
                                                        alt="">
                                                @else
                                                    <img class="lazyload img-fluid w-100"
                                                        style="height:100px;object-fit:cover"
                                                        src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                        alt="">
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Slider navigation buttons -->
                            <div class="slider-navigation">
                                <button type="button" title="Slide prev" class="slider-btn slider-btn-prev radius-0">
                                    <i class="fal fa-angle-left"></i>
                                </button>
                                <button type="button" title="Slide next" class="slider-btn slider-btn-next radius-0">
                                    <i class="fal fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="product-single-details">
                        <div class="row" data-aos="fade-up">
                            <div class="col-md-8">
                                <span class="product-category"> {{ $products->product_category() }}</span>
                                <h3 class="product-title mt-10 mb-20">{{ $products->getName() }}</h3>
                            </div>
                            <div class="col-md-4">
                                <div class="product-price mb-20">
                                    @if ($products->product_type == 1)
                                        <h3 class="new-price color-primary">
                                            @if ($products->enable_product_variant == 'on')
                                                {{ \App\Models\Utility::priceFormat(0) }}
                                            @else
                                                {{ \App\Models\Utility::priceFormat($products->price) }}
                                            @endif
                                        </h3>
                                        @if ($products->last_price)
                                            <span class="old-price h4 color-medium">
                                                {{ \App\Models\Utility::priceFormat($products->last_price) }}
                                            </span>
                                        @endif
                                    @else
                                        <h3 class="new-price color-primary">
                                            {{ \App\Models\Utility::priceFormat($products->price) }}
                                        </h3>
                                        @if ($products->net_price)
                                            <span class="old-price h4 color-medium">
                                                {{ \App\Models\Utility::priceFormat($products->net_price) }}
                                            </span>
                                        @endif
                                    @endif



                                </div>
                                {{-- <div class="author mb-20">
                                    <div class="image">
                                        <img class="lazyload blur-up" src="assets/images/placeholder.png"
                                            data-src="assets/images/avatar-1.jpg" alt="Person Image">
                                    </div>
                                    <div class="author-info">
                                        <h6 class="mb-2 lh-1">By Jonathan Doe</h6>
                                        <div class="ratings">
                                            <div class="rate">
                                                <div class="rating-icon"></div>
                                            </div>
                                            <span class="ratings-total">(4.5)</span>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-11">

                                @if ($products->product_type == 1)
                                    @if (!empty($products->specification))
                                        <!-- Description start -->
                                        <div class="product-desc pt-40" data-aos="fade-up">
                                            <h4 class="mb-20">
                                                {{ __('Product Specification') }}
                                            </h4>
                                            <p> {!! $products->specification !!}</p>
                                        </div>
                                    @endif
                                    @if (!empty($products->detail))
                                        <!-- Description start -->
                                        <div class="product-desc pt-40" data-aos="fade-up">
                                            <h4 class="mb-20">
                                                {{ __('DETAILS') }}
                                            </h4>
                                            <p> {!! $products->detail !!}</p>
                                        </div>
                                    @endif
                                @else
                                    @if (!empty($products->description))
                                        <!-- Description start -->
                                        <div class="product-desc pt-40" data-aos="fade-up">
                                            <h4 class="mb-20">
                                                {{ __('DESCRIPTION') }}
                                            </h4>
                                            <p> {!! $products->description !!}</p>
                                        </div>
                                    @endif

                                    <!-- Features info start -->
                                    <div class="product-spec pt-60" data-aos="fade-up">
                                        <h4 class="mb-20">{{ __('Features') }}</h4>
                                        <div class="row">
                                            @foreach (json_decode($products->equipments) as $key_equipment => $equipment)
                                                <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                    {{-- <h6 class="mb-1">Car Company</h6> --}}
                                                    <span>{{ $equipment }}</span>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>

                                    <!-- Features info start -->
                                    <div class="product-spec pt-60" data-aos="fade-up">
                                        <h4 class="mb-20">{{ __('Interior Design') }}</h4>
                                        <div class="row">
                                            @foreach (json_decode($products->interior_design) as $key_interior_design => $interior_design)
                                                <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                    {{-- <h6 class="mb-1">Car Company</h6> --}}
                                                    <span> {{ $interior_design }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Product feature -->
                                @if ($products->product_type == 2)
                                    <div class="product-spec pt-60" data-aos="fade-up">
                                        <h4 class="mb-20">{{ __('SPECIFICATION') }}</h4>
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('Vehicle Brand') }}</h6>
                                                <span> {{ $vehicle_brand->name }}</span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('Vehicle Model') }}</h6>
                                                <span> {{ $vehicle_model->name }}</span>
                                            </div>
                                            @if ($products->fin_number_display && $products->fin_number)
                                                <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                    <h6 class="mb-1">{{ __('Fin Number') }}</h6>
                                                    <span> {{ $products->fin_number }}</span>
                                                </div>
                                            @endif
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('First Register Year') }}</h6>
                                                <span> {{ $products->register_year }}</span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('First Register Month') }}</h6>
                                                <span> {{ $products->register_month }}</span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('Millage (km)') }}</h6>
                                                <span> {{ $products->millage }}</span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('Fuel Type') }}</h6>
                                                <span> {{ $fuel_type->name }}</span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('Power') }}</h6>
                                                <span> {{ $products->power }}</span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('Exterior Color') }}</h6>
                                                <span> {{ $products->exterior_color }}</span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('Metallic') }}</h6>
                                                <span> {{ $products->is_metallic }}</span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1">{{ __('Interior Color') }}</h6>
                                                <span> {{ $products->interior_color }}</span>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                                {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <aside class="widget-area" data-aos="fade-up">
                        <div class="widget widget-form bg-light mb-30">
                            @if ($products->product_type == 1)
                                @php
                                    $btn_class = 'add_to_wishlist wishlist_' . $products->id . '';
                                    $icon_class = 'far';
                                @endphp
                                @if (Auth::guard('customers')->check())
                                    @if (!empty($wishlist) && isset($wishlist[$products->id]['product_id']))
                                        @if ($wishlist[$products->id]['product_id'] == $products->id)
                                            @php
                                                $btn_class = 'disabled';
                                                $icon_class = 'fas';
                                            @endphp
                                        @endif
                                    @endif
                                @endif
                                <div class="form-group mb-2">
                                    <a href="javascript:void(0)" class="btn btn-md btn-primary w-100 {{ $btn_class }}"
                                        {{ $btn_class == 'disabled' ? 'disabled' : '' }}
                                        data-url="{{ route('store.addtowishlist', [$store->slug, $products->id]) }}"
                                        data-csrf="{{ csrf_token() }}">
                                        <i class="{{ $icon_class }} fa-heart"></i>
                                        {{ __('Save') }}
                                    </a>
                                </div>
                                <div class="form-group mb-2">
                                    <a href="javascript:void(0)" class="btn btn-md btn-primary w-100 add_to_cart"
                                        data-url="{{ route('user.addToCart', [$products->id, $store->slug, 'variation_id']) }}"
                                        data-csrf="{{ csrf_token() }}">
                                        <i class="fas fa-shopping-basket"></i>
                                        {{ __('Add to cart') }}
                                    </a>
                                </div>
                            @endif

                            {!! \App\Models\Advertisement::getAdvertisement($store, 2) !!}
                        </div>
                        <div class="widget widget-form bg-light mb-30">
                            <h5 class="title mb-20">
                                {{__("To More inquiry")}}
                            </h5>
                            {{-- <div class="user mb-20">
                                <div class="user-img">
                                    <div class="lazy-container ratio ratio-1-1 rounded-pill">
                                        <img class=" ls-is-cached lazyloaded" src="assets/images/avatar-1.jpg"
                                            data-src="assets/images/avatar-1.jpg" alt="Person Image">
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h6 class="mb-1">Jonathan Doe</h6>
                                    <a href="tel:123456789">+123-456-789</a>
                                    <br>
                                    <a href="mailto:info@email.com">info@email.com</a>
                                </div>
                            </div> --}}
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
                                        class="btn btn-md btn-primary w-100">{{ __('Get In Touch') }}</button>
    
                                </div>
                            </div>
                            {{ Form::close() }}                               
                        </div>
                        <!-- Spacer -->
                        <div class="pb-40"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- car-details-area start -->
@endsection
