<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Slider Area Start -->
    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>   
    <div class="home5-banner-area">
            <div class="paginations111"></div>
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
                        <div class="banner-content">
                            <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h1><?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                                </h1>
                                <p> <?php echo e(!empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.'); ?>

                                </p>
                                <?php
                                    break;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="banner-content-bottom">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>   
    <div class="home6-banner-area">
            <div class="container-fluid">
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-7 d-flex align-items-center">
                        <div class="banner-content">
                            <span><?php echo e(__('Get Connected')); ?></span>
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
                    <div class="col-lg-5 d-flex justify-content-lg-end">
                        <div class="banner-img-group">
                            <div class="top-img-group">
                                <div class="top-left-card">
                                    <div class="icon">
                                        <img src="<?php echo e(asset('assets/theme29to34/img/home6/icon/banner-icon.svg')); ?>"
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <h4>4,56,730+</h4>
                                        <span>Total Car</span>
                                    </div>
                                </div>
                                <div class="top-right-img">
                                    <img src="<?php echo e(asset('assets/theme29to34/img/home6/banner-img-01.png')); ?>"
                                        alt="">
                                </div>
                            </div>

                            <div class="bottom-img-group">
                                <div class="bottom-left-img">
                                    <img src="<?php echo e(asset('assets/theme29to34/img/home6/banner-img-02.png')); ?>"
                                        alt="">
                                </div>
                                <div class="bottom-right-img">
                                    <img src="<?php echo e(asset('assets/theme29to34/img/home6/banner-img-03.png')); ?>"
                                        alt="">
                                </div>
                            </div>
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
        <div class="home6-letest-car-section mb-100">
            <div class="container">
                <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <div class="col-lg-12">
                        <div class="section-title-2">
                            <h2><?php echo e(__('Vehicles')); ?></h2>
                            <p>To get the most accurate and up-to-date information.</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-40 wow fadeInUp" data-wow-delay="300ms">
                    <div class="col-lg-12">
                        <div class="home6-filter-area d-flex align-items-center justify-content-between">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo e($category == 'Start shopping' ? 'active' : ''); ?>"
                                            id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>-tab" data-bs-toggle="tab"
                                            data-bs-target="#<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>" role="tab"
                                            aria-controls="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>"
                                            aria-selected="<?php echo e($category == 'Start shopping' ? 'true' : 'false'); ?>">
                                            <?php echo e(__($category)); ?></button>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="explore-btn d-lg-flex d-none">
                                <a class="explore-btn2 two" href="<?php echo e(route('store.categorie.product', $store->slug)); ?>"><?php echo e(__('Show More')); ?> <i
                                        class="bi bi-arrow-right-short"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-40">
                    <div class="col-lg-12">
                        <div class="tab-content" id="myTabContent">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php echo e($key == 'Start shopping' ? 'active show' : ''); ?>"
                                    id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="featured-car-tab">
                                    <div class="row g-4">
                                        <?php if($items->count() > 0): ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-4 col-md-6  wow fadeInUp" data-wow-delay="200ms">
                                                    <div class="product-card4 style-3">
                                                        <div class="product-img">
                                                            
                                                            
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
                                                            <div class="location">
                                                                <a href="#">
                                                                    <i class="fas fa-th-large"></i>
                                                                        <?php echo e($product->product_category()); ?>

                                                                </a>
                                                            </div>
                                                            <h6>
                                                                <a
                                                                    href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                                    <?php echo e($product->getName()); ?>

                                                                </a>
                                                            </h6>
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
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                    <?php echo e($product->register_year); ?>

                                                                </li>
                                                                <li>
                                                                    <i class="fas fa-cogs"></i>
                                                                    <?php echo e(\App\Models\Utility::getVehicleTransmission($product->transmission_id)); ?>

                                                                </li>
                                                            </ul>
                                                            <div class="button-and-price">
                                                                <a class="primary-btn7" href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                                <?php echo e(__('Show More')); ?>    
                                                                </a>
                                                                <div class="price-area">
                                                                    <span><?php echo e(__('Price')); ?></span>
                                                                    <h6>
                                                                        <strong>
                                                                            <?php echo e(\App\Models\Utility::priceFormat($product->net_price)); ?></strong>
                                                                        <?php if($product->price): ?>
                                                                            <small>/<?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></small>
                                                                        <?php endif; ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
                <div class="explore-btn d-lg-none d-flex">
                    <a class="explore-btn2 two" href="<?php echo e(route('store.categorie.product', $store->slug)); ?>"><?php echo e(__('Show More')); ?> <i
                            class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php echo $__env->make('storefront.layout.theme29to34.product-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <div class="home5-why-drivco-area pt-90 pb-90 mb-100">
            <div class="container">
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="drivco-content">
                            <div class="section-title-2 mb-60 wow fadeInUp" data-wow-delay="200ms">
                                <h2><?php echo e(__('Why Choose Us?')); ?></h2>
                                <p><?php echo e(__('Premium Plan Free Trial')); ?></p>
                            </div>
                            <div class="drivco-featute">
                                <ul>
                                    <?php if(isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on'): ?>
                                        <?php if(isset($storethemesetting['features_icon1'])): ?>
                                            <li class="single-feature wow fadeInUp" data-wow-delay="300ms">
                                                <div class="feature-icon fa-2x">
                                                    <?php echo $storethemesetting['features_icon1']; ?>

                                                </div>
                                                <div class="feature-content">
                                                    <h5><?php echo e($storethemesetting['features_title1']); ?></h5>
                                                    <p>
                                                        <?php echo e($storethemesetting['features_description1']); ?>

                                                    </p>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on'): ?>
                                        <?php if(isset($storethemesetting['features_icon2'])): ?>
                                            <li class="single-feature wow fadeInUp" data-wow-delay="400ms">
                                                <div class="feature-icon fa-2x">
                                                    <?php echo $storethemesetting['features_icon2']; ?>

                                                </div>
                                                <div class="feature-content">
                                                    <h5><?php echo e($storethemesetting['features_title2']); ?></h5>
                                                    <p>
                                                        <?php echo e($storethemesetting['features_description2']); ?>

                                                    </p>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on'): ?>
                                        <?php if(isset($storethemesetting['features_icon3'])): ?>
                                            <li class="single-feature wow fadeInUp" data-wow-delay="500ms">
                                                <div class="feature-icon fa-2x">
                                                    <?php echo $storethemesetting['features_icon3']; ?>

                                                </div>
                                                <div class="feature-content">
                                                    <h5><?php echo e($storethemesetting['features_title3']); ?></h5>
                                                    <p>
                                                        <?php echo e($storethemesetting['features_description3']); ?>

                                                    </p>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center bg-dark d-none d-lg-flex rounded">
                        
                            
                                <?php if(!empty($store->logo)): ?>
                                    <img width="300" src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                        alt="Image placeholder">
                                <?php else: ?>
                                    <img width="300"class="logo1 img-fluid" src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                        alt="Image placeholder">
                                <?php endif; ?>
                            
                            
                        
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php echo $__env->make('storefront.layout.theme29to34.gallery-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('storefront.layout.theme29to34.category-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('storefront.layout.theme29to34.testimonial-type-2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('storefront.layout.theme29to34.brand-logo-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.' . $store->theme_dir . '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme34/index.blade.php ENDPATH**/ ?>