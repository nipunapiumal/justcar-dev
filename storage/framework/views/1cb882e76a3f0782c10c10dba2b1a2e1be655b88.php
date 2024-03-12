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
    
    <!-- Sub Banner end -->

    <!-- Blog body start -->
    <div class="blog-body content-area-4 content-area-21">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1 class="mb-10"><?php echo e($blogs->title); ?></h1>
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
                    <!-- Blog 1 start -->
                    <div class="blog-1 blog-big mb-50">
                        <div class="blog-photo">
                            <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image)): ?>
                                <img class="img-fluid w-100" alt="<?php echo e($blogs->title); ?>"
                                    style="height: 616px;object-fit: cover;"
                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image))); ?>">
                            <?php else: ?>
                                <img class="img-fluid w-100" alt="<?php echo e($blogs->title); ?>"
                                    style="height: 416px;object-fit: cover;"
                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="detail">
                            <h3>
                                <a href="javascript:void(0)"><?php echo e($blogs->title); ?></a>
                            </h3>
                            <p class="text-muted"><i class="fa fa-calendar"></i>
                                <?php echo e(\App\Models\Utility::dateFormat($blogs->created_at)); ?></p>
                            <?php echo $blogs->detail; ?>

                            <br>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">

                        <!-- Recent posts start -->
                        <div class="widget recent-posts">
                            <h3 class="sidebar-title"><?php echo e(__('Popular post')); ?></h3>
                            <?php $__currentLoopData = $blog_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex mb-4 recent-posts-box">
                                    <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>">
                                        <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image)): ?>
                                            <img alt="<?php echo e($blogs->title); ?>" class="flex-shrink-0 me-3"
                                                style="height: 70px;object-fit: cover;"
                                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image))); ?>">
                                        <?php else: ?>
                                            <img alt="<?php echo e($blogs->title); ?>" class="flex-shrink-0 me-3"
                                                style="width: 70px;height: 70px;object-fit: cover;"
                                                src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>">
                                        <?php endif; ?>
                                    </a>
                                    <div class="detail align-self-center">
                                        <h5>
                                            <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>">
                                                <?php echo e($blogs->title); ?></a>
                                        </h5>
                                        <div class="listing-post-meta">
                                            
                                            <a href="#">
                                                <i class="fa fa-calendar"></i>
                                                <?php echo e(\App\Models\Utility::dateFormat($blog->created_at)); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog body end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            var blog = <?php echo e($blogs); ?>;
            if (blog == '') {
                window.location.href = "<?php echo e(route('store.slug', $store->slug)); ?>";
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme25', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme25/store_blog_view.blade.php ENDPATH**/ ?>