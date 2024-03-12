<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Mobile.de Seller-API')); ?>

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
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Mobile.de Seller-API')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Mobile.de Seller-API')); ?></h5>
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
                            <?php echo e(__('Mobile.de Seller-API')); ?>

                        </h5>
                        <small class="text-dark font-weight-bold">
                            <?php echo __('mobile.de desc', [
                                'url' => "<a href='https://sandbox.services.mobile.de' target='_blank'>sandbox.services.mobile.de</a>",
                            ]); ?>

                        </small>
                    </div>
                    <?php if(Auth::user()->type == 'Owner'): ?>
                        <?php echo e(Form::model($store_settings, ['route' => ['store.mobile.de'], 'method' => 'POST'])); ?>

                        
                        <div class="card-body p-4">
                            <div class="row">

                                <p class="mb-2">
                                    <?php echo __('mobile.de desc 1'); ?>}
                                </p>
                                <p class="mb-2">
                                   <b> <?php echo __('mobile.de desc 2'); ?></b>
                                </p>
                                <p> <?php echo e(__('mobile.de desc 3')); ?></p>

                                <div class="col-12 py-2 text-end">
                                    <div class="form-check form-switch form-switch-right mb-2">
                                        <input type="hidden" name="is_mobilede_api_enabled" value="off">
                                        <input type="checkbox" class="form-check-input mx-2" name="is_mobilede_api_enabled"
                                            id="is_mobilede_api_enabled"
                                            <?php echo e(isset($store_settings['is_mobilede_api_enabled']) && $store_settings['is_mobilede_api_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                        <label class="form-check-label"
                                            for="is_mobilede_api_enabled"><?php echo e(__('Enable')); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-4">



                                    <label class="paypal-label col-form-label"
                                        for="mobilede_api_mode"><?php echo e(__('API Mode')); ?></label>
                                    <br>
                                    <div class="d-flex">
                                        <div class="mr-2" style="margin-right: 15px;">
                                            <div class="border card p-3">
                                                <div class="form-check">
                                                    <label class="form-check-labe text-dark">
                                                        <input type="radio" name="mobilede_api_mode" value="sandbox"
                                                            class="form-check-input"
                                                            <?php echo e(!isset($store_settings['mobilede_api_mode']) || $store_settings['mobilede_api_mode'] == '' || $store_settings['mobilede_api_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                        <?php echo e(__('Sandbox')); ?>

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mr-2">
                                            <div class="border card p-3">
                                                <div class="form-check">
                                                    <label class="form-check-labe text-dark">
                                                        <input type="radio" name="mobilede_api_mode" value="live"
                                                            class="form-check-input"
                                                            <?php echo e(isset($store_settings['mobilede_api_mode']) && $store_settings['mobilede_api_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                        <?php echo e(__('Live')); ?>

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('mobilede_api_username', __('Seller API Userename'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mobilede_api_username', isset($store_settings['mobilede_api_username']) ? $store_settings['mobilede_api_username'] : '', ['class' => 'form-control', 'placeholder' => __('Enter') . ' ' . __('Seller API Userename')])); ?>

                                        <?php $__errorArgs = ['stripe_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-stripe_key" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('mobilede_api_password', __('Seller API Password'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mobilede_api_password', isset($store_settings['mobilede_api_password']) ? $store_settings['mobilede_api_password'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter') . ' ' . __('Seller API Password')])); ?>

                                        <?php $__errorArgs = ['mobilede_api_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mobilede_api_password" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('mobilede_api_seller_id', __('Seller-ID'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mobilede_api_seller_id', isset($store_settings['mobilede_api_seller_id']) ? $store_settings['mobilede_api_seller_id'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter') . ' ' . __('Seller-ID')])); ?>

                                        <?php $__errorArgs = ['mobilede_api_seller_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mobilede_api_seller_id" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <div class="card-footer">
                                    <div class="col-sm-12">
                                        <div class="text-end">
                                            <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/mobile_de.blade.php ENDPATH**/ ?>