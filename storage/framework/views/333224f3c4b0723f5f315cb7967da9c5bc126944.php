<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2><?php echo e(__('Login')); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75"><?php echo e(__('Login')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Authentication-area start -->
    <div class="authentication-area ptb-100">
        <div class="container">
            <div class="auth-form border">
                <?php echo Form::open(
                    [
                        'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                    ],
                    ['method' => 'POST'],
                ); ?>

                <div class="title">
                    <h4 class="mb-20"><?php echo e(__('Login')); ?></h4>
                </div>
                <div class="form-group mb-20">
                    <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Your Email')])); ?>

                </div>
                <div class="form-group mb-20">
                    <?php echo e(Form::password('password', ['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => __('Enter Your Password')])); ?>

                </div>
                <div class="row align-items-center mb-20">
                    
                    <div class="col-sm-12">
                        <div class="link">
                                <?php echo e(__('Dont have account ?')); ?>

                                <a href="<?php echo e(route('store.usercreate', $slug)); ?>" class="thembo"><?php echo e(__('Register')); ?></a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary w-100"> <?php echo e(__('Sign In')); ?> </button>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- Authentication-area end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        if ('<?php echo !empty($is_cart) && $is_cart == true; ?>') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme35', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme35/user/login.blade.php ENDPATH**/ ?>