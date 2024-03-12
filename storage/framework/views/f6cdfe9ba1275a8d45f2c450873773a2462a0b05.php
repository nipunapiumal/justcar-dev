<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Twilio setting')); ?>

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
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Twilio setting')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Twilio setting')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->type == 'Owner'): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <form method="POST" action="<?php echo e(route('owner.twilio.setting', $store_settings->slug)); ?>"
                        accept-charset="UTF-8">
                        <?php echo csrf_field(); ?>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" name="is_twilio_enabled"
                                            id="twilio_module"
                                            <?php echo e($store_settings['is_twilio_enabled'] == 'on' ? 'checked=checked' : ''); ?>>
                                        <label class="form-check-label" for="twilio_module">
                                            <?php echo e(__('Twilio')); ?>

                                            </a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                    <label for="twilio_token" class="form-label"><?php echo e(__('Twillo SID')); ?></label>
                                    <input class="form-control" name="twilio_sid" type="text"
                                        value="<?php echo e($store_settings->twilio_sid); ?>" id="twilio_sid">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                    <label for="twilio_token" class="form-label"><?php echo e(__('Twillo Token')); ?></label>
                                    <input class="form-control " name="twilio_token" type="text"
                                        value="<?php echo e($store_settings->twilio_token); ?>" id="twilio_token">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                    <label for="twilio_from" class="form-label"><?php echo e(__('Twillo From')); ?></label>
                                    <input class="form-control " name="twilio_from" type="text"
                                        value="<?php echo e($store_settings->twilio_from); ?>" id="twilio_from">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                    <label for="notification_number"
                                        class="form-label"><?php echo e(__('Notification Number')); ?></label>
                                    <input class="form-control " name="notification_number" type="text"
                                        value="<?php echo e($store_settings->notification_number); ?>" id="notification_number">
                                    <small>* Use country code with your number *</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <div class="card-footer">
                                    <div class="col-sm-12 px-2">
                                        <div class="d-flex justify-content-end">
                                            <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/twilio_setting.blade.php ENDPATH**/ ?>