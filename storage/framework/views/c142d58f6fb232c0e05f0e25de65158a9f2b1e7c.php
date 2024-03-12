 <!-- Gallery-->
 <?php if(isset($storethemesetting['enable_gallery']) &&
 $storethemesetting['enable_gallery'] == 'on' &&
 !empty($pro_categories)): ?>
<?php if($storethemesetting['enable_gallery'] == 'on'): ?>
 <div class="brand-category-section mb-100">
     <div class="container">
         <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
             <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                 <div class="section-title-2">
                     <h2> <?php echo e(!empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery')); ?>

                     </h2>
                     <p> <?php echo e($storethemesetting['gallery_description']); ?></p>
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
                         <?php $__currentLoopData = $gallery_categories_; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="swiper-slide">
                                 <div class="brand-category-card">
                                     <div class="category-img">
                                         <?php if(!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img)): ?>
                                             <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $items->categorie_img))); ?>"
                                                 class="d-block w-100" style="height:407px;object-fit:cover">
                                         <?php else: ?>
                                             <img class="d-block w-100"
                                                 src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                 style="height:407px;object-fit:cover">
                                         <?php endif; ?>
                                     </div>
                                     <div class="category-content">
                                         <h5><a
                                                 href="<?php echo e(route('store.gallery', [$store->slug, $items->id])); ?>">
                                                 <?php echo e($items->name); ?></a></h5>
                                     </div>
                                 </div>
                             </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
<?php endif; ?>
<?php endif; ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme29to34/gallery-type-1.blade.php ENDPATH**/ ?>