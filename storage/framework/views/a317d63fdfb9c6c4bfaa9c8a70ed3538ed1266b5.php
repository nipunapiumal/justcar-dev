<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Content Sharing')); ?>

<?php $__env->stopSection(); ?>
<?php
    
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Content Sharing')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Content Sharing')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->type == 'Owner'): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">
                            <?php echo e(__('Content Sharing')); ?>

                        </h5>
                        <small class="text-dark font-weight-bold">
                            <?php echo e(__('Here you can share content between stores. Note: Content of the selected store\'s will be copied to the :store!', ['store' => $store_settings->name])); ?>

                        </small>
                    </div>
                    <form method="POST"
                        action="<?php echo e(route('store.sharing.content', $store_settings->slug)); ?>"
                        accept-charset="UTF-8">
                        <?php echo csrf_field(); ?>
                        <div class="card-body p-4">
                            <h5> <?php echo e(__('Select the Store')); ?> </h5>
                            <div class="row">
                                <?php $__currentLoopData = Auth::user()->stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($store->is_active): ?>
                                        <?php if(Auth::user()->current_store != $store->id): ?>
                                            <div class="col-sm-3 form-group">
                                                <div class="form-check form-check-inline mb-3">
                                                    <input type="radio"
                                                        id="sharing-content-<?php echo e($store->slug); ?>"
                                                        name="slug" value="<?php echo e($store->slug); ?>"
                                                        class="form-check-input">
                                                    <label class="form-check-label"
                                                        for="sharing-content-<?php echo e($store->slug); ?>"><?php echo e($store->name); ?></label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <div class="card-footer">
                                    <div class="col-sm-12 px-2">
                                        <div class="d-flex justify-content-end">
                                            <?php echo e(Form::submit(__('Share Content to :theme', ['theme' => $store_settings->name]), ['class' => 'btn btn-xs btn-primary'])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/content_sharing.blade.php ENDPATH**/ ?>