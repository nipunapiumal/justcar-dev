<?php
// get theme color
$setting = App\Models\Utility::colorset();
$color = 'theme-3';
if (!empty($setting['color'])) {
    $color = $setting['color'];
}
$users = \Auth::user();
$currantLang = $users->currentLanguages();
$languages = \App\Models\Utility::languages();
$footer_text = isset(\App\Models\Utility::settings()['footer_text']) ? \App\Models\Utility::settings()['footer_text'] : '';
?>

<!DOCTYPE html>
<html lang="en" dir="<?php echo e($setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


<body class="<?php echo e($color); ?>">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Main Content ] start -->
    <div class="container">
                <!-- [ Main Content ] start -->
                <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

</body>

</html>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/layouts/pdf.blade.php ENDPATH**/ ?>