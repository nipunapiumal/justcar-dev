<?php
    switch ($store->theme_dir) {
        case 'theme23':
            $layout = 'theme23';
            break;
        case 'theme24':
            $layout = 'theme24';
            break;
        case 'theme25':
            $layout = 'theme25';
            break;
        case 'theme26':
            $layout = 'theme26';
            break;
        case 'theme27':
            $layout = 'theme27';
            break;
        case 'theme28':
            $layout = 'theme28';
            break;
        default:
            $layout = 'theme23';
            break;
    }
?>



<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1><?php echo e(__('Product Details')); ?></h1>
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="active">
                        <?php echo e($products->getName()); ?>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Car details page start -->
    <div class="car-details-page content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="car-details-section">
                        <div class="heading-car-3 clearfix">
                            <div class="float-start">
                                <h3> <?php echo e($products->getName()); ?></h3>
                                <p>
                                    <?php if($products->product_type == 1): ?>
                                        <i class="fas fa-box-open"></i> <?php echo e($products->SKU); ?>

                                    <?php else: ?>
                                    <?php endif; ?>
                                    <i class="fas fa-th-large"></i>
                                    <?php echo e($products->product_category()); ?>

                                </p>
                            </div>
                            <div class="float-end">
                                <h3 class="text-end">
                                    <?php if($products->product_type == 1): ?>
                                        <?php if($products->enable_product_variant == 'on'): ?>
                                            <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                        <?php else: ?>
                                            <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                        <?php endif; ?>
                                        <?php if($products->last_price): ?>
                                            <small>/
                                                <del>
                                                    <?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?>

                                                </del>
                                            </small>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                        <?php if($products->net_price): ?>
                                            <small>/
                                                <del>
                                                    
                                                    <?php echo e(\App\Models\Utility::priceFormat($products->net_price)); ?>

                                                </del>
                                            </small>
                                        <?php endif; ?>
                                    <?php endif; ?>



                                </h3>

                                <div class="clearfix"></div>
                                <?php if($store->enable_rating == 'on'): ?>
                                    <div class="ratings-2">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = $i - 0.5;
                                                if ($products->product_rating() < $i && $products->product_rating() >= $newVal1) {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if ($products->product_rating() >= $newVal1) {
                                                    $color = 'text-warning';
                                                }
                                            ?>
                                            <i class="fa <?php echo e($icon . ' ' . $color); ?>"></i>
                                        <?php endfor; ?>
                                        <span>(<?php echo e($products->product_rating()); ?>

                                            <?php echo e(__('Reviews')); ?>)</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Cardetailsslider 3 start -->
                        <div class="cardetailsslider-3 clearfix mb-30">
                            <div class="product-img-slide">
                                <div class="slider-for">
                                    <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($products_image[$key]->product_images)): ?>
                                            <img class="img-fluid w-100" style="height:500px;object-fit:cover"
                                                src="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>"
                                                alt="">
                                        <?php else: ?>
                                            <img class="img-fluid w-100" style="height:500px;object-fit:cover"
                                                src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                alt="">
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="slider-nav">
                                    <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="thumb-slide">
                                            <?php if(!empty($products_image[$key]->product_images)): ?>
                                                <img class="img-fluid" style="height:115px;object-fit:cover"
                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>"
                                                    alt="">
                                            <?php else: ?>
                                                <img class="img-fluid" style="height:115px;object-fit:cover"
                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                    alt="">
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <?php if($products->product_type == 1): ?>
                            <?php if(!empty($products->specification)): ?>
                                <!-- Description start -->
                                <div class="Description mb-50">
                                    <h3 class="heading-2 text-uppercase"><?php echo e(__('Product Specification')); ?></h3>
                                    <p> <?php echo $products->specification; ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($products->detail)): ?>
                                <!-- Description start -->
                                <div class="Description mb-50">
                                    <h3 class="heading-2 text-uppercase"><?php echo e(__('DETAILS')); ?></h3>
                                    <p> <?php echo $products->detail; ?></p>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(!empty($products->description)): ?>
                                <!-- Description start -->
                                <div class="Description mb-50">
                                    <h3 class="heading-2 text-uppercase"><?php echo e(__('DESCRIPTION')); ?></h3>
                                    <p> <?php echo $products->description; ?></p>
                                </div>
                            <?php endif; ?>

                            <!-- Features info start -->
                            <div class="features-info mb-40">
                                <h3 class="heading-2"><?php echo e(__('Features')); ?></h3>
                                <div class="row">
                                    <?php $__currentLoopData = json_decode($products->equipments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_equipment => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 col-sm-4 col-xs-12 mb-2">
                                            <?php echo e($equipment); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>

                            <!-- Features info start -->
                            <div class="features-info mb-40">
                                <h3 class="heading-2"><?php echo e(__('Interior Design')); ?></h3>
                                <div class="row">
                                    <?php $__currentLoopData = json_decode($products->interior_design); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_interior_design => $interior_design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 col-sm-4 col-xs-12 mb-2">
                                            <?php echo e($interior_design); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                </div>
                <div class="col-lg-4 col-md-12">

                    <div class="sidebar-right">
                        <!-- Advanced search start -->
                        <div class="widget advanced-search d-none d-xl-block d-lg-block">
                            <?php if($products->product_type == 1): ?>
                                <?php
                                    $btn_class = 'add_to_wishlist wishlist_' . $products->id . '';
                                    $icon_class = 'far';
                                ?>
                                <?php if(Auth::guard('customers')->check()): ?>
                                    <?php if(!empty($wishlist) && isset($wishlist[$products->id]['product_id'])): ?>
                                        <?php if($wishlist[$products->id]['product_id'] == $products->id): ?>
                                            <?php
                                                $btn_class = 'disabled';
                                                $icon_class = 'fas';
                                            ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="form-group mb-2">
                                    <a href="javascript:void(0)" class="btn button-theme btn-md w-100 <?php echo e($btn_class); ?>"
                                        <?php echo e($btn_class == 'disabled' ? 'disabled' : ''); ?>

                                        data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $products->id])); ?>"
                                        data-csrf="<?php echo e(csrf_token()); ?>">
                                        <i class="<?php echo e($icon_class); ?> fa-heart"></i>
                                        <?php echo e(__('Save')); ?>

                                    </a>
                                </div>
                                <div class="form-group mb-2">
                                    <a href="javascript:void(0)" class="btn btn-success btn-md w-100 add_to_cart"
                                        data-url="<?php echo e(route('user.addToCart', [$products->id, $store->slug, 'variation_id'])); ?>"
                                        data-csrf="<?php echo e(csrf_token()); ?>">
                                        <i class="fas fa-shopping-basket"></i>
                                        <?php echo e(__('Add to cart')); ?>

                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php echo \App\Models\Advertisement::getAdvertisement($store, 2); ?>


                            <?php if($products->product_type == 2): ?>
                                <h3 class="sidebar-title mt-4"><?php echo e(__('SPECIFICATION')); ?></h3>
                                <ul>
                                    <li>
                                        <span><?php echo e(__('Vehicle Brand')); ?></span><?php echo e($vehicle_brand->name); ?>

                                    </li>
                                    <li>
                                        <span><?php echo e(__('Vehicle Model')); ?></span><?php echo e($vehicle_model->name); ?>

                                    </li>
                                    <li>
                                        <span><?php echo e(__('Vehicle Number')); ?></span><?php echo e($products->vehicle_number); ?>

                                    </li>
                                    <?php if($products->fin_number_display && $products->fin_number): ?>
                                        <li>
                                            <span><?php echo e(__('Fin Number')); ?></span><?php echo e($products->fin_number); ?>

                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <span><?php echo e(__('First Register Year')); ?></span><?php echo e($products->register_year); ?>

                                    </li>
                                    <li>
                                        <span><?php echo e(__('First Register Month')); ?></span><?php echo e($products->register_month); ?>

                                    </li>
                                    <li>
                                        <span><?php echo e(__('Millage (km)')); ?></span><?php echo e($products->millage); ?>

                                    </li>
                                    <li>
                                        <span><?php echo e(__('Fuel Type')); ?></span><?php echo e($fuel_type->name); ?>

                                    </li>
                                    <li>
                                        <span><?php echo e(__('Power')); ?></span><?php echo e($products->power); ?>

                                    </li>
                                    <li>
                                        <span><?php echo e(__('Exterior Color')); ?></span><?php echo e($products->exterior_color); ?>

                                    </li>
                                    <li>
                                        <span><?php echo e(__('Metallic')); ?>:</span><?php echo e($products->is_metallic); ?>

                                    </li>
                                    <li>
                                        <span><?php echo e(__('Interior Color')); ?></span><?php echo e($products->interior_color); ?>

                                    </li>

                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Car details page end -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.' . $layout . '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme23/view.blade.php ENDPATH**/ ?>