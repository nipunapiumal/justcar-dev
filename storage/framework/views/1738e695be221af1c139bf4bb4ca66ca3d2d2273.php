<?php if(!empty($store->cookiebot_group_id) && $store->is_cookiebot_enable == 'on'): ?>
        <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="<?php echo $store->cookiebot_group_id; ?>"
            data-blockingmode="auto" type="text/javascript"></script>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo e($store->metakeyword); ?>">

    <?php if(isset($pageoption)): ?>
        <meta name="description" content="<?php echo e($pageoption->meta_description); ?>">
        <title><?php echo e($pageoption->meta_title); ?></title>
    <?php else: ?>
        <meta name="description" content="<?php echo e($store->metadesc); ?>">
        <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e($store->tagline ? $store->tagline : config('APP_NAME', ucfirst($store->name))); ?>

        </title>
    <?php endif; ?>

    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Favicon icon -->
    <link rel="icon"
        href="<?php echo e(asset(Storage::url('uploads/logo/') . (!empty($settings->value) ? $settings->value : 'favicon.png'))); ?>"
        type="image/png">

        <?php echo $__env->make('storefront.layout.initialize-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme29to34/css/bootstrap.min.css')); ?>">
    <link href="<?php echo e(asset('assets/theme29to34/css/jquery-ui.css')); ?>" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link href="<?php echo e(asset('assets/theme29to34/css/bootstrap-icons.css')); ?>" rel="stylesheet">
    <!-- Fontawesome all CSS -->
    
    
    <!-- Animate CSS -->
    <link href="<?php echo e(asset('assets/theme29to34/css/animate.min.css')); ?>" rel="stylesheet">
    <!-- FancyBox CSS -->
    <link href="<?php echo e(asset('assets/theme29to34/css/jquery.fancybox.min.css')); ?>" rel="stylesheet">

    <!-- Fontawesome CSS -->
    
    <!-- Swiper slider CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme29to34/css/swiper-bundle.min.css')); ?>">
    <!-- Slick slider CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme29to34/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme29to34/css/slick-theme.css')); ?>">
    <!-- Magnific-popup CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme29to34/css/magnific-popup.css')); ?>">
    <!-- BoxIcon  CSS -->
    <link href="<?php echo e(asset('assets/theme29to34/css/boxicons.min.css')); ?>" rel="stylesheet">
    <!-- Select2  CSS -->
    <link href="<?php echo e(asset('assets/theme29to34/css/nice-select.css')); ?>" rel="stylesheet">
    <!--  Style CSS  -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme29to34/css/style.css')); ?>">
    <!-- External CSS libraries -->

    


    <link rel="stylesheet" href="<?php echo e(asset('assets/theme29to34/css/custom.css')); ?>" type="text/css">

    <?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme29to34/header-type-1.blade.php ENDPATH**/ ?>