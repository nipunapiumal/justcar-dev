<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
   
<!-- Slider Area Start -->
    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
        <div class="home3-banner-area">
            <div class="swiper home3-banner-slider">
                <div class="swiper-wrapper">
                    <?php $i=0; ?>
                    <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="banner-bg"
                                style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.6) 100%), url(<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png')))); ?>);">
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-wrapper">
                            <div class="banner-content">
                                <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h1><?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                                    </h1>
                                    <div class="banner-feature">
                                        
                                        <ul>
                                            <li>
                                                <?php echo e(!empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.'); ?>

                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <?php
                                        break;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </div>
                            <div
                                class="slider-btn-group style-2 style-3 justify-content-md-end justify-content-center gap-4">
                                <div class="slider-btn prev-4 d-md-flex d-none">
                                    <svg width="11" height="19" viewBox="0 0 8 13"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="paginations111"></div>
                                <div class="slider-btn next-4 d-md-flex d-none">
                                    <svg width="11" height="19" viewBox="0 0 8 13"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
    <div class="home4-banner-area">
        <div class="video-area">
            <video autoplay loop="loop" muted preload="auto">
                <source src="<?php echo e(asset('public/assets/theme29to34/video/home4/car-video.mp4')); ?>" type="video/mp4">
            </video>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h1>
                        <?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                    </h1>
                    <p>
                        <?php echo e(!empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.'); ?>

                    </p>
                    <div class="banner-content-bottom">
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- Slider Area End -->

    <?php echo $__env->make('storefront.layout.theme29to34.search-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    <?php endif; ?>

    <?php echo $__env->make('storefront.layout.theme29to34.product-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('storefront.layout.theme29to34.features-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('storefront.layout.theme29to34.gallery-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('storefront.layout.theme29to34.category-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('storefront.layout.theme29to34.testimonial-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('storefront.layout.theme29to34.brand-logo-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.' . $store->theme_dir . '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme32/index.blade.php ENDPATH**/ ?>