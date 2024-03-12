<?php
$logo=asset(Storage::url('uploads/logo/'));
$favicon=\App\Models\Utility::getValByName('company_favicon');
$cust_darklayout = Utility::getValByName('cust_darklayout');
if($cust_darklayout == ''){
$cust_darklayout = 'off';
}
$setting = App\Models\Utility::colorset();
$color = 'theme-3';
if (!empty($setting['color'])) {
    $color = $setting['color'];
}
if(!empty(session()->get('lang')))
{
    $currantLang = session()->get('lang');
}else{
    $currantLang = $store->lang;
}
$languages=\App\Models\Utility::languages();
?>
<!DOCTYPE html>
<html class="<?php echo e($color); ?>">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- Favicon icon -->
    <title><?php echo e(__('User Order')); ?> - <?php echo e(($store->tagline) ?  $store->tagline : env('APP_NAME', ucfirst($store->name))); ?></title>
    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/').(!empty($settings->value)?$settings->value:'favicon.png'))); ?>" type="image/png">


    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css')); ?>">

    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <!-- <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>"> -->
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/select2/dist/css/select2.min.css')); ?>">
    <!-- vendor css -->

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/landing.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/style.css')); ?>">
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">


    <?php if($cust_darklayout=='on'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php endif; ?>
  </head>

  <body class="<?php echo e($color); ?>">
    <!-- [ auth-signup ] start -->
    <div class="auth-wrapper auth-v3">
      <div class=""></div>
      <div class="auth-content">
        <nav class="navbar navbar-expand-md navbar-light default">
          <div class="container-fluid pe-2">
            <a class="navbar-brand mr-lg-4 pt-0" href="<?php echo e(route('store.slug',$store->slug)); ?>">
                <?php if(!empty($store->logo)): ?>
                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.$store->logo))); ?>" id="navbar-logo" style="height: 40px;">
                <?php else: ?>
                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>" id="navbar-logo" style="height: 40px;">
                <?php endif; ?>
            </a>
            <div class="d-lg-inline-block">
                <span class="navbar-text mr-3 pt-3 text-lg align-middle"><?php echo e(ucfirst($store->name)); ?></span>
            </div>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <li class="nav-item">
                    <select name="language" id="language" class="btn-primary custom_btn ms-2 me-2 language_option_bg" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($currantLang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('change.languagestore',[$store->slug,$language])); ?>"><?php echo e(Str::upper($language)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </li>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container">
            <div class="mt-4">
                <header class="">
                    <div class="container d-flex justify-content-between">
                        <div class="row float-left">
                            <div class=" col-auto">
                                <div class="row align-items-center ">
                                    <h4 class=""><?php echo e(__('Your Order Details')); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#" onclick="saveAsPDF();" data-toggle="tooltip" data-title="<?php echo e(__('Download')); ?>" id="download-buttons" class="p-0 btn btn-sm btn-white btn-icon rounded-pill">
                                <span class="btn-inner--icon text-dark"><i class="fa fa-print"></i></span>
                                <span class="btn-inner--text text-dark"><?php echo e(__('Print')); ?></span>
                            </a>
                        </div>
                    </div>
                </header>
                <div id="printableArea">
                    <div class="row">
                        <div class=" col-6 pb-2 invoice_logo"></div>
                        <div class=" d-flex justify-content-end">
                            <?php if($order->status == 'pending'): ?>
                                <button class="btn btn-sm btn-success"><?php echo e(__('Pending')); ?></button>
                            <?php elseif($order->status == 'Cancel Order'): ?>
                                <button class="btn btn-sm btn-danger"><?php echo e(__('Order Canceled')); ?></button>
                            <?php else: ?>
                                <button class="btn btn-sm btn-success"><?php echo e(__('Delivered')); ?></button>
                            <?php endif; ?>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Items from Order')); ?> <?php echo e($order->order_id); ?></h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">
                                                        <?php echo e(__('Item')); ?>

                                                    </th>
                                                    <th scope="col" class="sort" data-sort="budget">
                                                        <?php echo e(__('Quantity')); ?>

                                                    </th>
                                                    <th scope="col" class="sort text-right" data-sort="completion">
                                                        <?php echo e(__('Price')); ?></th>
                                                    <th scope="col" class="sort text-right" data-sort="completion">
                                                        <?php echo e(__('Total')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sub_tax = 0;
                                                    $total = 0;
                                                ?>
                                                <?php $__currentLoopData = $order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($product->variant_id != 0): ?>
                                                        <tr>
                                                            <td class="total">
                                                            <span class="h6 text-sm">
                                                                <?php echo e($product->product_name .' - ( '.$product->variant_name.' )'); ?>

                                                            </span>
                                                                <?php if(!empty($product->tax)): ?>
                                                                    <?php
                                                                        $total_tax=0;
                                                                    ?>
                                                                    <?php $__currentLoopData = $product->tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            $sub_tax = ($product->variant_price* $product->quantity * $tax->tax) / 100;
                                                                            $total_tax += $sub_tax;
                                                                        ?>
                                                                        <?php echo e($tax->tax_name.' '.$tax->tax.'%'.' ('.$sub_tax.')'); ?>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                    <?php
                                                                        $total_tax = 0
                                                                    ?>
                                                                <?php endif; ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($product->quantity); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e(App\Models\Utility::priceFormat($product->variant_price,$store->slug)); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e(App\Models\Utility::priceFormat($product->variant_price*$product->quantity+$total_tax,$store->slug)); ?>

                                                            </td>
                                                        </tr>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td class="total">
                                                            <span class="h6 text-sm">
                                                                <?php echo e($product->product_name); ?>

                                                            </span>
                                                                <?php if(!empty($product->tax)): ?>
                                                                    <?php
                                                                        $total_tax=0;
                                                                    ?>
                                                                    <?php $__currentLoopData = $product->tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            $sub_tax = ($product->price* $product->quantity * $tax->tax) / 100;
                                                                            $total_tax += $sub_tax;
                                                                        ?>
                                                                        <?php echo e($tax->tax_name.' '.$tax->tax.'%'.' ('.$sub_tax.')'); ?>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                    <?php
                                                                        $total_tax = 0
                                                                    ?>
                                                                <?php endif; ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($product->quantity); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e(App\Models\Utility::priceFormat($product->price,$store->slug)); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e(App\Models\Utility::priceFormat($product->price*$product->quantity+$total_tax,$store->slug)); ?>

                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if($order->status == 'delivered' && !empty($product->downloadable_prodcut)): ?>
                                                    <tr>
                                                        <td colspan="4">
                                                            <div class="card card-body mb-0 py-0">
                                                                <div class="card my-5 bg-secondary">
                                                                    <div class="card-body">
                                                                        <div class="row justify-content-between align-items-center">
                                                                            <div class="col-md-6 order-md-2 mb-4 mb-md-0">
                                                                                <div class="d-flex align-items-center justify-content-md-end">
                                                                                    <button data-id="<?php echo e($order->id); ?>" data-value="<?php echo e(asset(Storage::url('uploads/downloadable_prodcut'.'/'.$product->downloadable_prodcut))); ?>" class="btn btn-sm btn-primary downloadable_prodcut"><?php echo e(__('Download')); ?></button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 order-md-1">
                                                                                <span class="h6 text-muted d-inline-block mr-3 mb-0"></span>
                                                                                <span class="h5 mb-0"><?php echo e(__('Get your product from here')); ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Items from Order '). $order->order_id); ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo e(__('Sub Total')); ?> :</td>
                                                        <td><?php echo e(App\Models\Utility::priceFormat($sub_total,$store->slug)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('Estimated Tax')); ?> :</td>
                                                        <td><?php echo e(App\Models\Utility::priceFormat($final_taxs,$store->slug)); ?></td>
                                                    </tr>
                                                    <?php if(!empty($discount_price)): ?>
                                                        <tr>
                                                            <td><?php echo e(__('Apply Coupon')); ?> :</td>
                                                            <td><?php echo e($discount_price); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if(!empty($shipping_data)): ?>
                                                        <?php if(!empty($discount_value)): ?>
                                                            <tr>
                                                                <td><?php echo e(__('Shipping Price')); ?> :</td>
                                                                <td><?php echo e(App\Models\Utility::priceFormat($shipping_data->shipping_price,$store->slug)); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo e(__('Grand Total')); ?> :</th>
                                                                <th><?php echo e(App\Models\Utility::priceFormat($grand_total+$shipping_data->shipping_price-$discount_value,$store->slug)); ?></th>
                                                            </tr>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td><?php echo e(__('Shipping Price')); ?> :</td>
                                                                <td><?php echo e(App\Models\Utility::priceFormat($shipping_data->shipping_price,$store->slug)); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo e(__('Grand Total')); ?> :</th>
                                                                <th><?php echo e(App\Models\Utility::priceFormat($sub_total + $shipping_data->shipping_price + $final_taxs,$store->slug)); ?></th>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php elseif(!empty($discount_value)): ?>
                                                        <tr>
                                                            <th><?php echo e(__('Grand  Total')); ?> :</th>
                                                            <th><?php echo e(App\Models\Utility::priceFormat($grand_total-$discount_value,$store->slug)); ?></th>
                                                        </tr>
                                                    <?php else: ?>
                                                        <tr>
                                                            <th><?php echo e(__('Grand  Total')); ?> :</th>
                                                            <th><?php echo e(App\Models\Utility::priceFormat($grand_total,$store->slug)); ?></th>
                                                        </tr>
                                                    <?php endif; ?>

                                                    <th><?php echo e(__('Payment Type')); ?> :</th>
                                                    <th><?php echo e($order['payment_type']); ?></th>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Shipping Information')); ?></h5>
                                </div>
                                <div class="">
                                    <address class="mb-0 text-sm">
                                        <dl class="row mt-4 align-items-center">
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Company')); ?></dt>
                                            <dd class="col-sm-9 text-sm"> <?php echo e($user_details->shipping_address); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('City')); ?></dt>
                                            <dd class="col-sm-9 text-sm"><?php echo e($user_details->shipping_city); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Country')); ?></dt>
                                            <dd class="col-sm-9 text-sm"> <?php echo e($user_details->shipping_country); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Postal Code')); ?></dt>
                                            <dd class="col-sm-9 text-sm"><?php echo e($user_details->shipping_postalcode); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Phone')); ?></dt>
                                            <dd class="col-sm-9 text-sm"><?php echo e($user_details->phone); ?></dd>
                                            <?php if(!empty($location_data && $shipping_data)): ?>
                                                <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Location')); ?></dt>
                                                <dd class="col-sm-9 text-sm"><?php echo e($location_data->name); ?></dd>
                                                <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Shipping Method')); ?></dt>
                                                <dd class="col-sm-9 text-sm"><?php echo e($shipping_data->shipping_name); ?></dd>
                                            <?php endif; ?>
                                        </dl>
                                    </address>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Billing Information')); ?></h5>
                                </div>
                                <div class="">
                                    <address class="mb-0 text-sm">
                                        <dl class="row mt-4 align-items-center">
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Company')); ?></dt>
                                            <dd class="col-sm-9 text-sm"> <?php echo e($user_details->billing_address); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('City')); ?></dt>
                                            <dd class="col-sm-9 text-sm"><?php echo e($user_details->billing_city); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Country')); ?></dt>
                                            <dd class="col-sm-9 text-sm"> <?php echo e($user_details->billing_country); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Postal Code')); ?></dt>
                                            <dd class="col-sm-9 text-sm"><?php echo e($user_details->billing_postalcode); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Phone')); ?></dt>
                                            <dd class="col-sm-9 text-sm"><?php echo e($user_details->phone); ?></dd>
                                            <?php if(!empty($location_data && $shipping_data)): ?>
                                                <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Location')); ?></dt>
                                                <dd class="col-sm-9 text-sm"><?php echo e($location_data->name); ?></dd>
                                                <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Shipping Method')); ?></dt>
                                                <dd class="col-sm-9 text-sm"><?php echo e($shipping_data->shipping_name); ?></dd>
                                            <?php endif; ?>
                                        </dl>
                                    </address>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Extra Information')); ?></h5>
                                </div>
                                <div class="">
                                    <address class="mb-0 text-sm">
                                        <dl class="row mt-4 align-items-center">
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e($store_payment_setting['custom_field_title_1']); ?></dt>
                                            <dd class="col-sm-9 text-sm"> <?php echo e($user_details->custom_field_title_1); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e($store_payment_setting['custom_field_title_2']); ?></dt>
                                            <dd class="col-sm-9 text-sm"> <?php echo e($user_details->custom_field_title_2); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e($store_payment_setting['custom_field_title_3']); ?></dt>
                                            <dd class="col-sm-9 text-sm"><?php echo e($user_details->custom_field_title_3); ?></dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e($store_payment_setting['custom_field_title_4']); ?></dt>
                                            <dd class="col-sm-9 text-sm"> <?php echo e($user_details->custom_field_title_4); ?></dd>
                                        </dl>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer id="footer-main">
            <div class="footer mt-4 footer_bottom">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-6 d-flex justify-content-start">
                            <div class="copyright text-sm font-weight-bold text-center mt-2">
                                <?php echo e($store->footer_note); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="nav justify-content-center justify-content-md-end">
                                <?php if(!empty($store->email)): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e($store->email); ?>" target="_blank">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty($store->whatsapp)): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e($store->whatsapp); ?>" target=”_blank”>
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty($store->facebook)): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e($store->facebook); ?>" target="_blank">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty($store->instagram)): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e($store->instagram); ?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty($store->twitter)): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e($store->twitter); ?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty($store->youtube)): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e($store->youtube); ?>" target="_blank">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

      </div>
    </div>
    <div id="invoice_logo_img" class="d-none">
        <div class="row align-items-center py-2 px-3">
            <?php if(!empty($store->invoice_logo)): ?>
                <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.$store->invoice_logo))); ?>" id="navbar-logo" style="width: 300px;">
            <?php else: ?>
                <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/invoice_logo.png'))); ?>" id="navbar-logo" style="width: 300px;">
            <?php endif; ?>
        </div>
    </div>
    <script src="<?php echo e(asset('custom/js/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/swiper/dist/js/swiper.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('custom/js/html2pdf.bundle.min.js')); ?>"></script>


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

    gtag('config', '<?php echo e($store_settings->google_analytic); ?>');
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
  fbq('init', '<?php echo e($store_settings->fbpixel_code); ?>');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript=<?php echo e($store_settings->fbpixel_code); ?>"
