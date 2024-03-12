<?php
    if ($plan->ad_free == 'off') {
        $i_ads = \App\Models\Advertisement::where('advertisement_type', 3)->get();
        $i_ads_arr = [];

        foreach ($i_ads as $i_ad) {
            $i_ads_arr[] = $i_ad->url;
            $i_ads_lutime = $i_ad->updated_at;
        }
    }
?>

<?php if(in_array($store->theme_dir, Utility::styleSwitcherEnabledThemes())): ?>
    
    
    

    
    

    <style>
        :root {
            --primary: <?php echo e(!empty($storethemesetting['premium_plus_primary_color']) ? $storethemesetting['premium_plus_primary_color'] : '#099fdc'); ?>;
            --secondary: <?php echo e(!empty($storethemesetting['premium_plus_secondary_color']) ? $storethemesetting['premium_plus_secondary_color'] : '#0b6afb'); ?>;
            --tertiary: <?php echo e(!empty($storethemesetting['premium_plus_tertiary_color']) ? $storethemesetting['premium_plus_tertiary_color'] : '#262c36'); ?>;
            --quaternary: <?php echo e(!empty($storethemesetting['premium_plus_quaternary_color']) ? $storethemesetting['premium_plus_quaternary_color'] : '#343c4a'); ?>;
        }
    </style>
<?php endif; ?>

<link rel="stylesheet" href="<?php echo e(asset('custom/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('custom/css/front-custom.css')); ?>" type="text/css">

<?php if(isset($i_ads_arr) && isset($i_ads_lutime)): ?>
    <script>
        interstitialAdURLs = <?php echo json_encode($i_ads_arr, 15, 512) ?>;
        interstitialAdLUTime = <?php echo json_encode($i_ads_lutime, 15, 512) ?>;
    </script>
<?php endif; ?>
<?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/layout/initialize-css.blade.php ENDPATH**/ ?>