<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Contact section start -->
    <div class="login-1">
        <div class="container-fluid">
            <div class="row login-box">
                <div style="cursor: pointer" class="col-lg-6 d-flex justify-content-center align-items-center bg-dark d-none d-lg-flex" onclick="location.href='<?php echo e(route('store.slug', $store->slug)); ?>'">
                    <?php if(!empty($store->logo)): ?>
                        <img width="300" src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                            alt="Image placeholder">
                    <?php else: ?>
                        <img width="300"class="logo1 img-fluid"
                            src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>" alt="Image placeholder">
                    <?php endif; ?>
                    
                </div>
                <div class="col-lg-6 align-self-center pad-0 form-section">
                    <div class="login-inner-form">
                        <div class="form-inner">
                            <h3 class="font-weight-bold"><?php echo e(__('Customer')); ?>  <?php echo e(__('Register')); ?></h3>
                            <div class="mb-5"></div>
                            <?php echo Form::open(['route' => ['store.userstore', $slug], 'id' => 'contact-form'], ['method' => 'post']); ?>

                            <div class="form-group form-box">
                                <input name="name" type="text" class="form-control"
                                    placeholder="<?php echo e(__('Full Name *')); ?>" required="required">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group form-box">
                                <input name="email" type="email" class="form-control" placeholder="<?php echo e(__('Email *')); ?>"
                                    required="required">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group form-box">
                                <input name="phone_number" type="text" class="form-control"
                                    placeholder="<?php echo e(__('Number *')); ?>" required="required">
                                <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group form-box">
                                <input name="password" type="password" class="form-control"
                                    placeholder="<?php echo e(__('Password *')); ?>" required="required">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group form-box">
                                <input name="password_confirmation" class="form-control" type="password"
                                    placeholder="<?php echo e(__('Confirm Password *')); ?>" required="required">
                                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="error invalid-email text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div class="form-group mt-4">
                                <button type="submit" class="btn-md btn-theme w-100"><?php echo e(__('Register')); ?></button>
                            </div>
                            <p><?php echo e(__('Already registered ?')); ?>

                                <a href="<?php echo e(route('customer.loginform', $slug)); ?>"><?php echo e(__('Login')); ?></a>
                            </p>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact section end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme23', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme23/user/create.blade.php ENDPATH**/ ?>