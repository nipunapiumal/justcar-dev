<!DOCTYPE html>
<html lang="en" dir="<?php echo e(env('SITE_RTL') == 'on' ? 'rtl' : ''); ?>">
<?php
    //$full_page -  for specific conditions, such as having navigation or not
    if(!isset($full_page)){
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

    if ($plan->ad_free == 'off') {
        $i_ads = \App\Models\Advertisement::where('advertisement_type', 3)->get();
        $i_ads_arr = [];

        foreach ($i_ads as $i_ad) {
            $i_ads_arr[] = $i_ad->url;
            $i_ads_lutime = $i_ad->updated_at;
        }
    }

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

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/animate.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/bootstrap-submenu.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/leaflet.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/map.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme23to28/fonts/linearicons/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/jquery.mCustomScrollbar.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/dropzone.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/lightbox.min.css')); ?>">
    
    <link rel="stylesheet"
        href="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/slick.css')); ?>">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/initial.css')); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/style.css')); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" id="style_sheet"
        href="<?php echo e(asset('assets/theme23to28/css/skins/midnight-blue.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/theme23to28/css/custom.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/front-custom.css')); ?>" type="text/css">


    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=OSans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('assets/theme23to28/css/ie10-viewport-bug-workaround.css')); ?>">



    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo e(asset('assets/theme23to28/js/ie-emulation-modes-warning.js')); ?>"></script>
    <?php if(isset($i_ads_arr) && isset($i_ads_lutime)): ?>
        <script>
            interstitialAdURLs = <?php echo json_encode($i_ads_arr, 15, 512) ?>;
            interstitialAdLUTime = <?php echo json_encode($i_ads_lutime, 15, 512) ?>;
        </script>
    <?php endif; ?>
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
        <!-- Top header start -->
        <header class="top-header" id="top-header-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-7 col-7">
                        <?php if($storethemesetting['enable_top_bar'] == 'on'): ?>
                            <div class="list-inline">
                                <a href="#">
                                    <i class="fas fa-info"></i>
                                    <?php echo e(!empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199'); ?>

                                </a>
                                <a href="tel:<?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220'); ?>"
                                    class="d-none-768">
                                    <i class="fa fa-phone"></i>
                                    <?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220'); ?>

                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-5 col-5">
                        <ul class="top-social-media float-end">
                            <?php if(Utility::CustomerAuthCheck($store->slug) != true): ?>
                                <li>
                                    <a class="sign-in" href="<?php echo e(route('customer.login', [$store->slug])); ?>">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <?php echo e(__('Log in')); ?>

                                    </a>
                                </li>
                                <li>
                                    <a class="sign-in" href="<?php echo e(route('store.usercreate', [$store->slug])); ?>">
                                        <i class="fa fa-user"></i> <?php echo e(__('Register')); ?>

                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a class="sign-in" href=""
                                        onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();">
                                        <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Top header end -->


        <!-- Main header start -->
        <header class="main-header sticky-header header-with-top" id="main-header-4">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="header-left">
                    <a class="navbar-brand logos" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                        <?php if(!empty($store->logo_dark)): ?>
                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                                alt="Image placeholder">
                        <?php else: ?>
                            <img class="" src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                alt="Image placeholder">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="d-flex align-items-end d-md-none ">
                    <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                        <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>" class="pe-3">
                            <i class="far fa-heart fa-lg position-relative" style="top: -3px;">
                                <span
                                    class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                                    style="font-family: sans-serif;font-size: 10px;"
                                    id="wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                            </i>
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('store.cart', $store->slug)); ?>" class="pe-3">
                        <i class="fas fa-shopping-cart fa-lg position-relative" style="top: -3px;">
                            <span
                                class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                style="font-family: sans-serif;font-size: 10px;"
                                id="shopping_count"><?php echo e(!empty($total_item) ? $total_item : '0'); ?></span>

                        </i>
                    </a>
                    <button class="navbar-toggler" type="button" id="drawer">
                        <span class="fa fa-bars"></span>
                    </button>

                </div>

                
                <div class="header-centar">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="navbar-nav">

                            
                            <?php $__currentLoopData = json_decode($storethemesetting['sortable_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                
                                <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                    <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                    <?php if(isset($page_slug_url->slug)): ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link"
                                                href="<?php echo e(env('APP_URL') . '/page/' . $page_slug_url->slug); ?>">
                                                <?php echo e(ucfirst($page_slug_url->name)); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($menu_title == 'Blog' && $store['blog_enable'] == 'on' && !empty($blog)): ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="<?php echo e(route('store.blog', $store->slug)); ?>">
                                                <?php echo e(__($menu_title)); ?>

                                            </a>
                                        </li>
                                    <?php elseif($menu_title == 'Contact Us'): ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="<?php echo e(route('store.contact', $store->slug)); ?>">
                                                <?php echo e(__($menu_title)); ?>

                                            </a>
                                        </li>
                                    <?php elseif(
                                        $menu_title == 'Gallery' &&
                                            isset($storethemesetting['enable_gallery']) &&
                                            $storethemesetting['enable_gallery'] == 'on'): ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="<?php echo e(route('store.gallery', [$store->slug])); ?>">
                                                <?php echo e(__($menu_title)); ?>

                                            </a>
                                        </li>
                                    <?php elseif(
                                        $menu_title == 'Career With Us' &&
                                            $plan->job_board == 'on' &&
                                            isset($storethemesetting['enable_job_board']) &&
                                            $storethemesetting['enable_job_board'] == 'on'): ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link"
                                                href="<?php echo e(route('store.job-board', [$store->slug])); ?>">
                                                <?php echo e(__($menu_title)); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                </div>
                <?php if($storethemesetting['enable_sidebar_panel'] == 'on'): ?>
                    <div class="header-right">
                        <div class="contact-now">
                            <div class="left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="right">
                                <h5><?php echo e(__('Contact Us')); ?></h5>
                                <h4><a
                                        href="tel:<?php echo e($storethemesetting['contact_info_phone_no']); ?>"><?php echo e($storethemesetting['contact_info_phone_no']); ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </nav>
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
                        <?php $__currentLoopData = json_decode($storethemesetting['sortable_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                <?php if(isset($page_slug_url->slug)): ?>
                                    <li>
                                        <a class="nav-link"
                                            href="<?php echo e(env('APP_URL') . '/page/' . $page_slug_url->slug); ?>">
                                            <?php echo e(ucfirst($page_slug_url->name)); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($menu_title == 'Blog' && $store['blog_enable'] == 'on' && !empty($blog)): ?>
                                    <li>
                                        <a class="nav-link" href="<?php echo e(route('store.blog', $store->slug)); ?>">
                                            <?php echo e(__($menu_title)); ?>

                                        </a>
                                    </li>
                                <?php elseif($menu_title == 'Contact Us'): ?>
                                    <li>
                                        <a class="nav-link" href="<?php echo e(route('store.contact', $store->slug)); ?>"
                                            style="border-radius: 6px;"><?php echo e(__($menu_title)); ?></a>
                                    </li>
                                <?php elseif(
                                    $menu_title == 'Gallery' &&
                                        isset($storethemesetting['enable_gallery']) &&
                                        $storethemesetting['enable_gallery'] == 'on'): ?>
                                    <li>
                                        <a class="nav-link" href="<?php echo e(route('store.gallery', [$store->slug])); ?>">
                                            <?php echo e(__($menu_title)); ?>

                                        </a>
                                    </li>
                                <?php elseif(
                                    $menu_title == 'Career With Us' &&
                                        $plan->job_board == 'on' &&
                                        isset($storethemesetting['enable_job_board']) &&
                                        $storethemesetting['enable_job_board'] == 'on'): ?>
                                    <li>
                                        <a class="nav-link" href="<?php echo e(route('store.job-board', [$store->slug])); ?>">
                                            <?php echo e(__($menu_title)); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                        


                        <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                            <li>
                                <a class="pt0" href="#">
                                    <?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?> <em
                                        class="fas fa-chevron-down"></em>
                                </a>
                                <ul>
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
                                        <a class="dropdown-item" href="<?php echo e(route('customer.home', $store->slug)); ?>"
                                            class="nav-link">

                                            <?php echo e(__('My Orders')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <?php if(Utility::CustomerAuthCheck($store->slug) == false): ?>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('customer.login', $store->slug)); ?>" class="nav-link">
                                                <?php echo e(__('Sign in')); ?>

                                            </a>
                                        <?php else: ?>
                                            <a class="dropdown-item" href="#"
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
    <footer class="footer">
        <div class="container footer-inner">
            <div class="row">
                <?php if(isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on'): ?>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-item">
                            <h4>
                                <?php echo e(__($storethemesetting['quick_link_header_name1'])); ?>

                            </h4>
                            <ul class="links">
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url1']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name1'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url12']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name12'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url13']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name13'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url14']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name14'])); ?>

                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($storethemesetting['enable_quick_link2']) && $storethemesetting['enable_quick_link2'] == 'on'): ?>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-item">
                            <h4>
                                <?php echo e(__($storethemesetting['quick_link_header_name2'])); ?>

                            </h4>
                            <ul class="links">
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url21']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name21'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url22']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name22'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url23']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name23'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url24']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name24'])); ?>

                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($storethemesetting['enable_quick_link3']) && $storethemesetting['enable_quick_link3'] == 'on'): ?>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-item">
                            <h4>
                                <?php echo e(__($storethemesetting['quick_link_header_name3'])); ?>

                            </h4>
                            <ul class="links">
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url31']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name31'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url32']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name32'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url33']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name33'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url34']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name34'])); ?>

                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($storethemesetting['enable_quick_link4']) && $storethemesetting['enable_quick_link4'] == 'on'): ?>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-item">
                            <h4>
                                <?php echo e(__($storethemesetting['quick_link_header_name4'])); ?>

                            </h4>
                            <ul class="links">
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url41']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name41'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url42']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name42'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url43']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name43'])); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e($storethemesetting['quick_link_url44']); ?>">
                                        <?php echo e(__($storethemesetting['quick_link_name44'])); ?>

                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                
                
                <!-- subscriber-->

                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">

                    <div class="footer-item clearfix">
                        <?php if(isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on'): ?>
                            <?php if($storethemesetting['enable_email_subscriber'] == 'on'): ?>
                                <h4><?php echo e(!empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time'); ?>

                                </h4>
                                <div class="Subscribe-box">
                                    <p><?php echo e(!empty($storethemesetting['subscriber_sub_title']) ? $storethemesetting['subscriber_sub_title'] : 'Subscription here'); ?>

                                    </p>
                                    <?php echo e(Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST', 'class' => 'form-inline d-flex'])); ?>

                                    <?php echo e(Form::email('email', null, ['class' => 'form-control', 'aria-label' => 'Enter your email address', 'placeholder' => __('Enter Your Email Address')])); ?>

                                    <button class="btn button-theme" type="submit"><i
                                            class="fa fa-paper-plane"></i></button>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                            <div class="clearfix"></div>
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
                        <?php endif; ?>

                    </div>



                </div>

            </div>
        </div>

        <div class="copy sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                            <p> <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator)); ?></p>
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
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme23to28.blade.php ENDPATH**/ ?>