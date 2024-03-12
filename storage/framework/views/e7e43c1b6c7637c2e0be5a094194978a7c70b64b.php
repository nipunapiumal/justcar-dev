<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
        <div class="container-fluid">
            <div class="row align-items-center">


                <div class="col">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <div class="overflow-hidden pb-2">
                                <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp"
                                    data-appear-animation-delay="100">
                                    <?php if($products->product_type == 1): ?>
                                        <?php echo e($products->name); ?>

                                    <?php else: ?>
                                        <?php echo e($products->getName()); ?>

                                    <?php endif; ?>
                                    </h2>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-center order-1">
                            <ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn"
                                data-appear-animation-delay="300">
                                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="active" aria-current="page">
                                    <?php if($products->product_type == 1): ?>
                                        <?php echo e($products->name); ?>

                                    <?php else: ?>
                                        <?php echo e($products->getName()); ?>

                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">

                <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark nav-lg d-block overflow-hidden"
                    data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'autoHeight': true}"
                    style="height: 510px;">
                    <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                
                                <?php if(!empty($products_image[$key]->product_images)): ?>
                                    <img class="img-fluid border-radius-0"
                                        style="width: 1110px;height:540px;object-fit:cover"
                                        src="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>">
                                <?php else: ?>
                                    <img class="img-fluid border-radius-0"
                                        style="width: 1110px;height:540px;object-fit:cover"
                                        src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>

            </div>
        </div>
        <div class="row pt-4 mt-2 mb-5">
            <div class="col-md-8 mb-4 mb-md-0">
                <?php if($products->product_type == 1): ?>
                    <h1 class="mb-0"><?php echo e($products->name); ?></h1>
                <?php else: ?>
                    <h1 class="mb-0"><?php echo e($products->getName()); ?></h1>
                <?php endif; ?>

                <h4 class="price mb-3 text-uppercase">
                    <?php if($products->product_type == 1): ?>
                        <span
                            class="sale text-color-dark"><?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?></span>
                        <span class="amount">
                            <?php if($products->enable_product_variant == 'on'): ?>
                                <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                            <?php else: ?>
                                <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                            <?php endif; ?>
                        </span>
                    <?php else: ?>
                        <?php if($products->net_price): ?>
                            <span class="sale text-color-dark">
                                <?php echo e(__('Net')); ?>

                                <?php echo e(\App\Models\Utility::priceFormat($products->net_price)); ?>

                            </span>
                        <?php endif; ?>
                        <span class="amount">
                            <?php echo e(__('Gross')); ?> <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                        </span>
                    <?php endif; ?>
                </h4>

                <?php if(!empty($products->description)): ?>
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        <?php echo e(__('DESCRIPTION')); ?>

                    </h2>

                    <?php echo $products->description; ?>

                <?php endif; ?>
                

                <?php if($products->product_type == 1): ?>
                    <?php if(!empty($products->specification)): ?>
                        <h2 class="text-color-dark font-weight-normal text-5 mb-2 text-uppercase">
                            <?php echo e(__('Product Specification')); ?>

                        </h2>

                        <?php echo $products->specification; ?>

                    <?php endif; ?>
                    <?php if(!empty($products->detail)): ?>
                        <h2 class="text-color-dark font-weight-normal text-5 mb-2 text-uppercase">
                            <?php echo e(__('DETAILS')); ?>

                        </h2>

                        <?php echo $products->detail; ?>

                    <?php endif; ?>
                <?php endif; ?>

                <?php if($products->product_type == 2): ?>
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        <?php echo e(__('Equipments')); ?>

                    </h2>
                    <ul>
                        <?php $__currentLoopData = json_decode($products->equipments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_equipment => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($equipment); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        <?php echo e(__('Interior Design')); ?>

                    </h2>

                    <ul>
                        <?php $__currentLoopData = json_decode($products->interior_design); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_interior_design => $interior_design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($interior_design); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                
                <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

            </div>

            <div class="col-md-4">

                <?php if($products->product_type == 1): ?>
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

                        <a class="btn btn-danger border-0 text-3-5 font-weight-semi-bold btn-px-5 btn-py-3 d-none d-md-inline-block w-100 mb-2 <?php echo e($btn_class); ?>"
                            <?php echo e($btn_class == 'disabled' ? 'disabled' : ''); ?>

                            data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $products->id])); ?>"
                            data-csrf="<?php echo e(csrf_token()); ?>">
                            <span class="<?php echo e($icon_class); ?> fa-heart"></span>
                            <span><?php echo e(__('Save')); ?></span>
                        </a>
                        <a class="btn btn-tertiary border-0 text-3-5 font-weight-semi-bold btn-px-5 btn-py-3 d-none d-md-inline-block w-100 mb-2 add_to_cart"
                            data-url="<?php echo e(route('user.addToCart', [$products->id, $store->slug, 'variation_id'])); ?>"
                            data-csrf="<?php echo e(csrf_token()); ?>">
                            <span class="fas fa-shopping-basket"></span>
                            <span><?php echo e(__('Add to cart')); ?></span>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

                <?php echo \App\Models\Advertisement::getAdvertisement($store, 2); ?>



                <?php if($products->product_type == 1): ?>
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        <?php echo e(__('DETAILS')); ?>

                    </h2>

                    <ul class="list list-icons list-primary list-borders text-2">
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Category')); ?></strong>
                            <?php echo e($products->product_category()); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('SKU')); ?></strong>
                            <?php echo e($products->SKU); ?>

                        </li>
                    </ul>
                <?php else: ?>
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        <?php echo e(__('SPECIFICATION')); ?>

                    </h2>

                    <ul class="list list-icons list-primary list-borders text-2">
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Vehicle Brand')); ?></strong> <?php echo e($vehicle_brand->name); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Vehicle Model')); ?></strong> <?php echo e($vehicle_model->name); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Vehicle Number')); ?></strong>
                            <?php echo e($products->vehicle_number); ?>

                        </li>
                        <?php if($products->fin_number_display && $products->fin_number): ?>
                            <li>
                                <i class="fas fa-caret-right left-10"></i><strong
                                    class="text-color-primary"><?php echo e(__('Fin Number')); ?></strong>
                                <?php echo e($products->fin_number); ?>

                            </li>
                        <?php endif; ?>

                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('First Register Year')); ?></strong>
                            <?php echo e($products->register_year); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('First Register Month')); ?></strong>
                            <?php echo e($products->register_month); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Millage (km)')); ?></strong> <?php echo e($products->millage); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Fuel Type')); ?></strong> <?php echo e($fuel_type->name); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Power')); ?></strong> <?php echo e($products->power); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Exterior Color')); ?></strong>
                            <?php echo e($products->exterior_color); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Metallic')); ?></strong> <?php echo e($products->is_metallic); ?>

                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary"><?php echo e(__('Interior Color')); ?></strong>
                            <?php echo e($products->interior_color); ?>

                        </li>

                    </ul>
                <?php endif; ?>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.themePlus1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/themePlus1/view.blade.php ENDPATH**/ ?>