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

<?php echo $__env->make('partials.admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="<?php echo e($color); ?>">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>


    <!-- [ Main Content ] start -->
    <div class="page-content mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3">

                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo $__env->yieldContent('page-title'); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <?php echo $__env->yieldContent('breadcrumb'); ?>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <?php echo $__env->yieldContent('filter'); ?>
                    </div>
                    <div class="col-12 text-end">
                        <?php echo $__env->yieldContent('action-btn'); ?>
                    </div>
                </div>

            </div>

            <?php echo $__env->yieldContent('content'); ?>

        </div>
    </div>

    <?php echo $__env->yieldPushContent('custom-scripts'); ?>
    
    
    <script src="<?php echo e(asset('custom/js/jquery.min.js')); ?>"></script>
    
    
    
    
    
    
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    
    
    
    <!-- Page JS -->
    
    
    
    
    
    <script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/jquery.magnific-popup.min.js')); ?>"></script>
    
    
    
    
    
    
    
    
    <!-- Site JS -->
    
    <!-- datatable -->
    
    <!-- sweet alert Js -->
    
    
    
    
    
    
    
    
    <script src="<?php echo e(asset('custom/js/custom.js?v=3')); ?>"></script>
    <?php if(Session::has('success')): ?>
        <script>
            show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>
    <?php if(App\Models\Utility::getValByName('gdpr_cookie') == 'on'): ?>
        <script type="text/javascript">
            var defaults = {
                'messageLocales': {
                    /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                    'en': "<?php echo e(App\Models\Utility::getValByName('cookie_text')); ?>"
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'cookieNoticePosition': 'bottom',
                'learnMoreLinkEnabled': false,
                'learnMoreLinkHref': '/cookie-banner-information.html',
                'learnMoreLinkText': {
                    'it': 'Saperne di più',
                    'en': 'Learn more',
                    'de': 'Mehr erfahren',
                    'fr': 'En savoir plus'
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'expiresIn': 30,
                'buttonBgColor': '#d35400',
                'buttonTextColor': '#fff',
                'noticeBgColor': '#000',
                'noticeTextColor': '#fff',
                'linkColor': '#009fdd'
            };
        </script>
        <script src="<?php echo e(asset('custom/js/cookie.notice.js')); ?>"></script>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('script-page'); ?>






</body>

</html>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/layouts/adminv2.blade.php ENDPATH**/ ?>