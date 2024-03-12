<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
   
   
<!-- Our SigIn -->
<section class="our-log bgc-f9 bgc-white">
    <div class="container">
        <div class="row justify-content-center">
    <div class="col-md-6 col-lg-6 col-xl-5 ">
      <div class="login_form mt60-sm">
        <h2 class="title"><?php echo e(__('Customer')); ?> <span> <?php echo e(__('login')); ?> </span></h2>


        <p>
        <?php echo e(__('Dont have account ?')); ?>

        <a href="<?php echo e(route('store.usercreate',$slug)); ?>" class="login-form-main-a text-primary"><?php echo e(__('Register')); ?></a>
        </p>
        <?php echo Form::open(array('route' => array('customer.login', $slug,(!empty($is_cart) && $is_cart==true)?$is_cart:false),'class'=>'login-form-main'),['method'=>'POST']); ?>

          <div class="mb-2 mr-sm-2">
                <label for="exampleInputEmail1" class="form-label float-left mt-2"><?php echo e(__('username')); ?></label>
                <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))); ?>

          </div>
          <div class="form-group mb5">
            <label for="exampleInputPassword1" class="form-label float-left"><?php echo e(__('Password')); ?></label>
            <?php echo e(Form::password('password',array('class'=>'form-control','id'=>'exampleInputPassword1','placeholder'=>__('Enter Your Password')))); ?>

          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="exampleCheck3" checked>
            <label class="custom-control-label" for="exampleCheck3">
                <?php echo e(__('By using the system, you accept the')); ?> <a href="" class="text-primary"> <?php echo e(__('Privacy Policy')); ?> </a> <?php echo e(__('and')); ?> <a href="" class="text-primary"> <?php echo e(__('System Regulations')); ?>. </a>
            </label>
          </div>
          <button type="submit" class="btn btn-log btn-thm mt5"><?php echo e(__('Sign In')); ?></button>
          <?php echo e(Form::close()); ?>

      </div>
    </div>
        </div>
    </div>
</section>


        <?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        if ('<?php echo !empty($is_cart) && $is_cart==true; ?>') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme12/user/login.blade.php ENDPATH**/ ?>