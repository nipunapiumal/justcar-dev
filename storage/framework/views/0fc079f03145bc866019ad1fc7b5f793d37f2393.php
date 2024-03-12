<!-- Vehicles Area Start -->
<?php if($products['Start shopping']->count() > 0): ?>
<div class="featured-car-section pt-100 mb-100">
    <div class="container">
        <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
            <div class="col-lg-12 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                <div class="section-title-2">
                    <h2><?php echo e(__('Vehicles')); ?></h2>
                    <p><?php echo e(__('Here are some of the featured cars in different categories')); ?></p>
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
                    <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="feature-card">
                                <div class="product-img">
                                    
                                    
                                    
                                    <div class="swiper product-img-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                    <img alt="Image placeholder"
                                                        class="d-block w-100 img-height-407"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>">
                                                <?php else: ?>
                                                    <img alt="Image placeholder"
                                                        class="d-block w-100 img-height-407"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>">
                                                <?php endif; ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="price">
                                        <strong>
                                            <?php echo e(\App\Models\Utility::priceFormat($product->net_price)); ?>

                                            <?php if($product->price): ?>
                                                <span>/<?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></span>
                                            <?php endif; ?>
                                            
                                        </strong>
                                    </div>
                                    <h5><a
                                            href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"><?php echo e($product->getName()); ?></a>
                                    </h5>
                                    <ul class="features">
                                        <li>
                                            <i class="fas fa-gas-pump"></i>
                                            <?php echo e(\App\Models\Product::getFuelTypeById($product->fuel_type_id)); ?>

                                        </li>
                                        <li>
                                            <i class="fas fa-road"></i> <?php echo e($product->millage); ?>

                                        </li>
                                        <li>
                                            <i class="fas fa-car"></i> <?php echo e($product->power); ?>

                                        </li>
                                        <li>
                                            <i class="fas fa-cog"></i> <?php echo e($product->prev_owners); ?>

                                        </li>
                                        <li>
                                            <i class="fas fa-calendar-alt"></i> <?php echo e($product->register_year); ?>

                                        </li>
                                        <li>
                                            <i class="fas fa-cogs"></i>
                                            <?php echo e(\App\Models\Utility::getVehicleTransmission($product->transmission_id)); ?>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme29to34/vehicle-type-1.blade.php ENDPATH**/ ?>