<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Slider Area Start -->
    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
        <!-- Home-area start-->
        <section class="hero-banner hero-banner-1">
            <div class="container">
                <div class="swiper home-slider" id="home-slider-1">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide" data-aos="fade-up">
                                <div class="banner-content" data-swiper-parallax="-300">
                                    <h1 class="title color-white">
                                        <?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                                    </h1>
                                    <p class="color-white mb-20">
                                        <?php echo e(!empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.'); ?>

                                    </p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="row">
                    <?php echo $__env->make('storefront.layout.theme35to37.search-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-xl-2 align-self-end" data-aos="fade-up" data-aos-delay="100">
                        <div class="slider-navigation position-static text-end mt-2 mt-lg-0">
                            <button type="button" title="Slide prev" class="slider-btn radius-0" id="home-slider-1-prev">
                                <i class="fal fa-angle-left"></i>
                            </button>
                            <button type="button" title="Slide next" class="slider-btn radius-0" id="home-slider-1-next">
                                <i class="fal fa-angle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper home-img-slider" id="home-img-slider-1">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide" data-aos="fade-up">
                            <div class="bg-img"
                                data-bg-image="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png')))); ?>">
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="swiper-pagination pagination-fraction" id="home-slider-1-pagination"></div>
        </section>
        <!-- Home-area end -->
    <?php else: ?>
        <!-- Home-area start-->
        <section class="hero-banner hero-banner-1">
            <div class="container">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" data-aos="fade-up">
                            <div class="banner-content" data-swiper-parallax="-300">
                                <h1 class="title color-white">
                                    <?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                                </h1>
                                <p class="color-white mb-20">
                                    <?php echo e(!empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.'); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php echo $__env->make('storefront.layout.theme35to37.search-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="swiper home-img-slider" id="home-img-slider-1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-aos="fade-up">
                        <div class="bg-img"
                            data-bg-image="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png')))); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Home-area end -->
    <?php endif; ?>
    <!-- Slider Area End -->

    <?php echo $__env->make('storefront.layout.theme35to37.category-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Vehicles Area Start -->
    <?php if($products['Start shopping']->count() > 0): ?>
        <section class="product-area pb-75 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <div class="section-title title-center mb-30">
                            <h2 class="title mw-100 mb-30"><?php echo e(__('Vehicles')); ?></h2>
                            <div class="tabs-navigation mb-20">
                                <ul class="nav nav-tabs" data-hover="fancyHover">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        

                                        <li class="nav-item <?php echo e($category == 'Start shopping' ? 'active' : ''); ?>"
                                            role="presentation">
                                            <button
                                                class="nav-link hover-effect btn-md <?php echo e($category == 'Start shopping' ? 'active' : ''); ?>"
                                                data-bs-toggle="tab" data-bs-target="#<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>"
                                                role="tab">
                                                <?php echo e(__($category)); ?>

                                            </button>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" data-aos="fade-up">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php echo e($key == 'Start shopping' ? 'active show' : ''); ?>"
                                    id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>">
                                    <div class="row">
                                        <?php if($items->count() > 0): ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-15">
                                                                <h5 class="product-title lc-1 mb-0">
                                                                    <a
                                                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                                        <?php echo e($product->getName()); ?>

                                                                    </a>
                                                                </h5>
                                                                
                                                            </div>
                                                            
                                                            <ul class="product-icon-list mb-15 list-unstyled overflow-auto">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-gas-pump"></i>
                                                                    <?php echo e(\App\Models\Product::getFuelTypeById($product->fuel_type_id)); ?>

                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-road"></i> <?php echo e($product->millage); ?>

                                                                </li>

                                                                
                                                                
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                    <?php echo e($product->register_year); ?>

                                                                </li>
                                                                
                                                                
                                                            </ul>
                                                            <div class="product-price">
                                                                <h6 class="new-price">
                                                                    <?php echo e(\App\Models\Utility::priceFormat($product->net_price)); ?>

                                                                </h6>
                                                                <?php if($product->price): ?>
                                                                    <span
                                                                        class="old-price font-sm"><?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product-default -->
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                    </div>
                    <div class="col-12">
                        <div class="advertisement-block">
                            <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php echo $__env->make('storefront.layout.theme35to37.product-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('storefront.layout.theme35to37.features-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Testimonials (v1) -->
    <?php if(isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on'): ?>
        <section class="testimonial-area testimonial-1">
            <div class="container">
                <div class="content">
                    <div class="row gx-xl-5 align-items-center">
                        <div class="col-md-6 col-lg-5 border-end border-sm-0" data-aos="fade-up">
                            <h2 class="title mb-20">
                                <?php echo e(!empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials'); ?>

                            </h2>
                        </div>
                        <div class="col-md-6 col-lg-5" data-aos="fade-up" data-aos-delay="100">
                            <p class="mb-20">
                                <?php echo e(!empty($storethemesetting['testimonial_main_heading_title'])
                                    ? $storethemesetting['testimonial_main_heading_title']
                                    : 'There is only that moment and the incredible certainty that <br> everything under the sun has been written by one hand only.'); ?>

                            </p>
                        </div>
                        <div class="col-lg-2" data-aos="fade-up" data-aos-delay="150">
                            <!-- Slider navigation buttons -->
                            <div class="slider-navigation text-lg-end mb-20">
                                <button type="button" title="Slide prev" class="slider-btn radius-0"
                                    id="testimonial-slider-btn-prev">
                                    <i class="fal fa-angle-left"></i>
                                </button>
                                <button type="button" title="Slide next" class="slider-btn radius-0"
                                    id="testimonial-slider-btn-next">
                                    <i class="fal fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center" data-aos="fade-up">
                    <div class="col-lg-9">
                        <div class="swiper pt-30 mb-15" id="testimonial-slider-1">
                            <div class="swiper-wrapper">
                                <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                                    <div class="swiper-slide pb-25" data-aos="fade-up">
                                        <div class="slider-item">
                                            <div class="client mb-25">
                                                <div class="client-info d-flex align-items-center">
                                                    <div class="client-img">
                                                        <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png')))); ?>"
                                                                alt="testimonial">

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="name"><?php echo e($storethemesetting['testimonial_name1']); ?></h6>
                                                        <span class="designation"><?php echo e($storethemesetting['testimonial_about_us1']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <div class="rate">
                                                        <div class="rating-icon"></div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="quote mb-25">
                                                <span class="icon"><i class="fal fa-quote-right"></i></span>
                                                <p class="text mb-0">
                                                    <?php echo e($storethemesetting['testimonial_description1']); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on'): ?>
                                    <div class="swiper-slide pb-25" data-aos="fade-up">
                                        <div class="slider-item">
                                            <div class="client mb-25">
                                                <div class="client-info d-flex align-items-center">
                                                    <div class="client-img">
                                                        <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png')))); ?>"
                                                                alt="testimonial">

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="name"><?php echo e($storethemesetting['testimonial_name2']); ?></h6>
                                                        <span class="designation"><?php echo e($storethemesetting['testimonial_about_us2']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <div class="rate">
                                                        <div class="rating-icon"></div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="quote mb-25">
                                                <span class="icon"><i class="fal fa-quote-right"></i></span>
                                                <p class="text mb-0">
                                                    <?php echo e($storethemesetting['testimonial_description2']); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on'): ?>
                                    <div class="swiper-slide pb-25" data-aos="fade-up">
                                        <div class="slider-item">
                                            <div class="client mb-25">
                                                <div class="client-info d-flex align-items-center">
                                                    <div class="client-img">
                                                        <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png')))); ?>"
                                                                alt="testimonial">

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="name"><?php echo e($storethemesetting['testimonial_name3']); ?></h6>
                                                        <span class="designation"><?php echo e($storethemesetting['testimonial_about_us3']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <div class="rate">
                                                        <div class="rating-icon"></div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="quote mb-25">
                                                <span class="icon"><i class="fal fa-quote-right"></i></span>
                                                <p class="text mb-0">
                                                    <?php echo e($storethemesetting['testimonial_description3']); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!-- Shape -->
            <div class="shape d-none d-lg-block"></div>
        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.' . $store->theme_dir . '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme35/index.blade.php ENDPATH**/ ?>