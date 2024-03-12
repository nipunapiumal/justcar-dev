<!-- Products categories-->
@if (isset($storethemesetting['enable_categories']) &&
        $storethemesetting['enable_categories'] == 'on' &&
        !empty($pro_categories))
    @if ($storethemesetting['enable_categories'] == 'on')
        <section class="category-area category-1 ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title title-inline mb-50" data-aos="fade-up">
                            <h2 class="title mb-0">
                                {{ !empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories' }}
                            </h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            @foreach ($pro_categories as $key => $pro_categorie)
                                @if ($product_count[$key] > 0)
                                    <div class="col-lg-3 col-sm-6 mb-30" data-aos="fade-up">
                                        <a href="car-grid.html">
                                            <div class="category-item">
                                                <div class="d-flex flex-wrep justify-content-between mb-10">
                                                    <h4 class="category-title mb-10 text-truncate" data-tooltip="tooltip" data-bs-placement="top" title="{{ $pro_categorie->name }}">
                                                        {{ $pro_categorie->name }}
                                                    </h4>
                                                    <span class="category-qty h4 mb-10">({{ !empty($product_count[$key]) ? $product_count[$key] : '0' }})</span>
                                                </div>
                                                <div class="category-img">
                                                    @if (!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $pro_categorie->categorie_img))
                                                        <img alt="Image placeholder"
                                                            class="lazyload blur-up d-block w-100 img-height-250"
                                                            src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                            data-src="{{ asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img)) }}">
                                                    @else
                                                        <img alt="Image placeholder"
                                                            class="lazyload blur-up d-block w-100 img-height-250"
                                                            src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                            data-src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}">
                                                    @endif
{{-- 
                                                    <img class="" src="assets/images/placeholder.png"
                                                        data-src="assets/images/category/cat-1.png" alt="Product Image"
                                                        title="Product Image"> --}}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- <div class="text-center text-center mt-40">
                            <a href="car-grid.html" class="btn btn-lg btn-primary fancy">All Categories</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>

    @endif
@endif
