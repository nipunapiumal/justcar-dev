<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Wish list')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="inner_page_breadcrumb style2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title"><?php echo e(__('Wish list')); ?></h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Wish list')); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Listing Grid View -->
    <section class="our-listing pt0 bgc-f9 pb30-991">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-lg-4 col-xl-3 wishlist_<?php echo e($product['product_id']); ?>">
                        <div class="car-listing">
                            <div class="thumb">
                                
                                <?php if(!empty($product['image'])): ?>
                                    <img class="w-100" style="height:167px"
                                        src="<?php echo e(asset(!empty($product['image']) ? $product['image'] : '')); ?>"
                                        alt="New collection" title="New collection">
                                <?php else: ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                        class="">
                                <?php endif; ?>

                                
                                <div class="thmb_cntnt3">
                                    <ul class="mb0">
                                        <li class="list-inline-item">
                                            <?php if($product['enable_product_variant'] == 'on'): ?>
                                                <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product['product_id']])); ?>"
                                                    class="add_to_cart"
                                                    data-url="<?php echo e(route('user.addToCart', [$product['product_id'], $store->slug, 'variation_id'])); ?>"
                                                    data-csrf="<?php echo e(csrf_token()); ?>">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="javascript:void(0)" class="add_to_cart"
                                                    data-url="<?php echo e(route('user.addToCart', [$product['product_id'], $store->slug, 'variation_id'])); ?>"
                                                    data-csrf="<?php echo e(csrf_token()); ?>">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="delete_wishlist_item"
                                                id="delete_wishlist_item1" data-id="<?php echo e($product['product_id']); ?>"
                                                data-url="<?php echo e(route('delete.wishlist_item', [$store->slug,$product['product_id']])); ?>"
                                                data-csrf="<?php echo e(csrf_token()); ?>">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="details">
                                <div class="wrapper">
                                    <h5 class="price">
                                        <?php if($product['enable_product_variant'] != 'on'): ?>
                                            <?php echo e(\App\Models\Utility::priceFormat($product['price'])); ?>

                                        <?php else: ?>
                                            <?php echo e(__('In Variant')); ?>

                                        <?php endif; ?>

                                    </h5>
                                    <h6 class="title"><a href="page-car-single-v1.html"><?php echo e($product['product_name']); ?></a>
                                    </h6>

                                    <?php if($store->enable_rating == 'on'): ?>
                                        <div class="listign_review">
                                            <ul class="mb0">
                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                    <?php
                                                        $icon = 'fa-star';
                                                        $color = '';
                                                        $newVal1 = $i - 0.5;

                                                        if (\App\Models\Product::getRatingById($product['product_id']) < $i && \App\Models\Product::getRatingById($product['product_id']) >= $newVal1) {
                                                            $icon = 'fa-star-half-alt';
                                                        }
                                                        if (\App\Models\Product::getRatingById($product['product_id']) >= $newVal1) {
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
                                                        href="#"><?php echo e(\App\Models\Product::getRatingById($product['product_id'])); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>


                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme6/wishlist.blade.php ENDPATH**/ ?>