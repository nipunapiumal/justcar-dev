<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Term & condition')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('language-bar'); ?>
    <li class="nav-item">
        <select name="language" id="language" class="btn-primary custom_btn ms-2 me-2 language_option_bg"
            onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
            <?php $__currentLoopData = App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('terms', $language)); ?>">
                    <?php echo e(Str::upper($language)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card-body">
                <div class="">
                    <h2 class="mb-3 f-w-600"><?php echo e(__('Term & condition')); ?></h2>
                </div>
                <?php
                    $term = Utility::getAdminSetting('term_and_condition');
                    $lang = App::getLocale();
                    if ($term) {
                        $term = json_decode($term);
                        $term = $term->$lang;
                        
                    }
                ?>
                <?php echo nl2br($term); ?>

                
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <script src="<?php echo e(asset('custom/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $(".form_data").submit(function(e) {
                $(".login_button").attr("disabled", true);
                return true;
            });
        });
    </script>
    <?php if(env('RECAPTCHA_MODULE') == 'yes'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/agreement/terms.blade.php ENDPATH**/ ?>