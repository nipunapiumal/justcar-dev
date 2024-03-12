<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gallery')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Sub banner start -->
    
    <!-- Sub Banner end -->

    <!-- Photo gallery start -->
    <div class="blog-body content-area content-area-20">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1 class="mb-10"><?php echo e(__('Gallery')); ?></h1>
                <div class="title-border">
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="portfolio-item">
                                    <?php if(!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img)): ?>
                                        <a title="<?php echo e($gallery->gallery_category()); ?>"
                                            href="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>">
                                            <img class="img-fluid img-height-250"
                                                src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>"
                                                alt="<?php echo e($gallery->gallery_category()); ?>">
                                        </a>
                                    <?php else: ?>
                                        <img alt="<?php echo e($gallery->gallery_category()); ?>"
                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                            class="img-fluid img-height-250">
                                    <?php endif; ?>
                                    <div class="portfolio-content">
                                        <div class="portfolio-content-inner">
                                            <p><?php echo e($gallery->gallery_category()); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Posts By Category Start -->
                        <div class="posts-by-category widget">
                            <h3 class="sidebar-title"><?php echo e(__('Categories')); ?></h3>
                            <div class="s-border"></div>
                            <ul class="list-unstyled list-cat">
                                <?php $__currentLoopData = $galleryCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('store.gallery', [$store->slug, $category->id])); ?>">
                                            <?php echo e($category->name); ?> <span>
                                                
                                            </span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </ul>
                        </div>
                        <!-- Tags box Start -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Photo gallery end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme26', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme26/gallery/index.blade.php ENDPATH**/ ?>