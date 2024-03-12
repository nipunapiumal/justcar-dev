<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Privacy Policy')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('language-bar'); ?>
        <li class="nav-item">
            <select name="language" id="language" class="btn-primary custom_btn ms-2 me-2 language_option_bg" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <?php $__currentLoopData = App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('privacy',$language)); ?>"><?php echo e(Str::upper($language)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card-body">
            <div class="">
                <h2 class="mb-3 f-w-600"><?php echo e(__('Privacy Policy')); ?></h2>
            </div>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </div>
  
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
<script src="<?php echo e(asset('custom/libs/jquery/dist/jquery.min.js')); ?>"></script>
<script>
$(document).ready(function () {
  $(".form_data").submit(function (e) {
      $(".login_button").attr("disabled", true);
      return true;
  });
});
</script>
<?php if(env('RECAPTCHA_MODULE') == 'yes'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/agreement/privacy.blade.php ENDPATH**/ ?>