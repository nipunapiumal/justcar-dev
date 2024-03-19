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

    if (!empty(session()->get('lang'))) {
        $currantLang = session()->get('lang');
    } else {
        $currantLang = $store->lang;
    }
    $languages = \App\Models\Utility::languages($store->slug);

    $nav_bar_background = '';

    //echo Request::segment(2);
        if ($store->slug != Request::segment(2) && !Request::segment(3)):
            
            //echo 'sajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdfsajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdf-if';
        elseif (Request::segment(3) == 'cart' || Request::segment(3) == 'useraddress' || Request::segment(3) == 'userpayment' || Request::segment(3) == 'wishlist'):
            //$nav_bar_background = 'nav-bar-background';
            //echo 'sajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdfsajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdf-elseif';
        elseif (Request::segment(1) == 'store-blog' || Request::segment(3) == 'blog' || Request::segment(3) == 'product' || Request::segment(3) == 'apply'):
            
            //echo 'sajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdfsajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdf-elseif-blog';
        else:
            //echo 'sajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdfsajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdf-else';
        endif;

?>
<!DOCTYPE html>
<html lang="<?php echo e($currantLang); ?>" dir="<?php echo e(env('SITE_RTL') == 'on' ? 'rtl' : ''); ?>">

<head>
    <?php echo $__env->make('storefront.layout.theme35to37.header-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="theme-color-1">
    <?php echo $__env->make('storefront.layout.theme35to37.modal-set', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Header-area start -->
    <header class="header-area header-1" data-aos="slide-down">
        <!-- Start mobile menu -->
        <div class="mobile-menu">
            <div class="container">
                <div class="mobile-menu-wrapper"></div>
            </div>
        </div>
        <!-- End mobile menu -->

        <div class="main-responsive-nav">
            <div class="container">
                <!-- Mobile Logo -->
                <div class="logo">
                    <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                        <?php if(!empty($store->logo)): ?>
                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                alt="Image placeholder">
                        <?php else: ?>
                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>" alt="Image placeholder">
                        <?php endif; ?>
                    </a>
                </div>
                <!-- Menu toggle button -->
                <button class="menu-toggler" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <div class="main-navbar <?php echo e($nav_bar_background); ?>">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                        <?php if(!empty($store->logo)): ?>
                            <img style="max-width:135px"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $store->logo))); ?>"
                                alt="Image placeholder">
                        <?php else: ?>
                            <img style="max-width:135px" src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                                alt="Image placeholder">
                        <?php endif; ?>
                    </a>
                    <!-- Navigation items -->
                    <div class="collapse navbar-collapse">
                        <ul id="mainMenu" class="navbar-nav mobile-item mx-auto">
                            
                            <?php
                                if (!isset($storethemesetting['primary_nav_menu'])) {
                                    $storethemesetting['primary_nav_menu'] = Utility::defaultMenu($storethemesetting, $store, $plan);
                                }
                            ?>

                            <?php if($storethemesetting['primary_nav_menu']): ?>
                                <?php $__currentLoopData = json_decode($storethemesetting['primary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e($info['link_url']); ?>">
                                                <?php echo e($info['link_name']); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if(isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu']): ?>
                                <li class="nav-item">
                                    <a class="nav-link toggle" href="#">
                                        <i class="fal fa-plus"></i>
                                        <?php echo e(__('More')); ?>

                                    </a>
                                    <ul class="menu-dropdown">
                                        <?php $__currentLoopData = json_decode($storethemesetting['secondary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?php echo e($info['link_url']); ?>">
                                                        <?php echo e($info['link_name']); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                                <li class="nav-item">
                                    <a class="nav-link toggle" href="#">
                                        <i class="fal fa-plus"></i>
                                        <?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?>

                                    </a>
                                    <ul class="menu-dropdown">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                                                <?php echo e(__('My Dashboard')); ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="<?php echo e(route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)])); ?>">

                                                <?php echo e(__('My Profile')); ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('customer.home', $store->slug)); ?>"
                                                class="nav-link">

                                                <?php echo e(__('My Orders')); ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <?php if(Utility::CustomerAuthCheck($store->slug) == false): ?>
                                                <a class="nav-link" href="<?php echo e(route('customer.login', $store->slug)); ?>"
                                                    class="nav-link">
                                                    <?php echo e(__('Sign in')); ?>

                                                </a>
                                            <?php else: ?>
                                                <a class="nav-link" href="#"
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
                        </ul>
                    </div>
                    <div class="more-option mobile-item">
                        <div class="item">
                            <a href="<?php echo e(route('store.cart', $store->slug)); ?>" class="modal-btn header-cart-btn text-uppercase"
                                type="button" style="color:#fff;">
                                <i class="far fa-shopping-cart"></i> <span class="shopping_count"
                                    id="shopping_count">(<?php echo e(!empty($total_item) ? $total_item : '0'); ?>)</span>
                            </a>
                        </div>
                        <div class="item">
                            <div class="language">
                                <select class="nice-select" onchange="window.location = $(this).val()">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(route('change.languagestore', [$store->slug, $language])); ?>">
                                            <?php echo e(\App\Models\Utility::getLangCodes($language)); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="item">
                            <?php if(Utility::CustomerAuthCheck($store->slug) != true): ?>
                                <a href="<?php echo e(route('customer.login', [$store->slug])); ?>" class="btn-icon">
                                    <i class="far fa-user-circle"></i>
                                </a>
                            <?php endif; ?>

                        </div>

                        <div class="item">
                            <?php if(Utility::CustomerAuthCheck($store->slug) == false): ?>
                                <a href="<?php echo e(route('store.usercreate', [$store->slug])); ?>"
                                    class="btn btn-md btn-primary" title="<?php echo e(__('Register')); ?>" target="_self">
                                    <?php echo e(__('Register')); ?>

                                </a>
                            <?php else: ?>
                                <a onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                    class="btn btn-md btn-primary" title="<?php echo e(__('Logout')); ?>" target="_self">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="customer-frm-logout" action="<?php echo e(route('customer.logout', $store->slug)); ?>"
                                    method="POST" class="d-none">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            <?php endif; ?>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header-area end -->

    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('storefront.layout.theme35to37.footer-type-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<script>
    // $(document).on('change', '.nice-select', function (e) {
    // var vehicleType = $(this).val();
    // var url = $(this).attr("data-url");
    // console.log('ininininin',vehicleType);
    // });
</script>

</html>
<?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/layout/theme35.blade.php ENDPATH**/ ?>