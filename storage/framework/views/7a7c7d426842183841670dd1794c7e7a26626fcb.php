<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-8">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2><?php echo e($products->name); ?></h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li><?php echo e($products->name); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Shop Details Area Start -->
    <div class="shop-details-area pt-150 pb-140">
        <div class="container">
            <div class="row flex-md-row-reverse">
                <div class="col-lg-9 col-md-12">
                    <div class="ht-shop-details-img">

                        <div class="row">
                            <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-xl-3">
                                    <div class="car-listing gallery p0 bdr_none">
                                        <div class="thumb">
                                            <?php if(!empty($products_image[$key]->product_images)): ?>
                                                <a class="popup-img"
                                                    href="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>">
                                                    <img class="img-whp cover"
                                                        src="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>"
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

                        </div>

                        
                    </div>
                    
                    <div class="shop-details-info-wrapper">
                        <div class="shop-details-info">
                            <?php if($products->product_type == 1): ?>
                                <h4><?php echo e($products->name); ?></h4>

                                <?php if($store->enable_rating == 'on'): ?>
                                    <div class="p-ratings">
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
                                            <i class="fa fa-star <?php echo e($icon . ' ' . $color); ?>"></i>
                                        <?php endfor; ?>
                                        <span>(<?php echo e($products->product_rating()); ?>

                                            <?php echo e(__('Reviews')); ?>)</span>
                                    </div>
                                <?php endif; ?>

                                
                            <?php else: ?>
                                <h4><?php echo e($products->getName()); ?></h4>
                            <?php endif; ?>

                        </div>
                        <div class="details-price">
                            <?php if($products->product_type == 1): ?>
                                <h3>
                                    <small class="mr15">
                                        <del><?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?></del>
                                    </small>
                                    <?php if($products->enable_product_variant == 'on'): ?>
                                        <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                    <?php else: ?>
                                        <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                    <?php endif; ?>
                                </h3>
                            <?php else: ?>
                                <h3>
                                    <?php if($products->net_price): ?>
                                        <small class="mr15">
                                            <del><?php echo e(__('Net')); ?>

                                                <?php echo e(\App\Models\Utility::priceFormat($products->net_price)); ?></del>
                                        </small>
                                    <?php endif; ?>
                                    <?php echo e(__('Gross')); ?> <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                </h3>
                            <?php endif; ?>
                            <?php if($products->product_type == 1): ?>
                                <span>
                                    <?php echo e(__('Category')); ?> -
                                    <?php echo e($products->product_category()); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if(!empty($products->description)): ?>
                        <div class="details-text">
                            <p>
                                <?php echo $products->description; ?>

                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if($products->product_type == 1): ?>
                        <ul role="tablist" class="nav nav-tabs">
                            <li role="presentation">
                                <a class="active text-uppercase" data-bs-toggle="tab" role="tab"
                                    aria-controls="specification" href="#specification"
                                    aria-expanded="true"><?php echo e(__('Product Specification')); ?></a>
                            </li>
                            <li role="presentation">
                                <a data-bs-toggle="tab" role="tab" aria-controls="details" href="#details"
                                    aria-expanded="true"><?php echo e(__('DETAILS')); ?></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="specification" class="tab-pane active show fade" role="tabpanel">
                                <div class="tab-text">
                                    <?php echo $products->specification; ?>

                                </div>
                            </div>
                            <div id="details" class="tab-pane show fade" role="tabpanel">
                                <div class="tab-text">
                                    <?php echo $products->detail; ?>

                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <ul role="tablist" class="nav nav-tabs">
                            <li role="presentation">
                                <a class="active" data-bs-toggle="tab" role="tab" aria-controls="specification"
                                    href="#specification" aria-expanded="true"><?php echo e(__('SPECIFICATION')); ?></a>
                            </li>
                            
                        </ul>
                        <div class="tab-content">
                            <div id="specification" class="tab-pane active show fade" role="tabpanel">
                                <div class="tab-text">
                                    <div class="row">
                                        <div class="col-xl-7">
                                            <h5 class="subtitle mb-3"><?php echo e(__('Equipments')); ?></h5>
                                        </div>
                                        <div class="col-xl-5">
                                            <ul class="service_list">
                                                <?php $__currentLoopData = json_decode($products->equipments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_equipment => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($equipment); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="col-xl-7">
                                            <h5 class="subtitle mb-3"><?php echo e(__('Interior Design')); ?></h5>
                                        </div>
                                        <div class="col-xl-5">
                                            <ul class="service_list">
                                                <?php $__currentLoopData = json_decode($products->interior_design); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_interior_design => $interior_design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($interior_design); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                </div>
                <div class="col-lg-3 col-md-12">




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
                        <button class="w-100 mb-1 default-btn <?php echo e($btn_class); ?>"
                            <?php echo e($btn_class == 'disabled' ? 'disabled' : ''); ?>

                            data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $products->id])); ?>"
                            data-csrf="<?php echo e(csrf_token()); ?>">
                            <span class="<?php echo e($icon_class); ?> fa-heart"></span>
                            <span><?php echo e(__('Save')); ?></span>
                        </button>
                        <button class="w-100 default-btn add_to_cart mb-1"
                            data-url="<?php echo e(route('user.addToCart', [$products->id, $store->slug, 'variation_id'])); ?>"
                            data-csrf="<?php echo e(csrf_token()); ?>">
                            <span class="fas fa-shopping-basket"></span>
                            <span><?php echo e(__('Add to cart')); ?></span>
                        </button>
                    <?php endif; ?>


                    <div class="ht-single-widget-wrapper">
                        <div class="ht-single-widget pt-30">
                            <h4 class="widget-title"><?php echo e(__('SPECIFICATION')); ?></h4>
                            <div class="ht-widget-item">
                                <div class="widget-content pt-35">
                                    <?php if($products->product_type == 1): ?>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Category')); ?></span>
                                            <span><?php echo e($products->product_category()); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('SKU')); ?></span>
                                            <span><?php echo e($products->SKU); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Vehicle Brand')); ?></span>
                                            <span><?php echo e($vehicle_brand->name); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Vehicle Model')); ?></span>
                                            <span><?php echo e($vehicle_model->name); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Vehicle Number')); ?></span>
                                            <span><?php echo e($products->vehicle_number); ?></span>
                                        </div>
                                        <?php if($products->fin_number_display): ?>
                                            <div class="ht-details-widget">
                                                <span class="d-title"><?php echo e(__('Fin Number')); ?></span>
                                                <span><?php echo e($products->fin_number); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('First Register Year')); ?></span>
                                            <span><?php echo e($products->register_year); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('First Register Month')); ?></span>
                                            <span><?php echo e($products->register_month); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Millage (km)')); ?></span>
                                            <span><?php echo e($products->millage); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Fuel Type')); ?></span>
                                            <span><?php echo e($fuel_type->name); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Power')); ?></span>
                                            <span><?php echo e($products->power); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Exterior Color')); ?></span>
                                            <span><?php echo e($products->exterior_color); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Metallic')); ?></span>
                                            <span><?php echo e($products->is_metallic); ?></span>
                                        </div>
                                        <div class="ht-details-widget">
                                            <span class="d-title"><?php echo e(__('Interior Color')); ?></span>
                                            <span><?php echo e($products->interior_color); ?></span>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Details Area End -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '#pro_variants_name', function() {
            var variants = [];
            $(".variant-selection").each(function(index, element) {
                variants.push(element.value);
            });
            if (variants.length > 0) {
                $.ajax({
                    url: '<?php echo e(route('get.products.variant.quantity')); ?>',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        variants: variants.join(' : '),
                        product_id: $('#product_id').val()
                    },

                    success: function(data) {
                        $('.variation_price').html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('#variant_qty').val(data.quantity);
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '#pro_variants_name', function() {
            var variants = [];
            $(".variant-selection").each(function(index, element) {
                variants.push(element.value);
            });
            if (variants.length > 0) {
                $.ajax({
                    url: '<?php echo e(route('get.products.variant.quantity')); ?>',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        variants: variants.join(' : '),
                        product_id: $('#product_id').val()
                    },

                    success: function(data) {
                        $('.variation_price').html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('#variant_qty').val(data.quantity);
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme13to15', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme13/view.blade.php ENDPATH**/ ?>