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