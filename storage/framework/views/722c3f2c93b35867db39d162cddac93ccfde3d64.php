<?php $__env->startSection('page-title'); ?>
    <?php echo e(ucfirst($pageoption->name)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark"><?php echo e(ucfirst($pageoption->name)); ?></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="active"><?php echo e(ucfirst($pageoption->name)); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-12 mb-5 mb-lg-0">
                <?php echo $pageoption->contents; ?>

                <div class="mb-4"></div>
                
                    
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.themePlus1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/themePlus1/pageslug.blade.php ENDPATH**/ ?>