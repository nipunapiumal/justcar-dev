<!-- Products categories-->
@if (isset($storethemesetting['enable_categories']) &&
$storethemesetting['enable_categories'] == 'on' &&
!empty($pro_categories))
@if ($storethemesetting['enable_categories'] == 'on')
<div class="news-section brand-category-section mt-100 mb-100">
    <div class="container">
        <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
            <div class="mt-100 col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                <div class="section-title-2">
                    <h2> {{ !empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories' }}
                    </h2>
                    <p>
                        {{ !empty($storethemesetting['categories_title'])
                            ? $storethemesetting['categories_title']
                            : 'There is only that moment and the incredible certainty <br> that everything under the sun has been written by one hand only.' }}
                    </p>
                </div>
                <div class="slider-btn-group2">
                    <div class="slider-btn prev-5">
                        <svg width="9" height="15" viewBox="0 0 8 13"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                        </svg>
                    </div>
                    <div class="slider-btn next-5">
                        <svg width="9" height="15" viewBox="0 0 8 13"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="300ms">
            <div class="col-lg-12">
                <div class="swiper brand-category-slider">
                    <div class="swiper-wrapper">
                        @foreach ($pro_categories as $key => $pro_categorie)
                            @if ($product_count[$key] > 0)
                                <div class="swiper-slide">
                                    <div class="brand-category-card">
                                        <div class="category-img">
                                            @if (!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img))
                                                <img alt="Image placeholder" class="d-block w-100"
                                                    src="{{ asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img)) }}"
                                                    style="height:407px;object-fit:cover">
                                            @else
                                                <img alt="Image placeholder" class="d-block w-100"
                                                    src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                    style="height:407px;object-fit:cover">
                                            @endif
                                        </div>
                                        <div class="category-content">
                                            <h5>
                                                <a
                                                    href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}">{{ $pro_categorie->name }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif