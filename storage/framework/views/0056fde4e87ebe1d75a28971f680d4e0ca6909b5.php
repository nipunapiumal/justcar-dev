<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Slider Area Start -->
    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
        <!-- Banner start -->
        <div class="banner" id="banner">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner banner-slider-inner">
                    <?php $i=0; ?>
                    <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($i == 0 ? 'active' : ''); ?> item-bg">
                            <img class="d-block w-100 h-100"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png')))); ?>"
                                alt="banner">
                            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                                <div class="typing">
                                    <h2><?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                                    </h2>
                                </div>
                                <p>
                                    <?php echo e(!empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.'); ?>

                                </p>
                                
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Banner end -->
    <?php else: ?>
        <div class="banner bst" id="banner">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner banner-slider-inner">
                    <div class="carousel-item active item-bg">
                        <img class="d-block w-100 h-100"
                            src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png')))); ?>"
                            alt="banner">
                        <div class="carousel-content container banner-info-2 bi-2">
                            <div class="text-center">
                                <div class="name_wrap">
                                    <h1><?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                                    </h1>
                                </div>
                                <p>
                                    <?php echo e(!empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.'); ?>

                                </p>
                                <div class="inline-search-area isa-2 ml-auto mr-auto">
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <form
                                                action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                                id="frm-filter" method="get">
                                                <?php echo csrf_field(); ?>
                                                <div class="row row-3">
                                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                                        <select class="selectpicker search-fields" name="vehicle_type_id"
                                                            id="vehicle_type_id"
                                                            data-url="<?php echo e(route('product.get-vehicle-brands', [$store->slug])); ?>">
                                                            <option value="">
                                                                <?php echo e(__('Select Vehicle Type')); ?>

                                                            </option>
                                                            <?php $__currentLoopData = $vehicleTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($vehicleType['id']); ?>">
                                                                    <?php echo e($vehicleType->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                                        <select class="selectpicker search-fields" name="brand_id"
                                                            id="brand_id"
                                                            data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>"
                                                            disabled>
                                                            <option value="">
                                                                <?php echo e(__('Select Make')); ?>

                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                                        <select class="selectpicker search-fields" name="model_id"
                                                            id="model_id" disabled>
                                                            <option value="">
                                                                <?php echo e(__('Select Model')); ?>

                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                                        <button class="btn button-theme btn-search w-100">
                                                            <i
                                                                class="fa fa-search"></i><strong><?php echo e(__('Search')); ?></strong>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Slider Area End -->

    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
        <!-- Search box 2 start -->
        <div class="search-box-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inline-search-area">
                            <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                id="frm-filter" method="get">
                                <?php echo csrf_field(); ?>
                                <div class="row row-3">
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                        <select class="selectpicker search-fields" name="vehicle_type_id"
                                            id="vehicle_type_id"
                                            data-url="<?php echo e(route('product.get-vehicle-brands', [$store->slug])); ?>">
                                            <option value="">
                                                <?php echo e(__('Select Vehicle Type')); ?>

                                            </option>
                                            <?php $__currentLoopData = $vehicleTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($vehicleType['id']); ?>">
                                                    <?php echo e($vehicleType->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                        <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                            data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>" disabled>
                                            <option value="">
                                                <?php echo e(__('Select Make')); ?>

                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                        <select class="selectpicker search-fields" name="model_id" id="model_id" disabled>
                                            <option value="">
                                                <?php echo e(__('Select Model')); ?>

                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                        <button class="btn white-btn btn-search w-100 h-100 text-light">
                                            <i class="fa fa-search"></i><strong> <?php echo e(__('Search')); ?></strong>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search box 2 end -->
    <?php endif; ?>


    <!-- Vehicles Area Start -->
    <?php if($products['Start shopping']->count() > 0): ?>
        <!-- Featured car start -->
        <div class="featured-car content-area">
            <div class="container">
                <!-- Main title 3 -->
                <div class="main-title-3">
                    
                    <h1><?php echo e(__('Vehicles')); ?></h1>
                </div>
                <!-- Slick slider area start -->
                <div class="slick-slider-area clearfix">
                    <div class="row slick-carousel"
                        data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                        <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $product->name = $product->getName();
                            ?>
                            <div class="slick-slide-item">
                                <div class="car-box-4">
                                    <div class="photo-overflow">
                                        <div class="car-thumbnail-photo">
                                            <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                <img alt="Image placeholder" class="img-fluid w-100"
                                                    style="height:650px;object-fit:cover"
                                                    src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>">
                                            <?php else: ?>
                                                <img alt="Image placeholder" class="img-fluid w-100"
                                                    style="height:650px;object-fit:cover"
                                                    src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="ling-section">
                                        <div class="lo-text clearfix">
                                            <h3>
                                                <a
                                                    href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                    <?php echo e($product->getName()); ?>

                                                </a>
                                            </h3>
                                            <h5>
                                                <?php echo e(\App\Models\Utility::priceFormat($product->net_price)); ?>

                                                <?php if($product->price): ?>
                                                    <span>/<?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></span>
                                                <?php endif; ?>
                                                <small class="text-muted">(<?php echo e($product->product_category()); ?>)</small>
                                            </h5>
                                            <ul class="facilities-list clearfix">
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
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <div class="slick-prev slick-arrow-buton">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="slick-next slick-arrow-buton">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
                <div class="advertisement-block">
                    <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                </div>
            </div>
        </div>
        <!-- Featured car end -->
    <?php endif; ?>
    <!-- Vehicles Area End -->


    <!-- Products Area Start -->
    <?php if(
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0): ?>
        <div class="featured-car content-area bg-grea-3">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1 class="mb-10"> <?php echo e(__('Products')); ?></h1>
                    <div class="title-border">
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $products_type1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="car-box-3">
                                <div class="car-thumbnail">
                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                        class="car-img">
                                        
                                        <div class="price-box-2">
                                            
                                            <?php if($product->enable_product_variant == 'on'): ?>
                                                <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                            <?php else: ?>
                                                <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                            <?php endif; ?>
                                            <?php if($product->last_price): ?>
                                                <span>/<del><?php echo e(\App\Models\Utility::priceFormat($product->last_price)); ?></del>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                            <img alt="Image placeholder" class="d-block w-100"
                                                style="width: 700px;height:250px;object-fit:cover"
                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>">
                                        <?php else: ?>
                                            <img alt="Image placeholder" class="d-block w-100"
                                                style="width: 700px;height:250px;object-fit:cover"
                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>">
                                        <?php endif; ?>
                                    </a>
                                    <div class="carbox-overlap-wrapper">
                                        <div class="overlap-box">
                                            <div class="overlap-btns-area">
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
                                                    <a class="overlap-btn <?php echo e($btn_class); ?>"
                                                        <?php echo e($btn_class == 'disabled' ? 'disabled' : ''); ?>

                                                        data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $product->id])); ?>"
                                                        data-csrf="<?php echo e(csrf_token()); ?>">
                                                        <i class="<?php echo e($icon_class); ?> fa-heart"></i>
                                                    </a>
                                                    <a class="overlap-btn add_to_cart"
                                                        data-url="<?php echo e(route('user.addToCart', [$product->id, $store->slug, 'variation_id'])); ?>"
                                                        data-csrf="<?php echo e(csrf_token()); ?>">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail">
                                    <h1 class="title"
                                        style="-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;height: 50px;overflow: hidden;">
                                        <a
                                            href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"><?php echo e($product->name); ?></a>
                                    </h1>
                                    <div class="location">
                                        <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                            <i class="fas fa-th-large"></i> <?php echo e($product->product_category()); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Products Area End -->

    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <div class="advantages content-area-5">
            <div class="container">
                <!-- Main title -->
                <div class="main-title-3">
                    
                    <h1><?php echo e(__('Why Choose Us?')); ?></h1>
                </div>

                <div class="row">
                    <?php if(isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon1'])): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="advantages-4">
                                    <div class="advantages-4-inner">
                                        <div class="icon flaticon-console">
                                            <?php echo $storethemesetting['features_icon1']; ?>

                                        </div>
                                        <div class="detail">
                                            <h4>
                                                <a
                                                    href="javascript:void(0)"><?php echo e($storethemesetting['features_title1']); ?></a>
                                            </h4>
                                            <p><?php echo e($storethemesetting['features_description1']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon2'])): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="advantages-4">
                                    <div class="advantages-4-inner">
                                        <div class="icon flaticon-console">
                                            <?php echo $storethemesetting['features_icon2']; ?>

                                        </div>
                                        <div class="detail">
                                            <h4>
                                                <a
                                                    href="javascript:void(0)"><?php echo e($storethemesetting['features_title2']); ?></a>
                                            </h4>
                                            <p><?php echo e($storethemesetting['features_description2']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon3'])): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="advantages-4">
                                    <div class="advantages-4-inner">
                                        <div class="icon flaticon-console">
                                            <?php echo $storethemesetting['features_icon3']; ?>

                                        </div>
                                        <div class="detail">
                                            <h4>
                                                <a
                                                    href="javascript:void(0)"><?php echo e($storethemesetting['features_title3']); ?></a>
                                            </h4>
                                            <p><?php echo e($storethemesetting['features_description3']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!-- Gallery-->
    <?php if(isset($storethemesetting['enable_gallery']) &&
            $storethemesetting['enable_gallery'] == 'on' &&
            !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_gallery'] == 'on'): ?>
            <div class="latest-offers categories content-area-13 bg-grea-3">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title text-center">
                        <h1>
                            <?php echo e(!empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery')); ?>

                        </h1>
                        <p class="mb-1">
                            <?php echo e($storethemesetting['gallery_description']); ?>

                        </p>
                        <div class="title-border">
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                        </div>
                    </div>
                    <div class="row row-2">
                        <div class="col-lg-4 col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-pad">
                                    <div class="latest-offers-box">
                                        <div class="photo-overflow">
                                            <div class="car-thumbnail-photo">
                                                <?php if(
                                                    !empty($gallery_categories_v2[0]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[0]['categorie_img'])): ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[0]['categorie_img']))); ?>"
                                                        alt="" class="img-fluid w-100"
                                                        style="object-fit: cover;height:250px;">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="" class="img-fluid w-100"
                                                        style="object-fit: cover;height:250px;">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <div class="ling-section">
                                            <div class="lo-text clearfix">
                                                <h3>
                                                    <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                        <?php echo e(isset($gallery_categories_v2[0]['name']) ? $gallery_categories_v2[0]['name'] : ''); ?>

                                                    </a>
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-pad">
                                    <div class="latest-offers-box">
                                        <div class="photo-overflow">
                                            <div class="car-thumbnail-photo">
                                                <?php if(
                                                    !empty($gallery_categories_v2[1]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[1]['categorie_img'])): ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[1]['categorie_img']))); ?>"
                                                        alt="" class="img-fluid w-100"
                                                        style="object-fit: cover;height:250px;">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="" class="img-fluid w-100"
                                                        style="object-fit: cover;height:250px;">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <div class="ling-section">
                                            <div class="lo-text clearfix">
                                                <h3>
                                                    <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                        <?php echo e(isset($gallery_categories_v2[1]['name']) ? $gallery_categories_v2[1]['name'] : ''); ?>

                                                    </a>
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-pad">
                            <div class="latest-offers-box">
                                <div class="photo-overflow">
                                    <div class="car-thumbnail-photo">
                                        <?php if(
                                            !empty($gallery_categories_v2[2]['categorie_img']) &&
                                                \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[2]['categorie_img'])): ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[2]['categorie_img']))); ?>"
                                                alt="" class="img-fluid w-100 big-img" style="object-fit: cover">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                alt="" class="img-fluid w-100 big-img" style="object-fit: cover">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="ling-section">
                                    <div class="lo-text clearfix">
                                        <h3>
                                            <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                <?php echo e(isset($gallery_categories_v2[2]['name']) ? $gallery_categories_v2[2]['name'] : ''); ?>

                                            </a>
                                        </h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-pad">
                                    <div class="latest-offers-box">
                                        <div class="photo-overflow">
                                            <div class="car-thumbnail-photo">
                                                <?php if(
                                                    !empty($gallery_categories_v2[3]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[3]['categorie_img'])): ?>
                                                    <img class="img-fluid w-100"
                                                        src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[3]['categorie_img']))); ?>"
                                                        alt="" style="object-fit: cover;height:250px;">
                                                <?php else: ?>
                                                    <img class="img-fluid w-100"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="" style="object-fit: cover;height:250px;">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <div class="ling-section">
                                            <div class="lo-text clearfix">
                                                <h3>
                                                    <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                        <?php echo e(isset($gallery_categories_v2[3]['name']) ? $gallery_categories_v2[3]['name'] : ''); ?>

                                                    </a>
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-pad">
                                    <div class="latest-offers-box">
                                        <div class="photo-overflow">
                                            <div class="car-thumbnail-photo">
                                                <?php if(
                                                    !empty($gallery_categories_v2[4]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[4]['categorie_img'])): ?>
                                                    <img class="img-fluid w-100"
                                                        src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[4]['categorie_img']))); ?>"
                                                        alt="" style="object-fit: cover;height:250px;">
                                                <?php else: ?>
                                                    <img class="img-fluid w-100"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="" style="object-fit: cover;height:250px;">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <div class="ling-section">
                                            <div class="lo-text clearfix">
                                                <h3>
                                                    <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                        <?php echo e(isset($gallery_categories_v2[4]['name']) ? $gallery_categories_v2[4]['name'] : ''); ?>

                                                    </a>
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Products categories-->
    <?php if(isset($storethemesetting['enable_categories']) &&
            $storethemesetting['enable_categories'] == 'on' &&
            !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_categories'] == 'on'): ?>
            <div class="blog comon-slick content-area">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title">
                        <h1 class="mb-10">
                            <?php echo e(!empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories'); ?>

                        </h1>
                        <p class="mb-1">
                            <?php echo e(!empty($storethemesetting['categories_title'])
                                ? $storethemesetting['categories_title']
                                : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            under the sun has been written by one hand only.'); ?>

                        </p>
                        <div class="title-border">
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                            <div class="title-border-inner"></div>
                        </div>
                    </div>
                    <div class="slick row comon-slick-inner"
                        data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                        <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product_count[$key] > 0): ?>
                                <div class="item slide-box">
                                    <div class="blog-4">
                                        <div class="blog-photo">
                                            <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img)): ?>
                                                <img alt="Image placeholder" class="img-fluid"
                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img))); ?>"
                                                    style="height:250px !important;object-fit: cover">
                                            <?php else: ?>
                                                <img alt="Image placeholder" class="img-fluid"
                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                    style="height:250px !important;object-fit: cover">
                                            <?php endif; ?>
                                            
                                            <div class="post-meta clearfix">
                                                <span><a href="#">
                                                        <i class="fas fa-car"></i>
                                                    </a>
                                                    <?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?></span>
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <h3>
                                                <a
                                                    href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>"><?php echo e($pro_categorie->name); ?></a>
                                            </h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Testimonials (v1) -->
    <?php if(isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on'): ?>
        <div class="testimonial-4 bg-grea-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div id="carouselExampleFade2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleFade2" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleFade2" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleFade2" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                                    <div class="carousel-item active">
                                        <div class="testimonial-info">
                                            <!-- Main title -->
                                            <div class="main-title-3">
                                                <p><?php echo e(__('What Clients Say')); ?></p>
                                                <h1>
                                                    <?php echo e(!empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials'); ?>

                                                </h1>
                                            </div>
                                            <p class="mb-30">
                                                <?php echo e($storethemesetting['testimonial_description1']); ?>

                                            </p>
                                            <div class="user-info d-flex">
                                                <a class="pr-3" href="#" tabindex="-1">
                                                    <img class="flex-shrink-0 me-3"
                                                        src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png')))); ?>"
                                                        alt="user">
                                                </a>
                                                <div class="detail align-self-center">
                                                    <h5>
                                                        <a
                                                            href="#"><?php echo e($storethemesetting['testimonial_name1']); ?></a>
                                                    </h5>
                                                    <p> <?php echo e($storethemesetting['testimonial_about_us1']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center bg-dark d-none d-lg-flex">
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

    <!-- Client Logo -->
    <?php if(isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on'): ?>
        <div class="partners">
            <div class="container">
                <div class="slick-slider-area">
                    <div class="row slick-carousel"
                        data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                        <?php if(!empty($storethemesetting['brand_logo'])): ?>
                            <?php $__currentLoopData = explode(',', $storethemesetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="slick-slide-item">
                                    <?php if(!empty($value) && \Storage::exists('uploads/store_logo/' . $value)): ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png'))); ?>"
                                            alt="Footer logo" class="img-fluid">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/brand_logo.png'))); ?>"
                                            alt="Footer logo" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme24', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme24/index.blade.php ENDPATH**/ ?>