<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Slider Area Start -->
    <div class="slider-three-area">
        <div class="slider-wrapper">
            <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
            <?php $i = 1; ?>    
            <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div data-dot="0<?php echo e($i); ?>" class="single-slide"
                        style="background-image: url('<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png')))); ?>');">
                        <div class="banner-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 col-md-10 col-sm-12 col-xs-12">
                                        <div class="text-content-wrapper text-left">
                                            <div class="text-content">
                                                
                                                <h1><?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                                                </h1>
                                                <p> <?php echo e(!empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.'); ?>

                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++;?> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="single-slide"
                    style="background-image: url('<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png')))); ?>');">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7 col-md-10 col-sm-12 col-xs-12">
                                    <div class="text-content-wrapper text-left">
                                        <div class="text-content">
                                            
                                            <h1> <?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                                            </h1>
                                            <p> <?php echo e(!empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.'); ?>

                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


        </div>
    </div>
    <!-- Slider Area End -->


    <!-- Gallery-->
    <?php if(isset($storethemesetting['enable_gallery']) &&
        $storethemesetting['enable_gallery'] == 'on' &&
        !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_gallery'] == 'on'): ?>
            <div class="latest-product-area pt-100 pb-70">
                <div class="container">
                    <div class="section-title-light pb-60 text-center">
                        <h5><?php echo e(!empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery')); ?>

                        </h5>
                        <h2><?php echo e(!empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery')); ?>

                        </h2>
                        <p>
                            <?php echo e(!empty($storethemesetting['gallery_description'])
                                ? $storethemesetting['gallery_description']
                                : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     under the sun has been written by one hand only.'); ?>

                        </p>
                    </div>
                    <div class="grid">
                        <div class="row">
                            <?php $i=0; ?>
                            <?php $__currentLoopData = $gallery_categories_; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    // print_r($items);
                                ?>
                                <?php if($i == 0): ?>
                                    <div class="col-md-6 col-sm-12 grid-item col-xs-12">
                                        <div class="latest-item">
                                            <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                <?php if(!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img)): ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $items->categorie_img))); ?>"
                                                        alt="" width="570" height="270"
                                                        style="object-fit: cover">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="" width="570" height="270"
                                                        style="object-fit: cover">
                                                <?php endif; ?>
                                                <span class="latest-p-title">
                                                    <span class="p-title-1"><?php echo e($items->name); ?></span>
                                                    
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php elseif($i == 1 || $i == 2 || $i == 3 || $i == 4): ?>
                                    <div class="col-md-3 col-sm-6 grid-item col-xs-12">
                                        <div class="latest-item">
                                            <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                <?php if(!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img)): ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $items->categorie_img))); ?>"
                                                        alt="" width="270" height="270"
                                                        style="object-fit: cover">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="" width="270" height="270"
                                                        style="object-fit: cover">
                                                <?php endif; ?>
                                                <span class="latest-p-title">
                                                    <span class="p-title-1"><?php echo e($items->name); ?></span>
                                                    
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php elseif($i == 5): ?>
                                    <div class="col-md-6 col-sm-12 grid-item col-xs-12">
                                        <div class="latest-item">
                                            <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                <?php if(!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img)): ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $items->categorie_img))); ?>"
                                                        alt="" width="570" height="270"
                                                        style="object-fit: cover">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="" width="570" height="270"
                                                        style="object-fit: cover">
                                                <?php endif; ?>
                                                <span class="latest-p-title">
                                                    <span class="p-title-1"><?php echo e($items->name); ?></span>
                                                    
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>



                                <?php $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                            
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <!-- Service Area Start -->
        <div class="service-three-area ptb-150 bg-6">
            <div class="container text-center">
                <div class="section-title pb-100">
                    <h5><?php echo e(__('Why Choose Us?')); ?></h5>
                    <h2><?php echo e(__('Why Choose Us?')); ?></h2>
                    
                </div>
                <div class="bg-white">
                    <div class="row custom">
                        <?php if(isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on'): ?>
                            <?php if(isset($storethemesetting['features_icon1'])): ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <span class="srv-icon">
                                            <span style="font-size: 70px">
                                                <?php echo $storethemesetting['features_icon1']; ?>

                                            </span>
                                        </span>
                                        <h5><?php echo e($storethemesetting['features_title1']); ?></h5>
                                        <span class="divider"></span>
                                        <p>
                                            <?php echo e($storethemesetting['features_description1']); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on'): ?>
                            <?php if(isset($storethemesetting['features_icon2'])): ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <span class="srv-icon">
                                            <span style="font-size: 70px">
                                                <?php echo $storethemesetting['features_icon2']; ?>

                                            </span>
                                        </span>
                                        <h5><?php echo e($storethemesetting['features_title2']); ?></h5>
                                        <span class="divider"></span>
                                        <p>
                                            <?php echo e($storethemesetting['features_description2']); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on'): ?>
                            <?php if(isset($storethemesetting['features_icon3'])): ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <span class="srv-icon">
                                            <span style="font-size: 70px">
                                                <?php echo $storethemesetting['features_icon3']; ?>

                                            </span>
                                        </span>
                                        <h5><?php echo e($storethemesetting['features_title3']); ?></h5>
                                        <span class="divider"></span>
                                        <p>
                                            <?php echo e($storethemesetting['features_description3']); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Service Area End -->
    <?php endif; ?>


    <?php if($products['Start shopping']->count() > 0): ?>
        <!-- Feature Products Area Start -->
        <div class="feature-product-two-area ptb-150">
            <div class="container-fluid">
                        <div class="section-title-light pb-60 text-center">
                            <h5><?php echo e(__('Vehicles')); ?></h5>
                            <h2><?php echo e(__('Vehicles')); ?></h2>
                            
                        </div>
                        <div class="m-rl-n-15px">
                            <div class="feature-slick-carousel-two">
                                <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $product->name = $product->getName();
                                    ?>
                                    
                                    
                                    <div class="p-lr-15px">
                                        <div class="single-feature-item">
                                            <div class="feature-image">
                                                <a
                                                    href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                    <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                        <img alt="Image placeholder" width="336" height="493"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder" width="336" height="493"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="feature-wrapper">
                                                <div class="feature-text">
                                                    <h5>
                                                        <a
                                                            href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                            <?php echo e($product->name); ?>

                                                        </a>
                                                    </h5>
                                                    
                                                </div>
                                                <div class="feature-info">
                                                    <span><?php echo e(__('Millage')); ?> <span><?php echo e($product->millage); ?></span></span>

                                                    <span><?php echo e(__('Fuel Type')); ?>

                                                        <span><?php echo e(\App\Models\Product::getFuelTypeById($product->fuel_type_id)); ?></span></span>
                                                    <span><?php echo e(__('Transmission')); ?>

                                                        <span><?php echo e(\App\Models\Utility::getVehicleTransmission($product->transmission_id)); ?></span></span>
                                                    <span><?php echo e(__('First Register Year')); ?>

                                                        <span><?php echo e($product->register_year); ?></span>
                                                    </span>
                                                    <span><?php echo e(__('Power')); ?>

                                                        <span><?php echo e($product->power); ?></span>
                                                    </span>
                                                    <span><?php echo e(__('Previous Owners')); ?>

                                                        <span><?php echo e($product->prev_owners); ?></span>
                                                    </span>
                                                </div>
                                                <div class="feature-price">
                                                    
                                                    <span class="current-price" style="margin-left: 0">
                                                        <?php if($product->enable_product_variant == 'on'): ?>
                                                            <?php echo e(__('In variant')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>
                        </div>
                        <div style="margin-top:80px;margin-bottom:60px">
                            <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                        </div>

            </div>
        </div>
        <!-- Feature Products Area End -->
    <?php endif; ?>

    <?php if(
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0): ?>
        <!-- Feature Products Area Start -->
        <div class="feature-product-area bg-1 ptb-150">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title pb-100 text-center">
                            <h5><?php echo e(__('Products')); ?></h5>
                            <h2><?php echo e(__('Products')); ?></h2>
                            
                        </div>
                        <div class="m-rl-n-15px">
                            <div class="feature-slick-carousel-two">
                                <?php $__currentLoopData = $products_type1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="p-lr-15px">
                                        <div class="single-feature-item">
                                            <div class="feature-image">
                                                <a
                                                    href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                    <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                        <img alt="Image placeholder" width="336" height="493"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder" width="336" height="493"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="feature-wrapper">
                                                <div class="feature-text">
                                                    <h5>
                                                        <a
                                                            href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                            <?php echo e($product->name); ?>

                                                        </a>
                                                    </h5>
                                                    <?php if($store->enable_rating == 'on'): ?>
                                                        <div class="rating">
                                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                                <?php
                                                                    $icon = 'fa-star';
                                                                    $color = '';
                                                                    $newVal1 = $i - 0.5;
                                                                    if ($product->product_rating() < $i && $product->product_rating() >= $newVal1) {
                                                                        $icon = 'fa-star-half-alt';
                                                                    }
                                                                    if ($product->product_rating() >= $newVal1) {
                                                                        $color = 'text-warning';
                                                                    }
                                                                ?>
                                                                <i class="fa fa-star <?php echo e($icon . ' ' . $color); ?>"></i>
                                                            <?php endfor; ?>
                                                            
                                                            <span>(<?php echo e($product->product_rating()); ?>

                                                                <?php echo e(__('Reviews')); ?>)</span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="feature-info">
                                                    <span><?php echo e(__('Category')); ?>

                                                        <span><?php echo e($product->product_category()); ?></span>
                                                    </span>
                                                </div>
                                                <div class="feature-price">
                                                    <?php if(Auth::guard('customers')->check()): ?>
                                                        <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                            <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                <a href="javascript:void(0)"
                                                                    class="add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                    data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $product->id])); ?>"
                                                                    data-csrf="<?php echo e(csrf_token()); ?>">
                                                                    <i class="far fa-heart fa-2x"></i>
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="javascript:void(0)" style="color:#9b9b9b"
                                                                    data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $product->id])); ?>"
                                                                    data-csrf="<?php echo e(csrf_token()); ?>">
                                                                    <i class="fas fa-heart fa-2x"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <a href="javascript:void(0)"
                                                                class="add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $product->id])); ?>"
                                                                data-csrf="<?php echo e(csrf_token()); ?>">
                                                                <i class="far fa-heart fa-2x"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="javascript:void(0)"
                                                            class="add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                            data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $product->id])); ?>"
                                                            data-csrf="<?php echo e(csrf_token()); ?>">
                                                            <i class="far fa-heart fa-2x"></i>
                                                            
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if($product->enable_product_variant == 'on'): ?>
                                                        <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                            class="add_to_cart ps-1"
                                                            data-url="<?php echo e(route('user.addToCart', [$product->id, $store->slug, 'variation_id'])); ?>"
                                                            data-csrf="<?php echo e(csrf_token()); ?>">
                                                            <i class="fas fa-shopping-cart fa-2x"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="#" class="add_to_cart ps-1"
                                                            data-url="<?php echo e(route('user.addToCart', [$product->id, $store->slug, 'variation_id'])); ?>"
                                                            data-csrf="<?php echo e(csrf_token()); ?>">
                                                            <i class="fas fa-shopping-cart fa-2x"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    
                                                    <span class="current-price">
                                                        <?php if($product->enable_product_variant == 'on'): ?>
                                                            <?php echo e(__('In variant')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                    
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
        <!-- Feature Products Area End -->
    <?php endif; ?>

    <!-- Products categories-->
    <?php if(isset($storethemesetting['enable_categories']) &&
        $storethemesetting['enable_categories'] == 'on' &&
        !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_categories'] == 'on'): ?>
            <div class="blog-two-area ptb-100">
                <div class="container">
                    <div class="section-title-light pb-60 text-center fix">
                        
                        <h2><?php echo e(!empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories'); ?>

                        </h2>
                        <p><?php echo e(!empty($storethemesetting['categories_title'])
                            ? $storethemesetting['categories_title']
                            : 'There is only that moment and the incredible certainty <br> that everything under the sun has been written by one hand only.'); ?>

                        </p>
                    </div>
                    <div class="m-rl-n-15px">
                        <div class="blog-carousel">
                            <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product_count[$key] > 0): ?>
                                    <div class="p-lr-15px">
                                        <div class="single-blog">
                                            <div class="blog-image">
                                                <a
                                                    href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>">
                                                    <?php if(!empty($pro_categorie->categorie_img) &&
                                                        \Storage::exists('uploads/product_image/' . $product->categorie_img)): ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img))); ?>"
                                                            height="350px" style="object-fit: cover">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                            height="350px" style="object-fit: cover">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="blog-text">
                                                <h5><a
                                                        href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>"><?php echo e($pro_categorie->name); ?></a>
                                                </h5>
                                                <p>
                                                    <?php echo e(__('Products')); ?>:
                                                    <?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?>

                                                </p>
                                                <a href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>"
                                                    class="default-btn"><span><?php echo e(__('Show More')); ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products categories End -->
        <?php endif; ?>
    <?php endif; ?>



    <!-- Testimonials (v1) -->
    <?php if(isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on'): ?>
        <div class="testimonial-three-area bg-7 pt-100 pb-150">
            <div class="container">
                <div class="section-title pb-100 text-center">
                    <h2>
                        <?php echo e(!empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials'); ?>

                    </h2>

                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="testimonial-carousel">
                            <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                                <div class="single-testi">
                                    <span><img
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png')))); ?>"
                                            alt="" width="65" height="65"
                                            style="object-fit: cover"></span>
                                    <p>
                                        <?php echo e($storethemesetting['testimonial_description1']); ?>

                                    </p>
                                    <span class="name-info"><?php echo e($storethemesetting['testimonial_name1']); ?> -
                                        <?php echo e($storethemesetting['testimonial_about_us1']); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on'): ?>
                                <div class="single-testi">
                                    <span><img
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png')))); ?>"
                                            alt="" width="65" height="65"
                                            style="object-fit: cover"></span>
                                    <p>
                                        <?php echo e($storethemesetting['testimonial_description2']); ?>

                                    </p>
                                    <span class="name-info"><?php echo e($storethemesetting['testimonial_name2']); ?> -
                                        <?php echo e($storethemesetting['testimonial_about_us2']); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on'): ?>
                                <div class="single-testi">
                                    <span><img
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png')))); ?>"
                                            alt="" width="65" height="65"
                                            style="object-fit: cover"></span>
                                    <p>
                                        <?php echo e($storethemesetting['testimonial_description3']); ?>

                                    </p>
                                    <span class="name-info"><?php echo e($storethemesetting['testimonial_name3']); ?> -
                                        <?php echo e($storethemesetting['testimonial_about_us3']); ?></span>
                                </div>
                            <?php endif; ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!-- Client Logo -->
    <?php if(isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on'): ?>
        <div class="latest-product-area pt-100 pb-70">
            <div class="container text-center">
                
                <div class="row custom">
                    <?php if(!empty($storethemesetting['brand_logo'])): ?>
                        <?php $__currentLoopData = explode(',', $storethemesetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-service">
                                    <?php if(!empty($value) && \Storage::exists('uploads/store_logo/' . $value)): ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png'))); ?>"
                                            alt="Footer logo">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/brand_logo.png'))); ?>"
                                            alt="Footer logo">
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    
                </div>
            </div>
        </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
      

        $(".productTab").click(function(e) {
            e.preventDefault();
            $('.productTab').removeClass('active')

        });

        $("#pro_scroll").click(function() {
            $('html, body').animate({
                scrollTop: $("#pro_items").offset().top
            }, 1000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme13to15', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar/resources/views/storefront/theme15/index.blade.php ENDPATH**/ ?>