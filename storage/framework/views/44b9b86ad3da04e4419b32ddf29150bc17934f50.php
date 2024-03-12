<?php
    $style = '';
    switch ($store->theme_dir) {
        case 'theme30':
        case 'theme32':
        case 'theme33':
            if ($storethemesetting['enable_slider_settings'] == 'on') {
                $style = 'position: relative;z-index:1;margin-top:-20px';
            } else {
                $style = 'position: relative;z-index:1;';
            }
            break;
        case 'theme29':
        case 'theme34':
            if ($storethemesetting['enable_slider_settings'] == 'on') {
                $style = 'position: relative;z-index:1;margin-top:-20px';
            }
            break;

        default:
            # code...
            break;
    }
?>

<div class="home6-search-area mb-100" style="<?php echo e($style); ?>">
    <div class="container">
        <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" id="frm-filter"
            method="get">
            <?php echo csrf_field(); ?>
            <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 justify-content-center">
                <div class="col">
                    <div class="form-inner">
                        <label> <?php echo e(__('Vehicle Type')); ?></label>
                        <select name="vehicle_type_id" id="vehicle_type_id"
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
                <div class="col">
                    <div class="form-inner">
                        <label><?php echo e(__('Select Make')); ?></label>
                        <select name="brand_id" id="brand_id"
                            data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>" disabled>
                            <option value="">
                                <?php echo e(__('Select Make')); ?>

                            </option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-inner">
                        <label><?php echo e(__('Select Model')); ?></label>
                        <select name="model_id" id="model_id" disabled>
                            <option value="">
                                <?php echo e(__('Select Model')); ?>

                            </option>
                        </select>
                    </div>
                </div>
                <div class="col d-flex align-items-end">
                    <div class="form-inner">
                        <button class="primary-btn3" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                <path
                                    d="M10.2746 9.04904C11.1219 7.89293 11.5013 6.45956 11.3371 5.0357C11.1729 3.61183 10.4771 2.30246 9.38898 1.36957C8.30083 0.436668 6.90056 -0.050966 5.46831 0.00422091C4.03607 0.0594078 2.67747 0.653346 1.66433 1.66721C0.651194 2.68107 0.0582276 4.04009 0.00406556 5.47238C-0.0500965 6.90466 0.43854 8.30458 1.37222 9.39207C2.30589 10.4795 3.61575 11.1744 5.03974 11.3376C6.46372 11.5008 7.89682 11.1203 9.05232 10.2722H9.05145C9.07769 10.3072 9.10569 10.3405 9.13719 10.3729L12.5058 13.7415C12.6699 13.9057 12.8924 13.9979 13.1245 13.998C13.3566 13.9981 13.5793 13.906 13.7435 13.7419C13.9076 13.5779 13.9999 13.3553 14 13.1232C14.0001 12.8911 13.908 12.6685 13.7439 12.5043L10.3753 9.13566C10.344 9.104 10.3104 9.07562 10.2746 9.04904ZM10.5004 5.68567C10.5004 6.31763 10.3759 6.9434 10.1341 7.52726C9.89223 8.11112 9.53776 8.64162 9.0909 9.08849C8.64403 9.53535 8.11352 9.88983 7.52967 10.1317C6.94581 10.3735 6.32003 10.498 5.68807 10.498C5.05611 10.498 4.43034 10.3735 3.84648 10.1317C3.26262 9.88983 2.73211 9.53535 2.28525 9.08849C1.83838 8.64162 1.48391 8.11112 1.24207 7.52726C1.00023 6.9434 0.875753 6.31763 0.875753 5.68567C0.875753 4.40936 1.38276 3.18533 2.28525 2.28284C3.18773 1.38036 4.41177 0.873346 5.68807 0.873346C6.96438 0.873346 8.18841 1.38036 9.0909 2.28284C9.99338 3.18533 10.5004 4.40936 10.5004 5.68567Z">
                                </path>
                            </svg>
                            <?php echo e(__('Search')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme29to34/search-type-1.blade.php ENDPATH**/ ?>