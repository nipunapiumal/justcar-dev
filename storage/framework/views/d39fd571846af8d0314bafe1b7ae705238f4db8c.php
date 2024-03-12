<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gallery')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $store_logo = asset(Storage::url('uploads/gallery_image/'));
    ?>


    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <div class="overflow-hidden pb-2">
                                <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp"
                                    data-appear-animation-delay="100"><?php echo e(__('Gallery')); ?></h2>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-center order-1">
                            <ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn"
                                data-appear-animation-delay="300">
                                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="active"><?php echo e(__('Gallery')); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container py-2">

        <div class="row mt-3 pt-2">
            <div class="col-lg-3 order-2 order-lg-1">
                <aside class="sidebar">
                    <h5 class="font-weight-semi-bold"><?php echo e(__('Categories')); ?></h5>
                    <ul class="nav nav-list flex-column sort-source mb-5">
                        <?php $__currentLoopData = $galleryCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($activeCategory->id==$category->id?'active':''); ?>"
                                    href="<?php echo e(route('store.gallery', [$store->slug, $category->id])); ?>"><?php echo e($category->name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </aside>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">

                <div class="row portfolio-list lightbox"
                    data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">

                    <?php if($galleries->count() > 0): ?>
                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn"
                            data-appear-animation-delay="200">
                            <div class="portfolio-item">
                                <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                    <span class="thumb-info-wrapper border-radius-0">
                                        <?php if(!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img)): ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>"
                                                class="border-radius-0 cover" alt="" height="150px;">
                                            <span class="thumb-info-action">
                                                <a href="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>"
                                                    class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                            class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        <?php else: ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                class="border-radius-0" height="150px;">
                                            <span class="thumb-info-action">
                                                <a href="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                    class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                            class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        <?php endif; ?>


                                    </span>
                                </span>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.themePlus1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/themePlus1/gallery/index.blade.php ENDPATH**/ ?>