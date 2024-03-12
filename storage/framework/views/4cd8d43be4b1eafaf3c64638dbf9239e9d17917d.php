<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .img-fluid {
            width: 100%;
        }

        body {
            font-size: 18px;
            margin: 20px;
        }

        .mt-5 {
            margin-top: 30px;
        }

        .mb-5 {
            margin-bottom: 30px;
        }
    </style>
    <?php
        $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
    ?>
    <h1><u><?php echo e(__('For Sale')); ?></u></h1>
    <h4><?php echo e($product->name); ?></h4>

    <table border="0" style="width: 100%">
        <tr>
            <td>
                <table border="0">
                    <tr>
                        <td>
                            <?php echo e(__('Millage (km)')); ?>

                        </td>
                        <td style="padding-left: 30px">
                            <?php echo e($product->millage); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e(__('Power')); ?>

                        </td>
                        <td style="padding-left: 30px">
                            <?php echo e($product->power); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e(__('Fuel Type')); ?>

                        </td>
                        <td style="padding-left: 30px">
                            <?php echo e($fuel_type->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e(__('Transmission')); ?>

                        </td>
                        <td style="padding-left: 30px">
                            <?php echo e(\App\Models\Utility::getVehicleTransmission($product->transmission_id)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e(__('Interior Color')); ?>

                        </td>
                        <td style="padding-left: 30px">
                            <div
                                style="height: 20px;width:20px;background-color:<?php echo e($product->interior_color); ?>;border:1px solid">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e(__('Exterior Color')); ?>

                        </td>
                        <td style="padding-left: 30px;text-align:right">
                            <div
                                style="height: 20px;width:20px;background-color:<?php echo e($product->exterior_color); ?>;border:1px solid">
                            </div>
                        </td>
                    </tr>
                </table>

            </td>
            <td style="padding-left: 30px;text-align:right">
                <div>
                    <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                        <img style="width: 340px;height:210px;object-fit:cover"
                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>" alt="">
                    <?php endif; ?>
                </div>
            </td>
        </tr>

    </table>



    


    <h4 class="mt-3"><?php echo e(__('Equipments')); ?></h4>
    <ul>
        <?php $__currentLoopData = json_decode($product->equipments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_equipment => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($equipment); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <h4 class="mt-3"><?php echo e(__('Interior Design')); ?></h4>
    <ul>
        <?php $__currentLoopData = json_decode($product->interior_design); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_interior_design => $interior_design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($interior_design); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <h4 class="mt-3"><?php echo e(__('Description')); ?></h4>
    <p> <?php echo $product->description; ?></p>



    <table border="0">
        <tr>
            <td>
                <h4><?php echo e(__('Contact Us')); ?></h4>
                <h3><?php echo e($storethemesetting['top_bar_number']); ?></h3>
            </td>
            <td style="padding-left: 30px">
                <h4><?php echo e(__('Price')); ?></h4>
                <h3>
                    <?php if($product->product_type == 1): ?>
                    <?php else: ?>
                        <?php if($product->net_price): ?>
                            <span>
                                <?php echo e(__('Net')); ?>

                                <?php echo e(\App\Models\Utility::priceFormat($product->net_price)); ?>

                            </span>
                        <?php endif; ?>
                        <small>
                            <del>
                                <?php echo e(__('Gross')); ?> <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                            </del>
                        </small>
                    <?php endif; ?>
                </h3>
                
            </td>
        </tr>
    </table>



    <div class="mt-5 mb-5">
        <?php
            $svg = QrCode::generate(route('store.product.product_view', [$store->slug, $product->id]));
        ?>
        <img src="data:image/svg+xml;base64,<?php echo e(base64_encode($svg)); ?>" width="200" />
    </div>
    <div class="col-lg-12">
        <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

    </div>
    <p class="mt-3">
        <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'])); ?>

    </p>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/product/pdf.blade.php ENDPATH**/ ?>