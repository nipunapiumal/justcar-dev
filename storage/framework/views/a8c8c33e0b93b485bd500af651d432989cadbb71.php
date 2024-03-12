<?php
    $btn_style = 'btn btn-icon bg-primary color-white';
    switch ($store->theme_dir) {
        case 'theme37':
        $btn_style .= ' rounded-pill';
            break;
        default:
            # code...
            break;
    }
?>

<div class="col-xl-10">
    <div class="banner-filter-form mt-40" data-aos="fade-up" data-aos-delay="100">
        <p class="text font-lg color-white"><?php echo e(__('I`m Looking for')); ?></p>
        <div class="tab-content form-wrapper p-30">
            <div class="tab-pane fade active show" id="all">
                <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                    id="frm-filter" method="get">
                    <?php echo csrf_field(); ?>
                    <div class="row align-items-center gx-xl-3">
                        <div class="col-lg-11">
                            <div class="row">
                                <div class="col-md col-sm-6">
                                    <div class="form-group border-end">
                                        <label for="vehicle_type_id" class="font-sm"> <?php echo e(__('Vehicle Type')); ?></label>
                                        <select class="nice-select" name="vehicle_type_id"
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
                                <div class="col-md col-sm-6">
                                    <div class="form-group border-end">
                                        <label class="font-sm" for="brand_id"><?php echo e(__('Select Make')); ?></label>
                                        <select class="nice-select" name="brand_id" id="brand_id"
                                            data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>">
                                            <option value="">
                                                <?php echo e(__('Select Make')); ?>

                                            </option>
                                        </select>


                                    </div>
                                </div>
                                <div class="col-md col-sm-6">
                                    <div class="form-group border-end">
                                        <label class="font-sm" for="model_id"><?php echo e(__('Select Model')); ?></label>
                                        <select class="nice-select" name="model_id" id="model_id">
                                            <option value="">
                                                <?php echo e(__('Select Model')); ?>

                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 text-md-end">
                            <button type="button" class="<?php echo e($btn_style); ?>">
                                <i class="fal fa-search"></i>
                                <span class="me-1 d-inline-block d-lg-none"></span>
                                <span class="d-inline-block d-lg-none"> <?php echo e(__('Search')); ?></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/layout/theme35to37/search-type-1.blade.php ENDPATH**/ ?>