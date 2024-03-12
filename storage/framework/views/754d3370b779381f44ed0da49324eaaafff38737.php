<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb style2 bgc-white bt1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title"><?php echo e(__('Products')); ?></h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Products')); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Listing Grid View -->
    <section class="our-listing pt0 bgc-white pb30-991">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="listing_sidebar">
                        <div class="sidebar_content_details style3">
                            <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
                            <div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
                                <div class="siderbar_widget_header">
                                    <h4 class="title mb0"><?php echo e(__('Search Filters')); ?><a class="filter_closed_btn float-end"
                                            href="#"><span class="fas fa-times"></span></a></h4>
                                </div>
                                <div class="sidebar_advanced_search_widget">
                                    <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                        id="frm-filter" method="get">
                                        <?php echo csrf_field(); ?>
                                        <ul class="sasw_list mb0">
                                            <li>
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <div class="dropdown bootstrap-select w100 show-tick">
                                                            <select tabindex="-98" name="vehicle_type_id" id="vehicle_type_id"
                                                            class="selectpicker w100 show-tick" data-toggle="select"
                                                            data-url="<?php echo e(route('product.get-vehicle-brands',[$store->slug])); ?>">
                                                            <option value=""><?php echo e(__('Select Vehicle Type')); ?></option>
                                                            <?php $__currentLoopData = $vehicleTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($vehicleType['id']); ?>"
                                                                    <?php echo e(app('request')->input('vehicle_type_id') == $vehicleType['id'] ? 'selected' : ''); ?>>
                                                                    <?php echo e($vehicleType->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <div class="dropdown bootstrap-select w100 show-tick">
                                                            <select tabindex="-98" name="brand_id" id="brand_id"
                                                                class="selectpicker w100 show-tick" data-toggle="select"
                                                                data-url="<?php echo e(route('product.get-models',[$store->slug])); ?>" <?php echo e(app('request')->input('brand_id')?'':'disabled'); ?>>
                                                                <option value=""><?php echo e(__('Select Make')); ?></option>
                                                                <?php $__currentLoopData = $vehicleBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleBrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($vehicleBrand['id']); ?>"
                                                                        <?php echo e(app('request')->input('brand_id') == $vehicleBrand['id'] ? 'selected' : ''); ?>>
                                                                        <?php echo e($vehicleBrand->name); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <div class="dropdown bootstrap-select w100 show-tick">
                                                            <select name="model_id" id="model_id"
                                                                class="selectpicker w100 show-tick" tabindex="-98" <?php echo e(app('request')->input('model_id')?'':'disabled'); ?>>
                                                                <option value=""><?php echo e(__('Select Model')); ?></option>
                                                                <?php $__currentLoopData = $vehicleModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($vehicleModel['id']); ?>"
                                                                        <?php echo e(app('request')->input('model_id') == $vehicleModel['id'] ? 'selected' : ''); ?>>
                                                                        <?php echo e($vehicleModel->name); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <div class="dropdown bootstrap-select w100 show-tick">
                                                            <select name="category_id"
                                                            class="selectpicker w100 show-tick" tabindex="-98">
                                                            <option value=""><?php echo e(__('Select Category')); ?></option>
                                                            <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($category->id); ?>" <?php echo e(app('request')->input('category_id') == $category->id ? 'selected' : ''); ?>>
                                                                    <?php echo e($category->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="search_option_button">
                                                    <button type="submit" class="btn btn-block btn-thm">
                                                        <span class="flaticon-magnifiying-glass mr10"></span>
                                                        <?php echo e(__('Search')); ?>

                                                    </button>
                                                </div>
                                            </li>
                                            <li class="text-center">
                                                <a class="reset-filter"
                                                    href="javascript:resetFilterForm();"><?php echo e(__('Reset')); ?></a>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-3 dn-md">
                    <div class="sidebar_widgets">
                        <div class="sidebar_widgets_wrapper">
                            <div class="sidebar_advanced_search_widget">

                                <h4 class="title"><?php echo e(__('Search Filters')); ?></h4>
                                <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                    id="frm-filter" method="get">
                                    <?php echo csrf_field(); ?>
                                    <ul class="sasw_list mb0">
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <div class="dropdown bootstrap-select w100 show-tick">
                                                        <select tabindex="-98" name="vehicle_type_id" id="vehicle_type_id2"
                                                            class="selectpicker w100 show-tick" data-toggle="select"
                                                            data-url="<?php echo e(route('product.get-vehicle-brands',[$store->slug])); ?>">
                                                            <option value=""><?php echo e(__('Select Vehicle Type')); ?></option>
                                                            <?php $__currentLoopData = $vehicleTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($vehicleType['id']); ?>"
                                                                    <?php echo e(app('request')->input('vehicle_type_id') == $vehicleType['id'] ? 'selected' : ''); ?>>
                                                                    <?php echo e($vehicleType->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <div class="dropdown bootstrap-select w100 show-tick">
                                                        <select tabindex="-98" name="brand_id" id="brand_id2"
                                                            class="selectpicker w100 show-tick" data-toggle="select"
                                                            data-url="<?php echo e(route('product.get-models',[$store->slug])); ?>" <?php echo e(app('request')->input('brand_id')?'':'disabled'); ?>>
                                                            <option value=""><?php echo e(__('Select Make')); ?></option>
                                                            <?php $__currentLoopData = $vehicleBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleBrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($vehicleBrand['id']); ?>"
                                                                    <?php echo e(app('request')->input('brand_id') == $vehicleBrand['id'] ? 'selected' : ''); ?>>
                                                                    <?php echo e($vehicleBrand->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <div class="dropdown bootstrap-select w100 show-tick">
                                                        <select name="model_id" id="model_id2"
                                                            class="selectpicker w100 show-tick" tabindex="-98" <?php echo e(app('request')->input('model_id')?'':'disabled'); ?>>
                                                            <option value=""><?php echo e(__('Select Model')); ?></option>
                                                            <?php $__currentLoopData = $vehicleModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($vehicleModel['id']); ?>"
                                                                    <?php echo e(app('request')->input('model_id') == $vehicleModel['id'] ? 'selected' : ''); ?>>
                                                                    <?php echo e($vehicleModel->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <div class="dropdown bootstrap-select w100 show-tick">
                                                        <select name="category_id"
                                                            class="selectpicker w100 show-tick" tabindex="-98">
                                                            <option value=""><?php echo e(__('Select Category')); ?></option>
                                                            <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($category->id); ?>" <?php echo e(app('request')->input('category_id') == $category->id ? 'selected' : ''); ?>>
                                                                    <?php echo e($category->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="search_option_button">
                                                <button type="submit" class="btn btn-block btn-thm">
                                                    <span class="flaticon-magnifiying-glass mr10"></span>
                                                    <?php echo e(__('Search')); ?>

                                                </button>
                                            </div>
                                        </li>
                                        <li class="text-center">
                                            <a class="reset-filter"
                                                href="javascript:resetFilterForm2();"><?php echo e(__('Reset')); ?></a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="listing_filter_row db-lg">
                            <div class="col-xl-5">
                                <div class="page_control_shorting left_area tac-lg mb30-767 mt15">
                                    <p><?php echo __('We found :count cars available for you', [
                                        'count' => '<span class="heading-color fw600">' . $products[$categorie_name]->count() . '</span>',
                                    ]); ?></p>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="page_control_shorting right_area text-end tac-lg">
                                    <ul>
                                        <li class="list-inline-item mb10-400">
                                            <a id="open2" class="filter_open_btn style2 dn db-md" href="#"><img
                                                    class="mr10"
                                                    src="<?php echo e(asset('assets/theme6/images/icon/filter-icon.svg')); ?>"
                                                    alt="filter-icon.svg"> Filters</a>
                                        </li>
                                        
                                        
                                    </ul>
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
                                <div class="col-sm-6 col-lg-4">
                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                        <div class="car-listing">
                                            <div class="thumb">
                                                <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                    <img class="img-fluid"
                                                        style="width:100%;height:167px;object-fit:cover"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                        alt="New collection">
                                                <?php else: ?>
                                                    <img class="img-fluid"
                                                        style="width:100%;height:167px;object-fit:cover"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="New collection">
                                                <?php endif; ?>
                                            </div>
                                            <div class="details">
                                                <div class="title mt-1"><?php echo e($product->name); ?></div>
                                                <div class="review">
                                                    <span class="td-gray"><?php echo e(__('Category')); ?>:</span>
                                                    <?php echo e($product->product_category()); ?>

                                                </div>
                                                <div class="si_footer">
                                                    <div class="price float-start">
                                                        <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
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
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <?php echo $storethemesetting['storejs']; ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme6_', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme6/product.blade.php ENDPATH**/ ?>