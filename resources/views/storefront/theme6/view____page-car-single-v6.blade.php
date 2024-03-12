
@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Product Details') }}
@endsection
@section('content')

    <!-- Agent Single Grid View -->
    <section class="our-agent-single pb90 bt1 pt30 mt70-992">
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
        </div>
        <div class="container-fluid p0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_page6_single_slider dots_none">
                        @foreach ($products_image as $key => $productss)
                            <div class="item">
                                <div class="sp6_single_slider">
                                    <div class="thumb">
                                        @if (!empty($products_image[$key]->product_images))
                                            <img class="img-fluid" style="width: 705px;height:301px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}"
                                                alt="">
                                        @else
                                            <img class="img-fluid" style="width: 850px;height:550px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt30 mb30">
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
                            <h2 class="title">{{ $products->name }}</h2>
                            <p class="para">{!! $products->detail !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="single_page_heading_content text-start text-lg-end">
                        <div class="share_content">
                            <ul>
                                {{-- <li class="list-inline-item"><a href="#"><span class="flaticon-email"></span>EMAIL</a>
                                </li> --}}
                                {{-- <li class="list-inline-item"><a href="#"><span
                                            class="flaticon-printer"></span>PRINT</a></li> --}}
                                {{-- <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span>SAVE</a> --}}
                                {{-- </li>
                                <li class="list-inline-item"><a href="#"><span class="flaticon-share"></span>SHARE</a>
                                </li> --}}
                                @if (Auth::guard('customers')->check())
                                    @if (!empty($wishlist) && isset($wishlist[$products->id]['product_id']))
                                        @if ($wishlist[$products->id]['product_id'] != $products->id)
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)" data-id="{{ $products->id }}"
                                                    class="action-item wishlist-icon add_to_wishlist wishlist_{{ $products->id }}">
                                                    <span class="flaticon-heart"></span>
                                                    {{ __('Save') }}
                                                </a>
                                            </li>
                                        @else
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)" data-id="{{ $products->id }}"
                                                    class="action-item wishlist-icon">
                                                    <span class="flaticon-heart"></span>
                                                    {{ __('Save') }}
                                                </a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="list-inline-item">
                                            <a href="#" data-id="{{ $products->id }}"
                                                class="action-item wishlist-icon add_to_wishlist wishlist_{{ $products->id }}">
                                                <span class="flaticon-heart"></span>
                                                {{ __('Save') }}
                                            </a>
                                        </li>
                                    @endif
                                @else
                                    <li class="list-inline-item">
                                        <a href="#" data-id="{{ $products->id }}"
                                            class="action-item wishlist-icon add_to_wishlist wishlist_{{ $products->id }}">
                                            <span class="flaticon-heart"></span>
                                            {{ __('Save') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="price_content">
                            <div class="price mt60 mb10 mt10-md">
                                <h3>
                                    <small class="mr15">
                                        <del>{{ \App\Models\Utility::priceFormat($products->last_price) }}</del>
                                    </small>
                                    @if ($products->enable_product_variant == 'on')
                                        {{ \App\Models\Utility::priceFormat(0) }}
                                    @else
                                        {{ \App\Models\Utility::priceFormat($products->price) }}
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <div class="popular_listing_sliders single_page6_tabs row pr15">
                        <!-- Nav tabs -->
                        <div class="nav nav-tabs col-lg-12" role="tablist">
                            @if (!empty($products->description))
                                <button class="nav-link" id="nav-description-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-description" role="tab" aria-controls="nav-description"
                                    aria-selected="true">{{ __('DESCRIPTION') }}</button>
                            @endif

                            @if ($products->product_type == 2)
                                <button class="nav-link active" id="nav-overview-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-overview" role="tab" aria-controls="nav-overview"
                                    aria-selected="false">{{ __('SPECIFICATION') }}</button>

                                <button class="nav-link text-uppercase" id="nav-features-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-features" role="tab" aria-controls="nav-features"
                                    aria-selected="false">{{ __('Features') }}</button>
                            @endif

                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content col-lg-12" id="nav-tabContent">
                            @if (!empty($products->description))
                                <div class="tab-pane fade" id="nav-description" role="tabpanel"
                                    aria-labelledby="nav-description-tab">
                                    <div class="listing_single_description bdr_none pl0 pr0">
                                        <h4 class="mb30">{{ __('DESCRIPTION') }} <span
                                                class="float-end body-color fz13">{{ __('ID') }}
                                                #{{ $products->id }}</span>
                                        </h4>


                                        {!! $products->description !!}
                                    </div>
                                </div>
                            @endif
                            @if ($products->product_type == 2)
                                <div class="tab-pane fade show active" id="nav-overview" role="tabpanel"
                                    aria-labelledby="nav-overview-tab">
                                    <div class="opening_hour_widgets p30 bdr_none pl0 pr0">
                                        <div class="wrapper">
                                            <h4 class="title">{{ __('SPECIFICATION') }}</h4>
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('Vehicle Brand') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $vehicle_brand->name }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('Vehicle Model') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $vehicle_model->name }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('Vehicle Number') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $products->vehicle_number }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('First Register Year') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $products->register_year }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('First Register Month') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $products->register_month }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('Millage (km)') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $products->millage }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('Fuel Type') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $fuel_type->name }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('Power') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $products->power }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('Exterior Color') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $products->exterior_color }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('Metallic') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $products->is_metallic }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="day">{{ __('Interior Color') }}</div>
                                                    </div>
                                                    <span class="schedule">{{ $products->interior_color }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-features" role="tabpanel"
                                    aria-labelledby="nav-features-tab">
                                    <div class="user_profile_service bdr_none pl0 pr0">
                                        <div class="row">
                                            {{-- <div class="col-lg-12">
                                        <h4 class="title">{{ __('Equipments') }} </h4>
                                      </div> --}}
                                            <div class="col-xl-7">
                                                <h5 class="subtitle">{{ __('Equipments') }}</h5>
                                            </div>
                                            <div class="col-xl-5">
                                                <ul class="service_list">
                                                    @foreach (json_decode($products->equipments) as $key_equipment => $equipment)
                                                        <li>{{ $equipment }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="col-xl-7">
                                                <h5 class="subtitle">{{ __('Interior Design') }}</h5>
                                            </div>
                                            <div class="col-xl-5">
                                                <ul class="service_list">
                                                    @foreach (json_decode($products->interior_design) as $key_interior_design => $interior_design)
                                                        <li>{{ $interior_design }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                    {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                </div>
                <div class="col-lg-4 col-xl-4">
                    {!! \App\Models\Advertisement::getAdvertisement($store, 2) !!}

                    <div class="offer_btns">
                        <div class="text-end">
                            {{-- <button class="btn btn-thm ofr_btn1 btn-block mt0 mb20 add_to_cart"
                                data-id="{{ $products->id }}">
                                <i class="fas fa-shopping-basket"></i> {{ __('Add to cart') }}
                            </button> --}}
                            {{-- <button class="btn ofr_btn2 btn-block mt0 mb20"><span
                                    class="flaticon-profit-report mr10 fz18 vam"></span>View VIN Report</button> --}}
                        </div>
                    </div>
                    <div class="sidebar_seller_contact bgc-f9">
                        <div class="d-flex align-items-center mb30">
                            <div class="flex-shrink-0">
                                <img class="mr-3 author_img w60"
                                    src="{{ asset(Storage::url('uploads/profile/' . (!empty($owner->avatar) ? $owner->avatar : 'avatar.png'))) }}"
                                    alt="author.png">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mt0 mb5 fz16 heading-color fw600">{{ $owner->name }}</h5>
                                <p class="mb0 tdu"><span
                                        class="flaticon-phone-call pr5 vam"></span>{{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '' }}
                                </p>
                            </div>
                        </div>
                        <h4 class="mb30"> {{ __('Contact Us') }}</h4>
                        {!! Form::open(
                            ['route' => ['store.store-contact', $store->slug], 'class' => 'contact_form'],
                            ['method' => 'POST'],
                        ) !!}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="first_name"
                                        placeholder="{{ __('First Name') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="last_name"
                                        placeholder="{{ __('Last Name') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="email" name="email"
                                        placeholder="{{ __('Email') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="phone"
                                        placeholder="{{ __('Phone No') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="subject"
                                        placeholder="{{ __('Subject') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea class="form-control" name="message" rows="6" maxlength="1000" placeholder="{{ __('Message') }}"></textarea>
                                </div>
                                <button type="submit"
                                    class="btn btn-block btn-thm mt10 mb20">{{ __('Get In Touch') }}</button>

                                @if (!empty($storethemesetting['top_bar_whatsapp']))
                                    <button type="button"
                                        onclick="window.location = 'https://wa.me/{{ $storethemesetting['top_bar_whatsapp'] }}';"
                                        class="btn btn-block btn-whatsapp mb0"><span
                                            class="flaticon-whatsapp mr10 text-white"></span>WhatsApp</button>
                                @endif
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Our Shopping Product -->
    <section class="our-shop pb100">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-title text-center text-md-start mb15-sm">
                        <h2>{{ __('Related products') }}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center text-md-end mb30-sm">
                        <a href="{{ route('store.categorie.product', [$store->slug, '']) }}"
                            class="more_listing">{{ __('Show More') }}<span class="icon"><span
                                    class="fas fa-plus"></span></span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="listing_item_4grid_slider nav_none">

                        @foreach ($all_products as $key => $product)
                            @if ($product->id != $products->id)
                                @php
                                    $product->name = $product->getName();
                                @endphp
                                <div class="item">
                                    <div class="car-listing">
                                        <div class="thumb">
                                            @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                <img alt="Image placeholder"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                    class="img-center img-fluid img-1">
                                            @else
                                                <img alt="Image placeholder"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                    class="img-center img-fluid img-1">
                                            @endif
                                        </div>
                                        <div class="details">
                                            <div class="wrapper">
                                                <h5 class="price">
                                                    @if ($product->enable_product_variant == 'on')
                                                        {{ __('In variant') }}
                                                    @else
                                                        {{ \App\Models\Utility::priceFormat($product->price) }}
                                                    @endif
                                                </h5>
                                                <h6 class="title"><a
                                                        href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                        {{ $product->name }}</a></h6>
                                            </div>
                                            <div class="listing_footer">
                                                <ul class="mb0">
                                                    @if ($product->product_type == 2)
                                                        <li class="list-inline-item"><a href="#"><span
                                                                    class="flaticon-road-perspective me-2"></span>{{ $product->millage }}</a>
                                                        </li>
                                                        <li class="list-inline-item"><a href="#"><span
                                                                    class="flaticon-gas-station me-2"></span>{{ $product->millage }}</a>
                                                        </li>
                                                        <li class="list-inline-item"><a href="#"><span
                                                                    class="flaticon-gear me-2"></span>{{ $product->millage }}</a>
                                                        </li>
                                                    @else
                                                        <li class="list-inline-item"><a href="#"><span
                                                                    class="flaticon-road-perspective me-2"></span>{{ $product->product_category() }}</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script-page')
    <script>
        $(document).on('change', '#pro_variants_name', function() {
            var variants = [];
            $(".variant-selection").each(function(index, element) {
                variants.push(element.value);
            });
            if (variants.length > 0) {
                $.ajax({
                    url: '{{ route('get.products.variant.quantity') }}',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        variants: variants.join(' : '),
                        product_id: $('#product_id').val()
                    },

                    success: function(data) {
                        $('.variation_price').html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('#variant_qty').val(data.quantity);
                    }
                });
            }
        });
    </script>
@endpush
@push('script-page')
    <script>
        // $(document).on('click', '.add_to_wishlist', function(e) {
        //     e.preventDefault();
        //     var id = $(this).attr('data-id');
        //     $.ajax({
        //         type: "POST",
        //         url: '{{ route('store.addtowishlist', [$store->slug, '__product_id']) }}'.replace(
        //             '__product_id', id),
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //         },
        //         success: function(response) {
        //             if (response.status == "Success") {
        //                 show_toastr('Success', response.message, 'success');
        //                 $('.wishlist_' + response.id).removeClass('add_to_wishlist');
        //                 $('.wishlist_' + response.id).html('<i class="fas fa-heart"></i>');
        //                 $('.wishlist_count').html(response.count);
        //             } else {
        //                 show_toastr('Error', response.error, 'error');
        //             }
        //         },
        //         error: function(result) {}
        //     });
        // });
        $(".add_to_cart").click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var variants = [];
            $(".variant-selection").each(function(index, element) {
                variants.push(element.value);
            });

            if (jQuery.inArray('', variants) != -1) {
                show_toastr('Error', "{{ __('Please select all option.') }}", 'error');
                return false;
            }
            var variation_ids = $('#variant_id').val();

            $.ajax({
                url: '{{ route('user.addToCart', ['__product_id', $store->slug, 'variation_id']) }}'
                    .replace(
                        '__product_id', id).replace('variation_id', variation_ids ?? 0),
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    variants: variants.join(' : '),
                },
                success: function(response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        $("#shopping_count").html(response.item_count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function(result) {
                    console.log('error');
                }
            });
        });
        $(document).on('change', '#pro_variants_name', function() {
            var variants = [];
            $(".variant-selection").each(function(index, element) {
                variants.push(element.value);
            });
            if (variants.length > 0) {
                $.ajax({
                    url: '{{ route('get.products.variant.quantity') }}',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        variants: variants.join(' : '),
                        product_id: $('#product_id').val()
                    },

                    success: function(data) {
                        $('.variation_price').html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('#variant_qty').val(data.quantity);
                    }
                });
            }
        });
    </script>
@endpush
