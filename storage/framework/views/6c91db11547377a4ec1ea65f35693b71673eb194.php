<!DOCTYPE html>
<html lang="en" dir="<?php echo e(env('SITE_RTL') == 'on' ? 'rtl' : ''); ?>">
<?php
    //$full_page -  for specific conditions, such as having navigation or not
    if (!isset($full_page)) {
        $full_page = false;
    }
    $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
    $userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
    $settings = \DB::table('settings')
        ->where('name', 'company_favicon')
        ->where('created_by', $store->id)
        ->first();

    $creator = \App\Models\User::find($store->created_by);
    $plan = \App\Models\Plan::find($creator->plan);

    $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);

?>

<head>
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


    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/animate.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/bootstrap-submenu.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/leaflet.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/map.css')); ?>" type="text/css">

    
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme23to28/fonts/linearicons/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/jquery.mCustomScrollbar.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/dropzone.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/lightbox.min.css')); ?>">
    

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/slick.css')); ?>">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/initial.css')); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/style.css')); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" id="style_sheet"
        href="<?php echo e(asset('assets/theme23to28/css/skins/midnight-blue.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/custom.css')); ?>" type="text/css">



    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('assets/theme23to28/css/ie10-viewport-bug-workaround.css')); ?>">



    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo e(asset('assets/theme23to28/js/ie-emulation-modes-warning.js')); ?>"></script>

</head>

