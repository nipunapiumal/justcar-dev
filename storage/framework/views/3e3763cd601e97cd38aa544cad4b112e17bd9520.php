<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

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
                        <h2><?php echo e(__('Customer')); ?> <?php echo e(__('login')); ?></h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li><?php echo e(__('Customer')); ?> <?php echo e(__('login')); ?></li>
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
                <?php echo Form::open(
                    [
                        'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                        'id' => 'contact-form',
                    ],
                    ['method' => 'POST'],
                ); ?>


                <div class="row">
                    <div class="col-md-7">
                        <p>
                            <?php echo e(__('Dont have account ?')); ?>

                            <a href="<?php echo e(route('store.usercreate', $slug)); ?>"
                                class="login-form-main-a text-primary"><?php echo e(__('Register')); ?></a>
                        </p>
                        <?php echo e(Form::text('email', null, ['class' => '', 'placeholder' => __('Enter Your Email')])); ?>

                        
                    </div>
                    <div class="col-md-7">
                        
                        <?php echo e(Form::password('password', ['class' => '', 'id' => 'exampleInputPassword1', 'placeholder' => __('Enter Your Password')])); ?>

                    </div>
                </div>
                <div class="custom-control custom-checkbox">
                    
                    <label class="custom-control-label" for="exampleCheck3">
                        <?php echo e(__('By using the system, you accept the')); ?> <a href="" class="text-primary">
                            <?php echo e(__('Privacy Policy')); ?> </a> <?php echo e(__('and')); ?> <a href="" class="text-primary">
                            <?php echo e(__('System Regulations')); ?>. </a>
                    </label>
                </div>


                <button type="submit" class="submit-btn default-btn gradient">
                    <span><?php echo e(__('Sign In')); ?></span>
                </button>
                
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        if ('<?php echo !empty($is_cart) && $is_cart == true; ?>') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme13to15', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme13/user/login.blade.php ENDPATH**/ ?>