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
                        <div class="carousel-item banner-max-height <?php echo e($i == 0 ? 'active' : ''); ?> item-bg">
                            <img class="d-block w-100 h-100"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png')))); ?>"
                                alt="banner">
                            <div class="carousel-content banner-info-2 bi-2">
                                <h1><?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                                </h1>
                                <p> <?php echo e(!empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.'); ?>

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
                                    <h1>
                                        <?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                                    </h1>
                                </div>
                                <p>
                                    <?php echo e(!empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.'); ?>

                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Slider Area End -->

    <!-- Search box 3 start -->
    <div class="search-box-3">
        <div class="container">
            <form method="GET" action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                id="frm-filter">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="vehicle_type_id" id="vehicle_type_id"
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
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>" disabled>
                                <option value="">
                                    <?php echo e(__('Select Make')); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="model_id" id="model_id" disabled>
                                <option value="">
                                    <?php echo e(__('Select Model')); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="form-group">
                            <button class="btn w-100 button-theme btn-md">
                                <i class="fa fa-search"></i><?php echo e(__('Search')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Search box 3 end -->


    <!-- Vehicles Area Start -->
    <?php if($products['Start shopping']->count() > 0): ?>
        <div class="featured-car content-area">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1 class="mb-10"> <?php echo e(__('Vehicles')); ?></h1>
                    <div class="title-border">
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $product->name = $product->getName();
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="car-box-3">
                                <div class="car-thumbnail">
                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                        class="car-img">
                                        
                                        <div class="price-box-2">
                                            
                                            <?php echo e(\App\Models\Utility::priceFormat($product->net_price)); ?>

                                            <?php if($product->price): ?>
                                                <span>/<?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></span>
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
                                    
                                </div>
                                <div class="detail">
                                    <h1 class="title">
                                        <a
                                            href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"><?php echo e($product->getName()); ?></a>
                                    </h1>
                                    <div class="location">
                                        <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                            <i class="fas fa-th-large"></i> <?php echo e($product->product_category()); ?>

                                        </a>
                                    </div>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <div class="advertisement-block">
                    <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Vehicles Area End -->


    <!-- Products Area Start -->
    <?php if(
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0): ?>
        <div class="featured-car content-area">
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
        <div class="advantages-2 content-area bg-grea-3">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1 class="mb-10"><?php echo e(__('Why Choose Us?')); ?></h1>
                    <div class="title-border">
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                    </div>
                </div>

                <div class="row">
                    <?php if(isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon1'])): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="advantages-box-2 df-box">
                                    <div class="icon">
                                        <?php echo $storethemesetting['features_icon1']; ?>

                                    </div>
                                    <div class="detail">
                                        <h5>
                                            <a href="javascript:void(0)"><?php echo e($storethemesetting['features_title1']); ?></a>
                                        </h5>
                                        <p><?php echo e($storethemesetting['features_description1']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon2'])): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="advantages-box-2 df-box">
                                    <div class="icon">
                                        <?php echo $storethemesetting['features_icon2']; ?>

                                    </div>
                                    <div class="detail">
                                        <h5>
                                            <a href="javascript:void(0)"><?php echo e($storethemesetting['features_title2']); ?></a>
                                        </h5>
                                        <p><?php echo e($storethemesetting['features_description2']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon3'])): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="advantages-box-2 df-box">
                                    <div class="icon">
                                        <?php echo $storethemesetting['features_icon3']; ?>

                                    </div>
                                    <div class="detail">
                                        <h5>
                                            <a href="javascript:void(0)"><?php echo e($storethemesetting['features_title3']); ?></a>
                                        </h5>
                                        <p><?php echo e($storethemesetting['features_description3']); ?></p>
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
            <div class="latest-offers categories content-area-13">
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
        <div class="testimonial comon-slick content-area-5">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1 class="mb-10">
                        <?php echo e(!empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials'); ?>

                    </h1>
                    <div class="title-border">
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                    </div>
                </div>
                <!-- Slick slider area start -->
                <div class="slick row comon-slick-inner"
                    data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                        <div class="item slide-box">
                            <div class="testimonials-inner">
                                <div class="user">
                                    <a href="#">
                                        <img class="media-object"
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png')))); ?>"
                                            alt="user">
                                    </a>
                                </div>
                                <div class="testimonial-info">
                                    <h3>
                                        <?php echo e($storethemesetting['testimonial_name1']); ?>

                                    </h3>
                                    <p> <?php echo e($storethemesetting['testimonial_about_us1']); ?></p>
                                    <p><?php echo e($storethemesetting['testimonial_description1']); ?></p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                        <span><?php echo e(__('Rating')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on'): ?>
                        <div class="item slide-box">
                            <div class="testimonials-inner">
                                <div class="user">
                                    <a href="#">
                                        <img class="media-object"
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png')))); ?>"
                                            alt="user">
                                    </a>
                                </div>
                                <div class="testimonial-info">
                                    <h3>
                                        <?php echo e($storethemesetting['testimonial_name2']); ?>

                                    </h3>
                                    <p> <?php echo e($storethemesetting['testimonial_about_us2']); ?></p>
                                    <p><?php echo e($storethemesetting['testimonial_description2']); ?></p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                        <span><?php echo e(__('Rating')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on'): ?>
                        <div class="item slide-box">
                            <div class="testimonials-inner">
                                <div class="user">
                                    <a href="#">
                                        <img class="media-object"
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png')))); ?>"
                                            alt="user">
                                    </a>
                                </div>
                                <div class="testimonial-info">
                                    <h3>
                                        <?php echo e($storethemesetting['testimonial_name3']); ?>

                                    </h3>
                                    <p> <?php echo e($storethemesetting['testimonial_about_us3']); ?></p>
                                    <p><?php echo e($storethemesetting['testimonial_description3']); ?></p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                        <span><?php echo e(__('Rating')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

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

<?php echo $__env->make('storefront.layout.theme23', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme23/index.blade.php ENDPATH**/ ?>