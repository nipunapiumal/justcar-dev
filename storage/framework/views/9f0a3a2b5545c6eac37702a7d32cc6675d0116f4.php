<?php $__env->startSection('page-title'); ?>
    <?php echo e(ucfirst($pageoption->name)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<!-- Start header section -->

<!-- End header section -->
<!-- Start Wellcome Banner section -->
<div class="welcome-banner-section inner-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="welcome-wrap">
                    <div class="one mb-50">
                        <h1 class="heading-1"><?php echo e(ucfirst($pageoption->name)); ?></h1>
                    </div>
                    <div class="welcome-content wow fadeInUp" data-wow-delay="300ms">
                        <p>
                            <?php echo $pageoption->contents; ?>

                        </p>
                    </div>
                    
                </div>
                <div class="advertisement-block">
                    <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                </div>
            </div>
        </div>
    </div>
</div>

   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme32', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme32/pageslug.blade.php ENDPATH**/ ?>