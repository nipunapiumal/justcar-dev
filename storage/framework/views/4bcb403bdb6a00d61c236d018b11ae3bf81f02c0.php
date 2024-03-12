<div class="search-box-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" id="frm-filter"
                    method="get">
                    <?php echo csrf_field(); ?>
                    <div class="row row-3">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                            <select class="selectpicker search-fields" name="vehicle_type_id" id="vehicle_type_id"
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
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                            <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>" disabled>
                                <option value="">
                                    <?php echo e(__('Select Make')); ?>

                                </option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                            <select class="selectpicker search-fields" name="model_id" id="model_id" disabled>
                                <option value="">
                                    <?php echo e(__('Select Model')); ?>

                                </option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 col-pad">
                            <button class="btn w-100 btn-block btn-md">
                                <?php echo e(__('Search')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme23to28/search-box-type-2.blade.php ENDPATH**/ ?>