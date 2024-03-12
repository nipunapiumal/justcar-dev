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


    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/animate.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/bootstrap-submenu.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/magnific-popup.css')); ?>">
    

    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme35to37/fonts/fontawesome/css/all.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/fonts/flaticon/font/flaticon.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/fonts/linearicons/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/jquery.mCustomScrollbar.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/dropzone.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/slick.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/lightbox.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/jnoty.css')); ?>">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/sidebar.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/theme16to21/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme16to21/css/custom.css')); ?>">
    <link rel="stylesheet" type="text/css" id="style_sheet"
        href="<?php echo e(asset('assets/theme16to21/css/skins/yellow.css')); ?>">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('assets/theme16to21/css/ie10-viewport-bug-workaround.css')); ?>">


    <?php echo $__env->yieldPushContent('css-page'); ?>
    <?php if(!empty($storethemesetting['header_img'])): ?>
        <style>
            .sub-banner {
                /* background: rgba(0, 0, 0, 0.04) url('<?php echo e(asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png')))); ?>') center repeat; */
                background-position: center;
                background: rgba(0, 0, 0, 0.04) url('<?php echo e(asset(Storage::url('uploads/store_logo/contact.png'))); ?>') center repeat;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    <?php endif; ?>

</head>
<?php
    $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
?>

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

    <?php
        $header_top_bar = 'top-header bg-active';
        $header = 'main-header sticky-header sh-2';
        if (isset($index) && $index && $store->theme_dir == 'theme17') {
            //home page
            $header_top_bar = 'top-header top-header-bg';
            $header = 'main-header sticky-header header-with-top';
        } elseif (isset($index) && $index && $store->theme_dir == 'theme19') {
            //home page
            // $header = 'main-header sticky-header sh-2 sh-3 bg-active';
            $header = 'main-header sticky-header bg-active';
        } elseif (isset($index) && $index && $store->theme_dir == 'theme21') {
            //home page
            $header_top_bar = 'top-header top-header-bg';
            $header = 'main-header sticky-header header-with-top';
        }

    ?>


    <?php if($storethemesetting['enable_top_bar'] == 'on'): ?>
        <!-- Top header start -->
        <header class="<?php echo e($header_top_bar); ?>" id="top-header-2">
            <div class="container">

                

                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-7">
                        <div class="list-inline">
                            <a href="tel:1-8X0-666-8X88">
                                
                                <?php echo e(!empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199'); ?></a>
                            <a href="tel:info@themevessel.com">
                                
                                <i class="fa fa-phone"></i>
                                <?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220'); ?></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-5">
                        <ul class="top-social-media" style="float: right">
                            <?php if(Utility::CustomerAuthCheck($store->slug) != true): ?>
                                <li>
                                    <a class="sign-in" href="<?php echo e(route('customer.login', [$store->slug])); ?>">
                                        <i class="fa fa-sign-in"></i> <?php echo e(__('Log in')); ?>

                                    </a>
                                </li>
                                <li>
                                    <a class="sign-in" href="<?php echo e(route('store.usercreate', [$store->slug])); ?>">
                                        <i class="fa fa-user"></i> <?php echo e(__('Register')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>



                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Top header end -->
    <?php endif; ?>


    <!-- Main header start -->
    <header class="<?php echo e($header); ?>">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">


                <?php if(isset($index) && $index && $store->theme_dir == 'theme21'): ?>
                    
                    <a class="navbar-brand company-logo" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                        <?php if(!empty($store->logo) && !empty($store->logo_dark)): ?>
                            <img data-dark="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                                data-light="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                alt="Image placeholder">
                        <?php else: ?>
                            <img class="logo1 img-fluid"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                alt="Image placeholder">
                        <?php endif; ?>
                    </a>
                <?php elseif(isset($index) && $index && $store->theme_dir == 'theme17'): ?>
                    
                    <a class="navbar-brand company-logo" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                        <?php if(!empty($store->logo) && !empty($store->logo_dark)): ?>
                            <img data-dark="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                                data-light="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                alt="Image placeholder">
                        <?php else: ?>
                            <img class="logo1 img-fluid"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                alt="Image placeholder">
                        <?php endif; ?>
                    </a>
                <?php elseif(isset($index) && $index && $store->theme_dir == 'theme19'): ?>
                    
                    <a class="navbar-brand company-logo" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                        <?php if(!empty($store->logo) && !empty($store->logo_dark)): ?>
                            <img data-dark="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                                data-light="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                alt="Image placeholder">
                        <?php else: ?>
                            <img class="logo1 img-fluid"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                alt="Image placeholder">
                        <?php endif; ?>
                    </a>
                <?php else: ?>
                    <a class="navbar-brand company-logo" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                        <?php if(!empty($store->logo_dark)): ?>
                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                                alt="Image placeholder">
                        <?php else: ?>
                            <img class="logo1 img-fluid"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                alt="Image placeholder">
                        <?php endif; ?>
                    </a>
                <?php endif; ?>





                <div class="d-flex align-items-end d-md-none ">
                    <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                        <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>" class="pe-3">
                            <i class="far fa-heart fa-lg position-relative">
                                <span
                                    class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                                    style="font-family: sans-serif;font-size: 10px;"
                                    id="wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                            </i>
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('store.cart', $store->slug)); ?>" class="pe-3">
                        <i class="fas fa-shopping-cart fa-lg position-relative">
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
                            <li class="nav-item dropdown active">
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

                            <li class="nav-item dropdown active">
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

                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='fa fa-language'></i>
                                <?php echo e(\App\Models\Utility::getLangCodes($currantLang)); ?>

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo e(route('change.languagestore', [$store->slug, $language])); ?>">
                                            <?php echo e(\App\Models\Utility::getLangCodes($language)); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </li>

                        

                        <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                            <li class="nav-item dropdown">
                                <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>" class="nav-link icon h-icon">
                                    <i class="far fa-heart fa-lg position-relative" style="font-size: 23px;">
                                        <span
                                            class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                                            style="font-family: sans-serif;font-size: 12px;"
                                            id="wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                                    </i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item dropdown">
                            <a href="<?php echo e(route('store.cart', $store->slug)); ?>" class="nav-link icon h-icon">
                                <i class="fas fa-shopping-cart fa-lg position-relative" style="font-size: 23px;">
                                    <span
                                        class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        style="font-family: sans-serif;font-size: 12px;"
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
                <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                    <?php if(!empty($store->logo_dark)): ?>
                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                            alt="sidebarlogo">
                    <?php else: ?>
                        <img class="logo1 img-fluid" src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                            alt="sidebarlogo">
                    <?php endif; ?>
                </a>
            </div>
            <div class="sidebar-navigation">
                
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
                            <a href="#" class="active pt0">
                                <?php echo e(__('More')); ?>

                                <em class="fas fa-chevron-down"></em>
                            </a>
                            <ul>
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
                        <li>
                            <a class="active pt0" href="#">
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
                                        <a class="dropdown-item" href="<?php echo e(route('customer.login', $store->slug)); ?>"
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

                    <li><a href="#" class="active"><?php echo e(\App\Models\Utility::getLangCodes($currantLang)); ?>

                            <em class="fas fa-chevron-down"></em></a>
                        <ul>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a
                                        href="<?php echo e(route('change.languagestore', [$store->slug, $language])); ?>"><?php echo e(\App\Models\Utility::getLangCodes($language)); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>




                    
                    


                </ul>
            </div>
            
        </div>
    </nav>
    <!-- Sidenav end -->

    <?php echo $__env->yieldContent('content'); ?>


    <!-- Footer start -->
    <?php if($store->theme_dir == 'theme20' || $store->theme_dir == 'theme17'): ?>
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
                                <li class="li">
                                    <a
                                        href="<?php echo e($storethemesetting['quick_link_url1']); ?>"><?php echo e($storethemesetting['quick_link_name1']); ?></a>
                                </li>
                                <li class="li">
                                    <a
                                        href="<?php echo e($storethemesetting['quick_link_url12']); ?>"><?php echo e($storethemesetting['quick_link_name12']); ?></a>
                                </li>
                                <li class="li">
                                    <a
                                        href="<?php echo e($storethemesetting['quick_link_url13']); ?>"><?php echo e($storethemesetting['quick_link_name13']); ?></a>
                                </li>
                                <li class="li">
                                    <a
                                        href="<?php echo e($storethemesetting['quick_link_url14']); ?>"><?php echo e($storethemesetting['quick_link_name14']); ?></a>
                                </li>
                                <li class="li">
                                    <a
                                        href="<?php echo e($storethemesetting['quick_link_url21']); ?>"><?php echo e($storethemesetting['quick_link_name21']); ?></a>
                                </li>
                                <li class="li">
                                    <a
                                        href="<?php echo e($storethemesetting['quick_link_url22']); ?>"><?php echo e($storethemesetting['quick_link_name22']); ?></a>
                                </li>
                                <li class="li">
                                    <a
                                        href="<?php echo e($storethemesetting['quick_link_url23']); ?>"><?php echo e($storethemesetting['quick_link_name23']); ?></a>
                                </li>
                                <li class="li">
                                    <a
                                        href="<?php echo e($storethemesetting['quick_link_url24']); ?>"><?php echo e($storethemesetting['quick_link_name24']); ?></a>
                                </li>

                            </ul>
                        </div>
                        <div class="social-media social-media-two clearfix">
                            <div class="social-list">
                                <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                    <div class="icon whatsapp"
                                        onclick="location.href='https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>'">
                                        <div class="tooltip">Whatsapp</div>
                                        <span><i class="fab fa-whatsapp"></i></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['facebook'])): ?>
                                    <div class="icon facebook"
                                        onclick="location.href='<?php echo e($storethemesetting['facebook']); ?>'">
                                        <div class="tooltip">Facebook</div>
                                        <span><i class="fab fa-facebook"></i></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['twitter'])): ?>
                                    <div class="icon twitter"
                                        onclick="location.href='<?php echo e($storethemesetting['twitter']); ?>'">
                                        <div class="tooltip">Twitter</div>
                                        <span><i class="fab fa-twitter"></i></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['email'])): ?>
                                    <div class="icon github"
                                        onclick="location.href='mailto:<?php echo e($storethemesetting['email']); ?>'">
                                        <div class="tooltip">Email</div>
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['instagram'])): ?>
                                    <div class="icon instagram"
                                        onclick="location.href='<?php echo e($storethemesetting['instagram']); ?>'">
                                        <div class="tooltip">Instagram</div>
                                        <span><i class="fab fa-instagram"></i></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['youtube'])): ?>
                                    <div class="icon youtube mr-0"
                                        onclick="location.href='<?php echo e($storethemesetting['youtube']); ?>'">
                                        <div class="tooltip">Youtube</div>
                                        <span><i class="fab fa-youtube"></i></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator)); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <?php else: ?>
        <footer class="footer">
            <div class="lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <!-- subscriber-->
            <?php if(isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on'): ?>
                <?php if($storethemesetting['enable_email_subscriber'] == 'on'): ?>
                    <div class="subscribe-newsletter">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <h3><?php echo e(!empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time'); ?>

                                    </h3>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="Subscribe-box">
                                        <div class="newsletter-content-wrap">
                                            <?php echo e(Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST', 'class' => 'newsletter-form d-flex'])); ?>

                                            <?php echo e(Form::email('email', null, ['class' => 'form-control', 'aria-label' => 'Enter your email address', 'placeholder' => __('Enter Your Email Address')])); ?>

                                            <button class="btn btn-theme" type="submit"><i
                                                    class="fa fa-paper-plane"></i></button>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="clearfix"></div>
            <div class="footer-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="footer-item clearfix">
                                <?php if(
                                    !empty($storethemesetting['footer_logo']) &&
                                        \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo'])): ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo']))); ?>"
                                        alt="Footer logo" class="f-logo">
                                <?php else: ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/footer_logo.png'))); ?>"
                                        alt="Footer logo" class="f-logo">
                                <?php endif; ?>

                                
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                <?php if($storethemesetting['enable_sidebar_panel'] == 'on'): ?>
                                    <div class="text">
                                        <P class="mb-0">
                                            <?php echo e($storethemesetting['contact_info_phone_no']); ?>

                                        </P>
                                    </div>
                                <?php endif; ?>



                            </div>
                        </div>
                        <?php if(isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on'): ?>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                                <div class="footer-item">
                                    <h4>
                                        <?php echo e(__($storethemesetting['quick_link_header_name1'])); ?>

                                    </h4>
                                    <div class="s-border"></div>
                                    <div class="m-border"></div>
                                    <ul class="links">
                                        <?php if(isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1']): ?>
                                            <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_1']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li>
                                                    <a href="<?php echo e($info['link_url']); ?>">
                                                        <i class="fa fa-angle-right"></i>
                                                        <?php echo e($info['link_name']); ?>

                                                    </a>
                                                </li>    
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        
                                        

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
                                    <div class="s-border"></div>
                                    <div class="m-border"></div>
                                    <ul class="links">
                                        <?php if(isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2']): ?>
                                            <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_2']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li>
                                                    <a href="<?php echo e($info['link_url']); ?>">
                                                        <i class="fa fa-angle-right"></i>
                                                        <?php echo e($info['link_name']); ?>

                                                    </a>
                                                </li>    
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

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
                                    <div class="s-border"></div>
                                    <div class="m-border"></div>
                                    <ul class="links">
                                        <?php if(isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3']): ?>
                                            <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_3']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li>
                                                    <a href="<?php echo e($info['link_url']); ?>">
                                                        <i class="fa fa-angle-right"></i>
                                                        <?php echo e($info['link_name']); ?>

                                                    </a>
                                                </li>    
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

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
                                    <div class="s-border"></div>
                                    <div class="m-border"></div>
                                    <ul class="links">
                                        <li>
                                            <a href="<?php echo e($storethemesetting['quick_link_url41']); ?>">
                                                <i class="fa fa-angle-right"></i>
                                                <?php echo e(__($storethemesetting['quick_link_name41'])); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e($storethemesetting['quick_link_url42']); ?>">
                                                <i class="fa fa-angle-right"></i>
                                                <?php echo e(__($storethemesetting['quick_link_name42'])); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e($storethemesetting['quick_link_url43']); ?>">
                                                <i class="fa fa-angle-right"></i>
                                                <?php echo e(__($storethemesetting['quick_link_name43'])); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e($storethemesetting['quick_link_url44']); ?>">
                                                <i class="fa fa-angle-right"></i>
                                                <?php echo e(__($storethemesetting['quick_link_name44'])); ?>

                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                <div class="sub-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <p class="copy">
                                    <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator)); ?>

                                </p>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="social-media clearfix">
                                    <div class="social-list">
                                        <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                            <div class="icon whatsapp"
                                                onclick="location.href='https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>'">
                                                <div class="tooltip">Whatsapp</div>
                                                <span><i class="fab fa-whatsapp"></i></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['facebook'])): ?>
                                            <div class="icon facebook"
                                                onclick="location.href='<?php echo e($storethemesetting['facebook']); ?>'">
                                                <div class="tooltip">Facebook</div>
                                                <span><i class="fab fa-facebook"></i></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['twitter'])): ?>
                                            <div class="icon twitter"
                                                onclick="location.href='<?php echo e($storethemesetting['twitter']); ?>'">
                                                <div class="tooltip">Twitter</div>
                                                <span><i class="fab fa-twitter"></i></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['email'])): ?>
                                            <div class="icon github"
                                                onclick="location.href='mailto:<?php echo e($storethemesetting['email']); ?>'">
                                                <div class="tooltip">Email</div>
                                                <span><i class="fa fa-envelope"></i></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['instagram'])): ?>
                                            <div class="icon instagram"
                                                onclick="location.href='<?php echo e($storethemesetting['instagram']); ?>'">
                                                <div class="tooltip">Instagram</div>
                                                <span><i class="fab fa-instagram"></i></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($storethemesetting['youtube'])): ?>
                                            <div class="icon youtube mr-0"
                                                onclick="location.href='<?php echo e($storethemesetting['youtube']); ?>'">
                                                <div class="tooltip">Youtube</div>
                                                <span><i class="fab fa-youtube"></i></span>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
    <?php endif; ?>



    <!-- Footer end -->


    <script src="<?php echo e(asset('assets/theme16to21/js/bootstrap.bundle.min.js')); ?>"></script>
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
    <script src="<?php echo e(asset('assets/theme16to21/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.filterizr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.countdown.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jquery.mousewheel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/lightgallery-all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/jnoty.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/sidebar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme16to21/js/app.js')); ?>"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo e(asset('assets/theme16to21/js/ie10-viewport-bug-workaround.js')); ?>"></script>
    <!-- Custom javascript -->
    <script src="<?php echo e(asset('assets/theme16to21/js/ie10-viewport-bug-workaround.js')); ?>"></script>

    <!-- Custom js from entire application here -->
    <script src="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>

    <?php echo $__env->make('storefront.layout.additional-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme16to21.blade.php ENDPATH**/ ?>