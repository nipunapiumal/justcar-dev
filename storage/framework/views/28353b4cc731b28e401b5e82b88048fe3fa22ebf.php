<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Slider Area Start -->
    <?php if(isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on'): ?>
        <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs nav-style-1 nav-arrows-thin nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0"
            data-plugin-options="{'autoplay': true, 'autoplayTimeout': 700000}" style="height: 800px;">
            <div class="owl-stage-outer">
                <div class="owl-stage">

                    <?php $i=0; ?>
                    <?php $__currentLoopData = json_decode($storethemesetting['slider_settings']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Carousel Slide 1 -->
                        <div class="owl-item position-relative overflow-hidden">
                            <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0"
                                data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s"
                                data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show
                                style="background-image: url('<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png')))); ?>'); background-size: cover; background-position: center;">
                            </div>
                            <div class="container-fluid h-100 px-lg-5 mx-lg-5 pb-5">
                                <div class="row h-100 p-relative z-index-1 gx-5 pb-5">
                                    <div class="col">
                                        <div class="p-absolute top-50pct appear-animation"
                                            data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100"
                                            data-plugin-options="{'minWindowWidth': 0}">
                                            <h3
                                                class="text-color-light rotate-r-90 font-weight-bold ls-0 p-relative left-0 custom-font-size-1 pe-5 ws-nowrap">
                                                <?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                                            </h3>
                                        </div>
                                        <div class="p-absolute top-50pct appear-animation"
                                            data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="300"
                                            data-plugin-options="{'minWindowWidth': 0}">
                                            <h3
                                                class="custom-stroke-text-effect-1 color-transparent rotate-r-90 font-weight-bold ls-0 p-relative custom-text-pos-1 custom-font-size-1 pe-5 ws-nowrap">
                                                <?php echo e(!empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories'); ?>

                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Carousel Slide 2 -->
                        
                        <?php $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






                </div>
            </div>
            <div class="owl-nav">
                <button type="button" role="presentation" class="owl-prev"></button>
                <button type="button" role="presentation" class="owl-next"></button>
            </div>
        </div>
    <?php else: ?>
        <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs nav-style-1 nav-arrows-thin nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0"
            data-plugin-options="{'autoplay': true, 'autoplayTimeout': 700000}" style="height: 800px;">
            <div class="owl-stage-outer">
                <div class="owl-stage">

                    <!-- Carousel Slide 1 -->
                    <div class="owl-item position-relative overflow-hidden">
                        <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0"
                            data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s"
                            data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show
                            style="background-image: url('<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png')))); ?>'); background-size: cover; background-position: center;">
                        </div>
                        <div class="container-fluid h-100 px-lg-5 mx-lg-5 pb-5">
                            <div class="row h-100 p-relative z-index-1 gx-5 pb-5">
                                <div class="col">
                                    <div class="p-absolute top-50pct appear-animation"
                                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100"
                                        data-plugin-options="{'minWindowWidth': 0}">
                                        <h3
                                            class="text-color-light rotate-r-90 font-weight-bold ls-0 p-relative left-0 custom-font-size-1 pe-5 ws-nowrap">
                                            <?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                                        </h3>
                                    </div>
                                    <div class="p-absolute top-50pct appear-animation"
                                        data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="300"
                                        data-plugin-options="{'minWindowWidth': 0}">
                                        <h3
                                            class="custom-stroke-text-effect-1 color-transparent rotate-r-90 font-weight-bold ls-0 p-relative custom-text-pos-1 custom-font-size-1 pe-5 ws-nowrap">
                                            <?php echo e(!empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories'); ?>

                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <div class="container-fluid p-0 mx-0 custom-carousel-1-wrapper">
            <div class="row gx-0">
                <div class="col-lg-4">
                    <div class="custom-carouse-1-title bg-tertiary p-2 mt-5">
                        <h4 class="text-color-light text-6 font-weight-semi-bold d-block text-center text-lg-end p-3 m-0">
                            <span class="d-block me-lg-5 pe-lg-4 p-relative bottom-2"><span
                                    class="d-inline-block appear-animation" data-appear-animation="fadeInUpShorterPlus"
                                    data-appear-animation-delay="0"><?php echo e(__('Why Choose Us?')); ?></span></span>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="carousel-half-full-width-wrapper carousel-half-full-width-right custom-carousel-1">
                        <div class="owl-carousel owl-theme carousel-half-full-width-right nav-bottom nav-bottom-align-left nav-style-1 nav-light nav-arrows-thin nav-font-size-lg mb-0"
                            data-plugin-options="{'responsive': {'0': {'items': 1,  'autoplay': true, 'autoplayTimeout': 3000}, '768': {'items': 1,  'autoplay': true, 'autoplayTimeout': 3000}, '992': {'items': 2}, '1200': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 0}">
                            <?php if(isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on'): ?>
                                <?php if(isset($storethemesetting['features_icon1'])): ?>
                                    <div class="anim-hover-translate-top-10px transition-3ms">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="d-flex flex-row">
                                                    <div class="pt-2 text-color-primary" style="font-size: 30px">
                                                        <?php echo $storethemesetting['features_icon1']; ?>

                                                    </div>
                                                    <div class="ps-4">
                                                        <h4 class="mb-2 text-5 font-weight-semi-bold">
                                                            <?php echo e($storethemesetting['features_title1']); ?></h4>
                                                        <p class="mb-2 font-weight-medium text-3">
                                                            <?php echo e($storethemesetting['features_description1']); ?>

                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on'): ?>
                                <?php if(isset($storethemesetting['features_icon2'])): ?>
                                    <div class="anim-hover-translate-top-10px transition-3ms">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="d-flex flex-row">
                                                    <div class="pt-2 text-color-primary" style="font-size: 30px">
                                                        <?php echo $storethemesetting['features_icon2']; ?>

                                                    </div>
                                                    <div class="ps-4">
                                                        <h4 class="mb-2 text-5 font-weight-semi-bold">
                                                            <?php echo e($storethemesetting['features_title2']); ?></h4>
                                                        <p class="mb-2 font-weight-medium text-3">
                                                            <?php echo e($storethemesetting['features_description2']); ?>

                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on'): ?>
                                <?php if(isset($storethemesetting['features_icon3'])): ?>
                                    <div class="anim-hover-translate-top-10px transition-3ms">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="d-flex flex-row">
                                                    <div class="pt-2 text-color-primary" style="font-size: 30px">
                                                        <?php echo $storethemesetting['features_icon3']; ?>

                                                    </div>
                                                    <div class="ps-4">
                                                        <h4 class="mb-2 text-5 font-weight-semi-bold">
                                                            <?php echo e($storethemesetting['features_title3']); ?></h4>
                                                        <p class="mb-2 font-weight-medium text-3">
                                                            <?php echo e($storethemesetting['features_description3']); ?>

                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on'): ?>
                                <?php if(isset($storethemesetting['features_icon2'])): ?>
                                    <div class="anim-hover-translate-top-10px transition-3ms">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="d-flex flex-row">
                                                    <div class="pt-2 text-color-primary" style="font-size: 30px">
                                                        <?php echo $storethemesetting['features_icon2']; ?>

                                                    </div>
                                                    <div class="ps-4">
                                                        <h4 class="mb-2 text-5 font-weight-semi-bold">
                                                            <?php echo e($storethemesetting['features_title2']); ?></h4>
                                                        <p class="mb-2 font-weight-medium text-3">
                                                            <?php echo e($storethemesetting['features_description2']); ?>

                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    

    <!-- Feature Products Area Start -->
    <?php if($products['Start shopping']->count() > 0): ?>
        <section class="border-0 custom-bg-color-grey-1" style="margin-top: 200px">
            <div class="container py-5">
                <div class="row pb-3">
                    <div class="col pb-5 mb-3">

                        <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0 custom-el-pos-1"
                            data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">

                            <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $product->name = $product->getName();
                                ?>

                                <div>
                                    <span class="thumb-info thumb-info-swap-content anim-hover-inner-wrapper">
                                        <span
                                            class="thumb-info-wrapper overlay overlay-show overlay-gradient-bottom-content">
                                            <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                <img style="width: 359px;height:359px;object-fit:cover"
                                                    src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                    class="img-fluid" alt="">
                                            <?php else: ?>
                                            <?php endif; ?>

                                            <span
                                                class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0 text-center">
                                                <span class="thumb-info-swap-content-wrapper">
                                                    <span class="thumb-info-inner text-3-5 pb-2">
                                                        <?php echo e($product->name); ?>

                                                    </span>
                                                    <span class="thumb-info-inner text-2">
                                                        <p
                                                            class="px-5 text-2 opacity-7 font-weight-medium text-light ls-0">
                                                            <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                        </p>
                                                        <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                            class="btn border-0 px-3 py-1 line-height-8 btn-primary ls-0">
                                                            <?php echo e(__('More')); ?></a>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Feature Products Area End -->

    <!-- Feature Products Area Start -->
    <?php if(
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0): ?>
        <section class="border-0 custom-bg-color-grey-1">
            <div class="container py-5">
                <div class="row pt-5">
                    <div class="col">
                        <h2 class="custom-heading-1"><span class="d-inline-block appear-animation"
                                data-appear-animation="fadeInUpShorterPlus"
                                data-appear-animation-delay="0"><?php echo e(__('Products')); ?></span>
                        </h2>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col pb-5 mb-3">
                        <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                            data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">

                            <?php $__currentLoopData = $products_type1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <span class="thumb-info thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span
                                        class="thumb-info-wrapper overlay overlay-show overlay-gradient-bottom-content">
                                        <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                            <img style="width: 359px;height:359px;object-fit:cover"
                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                class="img-fluid" alt="">
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <span
                                            class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0 text-center">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-3-5 pb-2">
                                                    <?php echo e($product->name); ?>

                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p
                                                        class="px-5 text-2 opacity-7 font-weight-medium text-light ls-0">
                                                        <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                    </p>
                                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                        class="btn border-0 px-3 py-1 line-height-8 btn-primary ls-0">
                                                        <?php echo e(__('More')); ?></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        
        
        
        
       
    <?php endif; ?>
    <!-- Feature Products Area End -->


    <!-- Testimonials (v1) -->
    <?php if(isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on'): ?>
        <section class="border-0 text-center custom-el-pos-2">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <h2 class="custom-heading-1"><span class="d-inline-block appear-animation"
                                data-appear-animation="fadeInUpShorterPlus"
                                data-appear-animation-delay="0"><?php echo e(!empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials'); ?></span>
                        </h2>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <div class="pb-3">
                            <img width="68"
                                src="<?php echo e(asset('assets/themePlus1/img/demos/transportation-logistic/icons/quote.svg')); ?>"
                                alt="" data-icon
                                data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-tertiary'}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                            data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 1}, '979': {'items': 1}, '1199': {'items': 1}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">
                            <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                                <div>
                                    
                                    <div class="testimonial testimonial-style-5 px-lg-5 mx-lg-5">
                                        <blockquote>
                                            <p class="mb-0 line-height-8 font-weight-medium text-4">
                                                <?php echo e($storethemesetting['testimonial_description1']); ?>

                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author border-0">
                                            <p><strong
                                                    class="font-weight-extra-bold pt-2"><?php echo e($storethemesetting['testimonial_name1']); ?></strong><span>
                                                    <?php echo e($storethemesetting['testimonial_about_us1']); ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on'): ?>
                                <div>
                                    
                                    <div class="testimonial testimonial-style-5 px-lg-5 mx-lg-5">
                                        <blockquote>
                                            <p class="mb-0 line-height-8 font-weight-medium text-4">
                                                <?php echo e($storethemesetting['testimonial_description2']); ?>

                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author border-0">
                                            <p><strong
                                                    class="font-weight-extra-bold pt-2"><?php echo e($storethemesetting['testimonial_name2']); ?></strong><span>
                                                    <?php echo e($storethemesetting['testimonial_about_us2']); ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on'): ?>
                                <div>
                                    
                                    <div class="testimonial testimonial-style-5 px-lg-5 mx-lg-5">
                                        <blockquote>
                                            <p class="mb-0 line-height-8 font-weight-medium text-4">
                                                <?php echo e($storethemesetting['testimonial_description3']); ?>

                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author border-0">
                                            <p><strong
                                                    class="font-weight-extra-bold pt-2"><?php echo e($storethemesetting['testimonial_name3']); ?></strong><span>
                                                    <?php echo e($storethemesetting['testimonial_about_us3']); ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>



    <!-- Products categories-->
    <?php if(isset($storethemesetting['enable_categories']) &&
            $storethemesetting['enable_categories'] == 'on' &&
            !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_categories'] == 'on'): ?>
            <section class="border-0 custom-bg-color-grey-1">
                <div class="container py-5">
                    <div class="row pt-5">
                        <div class="col">
                            <h2 class="custom-heading-1"><span class="d-inline-block appear-animation"
                                    data-appear-animation="fadeInUpShorterPlus"
                                    data-appear-animation-delay="0"><?php echo e(!empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories'); ?></span>
                            </h2>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col pb-5 mb-3">
                            <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                                data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">

                                <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($product_count[$key] > 0): ?>
                                        <div>
                                            <span class="thumb-info thumb-info-swap-content anim-hover-inner-wrapper">
                                                <span
                                                    class="thumb-info-wrapper overlay overlay-show overlay-gradient-bottom-content">
                                                    <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img)): ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img))); ?>"
                                                            class="img-fluid"
                                                            style="width: 359px;height:359px;object-fit:cover">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                            class="img-fluid"
                                                            style="width: 359px;height:359px;object-fit:cover">
                                                    <?php endif; ?>

                                                    <span
                                                        class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0 text-center">
                                                        <span class="thumb-info-swap-content-wrapper">
                                                            <span class="thumb-info-inner text-3-5 pb-2">
                                                                <?php echo e($pro_categorie->name); ?>

                                                            </span>
                                                            <span class="thumb-info-inner text-2">
                                                                <p
                                                                    class="px-5 text-2 opacity-7 font-weight-medium text-light ls-0">
                                                                    <?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?>

                                                                    <?php echo e(__('Products')); ?>

                                                                </p>
                                                                <a href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>"
                                                                    class="btn border-0 px-3 py-1 line-height-8 btn-primary ls-0">
                                                                    <?php echo e(__('Show more products')); ?></a>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>



    <!-- Gallery-->
    <?php if(isset($storethemesetting['enable_gallery']) &&
            $storethemesetting['enable_gallery'] == 'on' &&
            !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_gallery'] == 'on'): ?>
            <section class="border-0">
                <div class="container py-5">
                    <div class="row pt-5">
                        <div class="col">
                            <h2 class="custom-heading-1"><span class="d-inline-block appear-animation"
                                    data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="0">
                                    <?php echo e(!empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery')); ?></span>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pb-5">
                            <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                                data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">

                                <?php $i=0; ?>
                                <?php $__currentLoopData = $gallery_categories_; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <span class="thumb-info thumb-info-swap-content anim-hover-inner-wrapper">
                                            <span
                                                class="thumb-info-wrapper overlay overlay-show overlay-gradient-bottom-content">
                                                <?php if(!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img)): ?>
                                                    <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $items->categorie_img))); ?>"
                                                        alt="" style="width: 359px;height:359px;object-fit:cover">
                                                <?php else: ?>
                                                    <img class="img-fluid"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        alt="" style="width: 359px;height:359px;object-fit:cover">
                                                <?php endif; ?>

                                                <span
                                                    class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0 text-center">
                                                    <span class="thumb-info-swap-content-wrapper">
                                                        <span class="thumb-info-inner text-3-5 pb-2">
                                                            <?php echo e($items->name); ?>

                                                        </span>
                                                        <span class="thumb-info-inner text-2">
                                                            <p
                                                                class="px-5 text-2 opacity-7 font-weight-medium text-light ls-0">
                                                                <?php echo e($items->name); ?>

                                                            </p>
                                                            <a href="<?php echo e(route('store.gallery', [$store->slug, $items->id])); ?>"
                                                                class="btn border-0 px-3 py-1 line-height-8 btn-primary ls-0">
                                                                <?php echo e(__('More')); ?></a>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>


    <!-- Client Logo -->
    <?php if(isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on'): ?>
        <section class="section border-0 bg-light m-0 p-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                            data-plugin-options="{'responsive': {'0': {'items': 3}, '479': {'items': 3}, '768': {'items': 4}, '979': {'items': 4}, '1199': {'items': 6}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 40}">
                            <?php if(!empty($storethemesetting['brand_logo'])): ?>
                                <?php $__currentLoopData = explode(',', $storethemesetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <?php if(!empty($value) && \Storage::exists('uploads/store_logo/' . $value)): ?>
                                            <img class="img-fluid"
                                                src="<?php echo e(asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png'))); ?>"
                                                alt="Footer logo">
                                        <?php else: ?>
                                            <img class="img-fluid"
                                                src="<?php echo e(asset(Storage::url('uploads/store_logo/brand_logo.png'))); ?>"
                                                alt="Footer logo">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    <?php endif; ?>







<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.themePlus1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/themePlus1/index.blade.php ENDPATH**/ ?>