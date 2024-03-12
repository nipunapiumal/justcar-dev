 <!-- Products Area Start -->
 <?php if(
     \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
         $products_type1->count() > 0): ?>
     <section class="product-area pb-75 pt-100">
         <div class="container">
             <div class="row">
                 <div class="col-12" data-aos="fade-up">
                     <div class="section-title title-center mb-30">
                         <h2 class="title mw-100 mb-30"><?php echo e(__('Products')); ?></h2>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="tab-content" data-aos="fade-up">
                         <div class="tab-pane fade active show">
                             <div class="row">
                                 <?php $__currentLoopData = $products_type1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <div class="col-xl-3 col-lg-4 col-md-6">
                                         <div class="product-default border p-15 mb-25">
                                             <figure class="product-img mb-15">
                                                 <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                     target="_self" title="Link"
                                                     class="lazy-container ratio ratio-2-3">
                                                     <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                         <img alt="Image placeholder"
                                                             src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                             data-src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                             class="d-block w-100 lazyload img-height-250">
                                                     <?php else: ?>
                                                         <img alt="Image placeholder"
                                                             src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                             class="d-block w-100 lazyload img-height-250">
                                                     <?php endif; ?>
                                                 </a>
                                             </figure>
                                             <div class="product-details">
                                                 <span class="product-category font-xsm">
                                                     <?php echo e($product->product_category()); ?></span>
                                                 <div class="d-flex align-items-center justify-content-between mb-15">
                                                     <h5 class="product-title lc-1 mb-0">
                                                         <a
                                                             href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                             <?php echo e($product->getName()); ?>

                                                         </a>
                                                     </h5>
                                                     <?php if($product->product_type == 1): ?>
                                                         <?php
                                                             $btn_class = 'add_to_wishlist wishlist_' . $product->id . '';
                                                             $icon_class = 'far';
                                                         ?>

                                                         <?php if(Auth::guard('customers')->check()): ?>
                                                             <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                                 <?php if($wishlist[$product->id]['product_id'] == $product->id): ?>
                                                                     <?php
                                                                         $btn_class = 'disabled';
                                                                         $icon_class = 'fas text-danger';
                                                                     ?>
                                                                 <?php endif; ?>
                                                             <?php endif; ?>
                                                         <?php endif; ?>
                                                         <a href="wishlist.html"
                                                             class="btn btn-icon <?php echo e($btn_class); ?> <?php echo e($btn_class == 'disabled' ? 'disabled' : ''); ?>"
                                                             data-tooltip="tooltip" data-bs-placement="right"
                                                             title="<?php echo e(__('Wishlist')); ?>"
                                                             data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $product->id])); ?>"
                                                             data-csrf="<?php echo e(csrf_token()); ?>">
                                                             <i class="<?php echo e($icon_class); ?> fal fa-heart"></i>
                                                         </a>
                                                         
                                                     <?php endif; ?>



                                                 </div>
                                                 

                                                 <div class="product-price">
                                                     <h6 class="new-price">
                                                         <?php if($product->enable_product_variant == 'on'): ?>
                                                             <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                                         <?php else: ?>
                                                             <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                         <?php endif; ?>
                                                     </h6>
                                                     <?php if($product->last_price): ?>
                                                         <span
                                                             class="old-price font-sm"><?php echo e(\App\Models\Utility::priceFormat($product->last_price)); ?></span>
                                                     <?php endif; ?>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- product-default -->
                                     </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </div>
                         </div>
                     </div>
                     
                 </div>
             </div>
         </div>
     </section>
 <?php endif; ?>
 <!-- Products Area End -->
<?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/layout/theme35to37/product-type-1.blade.php ENDPATH**/ ?>