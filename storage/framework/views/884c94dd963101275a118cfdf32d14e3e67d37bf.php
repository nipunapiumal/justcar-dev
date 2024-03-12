<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Slider Area Start -->
    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
        <div class="banner-2">
            <?php $i=0; ?>
            <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="slide"
                    style="background-image: url('<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png')))); ?>');">
                    <div class="breadcrumb-area">
                        <h2>
                            <?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                        </h2>
                        <p>
                            <?php echo e(!empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.'); ?>

                            
                        </p>

                        <a class="btn-3 btn-defaults"
                            href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>">
                            <?php echo e(__('Browse Vehicles')); ?> <i class="arrow"></i>
                        </a>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <!-- Banner start -->
        <div class="banner" id="banner">
            <div class="carousel-inner banner-slider-inner">
                <div class="carousel-item active item-bg">
                    <img class="d-block w-100 h-100"
                        src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png')))); ?>"
                        alt="banner">
                    <div class="carousel-content container banner-info-2 bi-2">
                        <div class="banner-content2">
                            <h2><?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                            </h2>
                            <p>
                                <?php echo e(!empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.'); ?>

                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Slider Area End -->

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
                                    <button class="btn white-btn btn-search w-100">
                                        <i class="fa fa-search"></i><strong><?php echo e(__('Search')); ?></strong>
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


    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <div class="service-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 align-self-center">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><?php echo e(__('Why Choose Us?')); ?></h1>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="row">
                            <?php if(isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on'): ?>
                                <?php if(isset($storethemesetting['features_icon1'])): ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-info">
                                            <div class="number">1</div>
                                            <div class="icon">
                                                <?php echo $storethemesetting['features_icon1']; ?>

                                            </div>
                                            <div class="detail">
                                                <h5><a href="services.html"><?php echo e($storethemesetting['features_title1']); ?></a>
                                                </h5>
                                                <p><?php echo e($storethemesetting['features_description1']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on'): ?>
                                <?php if(isset($storethemesetting['features_icon2'])): ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-info">
                                            <div class="number">2</div>
                                            <div class="icon">
                                                <?php echo $storethemesetting['features_icon2']; ?>

                                            </div>
                                            <div class="detail">
                                                <h5><a href="services.html"><?php echo e($storethemesetting['features_title2']); ?></a>
                                                </h5>
                                                <p><?php echo e($storethemesetting['features_description2']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on'): ?>
                                <?php if(isset($storethemesetting['features_icon3'])): ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-info">
                                            <div class="number">3</div>
                                            <div class="icon">
                                                <?php echo $storethemesetting['features_icon3']; ?>

                                            </div>
                                            <div class="detail">
                                                <h5><a href="services.html"><?php echo e($storethemesetting['features_title3']); ?></a>
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
            </div>
        </div>
    <?php endif; ?>

    <!-- Feature Products Area Start -->
    <?php if($products['Start shopping']->count() > 0): ?>
        <!-- Featured car start -->
        <div class="featured-car content-area">
            <div class="container">
                <!-- Main title -->
                <div class="main-title mt2">
                    <h1 class="mb-20"><?php echo e(__('Vehicles')); ?></h1>
                    <div class="list-inline-listing">
                        <ul class="filters filteriz-navigation clearfix">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e($key == 0 ? 'active' : ''); ?> btn filtr-button filtr"
                                data-filter="<?php echo e($key == 0 ? 'all' : $key); ?>"><span><?php echo e($category); ?></span></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            
                        </ul>
                    </div>
                </div>
                <div class="row filter-portfolio">
                    <div class="cars">
                        <?php $__currentLoopData = $products['Start shopping']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $product->name = $product->getName();
                                $parts = explode(',', $product->product_categorie);
                                $result = implode(', ', $parts);
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="<?php echo e($result); ?>">
                                <div class="car-box">
                                    <div class="car-image">
                                        <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                            <img class="img-fluid"
                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                alt="car-photo" style="width:100%;height:193px !important;object-fit:cover">
                                        <?php else: ?>
                                            <img class="img-fluid"
                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                alt="car-photo" style="width:100%;height:293px;object-fit:cover">
                                        <?php endif; ?>
                                        
                                        <div class="facilities-list clearfix">
                                            <ul>
                                                <li>
                                                    <i class="flaticon-way"></i> <?php echo e($product->millage); ?>

                                                </li>
                                                <li>
                                                    <i class="flaticon-calendar-1"></i>
                                                    <?php echo e($product->register_year); ?>

                                                </li>
                                                <li>
                                                    <i class="flaticon-manual-transmission"></i>
                                                    <?php echo e(\App\Models\Utility::getVehicleTransmission($product->transmission_id)); ?>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h1 class="title">
                                            <a
                                                href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                <?php echo e($product->name); ?>

                                                <p class="price">
                                                    <?php if($product->enable_product_variant == 'on'): ?>
                                                        <?php echo e(__('In variant')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                    <?php endif; ?>
                                                </p>
                                            </a>
                                        </h1>

                                    </div>
                                    
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
            <div class="advertisement-block"> 
                <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

            </div>
        </div>
        <!-- Featured car end -->
    <?php endif; ?>
    <!-- Feature Products Area End -->

    <?php if(
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0): ?>
        <div class="featured-car content-area-7">
            <div class="container">
                <!-- Main title -->
                <div class="section-header d-flex">
                    <h2 data-title="<?php echo e(__('Products')); ?>"> <?php echo e(__('Products')); ?></h2>
                </div>
                <div class="row">

                    <?php $__currentLoopData = $products_type1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="car-box-3">
                                <div class="car-thumbnail">
                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                        class="car-img">
                                        
                                        <div class="price-box">
                                            <span
                                                class="del"><del><?php echo e(\App\Models\Utility::priceFormat($product->last_price)); ?></del></span>
                                            <br>
                                            <span>
                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                    <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                                <?php else: ?>
                                                    <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                            <img alt="Image placeholder" class="d-block"
                                                style="width: 700px;height:300px;object-fit:cover"
                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>">
                                        <?php else: ?>
                                            <img alt="Image placeholder" class="d-block"
                                                style="width: 700px;height:300px;object-fit:cover"
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
                                    <h1 class="title" style="-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;height: 50px;">
                                        <a
                                            href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"><?php echo e($product->name); ?></a>
                                    </h1>
                                    <ul class="custom-list">
                                        <li>
                                            <a href="#"><?php echo e($product->product_category()); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <?php if($store->enable_rating == 'on'): ?>
                                    <div class="footer clearfix">
                                        <div class="pull-left ratings">
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
                                                <i class="fa <?php echo e($icon . ' ' . $color); ?>"></i>
                                            <?php endfor; ?>
                                            <span>(<?php echo e($product->product_rating()); ?>

                                                <?php echo e(__('Reviews')); ?>)</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Products categories-->
    <?php if(isset($storethemesetting['enable_categories']) &&
            $storethemesetting['enable_categories'] == 'on' &&
            !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_categories'] == 'on'): ?>
            <div class="our-team content-area-7">
                <div class="container">
                    <!-- Main title -->
                    <div class="section-header d-flex">
                        <h2
                            data-title="<?php echo e(!empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories'); ?>">
                            <?php echo e(!empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories'); ?>

                        </h2>
                    </div>
                    <p class="mb-5">
                        <?php echo e(!empty($storethemesetting['categories_title'])
                            ? $storethemesetting['categories_title']
                            : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        under the sun has been written by one hand only.'); ?>

                    </p>
                    <div class="featured-slider row slide-box-btn slider"
                        data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                        <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product_count[$key] > 0): ?>
                                <div class="slide slide-box">
                                    <div class="team-3">
                                        <div class="team-thumb">
                                            <a
                                                href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>">
                                                <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img)): ?>
                                                    <img alt="Image placeholder"
                                                        src="<?php echo e(asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img))); ?>"
                                                        style="height:250px !important;object-fit: cover">
                                                <?php else: ?>
                                                    <img alt="Image placeholder"
                                                        src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                        style="height:250px !important;object-fit: cover">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="team-info">
                                            <h4>
                                                <a
                                                    href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>"><?php echo e($pro_categorie->name); ?></a>
                                            </h4>
                                            <p><?php echo e(__('Products')); ?></p>
                                            <p class="mb-0">
                                                <?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?>

                                            </p>
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
        <div class="testimonial-2 content-area-5">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 align-self-center">
                        <!-- Main title -->
                        <div class="main-title main-title-3">
                            <h1> <?php echo e(!empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials'); ?>

                            </h1>
                            <p>
                                <?php echo e(!empty($storethemesetting['testimonial_main_heading_title']) ? $storethemesetting['testimonial_main_heading_title'] : 'Testimonials'); ?>

                            </p>
                            
                        </div>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="featured-slider row slide-box-btn slider"
                            data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                            <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                                <div class="slide slide-box">
                                    <div class="testimonial-info-box">
                                        <div class="profile-user">
                                            <div class="avatar">
                                                <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png')))); ?>"
                                                    alt="testimonial-2">
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="#"><?php echo e($storethemesetting['testimonial_name1']); ?> </a>
                                        </h5>
                                        <h6><?php echo e($storethemesetting['testimonial_about_us1']); ?></h6>
                                        <p><i class="fa fa-quote-left"></i>
                                            <?php echo e($storethemesetting['testimonial_description1']); ?>

                                            <i class="fa fa-quote-right"></i>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on'): ?>
                                <div class="slide slide-box">
                                    <div class="testimonial-info-box">
                                        <div class="profile-user">
                                            <div class="avatar">
                                                <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png')))); ?>"
                                                    alt="testimonial-2">
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="#"><?php echo e($storethemesetting['testimonial_name2']); ?> </a>
                                        </h5>
                                        <h6><?php echo e($storethemesetting['testimonial_about_us2']); ?></h6>
                                        <p><i class="fa fa-quote-left"></i>
                                            <?php echo e($storethemesetting['testimonial_description2']); ?>

                                            <i class="fa fa-quote-right"></i>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on'): ?>
                                <div class="slide slide-box">
                                    <div class="testimonial-info-box">
                                        <div class="profile-user">
                                            <div class="avatar">
                                                <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png')))); ?>"
                                                    alt="testimonial-2">
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="#"><?php echo e($storethemesetting['testimonial_name3']); ?> </a>
                                        </h5>
                                        <h6><?php echo e($storethemesetting['testimonial_about_us3']); ?></h6>
                                        <p><i class="fa fa-quote-left"></i>
                                            <?php echo e($storethemesetting['testimonial_description3']); ?>

                                            <i class="fa fa-quote-right"></i>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>

    <!-- Gallery-->
    <?php if(isset($storethemesetting['enable_gallery']) &&
            $storethemesetting['enable_gallery'] == 'on' &&
            !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_gallery'] == 'on'): ?>
            <div class="latest-offers-section content-area-7">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title text-center">
                        <h1><?php echo e(!empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery')); ?>

                        </h1>
                        <p>
                            <?php echo e($storethemesetting['gallery_description']); ?>

                        </p>
                    </div>


                    <div class="row mb-10">
                        <div class="col-lg-7 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="latest-offers-box">
                                        <div class="latest-offers-box-inner">
                                            <div class="latest-offers-box-overflow">
                                                <div class="latest-offers-box-photo">
                                                    <?php if(
                                                        !empty($gallery_categories_v2[0]['categorie_img']) &&
                                                            \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[0]['categorie_img'])): ?>
                                                        <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[0]['categorie_img']))); ?>"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    <?php endif; ?>

                                                </div>
                                                <div class="info">

                                                    <h3>
                                                        <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                             <?php echo e(isset($gallery_categories_v2[0]['name'])?$gallery_categories_v2[0]['name']:''); ?>

                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="latest-offers-box">
                                        <div class="latest-offers-box-inner">
                                            <div class="latest-offers-box-overflow">
                                                <div class="latest-offers-box-photo">
                                                    <?php if(
                                                        !empty($gallery_categories_v2[1]['categorie_img']) &&
                                                            \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[1]['categorie_img'])): ?>
                                                        <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[1]['categorie_img']))); ?>"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    <?php endif; ?>

                                                </div>
                                                <div class="info">

                                                    <h3>
                                                        <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                             <?php echo e(isset($gallery_categories_v2[1]['name'])?$gallery_categories_v2[1]['name']:''); ?>

                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="latest-offers-box">
                                        <div class="latest-offers-box-inner">
                                            <div class="latest-offers-box-overflow">
                                                <div class="latest-offers-box-photo">
                                                    <?php if(
                                                        !empty($gallery_categories_v2[2]['categorie_img']) &&
                                                            \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[2]['categorie_img'])): ?>
                                                        <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[2]['categorie_img']))); ?>"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    <?php endif; ?>

                                                </div>
                                                <div class="info">

                                                    <h3>
                                                        <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                             <?php echo e(isset($gallery_categories_v2[2]['name'])?$gallery_categories_v2[2]['name']:''); ?>

                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="latest-offers-box">
                                <div class="latest-offers-box-inner">
                                    <div class="latest-offers-box-overflow">
                                        <div class="latest-offers-box-photo">

                                            <div class="latest-offers-box-photodd">
                                                <?php if(
                                                    !empty($gallery_categories_v2[3]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[3]['categorie_img'])): ?>
                                                    <img class="img-fluid big-img"
                                                        src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[3]['categorie_img']))); ?>"
                                                        alt="" style="object-fit: cover">
                                                <?php else: ?>
                                                    <img class="img-fluid big-img"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="" style="object-fit: cover">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h3>
                                                <a href="<?php echo e(route('store.gallery', $store->slug)); ?>">
                                                     <?php echo e(isset($gallery_categories_v2[3]['name'])?$gallery_categories_v2[3]['name']:''); ?>

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
        <?php endif; ?>
    <?php endif; ?>



    <!-- Client Logo -->
    <?php if(isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on'): ?>
        <div class="partners">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-slider slide-box-btn">
                            <?php if(!empty($storethemesetting['brand_logo'])): ?>
                                <?php $__currentLoopData = explode(',', $storethemesetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-box">
                                        <?php if(!empty($value) && \Storage::exists('uploads/store_logo/' . $value)): ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png'))); ?>"
                                                alt="Footer logo">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/brand_logo.png'))); ?>"
                                                alt="Footer logo">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
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

<?php echo $__env->make('storefront.layout.theme16to21', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme20/index.blade.php ENDPATH**/ ?>