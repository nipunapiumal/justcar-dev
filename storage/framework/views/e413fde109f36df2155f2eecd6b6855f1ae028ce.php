<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                    <div class="form-inner">
                        
                        <h3 class="font-weight-bold"><?php echo e(__('Customer')); ?> <?php echo e(__('login')); ?></h3>
                        <?php echo Form::open(
                            [
                                'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                            ],
                            ['method' => 'POST'],
                        ); ?>

                        <div class="form-group clearfix">
                            <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Your Email')])); ?>

                        </div>
                        <div class="form-group clearfix">
                            <?php echo e(Form::password('password', ['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => __('Enter Your Password')])); ?>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-theme btn-md w-100"><?php echo e(__('Sign In')); ?></button>
                        </div>
                        <?php echo e(Form::close()); ?>


                        <div class="clearfix"></div>
                        <p>
                            <?php echo e(__('Dont have account ?')); ?>

                            <a href="<?php echo e(route('store.usercreate', $slug)); ?>" class="thembo"><?php echo e(__('Register')); ?></a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        if ('<?php echo !empty($is_cart) && $is_cart == true; ?>') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme23', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme23/user/login.blade.php ENDPATH**/ ?>