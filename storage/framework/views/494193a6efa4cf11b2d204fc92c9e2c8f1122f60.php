<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Header_img -->
    <?php if($storethemesetting['enable_header_img'] == 'on'): ?>
        <div class="bd-example home-banner-slider">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-inner" role="listbox">
                    <div class="bg-cover bg-size--cover home-banner carousel-item active" data-offset-top="#header-main" style="background-image: url(<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['header_img'])?$storethemesetting['header_img']:'home-banner1.png')))); ?>); background-position: center center; padding-top: 77px;">
                        <div class="carousel-caption  d-md-block">
                            <div class="container py-6 box-height">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="h1 text-white store-title w-25"><?php echo e(!empty($storethemesetting['header_title'])?$storethemesetting['header_title']:'Home Accessories'); ?></h2>
                                        <p class="lead text-white mt-4 w-50"><?php echo e(!empty($storethemesetting['header_desc'])?$storethemesetting['header_desc']:'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.'); ?></p>
                                        <a href="#" class="btn btn-sm btn-primary btn-icon shadow hover-shadow-lg hover-translate-y-n3" id="pro_scroll">
                                            <span class="btn-inner--text t-secondary"><?php echo e(__(!empty($storethemesetting['button_text'])?$storethemesetting['button_text']:__('Show more products'))); ?></span>
                                            <span class="btn-inner--icon">
                                                <i class="fas fa-shopping-basket"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row banner-social">
                                    <ul>
                                        <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>" target="_blank">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['facebook'])): ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e($storethemesetting['facebook']); ?>" target="_blank">
                                                    <i class="fab fa-facebook-square"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['twitter'])): ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e($storethemesetting['twitter']); ?>" target="_blank">
                                                    <i class="fab fa-twitter-square"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['email'])): ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="mailto:<?php echo e($storethemesetting['email']); ?>">
                                                    <i class="far fa-envelope"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['instagram'])): ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e($storethemesetting['instagram']); ?>" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['youtube'])): ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e($storethemesetting['youtube']); ?>" target="_blank">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Products -->
    <?php if($products['Start shopping']->count() > 0): ?>
        <section class="bestsellers-section <?php echo e(($storethemesetting['enable_header_img'] == 'off')?'mt-10':''); ?>" id="pro_items">
            <div class="container">
                <div class="row">
                    <div class="pr-title mb-4">
                        <div class="p-tablist">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a href="#<?php echo preg_replace('/[^A-Za-z0-9\-]/','_',$category); ?>" data-id="<?php echo e($key); ?>" class="nav-link <?php echo e(($key==0)?'active':''); ?> productTab" id="electronic-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="false">
                                            <?php echo e(__($category)); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content bestsellers-tabs" id="myTabContent">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e(($key=="Start shopping")?'active show':''); ?>" id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="shopping-tab">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php if($items->count() > 0): ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                                                    <div class="card card-product">
                                                        <div class="card-image">
                                                            <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                                <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$product->is_cover)): ?>
                                                                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/'.$product->is_cover))); ?>" class="img-center img-fluid" style="height:275px; width:255px;">
                                                                <?php else: ?>
                                                                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid" style="height:275px; width:255px;">
                                                                <?php endif; ?>
                                                            </a>
                                                        </div>
                                                        <div class="card-body mt-3">
                                                            <h6><a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>" class="t-black13"><?php echo e($product->name); ?></a></h6>
                                                            <span class="static-rating static-rating-sm">
                                                              <?php if($store->enable_rating == 'on'): ?>
                                                                    <?php for($i =1;$i<=5;$i++): ?>
                                                                        <?php
                                                                            $icon = 'fa-star';
                                                                            $color = '';
                                                                            $newVal1 = ($i-0.5);
                                                                            if($product->product_rating() < $i && $product->product_rating() >= $newVal1)
                                                                            {
                                                                                $icon = 'fa-star-half-alt';
                                                                            }
                                                                            if($product->product_rating() >= $newVal1)
                                                                            {
                                                                                $color = 'text-warning';
                                                                            }
                                                                        ?>
                                                                        <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                                                    <?php endfor; ?>
                                                                <?php endif; ?>
                                                            </span>
                                                            <div class="product-price mt-3 mb-3">
                                                                <span class="card-price t-black15">
                                                                    <?php if($product->enable_product_variant == 'on'): ?>
                                                                        <?php echo e(__('In variant')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                            </div>
                                                            <div class="product-buttons">
                                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>" class="btn btn-sm btn-primary rounded-pill btn-icon shadow hover-shadow-lg hover-translate-y-n3">
                                                                        <span class="btn-inner--text"><?php echo e(__('Add to cart')); ?></span>
                                                                        <span class="btn-inner--icon">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </span>
                                                                    </a>
                                                                <?php else: ?>
                                                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary rounded-pill btn-icon shadow hover-shadow-lg hover-translate-y-n3 add_to_cart" data-id="<?php echo e($product->id); ?>">
                                                                        <span class="btn-inner--text"><?php echo e(__('Add to cart')); ?></span>
                                                                        <span class="btn-inner--icon">
                                                                        <i class="fas fa-shopping-basket"></i>
                                                                    </span>
                                                                    </a>
                                                                <?php endif; ?>
                                                                <?php if(Auth::guard('customers')->check()): ?>
                                                                    <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                                        <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                            <button href="#" class="btn btn-sm bg-gray shadow  btn-icon hover-shadow-lg hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                                <span class="btn-inner--icon">
                                                                                    <i class="far fa-heart"></i>
                                                                                </span>
                                                                            </button>
                                                                        <?php else: ?>
                                                                            <button href="#" class="btn btn-sm bg-gray shadow  btn-icon hover-shadow-lg hover-translate-y-n3" data-id="<?php echo e($product->id); ?>" disabled>
                                                                                <span class="btn-inner--icon">
                                                                                    <i class="fas fa-heart"></i>
                                                                                </span>
                                                                            </button>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <button href="#" class="btn btn-sm bg-gray shadow  btn-icon hover-shadow-lg hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                            <span class="btn-inner--icon">
                                                                                <i class="far fa-heart"></i>
                                                                            </span>
                                                                        </button>
                                                                    <?php endif; ?>
                                                                <?php else: ?>

                                                                    <button href="#" class="btn btn-sm bg-gray shadow  btn-icon hover-shadow-lg hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                            <span class="btn-inner--icon">
                                                                                <i class="far fa-heart"></i>
                                                                            </span>
                                                                        </button>
                                                                <?php endif; ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Products categories-->
    <?php if(isset($storethemesetting['enable_categories']) && $storethemesetting['enable_categories'] == 'on' && !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_categories'] == 'on'): ?>
            <section class="top-product">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 cat-main-boxes">
                            <div class="categories-content">
                                <h2 class=" mt-4 store-title t-secondary"><?php echo e(!empty($storethemesetting['categories'])?$storethemesetting['categories']:'Categories'); ?></h2>
                                <p class="t-l-gray mt-3 mb-5 w-75 w-custom"><?php echo e(!empty($storethemesetting['categories_title'])?$storethemesetting['categories_title']:'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.'); ?></p>
                            </div>
                            <div class="cat-button">
                                <a href="<?php echo e(route('store.categorie.product',[$store->slug])); ?>" class="btn btn-sm btn-blue bg-gray btn-icon shadow hover-shadow-lg hover-translate-y-n3">
                                    <span class="btn-inner--text  t-white"><?php echo e(__('Show more products')); ?></span>
                                    <span class="btn-inner--icon">
                                    <i class="fas fa-shopping-basket"></i>
                                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product_count[$key] > 0): ?>
                                <div class="col-xl-4 col-lg-4 col-sm-6 product-box product-cat">
                                    <div class="card card-product">
                                        <div class="card-image">
                                            <a href="<?php echo e(route('store.categorie.product',[$store->slug,$pro_categorie->name])); ?>">
                                                <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/'.$pro_categorie->categorie_img)): ?>
                                                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/product_image/').$pro_categorie->categorie_img)); ?>" class="img-center img-fluid" style="height:335px; width:350px;">
                                                <?php else: ?>
                                                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>" class="img-center img-fluid" style="height:335px; width:350px;">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="product-price mt-3">
                                                <div class="p-title">
                                                    <h6><span class="card-price t-white"><?php echo e($pro_categorie->name); ?></span></h6>
                                                    <p class="mb-0 text-white"><?php echo e(__('Products')); ?>: <?php echo e(!empty($product_count[$key])?$product_count[$key]:'0'); ?></p>
                                                    <a href="<?php echo e(route('store.categorie.product',[$store->slug,$pro_categorie->name])); ?>" class="btn btn-sm btn-primary btn-icon shadow hover-shadow-lg hover-translate-y-n3">
                                                        <span class="btn-inner--text t-white"><?php echo e(__('Show more products')); ?></span>
                                                        <span class="btn-inner--icon">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Top Rated Products -->
    <?php if(count($topRatedProducts)>0): ?>
        <section class="top-product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class=" mt-4 store-title t-secondary"><?php echo e(__('Collections')); ?></h3>
                        <p class="t-l-gray"><?php echo e(__('There is only that moment and the incredible certainty that')); ?> <br> <?php echo e(__('everything under the sun has been written by one hand only')); ?>.</p>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $topRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $topRatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                            <div class="card card-product">
                                <div class="card-image">
                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$topRatedProduct->product_id])); ?>">
                                        <?php if(!empty($topRatedProduct->product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$topRatedProduct->product->is_cover)): ?>
                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/'.(!empty($topRatedProduct->product->is_cover)?$topRatedProduct->product->is_cover:'')))); ?>" class="img-center img-fluid" style="height:275px; width:255px;">
                                        <?php else: ?>
                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid" style="height:275px; width:255px;">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="product-price mt-3">
                                        <div class="p-title">
                                            <h6><span class="card-price t-black15"><?php echo e($topRatedProduct->product->product_category()); ?></span></h6>
                                        </div>
                                        <a href="<?php echo e(route('store.product.product_view',[$store->slug,$topRatedProduct->product_id])); ?>" type="button" class="action-item pcart-icon" data-toggle="tooltip" data-original-title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="actions card-product-actions">
                                    <button type="button" class="action-item p-new">
                                        <?php echo e(__('New')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- subscriber-->
    <?php if(isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber']=='on'): ?>
        <?php if($storethemesetting['enable_email_subscriber'] == 'on'): ?>
            <section class="your-time-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 left-img">
                            <h3 class="medium-store-title t-secondary mb-3"><?php echo e(!empty($storethemesetting['subscriber_title'])?$storethemesetting['subscriber_title']:'Always on time'); ?></h3>
                            <p class="mb-4"><?php echo e(!empty($storethemesetting['subscriber_sub_title'])?$storethemesetting['subscriber_sub_title']:'Subscription here'); ?></p>
                            <?php echo e(Form::open(array('route' => array('subscriptions.store_email', $store->id),'method' => 'POST'))); ?>

                            <div class="form-group mb-0 form-subscribe">
                                <div class="input-group input-group-lg input-group-merge">
                                    <?php echo e(Form::email('email',null,array('class'=>'form-control bg-white form-control-flush rounded-pill','aria-label'=>__('Enter your email address'),'placeholder'=>__('Enter Your Email Address')))); ?>

                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded-pill  btn-icon mr-sm-4 scroll-me" type="submit">
                                            <span class="btn-inner--text"><?php echo e(__('Subscribe')); ?></span>
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="right-img" style="background: url(<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['subscriber_img'])?$storethemesetting['subscriber_img']:'email_subscriber_2.png')))); ?>);">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Testimonials (v1) -->
    <?php if(isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial']=='on'): ?>
        <?php if($storethemesetting['enable_testimonial']): ?>
            <section class="slice testimonial-section ">
                <div class="container">
                    <div class="mb-5 text-center">
                        <h3 class=" mt-4 store-title t-secondary"><?php echo e(!empty($storethemesetting['testimonial_main_heading'])?$storethemesetting['testimonial_main_heading']:'Testimonials'); ?></h3>
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180 store-dcs t-l-gray"><?php echo e(!empty($storethemesetting['testimonial_main_heading_title'])?$storethemesetting['testimonial_main_heading_title']:'There is only that moment and the incredible certainty that everything
                                                   under the sun has been written by one hand only.'); ?></p>
                        </div>
                    </div>
                    <div class="row testimonial-slider">
                        <div class="col-lg-12">
                            <div class="swiper-js-container overflow-hidden">
                                <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0" data-swiper-sm-items="1" data-swiper-xl-items="1">
                                    <div class="swiper-wrapper">
                                        <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1']=='on'): ?>
                                            <div class="swiper-slide p-3">
                                                <div class="card bg-transparent">
                                                    <div class="card-body">
                                                        <p class="t-dcs t-gray"><?php echo e($storethemesetting['testimonial_description1']); ?></p>
                                                        <div class="d-flex align-items-center collection-qoute">
                                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['testimonial_img1'])?$storethemesetting['testimonial_img1']:'')))); ?>" class="avatar  rounded-circle">
                                                            <h5 class="t-author t-black14"><?php echo e($storethemesetting['testimonial_name1']); ?></h5>
                                                            <small class="d-block t-author-dcs"><?php echo e($storethemesetting['testimonial_about_us1']); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2']=='on'): ?>
                                            <div class="swiper-slide p-3">
                                                <div class="card bg-transparent">
                                                    <div class="card-body">
                                                        <p class="t-dcs t-gray"><?php echo e($storethemesetting['testimonial_description2']); ?></p>
                                                        <div class="d-flex align-items-center collection-qoute">
                                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['testimonial_img2'])?$storethemesetting['testimonial_img2']:'')))); ?>" class="avatar  rounded-circle">
                                                            <h5 class="t-author t-black14"><?php echo e($storethemesetting['testimonial_name2']); ?></h5>
                                                            <small class="d-block t-author-dcs"><?php echo e($storethemesetting['testimonial_about_us2']); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3']=='on'): ?>
                                            <div class="swiper-slide p-3">
                                                <div class="card bg-transparent">
                                                    <div class="card-body">
                                                        <p class="t-dcs t-gray"><?php echo e($storethemesetting['testimonial_description3']); ?></p>
                                                        <div class="d-flex align-items-center collection-qoute">
                                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['testimonial_img3'])?$storethemesetting['testimonial_img3']:'')))); ?>" class="avatar  rounded-circle">
                                                            <h5 class="t-author t-black14"><?php echo e($storethemesetting['testimonial_name3']); ?></h5>
                                                            <small class="d-block t-author-dcs"><?php echo e($storethemesetting['testimonial_about_us3']); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination w-100 mt-4 d-flex align-items-center justify-content-center">
                                </div>
                                <!-- navigation buttons -->
                                <div id="js-prev1" class="swiper-button-prev"></div>
                                <div id="js-next1" class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Features -->
    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <section class="store-promotions mt-70">
            <div class="container">
                <div class="row">
                    <?php if($storethemesetting['enable_features1'] == 'on'): ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-4">
                                <div class="icon text-primary">
                                    <?php echo $storethemesetting['features_icon1']; ?>

                                    <strong class="t-secondary"><?php echo e($storethemesetting['features_title1']); ?></strong>
                                </div>
                                <p class=" mt-2 mb-0 t-gray"><?php echo e($storethemesetting['features_description1']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($storethemesetting['enable_features2'] == 'on'): ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-4">
                                <div class="icon text-primary">
                                    <?php echo $storethemesetting['features_icon2']; ?>

                                    <strong class="t-secondary"><?php echo e($storethemesetting['features_title2']); ?></strong>
                                </div>
                                <p class=" mt-2 mb-0 t-gray"><?php echo e($storethemesetting['features_description2']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($storethemesetting['enable_features3'] == 'on'): ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-4">
                                <div class="icon text-primary">
                                    <?php echo $storethemesetting['features_icon3']; ?>

                                    <strong class="t-secondary"><?php echo e($storethemesetting['features_title3']); ?></strong>
                                </div>
                                <p class=" mt-2 mb-0 t-gray"><?php echo e($storethemesetting['features_description3']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Client Logo -->
    <?php if(isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo']=='on'): ?>
        <div class="client-logo">
            <div class="container">
                <div class="row">
                    <?php if(!empty($storethemesetting['brand_logo'])): ?>
                        <?php $__currentLoopData = explode(',',$storethemesetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <a href="#">
                                    <?php if(!empty($value) && \Storage::exists('uploads/store_logo/'.$value)): ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/').$value)); ?>" alt="Footer logo">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>" alt="Footer logo">
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(".add_to_cart").click(function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var variants = [];
            $(".variant-selection").each(function (index, element) {
                variants.push(element.value);
            });

            if (jQuery.inArray('', variants) != -1) {
                show_toastr('Error', "<?php echo e(__('Please select all option.')); ?>", 'error');
                return false;
            }
            var variation_ids = $('#variant_id').val();

            $.ajax({
                url: '<?php echo e(route('user.addToCart', ['__product_id',$store->slug,'variation_id'])); ?>'.replace('__product_id', id).replace('variation_id', variation_ids ?? 0),
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    variants: variants.join(' : '),
                },
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        $("#shoping_counts").html(response.item_count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (result) {
                    console.log('error');
                }
            });
        });

        $(document).on('click', '.add_to_wishlist', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('store.addtowishlist', [$store->slug,'__product_id'])); ?>'.replace('__product_id', id),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.message, 'success');
                        $('.wishlist_' + response.id).removeClass('add_to_wishlist');
                        $('.wishlist_' + response.id).html('<i class="fas fa-heart"></i>');
                        $('.wishlist_count').html(response.count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (result) {
                }
            });
        });

        $(".productTab").click(function (e) {
            e.preventDefault();
            $('.productTab').removeClass('active')

        });

    $("#pro_scroll").click(function () {
        $('html, body').animate({
            scrollTop: $("#pro_items").offset().top
        }, 1000);
    });


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme2/index.blade.php ENDPATH**/ ?>