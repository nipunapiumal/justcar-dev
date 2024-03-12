<!DOCTYPE html>
<html lang="en" dir="<?php echo e(env('SITE_RTL') == 'on' ? 'rtl' : ''); ?>">
<?php
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

    <style>
        :root {
            --sidepanel-background: <?php echo e(!empty($storethemesetting['sidebar_panel_background_color']) ? $storethemesetting['sidebar_panel_background_color'] : '#0A2357'); ?>;
            --sidepanel-foreground: <?php echo e(!empty($storethemesetting['sidebar_panel_foreground_color']) ? $storethemesetting['sidebar_panel_foreground_color'] : '#ffffff'); ?>;
        }
    </style>


    <link rel="stylesheet" href="<?php echo e(asset('assets/theme6/css/bootstrap.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/theme6/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme6/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme6/css/custom.css?v=2')); ?>">
    <?php echo $__env->yieldPushContent('css-page'); ?>

</head>
<?php

    $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
    $body_home_style = '';
    $footer_style = '';
    $footer_style_1 = '';
    $style_top_header = '';
    $style_header = '';
    $footer_style_contact_widget = '';
    $footer_mailchimp_form = '';
    if ($store->theme_dir == 'theme6') {
        if ($storethemesetting['enable_slider_settings'] == 'on') {
            $style_top_header = 'dark';
            $style_header = 'home2_style';
        }
    } elseif ($store->theme_dir == 'theme7') {
        $style_top_header = 'dark';
        $style_header = 'home3_style';
        $body_home_style = 'body_home2_style';
        $footer_style = 'home2_style';
        $footer_style_1 = 'home2';
        $footer_style_contact_widget = 'home2';
        $footer_mailchimp_form = 'home2';
    } elseif ($store->theme_dir == 'theme8') {
        $style_top_header = 'home3_style';
        $style_header = 'home3_style';
        $footer_style = 'home3_style';
        $footer_style_1 = 'home2';
        $footer_style_contact_widget = 'home3';
        $footer_mailchimp_form = 'home3';
    } elseif ($store->theme_dir == 'theme9') {
        $style_top_header = 'dark';
        $footer_style = 'home4_style';
        if ($storethemesetting['enable_slider_settings'] == 'on') {
            $style_header = 'home2_style';
        }
    } elseif ($store->theme_dir == 'theme10') {
        $style_top_header = 'dark';
        $style_header = 'home5_style';
    } elseif ($store->theme_dir == 'theme11') {
        $style_top_header = 'dark';
        $footer_style = 'home6_style';
    } elseif ($store->theme_dir == 'theme12') {
        $style_top_header = 'dark';
        $style_header = 'home7_style';
        $footer_style = 'home7_style';
        $footer_style_contact_widget = 'home2';
        $footer_style_1 = 'home2';
    }
?>

