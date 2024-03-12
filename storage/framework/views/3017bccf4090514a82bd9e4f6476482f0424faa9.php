<?php
$logo = asset(Storage::url('uploads/logo/'));
$favicon = \App\Models\Utility::getValByName('company_favicon');

?>

<head>
    <meta charset="utf-8"  dir="<?php echo e($setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=  ">
    <meta name="description" content="<?php echo e(env('APP_NAME')); ?> - Online Store Builder">

    <title>
        <?php echo e(\App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'Laravel')); ?>

        - <?php echo $__env->yieldContent('page-title'); ?></title>
    <?php if(\Auth::user()->type == 'super admin'): ?>
        <link rel="icon" href="<?php echo e($logo . '/favicon.png'); ?>" type="image" sizes="16x16">
    <?php else: ?>
        <link rel="icon" href="<?php echo e($logo . '/' . (isset($favicon) && !empty($favicon) ? $favicon : 'favicon.png')); ?>"
            type="image" sizes="16x16">
    <?php endif; ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <?php if(\Auth::user()->type == 'Owner'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-tour-standalone.min.css')); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css')); ?>">

    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <!-- <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>"> -->
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    
        <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/select2/dist/css/select2.min.css')); ?>">
    <!-- vendor css -->

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/landing.css')); ?>">
    
    
    
    


    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">
    

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/style.css')); ?>">
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">


    <?php if(isset($setting['SITE_RTL'] ) && $setting['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php endif; ?>
    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('css-page'); ?>
    <script>
        var jsLang = <?php echo json_encode(\App\Models\Utility::jsLanguageAdmin(), 15, 512) ?>;

    </script>
</head>
<?php /**PATH /Users/nippasmac/Sites/justcar/resources/views/partials/admin/head.blade.php ENDPATH**/ ?>