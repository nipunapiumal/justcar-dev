<?php
    // get theme color
    $setting = App\Models\Utility::colorset();
    $color = 'theme-4';
    if (!empty($setting['color'])) {
        $color = $setting['color'];
    }
    $company_logo = \App\Models\Utility::GetLogo();
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
    dir="<?php echo e(isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="StoreGo - Business Ecommerce">
    <title>
        <?php echo e(\App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'StoreGo SaaS')); ?>

        - <?php echo $__env->yieldContent('page-title'); ?></title>

    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/')) . '/favicon.png'); ?>" type="image/png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">

    <link rel="stylesheet"
        href="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.css')); ?>">

    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme13to15/css/magnific-popup.css')); ?>">
    <?php echo $__env->yieldPushContent('css-page'); ?>
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">
    <?php if($setting['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php endif; ?>
    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/forum.css')); ?>">
</head>

<body class="<?php echo e($color); ?>">
    <div class="container">
        <nav class="navbar navbar-expand-md mb-5 mt-5 rounded">
            <div class="container-fluid pe-2">
                <a class="navbar-brand" href="<?php echo e(route('forum.index')); ?>">
                    <img src="<?php echo e(asset(Storage::url('uploads/logo/' . $company_logo))); ?>"
                        alt="<?php echo e(config('app.name', 'Storego')); ?>" class="navbar-brand-img auth-navbar-brand">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="<?php echo e(route('dashboard')); ?>"><i class="ti ti-home fa-lg"></i> <?php echo e(__('Dashboard')); ?></a>
                        </li>
                        
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog fa-lg"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if(\Auth::user()->type == 'super admin'): ?>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="
                                        <?php echo e(route('forumzone.index')); ?>"><i
                                                class="fas fa-list"></i> <?php echo e(__('List Categories')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="<?php echo e(route('forumzone.create')); ?>"><i class="fas fa-plus"></i>
                                            <?php echo e(__('Create Category')); ?></a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                <?php endif; ?>

                                <?php if(\Auth::user()->type == 'super admin' || \Auth::user()->type == 'Owner'): ?>
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo e(route('forum-threads')); ?>"><?php echo e(__('My Threads')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                            style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" method="GET" action="<?php echo e(route('forum.search')); ?>">
                        <input class="form-control me-2" name="keyword" type="search" placeholder="<?php echo e(__('Search')); ?>" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit"><?php echo e(__('Search')); ?></button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-xl-8">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <div class="col-xl-4">
                <?php if(\Auth::user()): ?>
                    <a href="<?php echo e(route('forum.create')); ?>"
                        class="btn btn-primary w-100 mb-4"><?php echo e(__('Post Thread')); ?></a>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>
                            <i class="pull-right fa fa-folder"></i>
                            <?php echo e(__('Categories')); ?>

                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="categories-box">
                            <?php $__currentLoopData = \App\Models\ThreadCategory::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="" class="d-flex justify-content-between align-items-center pt-3 pb-3">
                                    <span><?php echo e($category->name); ?></span>
                                    <span
                                        class="badge rounded-pill bg-primary"><?php echo e($category->getThreadCount()); ?></span>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="auth-footer">
            <div class="container-fluid">
                <p class=""><?php echo e(__('Copyright')); ?> &copy;
                    <?php echo e(Utility::getValByName('footer_text') ? Utility::getValByName('footer_text') : config('app.name', 'WorkGo')); ?>

                    <?php echo e(date('Y')); ?></p>
            </div>
        </div>
    </div>
    <?php echo $__env->yieldPushContent('custom-scripts'); ?>
    <!-- Custom js from entire application here -->
    <script src="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme13to15/js/jquery.magnific-popup.min.js')); ?>"></script>
    <!-- sweet alert Js -->
    <script src="<?php echo e(asset('assets/js/plugins/sweetalert2.all.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="<?php echo e(asset('custom/js/custom.js?v=3')); ?>"></script>

    <?php if(Session::has('success')): ?>
        <script>
            showToast('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
            // show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            showToast('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
            // show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>

    <?php echo $__env->yieldPushContent('script'); ?>

    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/layouts/forum.blade.php ENDPATH**/ ?>