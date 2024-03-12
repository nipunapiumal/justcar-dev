<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>

<?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
    <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $bg = asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png')));
            $title = !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories';
            $decs = !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.';
            break;
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <?php
        $bg = asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png')));
        $title = !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories';
        $decs = !empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.';
        
    ?>
<?php endif; ?>

<?php $__env->startPush('css-page'); ?>
    <style>
        .bg-home4,
        .divider.home4_style {
            background-image: url('<?php echo e($bg); ?>') !important;
            background-position: center center;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>


    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
        
    <?php else: ?>
        
    <?php endif; ?>





    <section class="home-one home4_style bgc_home4_style bg-home4">
        <div class="container">
            <div class="row posr">
                <div class="col-xl-11 col-xxl-10 m-auto">
                    <div class="home_content home1_style at_home4">
                        <div class="home-text text-center mb30">
                            <h2 class="title"><span class="aminated-object1"><img class="objects"
                                        src="<?php echo e(asset('assets/theme6/images/home/title-bottom-border.svg')); ?>"
                                        alt=""></span>
                                <?php echo e($title); ?>

                            </h2>
                            <p class="para">
                                <?php echo e($decs); ?>

                            </p>
                        </div>
                        <div class="advance_search_panel">
                            <div class="adss_bg_stylehome4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="home1_advance_search_wrapper home4_style">
                                            <form
                                                action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                                id="frm-filter" method="get">
                                                <?php echo csrf_field(); ?>
                                                <ul
                                                    class="mb0 text-center d-block d-lg-flex mb0 text-center d-block d-lg-flex justify-content-lg-around">
                                                    <li>
                                                        <div class="select-boxes">
                                                            <div class="car_models">
                                                                <select class="selectpicker" name="vehicle_type_id"
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
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="select-boxes">
                                                            <div class="car_models">
                                                                <select class="selectpicker" name="brand_id" id="brand_id"
                                                                    data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>"
                                                                    disabled>
                                                                    <option value="">
                                                                        <?php echo e(__('Select Make')); ?>

                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="select-boxes">
                                                            <div class="car_models">
                                                                <select class="selectpicker" name="model_id" id="model_id"
                                                                    disabled>
                                                                    <option value="">
                                                                        <?php echo e(__('Select Model')); ?>

                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-block">
                                                            <button class="btn btn-thm4 advnc_search_form_btn"><span
                                                                    class="flaticon-magnifiying-glass"></span><?php echo e(__('Search')); ?></button>
                                                        </div>
                                                    </li>
                                                </ul>
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

    </section>

    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
        
    <?php endif; ?>


    <section class="feature_listing_home4_style pt120-md pb90">
        <div class="container">

            <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'off'): ?>
                
            <?php endif; ?>
            
            <?php if(
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0): ?>
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="main-title text-center">
                        <h2><?php echo e(__('Products')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="home1_popular_listing home4_style wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="listing_item_3grid_slider dots_none">
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
            <?php endif; ?>
            
            
            
        </div>
    </section>

    <!-- Features -->
    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <section class="we-are-best">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="main-title text-center">
                            <h2><?php echo e(__('Why Choose Us?')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon1'])): ?>
                            <div class="col-sm-12 col-xl-4 wow fadeInUp" data-wow-duration="0.1s" data-wow-delay="0s">
                                <div class="iconbox_home4_style mb30-lg">
                                    <div class="icon one">
                                        <span>
                                            <?php echo $storethemesetting['features_icon1']; ?>

                                        </span>
                                    </div>
                                    <div class="details">
                                        <h4 class="title"><?php echo e($storethemesetting['features_title1']); ?></h4>
                                        <p> <?php echo e($storethemesetting['features_description1']); ?></p>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon2'])): ?>
                            <div class="col-sm-12 col-xl-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                <div class="iconbox_home4_style mb30-lg mt60 mt0-lg">
                                    <div class="icon two">
                                        <span>
                                            <?php echo $storethemesetting['features_icon2']; ?>

                                        </span>
                                    </div>
                                    <div class="details">
                                        <h4 class="title"><?php echo e($storethemesetting['features_title2']); ?></h4>
                                        <p> <?php echo e($storethemesetting['features_description2']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon3'])): ?>
                            <div class="col-sm-12 col-xl-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="iconbox_home4_style mb30-lg">
                                    <div class="icon three">
                                        <span>
                                            <?php echo $storethemesetting['features_icon3']; ?>

                                        </span>

                                    </div>
                                    <div class="details">
                                        <h4 class="title"><?php echo e($storethemesetting['features_title3']); ?></h4>
                                        <p> <?php echo e($storethemesetting['features_description3']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>


    
    <?php if($products['Start shopping']->count() > 0): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2><?php echo e(__('Vehicles')); ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="home1_popular_listing home4_style wow fadeIn" data-wow-duration="1s"
                data-wow-delay="0.1s">
                <div class="listing_item_car_grid_slider ">
                    <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $product->name = $product->getName();
                        ?>
                        <div class="item">
                            <div class="carlisting-popular-vehicles">
                                <div class="details text-center">
                                    <div class="wrapper">
                                        <h5 class="price text-thm4">
                                            <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></h5>
                                        <h6 class="title">
                                            <a
                                                href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"><?php echo e($product->name); ?></a>
                                        </h6>
                                    </div>
                                    <div class="listing_footer">
                                        <ul class="mb-1">
                                            <?php if($product->product_type == 2): ?>
                                                <li class="list-inline-item"><a href="#"><span
                                                            class="flaticon-road-perspective me-2"></span><?php echo e($product->millage); ?></a>
                                                </li>

                                                <li class="list-inline-item"><a href="#"><span
                                                            class="flaticon-gas-station me-2"></span><?php echo e(\App\Models\Product::getFuelTypeById($product->fuel_type_id)); ?></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><span
                                                            class="flaticon-gear me-2"></span><?php echo e(\App\Models\Utility::getVehicleTransmission($product->transmission_id)); ?></a>
                                                </li>
                                            <?php else: ?>
                                                <li class="list-inline-item"><a href="#"><span
                                                            class="flaticon-road-perspective me-2"></span><?php echo e($product->product_category()); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="listing_footer">
                                        <ul>
                                            <?php if($product->product_type == 2): ?>
                                                <li class="list-inline-item"><a href="#"><span
                                                            class="flaticon-calendar me-2"></span><?php echo e($product->register_year); ?>

                                                    </a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fas fa-battery-bolt me-2"></i>
                                                        <?php echo e($product->power); ?></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="far fa-user-friends me-2"></i><?php echo e($product->prev_owners); ?></a>
                                                </li>
                                            <?php else: ?>
                                                <li class="list-inline-item"><a href="#"><span
                                                            class="flaticon-road-perspective me-2"></span><?php echo e($product->product_category()); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="thumb pb-4">
                                    <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                        <img alt="<?php echo e($product->name); ?>"
                                            style="border-radius: 15px;width: 100%;height:165px;object-fit:cover"
                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>">
                                    <?php else: ?>
                                        <img alt="<?php echo e($product->name); ?>"
                                            style="border-radius: 15px;width: 100%;height:165px;object-fit:cover"
                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
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
            <section class="feature_listing_home4_style pt80 pb90">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-6 m-auto">
                            <div class="main-title text-center">
                                <h2> <?php echo e(!empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories'); ?>

                                </h2>
                                <p class="lead lh-180 store-dcs">
                                    <?php echo e(!empty($storethemesetting['categories_title'])
                                        ? $storethemesetting['categories_title']
                                        : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                under the sun has been written by one hand only.'); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="home1_popular_listing home4_style wow fadeIn" data-wow-duration="1s"
                                data-wow-delay="0.1s">
                                <div class="listing_item_3grid_slider dots_none">

                                    <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($product_count[$key] > 0): ?>
                                            <div class="item">
                                                <div class="car-listing">
                                                    <a
                                                        href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>">
                                                        <div class="thumb">
                                                            <div class="tag">
                                                                <?php echo e(__('Products')); ?>:
                                                                <?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?>

                                                            </div>
                                                            <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img)): ?>
                                                                <img alt="Image placeholder"
                                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img))); ?>"
                                                                    class="product bor-radius" height="350px"
                                                                    style="object-fit: cover">
                                                            <?php else: ?>
                                                                <img alt="Image placeholder"
                                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                                    class="product bor-radius" height="350px"
                                                                    style="object-fit: cover">
                                                            <?php endif; ?>
                                                            
                                                            
                                                        </div>
                                                    </a>
                                                    <div class="details">
                                                        
                                                        <div class="listing_footer text-center">
                                                            <h2><?php echo e($pro_categorie->name); ?></h2>
                                                            <h5 class="price text-thm4">
                                                                <?php echo e(__('Products')); ?>:
                                                                <?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?>

                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </div>
                            </div>
                        </div>
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
        <section class="testimonials_home4_layouts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Swiper -->
                        <div class="testimonial_swiper_slider_home4_style swiper mySwiper wow fadeIn"
                            data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="swiper-wrapper">
                                <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial_home4_slider">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="tst_thumb_content">
                                                        <div class="thumb text-start">
                                                            <img class="rounded-circle"
                                                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png')))); ?>"
                                                                alt="1.jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="tst_thumb_content">
                                                        <div class="tst_client text-start pt0-lg">
                                                            <h5 class="title my-1">
                                                                <?php echo e($storethemesetting['testimonial_name1']); ?></h5>
                                                            <p class="para">
                                                                <?php echo e($storethemesetting['testimonial_about_us1']); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="tst_details text-start">
                                                        <p class="para">
                                                            <?php echo e($storethemesetting['testimonial_description1']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on'): ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial_home4_slider">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="tst_thumb_content">
                                                        <div class="thumb text-start">
                                                            <img class="rounded-circle"
                                                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png')))); ?>"
                                                                alt="1.jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="tst_thumb_content">
                                                        <div class="tst_client text-start pt0-lg">
                                                            <h5 class="title my-1">
                                                                <?php echo e($storethemesetting['testimonial_name2']); ?></h5>
                                                            <p class="para">
                                                                <?php echo e($storethemesetting['testimonial_about_us2']); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="tst_details text-start">
                                                        <p class="para">
                                                            <?php echo e($storethemesetting['testimonial_description2']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on'): ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial_home4_slider">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="tst_thumb_content">
                                                        <div class="thumb text-start">
                                                            <img class="rounded-circle"
                                                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png')))); ?>"
                                                                alt="1.jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="tst_thumb_content">
                                                        <div class="tst_client text-start pt0-lg">
                                                            <h5 class="title my-1">
                                                                <?php echo e($storethemesetting['testimonial_name3']); ?></h5>
                                                            <p class="para">
                                                                <?php echo e($storethemesetting['testimonial_about_us3']); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="tst_details text-start">
                                                        <p class="para">
                                                            <?php echo e($storethemesetting['testimonial_description3']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>


                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
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

<?php echo $__env->make('storefront.layout.theme9', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme9/index.blade.php ENDPATH**/ ?>