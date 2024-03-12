<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Wish list')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="top-product mt-10">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6 wishlist_<?php echo e($product['product_id']); ?>">
                        <div class="product-box">
                            <div class="card card-product">
                                <div class="box-rate">
                                    <div class="static-rating static-rating-sm">
                                        <?php if($store['enable_rating'] == 'on'): ?>
                                            <?php for($i =1;$i<=5;$i++): ?>
                                                <?php
                                                    $icon = 'fa-star';
                                                    $color = '';
                                                    $newVal1 = ($i-0.5);
                                                    if(\App\Models\Product::getRatingById($product['product_id']) < $i && \App\Models\Product::getRatingById($product['product_id']) >= $newVal1)
                                                    {
                                                        $icon = 'fa-star-half-alt';
                                                    }
                                                    if(\App\Models\Product::getRatingById($product['product_id']) >= $newVal1)
                                                    {
                                                        $color = 'text-warning';
                                                    }
                                                ?>
                                                <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-product-actions">
                                        <button type="button" class="action-item wishlist-icon bg-light-gray delete_wishlist_item" id="delete_wishlist_item1" data-id="<?php echo e($product['product_id']); ?>">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-image py-3">
                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product['product_id']])); ?>">
                                        <?php if(!empty($product['image'])): ?>
                                            <img class="img-center img-fluid" style="width:135px; height:167px" src="<?php echo e(asset(!empty($product['image'])?$product['image']:'')); ?>" alt="New collection" title="New collection">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                    <h6><a href="<?php echo e(route('store.product.product_view',[$store->slug,$product['product_id']])); ?>" class="t-black13"><?php echo e($product['product_name']); ?></a></h6>
                                    <?php if($product['enable_product_variant'] != 'on'): ?>
                                        <div class="product-price mt-3">
                                            <span class="card-price t-black15 mb-2"><?php echo e(\App\Models\Utility::priceFormat($product['price'])); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <div class="product-price mt-3">
                                            <span class="card-price t-black15 mb-2"><?php echo e(__('In Variant')); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="p-button">
                                        <button type="button" class="action-item pcart-icon bg-primary">
                                            <i class="fas fa-shopping-basket"></i>
                                        </button>
                                        <?php if($product['enable_product_variant'] == 'on'): ?>
                                            <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product['product_id']])); ?>" class="btn btn-sm btn-white btn-icon">
                                               <span class="btn-inner--text text-primary">
                                                    <?php echo e(__('Add to cart')); ?>

                                                </span>
                                                <span class="btn-inner--icon">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </span>
                                            </a>
                                        <?php else: ?>
                                            <a type="button" class="btn btn-sm btn-white btn-icon add_to_cart" data-id="<?php echo e($product['product_id']); ?>">
                                           <span class="btn-inner--text text-primary">
                                                <?php echo e(__('Add to cart')); ?>

                                            </span>
                                                <span class="btn-inner--icon">
                                                <i class="fas fa-shopping-basket"></i>
                                            </span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '.delete_wishlist_item', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');

            $.ajax({
                type: "DELETE",
                url: '<?php echo e(route('delete.wishlist_item', [$store->slug,'__product_id'])); ?>'.replace('__product_id', id),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (response) {
                    if (response.status == "success") {
                        show_toastr('Success', response.message, 'success');
                        $('.wishlist_' + response.id).remove();
                        $('.wishlist_count').html(response.count);

                    } else {
                        show_toastr('Error', response.message, 'error');
                    }
                },
                error: function (result) {
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme5', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme10/wishlist.blade.php ENDPATH**/ ?>