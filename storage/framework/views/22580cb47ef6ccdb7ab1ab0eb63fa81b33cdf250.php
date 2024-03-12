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
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/vendors/bootstrap.min.css')); ?>">
   
   <!-- Fontawesome all CSS -->
   

   <!-- Fontawesome Icon CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/fonts/fontawesome/css/all.min.css')); ?>">

   <!-- Icomoon Icon CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/fonts/icomoon/style.css')); ?>">
   <!-- NoUi Range Slider -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/vendors/nouislider.min.css')); ?>">
   <!-- Magnific Popup CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/vendors/magnific-popup.min.css')); ?>">
   <!-- Swiper Slider -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/vendors/swiper-bundle.min.css')); ?>">
   <!-- Nice Select -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/vendors/nice-select.css')); ?>">
   <!-- AOS Animation CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/vendors/aos.min.css')); ?>">
   <!-- Animate CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/vendors/animate.min.css')); ?>">
   <!-- Main Style CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/style.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/custom.css')); ?>">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/css/custom.css')); ?>" type="text/css">
   
    <?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme35to37/header-type-1.blade.php ENDPATH**/ ?>