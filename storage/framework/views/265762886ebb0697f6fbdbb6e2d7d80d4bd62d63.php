<!DOCTYPE html>
<html lang="en" dir="<?php echo e(env('SITE_RTL') == 'on' ? 'rtl' : ''); ?>">
<?php
    $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
    $userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
    $settings = \DB::table('settings')
        ->where('name', 'company_favicon')
        ->where('created_by', $store->id)
        ->first();

    $creator = \App\Models\User::find($store->created_by);
    $plan = \App\Models\Plan::find($creator->plan);

?>

<head>
    <?php if(!empty($store->cookiebot_group_id) && $store->is_cookiebot_enable == 'on'): ?>
        <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="<?php echo $store->cookiebot_group_id; ?>"
            data-blockingmode="auto" type="text/javascript"></script>
    <?php endif; ?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link rel="icon"
        href="<?php echo e(asset(Storage::url('uploads/logo/') . (!empty($settings->value) ? $settings->value : 'favicon.png'))); ?>"
        type="image/png">

    <!-- Google Fonts -->
    
    <!-- All css here -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/bootstrap.min.css')); ?>">

    <!-- Fontawesome Icon CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/fonts/fontawesome/css/all.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/meanmenu.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/linear-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/stroke-gan-icon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/shortcode/shortcodes.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/responsive.css?v=2')); ?>">


    <script src="<?php echo e(asset('assets/theme13to15/js/vendor/modernizr-2.8.3.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('css-page'); ?>

</head>
<?php
    $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
?>

