<?php $__env->startSection('page-title'); ?>
<?php echo e($jobBoard->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2><?php echo e($jobBoard->title); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75"><?php echo e($jobBoard->title); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->
    
    <!-- Contact 1 start -->
    <div class="contact-1 content-area-20 pt-100 pb-100">
        <div class="container">
            

            <div class="best-used-car pt-50">
                <?php if($jobBoard->job_context): ?>
                    <h4><?php echo e(__('Job Context')); ?></h4>
                    <p class="job-description mb-30"><?php echo nl2br($jobBoard->job_context); ?></p>
                <?php endif; ?>
                <?php if($jobBoard->job_responsibility): ?>
                    <h4><?php echo e(__('Job Responsibility')); ?></h4>
                    <p class="job-description mb-30"><?php echo nl2br($jobBoard->job_responsibility); ?></p>
                <?php endif; ?>
                <?php if($jobBoard->vacancy): ?>
                    <h4><?php echo e(__('Vacancy')); ?></h4>
                    <p class="job-description mb-30"><?php echo nl2br($jobBoard->vacancy); ?></p>
                <?php endif; ?>
                <?php if($jobBoard->educational_requirements): ?>
                    <h4><?php echo e(__('Educational Requirements')); ?></h4>
                    <p class="job-description mb-30"><?php echo nl2br($jobBoard->educational_requirements); ?></p>
                <?php endif; ?>
                <?php if($jobBoard->experience_requirements): ?>
                    <h4><?php echo e(__('Experience Requirements')); ?></h4>
                    <p class="job-description mb-30"><?php echo nl2br($jobBoard->experience_requirements); ?></p>
                <?php endif; ?>
                <?php if($jobBoard->additional_requirements): ?>
                    <h4><?php echo e(__('Additional Requirements')); ?></h4>
                    <p class="job-description mb-30"><?php echo nl2br($jobBoard->additional_requirements); ?></p>
                <?php endif; ?>
                <?php if($jobBoard->employment_status): ?>
                    <h4><?php echo e(__('Employment Status')); ?></h4>
                    <p class="job-description mb-30"><?php echo nl2br($jobBoard->employment_status); ?></p>
                <?php endif; ?>
                <?php if($jobBoard->compensation_other_benefits): ?>
                    <h4><?php echo e(__('Compensation & Other Benefits')); ?></h4>
                    <p class="job-description mb-30"><?php echo nl2br($jobBoard->compensation_other_benefits); ?></p>
                <?php endif; ?>
                <?php if($jobBoard->salary): ?>
                    <h4><?php echo e(__('Salary')); ?></h4>
                    <p class="job-description mb-30"><?php echo nl2br($jobBoard->salary); ?></p>
                <?php endif; ?>
            </div>


        </div>
        <div class="container pt-100 pb-100 apply-form mb-50">
            
            <div class="row g-0 contact-innner">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-form" style="border-right: none; margin:0px 20px !important;">
                        <div class="text-center">
                        <h4 class="mb-20"><?php echo e(__('Apply To') . ' ' . $jobBoard->position . ' (' . $jobBoard->title . ')'); ?>

                        </h4></div>
                        <?php echo e(Form::open(['url' => 'job-applicants', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'contact-form'])); ?>


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <?php echo e(Form::hidden('job_board', $jobBoard->id)); ?>

                                    <input type="text" name="name" class="form-control" id="floating-full-name"
                                        placeholder="<?php echo e(__('Name')); ?>">
                                    <label for="floating-full-name"><?php echo e(__('Name')); ?></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="email" class="form-control" id="floating-full-name"
                                        placeholder="<?php echo e(__('Email')); ?>">
                                    <label for="floating-full-name"><?php echo e(__('Email')); ?></label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <span><?php echo e(__('Your CV') . ' (' . __('Accept File Type: pdf') . ')'); ?> </span>
                                    <input type="file" name="cv" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-floating mb-20">
                                    <textarea class="form-control" placeholder="<?php echo e(__('Message')); ?>" name="message" id="floatingTextarea2"></textarea>
                                    
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-5"><?php echo e(__('Apply')); ?></button>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact 1 end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme36', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme37/job_board/apply.blade.php ENDPATH**/ ?>