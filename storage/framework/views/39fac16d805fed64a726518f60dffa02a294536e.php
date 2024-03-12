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
    <section class="inner_page_breadcrumb style2 bgc-white bt1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title"><?php echo e(ucfirst($pageoption->name)); ?></h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('store.slug', $store->slug)); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(ucfirst($pageoption->name)); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="our-faq pt0 bgc-white pb30-991">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="faq_content">
                        <div class="faq_according">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-body pt-3 pb-3">
                                        <?php echo $pageoption->contents; ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt50 mb50">
                        <?php echo \App\Models\Advertisement::getAdvertisement($store, 1); ?>

                    </div>
                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme12/pageslug.blade.php ENDPATH**/ ?>