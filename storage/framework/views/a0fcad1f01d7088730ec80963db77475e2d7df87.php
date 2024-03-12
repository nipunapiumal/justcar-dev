<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php

    ?>
    <!-- Agent Single Grid View -->
    <section class="our-agent-single pb90 mt70-992 pt30 bt1">
        <div class="container">
            <div class="row mb30">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        <ol class="breadcrumb float-start">
                            <li class="breadcrumb-item"><a
                                    href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Main site')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($products->name); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row mb30">
                <div class="col-lg-7 col-xl-8">
                    <div class="single_product_grid single_page1">
                        <div class="sps_content">
                            <div class="thumb">
                                <div class="single_product">
                                    <div class="single_item">
                                        <div class="thumb">
                                            
                                            <?php if(!empty($products->is_cover) && \Storage::exists('uploads/is_cover_image/' . $products->is_cover)): ?>
                                                <img alt="<?php echo e($products->name); ?>"
                                                    src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $products->is_cover))); ?>"
                                                    class="img-fluid">
                                            <?php else: ?>
                                                <img alt="Image placeholder"
                                                    src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                    class="img-fluid">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="row">
                        <?php $i=1; ?>
                        <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xxs-6 col-xs-3 col-sm-3 col-md-6 <?php echo e($i >= 7 ? 'd-none' : ''); ?>">
                                <div class="sp5_small_img mb25">
                                    <div class="thumb">
                                        <?php if(!empty($products_image[$key]->product_images)): ?>
                                            <a class="popup-img"
                                                href="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>">
                                                <img class="img-whp" style="width: 190px;height:150px;object-fit:cover"
                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>"
                                                    alt="">
                                            </a>
                                        <?php else: ?>
                                            <a class="popup-img"
                                                href="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>">
                                                <img class="img-whp" style="width: 190px;height:150px;object-fit:cover"
                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                    alt="">
                                            </a>
                                        <?php endif; ?>
                                        <?php if($i == 6): ?>
                                            <div class="overlay popup-img">
                                                <span class="flaticon-photo-camera"></span>
                                                <h5 class="title"><?php echo e(__('Show All Photo')); ?></h5>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </div>
                </div>
            </div>
            <div class="row mb30">
                <div class="col-lg-7 col-xl-8">
                    <div class="single_page_heading_content">
                        <div class="car_single_content_wrapper">
                            

                            <?php if($products->product_type == 1): ?>
                                <ul class="car_info mb20-md">
                                    <li class="list-inline-item"><a href="#"><?php echo e(__('Category')); ?> -
                                            <?php echo e($products->product_category()); ?></a></li>
                                    
                                    <li class="list-inline-item"><a href="javascript:void(0)">
                                            <i class="fa fa-star"></i>
                                            <?php echo e($avg_rating); ?> <?php echo e(__('Reviews')); ?></a></li>
                                </ul>
                                <h2 class="title">
                                    <?php echo e($products->name); ?>

                                </h2>
                            <?php else: ?>
                                <h2 class="title">
                                    <?php echo e($products->getVehicleBrand()); ?>

                                    <?php echo e($products->getVehicleModel()); ?>

                                </h2>
                                <p class="para"><?php echo e($products->getName()); ?></p>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="single_page_heading_content text-start text-lg-end">
                        <div class="share_content">
                            <ul>
                                <li class="list-inline-item">
                                    <?php echo $__env->make('partials.social-sharing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </li>
                                <?php if(isset($storethemesetting['contact_info_email']) && $storethemesetting['contact_info_email']): ?>
                                    <li class="list-inline-item">
                                        <a href="mailto:<?php echo e($storethemesetting['contact_info_email']); ?>">
                                            <span class="flaticon-email"></span>
                                            <?php echo e(__('Email')); ?>


                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li class="list-inline-item"><a href="javascript:window.print()"><span
                                            class="flaticon-printer"></span><?php echo e(__('Print')); ?></a></li>

                                <?php if($products->product_type == 1): ?>
                                    <?php if(Auth::guard('customers')->check()): ?>
                                        <?php if(!empty($wishlist) && isset($wishlist[$products->id]['product_id'])): ?>
                                            <?php if($wishlist[$products->id]['product_id'] != $products->id): ?>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)"
                                                        class="add_to_wishlist wishlist_<?php echo e($products->id); ?>"
                                                        data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $products->id])); ?>"
                                                        data-csrf="<?php echo e(csrf_token()); ?>">
                                                        <i class="far fa-heart"></i>
                                                        <?php echo e(__('Save')); ?>

                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="disabled">
                                                        <i class="fas fa-heart text-danger"></i>
                                                        <?php echo e(__('Save')); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)"
                                                    class="add_to_wishlist wishlist_<?php echo e($products->id); ?>"
                                                    data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $products->id])); ?>"
                                                    data-csrf="<?php echo e(csrf_token()); ?>">
                                                    <i class="far fa-heart"></i>
                                                    <?php echo e(__('Save')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)"
                                                class="add_to_wishlist wishlist_<?php echo e($products->id); ?>"
                                                data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $products->id])); ?>"
                                                data-csrf="<?php echo e(csrf_token()); ?>">
                                                <i class="far fa-heart"></i>
                                                <?php echo e(__('Save')); ?>

                                            </a>
                                        </li>

                                    <?php endif; ?>
                                <?php endif; ?>





                            </ul>
                        </div>
                        <div class="price_content">
                            <div class="price mt60 mb10 mt10-md">
                                <h3>

                                    <?php if($products->product_type == 1): ?>
                                        <small class="mr15">
                                            <del><?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?></del>
                                        </small>
                                        <?php if($products->enable_product_variant == 'on'): ?>
                                            <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                        <?php else: ?>
                                            <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if($products->net_price): ?>
                                            <small class="mr15">
                                                <del><?php echo e(__('Net')); ?>

                                                    <?php echo e(\App\Models\Utility::priceFormat($products->net_price)); ?></del>
                                            </small>
                                        <?php endif; ?>
                                        <?php echo e(__('Gross')); ?> <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                    <?php endif; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="listing_single_description mt30 bdr_none p0">
                                <h4 class="mb30"><?php echo e(__('DESCRIPTION')); ?> <span class="float-end body-color fz13">
                                        <?php if($products->product_type == 1): ?>
                                            <?php echo e($products->SKU); ?>

                                        <?php else: ?>
                                            <?php echo e($products->vehicle_number); ?>

                                        <?php endif; ?>
                                    </span>
                                </h4>
                                <p class="first-para">
                                    <?php echo $products->description; ?>

                                </p>
                                <p class="mt10 mb20">
                                    <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                                </p>
                            </div>
                        </div>
                        <?php if($products->product_type == 1): ?>
                            <div class="col-lg-12">
                                <div class="listing_single_description mt30 bdr_none p0 text-uppercase">
                                    <h4 class="mb30"><?php echo e(__('Product Specification')); ?>

                                    </h4>
                                    <p class="first-para">
                                        <?php echo $products->specification; ?>

                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="listing_single_description mt30 bdr_none p0">
                                    <h4 class="mb30"> <?php echo e(__('DETAILS')); ?>

                                    </h4>
                                    <p class="first-para">
                                        <?php echo $products->detail; ?>

                                    </p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-12">
                                <div class="user_profile_service bdr_none p0 mt30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="title"><?php echo e(__('Features')); ?></h4>
                                        </div>
                                        <div class="col-xl-6">
                                            <h5 class="subtitle"><?php echo e(__('Equipments')); ?></h5>
                                        </div>
                                        <div class="col-xl-6">
                                            <ul class="service_list">
                                                <?php $__currentLoopData = json_decode($products->equipments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_equipment => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($equipment); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <h5 class="subtitle"><?php echo e(__('Exterior Color')); ?></h5>
                                        </div>
                                        <div class="col-lg-6 col-xl-5">
                                            <ul class="service_list">
                                                <li class="d-flex align-items-center">
                                                    <span class="colorinput-color"
                                                        style="background:<?php echo e($products->exterior_color); ?>"></span>
                                                    &nbsp; <?php echo e($products->exterior_color); ?>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h5 class="subtitle"><?php echo e(__('Interior Design')); ?></h5>
                                        </div>
                                        <div class="col-xl-6">
                                            <ul class="service_list">
                                                <?php $__currentLoopData = json_decode($products->interior_design); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_interior_design => $interior_design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($interior_design); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h5 class="subtitle"><?php echo e(__('Interior Color')); ?></h5>
                                        </div>
                                        <div class="col-lg-6 col-xl-5">
                                            <ul class="service_list">
                                                <li class="d-flex align-items-center">
                                                    <span class="colorinput-color"
                                                        style="background:<?php echo e($products->interior_color); ?>"></span>
                                                    &nbsp; <?php echo e($products->interior_color); ?>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php if($products->youtube_video): ?>
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <h5 class="subtitle"><?php echo e(__('Youtube Video')); ?></h5>
                                            </div>
                                            <div class="col-lg-6 col-xl-5">
                                                <ul class="service_list">
                                                    <li class="d-flex align-items-center"><?php echo e($products->youtube_video); ?>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <?php if($products->product_type == 1): ?>
                        <div class="offer_btns">
                            <div class="text-end">
                                
                                <button class="btn ofr_btn2 btn-block mt0 mb20 add_to_cart"
                                    data-url="<?php echo e(route('user.addToCart', [$products->id, $store->slug, 'variation_id'])); ?>"
                                    data-csrf="<?php echo e(csrf_token()); ?>">
                                    <span class="fas fa-shopping-basket mr10 fz18 vam"></span>
                                    <?php echo e(__('Add to cart')); ?>

                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($products->product_type == 2): ?>
                        <div class="opening_hour_widgets p30 mb30">
                            <div class="wrapper">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('Vehicle Brand')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($vehicle_brand->name); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('Vehicle Model')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($vehicle_model->name); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('Vehicle Number')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($products->vehicle_number); ?></span>
                                    </li>
                                    <?php if($products->fin_number_display): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('Fin Number')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($products->fin_number); ?></span>
                                    </li>
                                    <?php endif; ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('First Register Year')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($products->register_year); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('First Register Month')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($products->register_month); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('Millage (km)')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($products->millage); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('Fuel Type')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($fuel_type->name); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('Previous Owners')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($products->prev_owners); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('Transmission')); ?></div>
                                        </div>
                                        <span
                                            class="schedule"><?php echo e(\App\Models\Utility::getVehicleTransmission($products->transmission_id)); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="day"><?php echo e(__('Power')); ?></div>
                                        </div>
                                        <span class="schedule"><?php echo e($products->power); ?>

                                            (<?php echo e($products->power_type); ?>)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="sidebar_seller_contact bgc-f9 p30">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img class="mr-3 author_img w60"
                                    src="<?php echo e(asset(Storage::url('uploads/profile/' . (!empty($owner->avatar) ? $owner->avatar : 'avatar.png')))); ?>"
                                    alt="author.png">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mt0 mb5 fz16 heading-color fw600"><?php echo e(__('Call Dealer')); ?></h5>
                                <p class="mb0 tdu">
                                    <span class="flaticon-phone-call pr5 vam"></span>
                                    <a
                                        href="tel:<?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : ''); ?>"><?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : ''); ?></a>
                                </p>
                            </div>
                        </div>
                        <h4 class="mb30 mt30">Contact Seller</h4>
                        <?php echo Form::open(
                            ['route' => ['store.store-contact', $store->slug], 'class' => 'contact_form'],
                            ['method' => 'POST'],
                        ); ?>

                        <input type="hidden" name="product_id" value="<?php echo e($products->id); ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="first_name"
                                        placeholder="<?php echo e(__('First Name')); ?>*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="last_name"
                                        placeholder="<?php echo e(__('Last Name')); ?>*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control email" type="email" name="email"
                                        placeholder="<?php echo e(__('Email')); ?>*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="phone"
                                        placeholder="<?php echo e(__('Phone No')); ?>*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form_control" type="text" name="subject"
                                        placeholder="<?php echo e(__('Subject')); ?>*">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea name="message" class="form-control" rows="6" maxlength="1000" placeholder="<?php echo e(__('Message')); ?>*"></textarea>
                                </div>
                                <button type="submit"
                                    class="btn btn-block btn-thm mt10 mb20"><?php echo e(__('Get In Touch')); ?></button>

                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme6/view.blade.php ENDPATH**/ ?>