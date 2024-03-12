<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1><?php echo e(__('Products')); ?></h1>
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="active"><?php echo e(__('Products')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Products -->
    <!-- Featured car start -->
    <div class="featured-car content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-left">
                        <!-- Advanced search start -->
                        <div class="widget advanced-search2">
                            <h3 class="sidebar-title"><?php echo e(__('Search Filters')); ?></h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                id="frm-filter" method="get">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="vehicle_type_id" id="vehicle_type_id"
                                        data-url="<?php echo e(route('product.get-vehicle-brands', [$store->slug])); ?>">
                                        <option value="">
                                            <?php echo e(__('Select Vehicle Type')); ?>

                                        </option>
                                        <?php $__currentLoopData = $vehicleTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vehicleType['id']); ?>"
                                                <?php echo e(app('request')->input('vehicle_type_id') == $vehicleType['id'] ? 'selected' : ''); ?>>
                                                <?php echo e($vehicleType->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                        data-url="<?php echo e(route('product.get-models', [$store->slug])); ?>"
                                        <?php echo e(app('request')->input('vehicle_type_id') ? '' : 'disabled'); ?>>
                                        <option value="">
                                            <?php echo e(__('Select Make')); ?>

                                        </option>
                                        <?php $__currentLoopData = $vehicleBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleBrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($vehicleBrand['id']); ?>"
                                            <?php echo e(app('request')->input('brand_id') == $vehicleBrand['id'] ? 'selected' : ''); ?>>
                                            <?php echo e($vehicleBrand->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="model_id" id="model_id"
                                        <?php echo e(app('request')->input('brand_id') ? '' : 'disabled'); ?>>
                                        <option value="">
                                            <?php echo e(__('Select Model')); ?>

                                        </option>
                                        <?php $__currentLoopData = $vehicleModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vehicleModel['id']); ?>"
                                                <?php echo e(app('request')->input('model_id') == $vehicleModel['id'] ? 'selected' : ''); ?>>
                                                <?php echo e($vehicleModel->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="category_id" class="selectpicker search-fields" tabindex="-98">
                                        <option value=""><?php echo e(__('Select Category')); ?></option>
                                        <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"
                                                <?php echo e(app('request')->input('category_id') == $category->id ? 'selected' : ''); ?>>
                                                <?php echo e($category->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="search-button btn"> <?php echo e(__('Search')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <!-- Option bar start -->
                    <div class="option-bar clearfix">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <div class="sorting-options2">
                                    <h5><?php echo __('We found :count cars available for you', [
                                        'count' => $products[$categorie_name]->count(),
                                    ]); ?></h5>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">

                        <?php if($products[$categorie_name]->count() > 0): ?>
                            <?php $__currentLoopData = $products[$categorie_name]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $product->name = $product->getName();
                                ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="car-box-3">
                                        <div class="car-thumbnail">
                                            <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                class="car-img">
                                                
                                                <div class="price-box">
                                                    
                                                    
                                                    <span><?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                        <?php echo e($product->getNetPrice()); ?></span>
                                                </div>
                                                <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                    <img class="d-block w-100" style="height:297px;object-fit:cover"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                        alt="<?php echo e($product->name); ?>">
                                                <?php else: ?>
                                                    <img class="d-block w-100" style="height:297px;object-fit:cover"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="<?php echo e($product->name); ?>">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="detail">
                                            <h1 class="title">
                                                <a
                                                    href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"><?php echo e($product->name); ?></a>
                                            </h1>
                                            <ul class="custom-list">
                                                <li>
                                                    <a
                                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"><?php echo e($product->product_category()); ?></a>
                                                </li>

                                            </ul>

                                        </div>
                                        <div class="footer clearfix">
                                            <div class="pull-left ratings">
                                                <ul class="facilities-list clearfix">
                                                    <li>
                                                        <i class="flaticon-fuel"></i>
                                                        <?php echo e(\App\Models\Product::getFuelTypeById($product->fuel_type_id)); ?>

                                                    </li>
                                                    <li>
                                                        <i class="flaticon-way"></i> <?php echo e($product->millage); ?>

                                                    </li>

                                                    <li>
                                                        <i class="flaticon-car"></i> <?php echo e($product->power); ?>

                                                    </li>
                                                    <li>
                                                        <i class="flaticon-gear"></i> <?php echo e($product->prev_owners); ?>

                                                    </li>
                                                    <li>
                                                        <i class="flaticon-calendar-1"></i> <?php echo e($product->register_year); ?>

                                                    </li>
                                                    <li>
                                                        <i class="flaticon-manual-transmission"></i>
                                                        <?php echo e(\App\Models\Utility::getVehicleTransmission($product->transmission_id)); ?>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="col-12 product-box">
                                <div class="card card-product">
                                    <h6 class="m-0 text-center no_record p-2"><i class="fas fa-ban"></i>
                                        <?php echo e(__('No Record Found')); ?></h6>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured car end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <?php echo $storethemesetting['storejs']; ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.'.$store->theme_dir.'', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme27/product.blade.php ENDPATH**/ ?>