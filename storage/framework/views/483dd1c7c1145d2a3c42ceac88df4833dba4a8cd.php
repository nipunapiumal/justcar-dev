<?php $__env->startSection('page-title'); ?>
    <?php echo e($blogs->title); ?>

<?php $__env->stopSection(); ?>
<?php
    if (!empty(session()->get('lang'))) {
        $currantLang = session()->get('lang');
    } else {
        $currantLang = $store->lang;
    }
    $languages = \App\Models\Utility::languages();
?>
<?php $__env->startSection('content'); ?>
   <!-- Start header section -->

<!-- End header section -->

   <!-- Start Blog Standard section -->
   <div class="blog-details-page inner-title">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-12">
                <div class="post-thumb">
                    <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image)): ?>
                                <img class="img-fluid w-100" alt="<?php echo e($blogs->title); ?>"
                                    style="height: 616px;object-fit: cover;"
                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image))); ?>">
                            <?php else: ?>
                                <img class="img-fluid w-100" alt="<?php echo e($blogs->title); ?>"
                                    style="height: 416px;object-fit: cover;"
                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>">
                            <?php endif; ?>
                    <div class="date">
                        <a href="javascript:void(0)"><?php echo e(__('Popular post')); ?></a>
                    </div>
                </div>
                <h3 class="post-title"><?php echo e($blogs->title); ?></h3>
                <div class="author-area">
                    
                    <div class="author-content">
                        
                        <a href="javascript:void(0)"><?php echo e(__('Date')); ?> - 
                            <?php echo e(date("d", strtotime($blog->created_at))); ?>

                        <?php echo e(date("M", strtotime($blog->created_at))); ?></a>
                    </div>
                </div>
                <?php echo $blogs->detail; ?>

            </div>
          
        </div>
    </div>
</div>
<!-- End Blog Standard section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme32', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme32/store_blog_view.blade.php ENDPATH**/ ?>