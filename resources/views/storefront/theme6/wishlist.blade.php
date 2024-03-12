@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Wish list') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <section class="inner_page_breadcrumb style2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title">{{ __('Wish list') }}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('store.slug', $store->slug) }}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Wish list') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Listing Grid View -->
    <section class="our-listing pt0 bgc-f9 pb30-991">
        <div class="container">
            <div class="row">
                @foreach ($products as $k => $product)
                    <div class="col-sm-6 col-lg-4 col-xl-3 wishlist_{{ $product['product_id'] }}">
                        <div class="car-listing">
                            <div class="thumb">
                                {{-- <div class="tag">FEATURED</div> --}}
                                @if (!empty($product['image']))
                                    <img class="w-100" style="height:167px"
                                        src="{{ asset(!empty($product['image']) ? $product['image'] : '') }}"
                                        alt="New collection" title="New collection">
                                @else
                                    <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                        class="">
                                @endif

                                {{-- <div class="thmb_cntnt2">
                                    <ul class="mb0">
                                        <li class="list-inline-item"><a class="text-white" href="#"><span
                                                    class="flaticon-photo-camera mr3"></span> 22</a></li>
                                        <li class="list-inline-item"><a class="text-white" href="#"><span
                                                    class="flaticon-play-button mr3"></span> 3</a></li>
                                    </ul>
                                </div> --}}
                                <div class="thmb_cntnt3">
                                    <ul class="mb0">
                                        <li class="list-inline-item">
                                            @if ($product['enable_product_variant'] == 'on')
                                                <a href="{{ route('store.product.product_view', [$store->slug, $product['product_id']]) }}"
                                                    class="add_to_cart"
                                                    data-url="{{ route('user.addToCart', [$product['product_id'], $store->slug, 'variation_id']) }}"
                                                    data-csrf="{{ csrf_token() }}">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" class="add_to_cart"
                                                    data-url="{{ route('user.addToCart', [$product['product_id'], $store->slug, 'variation_id']) }}"
                                                    data-csrf="{{ csrf_token() }}">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            @endif
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="delete_wishlist_item"
                                                id="delete_wishlist_item1" data-id="{{ $product['product_id'] }}"
                                                data-url="{{route('delete.wishlist_item', [$store->slug,$product['product_id']])}}"
                                                data-csrf="{{ csrf_token() }}">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="details">
                                <div class="wrapper">
                                    <h5 class="price">
                                        @if ($product['enable_product_variant'] != 'on')
                                            {{ \App\Models\Utility::priceFormat($product['price']) }}
                                        @else
                                            {{ __('In Variant') }}
                                        @endif

                                    </h5>
                                    <h6 class="title"><a href="page-car-single-v1.html">{{ $product['product_name'] }}</a>
                                    </h6>

                                    @if ($store->enable_rating == 'on')
                                        <div class="listign_review">
                                            <ul class="mb0">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @php
                                                        $icon = 'fa-star';
                                                        $color = '';
                                                        $newVal1 = $i - 0.5;

                                                        if (\App\Models\Product::getRatingById($product['product_id']) < $i && \App\Models\Product::getRatingById($product['product_id']) >= $newVal1) {
                                                            $icon = 'fa-star-half-alt';
                                                        }
                                                        if (\App\Models\Product::getRatingById($product['product_id']) >= $newVal1) {
                                                            $color = 'text-warning';
                                                        }

                                                    @endphp
                                                    <li class="list-inline-item">
                                                        <a href="#">
                                                            <i class="fa {{ $icon . ' ' . $color }}"></i>
                                                        </a>
                                                    </li>
                                                @endfor
                                                <li class="list-inline-item"><a
                                                        href="#">{{ \App\Models\Product::getRatingById($product['product_id']) }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif


                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
