<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Career With Us')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
<!-- Sub banner start -->

<!-- Sub Banner end -->

<!-- Contact 1 start -->
<div class="contact-1 content-area-5 content-area-20">
    <div class="container">
        <!-- Main title -->
            <div class="main-title text-center">
                <h1 class="mb-10"><?php echo e(__('Career With Us')); ?></h1>
                <div class="title-border">
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                </div>
            </div>
    </div>
</div>

 <!-- services-2 start -->
 <div class="services-2 content-area-jobs">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $jobBoards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobBoard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="service-info-2">
                            <div class="icon">
                                <i class="lnr lnr-users"></i>
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

<?php echo $__env->make('storefront.layout.theme24', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme24/job_board/index.blade.php ENDPATH**/ ?>