<body>
    <div class="page_loader"></div>
    <?php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }
        $languages = \App\Models\Utility::languages($store->slug);
    ?>

    <?php if(!$full_page): ?>
        <!-- Main header start -->
        <header class="main-header sticky-header header-with-top" id="main-header-2">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logos" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                        <?php if(!empty($store->logo_dark)): ?>
                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                                alt="Image placeholder">
                        <?php else: ?>
                            <img class="" src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                alt="Image placeholder">
                        <?php endif; ?>
                    </a>
                    <button class="navbar-toggler" type="button" id="drawer">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="navbar-collapse collapse w-100 justify-content-end" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            

                            <?php
                                if (!isset($storethemesetting['primary_nav_menu'])) {
                                    $storethemesetting['primary_nav_menu'] = Utility::defaultMenu($storethemesetting, $store, $plan);
                                }
                            ?>

                            <?php if($storethemesetting['primary_nav_menu']): ?>
                                <?php $__currentLoopData = json_decode($storethemesetting['primary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="<?php echo e($info['link_url']); ?>">
                                                <?php echo e($info['link_name']); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if(isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu']): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo e(__('More')); ?>

                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <?php $__currentLoopData = json_decode($storethemesetting['secondary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li>
                                                    <a class="dropdown-item" href="<?php echo e($info['link_url']); ?>">
                                                        <?php echo e($info['link_name']); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?>

                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                                                <?php echo e(__('My Dashboard')); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)])); ?>">

                                                <?php echo e(__('My Profile')); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('customer.home', $store->slug)); ?>" class="nav-link">

                                                <?php echo e(__('My Orders')); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <?php if(Utility::CustomerAuthCheck($store->slug) == false): ?>
                                                <a class="dropdown-item"
                                                    href="<?php echo e(route('customer.login', $store->slug)); ?>"
                                                    class="nav-link">
                                                    <?php echo e(__('Sign in')); ?>

                                                </a>
                                            <?php else: ?>
                                                <a class="dropdown-item" href="#"
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
                            <?php endif; ?>

                            <?php if(Utility::CustomerAuthCheck($store->slug) != true): ?>
                                <li>
                                    <a href="<?php echo e(route('customer.login', [$store->slug])); ?>" class="nav-link h-icon">
                                        <?php echo e(__('Log in')); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('store.usercreate', [$store->slug])); ?>" class="nav-link h-icon">
                                        <?php echo e(__('Register')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                                <li>
                                    <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>" class="nav-link h-icon">
                                        <i class="far fa-heart fa-lg position-relative">
                                            <span
                                                class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                                                style="font-family: sans-serif;font-size: 10px;"
                                                id="wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                                        </i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo e(route('store.cart', $store->slug)); ?>" class="nav-link h-icon">
                                    <i class="fas fa-shopping-cart fa-lg position-relative">
                                        <span
                                            class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                            style="font-family: sans-serif;font-size: 10px;"
                                            id="shopping_count"><?php echo e(!empty($total_item) ? $total_item : '0'); ?></span>
                                    </i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Main header end -->

        <!-- Sidenav start -->
        <nav id="sidebar" class="nav-sidebar">
            <!-- Close btn-->
            <div id="dismiss">
                <i class="fas fa-times"></i>
            </div>
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    <?php if(!empty($store->logo_dark)): ?>
                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                            alt="Image placeholder">
                    <?php else: ?>
                        <img class="logo1 img-fluid" src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                            alt="Image placeholder">
                    <?php endif; ?>
                </div>
                <div class="sidebar-navigation">
                    <h3 class="heading"><?php echo e(__('View')); ?></h3>
                    <ul class="menu-list">
                        
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
                                <a class="pt0" href="#">
                                    <?php echo e(__('More')); ?>

                                    <em class="fas fa-chevron-down"></em>
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
                            <li>
                                <a class="pt0" href="#">
                                    <?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?> <em
                                        class="fas fa-chevron-down"></em>
                                </a>
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
                                        <a href="<?php echo e(route('customer.home', $store->slug)); ?>" class="nav-link">

                                            <?php echo e(__('My Orders')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <?php if(Utility::CustomerAuthCheck($store->slug) == false): ?>
                                            <a href="<?php echo e(route('customer.login', $store->slug)); ?>" class="nav-link">
                                                <?php echo e(__('Sign in')); ?>

                                            </a>
                                        <?php else: ?>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                                class="nav-link">
                                                <?php echo e(__('Logout')); ?>

                                            </a>
                                            <form id="customer-frm-logout"
                                                action="<?php echo e(route('customer.logout', $store->slug)); ?>" method="POST"
                                                class="d-none">
                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if(Utility::CustomerAuthCheck($store->slug) != true): ?>
                            <li>
                                <a href="<?php echo e(route('customer.login', [$store->slug])); ?>">
                                    <?php echo e(__('Log in')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('store.usercreate', [$store->slug])); ?>">
                                    <?php echo e(__('Register')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php if($storethemesetting['enable_sidebar_panel'] == 'on'): ?>
                    <div class="get-in-touch">
                        <h3 class="heading"><?php echo e(__('Quick contact info')); ?></h3>
                        <div class="get-in-touch-box d-flex">
                            <i class="fa fa-phone"></i>
                            <div class="detail">
                                <a
                                    href="tel:<?php echo e($storethemesetting['contact_info_phone_no']); ?>"><?php echo e($storethemesetting['contact_info_phone_no']); ?></a>
                            </div>
                        </div>
                        <div class="get-in-touch-box d-flex">
                            <i class="fas fa-envelope"></i>
                            <div class="detail">
                                <a href="#"><?php echo e($storethemesetting['contact_info_email']); ?></a>
                            </div>
                        </div>
                        <div class="get-in-touch-box d-flex mb-0">
                            <i class="fas fa-location-arrow"></i>
                            <div class="detail">
                                <a href="#"><?php echo nl2br(e($storethemesetting['office_address'])); ?></a>
                            </div>
                        </div>
                        <div class="get-in-touch-box d-flex mb-0">
                            <i class="fas fa-clock"></i>
                            <div class="detail">
                                <a href="#"><?php echo nl2br(e($storethemesetting['opening_hours'])); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
        <!-- Sidenav end -->
    <?php endif; ?>


    <?php echo $__env->yieldContent('content'); ?>

    <?php if(!$full_page): ?>
        <!-- Footer start -->
        <footer class="main-footer-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-image">
                            <a href="#">
                                <?php if(
                                    !empty($storethemesetting['footer_logo']) &&
                                        \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo'])): ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo']))); ?>"
                                        alt="Footer logo" class="f-logo">
                                <?php else: ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/footer_logo.png'))); ?>"
                                        alt="Footer logo" class="f-logo">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="footer-menu">
                            <ul>
                                <?php if($storethemesetting['primary_nav_menu']): ?>
                                    <?php $__currentLoopData = json_decode($storethemesetting['primary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                        <li class="li">
                                                <a class="nav-link" href="<?php echo e($info['link_url']); ?>">
                                                    <?php echo e($info['link_name']); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                            <div class="social-media clearfix">
                                <div class="social-list-2">
                                    <ul>
                                        <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                            <li>
                                                <a class="bg-whatsapp"
                                                    href="https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>"
                                                    target="_blank">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['facebook'])): ?>
                                            <li>
                                                <a class="facebook-bg" href="<?php echo e($storethemesetting['facebook']); ?>"
                                                    target="_blank">
                                                    <i class="fab fa-facebook-square"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['twitter'])): ?>
                                            <li>
                                                <a class="twitter-bg" href="<?php echo e($storethemesetting['twitter']); ?>"
                                                    target="_blank">
                                                    <i class="fab fa-twitter-square"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['email'])): ?>
                                            <li>
                                                <a class="bg-github" href="mailto:<?php echo e($storethemesetting['email']); ?>">
                                                    <i class="far fa-envelope"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['instagram'])): ?>
                                            <li>
                                                <a class="bg-instagram" href="<?php echo e($storethemesetting['instagram']); ?>"
                                                    target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['youtube'])): ?>
                                            <li>
                                                <a class="bg-youtube" href="<?php echo e($storethemesetting['youtube']); ?>"
                                                    target="_blank">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                                <p> <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator)); ?>

                                </p>
                            <?php endif; ?>
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#language-selection-modal">
                                <i class="fa fa-language"></i> <?php echo e(\App\Models\Utility::getLangCodes($currantLang)); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end -->
    <?php endif; ?>

    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/bootstrap-submenu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/rangeslider.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.mb.YTPlayer.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.scrollUp.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme23to28/js/leaflet.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme23to28/js/leaflet-providers.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme23to28/js/leaflet.markercluster.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.filterizr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.countdown.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.mousewheel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/lightgallery-all.js')); ?>"></script>
    
    <script src="<?php echo e(asset('assets/theme23to28/js/maps.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/sidebar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme23to28/js/app.js')); ?>"></script>

    <!-- Custom js from entire application here -->
    <script src="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo e(asset('assets/theme23to28/js/ie10-viewport-bug-workaround.js')); ?>"></script>
    <?php echo $__env->make('storefront.layout.additional-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/layout/theme24.blade.php ENDPATH**/ ?>