<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gallery')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php ($store_logo = asset(Storage::url('uploads/gallery_image/'))); ?>


    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1><?php echo e(__('Gallery')); ?></h1>
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="active"><?php echo e(__('Gallery')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Photo gallery start -->
    <div class="photo-gallery content-area-13">
        <div class="container">
            <!-- Main title -->
            
                
                
                    
                        
                            
                            
                        
                    
                
            
            <div class="row filter-portfolio">
                <div class="cars">
                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1">
                            <div class="portfolio-item">
                                <?php if(!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img)): ?>
                                    <a title="2017 Ford Mustang"
                                        href="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>">
                                        <img class="img-fluid"
                                            src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>"
                                            alt="sp5s1.jpg" style="width: 700px;height:500px;object-fit:cover">
                                        </a>
                                <?php else: ?>
                                    <img alt="Image placeholder"
                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                        class="img-fluid">
                                <?php endif; ?>
                                
                                <div class="portfolio-content">
                                    <div class="portfolio-content-inner">
                                        <p>2017 Ford Mustang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Photo gallery end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme16to21', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme21/gallery/index.blade.php ENDPATH**/ ?>