<body>
    <?php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }
        $languages = \App\Models\Utility::languages($store->slug);
    ?>

    <!-- Header Area Start -->
    <header
        class="<?php echo e($store->theme_dir == 'theme14' || $store->theme_dir == 'theme15' ? 'header-full-area' : 'header-area'); ?> fixed">
        <?php if($storethemesetting['enable_top_bar'] == 'on'): ?>
            <div class="header-top hidden-xs">
                <div
                    class="<?php echo e($store->theme_dir == 'theme14' || $store->theme_dir == 'theme15' ? 'container-fluid' : 'container'); ?>">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-left">
                                <span>
                                    <?php echo e(!empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199'); ?>

                                    - <?php echo e(__('Contact Us')); ?>:
                                    <?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220'); ?>

                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="social-links">

                                <?php if(!empty($storethemesetting['top_bar_whatsapp'])): ?>
                                    <a class="" href="https://wa.me/<?php echo e($storethemesetting['top_bar_whatsapp']); ?>"
                                        target="_blank">
                                        <span class="fab fa-whatsapp"></span>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['top_bar_instagram'])): ?>
                                    <a class="" href="<?php echo e($storethemesetting['top_bar_instagram']); ?>"
                                        target="_blank">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['top_bar_twitter'])): ?>
                                    <a class="" href="<?php echo e($storethemesetting['top_bar_twitter']); ?>"
                                        target="_blank">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['top_bar_messenger'])): ?>
                                    <a class="" href="<?php echo e($storethemesetting['top_bar_messenger']); ?>"
                                        target="_blank">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                <?php endif; ?>
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="header-bottom header-sticky">
            <div
                class="<?php echo e($store->theme_dir == 'theme14' || $store->theme_dir == 'theme15' ? 'container-fluid' : 'container'); ?>">
                <div class="row">
                    <div class="col-lg-2 col-md-12">
                        <div class="logo">
                            <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                                <?php if(!empty($store->logo)): ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                        alt="Image placeholder" width="95px">
                                <?php else: ?>
                                    <img class="logo1 img-fluid"
                                        src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                        alt="Image placeholder" width="95px">
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="main-menu mean-menu">
                            <nav>
                                <ul>

                                    <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>

                                    <?php
                                        if (!isset($storethemesetting['primary_nav_menu'])) {
                                            $storethemesetting['primary_nav_menu'] = Utility::defaultMenu($storethemesetting, $store, $plan);
                                        }
                                    ?>

                                    <?php if($storethemesetting['primary_nav_menu']): ?>
                                        <?php $__currentLoopData = json_decode($storethemesetting['primary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li>
                                                    <a href="<?php echo e($info['link_url']); ?>">
                                                        <?php echo e($info['link_name']); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    <?php if(isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu']): ?>
                                        <li>
                                            <a href="#">
                                                <i class="icon-arrow-down"></i> <?php echo e(__('More')); ?>

                                            </a>
                                            <ul>
                                                <?php $__currentLoopData = json_decode($storethemesetting['secondary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                        <li>
                                                            <a href="<?php echo e($info['link_url']); ?>">
                                                                <?php echo e($info['link_name']); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>


                                    <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                                        <li class="nav-icons">
                                            <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>">
                                                <i class="far fa-heart fa-lg position-relative"
                                                    style="display: inline-block">
                                                    <span
                                                        class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                        style="font-family: sans-serif;display: inline-block;font-size:10px;"
                                                        id="wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                                                </i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="nav-icons">
                                        <a href="<?php echo e(route('store.cart', $store->slug)); ?>">
                                            <i class="fas fa-shopping-cart fa-lg position-relative"
                                                style="display: inline-block">
                                                <span
                                                    class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                    style="font-family: sans-serif;display: inline-block;font-size:10px;"
                                                    id="shopping_count"><?php echo e(!empty($total_item) ? $total_item : '0'); ?></span>

                                            </i>
                                        </a>
                                    </li>

                                    
                                    


                                    <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>

                                        <li class=""><a href="javascript:void(0)">
                                                <?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?><i
                                                    class="icon-arrow-down"></i></a>
                                            <ul>

                                                <li>
                                                    <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                                                        <?php echo e(__('My Dashboard')); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="<?php echo e(route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)])); ?>">

                                                        <?php echo e(__('My Profile')); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(route('customer.home', $store->slug)); ?>"
                                                        class="nav-link">

                                                        <?php echo e(__('My Orders')); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <?php if(Utility::CustomerAuthCheck($store->slug) == false): ?>
                                                        <a href="<?php echo e(route('customer.login', $store->slug)); ?>"
                                                            class="nav-link">
                                                            <?php echo e(__('Sign in')); ?>

                                                        </a>
                                                    <?php else: ?>
                                                        <a href="#"
                                                            onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                                            class="nav-link">
                                                            <?php echo e(__('Logout')); ?>

                                                        </a>
                                                        <form id="customer-frm-logout"
                                                            action="<?php echo e(route('customer.logout', $store->slug)); ?>"
                                                            method="POST" class="d-none">
                                                            <?php echo e(csrf_field()); ?>

                                                        </form>
                                                    <?php endif; ?>
                                                </li>

                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a href="<?php echo e(route('customer.login', [$store->slug])); ?>">
                                                <?php echo e(__('Log in')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                                        
                                    <?php endif; ?>
                                    





                                    
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md"></div>
                    </div>
                    <div class="col-lg-2 col-md-12 d-flex align-items-center justify-content-between right-content">
                        <div class="prime-select">
                            <select>
                                <option value="">
                                    <?php echo e(\App\Models\Utility::getLangCodes($currantLang)); ?></option>
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        onclick="window.location = '<?php echo e(route('change.languagestore', [$store->slug, $language])); ?>';">
                                        <?php echo e(\App\Models\Utility::getLangCodes($language)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                            <div>
                                <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>">
                                    <i class="far fa-heart fa-lg text-light position-relative">
                                        <span
                                            class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                            style="font-family: sans-serif;font-size:10px;"
                                            id="wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                                    </i>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div>
                            <a href="<?php echo e(route('store.cart', $store->slug)); ?>">
                                <i class="fas fa-shopping-cart fa-lg text-light position-relative">
                                    <span
                                        class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        style="font-family: sans-serif;font-size:10px;"
                                        id="shopping_count">
                                        <?php echo e(!empty($total_item) ? $total_item : '50'); ?>

                                    </span>

                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->


    

    <?php echo $__env->yieldContent('content'); ?>


    <!-- Footer Area Start -->
    <footer class="footer-area bg-5">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <?php if(isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on'): ?>
                        <div class="col-lg-2 col-md-4 col-xs-12">
                            <div class="single-footer-widget">
                                <h5 class="pb-35"><?php echo e(__($storethemesetting['quick_link_header_name1'])); ?></h5>
                                <?php if(isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1']): ?>
                                    <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_1']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                            <p>
                                                <a href="<?php echo e($info['link_url']); ?>">
                                                    <?php echo e($info['link_name']); ?>

                                                </a>
                                            </p>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                
                                
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_quick_link2']) && $storethemesetting['enable_quick_link2'] == 'on'): ?>
                        <div class="col-lg-2 col-md-4 col-xs-12">
                            <div class="single-footer-widget">
                                <h5 class="pb-35"><?php echo e(__($storethemesetting['quick_link_header_name2'])); ?></h5>
                                <?php if(isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2']): ?>
                                    <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_2']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                            <p>
                                                <a href="<?php echo e($info['link_url']); ?>">
                                                    <?php echo e($info['link_name']); ?>

                                                </a>
                                            </p>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_quick_link3']) && $storethemesetting['enable_quick_link3'] == 'on'): ?>
                        <div class="col-lg-2 col-md-4 col-xs-12">
                            <div class="single-footer-widget">
                                <h5 class="pb-35"><?php echo e(__($storethemesetting['quick_link_header_name3'])); ?></h5>
                                <?php if(isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3']): ?>
                                    <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_3']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                            <p>
                                                <a href="<?php echo e($info['link_url']); ?>">
                                                    <?php echo e($info['link_name']); ?>

                                                </a>
                                            </p>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_quick_link3']) && $storethemesetting['enable_quick_link3'] == 'on'): ?>
                        <div class="col-lg-6 col-md-4 col-xs-12">
                            <div class="single-footer-widget">
                                <div class="footer-logo">
                                    <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                                        <?php if(
                                            !empty($storethemesetting['footer_logo']) &&
                                                \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo'])): ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo']))); ?>"
                                                alt="Footer logo" style="height: 26px;">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/footer_logo.png'))); ?>"
                                                alt="Footer logo" style="height: 26px;">
                                        <?php endif; ?>


                                    </a>




                                </div>
                                <?php if($storethemesetting['enable_sidebar_panel'] == 'on'): ?>
                                    <p class="pr-10">
                                        <?php echo e($storethemesetting['quick_contact_info']); ?>

                                    </p>
                                    <div class="footer-info-wrapper">
                                        <div class="f-info">
                                            <span class="icon icon-Pointer"></span>
                                            <span class="f-info-text"><?php echo e(__('Office Address')); ?> :
                                                <?php echo e($storethemesetting['office_address']); ?></span>
                                        </div>
                                        <div class="f-info">
                                            <span class="icon icon-Phone"></span>
                                            <span class="f-info-text"><?php echo e(__('Contact Us')); ?>:
                                                <?php echo e($storethemesetting['contact_info_phone_no']); ?></span>
                                        </div>
                                        <div class="f-info">
                                            <span class="icon icon-Mail"></span>
                                            <span class="f-info-text"><?php echo e(__('Email')); ?>:
                                                <?php echo e($storethemesetting['contact_info_email']); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php if($storethemesetting['enable_footer'] == 'on'): ?>
            <div class="footer-bottom">
                <div class="footer-border"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-md-12">
                            <div class="footer-links-copyright">
                                <span>
                                    <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator)); ?>

                                </span>
                                <div class="social-links">
                                    <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                        <a href="https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['facebook'])): ?>
                                        <a href="<?php echo e($storethemesetting['facebook']); ?>" target="_blank">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['twitter'])): ?>
                                        <a href="<?php echo e($storethemesetting['twitter']); ?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['email'])): ?>
                                        <a href="mailto:<?php echo e($storethemesetting['email']); ?>" target="_blank">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['instagram'])): ?>
                                        <a href="<?php echo e($storethemesetting['instagram']); ?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['youtube'])): ?>
                                        <a href="<?php echo e($storethemesetting['youtube']); ?>" target="_blank">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    <?php endif; ?>


                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endif; ?>

    </footer>
    <!-- Footer Area End -->




    <!-- All js here -->
    <script src="<?php echo e(asset('assets/theme13to15/js/vendor/jquery-1.12.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/jquery.meanmenu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/slick.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/theme13to15/js/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/imagesloaded.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/ajax-mail.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/main.js')); ?>"></script>

    <!-- Custom js from entire application here -->
    <script src="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>


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
    <?php echo $__env->make('storefront.layout.additional-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme13to15.blade.php ENDPATH**/ ?>