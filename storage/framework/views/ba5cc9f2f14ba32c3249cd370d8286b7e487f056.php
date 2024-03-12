<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<!-- Contact section start -->
<div class="contact-section tab-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-12 bg-img">
                <div class="informeson">
                    <div class="typing">
                        <h1><?php echo e(__('Customer')); ?> <?php echo e(__('login')); ?></h1>
                    </div>
                    <p>
                        <?php echo e(__('By using the system, you accept the')); ?> <a href="" class="text-primary">
                            <?php echo e(__('Privacy Policy')); ?> </a> <?php echo e(__('and')); ?> <a href="" class="text-primary">
                            <?php echo e(__('System Regulations')); ?>. </a>
                    </p>
                    
                </div>
            </div>
            <div class="col-lg-5 col-md-12 form-section">
                <div class="login-inner-form">
                    <div class="details">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                            <?php if(!empty($store->logo)): ?>
                                <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                    alt="Image placeholder">
                            <?php else: ?>
                                <img src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                    alt="Image placeholder">
                            <?php endif; ?>
                        </a>
                        
                        <div class="mb-5"></div>
                        <?php echo Form::open(
                            [
                                'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                                'id' => 'contact-form',
                            ],
                            ['method' => 'POST'],
                        ); ?>

                            <div class="form-group form-box">
                                <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Your Email')])); ?>

                            </div>
                            <div class="form-group form-box">
                                <?php echo e(Form::password('password', ['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => __('Enter Your Password')])); ?>

                            </div>
                            
                                
                                    
                                
                                
                            
                            <div class="form-group mt-4">
                                <button type="submit" class="btn-md btn-theme w-100"><?php echo e(__('Sign In')); ?></button>
                            </div>
                            <p><?php echo e(__('Dont have account ?')); ?>

                            <a href="<?php echo e(route('store.usercreate', $slug)); ?>"><?php echo e(__('Register')); ?></a>
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
    <script>
        if ('<?php echo !empty($is_cart) && $is_cart == true; ?>') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme16to21', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar/resources/views/storefront/theme16/user/login.blade.php ENDPATH**/ ?>