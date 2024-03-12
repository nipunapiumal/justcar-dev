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
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark"><?php echo e(__('Blog')); ?></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="active"><?php echo e(__('Blog')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <div class="row">

                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-lg-3">
                                <article class="post post-medium border-0 pb-0 mb-5">
                                    <div class="post-image">
                                        <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>">
                                            <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image)): ?>
                                                <img alt="Image placeholder" style="height: 200px;object-fit: cover;" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image))); ?>">
                                            <?php else: ?>
                                                <img alt="Image placeholder" style="height: 200px;object-fit: cover;" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>">
                                            <?php endif; ?>
                                        </a>
                                    </div>

                                    <div class="post-content">

                                        <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a
                                                href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>">
                                                <?php echo e($blog->title); ?></a></h2>
                                        

                                        <div class="post-meta">
                                            
                                            
                                            <span><i class="fa fa-calendar"></i> <a href="#"><?php echo e(\App\Models\Utility::dateFormat($blog->created_at)); ?></a></span>
                                            <span class="d-block mt-2"><a
                                                    href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>"
                                                    class="btn btn-xs btn-light text-1 text-uppercase"><?php echo e(__('Show More')); ?></a></span>
                                        </div>

                                    </div>
                                </article>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>


                </div>
            </div>

        </div>

    </div>
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

<?php echo $__env->make('storefront.layout.themePlus1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/themePlus1/store_blog.blade.php ENDPATH**/ ?>