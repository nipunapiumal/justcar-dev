<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2><?php echo e(__('Register')); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75"><?php echo e(__('Register')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Authentication-area start -->
    <div class="authentication-area ptb-100">
        <div class="container">
            <div class="auth-form border">
                <?php echo Form::open(['route' => ['store.userstore', $slug], 'id' => 'contact-form'], ['method' => 'post']); ?>

                <div class="title">
                    <h4 class="mb-1"><?php echo e(__('Register')); ?></h4>
                    <p class="mb-20">
                        <?php echo e(__('By using the system, you accept the')); ?> <a href="">
                            <?php echo e(__('Privacy Policy')); ?> </a> <?php echo e(__('and')); ?> <a href="">
                            <?php echo e(__('System Regulations')); ?>. </a>
                    </p>
                </div>
                <div class="form-group mb-20">
                    <input name="name" type="text" class="form-control" placeholder="<?php echo e(__('Full Name *')); ?>"
                        required="required">
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
                <div class="form-group mb-20">
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
                <div class="form-group mb-20">
                    <input name="phone_number" type="text" class="form-control" placeholder="<?php echo e(__('Number *')); ?>"
                        required="required">
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
                <div class="form-group mb-20">
                    <input name="password" type="password" class="form-control" placeholder="<?php echo e(__('Password *')); ?>"
                        required="required">
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
                <div class="form-group mb-20">
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
                <div class="row align-items-center mb-20">
                    
                    <div class="col-sm-8">
                        <div class="link go-signup">
                            <?php echo e(__('Already registered ?')); ?>

                            <a href="<?php echo e(route('customer.loginform', $slug)); ?>">
                                <?php echo e(__('Login')); ?>

                            </a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary w-100"> <?php echo e(__('Register')); ?> </button>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- Authentication-area end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme36', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme36/user/create.blade.php ENDPATH**/ ?>