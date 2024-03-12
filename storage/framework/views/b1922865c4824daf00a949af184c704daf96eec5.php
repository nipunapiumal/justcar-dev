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
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2><?php echo e($blogs->title); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75"><?php echo e($blogs->title); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Blog-details-area start -->
    <div class="blog-details-area pt-100 pb-60">
        <div class="container">
            <div class="row justify-content-center gx-xl-5">
                <div class="col-lg-8">
                    <div class="blog-description mb-40">
                        <article class="item-single">
                            <div class="image">
                                <div class="lazy-container ratio ratio-16-9">
                                    <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image)): ?>
                                        <img class="lazyload img-fluid w-100" alt="<?php echo e($blogs->title); ?>"
                                            style="height: 616px;object-fit: cover;"
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>"
                                            data-src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image))); ?>">
                                    <?php else: ?>
                                        <img class="lazyload img-fluid w-100" alt="<?php echo e($blogs->title); ?>"
                                            style="height: 416px;object-fit: cover;"
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>">
                                    <?php endif; ?>

                                    
                                </div>
                                
                            </div>
                            <div class="content">
                                <ul class="info-list">
                                    
                                    <li><i class="fal fa-calendar"></i>
                                        <?php echo e(date('d', strtotime($blog->created_at))); ?>

                                        <?php echo e(date('M', strtotime($blog->created_at))); ?></li>
                                    
                                </ul>
                                <h4 class="title">
                                    <?php echo e($blogs->title); ?>

                                </h4>
                                <p>
                                    <?php echo $blogs->detail; ?>

                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Blog-details-area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme35', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme35/store_blog_view.blade.php ENDPATH**/ ?>