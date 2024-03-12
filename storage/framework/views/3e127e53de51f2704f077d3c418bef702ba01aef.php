<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Cookie Bot')); ?>

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
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Cookie Bot')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Cookie Bot')); ?></h5>
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
                            <?php echo e(__('Cookie Bot')); ?>

                        </h5>
                        <small class="text-dark font-weight-bold">
                            <?php echo e(__('Here you can add Cookie Bot to your store. Note: Please create an Account in manage.cookiebot.com to get a Group ID!')); ?>

                        </small>
                    </div>
                    <form method="POST"
                        action="<?php echo e(route('store.cookie.bot')); ?>"
                        accept-charset="UTF-8">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check form-switch float-end">
                                        <label class="form-check-label" for="is_cookiebot_enable">
                                            <?php echo e(__('Enable')); ?>

                                        </label>
                                        <input 
                                            type="checkbox"
                                            class="form-check-input"
                                            id="is_cookiebot_enable"
                                            name="is_cookiebot_enable"
                                            value="on"
                                            <?php echo e($store_settings->is_cookiebot_enable == 'on' ? 'checked=checked' : ''); ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5> <?php echo e(__('API Mode')); ?> </h5>

                                    <div class="row mt-2">
                                        <div class="col-sm-3 form-group">
                                            <div class="form-check form-check-inline mb">
                                                <input 
                                                    type="radio"
                                                    id="cookiebot_api_mode_sandbox"
                                                    name="cookiebot_api_mode" 
                                                    value="sandbox"
                                                    class="form-check-input"
                                                    <?php echo e($store_settings->cookiebot_api_mode == 'sandbox' ? 'checked' : ''); ?>>

                                                <label class="form-check-label" for="cookiebot_api_mode_sandbox"><?php echo e(__('Sandbox')); ?></label>
                                            </div>
                                            <div class="form-check form-check-inline mb">
                                                <input 
                                                    type="radio"
                                                    id="cookiebot_api_mode_live"
                                                    name="cookiebot_api_mode" 
                                                    value="live"
                                                    class="form-check-input"
                                                    <?php echo e($store_settings->cookiebot_api_mode == 'live' ? 'checked' : ''); ?>>

                                                <label class="form-check-label" for="cookiebot_api_mode_live"><?php echo e(__('Live')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h5> <?php echo e(__('Cookie Bot Group ID')); ?> </h5>
                            
                                    <div class="col-lg col-md col-sm form-group">
                                        <input 
                                            class="form-control" 
                                            name="cookie_bot_group_id" 
                                            type="text"
                                            value="<?php echo e($store_settings->cookiebot_group_id); ?>" 
                                            id="cookie_bot_group_id"
                                            placeholder="Paste your Cookie bot Group ID here">
                                    </div>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/cookie_bot_settings.blade.php ENDPATH**/ ?>