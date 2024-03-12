<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Our SigUp -->
    <section class="our-log bgc-f9">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <div class="sign_up_form mt60-sm">
                        <h2 class="title"><?php echo e(__('Customer')); ?> <span> <?php echo e(__('Register')); ?> </span></h2>
                        <p><?php echo e(__('Already registered ?')); ?>

                            <a href="<?php echo e(route('customer.loginform', $slug)); ?>" class="text-primary"><?php echo e(__('Login')); ?></a>
                        </p>
                        <?php echo Form::open(['route' => ['store.userstore', $slug], 'class' => 'login-form-main'], ['method' => 'post']); ?>

                        <div class="form-group mt-2">
                            <label for="exampleInputEmail1"
                                class="form-label float-left w-100 text-left"><?php echo e(__('Full Name')); ?></label>
                            <input name="name" class="form-control" type="text" placeholder="<?php echo e(__('Full Name *')); ?>"
                                required="required">
                        </div>
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
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left"><?php echo e(__('Email')); ?></label>
                            <input name="email" class="form-control" type="email" placeholder="<?php echo e(__('Email *')); ?>"
                                required="required">
                        </div>
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
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left"><?php echo e(__('Number')); ?></label>
                            <input name="phone_number" class="form-control" type="text"
                                placeholder="<?php echo e(__('Number *')); ?>" required="required">
                        </div>
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
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left"><?php echo e(__('Password')); ?></label>
                            <input name="password" class="form-control" type="password"
                                placeholder="<?php echo e(__('Password *')); ?>" required="required">
                        </div>
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
                        <div class="form-group">
                            <label for="exampleInputEmail1"
                                class="form-label float-left"><?php echo e(__('Confirm Password')); ?></label>
                            <input name="password_confirmation" class="form-control" type="password"
                                placeholder="<?php echo e(__('Confirm Password *')); ?>" required="required">
                        </div>
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
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="exampleCheck3" checked>
                            <label class="custom-control-label" for="exampleCheck3">
                                <?php echo e(__('By using the system, you accept the')); ?> <a href="" class="text-primary">
                                    <?php echo e(__('Privacy Policy')); ?> </a> <?php echo e(__('and')); ?> <a href=""
                                    class="text-primary"> <?php echo e(__('System Regulations')); ?>. </a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-signup btn-thm mt5"><?php echo e(__('Register')); ?></button>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme6/user/create.blade.php ENDPATH**/ ?>