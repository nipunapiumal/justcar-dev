<?php $__env->startSection('page-title'); ?>
    <?php echo e(ucfirst($pageoption->name)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
    </style>
<?php $__env->stopPush(); ?>
<?php
if (!empty(session()->get('lang'))) {
    $currantLang = session()->get('lang');
} else {
    $currantLang = $store->lang;
}
?>
<?php $__env->startSection('content'); ?>

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1><?php echo e(ucfirst($pageoption->name)); ?></h1>
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                <li class="active"><?php echo e(ucfirst($pageoption->name)); ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->
<!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb style2">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        
                        <div class="col-md-8 offset-md-2">
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
    </section>

   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme16to21', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme16/pageslug.blade.php ENDPATH**/ ?>