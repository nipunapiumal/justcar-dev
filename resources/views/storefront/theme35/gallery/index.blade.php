@extends('storefront.layout.theme35')
@section('page-title')
    {{ __('Gallery') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="{{ asset('assets/theme35to37/images/page-title-bg-4.jpg') }}">
        <div class="container">
            <div class="content">
                <h2>{{ __('Gallery') }}</h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75">{{ __('Gallery') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Shop-area start -->
    <div class="shop-area pt-100 pb-60">
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-4 col-xl-3">
                    <div class="widget-offcanvas offcanvas-lg offcanvas-start" tabindex="-1" id="widgetOffcanvas"
                        aria-labelledby="widgetOffcanvas">

                        <div class="offcanvas-body p-3 p-lg-0">
                            <aside class="widget-area" data-aos="fade-up">
                                <div class="widget p-0 mb-40">
                                    <h5 class="title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#brands" aria-expanded="true" aria-controls="brands">
                                            {{ __('Categories') }}
                                        </button>
                                    </h5>
                                    <div id="brands" class="collapse show">
                                        <div class="accordion-body scroll-y mt-20">
                                            <ul class="list-group custom-radio">
                                                @foreach ($galleryCategories as $category)
                                                    <li>
                                                        {{-- <input class="input-radio" type="radio" name="radio"
                                                            id="radio1" value=""> --}}
                                                        <a href="{{ route('store.gallery', [$store->slug, $category->id]) }}"
                                                            class="form-radio-label">
                                                            <span>{{ $category->name }}</span>
                                                            <span
                                                                class="qty">({{ date('M d, Y', strtotime($category->created_at)) }})</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Spacer -->
                                <div class="pb-40"></div>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="product-sort-area" data-aos="fade-up">
                        <div class="row align-items-center">
                            {{-- <div class="col-lg-6">
                                <h4 class="mb-20">1,000+ Product Available</h4>
                            </div> --}}
                            {{-- <div class="col-4 d-lg-none">
                                <button class="btn btn-sm btn-outline icon-end radius-sm mb-20" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#widgetOffcanvas"
                                    aria-controls="widgetOffcanvas">
                                    Filter <i class="fal fa-filter"></i>
                                </button>
                            </div> --}}
                            {{-- <div class="col-8 col-lg-6">
                                <ul class="product-sort-list list-unstyled mb-20">
                                    <li class="item">
                                        <div class="sort-item d-flex align-items-center">
                                            <label class="me-2 font-sm">Sort By:</label>
                                            <select name="type" class="nice-select right color-dark">
                                                <option value="high">Trending</option>
                                                <option value="low">Newest</option>
                                                <option value="New">Popular</option>
                                                <option value="Old">Used</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Products -->
                    <div class="row">
                        @foreach ($galleries as $gallery)
                            <div class="col-xl-4 col-sm-6" data-aos="fade-up">
                                <div class="product-default shadow-none text-center mb-25">
                                    <figure class="product-img mb-15">
                                        @if (!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img))
                                            <a class="lazy-container ratio ratio-1-1"
                                                title="{{ $gallery->gallery_category() }}"
                                                href="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}">
                                                <img class="lazyload img-fluid img-height-250"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                    data-src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}"
                                                    alt="{{ $gallery->gallery_category() }}">
                                            </a>
                                        @else
                                            <a href="shop-details.html" target="_self" title="Link"
                                                class="lazy-container ratio ratio-1-1">
                                                <img alt="{{ $gallery->gallery_category() }}"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                    class="lazyload img-fluid img-height-250">
                                            </a>
                                        @endif


                                        <div class="product-overlay">
                                            <h2 class="text-light">
                                                {{ $gallery->gallery_category() }}
                                            </h2>
                                            {{-- <a href="shop-details.html" target="_self" title="Image" class="icon"><i
                                                    class="fas fa-eye"></i></a> --}}
                                            {{-- <a href="cart.html" target="_self" title="Add to cart"
                                                class="icon cart-btn"><i class="fas fa-shopping-cart"></i></a>
                                            <a href="wishlist.html" target="_self" title="Add to wishlist"
                                                class="icon wishlist-btn"><i class="fas fa-heart"></i></a> --}}
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        {{-- <div class="ratings justify-content-center">
                                            <div class="rate">
                                                <div class="rating-icon"></div>
                                            </div>
                                        </div> --}}
                                        {{-- <h5 class="product-title mt-10 mb-2">
                                            <a href="shop-details.html" target="_self" title="Link">Air Intake
                                                Performance
                                                Kit</a>
                                        </h5>
                                        <div class="product-price justify-content-center">
                                            <h6 class="new-price">$150.00</h6>
                                            <span class="old-price font-sm">$125.00</span>
                                        </div> --}}
                                    </div>
                                </div><!-- product-default -->
                            </div>
                        @endforeach

                    </div>
                    {{-- <div class="pagination mt-20 mb-40 justify-content-center" data-aos="fade-up">
                        <a href="shop-details.html" class="page-numbers radius-0 prev">Prev</a>
                        <span class="page-numbers radius-0 current" aria-current="page">1</span>
                        <a href="shop-details.html" class="page-numbers radius-0">2</a>
                        <a href="shop-details.html" class="page-numbers radius-0">3</a>
                        <a href="shop-details.html" class="page-numbers radius-0">4</a>
                        <a href="shop-details.html" class="page-numbers radius-0 next">Next</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Shop-area end -->
@endsection
