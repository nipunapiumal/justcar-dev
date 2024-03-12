 <!-- Products Area Start -->
 <?php if(
    \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
        $products_type1->count() > 0): ?>
    <div class="upcoming-car-area mb-100">
        <div class="container">
            <div class="row mb-60 wow fadeInUp" data-wow-delay="200ms">
                <div class="col-lg-12">
                    <div class="section-title1">
                        
                        <h2><?php echo e(__('Products')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row mb-40 wow fadeInUp" data-wow-delay="300ms">
                <div class="col-lg-12">
                    <div class="swiper upcoming-car-slider">
                        <div class="swiper-wrapper">

                            <?php $__currentLoopData = $products_type1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="product-card style-2">
                                        <div class="product-img">
                                            

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
                                                <a class="fav <?php echo e($btn_class); ?>"
                                                    <?php echo e($btn_class == 'disabled' ? 'disabled' : ''); ?>

                                                    data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $product->id])); ?>"
                                                    data-csrf="<?php echo e(csrf_token()); ?>">
                                                    <i class="<?php echo e($icon_class); ?> fa-heart text-light"></i>
                                                </a>
                                            <?php endif; ?>
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
                                                        <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                            <img alt="Image placeholder"
                                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                                class="d-block w-100 img-height-250">
                                                        <?php else: ?>
                                                            <img alt="Image placeholder"
                                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                                class="d-block w-100 img-height-250">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="content-top">
                                                <div class="price-and-title">
                                                    <h5 class="price">
                                                        <?php if($product->enable_product_variant == 'on'): ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                                        <?php else: ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                        <?php endif; ?>
                                                        <?php if($product->last_price): ?>
                                                            <span>/<del><?php echo e(\App\Models\Utility::priceFormat($product->last_price)); ?></del>
                                                            </span>
                                                        <?php endif; ?>
                                                    </h5>
                                                    <h5>
                                                        <a
                                                            href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                            <?php echo e($product->name); ?></a>
                                                    </h5>
                                                </div>
                                                
                                            </div>
                                            <div class="launch-date">
                                                <p><i class="fas fa-th-large"></i>
                                                    <?php echo e($product->product_category()); ?></p>
                                            </div>
                                            <div class="launch-btn">


                                                <button type="button"
                                                    data-url="<?php echo e(route('user.addToCart', [$product->id, $store->slug, 'variation_id'])); ?>"
                                                    data-csrf="<?php echo e(csrf_token()); ?>" class="primary-btn1 add_to_cart">
                                                    
                                                    <i class="fas fa-shopping-basket"></i>
                                                    <?php echo e(__('Add To Cart')); ?>

                                                </button>
                                            </div>
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
<!-- Products Area End --><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme29to34/product-type-1.blade.php ENDPATH**/ ?>