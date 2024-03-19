<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2><?php echo e($products->getName()); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75"><?php echo e($products->getName()); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- car-details-area start -->
    <div class="car-details-area pt-100 pb-60">
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-9">
                    <div class="product-single-gallery mb-40">
                        <div class="swiper product-single-slider">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <figure class="lazy-container ratio ratio-5-3">
                                            <?php if(!empty($products_image[$key]->product_images)): ?>
                                                <a href="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>"
                                                    class="lightbox-single">
                                                    <img class="lazyload img-fluid w-100"
                                                        style="height:500px;object-fit:cover"
                                                        src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                        data-src="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>"
                                                        alt=""> </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                    class="lightbox-single">
                                                    <img class="lazyload img-fluid w-100"
                                                        style="height:500px;object-fit:cover"
                                                        src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                        alt=""> </a>
                                            <?php endif; ?>
                                        </figure>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="product-thumb">
                            <div class="swiper slider-thumbnails">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <div class="thumbnail-img lazy-container ratio ratio-5-3">
                                                <?php if(!empty($products_image[$key]->product_images)): ?>
                                                    <img class="lazyload img-fluid w-100"
                                                        style="height:100px;object-fit:cover"
                                                        src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                        data-src="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>"
                                                        alt="">
                                                <?php else: ?>
                                                    <img class="lazyload img-fluid w-100"
                                                        style="height:100px;object-fit:cover"
                                                        src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                        alt="">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <!-- Slider navigation buttons -->
                            <div class="slider-navigation">
                                <button type="button" title="Slide prev" class="slider-btn slider-btn-prev radius-0">
                                    <i class="fal fa-angle-left"></i>
                                </button>
                                <button type="button" title="Slide next" class="slider-btn slider-btn-next radius-0">
                                    <i class="fal fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="product-single-details">
                        <div class="row" data-aos="fade-up">
                            <div class="col-md-8">
                                <span class="product-category"> <?php echo e($products->product_category()); ?></span>
                                <h3 class="product-title mt-10 mb-20"><?php echo e($products->getName()); ?></h3>
                            </div>
                            <div class="col-md-4">
                                <div class="product-price mb-20">
                                    <?php if($products->product_type == 1): ?>
                                        <h3 class="new-price color-primary">
                                            <?php if($products->enable_product_variant == 'on'): ?>
                                                <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                            <?php else: ?>
                                                <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                            <?php endif; ?>
                                        </h3>
                                        <?php if($products->last_price): ?>
                                            <span class="old-price h4 color-medium">
                                                <?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?>

                                            </span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <h3 class="new-price color-primary">
                                            <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                        </h3>
                                        <?php if($products->net_price): ?>
                                            <span class="old-price h4 color-medium">
                                                <?php echo e(\App\Models\Utility::priceFormat($products->net_price)); ?>

                                            </span>
                                        <?php endif; ?>
                                    <?php endif; ?>



                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-11">

                                <?php if($products->product_type == 1): ?>
                                    <?php if(!empty($products->specification)): ?>
                                        <!-- Description start -->
                                        <div class="product-desc pt-40" data-aos="fade-up">
                                            <h4 class="mb-20">
                                                <?php echo e(__('Product Specification')); ?>

                                            </h4>
                                            <p> <?php echo $products->specification; ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($products->detail)): ?>
                                        <!-- Description start -->
                                        <div class="product-desc pt-40" data-aos="fade-up">
                                            <h4 class="mb-20">
                                                <?php echo e(__('DETAILS')); ?>

                                            </h4>
                                            <p> <?php echo $products->detail; ?></p>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(!empty($products->description)): ?>
                                        <!-- Description start -->
                                        <div class="product-desc pt-40" data-aos="fade-up">
                                            <h4 class="mb-20">
                                                <?php echo e(__('DESCRIPTION')); ?>

                                            </h4>
                                            <p> <?php echo $products->description; ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Features info start -->
                                    <div class="product-spec pt-60" data-aos="fade-up">
                                        <h4 class="mb-20"><?php echo e(__('Features')); ?></h4>
                                        <div class="row">
                                            <?php $__currentLoopData = json_decode($products->equipments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_equipment => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                    
                                                    <span><?php echo e($equipment); ?></span>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </div>
                                    </div>

                                    <!-- Features info start -->
                                    <div class="product-spec pt-60" data-aos="fade-up">
                                        <h4 class="mb-20"><?php echo e(__('Interior Design')); ?></h4>
                                        <div class="row">
                                            <?php $__currentLoopData = json_decode($products->interior_design); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_interior_design => $interior_design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                    
                                                    <span> <?php echo e($interior_design); ?></span>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- Product feature -->
                                <?php if($products->product_type == 2): ?>
                                    <div class="product-spec pt-60" data-aos="fade-up">
                                        <h4 class="mb-20"><?php echo e(__('SPECIFICATION')); ?></h4>
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('Vehicle Brand')); ?></h6>
                                                <span> <?php echo e($vehicle_brand->name); ?></span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('Vehicle Model')); ?></h6>
                                                <span> <?php echo e($vehicle_model->name); ?></span>
                                            </div>
                                            <?php if($products->fin_number_display && $products->fin_number): ?>
                                                <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                    <h6 class="mb-1"><?php echo e(__('Fin Number')); ?></h6>
                                                    <span> <?php echo e($products->fin_number); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('First Register Year')); ?></h6>
                                                <span> <?php echo e($products->register_year); ?></span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('First Register Month')); ?></h6>
                                                <span> <?php echo e($products->register_month); ?></span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('Millage (km)')); ?></h6>
                                                <span> <?php echo e($products->millage); ?></span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('Fuel Type')); ?></h6>
                                                <span> <?php echo e($fuel_type->name); ?></span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('Power')); ?></h6>
                                                <span> <?php echo e($products->power); ?></span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('Exterior Color')); ?></h6>
                                                <span> <?php echo e($products->exterior_color); ?></span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('Metallic')); ?></h6>
                                                <span> <?php echo e($products->is_metallic); ?></span>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                                <h6 class="mb-1"><?php echo e(__('Interior Color')); ?></h6>
                                                <span> <?php echo e($products->interior_color); ?></span>
                                            </div>

                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <aside class="widget-area" data-aos="fade-up">
                        <div class="widget widget-form bg-light mb-30">
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
                                    <a href="javascript:void(0)" class="btn btn-md btn-primary w-100 <?php echo e($btn_class); ?>"
                                        <?php echo e($btn_class == 'disabled' ? 'disabled' : ''); ?>

                                        data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $products->id])); ?>"
                                        data-csrf="<?php echo e(csrf_token()); ?>">
                                        <i class="<?php echo e($icon_class); ?> fa-heart"></i>
                                        <?php echo e(__('Save')); ?>

                                    </a>
                                </div>
                                <div class="form-group mb-2">
                                    <a href="javascript:void(0)" class="btn btn-md btn-primary w-100 add_to_cart"
                                        data-url="<?php echo e(route('user.addToCart', [$products->id, $store->slug, 'variation_id'])); ?>"
                                        data-csrf="<?php echo e(csrf_token()); ?>">
                                        <i class="fas fa-shopping-basket"></i>
                                        <?php echo e(__('Add to cart')); ?>

                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php echo \App\Models\Advertisement::getAdvertisement($store, 2); ?>

                        </div>
                        <div class="widget widget-form bg-light mb-30">
                            <h5 class="title mb-20">
                                <?php echo e(__("To More inquiry")); ?>

                            </h5>
                            
                            <?php echo Form::open(
                                ['route' => ['store.store-contact', $store->slug], 'class' => 'contact_form'],
                                ['method' => 'POST'],
                            ); ?>

                             <input type="hidden" name="product_id" value="<?php echo e($products->id); ?>">
                             <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <input class="form-control form_control" type="text" name="first_name"
                                            placeholder="<?php echo e(__('First Name')); ?>*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <input class="form-control form_control" type="text" name="last_name"
                                            placeholder="<?php echo e(__('Last Name')); ?>*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <input class="form-control form_control email" type="email" name="email"
                                            placeholder="<?php echo e(__('Email')); ?>*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <input class="form-control form_control" type="text" name="phone"
                                            placeholder="<?php echo e(__('Phone No')); ?>*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <input class="form-control form_control" type="text" name="subject"
                                            placeholder="<?php echo e(__('Subject')); ?>*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="message" class="form-control" rows="6" maxlength="1000" placeholder="<?php echo e(__('Message')); ?>*"></textarea>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-md btn-primary w-100"><?php echo e(__('Get In Touch')); ?></button>
    
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>                               
                        </div>
                        <!-- Spacer -->
                        <div class="pb-40"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- car-details-area start -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme36', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme36/view.blade.php ENDPATH**/ ?>