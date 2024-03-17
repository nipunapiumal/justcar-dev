<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Career With Us')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
<!-- Sub banner start -->

<!-- Sub Banner end -->

<!-- Contact 1 start -->
<div class="inner-title">
    <div class="container">
        <!-- Main title -->
        <div class="one mb-50">
            <h1 class="heading-1"><?php echo e(__('Career With Us')); ?></h1>
        </div>
    </div>
</div>

 <!-- services-2 start -->
 <div class="services-2 content-area-jobs mb-100">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $jobBoards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobBoard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="service-info-2">
                            <div class="icon">
                                <i class="bi bi-person-workspace"></i>
                            </div>
                            <div class="detail">
                                <h3><a class="job-title"
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

<?php echo $__env->make('storefront.layout.theme30', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme30/job_board/index.blade.php ENDPATH**/ ?>