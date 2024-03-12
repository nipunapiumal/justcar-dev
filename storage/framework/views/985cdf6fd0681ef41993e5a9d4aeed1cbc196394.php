<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark"><?php echo e(__('Customer')); ?> <?php echo e(__('Register')); ?></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="active"><?php echo e(__('Register')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-6 mb-5 mb-lg-0">
                <?php echo Form::open(['route' => ['store.userstore', $slug], 'id' => 'contact-form'], ['method' => 'post']); ?>


                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3"><?php echo e(__('Full Name')); ?> <span
                                class="text-color-danger">*</span></label>
                        <?php echo e(Form::text('name', null, ['class' => 'form-control form-control-lg text-4'])); ?>

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
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3"><?php echo e(__('Email')); ?> <span
                                class="text-color-danger">*</span></label>
                        <?php echo e(Form::text('email', null, ['class' => 'form-control form-control-lg text-4'])); ?>

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
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3"><?php echo e(__('Number')); ?> <span
                                class="text-color-danger">*</span></label>
                        <?php echo e(Form::text('phone_number', null, ['class' => 'form-control form-control-lg text-4'])); ?>

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
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3"><?php echo e(__('Password')); ?> <span
                                class="text-color-danger">*</span></label>
                        <?php echo e(Form::password('password', ['class' => 'form-control form-control-lg text-4'])); ?>

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
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3"><?php echo e(__('Confirm Password')); ?> <span
                                class="text-color-danger">*</span></label>
                        <?php echo e(Form::password('password_confirmation', ['class' => 'form-control form-control-lg text-4'])); ?>

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
                </div>
                <div class="row justify-content-between">
                    <div class="form-group col-md-auto">
                        <label class="form-label custom-control-label cur-pointer text-2" for="rememberme">
                            <?php echo e(__('By using the system, you accept the')); ?> <a href="" class="text-primary"> <?php echo e(__('Privacy Policy')); ?> </a> <?php echo e(__('and')); ?> <a href="" class="text-primary"> <?php echo e(__('System Regulations')); ?>. </a>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <button type="submit"
                            class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3"
                            data-loading-text="Loading..."><?php echo e(__('Register')); ?></button>
                    </div>
                    <p class="text-center"><?php echo e(__('Already registered ?')); ?>

                        <a href="<?php echo e(route('customer.loginform', $slug)); ?>"><?php echo e(__('Login')); ?></a>
                    </p>
                </div>

                <?php echo e(Form::close()); ?>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.themePlus1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/themePlus1/user/create.blade.php ENDPATH**/ ?>