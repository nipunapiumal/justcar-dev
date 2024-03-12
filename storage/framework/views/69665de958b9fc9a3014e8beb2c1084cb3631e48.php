<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Language')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-2"><?php echo e(__('Language')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Language')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
     
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="language-wrap">
                        <div class="row">
                            <div class="col-lg-1 language-list-wrap">
                                <div class="language-list">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="text-sm font-weight-bold">
                                                <a href="<?php echo e(route('localization.show',[$language])); ?>" class="nav-link <?php echo e(($language == $lang)?'active':''); ?>"><?php echo e(Str::upper($language)); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-11 language-form-wrap">
                                <?php echo e(Form::open(array('url'=>'localization','method'=>'post'))); ?>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <?php echo e(Form::textarea('content',$jsonContent,array('class'=>'form-control','rows'=>'20','required'=>'required'))); ?>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <div class="d-flex justify-content-end">
                                                    <?php echo e(Form::hidden('lang',$lang)); ?>

                                                    <?php echo e(Form::submit(__('Save Changes'),array('class'=>'btn btn-xs btn-primary'))); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/localization/index.blade.php ENDPATH**/ ?>