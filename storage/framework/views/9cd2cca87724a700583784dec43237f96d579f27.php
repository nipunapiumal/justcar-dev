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
<div class="inner-page-banner">
    <div class="banner-wrapper">
        <div class="container-fluid">
            <ul class="breadcrumb-list">
                <li>
                    <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                </li>
                <li><?php echo e(__('Blog')); ?></li>
            </ul>
            <div class="banner-main-content-wrap">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                        <div class="banner-content">
                            <span class="sub-title"><?php echo e(__('Blog')); ?></span>
                            <h1><?php echo e(__('For Any Information')); ?></h1>
                            
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end">
                        <div class="banner-img">
                            <img src="<?php echo e(asset('assets/theme29to34/img/inner-page/inner-banner-img.png')); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                    <h6>Mulish Kary</h6>
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

<?php echo $__env->make('storefront.layout.theme29', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme32/store_blog.blade.php ENDPATH**/ ?>