 <!-- Gallery-->
 @if (isset($storethemesetting['enable_gallery']) &&
 $storethemesetting['enable_gallery'] == 'on' &&
 !empty($pro_categories))
@if ($storethemesetting['enable_gallery'] == 'on')
 <div class="brand-category-section mb-100">
     <div class="container">
         <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
             <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                 <div class="section-title-2">
                     <h2> {{ !empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery') }}
                     </h2>
                     <p> {{ $storethemesetting['gallery_description'] }}</p>
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
                         @foreach ($gallery_categories_ as $items)
                             <div class="swiper-slide">
                                 <div class="brand-category-card">
                                     <div class="category-img">
                                         @if (!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img))
                                             <img src="{{ asset(Storage::url('uploads/gallery_image/' . $items->categorie_img)) }}"
                                                 class="d-block w-100" style="height:407px;object-fit:cover">
                                         @else
                                             <img class="d-block w-100"
                                                 src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                 style="height:407px;object-fit:cover">
                                         @endif
                                     </div>
                                     <div class="category-content">
                                         <h5><a
                                                 href="{{ route('store.gallery', [$store->slug, $items->id]) }}">
                                                 {{ $items->name }}</a></h5>
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
@endif