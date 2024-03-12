<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Cart')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('head-title'); ?>
    <?php echo e(__('Welcome') . ', ' . \Illuminate\Support\Facades\Auth::guard('customers')->user()->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="font-weight-bold text-dark"><?php echo e(__('Products you purchased')); ?></h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb d-block text-center">
                    <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="active"><?php echo e(__('Products you purchased')); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

    <!-- Our Dashbord -->
    <section class="our-dashbord dashbord bgc-f9">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard_favorites_contents dashboard_my_lising_tabs p10-520">
                                <div class="row">

                                    <!-- Tab panes -->
                                    <div class="col-lg-12">
                                        <div class="tab-content row" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive my_lisging_table">
                                                        <table class="table">

                                                            <?php if(!empty($orders) && count($orders) > 0): ?>
                                                            <thead class="table-light">
                                                                    <tr>
                                                                        <th class="thead_title" scope="col">
                                                                            <?php echo e(__('Order')); ?></th>
                                                                        <th class="thead_title" scope="col"
                                                                            class="sort"><?php echo e(__('Date')); ?></th>
                                                                        
                                                                        <th class="thead_title" scope="col"
                                                                            class="sort"><?php echo e(__('Payment Type')); ?></th>
                                                                        <th class="thead_title" scope="col"
                                                                            class="text-right"><?php echo e(__('Action')); ?></th>
                                                                    </tr>
                                                                </thead>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td colspan="7">
                                                                        <div class="text-center">
                                                                            <i class="fas fa-folder-open text-gray"
                                                                                style="font-size: 48px;"></i>
                                                                            <h2><?php echo e(__('Opps...')); ?></h2>
                                                                            <h6> <?php echo __('No data Found.'); ?> </h6>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>

                                                            <tbody>
                                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <th class="align-middle pl20" scope="row">
                                                                            <div class="car-listing bdr_none d-flex mb0">
                                                                              <div class="details ms-1">
                                                                                <h6 class="title">
                                                                                    <a href="<?php echo e(route('customer.order', [$store->slug, Crypt::encrypt($order->id)])); ?>">
                                                                                        <?php echo e('#' . $order->order_id); ?>

                                                                                    </a></h6>
                                                                                <h5 class="price"><?php echo e(\App\Models\Utility::priceFormat($order->price)); ?></h5>
                                                                              </div>
                                                                            </div>
                                                                          </th>
                                                                          <td class="align-middle"><?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?></td>
                                                                          <td class="align-middle"><?php echo e($order->payment_type); ?></td>
                                                                          
                                                                          <td class="editing_list align-middle">
                                                                            <?php if($order->status != 'Cancel Order'): ?>
                                                                            <button type="button"
                                                                                class="btn btn-sm <?php echo e($order->status == 'pending' ? 'btn-soft-info' : 'btn-soft-success'); ?> btn-icon rounded-pill">
                                                                                <span class="btn-inner--icon">
                                                                                    <?php if($order->status == 'pending'): ?>
                                                                                        <i
                                                                                            class="fas fa-check soft-success"></i>
                                                                                    <?php else: ?>
                                                                                        <i
                                                                                            class="fa fa-check-double soft-success"></i>
                                                                                    <?php endif; ?>
                                                                                </span>
                                                                                <?php if($order->status == 'pending'): ?>
                                                                                    <span class="btn-inner--text">
                                                                                        <?php echo e(__('Pending')); ?>:
                                                                                        <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                                                                    </span>
                                                                                <?php else: ?>
                                                                                    <span class="btn-inner--text">
                                                                                        <?php echo e(__('Delivered')); ?>:
                                                                                        <?php echo e(\App\Models\Utility::dateFormat($order->updated_at)); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </button>
                                                                        <?php else: ?>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-soft-danger btn-icon rounded-pill">
                                                                                <span class="btn-inner--icon">
                                                                                    <?php if($order->status == 'pending'): ?>
                                                                                        <i
                                                                                            class="fas fa-check soft-success"></i>
                                                                                    <?php else: ?>
                                                                                        <i
                                                                                            class="fa fa-check-double soft-success"></i>
                                                                                    <?php endif; ?>
                                                                                </span>
                                                                                <span class="btn-inner--text">
                                                                                    <?php echo e(__('Cancel Order')); ?>:
                                                                                    <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                                                                </span>
                                                                            </button>
                                                                        <?php endif; ?>
                                                                            <ul class="d-inline">
                                                                                <li class="list-inline-item mb-1">
                                                                                  <a href="<?php echo e(route('customer.order', [$store->slug, Crypt::encrypt($order->id)])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Details')); ?>"><span class="flaticon-view"></span></a>
                                                                                </li>
                                                                              </ul>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.themePlus1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/themePlus1/customer/index.blade.php ENDPATH**/ ?>