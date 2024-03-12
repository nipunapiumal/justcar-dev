<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gallery')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php ($store_logo = asset(Storage::url('uploads/gallery_image/'))); ?>
    <!-- Inner Page Breadcrumb -->
   <section class="inner_page_breadcrumb style2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title"><?php echo e(__('Gallery')); ?></h2>
                        <ol class="breadcrumb fn-sm">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Gallery')); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Listing Grid View -->
    <section class="our-listing pt0 bgc-f9 pb30-991">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3">

                    <div class="sidebar_recent_viewed_widgets">
                        <h4 class="title"><?php echo e(__('Categories')); ?></h4>
                        <?php $__currentLoopData = $galleryCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex mb20">
                                <div class="flex-shrink-0" onclick="location.href='<?php echo e(route('store.gallery',[$store->slug,$category->id])); ?>'">
                                    <?php if($category->categorie_img): ?>
                                        <img alt="Image placeholder"
                                            src="<?php echo e($store_logo); ?>/<?php echo e($category->categorie_img); ?>"
                                            class="align-self-start mr-3 cover" alt="images"
                                            style="width: 50px;height:50px">
                                    <?php else: ?>
                                        <img alt="Image placeholder" src="<?php echo e($store_logo); ?>/default.jpg"
                                            class="align-self-start mr-3" alt="images" style="width: 50px;height:50px">
                                    <?php endif; ?>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="post_title"><?php echo e($category->name); ?></h5>
                                    <p><?php echo e(date('M d, Y',strtotime($category->created_at))); ?></p>
                                    
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
                <div class="col-lg-8 col-xl-9">
                    
                    <div class="row">
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-xl-3">
                                <div class="car-listing gallery p0 bdr_none">
                                    <div class="thumb">
                                        
                                        <?php if(!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img)): ?>
                                            <a class="popup-img" href="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>">
                                                <img class="img-whp cover" src="<?php echo e(asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img))); ?>" alt="sp5s1.jpg"></a>
                                            
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
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme8/gallery/index.blade.php ENDPATH**/ ?>