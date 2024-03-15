<?php
    // get theme color
    $setting = App\Models\Utility::colorset();
    $color = 'theme-4';
    if (!empty($setting['color'])) {
        $color = $setting['color'];
    }
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
    dir="<?php echo e(isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e(config('app.name', 'Laravel')); ?>">
    <title>
        <?php echo e(\App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'Laravel')); ?>

        - <?php echo $__env->yieldContent('page-title'); ?></title>

    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/')) . '/favicon.png'); ?>" type="image/png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">

    <link rel="stylesheet"
        href="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.css')); ?>">

    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">
    <?php if($setting['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php endif; ?>
    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php endif; ?>
</head>

<body id="auth-bg" class="<?php echo e($color); ?>">
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->yieldPushContent('custom-scripts'); ?>
    <!-- Custom js from entire application here -->
    <script src="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/custom.js?v=3')); ?>"></script>

    <?php if(Session::has('success')): ?>
        <script>
            showToast('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
            // show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            showToast('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
            // show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>

    <?php echo $__env->yieldPushContent('script'); ?>

</body>

</html>
<?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/layouts/authv2.blade.php ENDPATH**/ ?>