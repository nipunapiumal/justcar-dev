<?php $__env->startSection('page-title'); ?>
    <?php echo e($products->getName()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Start Banner section -->
    <div class="inner-page-banner pt-100">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <ul class="breadcrumb-list">
                    <li>
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li> <?php echo e($products->getName()); ?></li>
                </ul>
                <div class="banner-main-content-wrap">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                            <div class="banner-content style-2">
                                <div class="price-model-and-fav-area">
                                    <div class="price-and-model">
                                        <div class="price">
                                            <h3>
                                                <?php if($products->product_type == 1): ?>
                                                    <?php if($products->enable_product_variant == 'on'): ?>
                                                        <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                                    <?php else: ?>
                                                        <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                                    <?php endif; ?>
                                                    <?php if($products->last_price): ?>
                                                        <small>/
                                                            <del>
                                                                <?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?>

                                                            </del>
                                                        </small>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                                                    <?php if($products->net_price): ?>
                                                        <small>/
                                                            <del>
                                                                
                                                                <?php echo e(\App\Models\Utility::priceFormat($products->net_price)); ?>

                                                            </del>
                                                        </small>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </h3>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <h1><?php echo e($products->getName()); ?></h1>
                                <div class="location-and-notification">
                                    <ul>
                                        <li>
                                            <i class="fas fa-th-large"></i>
                                            <?php echo e($products->product_category()); ?>

                                        </li>
                                        
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner section -->


    <!-- Start Car-Details section -->
    <div class="car-details-area pt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example"
                        tabindex="0">
                        <div class="single-item mb-50" id="car-img">
                            <div class="car-img-area">
                                <div class="tab-content mb-30" id="myTab5Content">
                                    <div class="tab-pane fade show active" id="exterior" role="tabpanel"
                                        aria-labelledby="exterior-tab">
                                        <div class="product-img">
                                            
                                            <a href="#" class="fav">
                                                <svg width="14" height="13" viewBox="0 0 14 14"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.00012 2.40453L6.37273 1.75966C4.90006 0.245917 2.19972 0.76829 1.22495 2.67141C0.767306 3.56653 0.664053 4.8589 1.4997 6.50827C2.30473 8.09639 3.97953 9.99864 7.00012 12.0706C10.0207 9.99864 11.6946 8.09639 12.5005 6.50827C13.3362 4.85803 13.2338 3.56653 12.7753 2.67141C11.8005 0.76829 9.10019 0.245042 7.62752 1.75879L7.00012 2.40453ZM7.00012 13.125C-6.41666 4.25953 2.86912 -2.65995 6.84612 1.00016C6.89862 1.04829 6.95024 1.09816 7.00012 1.14979C7.04949 1.09821 7.10087 1.04859 7.15413 1.00104C11.1302 -2.6617 20.4169 4.25865 7.00012 13.125Z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <div class="slider-btn-group">
                                                <div class="product-stand-next swiper-arrow">
                                                    <svg width="8" height="13" viewBox="0 0 8 13"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z" />
                                                    </svg>
                                                </div>
                                                <div class="product-stand-prev swiper-arrow">
                                                    <svg width="8" height="13" viewBox="0 0 8 13"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="swiper product-img-slider">
                                                <div class="swiper-wrapper-1">
                                                    <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="swiper-slide">
                                                            <?php if(!empty($products_image[$key]->product_images)): ?>
                                                                <img class="img-fluid w-100"
                                                                    style="height:500px;object-fit:cover"
                                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images))); ?>"
                                                                    alt="">
                                                            <?php else: ?>
                                                                <img class="img-fluid w-100"
                                                                    style="height:500px;object-fit:cover"
                                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                                    alt="">
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($products->product_type == 2): ?>
                            <div class="single-item mb-50" id="car-info">
                                <div class="car-info">
                                    <div class="title mb-20">
                                        <h5><?php echo e(__('SPECIFICATION')); ?></h5>
                                    </div>
                                    <ul>
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($vehicle_brand->name); ?></h6>
                                                <span><?php echo e(__('Vehicle Brand')); ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($vehicle_model->name); ?></h6>
                                                <span><?php echo e(__('Vehicle Model')); ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($products->vehicle_number); ?></h6>
                                                <span><?php echo e(__('Vehicle Number')); ?></span>
                                            </div>
                                        </li>
                                        <?php if($products->fin_number_display && $products->fin_number): ?>
                                            <li>
                                                
                                                <div class="content">
                                                    <h6><?php echo e($products->fin_number); ?></h6>
                                                    <span><?php echo e(__('Fin Number')); ?></span>
                                                </div>
                                            </li>
                                        <?php endif; ?>


                                    </ul>
                                    <ul class="mt-4">
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($products->register_year); ?></h6>
                                                <span><?php echo e(__('First Register Year')); ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($products->register_month); ?></h6>
                                                <span><?php echo e(__('First Register Month')); ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($products->millage); ?></h6>
                                                <span><?php echo e(__('Millage (km)')); ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($fuel_type->name); ?></h6>
                                                <span><?php echo e(__('Fuel Type')); ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="mt-4">
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($products->power); ?></h6>
                                                <span><?php echo e(__('Power')); ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($products->exterior_color); ?></h6>
                                                <span><?php echo e(__('Exterior Color')); ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($products->is_metallic); ?></h6>
                                                <span><?php echo e(__('Metallic')); ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            
                                            <div class="content">
                                                <h6><?php echo e($products->interior_color); ?></h6>
                                                <span><?php echo e(__('Interior Color')); ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($products->product_type == 1): ?>
                            <?php if(!empty($products->specification)): ?>
                                <!-- Description start -->
                                <div class="single-item mb-50" id="kye-features">
                                    <div class="kye-features">
                                        <div class="title mb-20 text-capitalize">
                                            <h5><?php echo e(__('Product Specification')); ?></h5>
                                        </div>
                                        <?php echo $products->specification; ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($products->detail)): ?>
                                <!-- Description start -->
                                <div class="single-item mb-50" id="kye-features">
                                    <div class="kye-features">
                                        <div class="title mb-20 text-capitalize">
                                            <h5><?php echo e(__('Details')); ?></h5>
                                        </div>
                                        <?php echo $products->detail; ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(!empty($products->description)): ?>
                                <!-- Description start -->
                                <div class="single-item mb-50" id="kye-features">
                                    <div class="kye-features">
                                        <div class="title mb-20 text-capitalize">
                                            <h5><?php echo e(__('Description')); ?></h5>
                                        </div>
                                        <?php echo $products->description; ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Features info start -->
                            <div class="single-item mb-50" id="kye-features">
                                <div class="kye-features">
                                    <div class="title mb-20">
                                        <h5><?php echo e(__('Features')); ?></h5>
                                    </div>
                                    <ul>
                                        <?php $__currentLoopData = json_decode($products->equipments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_equipment => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    viewBox="0 0 12 12">
                                                    <path
                                                        d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z" />
                                                    <path
                                                        d="M8.22751 3.72747C8.22217 3.73264 8.21716 3.73816 8.21251 3.74397L5.60776 7.06272L4.03801 5.49222C3.93138 5.39286 3.79034 5.33876 3.64462 5.34134C3.49889 5.34391 3.35985 5.40294 3.25679 5.506C3.15373 5.60906 3.0947 5.7481 3.09213 5.89382C3.08956 6.03955 3.14365 6.18059 3.24301 6.28722L5.22751 8.27247C5.28097 8.32583 5.34463 8.36788 5.4147 8.39611C5.48476 8.42433 5.5598 8.43816 5.63532 8.43676C5.71084 8.43536 5.78531 8.41876 5.85428 8.38796C5.92325 8.35716 5.98531 8.31278 6.03676 8.25747L9.03076 4.51497C9.13271 4.40796 9.18845 4.26514 9.18593 4.11737C9.18341 3.9696 9.12284 3.82875 9.0173 3.72529C8.91177 3.62182 8.76975 3.56405 8.62196 3.56446C8.47417 3.56486 8.33247 3.62342 8.22751 3.72747Z" />
                                                </svg> <?php echo e($equipment); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>

                            <!-- Features info start -->
                            <div class="single-item mb-50" id="kye-features">
                                <div class="kye-features">
                                    <div class="title mb-20">
                                        <h5><?php echo e(__('Interior Design')); ?></h5>
                                    </div>
                                    <ul>
                                        <?php $__currentLoopData = json_decode($products->interior_design); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_interior_design => $interior_design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    viewBox="0 0 12 12">
                                                    <path
                                                        d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z" />
                                                    <path
                                                        d="M8.22751 3.72747C8.22217 3.73264 8.21716 3.73816 8.21251 3.74397L5.60776 7.06272L4.03801 5.49222C3.93138 5.39286 3.79034 5.33876 3.64462 5.34134C3.49889 5.34391 3.35985 5.40294 3.25679 5.506C3.15373 5.60906 3.0947 5.7481 3.09213 5.89382C3.08956 6.03955 3.14365 6.18059 3.24301 6.28722L5.22751 8.27247C5.28097 8.32583 5.34463 8.36788 5.4147 8.39611C5.48476 8.42433 5.5598 8.43816 5.63532 8.43676C5.71084 8.43536 5.78531 8.41876 5.85428 8.38796C5.92325 8.35716 5.98531 8.31278 6.03676 8.25747L9.03076 4.51497C9.13271 4.40796 9.18845 4.26514 9.18593 4.11737C9.18341 3.9696 9.12284 3.82875 9.0173 3.72529C8.91177 3.62182 8.76975 3.56405 8.62196 3.56446C8.47417 3.56486 8.33247 3.62342 8.22751 3.72747Z" />
                                                </svg> <?php echo e($interior_design); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>



                    </div>
                    <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                </div>
                <div class="col-lg-4">
                    <div class="car-details-sidebar">
                        <div class="contact-info mb-50">
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
                                <div class="single-contact">
                                    <a class="<?php echo e($btn_class); ?>" <?php echo e($btn_class); ?>

                                        data-url="<?php echo e(route('store.addtowishlist', [$store->slug, $products->id])); ?>"
                                        data-csrf="<?php echo e(csrf_token()); ?>">
                                        <i class="<?php echo e($icon_class); ?> fa-heart"></i>
                                        <?php echo e(__('Save')); ?>

                                    </a>
                                </div>
                                <div class="single-contact">
                                    <a class="add_to_cart"
                                        data-url="<?php echo e(route('user.addToCart', [$products->id, $store->slug, 'variation_id'])); ?>"
                                        data-csrf="<?php echo e(csrf_token()); ?>"><i class="fas fa-shopping-basket"></i>
                                        <?php echo e(__('Add to cart')); ?></a>
                                </div>
                            <?php endif; ?>

                            <?php echo \App\Models\Advertisement::getAdvertisement($store, 2); ?>


                        </div>
                        <div class="inquiry-form mb-40">
                            <div class="title">
                                <h4><?php echo e(__('To More inquiry')); ?></h4>
                                <p><?php echo e(__("we'll be in touch shortly")); ?></p>
                            </div>
                            <?php echo Form::open(
                                ['route' => ['store.store-contact', $store->slug], 'class' => 'contact_form'],
                                ['method' => 'POST'],
                            ); ?>

                            <input type="hidden" name="product_id" value="<?php echo e($products->id); ?>">
                            <div class="form-inner mb-20">
                                <label><?php echo e(__('Last Name')); ?>*</label>
                                <input type="text" name="last_name" placeholder="<?php echo e(__('Last Name')); ?>*">

                            </div>
                            <div class="form-inner mb-20">
                                <label><?php echo e(__('Email')); ?></label>
                                <input type="email" name="email" placeholder="<?php echo e(__('Email')); ?>*">
                            </div>
                            <div class="form-inner mb-20">
                                <label><?php echo e(__('Phone No')); ?></label>
                                <input type="text" name="phone" placeholder="<?php echo e(__('Phone No')); ?>*">
                            </div>
                            <div class="form-inner mb-20">
                                <label><?php echo e(__('Subject')); ?></label>
                                <input type="text" name="subject" placeholder="<?php echo e(__('Subject')); ?>*">
                            </div>
                            <div class="form-inner mb-20">
                                <label><?php echo e(__('Message')); ?>*</label>
                                <textarea name="message" rows="6" maxlength="1000" placeholder="<?php echo e(__('Message')); ?>*"></textarea>
                            </div>
                            <div class="form-inner">
                                <button class="primary-btn3" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 14 14">
                                        <path
                                            d="M13.8697 0.129409C13.9314 0.191213 13.9736 0.269783 13.991 0.355362C14.0085 0.44094 14.0004 0.529754 13.9678 0.610771L8.78063 13.5781C8.73492 13.6923 8.65859 13.7917 8.56003 13.8653C8.46148 13.9389 8.34453 13.9839 8.22206 13.9954C8.09958 14.0068 7.97633 13.9842 7.86586 13.9301C7.75539 13.876 7.66199 13.7924 7.59594 13.6887L4.76304 9.23607L0.310438 6.40316C0.206426 6.33718 0.122663 6.24375 0.0683925 6.13318C0.0141218 6.02261 -0.00854707 5.89919 0.00288719 5.77655C0.0143215 5.65391 0.0594144 5.53681 0.13319 5.43817C0.206966 5.33954 0.306557 5.2632 0.420973 5.21759L13.3883 0.0322452C13.4694 -0.000369522 13.5582 -0.00846329 13.6437 0.00896931C13.7293 0.0264019 13.8079 0.0685926 13.8697 0.1303V0.129409ZM5.65267 8.97578L8.11385 12.8427L12.3329 2.29554L5.65267 8.97578ZM11.7027 1.66531L1.1555 5.88436L5.02333 8.34466L11.7027 1.66531Z" />
                                    </svg> <?php echo e(__('Get In Touch')); ?>

                                </button>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme30', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme30/view.blade.php ENDPATH**/ ?>