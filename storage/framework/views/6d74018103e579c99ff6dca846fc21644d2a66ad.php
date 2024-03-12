<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Home Design -->
    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
        <section class="home-one mt10 mt70-992 p0 bdrs16 bdrs0-md ovh">
            <div class="container-fluid p0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-banner-wrapper home3_style">
                            <div class="banner-style-one no-dots owl-theme owl-carousel">
                                <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="slide slide-one"
                                        style="background-image: url(<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png')))); ?>);height: 640px;">
                                        <div class="container">
                                            <div class="row pt100">
                                                
                                                <div class="col-xl-10 offset-xl-1">
                                                    <div class="sliding-box-object">
                                                        <div class="home-text">
                                                            <h1 class="title display-4" style="font-weight:800"><span
                                                                    class="aminated-object1"><img class="objects"
                                                                        src="<?php echo e(asset('assets/theme6/images/home/title-bottom-border.svg')); ?>"
                                                                        alt=""></span>
                                                                <?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                                                            </h1>
                                                            <h3 class="para">
                                                                <?php echo e(!empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.'); ?>

                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="carousel-btn-block banner-carousel-btn">
                                <span class="carousel-btn left-btn"><i class="flaticon-left-arrow left"></i></span>
                                <span class="carousel-btn right-btn"><i class="flaticon-right-arrow right"></i></span>
                            </div>
                            <!-- /.carousel-btn-block banner-carousel-btn -->
                        </div>
                        <!-- /.main-banner-wrapper -->
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="home-one mt10 mt70-992 p0 bdrs16 bdrs0-md ovh">
            <div class="container-fluid p0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-banner-wrapper home2_main_slider mb30-md">
                            <div class="banner-style-one owl-theme owl-carousel dots_none">
                                <div class="slide slide-one"
                                    style="background-image: url(<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png')))); ?>);height: 750px;">
                                    <div class="container">
                                        <div class="row pt100">
                                            <div class="col-xl-8 offset-xl-2">
                                                <div class="sliding-box-object">
                                                    <div class="home-text">
                                                        <h1 class="title display-4" style="font-weight:800"><span
                                                                class="aminated-object1"><img class="objects"
                                                                    src="<?php echo e(asset('assets/theme6/images/home/title-bottom-border.svg')); ?>"
                                                                    alt=""></span>
                                                            <?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                                                        </h1>
                                                        <h3 class="para">
                                                            <?php echo e(!empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.'); ?>

                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="slide slide-one"
                                    style="background-image: url(<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png')))); ?>);height: 750px;">
                                    <div class="container">
                                        <div class="row home-content-home2-style">
                                            <div class="col-lg-7 p0">
                                                <h2 class="banner-title">
                                                    
                                                    <?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                                                </h2>
                                                <p>
                                                    <?php echo e(!empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.'); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>



    <!-- Features -->
    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <section class="whychose_us pb70 pt0">
            <div class="container">
                <div class="row mb20">
                    <div class="col-lg-10 m-auto">
                        <div class="advance_search_panel home2_style">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="adss_bg_stylehome1">
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-allstatus" role="tabpanel"
                                                aria-labelledby="pills-allstatus-tab">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form
                                                            action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                                            id="frm-filter" method="get">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="home1_advance_search_wrapper">
                                                                <ul class="mb0 text-center">
                                                                    <li class="list-inline-item">
                                                                        <div class="select-boxes">
                                                                            <div class="car_brand">
                                                                                <h6 class="title"><?php echo e(__('Vehicle Type')); ?>

                                                                                </h6>

                                                                                <select class="selectpicker"
                                                                                    name="vehicle_type_id"
                                                                                    id="vehicle_type_id"
                                                                                    data-url="<?php echo e(route('product.get-vehicle-brands', [$store->slug])); ?>">
                                                                                    <option value="">
                                                                                        <?php echo e(__('Select Vehicle Type')); ?>

                                                                                    </option>
                                                                                    <?php $__currentLoopData = $vehicleTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option
                                                                                            value="<?php echo e($vehicleType['id']); ?>">
                                                                                            <?php echo e($vehicleType->name); ?>

                                                                                        </option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <div class="select-boxes">
                                                                            <div class="car_brand">
                                                                                <h6 class="title"><?php echo e(__('Make')); ?>

                                                                                </h6>

                                                                                <select class="selectpicker" name="brand_id"
                                                                                    id="brand_id"
                                                                                    data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>"
                                                                                    disabled>
                                                                                    <option value="">
                                                                                        <?php echo e(__('Select Make')); ?>

                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <div class="select-boxes">
                                                                            <div class="car_models">
                                                                                <h6 class="title"><?php echo e(__('Model')); ?>

                                                                                </h6>
                                                                                <select class="selectpicker" name="model_id"
                                                                                    id="model_id" disabled>
                                                                                    <option value="">
                                                                                        <?php echo e(__('Select Model')); ?>

                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <div class="d-block">
                                                                            <button
                                                                                class="btn btn-thm advnc_search_form_btn"><span
                                                                                    class="flaticon-magnifiying-glass"></span><?php echo e(__('Search')); ?></button>
                                                                        </div>
                                                                    </li>
                                                                </ul>
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
                </div>
                <div class="row mt100 justify-content-center">
                    <div class="col-lg-8">
                        <div class="main-title text-center">
                            <h2><?php echo e(__('Why Choose Us?')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon1'])): ?>
                            <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                <div class="why_chose_us">
                                    <div class="icon float-start">
                                        <span>
                                            <?php echo $storethemesetting['features_icon1']; ?>

                                        </span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title"><?php echo e($storethemesetting['features_title1']); ?></h5>
                                        <p>
                                            <?php echo e($storethemesetting['features_description1']); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon2'])): ?>
                            <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                <div class="why_chose_us">
                                    <div class="icon float-start style2">
                                        <span> <?php echo $storethemesetting['features_icon2']; ?></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title">
                                            <?php echo e($storethemesetting['features_title2']); ?>

                                        </h5>
                                        <p>
                                            <?php echo e($storethemesetting['features_description2']); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon3'])): ?>
                            <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                <div class="why_chose_us">
                                    <div class="icon float-start style3">
                                        <span><?php echo $storethemesetting['features_icon3']; ?></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title">
                                            <?php echo e($storethemesetting['features_title3']); ?>

                                        </h5>
                                        <p>
                                            <?php echo e($storethemesetting['features_description3']); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0): ?>
        <!-- Products Type 1 -->
        <section class="popular-listing pb80 pt0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="main-title text-center mt70">
                            <h2><?php echo e(__('Products')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="home1_popular_listing home2_style">
                            <div class="listing_item_4grid_slider dots_none">

                                <?php $__currentLoopData = $products_type1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <div class="car-listing">
                                        <div class="thumb">
                                            
                                            <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                <img alt="Product Image" class="img-center img-fluid img-1"
                                                    src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>">
                                            <?php else: ?>
                                                <img alt="Image placeholder" class="img-center img-fluid img-1"
                                                    src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>">
                                            <?php endif; ?>
                                            
                                            <div class="thmb_cntnt3">
                                                <ul class="mb0">
                                                    <li class="list-inline-item">
                                                    <?php if(Auth::guard('customers')->check()): ?>
                                                        <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                            <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                            <a href="javascript:void(0)" class="add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                <i class="far fa-heart"></i>
                                                            </a>     
                                                            
                                                            <?php else: ?>
                                                            <a href="javascript:void(0)" style="color:#9b9b9b" data-id="<?php echo e($product->id); ?>" >
                                                                <i class="fas fa-heart"></i>
                                                            </a>    
                                                            
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                        <a href="javascript:void(0)" class="add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                            <i class="far fa-heart"></i>
                                                        </a>
                                                            
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                    <a href="javascript:void(0)" class="add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                        <i class="far fa-heart"></i>
                                                        
                                                    </a>    
                                                    
                                                    <?php endif; ?>
                                                            </li>
    
                                                    <li class="list-inline-item">
                                                        <?php if($product->enable_product_variant == 'on'): ?>
                                                            <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                                class="add_to_cart" data-url="<?php echo e(route('user.addToCart', [$product->id, $store->slug, 'variation_id'])); ?>"
                                                                data-csrf="<?php echo e(csrf_token()); ?>">
                                                                
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                            
                                                        <?php else: ?>
                                                            <a href="#" class="add_to_cart"
                                                            data-url="<?php echo e(route('user.addToCart', [$product->id, $store->slug, 'variation_id'])); ?>"
                                                            data-csrf="<?php echo e(csrf_token()); ?>">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
    
                                                            
                                                        <?php endif; ?>
                                                    </li>
    
    
    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="wrapper">
                                                <h5 class="price">
                                                    <?php if($product->enable_product_variant == 'on'): ?>
                                                        <?php echo e(__('In variant')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                    <?php endif; ?>
                                                </h5>
                                                <h6 class="title mb-0" style="-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;height: 35px;">
                                                    <a
                                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                        <?php echo e($product->name); ?>

                                                    </a>
                                                </h6>
                                                
                                                <?php if($store->enable_rating == 'on'): ?>
                                                    <div class="listign_review">
                                                        <ul class="mb0">
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
                                                                <li class="list-inline-item">
                                                                    <a href="#">
                                                                        <i class="fa <?php echo e($icon . ' ' . $color); ?>"></i>
                                                                    </a>
                                                                </li>
                                                                
                                                            <?php endfor; ?>
                                                            <li class="list-inline-item"><a
                                                                    href="#"><?php echo e($product->product_rating()); ?></a></li>
                                                            
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="listing_footer">
                                                <ul class="mb0">
                                                    <li class="list-inline-item">
                                                        <p class="text-sm mb-0">
                                                            <span class="td-gray"><?php echo e(__('Category')); ?>:</span>
                                                            <?php echo e($product->product_category()); ?>

                                                        </p>
                                                        
                                                        </li>
                                                    
                                                </ul>
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
        </section>
    <?php endif; ?>

    
    <?php if($products['Start shopping']->count() > 0): ?>
        <section class="featured-product pt0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="main-title text-center  mt70">
                            <h2><?php echo e(__('Vehicles')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="popular_listing_sliders row">
                            <!-- Nav tabs -->
                            <div class="nav nav-tabs col-lg-12 justify-content-center" role="tablist">

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button class="nav-link <?php echo e($category == 'Start shopping' ? 'active' : ''); ?>"
                                        id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>-tab" data-bs-toggle="tab"
                                        data-bs-target="#<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>" role="tab"
                                        aria-controls="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>"
                                        aria-selected="<?php echo e($category == 'Start shopping' ? 'true' : 'false'); ?>">
                                        <?php echo e(__($category)); ?></button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content col-lg-12" id="nav-tabContent">

                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php echo e($key == 'Start shopping' ? 'active show' : ''); ?>"
                                        id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <?php if($items->count() > 0): ?>
                                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $product->name = $product->getName();
                                                    ?>
                                                    <div class="col-sm-6 col-xl-6">
                                                        <div class="car-listing list_style">
                                                            <div class="thumb">
                                                                

                                                                <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                                    <img alt="Image placeholder"
                                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                                        class="h100p cover">
                                                                <?php else: ?>
                                                                    <img alt="Image placeholder"
                                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                                        class="h100p cover">
                                                                <?php endif; ?>

                                                                
                                                                <div class="thmb_cntnt3">
                                                                    <ul class="mb0">

                                                                        

                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="details">
                                                                <div class="wrapper">
                                                                    <h5 class="price">
                                                                        <?php if($product->enable_product_variant == 'on'): ?>
                                                                            <?php echo e(__('In variant')); ?>

                                                                        <?php else: ?>
                                                                            <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                                        <?php endif; ?>
                                                                    </h5>
                                                                    <h6 class="title"><a
                                                                            href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                                            <?php echo e($product->name); ?></a></h6>
                                                                    
                                                                </div>
                                                                <div class="listing_footer">
                                                                    <ul class="mb0">
                                                                        <?php if($product->product_type == 2): ?>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-road-perspective me-2"></span><?php echo e($product->millage); ?></a>
                                                                            </li>

                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-gas-station me-2"></span><?php echo e(\App\Models\Product::getFuelTypeById($product->fuel_type_id)); ?></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-gear me-2"></span><?php echo e(\App\Models\Utility::getVehicleTransmission($product->transmission_id)); ?></a>
                                                                            </li>
                                                                        <?php else: ?>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-road-perspective me-2"></span><?php echo e($product->product_category()); ?></a>
                                                                            </li>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                                <div class="listing_footer">
                                                                    <ul class="mb0">
                                                                        <?php if($product->product_type == 2): ?>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-calendar me-2"></span><?php echo e($product->register_year); ?>

                                                                                </a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><i
                                                                                        class="fas fa-battery-bolt me-2"></i>
                                                                                    <?php echo e($product->power); ?></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><i
                                                                                        class="far fa-user-friends me-2"></i><?php echo e($product->prev_owners); ?></a>
                                                                            </li>
                                                                        <?php else: ?>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-road-perspective me-2"></span><?php echo e($product->product_category()); ?></a>
                                                                            </li>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="col-12 product-box">
                                                    <div class="card card-product">
                                                        <h6 class="m-0 text-center no_record p-2"><i
                                                                class="fas fa-ban"></i>
                                                            <?php echo e(__('No Record Found')); ?></h6>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt50 mb50">
                    <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                </div>
                
            </div>
        </section>
    <?php else: ?>
        <div class="container mt-10 mb-5">
            <?php echo e(__('No data found')); ?>

        </div>
    <?php endif; ?>

    <!-- Products categories-->
    <?php if(isset($storethemesetting['enable_categories']) &&
            $storethemesetting['enable_categories'] == 'on' &&
            !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_categories'] == 'on'): ?>
            <section class="popular-listing pb80 pt0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="main-title text-center">
                                <h2><?php echo e(!empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories'); ?>

                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $i = 0;
                        ?>
                        <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product_count[$key] > 0): ?>
                                <?php if($i == 5): ?>
                                    <?php
                                        break;
                                    ?>
                                <?php endif; ?>
                                <div class="col-md-6 <?php echo e($i == 0 || $i == 1 ? '' : 'col-lg-4'); ?> wow fadeInUp"
                                    data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="explore_city">
                                        <div class="thumb">
                                            <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img)): ?>
                                                <img alt="<?php echo e($pro_categorie->name); ?>"
                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img))); ?>"
                                                    class="" height="250px" style="width:100%;object-fit: cover">
                                            <?php else: ?>
                                                <img alt="<?php echo e($pro_categorie->name); ?>"
                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                    class="" height="250px" style="object-fit: cover">
                                            <?php endif; ?>
                                            
                                        </div>
                                        <div class="details">
                                            <h4 class="title"><a
                                                    href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>"><?php echo e($pro_categorie->name); ?></a>
                                            </h4>
                                            <p>
                                                <?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?>

                                                <?php echo e(__('Products')); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Gallery-->
    <?php if(isset($storethemesetting['enable_gallery']) &&
            $storethemesetting['enable_gallery'] == 'on' &&
            !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_gallery'] == 'on'): ?>
            <section class="featured-product pt80 pb90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="main-title text-center text-lg-start">
                                <h2 class="mb0">
                                    <?php echo e(!empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery')); ?>

                                </h2>
                                <p class="lead lh-180 store-dcs mt-3">
                                    <?php echo e(!empty($storethemesetting['gallery_description'])
                                        ? $storethemesetting['gallery_description']
                                        : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        under the sun has been written by one hand only.'); ?>

                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="popular_listing_sliders home5_style">
                                <!-- Nav tabs -->
                                <div class="nav nav-tabs col-lg-12 justify-content-center justify-content-lg-end"
                                    role="tablist">
                                    <?php
                                        $i = 0;
                                    ?>
                                    <?php $__currentLoopData = $gallery_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button class="nav-link <?php echo e($i == 0 ? 'active' : ''); ?>"
                                            id="nav-<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>" role="tab"
                                            aria-controls="nav-<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>"
                                            aria-selected="true"><?php echo e($category); ?></button>
                                        <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="popular_listing_sliders row wow fadeIn" data-wow-duration="1s"
                                data-wow-delay="0.1s">
                                <!-- Tab panes -->
                                <div class="tab-content col-lg-12" id="nav-tabContent">
                                    <?php $i=0; ?>
                                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="tab-pane fade <?php echo e($i == 0 ? 'show active' : ''); ?>"
                                            id="nav-<?php echo e($key); ?>" role="tabpanel"
                                            aria-labelledby="nav-<?php echo e($key); ?>-tab">
                                            <div class="row">
                                                <?php if($items->count() > 0): ?>
                                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-sm-6 col-xl-3">
                                                            <div class="car-listing gallery p0 bdr_none">
                                                                <div class="thumb">
                                                                    
                                                                    <?php if(!empty($product->gallery_img) && \Storage::exists('uploads/gallery_image/' . $product->gallery_img)): ?>
                                                                        <a class="popup-img"
                                                                            href="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $product->gallery_img))); ?>">
                                                                            <img class="img-whp cover"
                                                                                src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $product->gallery_img))); ?>"
                                                                                alt="sp5s1.jpg"></a>
                                                                    <?php else: ?>
                                                                        <img alt="Image placeholder"
                                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                                            class="h100p">
                                                                    <?php endif; ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <?php endif; ?>


                                            </div>
                                            <div class="row mt20">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="<?php echo e(route('store.gallery', $store->slug)); ?>"
                                                            class="more_listing"><?php echo e(__('Show More')); ?><span
                                                                class="icon"><span
                                                                    class="fas fa-plus"></span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Testimonials (v1) -->
    <?php if(isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on'): ?>
        <section class="our-testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="main-title text-center">
                            <h2><?php echo e(!empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials'); ?>

                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="home2_testimonial_tabs wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="tab-content" id="pills-tabContent2">
                                <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <div class="testimonial_post_home2 text-center">
                                            <div class="details">
                                                <p><?php echo e($storethemesetting['testimonial_description1']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on'): ?>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="testimonial_post_home2 text-center">
                                            <div class="details">
                                                <p><?php echo e($storethemesetting['testimonial_description2']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on'): ?>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div class="testimonial_post_home2 text-center">
                                            <div class="details">
                                                <p><?php echo e($storethemesetting['testimonial_description3']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <ul class="nav justify-content-center mb-3" id="pills-tab2" role="tablist">
                                <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                            aria-selected="true">
                                            <div class="thumb d-inline-flex">
                                                <img class="rounded-circle"
                                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png')))); ?>"
                                                    alt="1.jpg">
                                                <h4 class="title">
                                                    <?php echo e($storethemesetting['testimonial_name1']); ?>

                                                    <br><small><?php echo e($storethemesetting['testimonial_about_us1']); ?></small>
                                                </h4>
                                            </div>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on'): ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                                            aria-selected="false">
                                            <div class="thumb d-inline-flex">
                                                <img class="rounded-circle"
                                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png')))); ?>"
                                                    alt="2.jpg">
                                                <h4 class="title">
                                                    <?php echo e($storethemesetting['testimonial_name2']); ?>

                                                    <br><small><?php echo e($storethemesetting['testimonial_about_us2']); ?></small>
                                                </h4>
                                            </div>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on'): ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            href="#pills-contact" role="tab" aria-controls="pills-contact"
                                            aria-selected="false">
                                            <div class="thumb d-inline-flex">
                                                <img class="rounded-circle"
                                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png')))); ?>"
                                                    alt="3.jpg">
                                                <h4 class="title">
                                                    <?php echo e($storethemesetting['testimonial_name3']); ?>

                                                    <br><small><?php echo e($storethemesetting['testimonial_about_us3']); ?></small>
                                                </h4>
                                            </div>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Client Logo -->
    <?php if(isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on'): ?>
        <section class="our-partner pb100">
            <div class="container">
                
                <div class="partner_divider">
                    <div class="row">

                        <?php if(!empty($storethemesetting['brand_logo'])): ?>
                            <?php $__currentLoopData = explode(',', $storethemesetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-6 col-xs-6 col-sm-4 col-xl-2 wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.1s">
                                    <div class="partner_item">
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
        </section>
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

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme7/index.blade.php ENDPATH**/ ?>