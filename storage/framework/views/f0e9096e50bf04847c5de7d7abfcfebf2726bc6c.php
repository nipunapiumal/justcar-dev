<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="auth">
    <aside>
        <figure>
            <a href="<?php echo e(route('dashboard')); ?>">
                <img src="<?php echo e(asset(Storage::url('uploads/logo/' . \App\Models\Utility::GetLogo()))); ?>"
                    alt="<?php echo e(config('app.name', 'Storego')); ?>" width="150">
            </a>
            <div class="mt-4 text-center">
                <h4 class="f-w-600"><?php echo e(__('Login')); ?></h4>
                
            </div>
        </figure>
        <form method="POST" action="<?php echo e(route('login')); ?>" class="needs-validation mt-4" novalidate="">
            <?php echo csrf_field(); ?>
            <div>
                <div class="form-group mb-3">
                    <label class="form-label"><?php echo e(__('Email')); ?></label>
                    <input id="email" type="email"
                        class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                        value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('E-Mail Address')); ?>" required autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                            <small><?php echo e($message); ?></small>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><?php echo e(__('Password')); ?></label>
                    <input id="password" type="password"
                        class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                        placeholder="<?php echo e(__('Password')); ?>" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-password text-danger" role="alert">
                            <small><?php echo e($message); ?></small>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php if(Route::has('password.request')): ?>
                        <div class="mt-2">
                            <a href="<?php echo e(route('password.request', $lang)); ?>"
                                class="small text-muted text-underline--dashed border-primar"><?php echo e(__('Forgot Your Password?')); ?></a>
                        </div>
                        <div class="mt-2">
                            <p>
                                <?php echo e(__('By using the system, you accept the')); ?>

                                <a href="<?php echo e(route("privacy")); ?>" class="text-primary"> <?php echo e(__('Privacy Policy')); ?> </a> and
                                <a href="<?php echo e(route("terms")); ?>" class="text-primary"> <?php echo e(__('Term & condition')); ?>. </a>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if(env('RECAPTCHA_MODULE') == 'yes'): ?>
                    <div class="form-group col-lg-12 col-md-12 mt-3">
                        <?php echo NoCaptcha::display(); ?>

                        <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error small text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                <?php endif; ?>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block mt-2"
                        tabindex="4"><?php echo e(__('Login')); ?></button>
                </div>

                <?php if(Utility::getValByName('signup_button') == 'on'): ?>
                    <p class="my-4 text-center"><?php echo e(__("Don't have an account?")); ?>

                        <a href="<?php echo e(route('register', $lang)); ?>"
                            class="my-4 text-primary"><?php echo e(__('Register')); ?></a>
                    </p>
                <?php endif; ?>
            </div>
        </form>
        <div class="copy">
            &copy;
            <?php echo e(Utility::getValByName('footer_text') ? Utility::getValByName('footer_text') : config('app.name', 'WorkGo')); ?>

            <?php echo e(date('Y')); ?>

        </div>

    </aside>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <script src="<?php echo e(asset('custom/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script>
        // $(document).ready(function() {
        //     $(".form_data").submit(function(e) {
        //         $(".login_button").attr("disabled", true);
        //         return true;
        //     });
        // });
    </script>
    <?php if(env('RECAPTCHA_MODULE') == 'yes'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.authv2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar/resources/views/auth/login.blade.php ENDPATH**/ ?>