<body class="<?php echo e($body_home_style); ?>">
    <?php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }
        $languages = \App\Models\Utility::languages($store->slug);
    ?>
    <?php
        if ($store->slug != Request::segment(2) && !Request::segment(3) && $store->theme_dir == 'theme6'):
            $style_top_header = 'home3_style';
            $style_header = 'home3_style';
        elseif (Request::segment(3) == 'product' || Request::segment(3) == 'cart' || Request::segment(3) == 'useraddress' || Request::segment(3) == 'userpayment' || Request::segment(3) == 'wishlist'):
            $style_top_header = 'home3_style';
            $style_header = 'home3_style';
        endif;

        // if ($store->slug != Request::segment(2) && !Request::segment(3) && $store->theme_dir == 'theme9'):
        //     $style_header = 'home3_style';
        // elseif (Request::segment(3) == 'product'):
        //     $style_header = 'home3_style';
        // endif;

        if ($store->slug != Request::segment(2) && !Request::segment(3) && $store->theme_dir == 'theme9'):
            $style_header = 'home3_style'; //()
        elseif ($store->slug == Request::segment(2) && Request::segment(3) && $store->theme_dir == 'theme9'):
            $style_header = 'home3_style';
        elseif (Request::segment(3) == 'product' || Request::segment(1) == 'store-blog'):
            $style_header = 'home3_style';
        endif;

        if ($store->slug != Request::segment(2) && !Request::segment(3) && $store->theme_dir == 'theme10'):
            $style_header = 'home3_style';
        elseif ($store->slug == Request::segment(2) && Request::segment(3) && $store->theme_dir == 'theme10'):
            $style_header = 'home3_style';
        elseif (Request::segment(3) == 'product' || Request::segment(1) == 'store-blog'):
            $style_header = 'home3_style';
        endif;

        if ($store->slug != Request::segment(2) && !Request::segment(3) && $store->theme_dir == 'theme11'):
            $style_header = 'home3_style';
        elseif ($store->slug == Request::segment(2) && Request::segment(3) && $store->theme_dir == 'theme11'):
            $style_header = 'home3_style';
        elseif (Request::segment(3) == 'product'):
            $style_header = 'home3_style';
        endif;

    ?>
    <div class="wrapper ovh">
        <div class="preloader"></div>

        <?php if($storethemesetting['enable_sidebar_panel'] == 'on'): ?>
            <!-- Sidebar Panel Start -->
            <div class="listing_sidebar">
                <div class="siderbar_left_home pt20">
                    <a class="sidebar_switch sidebar_close_btn float-end" href="#">X</a>
                    <div class="footer_contact_widget mt100">
                        <h3 class="title"><?php echo e(__('Quick contact info')); ?></h3>
                        <p><?php echo e($storethemesetting['quick_contact_info']); ?></p>
                    </div>
                    <div class="footer_contact_widget">
                        <h5 class="title"><?php echo e(__('Contact Us')); ?></h5>
                        <div class="footer_phone"><?php echo e($storethemesetting['contact_info_phone_no']); ?></div>
                        <p><?php echo e($storethemesetting['contact_info_email']); ?></p>
                    </div>
                    <div class="footer_about_widget">
                        <h5 class="title"><?php echo e(__('Office Address')); ?></h5>
                        <p><?php echo nl2br(e($storethemesetting['office_address'])); ?></p>
                    </div>
                    <div class="footer_contact_widget">
                        <h5 class="title"><?php echo e(__('Opening Hours')); ?></h5>
                        <p><?php echo nl2br(e($storethemesetting['opening_hours'])); ?></p>
                    </div>
                    <div class="footer_contact_widget">
                        <p class="footer_note">
                            <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator)); ?></p>
                    </div>
                </div>
            </div>
            <!-- Sidebar Panel End -->
        <?php endif; ?>



        <?php if($storethemesetting['enable_top_bar'] == 'on'): ?>
            <!-- header top -->
            <div class="header_top <?php echo e($style_top_header); ?> dn-992">
                <div class="<?php echo e($store->theme_dir == 'theme7' ? 'container-fluid' : 'container posr'); ?>">
                    <div class="row">
                        <div class="col-lg-8 col-xl-7">
                            <div class="header_top_contact_opening_widget text-center text-md-start">
                                <ul class="mb0">
                                    <li class="list-inline-item"><a
                                            href="tel:<?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220'); ?>"><span
                                                class="flaticon-phone-call"></span><?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220'); ?></a>
                                    </li>
                                    <li class="list-inline-item"><a href="javascript:void(0)">
                                            <span class="flaticon-map"></span>
                                            <?php echo e(!empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199'); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-5">
                            <div class="header_top_social_widgets text-center text-md-end">
                                <ul class="m0">
                                    <?php if(!empty($storethemesetting['top_bar_whatsapp'])): ?>
                                        <li class="list-inline-item">
                                            <a class=""
                                                href="https://wa.me/<?php echo e($storethemesetting['top_bar_whatsapp']); ?>"
                                                target="_blank">
                                                <span class="fab fa-whatsapp"></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['top_bar_instagram'])): ?>
                                        <li class="list-inline-item">
                                            <a class="" href="<?php echo e($storethemesetting['top_bar_instagram']); ?>"
                                                target="_blank">
                                                <span class="fab fa-instagram"></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['top_bar_twitter'])): ?>
                                        <li class="list-inline-item">
                                            <a class="" href="<?php echo e($storethemesetting['top_bar_twitter']); ?>"
                                                target="_blank">
                                                <span class="fab fa-twitter"></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['top_bar_messenger'])): ?>
                                        <li class="list-inline-item">
                                            <a class="" href="<?php echo e($storethemesetting['top_bar_messenger']); ?>"
                                                target="_blank">
                                                <span class="fab fa-facebook-f"></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="list-inline-item">
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

                                        
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Main Header Nav -->
        <?php if(
            $store->theme_dir == 'theme10' &&
                $store->slug == Request::segment(2) &&
                !Request::segment(3) &&
                Request::segment(1) != 'store-blog'): ?>

            <header class="header-nav menu_style_home_one <?php echo e($style_header); ?> transparent  main-menu">
                <!-- Ace Responsive Menu -->
                <nav>
                    <div class="container posr">
                        <!-- Menu Toggle btn-->
                        <div class="menu-toggle">
                            <button type="button" id="menu-btn">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Responsive Menu Structure-->
                        <ul id="respMenu" class="ace-responsive-menu wa float-end" data-menu-style="horizontal">


                            

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
                                                <span class="title"><?php echo e($info['link_name']); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if(isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu']): ?>
                                <li>
                                    <a href="#">
                                        <span class="title">
                                            <?php echo e(__('More')); ?>

                                        </span>
                                    </a>
                                    <ul>
                                        <?php $__currentLoopData = json_decode($storethemesetting['secondary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li>
                                                    <a href="<?php echo e($info['link_url']); ?>">
                                                        <span class="title"><?php echo e($info['link_name']); ?></span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            
                            

                            

                            

                            

                            <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>

                                <li>
                                    <a href="#"><span class="title">
                                            <?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?></span>
                                    </a>
                                    <!-- Level Two-->
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
                                
                            <?php endif; ?>


                            <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                                <li>
                                    <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>">

                                        <i class="fas fa-heart">
                                            <span class="title wishlist_count"
                                                id="wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                                        </i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo e(route('store.cart', $store->slug)); ?>">

                                    <i class="fas fa-shopping-basket">
                                        <span class="title shopping_count"
                                            id="shopping_count"><?php echo e(!empty($total_item) ? $total_item : '0'); ?></span>

                                    </i>
                                </a>
                            </li>






                        </ul>
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>" class="navbar_brand float-start dn-lg">
                            <?php if(!empty($store->logo)): ?>
                                <img class="logo1 img-fluid"
                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                    alt="Image placeholder">
                            <?php else: ?>
                                <img class="logo1 img-fluid"
                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                    alt="Image placeholder">
                            <?php endif; ?>
                        </a>
                        <ul id="respMenu2" class="ace-responsive-menu header-menu-widgets float-start wa"
                            data-menu-style="horizontal">
                            <li class="sidebar_panel"><a class="sidebar_switch " href="#"><span></span></a>
                            </li>
                            
                            
                            <?php if(Utility::CustomerAuthCheck($store->slug) != true): ?>
                                <li class="list_c">
                                    <a href="<?php echo e(route('customer.login', $store->slug)); ?>"
                                        class=""><?php echo e(__('Log in')); ?></a>
                                </li>
                                <li><a href="#">|</a></li>
                                <li><a href="<?php echo e(route('store.usercreate', $store->slug)); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php else: ?>
                                <li class="list_c">
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="customer-frm-logout"
                                        action="<?php echo e(route('customer.logout', $store->slug)); ?>" method="POST"
                                        class="d-none">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </header>
        <?php else: ?>
            <header class="header-nav menu_style_home_one <?php echo e($style_header); ?>  transparent main-menu">
                <!-- Ace Responsive Menu -->
                <nav>
                    <div class="<?php echo e($store->theme_dir == 'theme7' ? 'container-fluid' : 'container posr'); ?>">
                        <!-- Menu Toggle btn-->
                        <div class="menu-toggle">
                            <button type="button" id="menu-btn">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Logo -->
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>" class="navbar_brand float-start dn-md">
                            <?php if(!empty($store->logo_dark)): ?>
                                <img class="logo1 img-fluid" style="max-width:160px;"
                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                                    alt="Image placeholder">
                            <?php else: ?>
                                <img class="logo1 img-fluid"
                                    src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                    alt="Image placeholder">
                            <?php endif; ?>
                        </a>

                        <!-- Responsive Menu Structure-->
                        <ul id="respMenu" class="ace-responsive-menu text-end" data-menu-style="horizontal">


                            

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
                                                        <span class="title"><?php echo e($info['link_name']); ?></span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
            
                                    <?php if(isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu']): ?>
                                        <li>
                                            <a href="#">
                                                <span class="title">
                                                    <?php echo e(__('More')); ?>

                                                </span>
                                            </a>
                                            <ul>
                                                <?php $__currentLoopData = json_decode($storethemesetting['secondary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                        <li>
                                                            <a href="<?php echo e($info['link_url']); ?>">
                                                                <span class="title"><?php echo e($info['link_name']); ?></span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>

                            
                            <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>

                                <li>
                                    <a href="#"><span class="title">
                                            <?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?></span>
                                    </a>
                                    <!-- Level Two-->
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
                                <li class="nav-item">
                                    <a href="<?php echo e(route('customer.login', $store->slug)); ?>"
                                        class="nav-link btn  ml-2 bg--gray hover-translate-y-n3 icon-font"
                                        style="border-radius: 6px;"><?php echo e(__('Log in')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                                <li>
                                    <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>">

                                        <i class="fas fa-heart">
                                            <span class="title wishlist_count"
                                                id="wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                                        </i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo e(route('store.cart', $store->slug)); ?>">

                                    <i class="fas fa-shopping-basket">
                                        <span class="title shopping_count"
                                            id="shopping_count"><?php echo e(!empty($total_item) ? $total_item : '0'); ?></span>

                                    </i>
                                </a>
                            </li>

                            <?php if($storethemesetting['enable_sidebar_panel'] == 'on'): ?>
                                <li class="sidebar_panel"><a class="sidebar_switch pt0"
                                        href="#"><span></span></a>
                                </li>
                            <?php endif; ?>

                        </ul>

                    </div>
                </nav>
            </header>
        <?php endif; ?>

        <!-- Main Header Nav For Mobile -->
        <div id="page" class="stylehome1 h0">
            <div class="mobile-menu">
                <div class="header stylehome1">
                    <div class="mobile_menu_bar">
                        <a class="menubar" href="#menu"><small><?php echo e(__('Menu')); ?></small><span></span></a>
                    </div>
                    <div class="mobile_menu_main_logo">
                        <?php if(!empty($store->logo_dark)): ?>
                            <img class="nav_logo_img img-fluid" width="170px"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo_dark))); ?>"
                                alt="Image placeholder">
                        <?php else: ?>
                            <img width="170px" class="nav_logo_img img-fluid"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                alt="images/header-logo2.png">
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <!-- /.mobile-menu -->
            <nav id="menu" class="stylehome1">
                <ul>
                    
                    <?php if($storethemesetting['primary_nav_menu']): ?>
                        <?php $__currentLoopData = json_decode($storethemesetting['primary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                <li>
                                    <a href="<?php echo e($info['link_url']); ?>">
                                        <span class="title"><?php echo e($info['link_name']); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php if(isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu']): ?>
                        <li>
                            <a href="#">
                                <span class="title">
                                    <?php echo e(__('More')); ?>

                                </span>
                            </a>
                            <ul>
                                <?php $__currentLoopData = json_decode($storethemesetting['secondary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                        <li>
                                            <a href="<?php echo e($info['link_url']); ?>">
                                                <span class="title"><?php echo e($info['link_name']); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    

                    <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>

                        <li>
                            <a href="#"><span class="title">
                                    <?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?></span>
                            </a>
                            <!-- Level Two-->
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
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('customer.login', $store->slug)); ?>"
                                style="border-radius: 6px;"><?php echo e(__('Log in')); ?></a>
                        </li>
                    <?php endif; ?>


                    <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                        <li>
                            <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>">

                                <i class="fas fa-heart">
                                    <span class="title wishlist_count"
                                        id="wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                                </i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('store.cart', $store->slug)); ?>">

                            <i class="fas fa-shopping-basket">
                                <span class="title shopping_count"
                                    id="shopping_count"><?php echo e(!empty($total_item) ? $total_item : '0'); ?></span>

                            </i>
                        </a>
                    </li>
                    <!-- Only for Mobile View -->
                    <li class="mm-add-listing">
                        <span class="border-none">
                            <span class="mmenu-contact-info">
                                <span class="phone-num"><i class="flaticon-map"></i> <a href="#">
                                        <?php echo nl2br(e($storethemesetting['office_address'])); ?>

                                    </a></span>
                                <span class="phone-num"><i class="flaticon-phone-call"></i> <a
                                        href="tel:<?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220'); ?>"><?php echo e(!empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220'); ?></a></span>
                                <span class="phone-num"><i class="flaticon-clock"></i> <a href="#">
                                        <?php echo nl2br(e($storethemesetting['opening_hours'])); ?>

                                    </a></span>
                            </span>
                            <span class="social-links">

                                <?php if(!empty($storethemesetting['top_bar_whatsapp'])): ?>
                                    <a class=""
                                        href="https://wa.me/<?php echo e($storethemesetting['top_bar_whatsapp']); ?>"
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



                                
                            </span>
                        </span>
                    </li>
                </ul>
            </nav>
        </div>
        <?php echo $__env->yieldContent('content'); ?>


        <!-- Our Footer -->
        <section class="footer_one <?php echo e($footer_style); ?>  pt50 pb25">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-4 col-xl-7">
                        <div class="footer_about_widget text-start">
                            <div class="logo mb40 mb0-sm">

                                <?php if(
                                    !empty($storethemesetting['footer_logo']) &&
                                        \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo'])): ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo']))); ?>"
                                        alt="Footer logo" style="height: 40px;">
                                <?php else: ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/footer_logo.png'))); ?>"
                                        alt="Footer logo" style="height: 40px;">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php if(isset($storethemesetting['enable_quick_link4']) && $storethemesetting['enable_quick_link4'] == 'on'): ?>
                        <div class="col-md-8 col-xl-5">
                            <div class="footer_menu_widget <?php echo e($footer_style_1); ?> text-start text-md-end mt15">
                                <ul>
                                    <?php if(isset($storethemesetting['footer_menu_4']) && $storethemesetting['footer_menu_4']): ?>
                                        <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_4']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li class="list-inline-item">
                                                    <a class="t-gray" target="_blank"
                                                        href="<?php echo e($info['link_url']); ?>"><?php echo e($info['link_name']); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
            <div class="container pt80 pt20-sm pb70 pb0-sm">
                <div class="row">
                    <?php if(isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on'): ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div class="footer_about_widget <?php echo e($footer_style_1); ?>">
                                <h5 class="title"><?php echo e(__($storethemesetting['quick_link_header_name1'])); ?></h5>
                                <?php if(isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1']): ?>
                                    <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_1']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                            <p>
                                                <a class="t-gray" target="_blank" href="<?php echo e($info['link_url']); ?>">
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
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div class="footer_about_widget <?php echo e($footer_style_1); ?>">
                                <h5 class="title"><?php echo e(__($storethemesetting['quick_link_header_name2'])); ?></h5>
                                <?php if(isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2']): ?>
                                    <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_2']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                            <p>
                                                <a class="t-gray" target="_blank" href="<?php echo e($info['link_url']); ?>">
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
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div class="footer_about_widget <?php echo e($footer_style_1); ?>">
                                <h5 class="title"><?php echo e(__($storethemesetting['quick_link_header_name3'])); ?></h5>
                                <?php if(isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3']): ?>
                                    <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_3']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                            <p>
                                                <a class="t-gray" target="_blank" href="<?php echo e($info['link_url']); ?>">
                                                    <?php echo e($info['link_name']); ?>

                                                </a>
                                            </p>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- subscriber-->
                    <?php if(isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on'): ?>
                        <?php if($storethemesetting['enable_email_subscriber'] == 'on'): ?>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <div class="footer_contact_widget <?php echo e($footer_style_contact_widget); ?>">
                                    <h5 class="title">
                                        <?php echo e(!empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time'); ?>

                                    </h5>
                                    <?php echo e(Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST', 'class' => 'footer_mailchimp_form ' . $footer_mailchimp_form . ''])); ?>

                                    <div class="wrapper">
                                        <div class="col-auto">
                                            <?php echo e(Form::email('email', null, ['class' => 'form-control', 'aria-label' => 'Enter your email address', 'placeholder' => __('Enter Your Email Address')])); ?>


                                            <button type="submit"><?php echo e(__('Subscribe')); ?></button>
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                    <p><?php echo e(!empty($storethemesetting['subscriber_sub_title']) ? $storethemesetting['subscriber_sub_title'] : 'Subscription here'); ?>

                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-8 col-xl-9">
                            <div class="copyright-widget <?php echo e($footer_style_1); ?> mt5 text-start mb20-sm">
                                <p>
                                    <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator)); ?>

                                </p>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="footer_social_widget <?php echo e($footer_style_1); ?> text-start text-md-end">
                                <ul class="mb0">
                                    <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                        <li class="list-inline-item">
                                            <a href="https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>"
                                                target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['facebook'])): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e($storethemesetting['facebook']); ?>" target="_blank">
                                                <i class="fab fa-facebook-square"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['twitter'])): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e($storethemesetting['twitter']); ?>" target="_blank">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['email'])): ?>
                                        <li class="list-inline-item">
                                            <a href="mailto:<?php echo e($storethemesetting['email']); ?>" target="_blank">
                                                <i class="far fa-envelope"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['instagram'])): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e($storethemesetting['instagram']); ?>" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['youtube'])): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e($storethemesetting['youtube']); ?>" target="_blank">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>


                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
        <a class="scrollToHome" href="#"><i class="fas fa-arrow-up"></i></a>
    </div>
    <!-- Wrapper End -->
    <script src="<?php echo e(asset('assets/theme6/js/jquery-3.6.0.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/jquery-migrate-3.0.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/jquery.mmenu.all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/ace-responsive-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/isotop.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/snackbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/simplebar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/parallax.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/scrollto.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/jquery-scrolltofixed-min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/jquery.counterup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/progressbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/slider.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/timepicker.js')); ?>"></script>
    <!-- Custom script for all pages -->
    <script src="<?php echo e(asset('assets/theme6/js/script.js')); ?>"></script>

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



    <?php
        $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($store_settings->google_analytic); ?>"></script>

    <?php echo $store_settings->storejs; ?>


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '<?php echo e($store_settings->google_analytic); ?>');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo e($store_settings->fbpixel_code); ?>');
        fbq('track', 'PageView');
    </script>

    <?php if(!empty($store->smartsupp_key) && $store->is_smartsupp_enable == 'on'): ?>
        <!-- Smartsupp Live Chat script -->
        <script type="text/javascript">
            var _smartsupp = _smartsupp || {};
            _smartsupp.key = "<?php echo $store->smartsupp_key; ?>";
            window.smartsupp || (function(d) {
                var s, c, o = smartsupp = function() {
                    o._.push(arguments)
                };
                o._ = [];
                s = d.getElementsByTagName('script')[0];
                c = d.createElement('script');
                c.type = 'text/javascript';
                c.charset = 'utf-8';
                c.async = true;
                c.src = 'https://www.smartsuppchat.com/loader.js?';
                s.parentNode.insertBefore(c, s);
            })(document);
        </script>
    <?php endif; ?>

    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript=<?php echo e($store_settings->fbpixel_code); ?>" /></noscript>


</body>

</html>
<?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/layout/theme6.blade.php ENDPATH**/ ?>