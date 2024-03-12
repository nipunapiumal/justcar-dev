<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-9">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2><?php echo e(__('Customer')); ?> <?php echo e(__('Register')); ?></h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li><?php echo e(__('Customer')); ?> <?php echo e(__('Register')); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Area Start -->
    <div class="contact-form-area pt-100 pb-150">
        <div class="container">

            <div class="contact-form-wrapper fix">
                <?php echo Form::open(['route' => ['store.userstore', $slug], 'id' => 'contact-form'], ['method' => 'post']); ?>

                <div class="row">
                    <div class="col-md-7">
                        <p><?php echo e(__('Already registered ?')); ?>

                            <a href="<?php echo e(route('customer.loginform', $slug)); ?>" class="text-primary"><?php echo e(__('Login')); ?></a>
                        </p>

                        <input name="name" type="text" placeholder="<?php echo e(__('Full Name *')); ?>" required="required">
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

                        <input name="email" type="email" placeholder="<?php echo e(__('Email *')); ?>" required="required">
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

                        <input name="phone_number" type="text" placeholder="<?php echo e(__('Number *')); ?>" required="required">
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

                        <input name="password" type="password" placeholder="<?php echo e(__('Password *')); ?>" required="required">
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

                        <input name="password_confirmation" type="password" placeholder="<?php echo e(__('Confirm Password *')); ?>"
                            required="required">
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
                            
                            <label class="custom-control-label" for="exampleCheck3">
                                <?php echo e(__('By using the system, you accept the')); ?> <a href="" class="text-primary">
                                    <?php echo e(__('Privacy Policy')); ?> </a> <?php echo e(__('and')); ?> <a href=""
                                    class="text-primary"> <?php echo e(__('System Regulations')); ?>. </a>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn default-btn gradient">
                    <span><?php echo e(__('Register')); ?></span>
                </button>
                
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme13to15', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme15/user/create.blade.php ENDPATH**/ ?>