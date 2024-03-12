<?php $__env->startSection('page-title'); ?>
    <?php echo e(ucfirst($pageoption->name)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>


<!-- Sub banner start -->

<!-- Sub Banner end -->

<div class="about-car content-area-5 content-area-20">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1 class="mb-10"><?php echo e(ucfirst($pageoption->name)); ?></h1>
            <div class="title-border">
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb_content style2">
                    
                    <div class="col-md-12">
                        <div class="faq_content mb40">
                            <div class="faq_according">
                                <div class="accordion" id="accordionExample">
                                    <?php echo $pageoption->contents; ?>

                                  
                                </div>
                            </div>
                        </div>
                        <div class="advertisement-block">
                            <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.'.$store->theme_dir.'', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme28/pageslug.blade.php ENDPATH**/ ?>