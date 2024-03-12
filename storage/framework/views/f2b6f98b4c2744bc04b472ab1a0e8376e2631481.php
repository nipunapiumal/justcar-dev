
<!DOCTYPE html>
<html lang="en" dir="<?php echo e(env('SITE_RTL') == 'on'?'rtl':''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="StoreGo - Business Ecommerce">


    <title><?php echo e(__('Completed')); ?> - <?php echo e(($store->tagline) ?  $store->tagline : config('APP_NAME', 'StoreGo')); ?></title>

    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/').(!empty($settings->value)?$settings->value:'favicon.png'))); ?>" type="image/png">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/landing.css')); ?>"/>
    <?php if(env('SITE_RTL')=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('css-page'); ?>
</head>
<body>

<div class="main-content">
    <section class="">
        <div class="main-content">
            <section class="mh-100vh d-flex align-items-center" data-offset-top="#header-main">
                <div class="bg-absolute-cover bg-size--contain d-flex align-items-center zindex0">
                    <figure class="w-100 success_img">
                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/bg-2.svg')); ?>" class="svg-inject success_img">
                    </figure>
                </div>
                <div class="container pt-3 position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="text-center pt-3">
                                <!-- SVG illustration -->
                                <div class="row justify-content-center mb-5">
                                    <div class="col-md-5">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/celebration.png')); ?>" class="svg-inject img-fluid">
                                    </div>
                                </div>
                                <!-- Empty cart container -->
                                <h6 class="h4 my-2"><?php echo e(__('Your Order Successfully Completed')); ?>.</h6>
                                <p class="px-md-5 mb-3 text-center">
                                    <?php echo e(__('We received your purchase request')); ?>,<br>
                                    <?php echo e(__('we\'ll be in touch shortly')); ?>!
                                </p>

                                <div class="input-group mb-3">
                                    <input type="text" value="<?php echo e(route('user.order',[$store->slug,$order_id])); ?>" id="myInput" class="form-control d-inline-block" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="button" onclick="myFunction()" id="button-addon2"><i class="far fa-copy"></i> <?php echo e(__('Copy Link')); ?></button>
                                    </div>
                                </div>

                                <a href="<?php echo e(route('store.slug',$store->slug)); ?>" class="btn btn-sm btn-primary btn-icon rounded-pill mt-5">
                                    <span class="btn-inner--icon"><i class="fas fa-angle-left"></i></span>
                                    <span class="btn-inner--text"><?php echo e(__('Return to shop')); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
<script src="<?php echo e(asset('custom/js/jquery.min.js')); ?>"></script>
<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
<!-- notify -->
<script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>

<script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<!-- Page JS -->
<script src="<?php echo e(asset('custom/libs/swiper/dist/js/swiper.min.js')); ?>"></script>
<!-- Site JS -->
<!-- Demo JS - remove it when starting your project -->
<!-- Global site tag (gtag.js) - Google Analytics -->

<?php
    $store_settings = \App\Models\Store::where('slug',$store->slug)->first();
?>

<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($store_settings->google_analytic); ?>"></script>
<?php echo $store_settings->storejs; ?>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', '<?php echo e(!empty($store_settings->google_analytic)); ?>');
</script>

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo e(!empty($store_settings->fbpixel_code)); ?>');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript=<?php echo e($store_settings->fbpixel_code); ?>"
/></noscript>



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
<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        show_toastr('Success', 'Link copied', 'success');
    }
</script>
</body>

</html>


<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/complete.blade.php ENDPATH**/ ?>