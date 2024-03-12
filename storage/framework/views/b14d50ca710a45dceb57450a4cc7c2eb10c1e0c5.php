<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="font-weight-bold text-dark"><?php echo e(__('Customer')); ?> <?php echo e(__('login')); ?></h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb d-block text-center">
                    <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="active"><?php echo e(__('Login')); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-6 mb-5 mb-lg-0">
            
            <?php echo Form::open(
                [
                    'route' => ['customer.login', $slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                    'id' => 'contact-form',
                ],
                ['method' => 'POST'],
            ); ?>

                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3"><?php echo e(__('Email')); ?> <span class="text-color-danger">*</span></label>
                        <?php echo e(Form::text('email', null, ['class' => 'form-control form-control-lg text-4', 'placeholder' => __('Enter Your Email')])); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3"> <?php echo e(__('Password')); ?> <span class="text-color-danger">*</span></label>
                        <?php echo e(Form::password('password', ['class' => 'form-control form-control-lg text-4', 'placeholder' => __('Enter Your Password')])); ?>

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
                        <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading..."><?php echo e(__('Sign In')); ?></button>
                    </div>
                    <p class="text-center"><?php echo e(__('Dont have account ?')); ?>

                        <a href="<?php echo e(route('store.usercreate', $slug)); ?>"><?php echo e(__('Register')); ?></a>
                        </p>
                </div>
                <?php echo e(Form::close()); ?>

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

<?php echo $__env->make('storefront.layout.themePlus1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/themePlus1/user/login.blade.php ENDPATH**/ ?>