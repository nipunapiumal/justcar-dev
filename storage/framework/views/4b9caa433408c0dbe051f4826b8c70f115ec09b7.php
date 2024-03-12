<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact Us')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1><?php echo e(__('Career With Us')); ?></h1>
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                <li class="active"><?php echo e(__('Career With Us')); ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- services-2 start -->
<div class="services-2 content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1><?php echo e(!empty($storethemesetting['job_board_title']) ? $storethemesetting['job_board_title'] : 'Career With Us'); ?></h1>
            <p><?php echo e(!empty($storethemesetting['job_board_description']) ? $storethemesetting['job_board_description'] : 'Apply Now'); ?></p>
        </div>
        <div class="row">
            <?php $__currentLoopData = $jobBoards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobBoard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="service-info-2">
                    <div class="icon">
                        <i class="flaticon-support-2"></i>
                    </div>
                    <div class="detail">
                        <h3><a href="<?php echo e(route('store.job-board.create', [$store->slug,$jobBoard->id])); ?>"><?php echo e($jobBoard->title); ?></a></h3>
                        <p class="mb-0"><?php echo e($jobBoard->position); ?></p>
                        <p><small><?php echo e($jobBoard->job_category()); ?></small></p>
                        <a href="<?php echo e(route('store.job-board.create', [$store->slug,$jobBoard->id])); ?>" class="read-more"><?php echo e(__('Apply')); ?></a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- services-2 end -->

   
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme16to21', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme6/job_board/index.blade.php ENDPATH**/ ?>