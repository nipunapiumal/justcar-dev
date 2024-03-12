<?php $__env->startSection('page-title'); ?>
    <?php echo e(ucfirst($pageoption->name)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- Page title start-->
<div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
    <div class="container">
        <div class="content">
            <h2><?php echo e(ucfirst($pageoption->name)); ?></h2>
            <ul class="list-unstyled">
                <li class="d-inline">
                    <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                </li>
                <li class="d-inline">/</li>
                <li class="d-inline active opacity-75"><?php echo e(ucfirst($pageoption->name)); ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Page title end-->

<!-- Faq-area start -->
<div class="faq-area pt-100 pb-70">
    <div class="container">
        <div class="accordion" id="faqAccordion">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up">
                    <?php echo $pageoption->contents; ?>

                    <div class="advertisement-block">
                        <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq-area end -->

   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme35', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme35/pageslug.blade.php ENDPATH**/ ?>