<!-- Search box 3 start -->
<div class="search-box-3 sb-5">
    <div class="container">
        <div class="search-area-inner" style="position: relative;z-index:99">
            <div class="search-contents">
                <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                    id="frm-filter" method="get">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="vehicle_type_id"
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
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                    data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>" disabled>
                                    <option value="">
                                        <?php echo e(__('Select Make')); ?>

                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="model_id" id="model_id"
                                    disabled>
                                    <option value="">
                                        <?php echo e(__('Select Model')); ?>

                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 col-pad">
                            <div class="form-group">
                                <button class="btn w-100 button-theme btn-md">
                                    <i class="fa fa-search"></i> <?php echo e(__('Search')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search box 3 end --><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme23to28/search-box-type-1.blade.php ENDPATH**/ ?>