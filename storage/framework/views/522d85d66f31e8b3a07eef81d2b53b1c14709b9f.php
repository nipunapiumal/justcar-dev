<?php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = \App\Models\Utility::GetLogo();
    $plan = \App\Models\Plan::where('id', \Auth::user()->plan)->first();
?>


<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <nav class="dash-sidebar light-sidebar transprent-bg">
    <?php else: ?>
        <nav class="dash-sidebar light-sidebar">
<?php endif; ?>
<div class="navbar-wrapper">
    <div class="m-header main-logo">
        <a href="<?php echo e(route('dashboard')); ?>" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="<?php echo e($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png')); ?>"
                alt="<?php echo e(config('app.name', 'Storego')); ?>" class="logo logo-lg nav-sidebar-logo" />
        </a>
    </div>
    <div class="navbar-content">
        <ul class="dash-navbar">
            <?php if(Auth::user()->type == 'Owner'): ?>
                <li class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'dashboard' || Request::segment(1) == 'storeanalytic' ? ' active dash-trigger' : 'collapsed'); ?>"
                    id="m-dashboard">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="ti ti-home"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Dashboard')); ?></span>
                        <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul
                        class="dash-submenu <?php echo e(Request::segment(1) == 'dashboard' || Request::segment(1) == 'storeanalytic' ? ' show' : ''); ?>">
                        <li class="dash-item <?php echo e(Request::route()->getName() == 'dashboard' ? ' active' : ''); ?>"
                            id="m-db-dashboard">
                            <a class="dash-link" href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
                        </li>
                        <li class="dash-item <?php echo e(Request::route()->getName() == 'storeanalytic' ? ' active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('storeanalytic')); ?>"><?php echo e(__('Store Analytics')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::segment(1) == 'orders.index' || Request::route()->getName() == 'orders.show' ? ' active dash-trigger' : 'collapsed'); ?>">
                            <a class="dash-link" href="<?php echo e(route('orders.index')); ?>"><?php echo e(__('Orders')); ?></a>
                        </li>
                        <li class="dash-item <?php echo e(Request::route()->getName() == 'customer.show' ? ' active' : ''); ?>"
                            id="m-db-customer">
                            <a class="dash-link" href="<?php echo e(route('customer.index')); ?>"><?php echo e(__('Customers')); ?></a>
                        </li>
                    </ul>
                </li>
                
                <li class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'vehicle' ? ' active dash-trigger' : 'collapsed'); ?>"
                    id="m-vehicles">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-car"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Vehicles')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu <?php echo e(Request::segment(1) == 'vehicle.index' ? ' show' : ''); ?>">
                        <li class="dash-item <?php echo e(Request::route()->getName() == 'vehicle.index' || Request::route()->getName() == 'vehicle.create' || Request::route()->getName() == 'vehicle.edit' || Request::route()->getName() == 'vehicle.show' || Request::route()->getName() == 'vehicle.grid' ? ' active' : ''); ?>"
                            id="m-vh-product">
                            <a class="dash-link" href="<?php echo e(route('vehicle.index')); ?>"><?php echo e(__('Vehicles')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'vehicle_category.index' || Request::route()->getName() == 'vehicle_category.create' ? ' active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('vehicle_category.index')); ?>"><?php echo e(__('Category')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'vehicle_tax.index' || Request::route()->getName() == 'vehicle_tax.create' || Request::route()->getName() == 'vehicle_tax.edit' || Request::route()->getName() == 'vehicle_tax.show' ? ' active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('vehicle_tax.index')); ?>"><?php echo e(__('Tax')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'invoice.index' || Request::route()->getName() == 'invoice.create' || Request::route()->getName() == 'invoice.edit' || Request::route()->getName() == 'invoice.show' ? ' active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('invoice.index')); ?>"><?php echo e(__('Invoice')); ?></a>
                        </li>
                        
                        
                        

                        
                        
                        
                        
                    </ul>
                </li>
                <?php if(\App\Models\Utility::isProductPlanActive()): ?>
                    <li
                        class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'product' || Request::segment(1) == 'product-coupon' || Request::segment(1) == 'shipping' || Request::segment(1) == 'subscriptions' ? ' active dash-trigger' : 'collapsed'); ?>">
                        <a href="#" class="dash-link"><span class="dash-micon">
                                <i class="fas fa-archive"></i>
                            </span><span class="dash-mtext"><?php echo e(__('Shop')); ?></span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu <?php echo e(Request::segment(1) == 'product.index' ? ' show' : ''); ?>">
                            <li class="dash-item <?php echo e(Request::route()->getName() == 'product.index' || Request::route()->getName() == 'product.create' || Request::route()->getName() == 'product.edit' || Request::route()->getName() == 'product.show' || Request::route()->getName() == 'product.grid' ? ' active' : ''); ?>"
                                id="m-vh-product">
                                <a class="dash-link" href="<?php echo e(route('product.index')); ?>"><?php echo e(__('Products')); ?></a>
                            </li>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'product_categorie.index' || Request::route()->getName() == 'product_categorie.create' ? ' active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('product_categorie.index')); ?>"><?php echo e(__('Category')); ?></a>
                            </li>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'product_tax.index' || Request::route()->getName() == 'product_tax.create' ? ' active' : ''); ?>">
                                <a class="dash-link" href="<?php echo e(route('product_tax.index')); ?>"><?php echo e(__('Tax')); ?></a>
                            </li>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'product-coupon.index' || Request::route()->getName() == 'product-coupon.show' ? ' active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('product-coupon.index')); ?>"><?php echo e(__('Product Coupon')); ?></a>
                            </li>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'subscriptions.index' ? ' active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('subscriptions.index')); ?>"><?php echo e(__('Subscriber')); ?></a>
                            </li>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'shipping.index' ? ' active' : ''); ?>">
                                <a class="dash-link" href="<?php echo e(route('shipping.index')); ?>"><?php echo e(__('Shipping')); ?></a>
                            </li>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'setting.payments' ? ' active dash-trigger' : ''); ?>">
                                <a class="dash-link" href="<?php echo e(route('setting.payments')); ?>"><?php echo e(__('Payments')); ?></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>


                
                
                <?php if($plan->blog == 'on'): ?>
                    <li
                        class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'blog.index' || Request::route()->getName() == 'blog.show' ? ' active dash-trigger ' : 'collapsed'); ?>">
                        <a href="<?php echo e(route('blog.index')); ?>"
                            class="dash-link <?php echo e(request()->is('blog.index') ? 'active' : ''); ?>"><span
                                class="dash-micon">
                                
                                <i class="ti ti-news"></i>
                            </span><span class="dash-mtext"><?php echo e(__('Blog')); ?></span></a>
                    </li>
                <?php endif; ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'gallery' || Request::segment(1) == 'gallery_categorie' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="ti ti-photo"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Gallery')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu <?php echo e(Request::segment(1) == 'gallery.index' ? ' show' : ''); ?>">
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'gallery.index' || Request::route()->getName() == 'gallery.create' || Request::route()->getName() == 'gallery.edit' || Request::route()->getName() == 'gallery.show' ? ' active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('gallery.index')); ?>"><?php echo e(__('Gallery')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'gallery_categorie.index' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('gallery_categorie.index')); ?>"><?php echo e(__('Gallery Category')); ?></a>
                        </li>
                    </ul>
                </li>
                <?php if($plan->job_board == 'on'): ?>
                    <li
                        class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'job-board' ? ' active dash-trigger' : 'collapsed'); ?>">
                        <a href="#" class="dash-link"><span class="dash-micon">
                                <i class="ti ti-subtask"></i>
                            </span><span class="dash-mtext"><?php echo e(__('Job Board')); ?></span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu <?php echo e(Request::segment(1) == 'job-board.index' ? ' show' : ''); ?>">
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'job-board.index' || Request::route()->getName() == 'job-board.create' || Request::route()->getName() == 'job-board.edit' || Request::route()->getName() == 'job-board.show' ? ' active' : ''); ?>">
                                <a class="dash-link" href="<?php echo e(route('job-board.index')); ?>"><?php echo e(__('Job Board')); ?></a>
                            </li>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'job_categorie.index' ? ' active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('job_categorie.index')); ?>"><?php echo e(__('Job Category')); ?></a>
                            </li>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'job-applicants.index' ? ' active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('job-applicants.index')); ?>"><?php echo e(__('Job Applicants')); ?></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                
            <?php endif; ?>
            <?php if(Auth::user()->type == 'super admin'): ?>
                <li class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'dashboard' ? ' active' : 'collapsed'); ?>">
                    <a href="<?php echo e(route('dashboard')); ?>"
                        class="dash-link <?php echo e(request()->is('dashboard') ? 'active' : ''); ?>"><span class="dash-micon">
                            <i class="ti ti-home"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Dashboard')); ?></span></a>
                </li>

                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'store-resource' || Request::route()->getName() == 'store.grid' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="<?php echo e(route('store-resource.index')); ?>"
                        class="dash-link <?php echo e(request()->is('store-resource') ? 'active' : ''); ?>"><span
                            class="dash-micon">
                            <i data-feather="user"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Stores')); ?></span></a>
                </li>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'vehicle_brand' || Request::segment(1) == 'vehicle_model' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-car"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Vehicle')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu <?php echo e(Request::segment(1) == 'vehicle_brand.index' ? ' show' : ''); ?>">
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'vehicle_type.index' || Request::route()->getName() == 'vehicle_type.create' || Request::route()->getName() == 'vehicle_type.edit' || Request::route()->getName() == 'vehicle_type.show' || Request::route()->getName() == 'vehicle_type.grid' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('vehicle_type.index')); ?>"><?php echo e(__('Vehicle Type')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'vehicle_brand.index' || Request::route()->getName() == 'vehicle_brand.create' || Request::route()->getName() == 'vehicle_brand.edit' || Request::route()->getName() == 'vehicle_brand.show' || Request::route()->getName() == 'vehicle_brand.grid' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('vehicle_brand.index')); ?>"><?php echo e(__('Vehicle Brand')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'vehicle_model.index' || Request::route()->getName() == 'vehicle_model.create' || Request::route()->getName() == 'vehicle_model.edit' || Request::route()->getName() == 'vehicle_model.show' || Request::route()->getName() == 'vehicle_model.grid' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('vehicle_model.index')); ?>"><?php echo e(__('Vehicle Model')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'fuel-type.index' || Request::route()->getName() == 'fuel-type.create' || Request::route()->getName() == 'fuel-type.edit' || Request::route()->getName() == 'fuel-type.show' || Request::route()->getName() == 'fuel-type.grid' ? ' active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('fuel-type.index')); ?>"><?php echo e(__('Fuel Type')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'vehicle-equipment.index' || Request::route()->getName() == 'vehicle-equipment.create' || Request::route()->getName() == 'vehicle-equipment.edit' || Request::route()->getName() == 'vehicle-equipment.show' || Request::route()->getName() == 'vehicle-equipment.grid' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('vehicle-equipment.index')); ?>"><?php echo e(__('Vehicle Equipment')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'exterior-color.index' || Request::route()->getName() == 'exterior-color.create' || Request::route()->getName() == 'exterior-color.edit' || Request::route()->getName() == 'exterior-color.show' || Request::route()->getName() == 'exterior-color.grid' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('exterior-color.index')); ?>"><?php echo e(__('Exterior Color')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'interior-color.index' || Request::route()->getName() == 'interior-color.create' || Request::route()->getName() == 'interior-color.edit' || Request::route()->getName() == 'interior-color.show' || Request::route()->getName() == 'interior-color.grid' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('interior-color.index')); ?>"><?php echo e(__('Interior Color')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'interior-design.index' || Request::route()->getName() == 'interior-design.create' || Request::route()->getName() == 'interior-design.edit' || Request::route()->getName() == 'interior-design.show' || Request::route()->getName() == 'interior-design.grid' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('interior-design.index')); ?>"><?php echo e(__('Interior Design')); ?></a>
                        </li>
                    </ul>
                </li>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'advertisements' ? ' active' : 'collapsed'); ?>">
                    <a href="<?php echo e(route('advertisements.index')); ?>"
                        class="dash-link <?php echo e(request()->is('advertisements') ? 'active' : ''); ?>"><span
                            class="dash-micon">
                            <i class="fas fa-ad"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Advertisements')); ?></span></a>
                </li>
                <li class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'coupons' ? ' active' : 'collapsed'); ?>">
                    <a href="<?php echo e(route('coupons.index')); ?>"
                        class="dash-link <?php echo e(request()->is('coupons') ? 'active' : ''); ?>"><span class="dash-micon">
                            <i class="ti ti-tag"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Coupons')); ?></span></a>
                </li>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'users' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="<?php echo e(route('users.index')); ?>"
                        class="dash-link <?php echo e(request()->is('users') ? 'active' : ''); ?>"><span class="dash-micon">
                            <i data-feather="user"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Users')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(Auth::user()->type == 'super admin' || Auth::user()->type == 'language_specialist'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'localization' || Request::segment(1) == 'vehicle_model' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-language"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Localization')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu <?php echo e(Request::segment(1) == 'localization.show' ? ' show' : ''); ?>">
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'localization.show' || Request::route()->getName() == 'localization.create' || Request::route()->getName() == 'localization.edit' || Request::route()->getName() == 'localization.index' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('localization.show', [App::getLocale() ? App::getLocale() : 'en'])); ?>"><?php echo e(__('Language')); ?></a>
                        </li>
                        <?php if(Auth::user()->type == 'super admin'): ?>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'users.lang-specialists' ? ' active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('users.lang-specialists')); ?>"><?php echo e(__('Language Specialist')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(Auth::user()->type == 'super admin'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'auto-gallery' ? ' active' : 'collapsed'); ?>">
                    <a href="<?php echo e(route('auto-gallery.index')); ?>"
                        class="dash-link <?php echo e(request()->is('auto-gallery') ? 'active' : ''); ?>"><span
                            class="dash-micon">
                            <i class="ti ti-photo"></i>
                        </span><span class="dash-mtext"><?php echo e(__('autoGallery')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(Auth::user()->type == 'super admin' || Auth::user()->type == 'Owner'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'plans' || Request::segment(1) == 'plan_duration' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="ti ti-businessplan"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Plans')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu <?php echo e(Request::segment(1) == 'plans.index' ? ' show' : ''); ?>">
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'plans' || Request::route()->getName() == 'stripe' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('plans.index')); ?>"><?php echo e(__('Plans')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'copyright-plan' || Request::route()->getName() == 'stripe' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('copyright-plan.index')); ?>"><?php echo e(__('Copyright')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'storage_plans' || Request::route()->getName() == 'stripe' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('storage_plans.index')); ?>"><?php echo e(__('Storage')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'product-plan' || Request::route()->getName() == 'stripe' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('product-plan.index')); ?>"><?php echo e(__('Product')); ?></a>
                        </li>
                        <?php if(Auth::user()->type == 'super admin'): ?>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'plan_request' ? ' active dash-trigger' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('plan_request.index')); ?>"><?php echo e(__('Plan Requests')); ?></a>
                            </li>
                            <li
                                class="dash-item <?php echo e(Request::route()->getName() == 'plan_duration' ? ' active dash-trigger' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('plan_duration.index')); ?>"><?php echo e(__('Plan Duration')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            



            
            <?php if(Auth::user()->type == 'super admin'): ?>
                
                
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'vehicle_request' ? ' active' : 'collapsed'); ?>">
                    <a href="<?php echo e(route('viewVehicleRequests')); ?>"
                        class="dash-link <?php echo e(request()->is('vehicle_request') ? 'active' : ''); ?>"><span
                            class="dash-micon">
                            <i class="ti ti-brand-telegram"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Vehicle Requests')); ?></span></a>
                </li>

                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'email_template' || Request::route()->getName() == 'manage.email.language' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="<?php echo e(route('email_template.index')); ?>"
                        class="dash-link <?php echo e(request()->is('email_template') ? 'active' : ''); ?>"><span
                            class="dash-micon">
                            <i class="ti ti-mail"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Email Templates')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(Auth::user()->type == 'Owner'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'settings' || Request::segment(1) == 'plan_duration' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-edit"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Website')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu <?php echo e(Request::segment(1) == 'setting.layout' ? ' show' : ''); ?>">
                        <li
                            class="dash-item  <?php echo e(Request::route()->getName() == 'setting.layout' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('setting.layout')); ?>"><?php echo e(__('Layouts')); ?></a>
                        </li>
                        
                            <?php if($plan->additional_page == 'on'): ?>
                            <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'custom-page.index' || Request::route()->getName() == 'custom-page.show' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('custom-page.index')); ?>"><?php echo e(__('Custom Page')); ?></a>
                        </li>
                        <?php endif; ?>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.settings' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('setting.settings')); ?>"><?php echo e(__('Settings')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.content_sharing' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('setting.content_sharing')); ?>"><?php echo e(__('Content Sharing')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('forum.index')); ?>"><?php echo e(__('Forum')); ?></a>
                        </li>
                    </ul>
                </li>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'settings' || Request::segment(1) == 'plan_duration' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-puzzle-piece"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Plugins')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu <?php echo e(Request::segment(1) == 'setting.whatsapp_setting' ? ' show' : ''); ?>">
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.whatsapp_setting' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('setting.whatsapp_setting')); ?>"><?php echo e(__('Whatsapp Messaging')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.twilio_setting' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('setting.twilio_setting')); ?>"><?php echo e(__('Twilio setting')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.smartsupp_settings' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('setting.smartsupp_settings')); ?>"><?php echo e(__('Smartsupp Live Chat')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.cookie_bot_settings' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('setting.cookie_bot_settings')); ?>"><?php echo e(__('Cookie Bot')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.mobile_de' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('setting.mobile_de')); ?>"><?php echo e(__('Mobile.de Seller-API')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'carcopy.car_hpm' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('carcopy.car_hpm')); ?>"><?php echo e(__('Carcopy.com CarHPM')); ?></a>
                        </li>
                    </ul>
                </li>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'settings' || Request::segment(1) == 'plan_duration' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i data-feather="settings"></i>
                        </span><span class="dash-mtext"><?php echo e(__('Settings')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu <?php echo e(Request::segment(1) == 'setting.layout' ? ' show' : ''); ?>">

                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.site_setting' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('setting.site_setting')); ?>"><?php echo e(__('Settings')); ?></a>
                        </li>
                        
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.email_setting' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('setting.email_setting')); ?>"><?php echo e(__('Email Setting')); ?></a>
                        </li>

                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'setting.manage_languages' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('setting.manage_languages')); ?>"><?php echo e(__('Manage Languages')); ?></a>
                        </li>
                        


                    </ul>
                </li>
            <?php endif; ?>

            <?php if(Auth::user()->type == 'super admin'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'settings' || Request::route()->getName() == 'store.editproducts' ? ' active dash-trigger' : 'collapsed'); ?>">
                    <a href="<?php echo e(route('settings')); ?>"
                        class="dash-link <?php echo e(request()->is('settings') ? 'active' : ''); ?>">
                        <span class="dash-micon"> <i data-feather="settings"></i>
                        </span><span class="dash-mtext">
                            <?php echo e(__('Settings')); ?>

                        </span></a>
                </li>
            <?php endif; ?>
            
        </ul>
    </div>
</div>
</nav>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/partials/admin/menu.blade.php ENDPATH**/ ?>