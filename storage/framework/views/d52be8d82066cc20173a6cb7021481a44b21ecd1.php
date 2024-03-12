<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plans')); ?>

<?php $__env->stopSection(); ?>
<?php
    $dir = asset(Storage::url('uploads/plan'));
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Plans')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Plans')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>

    <?php if(Auth::user()->type == 'super admin'): ?>
        <?php if(
            (isset($admin_payments_setting['is_stripe_enabled']) && $admin_payments_setting['is_stripe_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paypal_enabled']) && $admin_payments_setting['is_paypal_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paystack_enabled']) &&
                    $admin_payments_setting['is_paystack_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_flutterwave_enabled']) &&
                    $admin_payments_setting['is_flutterwave_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_razorpay_enabled']) &&
                    $admin_payments_setting['is_razorpay_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_mercado_enabled']) &&
                    $admin_payments_setting['is_mercado_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paytm_enabled']) && $admin_payments_setting['is_paytm_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_mollie_enabled']) && $admin_payments_setting['is_mollie_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_skrill_enabled']) && $admin_payments_setting['is_skrill_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_coingate_enabled']) &&
                    $admin_payments_setting['is_coingate_enabled'] == 'on')): ?>
            <div class="pr-2">
                <a href="#" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Add Plan')); ?>"
                    data-url="<?php echo e(route('plans.create')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Add Plan')); ?>"><i
                        class="ti ti-plus"></i></a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="plan_card">
                <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                    style="
                                    visibility: visible;
                                    animation-delay: 0.2s;
                                    animation-name: fadeInUp;
                                  ">
                    <div class="card-body">
                        <span class="price-badge bg-primary"><?php echo e($plan->name); ?></span>
                        <?php if(\Auth::user()->type == 'Owner' && \Auth::user()->plan == $plan->id): ?>
                            <div class="d-flex flex-row-reverse m-0 p-0 plan-active-status">
                                <span class="d-flex align-items-center ">
                                    <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                    <span class="ms-2"><?php echo e(__('Active')); ?></span>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div class="text-end">
                            <div class="mb-3">
                                <?php if(\Auth::user()->type == 'super admin'): ?>
                                    <div class="action-btn bg-primary ms-2">
                                        <a href="#" data-url="<?php echo e(route('plans.edit', $plan->id)); ?>"
                                            class="mx-3 btn btn-sm d-inline-flex align-items-center" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Edit Plan')); ?>" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="<?php echo e(__('Edit ')); ?>"><i
                                                class="fas fa-edit text-white"></i></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php $__currentLoopData = $plan->getDurations(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $duration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h4><?php echo e(App\Models\Plan::$arrDuration[$duration->duration]); ?> /
                                <?php echo e($duration->price); ?><?php echo e(env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$'); ?> </h4>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="plan-card-detail">
                            <?php if($plan->trial_days > 0): ?>
                                <p class="mb-0">
                                    <?php echo e(__('Trial : ') . $plan->trial_days . __(' Days')); ?><br />
                                </p>
                            <?php endif; ?>

                            <ul class="list-unstyled  my-4">
                                <?php if($plan->free_layouts == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Free Layouts')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Free Layouts')); ?>

                                    </li>
                                <?php endif; ?>

                                <?php if($plan->premium_layouts == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Premium Layouts')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i
                                                class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Premium Layouts')); ?>

                                    </li>
                                <?php endif; ?>


                                
                                




                                <?php if($plan->secure_website_address == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i
                                                class="text-primary fas fa-check"></i></span><?php echo e(__('Secure website address (HTTPS)')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i
                                                class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Secure website address (HTTPS)')); ?>

                                    </li>
                                <?php endif; ?>

                                <?php if($plan->mobile_optimized == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i
                                                class="text-primary fas fa-check"></i></span><?php echo e(__('Optimized for mobile devices')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i
                                                class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Optimized for mobile devices')); ?>

                                    </li>
                                <?php endif; ?>

                                <?php if($plan->contact_form == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Contact Form')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Contact Form')); ?>

                                    </li>
                                <?php endif; ?>

                                <?php if($plan->blog == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Blog')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Blog')); ?>

                                    </li>
                                <?php endif; ?>

                                <?php if($plan->gallery == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Gallery')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Gallery')); ?>

                                    </li>
                                <?php endif; ?>

                                <?php if($plan->job_board == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Job Board')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Job Board')); ?>

                                    </li>
                                <?php endif; ?>

                                <?php if($plan->enable_custdomain == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Custom Domain')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Custom Domain')); ?>

                                    </li>
                                <?php endif; ?>


                                <?php if($plan->max_products == '-1'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Unlimited')); ?>

                                        <?php echo e(__('Vehicles')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Unlimited')); ?>

                                        <?php echo e(__('Vehicles')); ?> (<?php echo e(__('Max')); ?>. <?php echo e($plan->max_products); ?>)
                                    </li>
                                <?php endif; ?>

                                <?php if($plan->max_stores == '-1'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Unlimited')); ?>

                                        <?php echo e(__('Stores')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Unlimited')); ?>

                                        <?php echo e(__('Stores')); ?> (<?php echo e(__('Max')); ?>. <?php echo e($plan->max_stores); ?>)
                                    </li>
                                <?php endif; ?>

                                

                                <?php if($plan->support_by_mail == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Email Support')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i
                                                class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Email Support')); ?>

                                    </li>
                                <?php endif; ?>
                                <?php if($plan->support_by_phone == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Phone Support')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i
                                                class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Phone Support')); ?>

                                    </li>
                                <?php endif; ?>
                                <?php if($plan->support_by_whatsapp == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Whatsapp Support')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i
                                                class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Whatsapp Support')); ?>

                                    </li>
                                <?php endif; ?>
                                <?php if($plan->api_services == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('API Services')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('API Services')); ?>

                                    </li>
                                <?php endif; ?>

                                <?php if($plan->ad_free == 'on'): ?>
                                    <li>
                                        <span class="theme-avtar">
                                            <i class="text-primary fas fa-check"></i></span><?php echo e(__('Ad-Free')); ?>

                                    </li>
                                <?php else: ?>
                                    <li class="text-danger">
                                        <span class="theme-avtar">
                                            <i class="text-danger fas fa-times-circle"></i></span><?php echo e(__('Ad-Free')); ?>

                                    </li>
                                <?php endif; ?>

                                
                                

                            </ul>
                            <?php if($plan->description): ?>
                                <p class="mb-0">
                                    <?php echo e($plan->description); ?><br />
                                </p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="row mt-3">
                            <?php if(\Auth::user()->type != 'super admin'): ?>
                                <?php if(
                                    \Auth::user()->plan == $plan->id &&
                                        date('Y-m-d') < \Auth::user()->plan_expire_date &&
                                        \Auth::user()->is_trial_done != 1): ?>
                                    <h5 class="h6 my-4">
                                        <?php echo e(__('Expired : ')); ?>

                                        <?php echo e(\Auth::user()->plan_expire_date ? \App\Models\Utility::dateFormat(\Auth::user()->plan_expire_date) : __('Unlimited')); ?>

                                    </h5>
                                <?php elseif(
                                    \Auth::user()->plan == $plan->id &&
                                        !empty(\Auth::user()->plan_expire_date) &&
                                        \Auth::user()->plan_expire_date < date('Y-m-d')): ?>
                                    <div class="col-12">
                                        <p class="server-plan font-weight-bold text-center mx-sm-5">
                                            <?php echo e(__('Expired')); ?>

                                        </p>
                                    </div>
                                <?php elseif(\Auth::user()->plan == $plan->id): ?>
                                    <div class="col-12">
                                        <a href="<?php echo e(route('stripe', \Illuminate\Support\Facades\Crypt::encrypt($plan->id))); ?>"
                                            class="btn  btn-primary d-flex justify-content-center align-items-center "><?php echo e(__('Change')); ?>

                                            <i class="fas fa-arrow-right m-1"></i></a>
                                        <p></p>
                                    </div>
                                <?php else: ?>
                                    <div class="<?php echo e($plan->id == 1 ? 'col-12' : 'col-8'); ?>">
                                        <a href="<?php echo e(route('stripe', \Illuminate\Support\Facades\Crypt::encrypt($plan->id))); ?>"
                                            class="btn  btn-primary d-flex justify-content-center align-items-center "><?php echo e(__('Subscribe')); ?>

                                            <i class="fas fa-arrow-right m-1"></i></a>
                                        <p></p>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(\Auth::user()->type != 'super admin' && \Auth::user()->plan != $plan->id): ?>
                                <?php if($plan->id != 1): ?>
                                    <?php if(\Auth::user()->requested_plan != $plan->id): ?>
                                        <div class="col-4">
                                            <a href="<?php echo e(route('send.request', [\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>"
                                                class="btn btn-primary btn-icon" data-title="<?php echo e(__('Send Request')); ?>"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="<?php echo e(__('Send Request')); ?>">
                                                <span class="btn-inner--icon"><i class="fas fa-share"></i></span>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-4">
                                            <a href="<?php echo e(route('request.cancel', \Auth::user()->id)); ?> }}"
                                                class="btn btn-icon m-1 btn-danger"
                                                data-title="<?php echo e(__('Cancle Request')); ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="<?php echo e(__('Cancel Request')); ?>">
                                                <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable ">
                            <thead>
                                <tr>
                                    <th> <?php echo e(__('Order Id')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Plan Name')); ?></th>
                                    <th> <?php echo e(__('Price')); ?></th>
                                    <th> <?php echo e(__('Payment Type')); ?></th>
                                    <th> <?php echo e(__('Status')); ?></th>
                                    <th> <?php echo e(__('Coupon')); ?></th>
                                    <th> <?php echo e(__('Invoice')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($order->order_id); ?></td>
                                        <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                                        <td><?php echo e($order->user_name); ?></td>
                                        <td><?php echo e($order->plan_name); ?></td>
                                        <td><?php echo e(env('CURRENCY_SYMBOL') . $order->price); ?></td>
                                        <td><?php echo e($order->payment_type); ?></td>
                                        <td>
                                            <?php if($order->payment_status == 'succeeded'): ?>
                                                <i class="mdi mdi-circle text-success"></i>
                                                <?php echo e(ucfirst($order->payment_status)); ?>

                                            <?php else: ?>
                                                <i class="mdi mdi-circle text-danger"></i>
                                                <?php echo e(ucfirst($order->payment_status)); ?>

                                            <?php endif; ?>
                                        </td>

                                        <td><?php echo e(!empty($order->total_coupon_used) ? (!empty($order->total_coupon_used->coupon_detail) ? $order->total_coupon_used->coupon_detail->code : '-') : '-'); ?>

                                        </td>

                                        <td class="text-center">
                                            <?php if($order->receipt != 'free coupon' && $order->payment_type == 'STRIPE'): ?>
                                                <a href="<?php echo e($order->receipt); ?>" title="Invoice" target="_blank"
                                                    class=""><i class="fas fa-file-invoice"></i> </a>
                                            <?php elseif($order->receipt == 'free coupon'): ?>
                                                <p><?php echo e(__('Used') . '100 %' . __('discount coupon code.')); ?></p>
                                            <?php elseif($order->payment_type == 'Manually'): ?>
                                                <p><?php echo e(__('Manually plan upgraded by super admin')); ?></p>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var tohref = '';
            <?php if(Auth::user()->is_register_trial == 1): ?>
                tohref = $('#trial_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
            <?php elseif(Auth::user()->interested_plan_id != 0): ?>
                tohref = $('#interested_plan_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
            <?php endif; ?>

            if (tohref != '') {
                window.location = tohref;
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/plans/index.blade.php ENDPATH**/ ?>