/></noscript>
<script>
    var filename = $('#filesname').val();

    function saveAsPDF() {
        var element = document.getElementById('printableArea');
        var logo_html = $('#invoice_logo_img').html();
        $('.invoice_logo').empty();
        $('.invoice_logo').html(logo_html);

        var opt = {
            margin: 0.3,
            filename: filename,
            image: {type: 'jpeg', quality: 1},
            html2canvas: {scale: 4, dpi: 72, letterRendering: true},
            jsPDF: {unit: 'in', format: 'A2'}
        };

        html2pdf().set(opt).from(element).save();
        setTimeout(function () {
            $('.invoice_logo').empty();
        }, 0);
    }

    $(document).on('click', '.downloadable_prodcut', function () {

        var download_product = $(this).attr('data-value');
        var order_id = $(this).attr('data-id');

        var data = {
            download_product: download_product,
            order_id: order_id,
        }

        $.ajax({
            url: '<?php echo e(route('user.downloadable_prodcut',$store->slug)); ?>',
            method: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.status == 'success') {
                    show_toastr("success", data.message+'<br> <b>'+data.msg+'<b>', data["status"]);
                    $('.downloadab_msg').html('<span class="text-success">' + data.msg + '</sapn>');
                } else {
                    show_toastr("Error", data.message+'<br> <b>'+data.msg+'<b>', data["status"]);
                }
            }
        });
    });
</script>
  </body>
</html>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/userorder.blade.php ENDPATH**/ ?>