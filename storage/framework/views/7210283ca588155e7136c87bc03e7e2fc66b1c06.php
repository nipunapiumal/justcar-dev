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
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1><?php echo e(__('Blog')); ?></h1>
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="active"><?php echo e(__('Blog')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Blog body start -->
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="blog-1">
                    <div class="blog-image">
                        
                        <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image)): ?>
                                    <img class="img-fluid bp" alt="Image placeholder" style="width:100%;height: 253px;object-fit: cover;"
                                        src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image))); ?>">
                                <?php else: ?>
                                    <img class="img-fluid bp" alt="Image placeholder" style="width:100%;height: 253px;object-fit: cover;"
                                        src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>">
                                <?php endif; ?>
                        <div class="date-box">
                            <span><?php echo e(date("d", strtotime($blog->created_at))); ?></span><?php echo e(date("M", strtotime($blog->created_at))); ?>

                        </div>
                        
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#"><i class="fa fa-calendar"></i> <?php echo e(\App\Models\Utility::dateFormat($blog->created_at)); ?></a></strong>
                                </li>
                                
                                
                            </ul>
                        </div>
                        <h4>
                            <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>"><?php echo e($blog->title); ?></a>
                        </h4>
                        
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       
    </div>
</div>
<!-- Blog body end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            var blog = <?php echo e(sizeof($blogs)); ?>;
            if (blog < 1) {
                window.location.href = "<?php echo e(route('store.slug', $store->slug)); ?>";
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme16to21', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme16/store_blog.blade.php ENDPATH**/ ?>