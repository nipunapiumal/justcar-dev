<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gallery')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2><?php echo e(__('Gallery')); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75"><?php echo e(__('Gallery')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Shop-area start -->
    <div class="shop-area pt-100 pb-60">
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-4 col-xl-3">
                    <div class="widget-offcanvas offcanvas-lg offcanvas-start" tabindex="-1" id="widgetOffcanvas"
                        aria-labelledby="widgetOffcanvas">

                        <div class="offcanvas-body p-3 p-lg-0">
                            <aside class="widget-area" data-aos="fade-up">
                                <div class="widget p-0 mb-40">
                                    <h5 class="title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#brands" aria-expanded="true" aria-controls="brands">
                                            <?php echo e(__('Categories')); ?>

                                        </button>
                                    </h5>
                                    <div id="brands" class="collapse show">
                                        <div class="accordion-body scroll-y mt-20">
                                            <ul class="list-group custom-radio">
                                                <?php $__currentLoopData = $galleryCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        
                                                        <a href="<?php echo e(route('store.gallery', [$store->slug, $category->id])); ?>"
                                                            class="form-radio-label">
                                                            <span><?php echo e($category->name); ?></span>
                                                            <span
                                                                class="qty">(<?php echo e(date('M d, Y', strtotime($category->created_at))); ?>)</span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Spacer -->
                                <div class="pb-40"></div>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="product-sort-area" data-aos="fade-up">
                        <div class="row align-items-center">
                            
                            
                            
                        </div>
                    </div>
                    <!-- Products -->
                    <div class="row">
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-4 col-sm-6" data-aos="fade-up">
                                <div class="product-default shadow-none text-center mb-25">
                                    <figure class="product-img mb-15">
                                        <?php if(!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img)): ?>
                                            <a class="lazy-container ratio ratio-1-1"
                                                title="<?php echo e($gallery->gallery_category()); ?>"
                                                href="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>">
                                                <img class="lazyload img-fluid img-height-250"
                                                    src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                    data-src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>"
                                                    alt="<?php echo e($gallery->gallery_category()); ?>">
                                            </a>
                                        <?php else: ?>
                                            <a href="shop-details.html" target="_self" title="Link"
                                                class="lazy-container ratio ratio-1-1">
                                                <img alt="<?php echo e($gallery->gallery_category()); ?>"
                                                    src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                    class="lazyload img-fluid img-height-250">
                                            </a>
                                        <?php endif; ?>


                                        <div class="product-overlay">
                                            <h2 class="text-light">
                                                <?php echo e($gallery->gallery_category()); ?>

                                            </h2>
                                            
                                            
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        
                                        
                                    </div>
                                </div><!-- product-default -->
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Shop-area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme37', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme37/gallery/index.blade.php ENDPATH**/ ?>