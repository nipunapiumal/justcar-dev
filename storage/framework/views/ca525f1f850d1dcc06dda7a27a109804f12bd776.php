<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Career With Us')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2><?php echo e(__('Career With Us')); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75"><?php echo e(__('Career With Us')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->


 <!-- services-2 start -->
 <div class="services-2 content-area-jobs pt-100 pb-100">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $jobBoards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobBoard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="service-info-2">
                            <div class="icon">
                                <i class="far fa-user-circle"></i>
                            </div>
                            <div class="detail">
                                <h3><a
                                        href="<?php echo e(route('store.job-board.create', [$store->slug, $jobBoard->id])); ?>"><?php echo e($jobBoard->title); ?></a>
                                </h3>
                                <p class="mb-0"><?php echo e($jobBoard->position); ?></p>
                                <p><small><?php echo e($jobBoard->job_category()); ?></small></p>
                                <a href="<?php echo e(route('store.job-board.create', [$store->slug, $jobBoard->id])); ?>"
                                    class="read-more"><?php echo e(__('Apply')); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- services-2 end -->
<!-- Contact 1 end -->

   
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme35', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme35/job_board/index.blade.php ENDPATH**/ ?>