<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Blog')); ?>

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
    
<div class="blog-standard-page pt-100 mb-100">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-12">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="news-card2 mb-50">
                    <div class="news-img">
                        <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>">
                            <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image)): ?>
                            <img class="img-fluid w-100" style="height:450px;object-fit:cover" alt="<?php echo e($blog->title); ?>"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image))); ?>">
                        <?php else: ?>
                            <img class="img-fluid w-100" style="height:450px;object-fit:cover" alt="<?php echo e($blog->title); ?>"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>">
                        <?php endif; ?>
                        </a>
                        <div class="date">
                            <a href="blog-standard.html"><?php echo e(__('Popular post')); ?></a>
                        </div>
                    </div>
                    <div class="content">
                        <h4><a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>">
                            <?php echo e($blog->title); ?>

                        </a></h4>
                        
                        <div class="news-btm d-flex align-items-center justify-content-between">
                            <div class="author-area">
                                
                                <div class="author-content">
                                    
                                    <a href="blog-standard.html"><?php echo e(__('Date')); ?> - 
                                        <?php echo e(date("d", strtotime($blog->created_at))); ?>

                                    <?php echo e(date("M", strtotime($blog->created_at))); ?>

                                    </a>
                                </div>
                            </div>
                            <a class="view-btn" href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>"><?php echo e(__('Show More')); ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
                
            </div>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme29', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme29/store_blog.blade.php ENDPATH**/ ?>