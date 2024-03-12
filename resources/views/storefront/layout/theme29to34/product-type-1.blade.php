 <!-- Products Area Start -->
 @if (
    \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
        $products_type1->count() > 0)
    <div class="upcoming-car-area mb-100">
        <div class="container">
            <div class="row mb-60 wow fadeInUp" data-wow-delay="200ms">
                <div class="col-lg-12">
                    <div class="section-title1">
                        {{-- <span>On The Way</span> --}}
                        <h2>{{ __('Products') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-40 wow fadeInUp" data-wow-delay="300ms">
                <div class="col-lg-12">
                    <div class="swiper upcoming-car-slider">
                        <div class="swiper-wrapper">

                            @foreach ($products_type1 as $product)
                                <div class="swiper-slide">
                                    <div class="product-card style-2">
                                        <div class="product-img">
                                            {{-- <div class="number-of-img">
                                    <img src="assets/img/home1/icon/gallery-icon-1.svg" alt="">
                                    10
                                </div> --}}

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
                                                <a class="fav {{ $btn_class }}"
                                                    {{ $btn_class == 'disabled' ? 'disabled' : '' }}
                                                    data-url="{{ route('store.addtowishlist', [$store->slug, $product->id]) }}"
                                                    data-csrf="{{ csrf_token() }}">
                                                    <i class="{{ $icon_class }} fa-heart text-light"></i>
                                                </a>
                                            @endif
                                            <div class="slider-btn-group">
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
                                            </div>
                                            <div class="swiper product-img-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                            <img alt="Image placeholder"
                                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                                class="d-block w-100 img-height-250">
                                                        @else
                                                            <img alt="Image placeholder"
                                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                class="d-block w-100 img-height-250">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="content-top">
                                                <div class="price-and-title">
                                                    <h5 class="price">
                                                        @if ($product->enable_product_variant == 'on')
                                                            {{ \App\Models\Utility::priceFormat(0) }}
                                                        @else
                                                            {{ \App\Models\Utility::priceFormat($product->price) }}
                                                        @endif
                                                        @if ($product->last_price)
                                                            <span>/<del>{{ \App\Models\Utility::priceFormat($product->last_price) }}</del>
                                                            </span>
                                                        @endif
                                                    </h5>
                                                    <h5>
                                                        <a
                                                            href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                            {{ $product->name }}</a>
                                                    </h5>
                                                </div>
                                                {{-- <div class="company-logo">
                                        <img src="assets/img/home1/icon/toyota-01.svg" alt="">
                                    </div> --}}
                                            </div>
                                            <div class="launch-date">
                                                <p><i class="fas fa-th-large"></i>
                                                    {{ $product->product_category() }}</p>
                                            </div>
                                            <div class="launch-btn">


                                                <button type="button"
                                                    data-url="{{ route('user.addToCart', [$product->id, $store->slug, 'variation_id']) }}"
                                                    data-csrf="{{ csrf_token() }}" class="primary-btn1 add_to_cart">
                                                    {{-- <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4311 12.759C15.417 11.4291 16 9.78265 16 8C16 3.58169 12.4182 0 8 0C3.58169 0 0 3.58169 0 8C0 12.4182 3.58169 16 8 16C10.3181 16 12.4058 15.0141 13.867 13.4387C14.0673 13.2226 14.2556 12.9957 14.4311 12.759ZM13.9875 12C14.7533 10.8559 15.1999 9.48009 15.1999 8C15.1999 4.02355 11.9764 0.799983 7.99991 0.799983C4.02355 0.799983 0.799983 4.02355 0.799983 8C0.799983 9.48017 1.24658 10.8559 2.01245 12C2.97866 10.5566 4.45301 9.48194 6.17961 9.03214C5.34594 8.45444 4.79998 7.49102 4.79998 6.39995C4.79998 4.63266 6.23271 3.19993 8 3.19993C9.76729 3.19993 11.2 4.63266 11.2 6.39995C11.2 7.49093 10.654 8.45444 9.82039 9.03206C11.5469 9.48194 13.0213 10.5565 13.9875 12ZM13.4722 12.6793C12.3495 10.8331 10.3188 9.59997 8.00008 9.59997C5.68126 9.59997 3.65049 10.8331 2.52776 12.6794C3.84829 14.2222 5.80992 15.2 8 15.2C10.1901 15.2 12.1517 14.2222 13.4722 12.6793ZM8 8.79998C9.32551 8.79998 10.4 7.72554 10.4 6.39995C10.4 5.07444 9.32559 3.99992 8 3.99992C6.6744 3.99992 5.59997 5.07452 5.59997 6.40003C5.59997 7.72554 6.67449 8.79998 8 8.79998Z"></path>
                                        </svg>  --}}
                                                    <i class="fas fa-shopping-basket"></i>
                                                    {{ __('Add To Cart') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- Products Area End -->