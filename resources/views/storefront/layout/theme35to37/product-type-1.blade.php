 <!-- Products Area Start -->
 @if (
     \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
         $products_type1->count() > 0)
     <section class="product-area pb-75 pt-100">
         <div class="container">
             <div class="row">
                 <div class="col-12" data-aos="fade-up">
                     <div class="section-title title-center mb-30">
                         <h2 class="title mw-100 mb-30">{{ __('Products') }}</h2>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="tab-content" data-aos="fade-up">
                         <div class="tab-pane fade active show">
                             <div class="row">
                                 @foreach ($products_type1 as $product)
                                     <div class="col-xl-3 col-lg-4 col-md-6">
                                         <div class="product-default border p-15 mb-25">
                                             <figure class="product-img mb-15">
                                                 <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                                     target="_self" title="Link"
                                                     class="lazy-container ratio ratio-2-3">
                                                     @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                         <img alt="Image placeholder"
                                                             src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                             data-src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                             class="d-block w-100 lazyload img-height-250">
                                                     @else
                                                         <img alt="Image placeholder"
                                                             src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                             class="d-block w-100 lazyload img-height-250">
                                                     @endif
                                                 </a>
                                             </figure>
                                             <div class="product-details">
                                                 <span class="product-category font-xsm">
                                                     {{ $product->product_category() }}</span>
                                                 <div class="d-flex align-items-center justify-content-between mb-15">
                                                     <h5 class="product-title lc-1 mb-0">
                                                         <a
                                                             href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                             {{ $product->getName() }}
                                                         </a>
                                                     </h5>
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
                                                         <a href="wishlist.html"
                                                             class="btn btn-icon {{ $btn_class }} {{ $btn_class == 'disabled' ? 'disabled' : '' }}"
                                                             data-tooltip="tooltip" data-bs-placement="right"
                                                             title="{{__('Wishlist')}}"
                                                             data-url="{{ route('store.addtowishlist', [$store->slug, $product->id]) }}"
                                                             data-csrf="{{ csrf_token() }}">
                                                             <i class="{{ $icon_class }} fal fa-heart"></i>
                                                         </a>
                                                         {{-- <a class="overlap-btn "
                                                        
                                                        >
                                                        <i class="{{ $icon_class }} fa-heart"></i>
                                                    </a> --}}
                                                     @endif



                                                 </div>
                                                 {{-- <div class="author mb-15">
                                                            <a href="car-grid.html" target="_self" title="link">
                                                                <img class="lazyload blur-up"
                                                                    src="assets/images/placeholder.png"
                                                                    data-src="assets/images/avatar-1.jpg"
                                                                    alt="Image">
                                                                <span>By Nikon</span>
                                                            </a>
                                                        </div> --}}

                                                 <div class="product-price">
                                                     <h6 class="new-price">
                                                         @if ($product->enable_product_variant == 'on')
                                                             {{ \App\Models\Utility::priceFormat(0) }}
                                                         @else
                                                             {{ \App\Models\Utility::priceFormat($product->price) }}
                                                         @endif
                                                     </h6>
                                                     @if ($product->last_price)
                                                         <span
                                                             class="old-price font-sm">{{ \App\Models\Utility::priceFormat($product->last_price) }}</span>
                                                     @endif
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- product-default -->
                                     </div>
                                 @endforeach
                             </div>
                         </div>
                     </div>
                     {{-- <div class="text-center mt-15 mb-25" data-aos="fade-up">
                         <a href="{{ route('store.categorie.product', $store->slug) }}"
                             class="btn btn-lg btn-primary fancy">{{ __('Show More') }}</a>
                     </div> --}}
                 </div>
             </div>
         </div>
     </section>
 @endif
 <!-- Products Area End -->
