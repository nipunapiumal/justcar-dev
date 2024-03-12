@extends('storefront.layout.theme13to15')
@section('page-title')
    {{ __('Product Details') }}
@endsection
@section('content')
    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-8">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2>{{ $products->name }}</h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li>{{ $products->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Shop Details Area Start -->
    <div class="shop-details-area pt-150 pb-140">
        <div class="container">
            <div class="row flex-md-row-reverse">
                <div class="col-lg-9 col-md-12">
                    <div class="ht-shop-details-img">

                        <div class="row">
                            @foreach ($products_image as $key => $productss)
                                <div class="col-sm-6 col-xl-3">
                                    <div class="car-listing gallery p0 bdr_none">
                                        <div class="thumb">
                                            @if (!empty($products_image[$key]->product_images))
                                                <a class="popup-img"
                                                    href="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}">
                                                    <img class="img-whp cover"
                                                        src="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}"
                                                        alt="sp5s1.jpg"></a>
                                            @else
                                                <img alt="Image placeholder"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                    class="h100p">
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        {{-- <img src="img/post/l-1.jpg" alt=""> --}}
                    </div>
                    {{-- <div class="ht-shop-meta">
                        <span class="single-meta"><i class="fa fa-question-circle"></i>Request More Info</span>
                        <span class="single-meta"><i class="fa fa-tachometer"></i>Schedule Test Drive</span>
                        <span class="single-meta"><i class="fa fa-tag"></i>Make an Offer</span>
                        <span class="single-meta"><i class="fa fa-envelope"></i>Email to a Friend</span>
                        <span class="single-meta"><i class="fa fa-print"></i>Print this page</span>
                    </div> --}}
                    <div class="shop-details-info-wrapper">
                        <div class="shop-details-info">
                            @if ($products->product_type == 1)
                                <h4>{{ $products->name }}</h4>

                                @if ($store->enable_rating == 'on')
                                    <div class="p-ratings">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = $i - 0.5;
                                                if ($products->product_rating() < $i && $products->product_rating() >= $newVal1) {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if ($products->product_rating() >= $newVal1) {
                                                    $color = 'text-warning';
                                                }
                                            @endphp
                                            <i class="fa fa-star {{ $icon . ' ' . $color }}"></i>
                                        @endfor
                                        <span>({{ $products->product_rating() }}
                                            {{ __('Reviews') }})</span>
                                    </div>
                                @endif

                                {{-- <div class="">
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>({{ $avg_rating }} {{ __('Reviews') }})</span>
                                </div> --}}
                            @else
                                <h4>{{ $products->getName() }}</h4>
                            @endif

                        </div>
                        <div class="details-price">
                            @if ($products->product_type == 1)
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
                            @else
                                <h3>
                                    @if ($products->net_price)
                                        <small class="mr15">
                                            <del>{{ __('Net') }}
                                                {{ \App\Models\Utility::priceFormat($products->net_price) }}</del>
                                        </small>
                                    @endif
                                    {{ __('Gross') }} {{ \App\Models\Utility::priceFormat($products->price) }}
                                </h3>
                            @endif
                            @if ($products->product_type == 1)
                                <span>
                                    {{ __('Category') }} -
                                    {{ $products->product_category() }}
                                </span>
                            @endif
                        </div>
                    </div>
                    @if (!empty($products->description))
                        <div class="details-text">
                            <p>
                                {!! $products->description !!}
                            </p>
                        </div>
                    @endif

                    @if ($products->product_type == 1)
                        <ul role="tablist" class="nav nav-tabs">
                            <li role="presentation">
                                <a class="active text-uppercase" data-bs-toggle="tab" role="tab"
                                    aria-controls="specification" href="#specification"
                                    aria-expanded="true">{{ __('Product Specification') }}</a>
                            </li>
                            <li role="presentation">
                                <a data-bs-toggle="tab" role="tab" aria-controls="details" href="#details"
                                    aria-expanded="true">{{ __('DETAILS') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="specification" class="tab-pane active show fade" role="tabpanel">
                                <div class="tab-text">
                                    {!! $products->specification !!}
                                </div>
                            </div>
                            <div id="details" class="tab-pane show fade" role="tabpanel">
                                <div class="tab-text">
                                    {!! $products->detail !!}
                                </div>
                            </div>
                        </div>
                    @else
                        <ul role="tablist" class="nav nav-tabs">
                            <li role="presentation">
                                <a class="active" data-bs-toggle="tab" role="tab" aria-controls="specification"
                                    href="#specification" aria-expanded="true">{{ __('SPECIFICATION') }}</a>
                            </li>
                            {{-- <li role="presentation">
                            <a data-bs-toggle="tab" role="tab" aria-controls="review" href="#review"
                                aria-expanded="true">reviews</a>
                        </li>
                        <li role="presentation">
                            <a data-bs-toggle="tab" role="tab" aria-controls="tags" href="#tags"
                                aria-expanded="true">tags</a>
                        </li> --}}
                        </ul>
                        <div class="tab-content">
                            <div id="specification" class="tab-pane active show fade" role="tabpanel">
                                <div class="tab-text">
                                    <div class="row">
                                        <div class="col-xl-7">
                                            <h5 class="subtitle mb-3">{{ __('Equipments') }}</h5>
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
                                            <h5 class="subtitle mb-3">{{ __('Interior Design') }}</h5>
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
                        </div>
                    @endif


                </div>
                <div class="col-lg-3 col-md-12">




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
                        <button class="w-100 mb-1 default-btn {{ $btn_class }}"
                            {{ $btn_class == 'disabled' ? 'disabled' : '' }}
                            data-url="{{ route('store.addtowishlist', [$store->slug, $products->id]) }}"
                            data-csrf="{{ csrf_token() }}">
                            <span class="{{ $icon_class }} fa-heart"></span>
                            <span>{{ __('Save') }}</span>
                        </button>
                        <button class="w-100 default-btn add_to_cart mb-1"
                            data-url="{{ route('user.addToCart', [$products->id, $store->slug, 'variation_id']) }}"
                            data-csrf="{{ csrf_token() }}">
                            <span class="fas fa-shopping-basket"></span>
                            <span>{{ __('Add to cart') }}</span>
                        </button>
                    @endif


                    <div class="ht-single-widget-wrapper">
                        <div class="ht-single-widget pt-30">
                            <h4 class="widget-title">{{ __('SPECIFICATION') }}</h4>
                            <div class="ht-widget-item">
                                <div class="widget-content pt-35">
                                    @if ($products->product_type == 1)
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Category') }}</span>
                                            <span>{{ $products->product_category() }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('SKU') }}</span>
                                            <span>{{ $products->SKU }}</span>
                                        </div>
                                    @else
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Vehicle Brand') }}</span>
                                            <span>{{ $vehicle_brand->name }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Vehicle Model') }}</span>
                                            <span>{{ $vehicle_model->name }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Vehicle Number') }}</span>
                                            <span>{{ $products->vehicle_number }}</span>
                                        </div>
                                        @if ($products->fin_number_display)
                                            <div class="ht-details-widget">
                                                <span class="d-title">{{ __('Fin Number') }}</span>
                                                <span>{{ $products->fin_number }}</span>
                                            </div>
                                        @endif
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('First Register Year') }}</span>
                                            <span>{{ $products->register_year }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('First Register Month') }}</span>
                                            <span>{{ $products->register_month }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Millage (km)') }}</span>
                                            <span>{{ $products->millage }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Fuel Type') }}</span>
                                            <span>{{ $fuel_type->name }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Power') }}</span>
                                            <span>{{ $products->power }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Exterior Color') }}</span>
                                            <span>{{ $products->exterior_color }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Metallic') }}</span>
                                            <span>{{ $products->is_metallic }}</span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title">{{ __('Interior Color') }}</span>
                                            <span>{{ $products->interior_color }}</span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Details Area End -->
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
