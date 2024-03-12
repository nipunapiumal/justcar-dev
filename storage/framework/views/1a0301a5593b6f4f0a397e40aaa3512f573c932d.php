<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gallery')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php ($store_logo = asset(Storage::url('uploads/gallery_image/'))); ?>

    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-9">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2><?php echo e(__('Gallery')); ?></h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li><?php echo e(__('Gallery')); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section Area Start -->
    <div class="blog-section-area ptb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-xl-3">
                                <div class="car-listing gallery p0 bdr_none">
                                    <div class="thumb">
                                        <?php if(!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img)): ?>
                                            <a class="popup-img"
                                                href="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>">
                                                <img class="img-whp cover"
                                                    src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>"
                                                    alt="sp5s1.jpg"></a>
                                        <?php else: ?>
                                            <img alt="Image placeholder"
                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                class="h100p">
                                        <?php endif; ?>
                                       
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>
                <div class="col-lg-3 col-md-4">

                    <div class="ht-single-widget">
                        <h4 class="widget-title"><?php echo e(__('Categories')); ?> </h4>
                        <div class="ht-widget-item">
                            <div class="widget-content">

                                <?php $__currentLoopData = $galleryCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="popular-post">
                                        <a href="<?php echo e(route('store.gallery', [$store->slug, $category->id])); ?>">
                                            <?php if($category->categorie_img): ?>
                                                <img src="<?php echo e($store_logo); ?>/<?php echo e($category->categorie_img); ?>"
                                                    alt="" style="width: 50px;height:50px">
                                            <?php else: ?>
                                                <img src="<?php echo e($store_logo); ?>/default.jpg" alt=""
                                                    style="width: 50px;height:50px">
                                            <?php endif; ?>
                                        </a>
                                        <div class="post-text">
                                            
                                            <h6><a
                                                    href="<?php echo e(route('store.gallery', [$store->slug, $category->id])); ?>"><?php echo e($category->name); ?></a>
                                            </h6>
                                            
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section Area End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme13to15', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme13/gallery/index.blade.php ENDPATH**/ ?>