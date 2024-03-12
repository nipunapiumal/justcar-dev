<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Details banner start -->
    <div class="details-banner">
        <div class="container-fluid">
            <div class="featured-slider row slide-box-btn slider"
                data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slide slide-box">
                        <div class="banner-img">
                            <?php if(!empty($products_image[$key]->product_images)): ?>
                                <img class="img-fluid bp" style="width: 467px;height:500px;object-fit:cover"
                                    src="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>"
                                    alt="">
                            <?php else: ?>
                                <img class="img-fluid bp" style="width: 467px;height:500px;object-fit:cover"
                                    src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>" alt="">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
        <div class="breadcrumb-area-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 clearfix">
                        <div class="text text-start">
                            <?php if($products->product_type == 1): ?>
                                <h1><?php echo e($products->name); ?></h1>
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
                                
                            <?php else: ?>
                                <h1><?php echo e($products->getName()); ?></h1>
                                <div class="ratings-2">
                                    <span>
                                        <?php if($products->net_price): ?>
                                            <small class="mr15">
                                                <del><?php echo e(__('Net')); ?>

                                                    <?php echo e(\App\Models\Utility::priceFormat($products->net_price)); ?></del>
                                            </small>
                                        <?php endif; ?>
                                        <?php echo e(__('Gross')); ?> <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                    </span>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
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

                        <div class="col-lg-6 text-end">
                            <div class="cover-buttons">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="<?php echo e($btn_class); ?>"
                                            <?php echo e($btn_class == 'disabled' ? 'disabled' : ''); ?>

                                            data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $products->id])); ?>"
                                            data-csrf="<?php echo e(csrf_token()); ?>">
                                            <i class="<?php echo e($icon_class); ?> fa-heart"></i>
                                            <?php echo e(__('Save')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="add_to_cart"
                                            data-url="<?php echo e(route('user.addToCart', [$products->id, $store->slug, 'variation_id'])); ?>"
                                            data-csrf="<?php echo e(csrf_token()); ?>">
                                            <i class="fas fa-shopping-basket"></i>
                                            <?php echo e(__('Add to cart')); ?>

                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Details banner end -->

    <!-- Car details page start -->
    <div class="car-details-page content-area-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="car-details-section">
                        <!-- Advanced search start -->
                        <div class="widget-2 advanced-search bg-grea-2 as-2">
                            <h3 class="sidebar-title">Refine Your Search</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul>
                                <li>
                                    <span>Make</span>Ferrari
                                </li>
                                <li>
                                    <span>Model</span>Maxima
                                </li>
                                <li>
                                    <span>Body Style</span>Convertible
                                </li>
                                <li>
                                    <span>Year</span>2017
                                </li>
                                <li>
                                    <span>Condition</span>Brand New
                                </li>
                                <li>
                                    <span>Mileage</span>34,000 mi
                                </li>
                                <li>
                                    <span>Interior Color</span>Dark Grey
                                </li>
                                <li>
                                    <span>Transmission</span>6-speed Manual
                                </li>
                                <li>
                                    <span>Engine</span>3.4L Mid-Engine V6
                                </li>
                                <li>
                                    <span>No. of Gears:</span>5
                                </li>
                                <li>
                                    <span>Location</span>Toronto
                                </li>
                                <li>
                                    <span>Fuel Type</span>Gasoline Fuel
                                </li>
                            </ul>
                        </div>

                        <?php if($products->product_type == 1): ?>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h3><?php echo e($products->SKU); ?></h3>
                                    <p>
                                        
                                        <?php echo e(__('Category')); ?> -
                                        <?php echo e($products->product_category()); ?>

                                    </p>
                                </div>
                                <div class="">
                                    <div class="price-box-3">
                                        
                                        <?php if($products->enable_product_variant == 'on'): ?>
                                            <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                        <?php else: ?>
                                            <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                        <?php endif; ?>
                                        <span>/<del><?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?></del></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                        <!-- Tabbing box start -->
                        <div class="tabbing tabbing-box mb-40">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <?php if($products->product_type == 1): ?>
                                    <?php if(!empty($products->specification)): ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active text-uppercase" id="specification-tab"
                                                data-bs-toggle="tab" data-bs-target="#specification" type="button"
                                                role="tab" aria-controls="specification"
                                                aria-selected="true"><?php echo e(__('Product Specification')); ?></button>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($products->detail)): ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-uppercase" id="detail-tab" data-bs-toggle="tab"
                                                data-bs-target="#detail" type="button" role="tab"
                                                aria-controls="detail" aria-selected="true"><?php echo e(__('DETAILS')); ?></button>
                                        </li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(!empty($products->description)): ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active text-uppercase" id="description-tab"
                                                data-bs-toggle="tab" data-bs-target="#description" type="button"
                                                role="tab" aria-controls="description"
                                                aria-selected="true"><?php echo e(__('DESCRIPTION')); ?></button>
                                        </li>
                                    <?php endif; ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-uppercase" id="features-tab" data-bs-toggle="tab"
                                            data-bs-target="#features" type="button" role="tab"
                                            aria-controls="features" aria-selected="true"><?php echo e(__('Features')); ?></button>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <div class="tab-content" id="myTabContent">

                                <?php if($products->product_type == 1): ?>
                                    <?php if(!empty($products->specification)): ?>
                                        <div class="tab-pane fade show active" id="specification" role="tabpanel"
                                            aria-labelledby="specification-tab">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="car-specification mb-50">
                                                        <h3 class="heading-2 text-uppercase">
                                                            <?php echo e(__('Product Specification')); ?>

                                                            
                                                        </h3>
                                                        <p>
                                                            <?php echo $products->specification; ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($products->detail)): ?>
                                        <div class="tab-pane fade show" id="detail" role="tabpanel"
                                            aria-labelledby="detail-tab">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="car-detail mb-50">
                                                        <h3 class="heading-2 text-uppercase">
                                                            <?php echo e(__('DETAILS')); ?>

                                                        </h3>
                                                        <p>
                                                            <?php echo $products->detail; ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(!empty($products->description)): ?>
                                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                                            aria-labelledby="description-tab">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="car-description mb-50">
                                                        <h3 class="heading-2 text-uppercase">
                                                            <?php echo e(__('DESCRIPTION')); ?> 
                                                        </h3>
                                                        <p>
                                                            <?php echo $products->description; ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="tab-pane fade" id="features" role="tabpanel"
                                        aria-labelledby="features-tab">
                                        <div class="accordion accordion-flush" id="accordionFlushExample2">
                                            <div class="accordion-item">
                                                <div class="features-info mb-50">
                                                    <h3 class="heading-2 text-uppercase"><?php echo e(__('Equipments')); ?></h3>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <ul>
                                                                <?php $__currentLoopData = json_decode($products->equipments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_equipment => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><?php echo e($equipment); ?></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="features-info mb-50">
                                                    <h3 class="heading-2 text-uppercase"><?php echo e(__('Interior Design')); ?></h3>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <ul>
                                                                <?php $__currentLoopData = json_decode($products->interior_design); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_interior_design => $interior_design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><?php echo e($interior_design); ?></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>





                            </div>
                        </div>

                    </div>
                    <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                </div>
                <div class="col-lg-4 col-md-12">
                    <?php echo \App\Models\Advertisement::getAdvertisement($store, 2); ?>

                    <div class="sidebar-right">
                        <?php if($products->product_type == 1): ?>
                        <?php else: ?>
                            <!-- Advanced search start -->
                            <div class="widget advanced-search d-none-992">
                                <h3 class="sidebar-title"><?php echo e(__('SPECIFICATION')); ?></h3>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
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
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Properties details page end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme16to21', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme21/view.blade.php ENDPATH**/ ?>