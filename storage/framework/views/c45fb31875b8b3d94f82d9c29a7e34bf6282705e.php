<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Storage Plans')); ?>

<?php $__env->stopSection(); ?>
<?php
    $dir = asset(Storage::url('uploads/plan'));
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Storage Plans')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Storage Plans')); ?></h5>
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
                    data-url="<?php echo e(route('storage_plans.create')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Add Plan')); ?>"><i
                        class="ti ti-plus"></i></a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $storage_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storage_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="plan_card">
                <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                    style="
                                    visibility: visible;
                                    animation-delay: 0.2s;
                                    animation-name: fadeInUp;
                                  ">
                    <div class="card-body">
                        <span class="price-badge bg-primary"><?php echo e($storage_plan->name); ?></span>
                        <?php if(\Auth::user()->type == 'Owner' && \Auth::user()->storage_plan == $storage_plan->id): ?>
                            <div class="d-flex flex-row-reverse m-0 p-0 plan-active-status">
                                <span class="d-flex align-items-center ">
                                    <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                    <span class="ms-2"><?php echo e(__('Active')); ?></span>
                                </span>
                            </div>

                            <?php elseif(\Auth::user()->type == 'Owner' && Utility::getStorageUsage() >= $storage_plan->capacity): ?>
                            <div class="d-flex flex-row-reverse m-0 p-0 plan-active-status">
                                <span class="d-flex align-items-center ">
                                    <i class="lh-1 far fa-question-circle text-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="<?php echo e(__('Your storage usage is higher than this plan')); ?>"></i>
                                </span>
                            </div>
                        <?php endif; ?>
                     

                        <div class="text-end">
                            <div class="mb-3">
                                <?php if(\Auth::user()->type == 'super admin'): ?>
                                    <div class="action-btn bg-primary ms-2">
                                        <a href="#" data-url="<?php echo e(route('storage_plans.edit', $storage_plan->id)); ?>"
                                            class="mx-3 btn btn-sm d-inline-flex align-items-center" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Edit Plan')); ?>" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="<?php echo e(__('Edit ')); ?>"><i
                                                class="fas fa-edit text-white"></i></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <h4 class="f-w-600">
                            
                            <?php echo e($storage_plan->price); ?><?php echo e(env('CURRENCY_SYMBOL')); ?>

                        </h4>
                        <h6 class="f-w-600">
                            <?php if($storage_plan->price == 0): ?>
                                <?php echo e(__('Duration')); ?> / <?php echo e(__('Unlimited')); ?>

                            <?php else: ?>
                                <?php echo e(__('Duration')); ?> / <?php echo e(env('STORAGE_PLAN_DURATION')); ?> <?php echo e(__('Months')); ?>

                            <?php endif; ?>
                        </h6>
                        <?php if(App\Models\StorageOrder::getCredit() && \Auth::user()->type == 'Owner' && \Auth::user()->storage_plan != $storage_plan->id && $storage_plan->price): ?>
                            <h6 class="f-w-600">
                                <?php echo e(__('Credits')); ?>


                                / <?php echo e(App\Models\StorageOrder::getCredit()); ?><?php echo e(env('CURRENCY_SYMBOL')); ?>

                                <small>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo e(__('You save this amount from your previous storage plan')); ?>"></i>
                                </small>
                            </h6>
                        <?php endif; ?>

                        


                        <div class="storage-plan-card-detail">
                            <?php if($storage_plan->description): ?>
                                <p class="mb-0">
                                    <?php echo e($storage_plan->description); ?><br />
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <?php if(\Auth::user()->type == 'Owner'): ?>
                                
                            <?php if(\Auth::user()->storage_plan == $storage_plan->id && date('Y-m-d') < \Auth::user()->storage_plan_expire_date): ?>
                                    <h5 class="h6 my-4">
                                        <?php echo e(__('Expired : ')); ?>

                                        <?php echo e(\Auth::user()->storage_plan_expire_date ? \App\Models\Utility::dateFormat(\Auth::user()->storage_plan_expire_date) : __('Unlimited')); ?>

                                    </h5>
                                <?php elseif(
                                    \Auth::user()->storage_plan == $storage_plan->id && !empty(\Auth::user()->storage_plan_expire_date) &&
                                        \Auth::user()->storage_plan_expire_date < date('Y-m-d')): ?>
                                    <div class="col-12">
                                        <p class="server-plan font-weight-bold text-center mx-sm-5">
                                            <?php echo e(__('Expired')); ?>

                                        </p>
                                    </div>
                                <?php elseif(\Auth::user()->storage_plan != $storage_plan->id && Utility::getStorageUsage() >= $storage_plan->capacity): ?>
                                    <div class="col-12">
                                        <a href="javascript:void(0)"
                                            class="btn btn-secondary disabled d-flex justify-content-center align-items-center "><?php echo e(__('Subscribe')); ?>

                                            <i class="fas fa-arrow-right m-1"></i></a>
                                        <p></p>
                                    </div>
                                
                                <?php else: ?>
                                    <div class="col-12">
                                        <a href="<?php echo e(route('stripe', ['code' => \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id), 'type' => 'storage'])); ?>"
                                            class="btn  btn-primary d-flex justify-content-center align-items-center "><?php echo e(__('Subscribe')); ?>

                                            <i class="fas fa-arrow-right m-1"></i></a>
                                        <p></p>
                                    </div>
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
                                    <th><?php echo e(__('Storage')); ?></th>
                                    <th> <?php echo e(__('Price')); ?></th>
                                    <th> <?php echo e(__('Payment Type')); ?></th>
                                    <th> <?php echo e(__('Status')); ?></th>
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
        // $(document).ready(function() {
        //     var tohref = '';
        //     <?php if(Auth::user()->is_register_trial == 1): ?>
        //         tohref = $('#trial_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
        //     <?php elseif(Auth::user()->interested_plan_id != 0): ?>
        //         tohref = $('#interested_plan_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
        //     <?php endif; ?>

        //     if (tohref != '') {
        //         window.location = tohref;
        //     }
        // });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storage_plans/index.blade.php ENDPATH**/ ?>