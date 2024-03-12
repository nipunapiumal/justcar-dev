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
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2><?php echo e(__('Blog')); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75"><?php echo e(__('Blog')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Blog-area start -->
    <div class="blog-area blog-1 ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <article class="card mb-30">
                            <div class="card-img radius-0 mb-30">
                                <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>"
                                    class="lazy-container ratio ratio-5-4">
                                    <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image)): ?>
                                        <img class="lazyload" style="height:450px;object-fit:cover"
                                            alt="<?php echo e($blog->title); ?>"
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>"
                                            data-src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image))); ?>">
                                    <?php else: ?>
                                        <img class="lazyload" style="height:450px;object-fit:cover"
                                            alt="<?php echo e($blog->title); ?>"
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="card-title">
                                    <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>">
                                        <?php echo e($blog->title); ?>

                                    </a>
                                </h4>
                                <p class="card-text">
                                    <?php echo e(date('d', strtotime($blog->created_at))); ?>

                                    <?php echo e(date('M', strtotime($blog->created_at))); ?>

                                </p>
                                <div class="mt-20">
                                    <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>"
                                        class="btn btn-lg btn-primary">
                                        <?php echo e(__('Show More')); ?>

                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
    </div>
    <!-- Blog-area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme35', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme35/store_blog.blade.php ENDPATH**/ ?>